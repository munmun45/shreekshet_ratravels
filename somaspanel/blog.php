<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?= require("./config/meta.php") ?>

</head>

<body>

  <?= require("./config/header.php") ?>
  <?= require("./config/menu.php") ?>







  <main id="main" class="main">

    <div class="pagetitle">
      <h1>News & Article</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">News & Article</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php
    // Display success/error messages
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                ' . $_SESSION['success'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                ' . $_SESSION['error'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
        unset($_SESSION['error']);
    }
    ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Articles Management</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newArticleModal">
              <i class="bi bi-plus-circle"></i> Write New Article
            </button>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recent Articles</h5>

              <!-- Articles Table -->
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Category</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="articlesTable">
                    <?php
                    // Database connection
                    require_once './config/config.php';
                    
                    // Fetch recent articles
                    $sql = "SELECT id, title, category, status, created_at FROM blogs ORDER BY created_at DESC LIMIT 10";
                    $result = $conn->query($sql);
                    
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $statusText = $row['status'] == 1 ? '<span class="badge bg-success">Published</span>' : '<span class="badge bg-warning">Draft</span>';
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>" . htmlspecialchars($row['title']) . "</td>
                                    <td>" . htmlspecialchars($row['category']) . "</td>
                                    <td>{$statusText}</td>
                                    <td>" . date('M d, Y', strtotime($row['created_at'])) . "</td>
                                    <td>
                                        <button class='btn btn-sm btn-outline-primary' onclick='editArticle({$row['id']})'>Edit</button>
                                        <button class='btn btn-sm btn-outline-danger' onclick='deleteArticle({$row['id']})'>Delete</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No articles found</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- New Article Modal -->
    <div class="modal fade" id="newArticleModal" tabindex="-1" aria-labelledby="newArticleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newArticleModalLabel">Write New Article</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Blog Form -->
            <form id="blogForm" method="POST" action="process/blog_save.php" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="blogTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="blogTitle" name="title" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="blogCategory" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select class="form-select" id="blogCategory" name="category" required>
                    <option value="">Select Category</option>
                    <option value="Travel Tips">Travel Tips</option>
                    <option value="Destinations">Destinations</option>
                    <option value="Culture">Culture</option>
                    <option value="Food">Food</option>
                    <option value="Adventure">Adventure</option>
                    <option value="News">News</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="blogImage" class="col-sm-2 col-form-label">Featured Image</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" id="blogImage" name="image" accept="image/*">
                  <div class="form-text">Upload a featured image for your article (JPG, PNG, GIF)</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="blogExcerpt" class="col-sm-2 col-form-label">Excerpt</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="blogExcerpt" name="excerpt" rows="3" placeholder="Brief description of the article..."></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="blogContent" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="blogContent" name="content" rows="8" required placeholder="Write your article content here..."></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="blogTags" class="col-sm-2 col-form-label">Tags</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="blogTags" name="tags" placeholder="travel, puri, temple, beach (comma separated)">
                  <div class="form-text">Add relevant tags separated by commas</div>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="statusDraft" value="0" checked>
                    <label class="form-check-label" for="statusDraft">
                      Draft
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="statusPublished" value="1">
                    <label class="form-check-label" for="statusPublished">
                      Published
                    </label>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="reset" class="btn btn-outline-secondary">Reset Form</button>
                <button type="submit" class="btn btn-primary">Save Article</button>
              </div>
            </form><!-- End Blog Form -->
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Article Modal -->
    <div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editArticleModalLabel">Edit Article</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editBlogForm" method="POST" action="process/blog_edit.php" enctype="multipart/form-data">
              <input type="hidden" id="editArticleId" name="id">
              <input type="hidden" id="existingImage" name="existing_image">
              
              <div class="row mb-3">
                <label for="editBlogTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="editBlogTitle" name="title" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="editBlogCategory" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select class="form-select" id="editBlogCategory" name="category" required>
                    <option value="">Select Category</option>
                    <option value="Travel Tips">Travel Tips</option>
                    <option value="Destinations">Destinations</option>
                    <option value="Culture">Culture</option>
                    <option value="Food">Food</option>
                    <option value="Adventure">Adventure</option>
                    <option value="News">News</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="editBlogImage" class="col-sm-2 col-form-label">Featured Image</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" id="editBlogImage" name="image" accept="image/*">
                  <div class="form-text">Upload a new image to replace the current one (JPG, PNG, GIF)</div>
                  <div id="currentImagePreview" class="mt-2"></div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="editBlogExcerpt" class="col-sm-2 col-form-label">Excerpt</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="editBlogExcerpt" name="excerpt" rows="3"></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="editBlogContent" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="editBlogContent" name="content" rows="8" required></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="editBlogTags" class="col-sm-2 col-form-label">Tags</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="editBlogTags" name="tags">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="editStatusDraft" value="0">
                    <label class="form-check-label" for="editStatusDraft">Draft</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="editStatusPublished" value="1">
                    <label class="form-check-label" for="editStatusPublished">Published</label>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Article</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
    function editArticle(id) {
        // Fetch article data via AJAX
        fetch('process/get_article.php?id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('editArticleId').value = data.article.id;
                    document.getElementById('editBlogTitle').value = data.article.title;
                    document.getElementById('editBlogCategory').value = data.article.category;
                    document.getElementById('editBlogExcerpt').value = data.article.excerpt || '';
                    document.getElementById('editBlogContent').value = data.article.content;
                    document.getElementById('editBlogTags').value = data.article.tags || '';
                    document.getElementById('existingImage').value = data.article.image_url || '';
                    
                    // Set status
                    if (data.article.status == 1) {
                        document.getElementById('editStatusPublished').checked = true;
                    } else {
                        document.getElementById('editStatusDraft').checked = true;
                    }
                    
                    // Show current image
                    const imagePreview = document.getElementById('currentImagePreview');
                    if (data.article.image_url) {
                        imagePreview.innerHTML = '<img src="../../' + data.article.image_url + '" alt="Current Image" style="max-width: 200px; height: auto;" class="img-thumbnail">';
                    } else {
                        imagePreview.innerHTML = '<p class="text-muted">No image uploaded</p>';
                    }
                    
                    // Show modal
                    new bootstrap.Modal(document.getElementById('editArticleModal')).show();
                } else {
                    alert('Error loading article data');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error loading article data');
            });
    }

    function deleteArticle(id) {
        if (confirm('Are you sure you want to delete this article? This action cannot be undone.')) {
            window.location.href = 'process/blog_delete.php?id=' + id;
        }
    }
    </script>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->







  <?= require("./config/footer.php") ?>




</body>

</html>