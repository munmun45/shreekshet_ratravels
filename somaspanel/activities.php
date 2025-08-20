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
      <h1>Activities Manager</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Activities Manager</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <?php
        // DB connection
        require_once __DIR__ . '/config/config.php';

        // Fetch activities
        $activities = [];
        $sql = "SELECT id, title, location, category, price, duration, image_url, short_desc, status, created_at, updated_at FROM activities ORDER BY id DESC";
        if ($result = $conn->query($sql)) {
          while ($row = $result->fetch_assoc()) { $activities[] = $row; }
          $result->free();
        }
      ?>

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
            <h5 class="card-title m-0">All Activities</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activityModal" onclick="openAdd()">
              <i class="bi bi-plus-lg"></i> Add Activity
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
                  <th>Duration</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($activities) === 0): ?>
                  <tr><td colspan="8" class="text-center">No activities found</td></tr>
                <?php else: ?>
                  <?php foreach ($activities as $i => $a): ?>
                    <tr>
                      <td><?= $i + 1 ?></td>
                      <td><?= htmlspecialchars($a['title']) ?></td>
                      <td><?= htmlspecialchars($a['location']) ?></td>
                      <td><?= htmlspecialchars($a['category']) ?></td>
                      <td>₹<?= number_format((float)$a['price']) ?></td>
                      <td><?= htmlspecialchars($a['duration']) ?></td>
                      <td>
                        <?php if ((int)$a['status'] === 1): ?>
                          <span class="badge bg-success">Active</span>
                        <?php else: ?>
                          <span class="badge bg-secondary">Inactive</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick='openEdit(<?= json_encode($a, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP) ?>)'>Edit</button>
                        <a class="btn btn-sm btn-outline-danger" href="./process/activity_delete.php?id=<?= (int)$a['id'] ?>" onclick="return confirm('Delete this activity?');">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Add/Edit Modal -->
      <div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="activityModalLabel">Add Activity</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="./process/activity_save.php" enctype="multipart/form-data">
              <input type="hidden" name="id" id="form_id">
              <input type="hidden" name="existing_image_url" id="form_existing_image_url">
              <div class="modal-body">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="form_title" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" id="form_location" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" id="form_category" placeholder="e.g., hiking, city-tour" required>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Price (₹)</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="form_price" required>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Duration</label>
                    <input type="text" class="form-control" name="duration" id="form_duration" placeholder="e.g., 2 Days" required>
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image_file" id="form_image_file" accept="image/*">
                    <input type="hidden" name="cropped_image" id="form_cropped_image">
                    <small class="text-muted d-block mb-2">Upload a JPG/PNG/WebP image (max ~5MB). After selecting, crop (16:9) will open automatically. If left empty on Edit, the existing image will be kept.</small>
                    <img id="form_image_preview" src="" alt="Preview" style="max-height:150px; display:none; border:1px solid #eee; padding:4px; border-radius:6px;" />
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_desc" id="form_short_desc" rows="3" required></textarea>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" id="form_status" required>
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
      <div class="modal fade" id="activityCropperModal" tabindex="-1" aria-labelledby="activityCropperModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="activityCropperModalLabel">Crop Image</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div style="max-height:60vh; overflow:auto">
                <img id="activityCropperImage" src="#" alt="To crop" style="max-width:100%; display:block;">
              </div>
              <small class="text-muted d-block mt-2">Aspect ratio 16:9. Drag to select the area. Use mouse wheel or pinch to zoom.</small>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="activityCropperApplyBtn">Crop & Use</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Cropper.js CSS/JS -->
      <link rel="stylesheet" href="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.css">
      <script src="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.js"></script>

      <script>
        function clearForm(){
          document.getElementById('form_id').value = '';
          document.getElementById('form_title').value = '';
          document.getElementById('form_location').value = '';
          document.getElementById('form_category').value = '';
          document.getElementById('form_price').value = '';
          document.getElementById('form_duration').value = '';
          const f = document.getElementById('form_image_file');
          if (f) { f.value = ''; }
          document.getElementById('form_existing_image_url').value = '';
          const hid = document.getElementById('form_cropped_image');
          if (hid) { hid.value = ''; }
          const prev = document.getElementById('form_image_preview');
          if (prev) { prev.src = ''; prev.style.display = 'none'; }
          document.getElementById('form_short_desc').value = '';
          document.getElementById('form_status').value = '1';
        }
        function openAdd(){
          clearForm();
          document.getElementById('activityModalLabel').innerText = 'Add Activity';
        }
        function openEdit(a){
          document.getElementById('activityModalLabel').innerText = 'Edit Activity';
          document.getElementById('form_id').value = a.id || '';
          document.getElementById('form_title').value = a.title || '';
          document.getElementById('form_location').value = a.location || '';
          document.getElementById('form_category').value = a.category || '';
          document.getElementById('form_price').value = a.price || '';
          document.getElementById('form_duration').value = a.duration || '';
          document.getElementById('form_existing_image_url').value = a.image_url || '';
          const prev = document.getElementById('form_image_preview');
          if (a.image_url) { prev.src = a.image_url; prev.style.display = 'inline'; } else { prev.src = ''; prev.style.display = 'none'; }
          document.getElementById('form_short_desc').value = a.short_desc || '';
          document.getElementById('form_status').value = (String(a.status) === '0' ? '0' : '1');
          var modal = new bootstrap.Modal(document.getElementById('activityModal'));
          modal.show();
        }

        // Cropper.js logic
        (function(){
          let cropper = null;
          const fileInput = document.getElementById('form_image_file');
          const preview = document.getElementById('form_image_preview');
          const hiddenInput = document.getElementById('form_cropped_image');
          const imgEl = document.getElementById('activityCropperImage');
          const applyBtn = document.getElementById('activityCropperApplyBtn');
          const modalEl = document.getElementById('activityCropperModal');
          let bsModal = null;

          function openModal(){
            if (!bsModal) { bsModal = new bootstrap.Modal(modalEl); }
            bsModal.show();
          }
          function destroyCropper(){ if (cropper) { cropper.destroy(); cropper = null; } }
          function initCropper(){
            destroyCropper();
            cropper = new Cropper(imgEl, {
              aspectRatio: 16/9,
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
              hiddenInput.value = '';
              preview.style.display = 'none';
              imgEl.onload = function(){ initCropper(); openModal(); };
            };
            reader.readAsDataURL(file);
          });
          applyBtn.addEventListener('click', function(){
            if (!cropper) return;
            const canvas = cropper.getCroppedCanvas({ maxWidth: 1600, maxHeight: 1600 });
            if (!canvas) return;
            const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
            hiddenInput.value = dataUrl;
            preview.src = dataUrl;
            preview.style.display = 'inline-block';
            if (bsModal) { bsModal.hide(); }
            destroyCropper();
          });
          modalEl.addEventListener('hidden.bs.modal', function(){ destroyCropper(); });
        })();
      </script>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->






  <?= require("./config/footer.php") ?>




</body>

</html>