<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:30 GMT -->
<head>
  
<?php include 'config/meta.php'; ?>
<?php
// Frontend DB connection & data fetch
require_once __DIR__ . '/config/config.php';
if (!isset($conn) || !($conn instanceof mysqli)) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "shreekshetra_travels";
  $conn = @new mysqli($servername, $username, $password, $dbname);
  if ($conn && !$conn->connect_error) { @mysqli_set_charset($conn, 'utf8mb4'); }
}

$activities = [];
$categories = [];
if ($conn && !$conn->connect_error) {
  $sql = "SELECT id, title, location, category, price, duration, image_url, short_desc FROM activities WHERE status=1 ORDER BY id DESC";
  if ($res = $conn->query($sql)) {
    while ($row = $res->fetch_assoc()) {
      $activities[] = $row;
      $c = trim((string)$row['category']);
      if ($c !== '') { $categories[$c] = true; }
    }
    $res->free();
  }
}

function cat_slug($s) {
  $s = strtolower($s);
  $s = preg_replace('/[^a-z0-9]+/','-',$s);
  return trim($s, '-');
}
?>


<style>
        
        
        
        
        .destinations-grid {
            padding: 60px 0;
        }
        
        .destination-item {
            margin-bottom: 40px;
            transition: all 0.3s ease;
        }
        
        .destination-item.hidden {
            display: none;
        }
        
        .destination-box {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
        }
        
        .destination-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }
        
        .destination-box figure {
            position: relative;
            overflow: hidden;
            height: 250px;
            margin: 0;
        }
        
        .destination-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .destination-box:hover img {
            transform: scale(1.05);
        }
        
        .price-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, #ff6b6b, #ff5722);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(255, 107, 107, 0.3);
        }
        
        .activity-tag {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #4ecdc4, #44a08d);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
            box-shadow: 0 3px 10px rgba(78, 205, 196, 0.3);
        }
        
        .bottom-con {
            padding: 25px;
        }
        
        .location {
            color: #667eea;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .destination-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            text-decoration: none;
            line-height: 1.3;
        }
        
        .destination-title:hover {
            color: #667eea;
            text-decoration: none;
        }
        
        .activity-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }
        
        .activity-chip {
            background: #f8f9fa;
            color: #495057;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
        }
        
        .rating {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .rating-stars {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #ffa500;
            font-size: 14px;
        }
        
        .rating .reviews {
            color: #888;
            font-size: 13px;
        }
        
        .duration-days {
            background: #e3f2fd;
            color: #1976d2;
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .no-results {
            text-align: center;
            padding: 80px 0;
            color: #888;
        }
        
        .no-results i {
            font-size: 80px;
            margin-bottom: 30px;
            color: #ddd;
        }
        
        .view-trip-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
        
        .view-trip-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        @media (max-width: 768px) {
            .banner-section h1 {
                font-size: 2.5rem;
            }
            
            .filter-tabs {
                overflow-x: auto;
                padding: 10px 0;
            }
            
            .filter-btn {
                white-space: nowrap;
                min-width: max-content;
            }
        }
    </style>

</head>

<body>





<div class="bg-outer-wrapper sub-banner-outer-wrapper float-left w-100">

<?php include 'config/header.php'; ?>
        <!-- BANNER SECTION -->
        <section class="float-left w-100 banner-con sub-banner-con position-relative main-box">
            <img alt="vector" class="vector1  img-fluid position-absolute" src="assets/images/vector1.png">
            <img alt="vector" class="vector2 img-fluid position-absolute" src="assets/images/vector2.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="sub-banner-inner-con padding-bottom">
                            <h1>Activities</h1>
                            <p class="font-size-20">Discover the best of Puri & Odisha — Jagannath Temple, Konark Sun
                                Temple, Chilika Lake, heritage villages — along with handpicked world destinations.
                            </p>
                            <div class="breadcrumb-con d-inline-block" data-aos="fade-up" data-aos-duration="600">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Activities</li>
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



    
















   


    <section class="filter-section">
                <div class="container">
                    <div class="filter-tabs">
                        <button class="filter-btn active" data-filter="all">All Activities</button>
                        <?php foreach (array_keys($categories) as $cat): $slug = cat_slug($cat); ?>
                          <button class="filter-btn" data-filter="<?= htmlspecialchars($slug) ?>">
                            <?= htmlspecialchars($cat) ?>
                          </button>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="Search activities...">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                </div>
            </section>

            <!-- Booking Modal -->
            <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Book Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <form id="bookingForm">
                      <input type="hidden" name="activity_id" id="bk_activity_id">
                      <input type="hidden" name="activity_title" id="bk_activity_title">
                      <div class="mb-3">
                        <label class="form-label">Activity</label>
                        <input type="text" class="form-control" id="bk_activity_title_display" disabled>
                      </div>
                      <div class="mb-3">
                        <label for="bk_date" class="form-label">Select Date</label>
                        <input type="date" class="form-control" id="bk_date" name="date" required>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="bk_adults" class="form-label">Total Adults</label>
                          <input type="number" class="form-control" id="bk_adults" name="adults" min="1" step="1" value="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="bk_children" class="form-label">Total Children</label>
                          <input type="number" class="form-control" id="bk_children" name="children" min="0" step="1" value="0">
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="bk_mobile" class="form-label">Mobile Number</label>
                        <input type="tel" class="form-control" id="bk_mobile" name="mobile" pattern="[0-9]{10}" maxlength="10" placeholder="10-digit mobile" required>
                      </div>
                      <div class="mb-3">
                        <label for="bk_email" class="form-label">Email (optional)</label>
                        <input type="email" class="form-control" id="bk_email" name="email" placeholder="example@domain.com">
                      </div>
                      <div id="bk_alert" class="alert d-none" role="alert"></div>
                      <button type="submit" class="btn btn-primary w-100" id="bk_submit">Submit Booking</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <script>
            (function(){
              function openBookingModal(activityId, activityTitle){
                document.getElementById('bk_activity_id').value = activityId;
                document.getElementById('bk_activity_title').value = activityTitle;
                document.getElementById('bk_activity_title_display').value = activityTitle;
                document.getElementById('bk_alert').className = 'alert d-none';
                if (window.jQuery && $('#bookingModal').modal) {
                  $('#bookingModal').modal('show');
                } else {
                  var modalEl = document.getElementById('bookingModal');
                  modalEl.style.display = 'block';
                }
              }

              document.addEventListener('click', function(e){
                const btn = e.target.closest('.book-now-btn');
                if (!btn) return;
                e.preventDefault();
                const id = btn.getAttribute('data-activity-id');
                const title = btn.getAttribute('data-activity-title');
                openBookingModal(id, title);
              });

              // Set min date = today
              const dateInput = document.getElementById('bk_date');
              const today = new Date();
              const yyyy = today.getFullYear();
              const mm = String(today.getMonth()+1).padStart(2,'0');
              const dd = String(today.getDate()).padStart(2,'0');
              dateInput.min = `${yyyy}-${mm}-${dd}`;

              const form = document.getElementById('bookingForm');
              form.addEventListener('submit', async function(e){
                e.preventDefault();
                const submitBtn = document.getElementById('bk_submit');
                const alertBox = document.getElementById('bk_alert');
                alertBox.className = 'alert d-none';
                submitBtn.disabled = true;
                try {
                  const fd = new FormData(form);
                  const res = await fetch('process/activity_booking.php', {
                    method: 'POST',
                    body: fd
                  });
                  const data = await res.json();
                  if (data.success) {
                    alertBox.className = 'alert alert-success';
                    alertBox.textContent = data.message || 'Booking submitted successfully!';
                    form.reset();
                  } else {
                    alertBox.className = 'alert alert-danger';
                    alertBox.textContent = data.message || 'Failed to submit booking.';
                  }
                } catch(err) {
                  alertBox.className = 'alert alert-danger';
                  alertBox.textContent = 'Network or server error. Please try again.';
                } finally {
                  submitBtn.disabled = false;
                }
              });
            })();
            </script>






    <section class="destinations-grid">
                <div class="container">
                    <div class="row" id="destinationsGrid">
                      <?php if (empty($activities)): ?>
                        <div class="col-12">
                          <div class="no-results" style="display:block;">
                            <i class="fas fa-search"></i>
                            <h3>No activities found</h3>
                            <p>Try adjusting your search criteria or filters to discover more Odisha adventures</p>
                          </div>
                        </div>
                      <?php else: ?>
                        <?php foreach ($activities as $a):
                          $title    = htmlspecialchars($a['title']);
                          $loc      = htmlspecialchars($a['location']);
                          $cat      = htmlspecialchars($a['category']);
                          $catSlug  = cat_slug($a['category']);
                          $price    = number_format((float)$a['price']);
                          $duration = htmlspecialchars($a['duration']);
                          $img      = htmlspecialchars($a['image_url']);
                          $search   = htmlspecialchars($a['title'].' '.$a['location'].' '.$a['category']);
                        ?>
                        <div class="col-lg-4 col-md-6 destination-item" data-category="<?= $catSlug ?>" data-name="<?= $search ?>">
                          <div class="destination-box">
                            <figure>
                              <img src="<?= $img ?>" alt="<?= $title ?>">
                              <div class="price-tag">₹<?= $price ?></div>
                              <div class="activity-tag"><?= $cat ?></div>
                            </figure>
                            <div class="bottom-con">
                              <div class="location">
                                <i class="fas fa-map-marker-alt"></i>
                                <?= $loc ?>
                              </div>
                              <a href="#" class="destination-title"><?= $title ?></a>
                              <div class="activity-list">
                                <span class="activity-chip"><?= $cat ?></span>
                              </div>
                              <div class="rating">
                                <div class="rating-stars">
                                  <i class="fa-solid fa-star"></i>
                                  <span>4.8</span>
                                  <span class="reviews">(1k+ Reviews)</span>
                                </div>
                                <div class="duration-days"><?= $duration ?></div>
                              </div>
                            </div>
                            <button class="view-trip-btn book-now-btn" 
                                    data-activity-id="<?= (int)$a['id'] ?>"
                                    data-activity-title="<?= $title ?>"
                                    data-activity-price="<?= $price ?>">
                              Book Now
                            </button>
                          </div>
                        </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                    
                    <div class="no-results" id="noResults" style="display: none;">
                        <i class="fas fa-search"></i>
                        <h3>No activities found</h3>
                        <p>Try adjusting your search criteria or filters to discover more Odisha adventures</p>
                    </div>
                </div>
            </section>










 







  
  <?php include 'config/footer.php'; ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        class DestinationFilter {
            constructor() {
                this.destinations = document.querySelectorAll('.destination-item');
                this.filterButtons = document.querySelectorAll('.filter-btn');
                this.searchInput = document.getElementById('searchInput');
                this.noResults = document.getElementById('noResults');
                this.currentFilter = 'all';
                this.currentSearch = '';
                
                this.initEventListeners();
            }
            
            initEventListeners() {
                // Filter buttons
                this.filterButtons.forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        this.currentFilter = e.target.dataset.filter;
                        this.updateActiveFilter(e.target);
                        this.applyFilters();
                    });
                });
                
                // Search input
                this.searchInput.addEventListener('input', (e) => {
                    this.currentSearch = e.target.value.toLowerCase();
                    this.applyFilters();
                });
            }
            
            updateActiveFilter(activeBtn) {
                this.filterButtons.forEach(btn => btn.classList.remove('active'));
                activeBtn.classList.add('active');
            }
            
            applyFilters() {
                let visibleCount = 0;
                
                this.destinations.forEach(destination => {
                    const category = destination.dataset.category;
                    const name = destination.dataset.name.toLowerCase();
                    
                    const matchesFilter = this.currentFilter === 'all' || 
                                        category.includes(this.currentFilter);
                    const matchesSearch = this.currentSearch === '' || 
                                        name.includes(this.currentSearch);
                    
                    if (matchesFilter && matchesSearch) {
                        destination.classList.remove('hidden');
                        destination.style.display = 'block';
                        visibleCount++;
                        
                        // Add animation
                        setTimeout(() => {
                            destination.style.opacity = '1';
                            destination.style.transform = 'translateY(0)';
                        }, visibleCount * 50);
                    } else {
                        destination.classList.add('hidden');
                        destination.style.display = 'none';
                        destination.style.opacity = '0';
                        destination.style.transform = 'translateY(20px)';
                    }
                });
                
                // Show/hide no results message
                if (visibleCount === 0) {
                    this.noResults.style.display = 'block';
                } else {
                    this.noResults.style.display = 'none';
                }
            }
        }
        
        // Initialize the filter system when the page loads
        document.addEventListener('DOMContentLoaded', () => {
            new DestinationFilter();
            
            // Add smooth scroll animation for better UX
            const style = document.createElement('style');
            style.textContent = `
                .destination-item {
                    opacity: 1;
                    transform: translateY(0);
                    transition: all 0.3s ease;
                }
            `;
            document.head.appendChild(style);
        });
    </script>



</body>


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:31 GMT -->
</html>