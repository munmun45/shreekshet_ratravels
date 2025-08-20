<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:30 GMT -->
<head>
  
<?php include 'config/meta.php'; ?>
<?php
// Frontend DB connection & data fetch for cars
require_once __DIR__ . '/config/config.php';
if (!isset($conn) || !($conn instanceof mysqli)) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "shreekshetra_travels";
  $conn = @new mysqli($servername, $username, $password, $dbname);
  if ($conn && !$conn->connect_error) { @mysqli_set_charset($conn, 'utf8mb4'); }
}

$cars = [];
$car_types = [];
if ($conn && !$conn->connect_error) {
  $sql = "SELECT id, car_name, car_model, car_type, seating_capacity, price_per_day, price_per_km, image_url, features FROM cars WHERE status=1 ORDER BY id DESC";
  if ($res = $conn->query($sql)) {
    while ($row = $res->fetch_assoc()) {
      $cars[] = $row;
      $c = trim((string)$row['car_type']);
      if ($c !== '') { $car_types[$c] = true; }
    }
    $res->free();
  }
}

function type_slug($s) {
  $s = strtolower($s);
  $s = preg_replace('/[^a-z0-9]+/','-',$s);
  return trim($s, '-');
}
?>


    <style>
        
        
        
        
        .cars-grid {
            padding: 50px 0;
        }
        
        .car-item {
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }
        
        .car-item.hidden {
            display: none;
        }
        
        .car-box {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .car-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .car-box figure {
            position: relative;
            overflow: hidden;
            height: 200px;
            margin: 0;
        }
        
        .car-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .car-box:hover img {
            transform: scale(1.1);
        }
        
        .price-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #ff6b6b;
            color: white;
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
        }
        
        .type-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            text-transform: uppercase;
        }
        
        .capacity-tag {
            position: absolute;
            bottom: 15px;
            left: 15px;
            background: rgba(102, 126, 234, 0.9);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .bottom-con {
            padding: 20px;
        }
        .book-now-btn{

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
        
        .location {
            color: #667eea;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .car-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            text-decoration: none;
        }
        
        .car-title:hover {
            color: #667eea;
            text-decoration: none;
        }
        
        .car-model {
            color: #888;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .price-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .price-per-day, .price-per-km {
            font-size: 12px;
            color: #667eea;
            font-weight: 600;
        }
        
        .rating {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #ffa500;
            font-size: 14px;
        }
        
        .rating .reviews {
            color: #888;
            margin-left: 5px;
        }
        
        .no-results {
            text-align: center;
            padding: 50px 0;
            color: #888;
        }
        
        .no-results i {
            font-size: 60px;
            margin-bottom: 20px;
            color: #ddd;
        }

        .filter-btn{
            background-color: #1ec28b;
    padding: 5px 10px;
    border: none;
    outline: none;
    border-radius: 5px;
    margin-top: 26px;
    color: white;
    font-weight: 500;
        }
        
        /* Large screens: center and allow wrapping */
        @media (min-width: 768px) {
            .filter-tabs {
                justify-content: center;
                flex-wrap: wrap;
                overflow: visible;
            }
            .filter-btn {
                font-size: 16px;
            }
        }

        /* Optional: nicer thin scrollbar for horizontal chips on small screens */
        .filter-tabs::-webkit-scrollbar {
            height: 6px;
        }
        .filter-tabs::-webkit-scrollbar-thumb {
            background: rgba(102, 126, 234, 0.4);
            border-radius: 10px;
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
                            <h1>Car Rentals</h1>
                            <p class="font-size-20">Choose from our wide range of comfortable and reliable cars for your journey. From economy cars to luxury vehicles, we have the perfect ride for every occasion.
                            </p>
                            <div class="breadcrumb-con d-inline-block" data-aos="fade-up" data-aos-duration="600">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Car Rentals</li>
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



    
















    <div class="container">
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all">All Cars</button>
                <?php foreach (array_keys($car_types) as $type): $slug = type_slug($type); ?>
                  <button class="filter-btn" data-filter="<?= htmlspecialchars($slug) ?>">
                    <?= htmlspecialchars($type) ?>
                  </button>
                <?php endforeach; ?>
            </div>
            
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search cars..." style="padding: 10px; margin-top: 20px;" >
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Book Car</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form id="bookingForm">
              <input type="hidden" name="activity_id" id="bk_activity_id">
              <input type="hidden" name="activity_title" id="bk_activity_title">
              <div class="mb-3">
                <label class="form-label">Car</label>
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

    <!-- CARS GRID -->
    <section class="cars-grid">
        <div class="container">
            <div class="row" id="carsGrid">
              <?php if (empty($cars)): ?>
                <div class="col-12">
                  <div class="no-results" style="display:block;">
                    <i class="fas fa-car"></i>
                    <h3>No cars found</h3>
                    <p>Try adjusting your search criteria or filters</p>
                  </div>
                </div>
              <?php else: ?>
                <?php foreach ($cars as $c):
                  $car_name = htmlspecialchars($c['car_name']);
                  $car_model = htmlspecialchars($c['car_model']);
                  $car_type = htmlspecialchars($c['car_type']);
                  $typeSlug = type_slug($c['car_type']);
                  $capacity = (int)$c['seating_capacity'];
                  $price_day = number_format((float)$c['price_per_day']);
                  $price_km = number_format((float)$c['price_per_km']);
                  $img = htmlspecialchars($c['image_url']);
                  $features = htmlspecialchars($c['features'] ?? '');
                  $search = htmlspecialchars($c['car_name'].' '.$c['car_model'].' '.$c['car_type']);
                ?>
                <div class="col-lg-4 col-md-6 car-item" data-category="<?= $typeSlug ?>" data-name="<?= $search ?>">
                  <div class="car-box">
                    <figure>
                      <img src="<?= $img ?>" alt="<?= $car_name ?>">
                      <div class="type-tag"><?= $car_type ?></div>
                      
                    </figure>
                    <div class="bottom-con">
                      <div class="location"><?= $car_model ?></div>
                      <a href="#" class="car-title"><?= $car_name ?></a>
                      <div class="price-info">
                        <span class="price-per-day">₹<?= $price_day ?>/day</span>
                        <span class="price-per-km">₹<?= $price_km ?>/km</span>
                      </div>
                      <?php if ($features): ?>
                        <div class="car-features" style="font-size: 12px; color: #888; margin-bottom: 10px;">
                          <?= substr($features, 0, 50) ?><?= strlen($features) > 50 ? '...' : '' ?>
                        </div>
                      <?php endif; ?>
                      <div class="rating">
                        
                        <span class="reviews"><?= $capacity ?> seats</span>
                      </div>
                    </div>
                    <button class="view-trip-btn book-now-btn"
                            data-activity-id="<?= (int)$c['id'] ?>"
                            data-activity-title="<?= $car_name ?>">
                      Book Now
                    </button>
                  </div>
                </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            
            <div class="no-results" id="noResults" style="display: none;">
                <i class="fas fa-car"></i>
                <h3>No cars found</h3>
                <p>Try adjusting your search criteria or filters</p>
            </div>
        </div>
    </section>








 







  
  <?php include 'config/footer.php'; ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        (function(){
          function openBookingModal(activityId, activityTitle){
            document.getElementById('bk_activity_id').value = activityId;
            document.getElementById('bk_activity_title').value = activityTitle;
            document.getElementById('bk_activity_title_display').value = activityTitle;
            const alertBox = document.getElementById('bk_alert');
            if (alertBox) alertBox.className = 'alert d-none';
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
          if (dateInput) {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth()+1).padStart(2,'0');
            const dd = String(today.getDate()).padStart(2,'0');
            dateInput.min = `${yyyy}-${mm}-${dd}`;
          }

          const form = document.getElementById('bookingForm');
          if (form) {
            form.addEventListener('submit', async function(e){
              e.preventDefault();
              const submitBtn = document.getElementById('bk_submit');
              const alertBox = document.getElementById('bk_alert');
              alertBox.className = 'alert d-none';
              submitBtn.disabled = true;
              try {
                const fd = new FormData(form);
                const res = await fetch('process/destination_booking.php', {
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
          }
        })();

        class CarFilter {
            constructor() {
                this.cars = document.querySelectorAll('.car-item');
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
                
                this.cars.forEach(car => {
                    const category = car.dataset.category;
                    const name = car.dataset.name.toLowerCase();
                    
                    const matchesFilter = this.currentFilter === 'all' || 
                                        category.includes(this.currentFilter);
                    const matchesSearch = this.currentSearch === '' || 
                                        name.includes(this.currentSearch);
                    
                    if (matchesFilter && matchesSearch) {
                        car.classList.remove('hidden');
                        car.style.display = 'block';
                        visibleCount++;
                        
                        // Add animation
                        setTimeout(() => {
                            car.style.opacity = '1';
                            car.style.transform = 'translateY(0)';
                        }, visibleCount * 50);
                    } else {
                        car.classList.add('hidden');
                        car.style.display = 'none';
                        car.style.opacity = '0';
                        car.style.transform = 'translateY(20px)';
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
            new CarFilter();
            
            // Add smooth scroll animation for better UX
            const style = document.createElement('style');
            style.textContent = `
                .car-item {
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