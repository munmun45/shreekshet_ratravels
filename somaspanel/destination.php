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
      <h1>Destination Manager</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Destination Manager</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <?php
        // DB connection
        require_once __DIR__ . '/config/config.php';

        // Ensure table exists (safety)
        $conn->query("CREATE TABLE IF NOT EXISTS destinations (
          id INT AUTO_INCREMENT PRIMARY KEY,
          title VARCHAR(255) NOT NULL,
          location VARCHAR(255) NOT NULL,
          category VARCHAR(100) NOT NULL,
          price DECIMAL(10,2) DEFAULT 0,
          image_url TEXT NOT NULL,
          short_desc TEXT NOT NULL,
          status TINYINT(1) DEFAULT 1,
          created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // Fetch destinations
        $destinations = [];
        $sql = "SELECT id, title, location, category, price, image_url, short_desc, status, created_at, updated_at FROM destinations ORDER BY id DESC";
        if ($result = $conn->query($sql)) {
          while ($row = $result->fetch_assoc()) { $destinations[] = $row; }
          $result->free();
        }
      ?>

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
            <h5 class="card-title m-0">All Destinations</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#destinationModal" onclick="openAddDest()">
              <i class="bi bi-plus-lg"></i> Add Destination
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Location</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($destinations) === 0): ?>
                  <tr><td colspan="7" class="text-center">No destinations found</td></tr>
                <?php else: ?>
                  <?php foreach ($destinations as $i => $d): ?>
                    <tr>
                      <td><?= $i + 1 ?></td>
                      <td><?= htmlspecialchars($d['title']) ?></td>
                      <td><?= htmlspecialchars($d['location']) ?></td>
                      <td><?= htmlspecialchars($d['category']) ?></td>
                      <td>₹<?= number_format((float)$d['price']) ?></td>
                      <td>
                        <?php if ((int)$d['status'] === 1): ?>
                          <span class="badge bg-success">Active</span>
                        <?php else: ?>
                          <span class="badge bg-secondary">Inactive</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick='openEditDest(<?= json_encode($d, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP) ?>)'>Edit</button>
                        <a class="btn btn-sm btn-outline-danger" href="./process/destination_delete.php?id=<?= (int)$d['id'] ?>" onclick="return confirm('Delete this destination?');">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Add/Edit Destination Modal -->
      <div class="modal fade" id="destinationModal" tabindex="-1" aria-labelledby="destinationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="destinationModalLabel">Add Destination</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="./process/destination_save.php" enctype="multipart/form-data">
              <input type="hidden" name="id" id="dest_id">
              <input type="hidden" name="existing_image_url" id="dest_existing_image_url">
              <div class="modal-body">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="dest_title" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" id="dest_location" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" id="dest_category" placeholder="e.g., beaches, temples, heritage" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Price (₹)</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="dest_price" required>
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image_file" id="dest_image_file" accept="image/*">
                    <small class="text-muted">Upload a JPG/PNG/WebP image (max ~5MB). If left empty on Edit, the existing image will be kept.</small>
                  </div>
                  <div class="col-md-12">
                    <img id="dest_image_preview" src="" alt="Preview" style="max-height:150px; display:none; border:1px solid #eee; padding:4px; border-radius:6px;" />
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_desc" id="dest_short_desc" rows="3" required></textarea>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" id="dest_status" required>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script>
        function clearDest(){
          document.getElementById('dest_id').value = '';
          document.getElementById('dest_title').value = '';
          document.getElementById('dest_location').value = '';
          document.getElementById('dest_category').value = '';
          document.getElementById('dest_price').value = '';
          const f = document.getElementById('dest_image_file');
          if (f) { f.value = ''; }
          document.getElementById('dest_existing_image_url').value = '';
          const prev = document.getElementById('dest_image_preview');
          if (prev) { prev.src = ''; prev.style.display = 'none'; }
          document.getElementById('dest_short_desc').value = '';
          document.getElementById('dest_status').value = '1';
        }
        function openAddDest(){
          clearDest();
          document.getElementById('destinationModalLabel').innerText = 'Add Destination';
        }
        function openEditDest(d){
          document.getElementById('destinationModalLabel').innerText = 'Edit Destination';
          document.getElementById('dest_id').value = d.id || '';
          document.getElementById('dest_title').value = d.title || '';
          document.getElementById('dest_location').value = d.location || '';
          document.getElementById('dest_category').value = d.category || '';
          document.getElementById('dest_price').value = d.price || '';
          document.getElementById('dest_existing_image_url').value = d.image_url || '';
          const prev = document.getElementById('dest_image_preview');
          if (d.image_url) { prev.src = d.image_url; prev.style.display = 'inline'; } else { prev.src = ''; prev.style.display = 'none'; }
          document.getElementById('dest_short_desc').value = d.short_desc || '';
          document.getElementById('dest_status').value = (String(d.status) === '0' ? '0' : '1');
          var modal = new bootstrap.Modal(document.getElementById('destinationModal'));
          modal.show();
        }
      </script>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->







  <?= require("./config/footer.php") ?>




</body>

</html>