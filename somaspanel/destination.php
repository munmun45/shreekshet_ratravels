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
        // Flash message from redirects
        $flashStatus = isset($_GET['status']) ? $_GET['status'] : '';
        $flashMsg = isset($_GET['msg']) ? $_GET['msg'] : '';
        if ($flashStatus):
      ?>
        <div class="alert alert-<?= $flashStatus === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
          <strong><?= $flashStatus === 'success' ? 'Success' : 'Error' ?>:</strong>
          <?= htmlspecialchars($flashMsg !== '' ? $flashMsg : ($flashStatus === 'success' ? 'Saved successfully.' : 'Operation failed.')) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
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
        // Select only columns we use in the table to avoid legacy schema issues
        $sql = "SELECT id, title, location, category, price, image_url, short_desc, status FROM destinations ORDER BY id DESC";
        $destQueryOk = false;
        if ($result = $conn->query($sql)) {
          $destQueryOk = true;
          while ($row = $result->fetch_assoc()) { $destinations[] = $row; }
          $result->free();
        }
        if (!$destQueryOk) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
             . '<strong>DB Error:</strong> ' . htmlspecialchars($conn->error) .
             '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
             . '</div>';
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
                    <input type="hidden" name="cropped_image" id="cropped_image">
                    <small class="text-muted d-block mb-2">Upload a JPG/PNG/WebP image (max ~5MB). After selecting, crop will open automatically.</small>
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

      <!-- Cropper Modal -->
      <div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cropperModalLabel">Crop Image</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div style="max-height:60vh; overflow:auto">
                <img id="cropperImage" src="#" alt="To crop" style="max-width:100%; display:block;">
              </div>
              <small class="text-muted d-block mt-2">Aspect ratio 16:9. Drag to select the area. Use mouse wheel or pinch to zoom.</small>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="cropperApplyBtn">Crop & Use</button>
            </div>
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

  <!-- Cropper.js CSS/JS -->
  <link rel="stylesheet" href="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.css">
  <script src="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.js"></script>

  <script>
    (function(){
      let cropper = null;
      const fileInput = document.getElementById('dest_image_file');
      const preview = document.getElementById('dest_image_preview');
      const hiddenInput = document.getElementById('cropped_image');
      const imgEl = document.getElementById('cropperImage');
      const applyBtn = document.getElementById('cropperApplyBtn');
      const modalEl = document.getElementById('cropperModal');
      let bsModal = null;

      function openModal(){
        if (!bsModal) {
          bsModal = new bootstrap.Modal(modalEl);
        }
        bsModal.show();
      }

      function destroyCropper(){
        if (cropper) { cropper.destroy(); cropper = null; }
      }

      function initCropper(){
        destroyCropper();
        cropper = new Cropper(imgEl, {
          aspectRatio: 16/9, // enforced 16:9 ratio as recommended
          viewMode: 1,
          autoCropArea: 1,
          movable: true,
          zoomable: true,
          rotatable: false,
          scalable: false,
        });
      }

      fileInput.addEventListener('change', function(){
        const file = this.files && this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e){
          imgEl.src = e.target.result;
          // Clear previous hidden input and preview
          hiddenInput.value = '';
          preview.style.display = 'none';
          // Open modal after image is set
          imgEl.onload = function(){
            initCropper();
            openModal();
          };
        };
        reader.readAsDataURL(file);
      });

      applyBtn.addEventListener('click', function(){
        if (!cropper) return;
        // Get a decent sized canvas (limit size to avoid huge files)
        const canvas = cropper.getCroppedCanvas({
          maxWidth: 1600,
          maxHeight: 1600,
        });
        if (!canvas) return;
        // Convert to dataURL (use image/jpeg for better compression)
        const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
        hiddenInput.value = dataUrl;
        // Update preview
        preview.src = dataUrl;
        preview.style.display = 'inline-block';
        // Close modal
        if (bsModal) { bsModal.hide(); }
        destroyCropper();
      });

      // Clear cropper on modal hide
      modalEl.addEventListener('hidden.bs.modal', function(){
        destroyCropper();
      });
    })();
  </script>
</body>

</html>