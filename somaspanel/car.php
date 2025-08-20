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
      <h1>Car Manager</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Car Manager</li>
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
        $conn->query("CREATE TABLE IF NOT EXISTS cars (
          id INT AUTO_INCREMENT PRIMARY KEY,
          car_name VARCHAR(255) NOT NULL,
          car_model VARCHAR(255) NOT NULL,
          car_type VARCHAR(100) NOT NULL,
          seating_capacity INT NOT NULL DEFAULT 4,
          price_per_day DECIMAL(10,2) DEFAULT 0,
          price_per_km DECIMAL(10,2) DEFAULT 0,
          image_url TEXT NOT NULL,
          features TEXT,
          status TINYINT(1) DEFAULT 1,
          created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // Fetch cars
        $cars = [];
        // Select only columns we use in the table to avoid legacy schema issues
        $sql = "SELECT id, car_name, car_model, car_type, seating_capacity, price_per_day, price_per_km, image_url, features, status FROM cars ORDER BY id DESC";
        $carQueryOk = false;
        if ($result = $conn->query($sql)) {
          $carQueryOk = true;
          while ($row = $result->fetch_assoc()) { $cars[] = $row; }
          $result->free();
        }
        if (!$carQueryOk) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
             . '<strong>DB Error:</strong> ' . htmlspecialchars($conn->error) .
             '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
             . '</div>';
        }
        
        // Debug info (remove in production)
        if (count($cars) === 0) {
          echo '<div class="alert alert-info">Debug: Found ' . count($cars) . ' cars in database. Query: ' . htmlspecialchars($sql) . '</div>';
        }
      ?>

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
            <h5 class="card-title m-0">All Cars</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carModal" onclick="openAddCar()">
              <i class="bi bi-plus-lg"></i> Add Car
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Car Name</th>
                  <th>Model</th>
                  <th>Type</th>
                  <th>Capacity</th>
                  <th>Price/Day</th>
                  <th>Price/KM</th>
                  <th>Features</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($cars) === 0): ?>
                  <tr><td colspan="10" class="text-center">No cars found</td></tr>
                <?php else: ?>
                  <?php foreach ($cars as $i => $c): ?>
                    <tr>
                      <td><?= $i + 1 ?></td>
                      <td><?= htmlspecialchars($c['car_name']) ?></td>
                      <td><?= htmlspecialchars($c['car_model']) ?></td>
                      <td><?= htmlspecialchars($c['car_type']) ?></td>
                      <td><?= (int)$c['seating_capacity'] ?> seats</td>
                      <td>₹<?= number_format((float)$c['price_per_day']) ?></td>
                      <td>₹<?= number_format((float)$c['price_per_km']) ?></td>
                      <td><?= htmlspecialchars(substr($c['features'] ?? '', 0, 50)) ?><?= strlen($c['features'] ?? '') > 50 ? '...' : '' ?></td>
                      <td>
                        <?php if ((int)$c['status'] === 1): ?>
                          <span class="badge bg-success">Active</span>
                        <?php else: ?>
                          <span class="badge bg-secondary">Inactive</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick='openEditCar(<?= json_encode($c, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP) ?>)'>Edit</button>
                        <a class="btn btn-sm btn-outline-danger" href="./process/car_delete.php?id=<?= (int)$c['id'] ?>" onclick="return confirm('Delete this car?');">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Add/Edit Car Modal -->
      <div class="modal fade" id="carModal" tabindex="-1" aria-labelledby="carModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="carModalLabel">Add Car</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="./process/car_save.php" enctype="multipart/form-data">
              <input type="hidden" name="id" id="car_id">
              <input type="hidden" name="existing_image_url" id="car_existing_image_url">
              <div class="modal-body">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Car Name</label>
                    <input type="text" class="form-control" name="car_name" id="car_name" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Car Model</label>
                    <input type="text" class="form-control" name="car_model" id="car_model" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Car Type</label>
                    <select class="form-select" name="car_type" id="car_type" required>
                      <option value="">Select Type</option>
                      <option value="Sedan">Sedan</option>
                      <option value="SUV">SUV</option>
                      <option value="Hatchback">Hatchback</option>
                      <option value="Luxury">Luxury</option>
                      <option value="Tempo Traveller">Tempo Traveller</option>
                      <option value="Bus">Bus</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Seating Capacity</label>
                    <input type="number" class="form-control" name="seating_capacity" id="seating_capacity" min="2" max="50" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Price per Day (₹)</label>
                    <input type="number" step="0.01" class="form-control" name="price_per_day" id="price_per_day" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Price per KM (₹)</label>
                    <input type="number" step="0.01" class="form-control" name="price_per_km" id="price_per_km" required>
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Car Image</label>
                    <input type="file" class="form-control" name="image_file" id="car_image_file" accept="image/*">
                    <input type="hidden" name="cropped_image" id="cropped_image">
                    <small class="text-muted d-block mb-2">Upload a JPG/PNG/WebP image (max ~5MB). After selecting, crop will open automatically.</small>
                    <img id="car_image_preview" src="" alt="Preview" style="max-height:150px; display:none; border:1px solid #eee; padding:4px; border-radius:6px;" />
                  </div>
                  
                  <div class="col-md-12">
                    <label class="form-label">Features</label>
                    <textarea class="form-control" name="features" id="car_features" rows="3" placeholder="e.g., AC, GPS, Music System, etc."></textarea>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" id="car_status" required>
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
        function clearCar(){
          document.getElementById('car_id').value = '';
          document.getElementById('car_name').value = '';
          document.getElementById('car_model').value = '';
          document.getElementById('car_type').value = '';
          document.getElementById('seating_capacity').value = '';
          document.getElementById('price_per_day').value = '';
          document.getElementById('price_per_km').value = '';
          const f = document.getElementById('car_image_file');
          if (f) { f.value = ''; }
          document.getElementById('car_existing_image_url').value = '';
          const prev = document.getElementById('car_image_preview');
          if (prev) { prev.src = ''; prev.style.display = 'none'; }
          document.getElementById('car_features').value = '';
          document.getElementById('car_status').value = '1';
        }
        function openAddCar(){
          clearCar();
          document.getElementById('carModalLabel').innerText = 'Add Car';
        }
        function openEditCar(c){
          document.getElementById('carModalLabel').innerText = 'Edit Car';
          document.getElementById('car_id').value = c.id || '';
          document.getElementById('car_name').value = c.car_name || '';
          document.getElementById('car_model').value = c.car_model || '';
          document.getElementById('car_type').value = c.car_type || '';
          document.getElementById('seating_capacity').value = c.seating_capacity || '';
          document.getElementById('price_per_day').value = c.price_per_day || '';
          document.getElementById('price_per_km').value = c.price_per_km || '';
          document.getElementById('car_existing_image_url').value = c.image_url || '';
          const prev = document.getElementById('car_image_preview');
          if (c.image_url) { prev.src = c.image_url; prev.style.display = 'inline'; } else { prev.src = ''; prev.style.display = 'none'; }
          document.getElementById('car_features').value = c.features || '';
          document.getElementById('car_status').value = (String(c.status) === '0' ? '0' : '1');
          var modal = new bootstrap.Modal(document.getElementById('carModal'));
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
      const fileInput = document.getElementById('car_image_file');
      const preview = document.getElementById('car_image_preview');
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