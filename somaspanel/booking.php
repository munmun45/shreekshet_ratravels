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
      <h1>Booking Manager</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Booking Manager</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <?php
        // Load DB
        require_once __DIR__ . '/config/config.php'; // provides $conn

        // Ensure status column exists (safe check for broad compatibility)
        $hasStatus = false;
        $chk = $conn->query("SHOW COLUMNS FROM activity_bookings LIKE 'status'");
        if ($chk && $chk->num_rows > 0) { $hasStatus = true; }
        if ($chk) { $chk->close(); }
        if (!$hasStatus) {
          // Fallback add (ignore error if already exists)
          @$conn->query("ALTER TABLE activity_bookings ADD COLUMN status VARCHAR(20) NOT NULL DEFAULT 'pending'");
        }

        // Fetch bookings
        $rows = [];
        $sql = "SELECT id, activity_id, activity_title, travel_date, adults, children, mobile, email, created_at, 
                       COALESCE(status, 'pending') AS status
                FROM activity_bookings
                ORDER BY created_at DESC, id DESC";
        if ($res = $conn->query($sql)) {
          while ($r = $res->fetch_assoc()) { $rows[] = $r; }
          $res->close();
        }
      ?>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Bookings</h5>

          <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Activity</th>
                  <th>Date</th>
                  <th>Adults</th>
                  <th>Children</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Created</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($rows)): ?>
                  <tr><td colspan="9" class="text-center">No bookings found.</td></tr>
                <?php else: ?>
                  <?php foreach ($rows as $bk): ?>
                    <tr data-id="<?= (int)$bk['id'] ?>">
                      <td><?= (int)$bk['id'] ?></td>
                      <td>
                        <div class="fw-semibold"><?= htmlspecialchars($bk['activity_title']) ?></div>
                        <small class="text-muted">ID: <?= (int)$bk['activity_id'] ?></small>
                      </td>
                      <td><?= htmlspecialchars($bk['travel_date']) ?></td>
                      <td><?= (int)$bk['adults'] ?></td>
                      <td><?= (int)$bk['children'] ?></td>
                      <td><a href="tel:<?= htmlspecialchars($bk['mobile']) ?>"><?= htmlspecialchars($bk['mobile']) ?></a></td>
                      <td><?php if (!empty($bk['email'])): ?><a href="mailto:<?= htmlspecialchars($bk['email']) ?>"><?= htmlspecialchars($bk['email']) ?></a><?php endif; ?></td>
                      <td style="min-width: 160px;">
                        <?php $status = htmlspecialchars($bk['status']); ?>
                        <select class="form-select form-select-sm bk-status">
                          <option value="pending"   <?= $status==='pending'?'selected':'' ?>>Pending</option>
                          <option value="confirmed" <?= $status==='confirmed'?'selected':'' ?>>Confirmed</option>
                          <option value="cancelled" <?= $status==='cancelled'?'selected':'' ?>>Cancelled</option>
                          <option value="completed" <?= $status==='completed'?'selected':'' ?>>Completed</option>
                        </select>
                      </td>
                      <td><small class="text-muted"><?= htmlspecialchars($bk['created_at']) ?></small></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div id="statusAlert" class="alert d-none mt-3" role="alert"></div>
        </div>
      </div>

      <script>
        (function(){
          function showMsg(ok, msg){
            var el = document.getElementById('statusAlert');
            if(!el) return;
            el.classList.remove('d-none','alert-success','alert-danger');
            el.classList.add(ok ? 'alert-success' : 'alert-danger');
            el.textContent = msg || (ok ? 'Updated' : 'Failed');
            setTimeout(()=>{ el.classList.add('d-none'); }, 2500);
          }

          document.addEventListener('change', function(e){
            if(e.target && e.target.classList.contains('bk-status')){
              var tr = e.target.closest('tr');
              var id = tr ? tr.getAttribute('data-id') : null;
              var status = e.target.value;
              if(!id) return;

              var form = new FormData();
              form.append('id', id);
              form.append('status', status);

              fetch('process/booking_status.php', { method:'POST', body: form })
                .then(r=>r.json()).then(function(j){
                  showMsg(j.success, j.message);
                })
                .catch(function(){ showMsg(false, 'Network error'); });
            }
          });
        })();
      </script>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->







  <?= require("./config/footer.php") ?>




</body>

</html>