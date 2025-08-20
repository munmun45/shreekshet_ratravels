<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:30 GMT -->
<head>
  
<?php include 'config/meta.php'; ?>

</head>

<body>
  




<div class="bg-outer-wrapper sub-banner-outer-wrapper float-left w-100">



<?php include 'config/header.php'; ?>


        <section class="float-left w-100 banner-con sub-banner-con position-relative main-box">
            <img alt="vector" class="vector1  img-fluid position-absolute" src="assets/images/vector1.png">
            <img alt="vector" class="vector2 img-fluid position-absolute" src="assets/images/vector2.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="sub-banner-inner-con padding-bottom">
                            <?php
                            // Get article ID from URL
                            $article_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                            
                            // Database connection
                            require_once 'config/config.php';
                            
                            // Fetch article details
                            $article = null;
                            if ($article_id > 0) {
                                $sql = "SELECT * FROM blogs WHERE id = ? AND status = 1";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $article_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $article = $result->fetch_assoc();
                                $stmt->close();
                            }
                            
                            if ($article) {
                                $title = htmlspecialchars($article['title']);
                            } else {
                                $title = "Article Not Found";
                            }
                            ?>
                            <h1><?= $article ? 'Article' : 'Blog' ?></h1>
                            <p class="font-size-20"><?= $article ? $title : 'Travel stories, guides, tips, and updates from Puri, Odisha and beyond — curated by Shree Kshetra Travels to help you plan better journeys.' ?></p>
                            <div class="breadcrumb-con d-inline-block" data-aos="fade-up" data-aos-duration="600">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= $article ? 'Article' : 'Not Found' ?></li>
                                </ol>
                            </div>
                            <!-- sub banner inner con -->
                        </div>
                        <!-- col-lg-6 -->
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>

            <!-- banner con -->
        </section>
        <!-- bg outer wrapper -->
    </div>
    <!-- Single Blog Article Section -->
    <div class="single-blog-section w-100 float-left" style="padding: 60px 0;">
        <div class="container">
            <?php if ($article): ?>
                <div class="row">
                    <!-- Main Article Content -->
                    <div class="col-lg-8">
                        <article class="single-blog-article">
                            <!-- Featured Image -->
                            <?php if (!empty($article['image_url'])): ?>
                            <div class="article-featured-image mb-4">
                                <img src="<?= htmlspecialchars($article['image_url']) ?>" 
                                     alt="<?= htmlspecialchars($article['title']) ?>" 
                                     class="img-fluid w-100 rounded shadow-sm">
                            </div>
                            <?php endif; ?>

                            <!-- Article Meta -->
                            <div class="article-meta mb-4 pb-3 border-bottom">
                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    <span class="badge bg-primary px-3 py-2 rounded-pill">
                                        <?= htmlspecialchars($article['category']) ?>
                                    </span>
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        <span><?= date('F d, Y', strtotime($article['created_at'])) ?></span>
                                    </div>
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="fas fa-user me-2"></i>
                                        <span>Admin</span>
                                    </div>
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="fas fa-clock me-2"></i>
                                        <span><?= ceil(str_word_count($article['content']) / 200) ?> min read</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Article Title -->
                            <h1 class="article-title mb-4"><?= htmlspecialchars($article['title']) ?></h1>

                            <!-- Article Excerpt -->
                            <?php if (!empty($article['excerpt'])): ?>
                            <div class="article-excerpt mb-4 p-4 bg-light rounded">
                                <p class="lead mb-0 text-muted fst-italic">
                                    <?= htmlspecialchars($article['excerpt']) ?>
                                </p>
                            </div>
                            <?php endif; ?>

                            <!-- Article Content -->
                            <div class="article-content">
                                <?= nl2br(htmlspecialchars($article['content'])) ?>
                            </div>

                            <!-- Article Tags -->
                            <?php if (!empty($article['tags'])): ?>
                            <div class="article-tags mt-5 pt-4 border-top">
                                <h6 class="mb-3">Tags:</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php 
                                    $tags = explode(',', $article['tags']);
                                    foreach ($tags as $tag): 
                                        $tag = trim($tag);
                                        if (!empty($tag)):
                                    ?>
                                    <span class="badge bg-outline-secondary px-3 py-2 rounded-pill border">
                                        #<?= htmlspecialchars($tag) ?>
                                    </span>
                                    <?php 
                                        endif;
                                    endforeach; 
                                    ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Social Share -->
                            <div class="social-share mt-5 pt-4 border-top">
                                <h6 class="mb-3">Share this article:</h6>
                                <div class="d-flex gap-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" 
                                       target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fab fa-facebook-f me-2"></i>Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>&text=<?= urlencode($article['title']) ?>" 
                                       target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fab fa-twitter me-2"></i>Twitter
                                    </a>
                                    <a href="https://wa.me/?text=<?= urlencode($article['title'] . ' - ' . 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" 
                                       target="_blank" class="btn btn-outline-success btn-sm">
                                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="blog-sidebar">
                            <!-- Related Articles -->
                            <div class="sidebar-widget mb-5">
                                <h5 class="widget-title mb-4 pb-2 border-bottom">Related Articles</h5>
                                <?php
                                // Fetch related articles from same category
                                $related_sql = "SELECT id, title, image_url, created_at FROM blogs 
                                              WHERE category = ? AND id != ? AND status = 1 
                                              ORDER BY created_at DESC LIMIT 3";
                                $related_stmt = $conn->prepare($related_sql);
                                $related_stmt->bind_param("si", $article['category'], $article['id']);
                                $related_stmt->execute();
                                $related_result = $related_stmt->get_result();
                                
                                if ($related_result->num_rows > 0):
                                    while ($related = $related_result->fetch_assoc()):
                                ?>
                                <div class="related-article mb-3 pb-3 border-bottom">
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <img src="<?= !empty($related['image_url']) ? htmlspecialchars($related['image_url']) : 'assets/images/blog/default-blog.jpg' ?>" 
                                                 alt="<?= htmlspecialchars($related['title']) ?>" 
                                                 class="img-fluid rounded" style="height: 60px; object-fit: cover;">
                                        </div>
                                        <div class="col-8">
                                            <h6 class="mb-1">
                                                <a href="blog-detail.php?id=<?= $related['id'] ?>" 
                                                   class="text-decoration-none text-dark">
                                                    <?= htmlspecialchars(substr($related['title'], 0, 50)) ?>...
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <?= date('M d, Y', strtotime($related['created_at'])) ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    endwhile;
                                else:
                                ?>
                                <p class="text-muted">No related articles found.</p>
                                <?php endif; ?>
                            </div>

                            <!-- Back to Blog -->
                            <div class="sidebar-widget">
                                <a href="blog.php" class="btn btn-primary w-100">
                                    <i class="fas fa-arrow-left me-2"></i>Back to All Articles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Article Not Found -->
                <div class="row">
                    <div class="col-12">
                        <div class="text-center py-5">
                            <div class="error-404">
                                <i class="fas fa-exclamation-triangle fa-4x text-warning mb-4"></i>
                                <h2 class="mb-3">Article Not Found</h2>
                                <p class="text-muted mb-4">
                                    The article you're looking for doesn't exist or has been removed.
                                </p>
                                <a href="blog.php" class="btn btn-primary">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Blog
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <style>
    .single-blog-article {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .article-featured-image img {
        height: 400px;
        object-fit: cover;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.3;
        color: #333;
    }

    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }

    .blog-sidebar {
        position: sticky;
        top: 2rem;
    }

    .sidebar-widget {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    }

    .widget-title {
        font-weight: 600;
        color: #333;
    }

    .related-article:hover {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 0.5rem;
        margin: -0.5rem;
    }

    .social-share .btn {
        border-radius: 25px;
        font-weight: 500;
    }

    .error-404 {
        padding: 4rem 2rem;
    }

    @media (max-width: 768px) {
        .article-title {
            font-size: 2rem;
        }
        
        .single-blog-article {
            padding: 1.5rem;
        }
        
        .article-featured-image img {
            height: 250px;
        }
    }
    </style>

  <?php include 'config/footer.php'; ?>




</body>


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:31 GMT -->
</html>