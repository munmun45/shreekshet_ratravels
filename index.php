<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.designingmedia.com/traveltrek/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:05 GMT -->

<head>

    <?php include 'config/meta.php'; ?>


    <style>
      /* Base Book Now button styling */
      .book-now-btn{
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff !important;
        padding: 8px 18px;
        border-radius: 20px;
        border: none;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(118, 75, 162, 0.3);
        cursor: pointer;
        line-height: 1.2;
      }
      .book-now-btn:hover{
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(118, 75, 162, 0.4);
        opacity: 0.95;
      }
      .book-now-btn:active{
        transform: translateY(0);
        box-shadow: 0 6px 16px rgba(118, 75, 162, 0.35);
      }
      /* Positioning in destination cards */
      .destination-box { position: relative; }
      .destination-box .book-now-btn{
        position: absolute;
        bottom: 20px;
        right: 20px;
      }
      /* Inline in latest packages row */
      .pkg-btn-con .book-now-btn{
        position: static;
        display: inline-block;
        padding: 8px 16px;
        border-radius: 18px;
        box-shadow: 0 6px 16px rgba(118, 75, 162, 0.25);
      }
    </style>

</head>

<body>
    <!-- LOADER -->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- OUTER BG WRAPPER -->
    <div class="bg-outer-wrapper float-left w-100">


        <?php include 'config/header.php'; ?>






        <!-- BANNER SECTION -->
        <section class="float-left w-100 banner-con position-relative main-box">
            <img alt="vector" class="vector1 img-fluid position-absolute" src="assets/images/vector1.png">
            <img alt="vector" class="vector2 img-fluid position-absolute" src="assets/images/vector2.png">
            <img alt="vector" class="vector3 img-fluid position-absolute" src="assets/images/vector3.png">
            <div class="container">
                <!-- Carousel -->
                <div class="owl-carousel">

                    <!-- Slide 1 -->
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-xl-0 order-lg-0 order-1">
                                <div class="banner-inner-content">
                                    <h4>Welcome to Shreekshetra Travels <i class="fa-solid fa-earth-americas"></i></h4>
                                    <h1>Plan Your Divine Journey with Us!</h1>
                                    <p class="font-size-20">Experience seamless travel services to sacred places and beyond.</p>
                                   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <figure class="banner-image-con">
                                    <img src="assets/images/home-banner-image.png" alt="Shreekshetra Travels" class="">
                                </figure>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-xl-0 order-lg-0 order-1">
                                <div class="banner-inner-content">
                                    <h4>Explore Holy Destinations <i class="fa-solid fa-om"></i></h4>
                                    <h1>Comfortable Trips, Divine Blessings</h1>
                                    <p class="font-size-20">From Puri Jagannath Dham to pan-India pilgrimages, we take you closer to divinity.</p>
                                    <div class="green-btn d-inline-block">
                                        <a href="./activities.php" class="d-inline-block">Explore Packages</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <figure class="banner-image-con">
                                    <img src="assets/images/home-banner-image.png" alt="Travel with Shreekshetra" class="">
                                </figure>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-xl-0 order-lg-0 order-1">
                                <div class="banner-inner-content">
                                    <h4>Shreekshetra Travels <i class="fa-solid fa-bus"></i></h4>
                                    <h1>Your Trusted Travel Companion</h1>
                                    <p class="font-size-20">Safe rides, affordable packages, and unforgettable journeys for families and groups.</p>
                                    <div class="green-btn d-inline-block">
                                        <a href="./destination.php" class="d-inline-block">Start Your Journey</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <figure class="banner-image-con">
                                    <img src="assets/images/home-banner-image.png" alt="Bus & Travel Services" class="">
                                </figure>
                            </div>
                        </div>
                    </div>

                    <!-- owl carousel -->
                </div>
                <!-- container -->
            </div>
            <!-- banner con -->
        </section>










        <!-- SEARCH BOOKING TAB SECTION -->
        <div class="float-left w-100 search-booking-tab-con position-relative main-box" style="margin-bottom: 50px;" >
            <div class="container wow bounceInUp" data-wow-duration="2s">
                <ul class="nav nav-tabs text-center align-items-center justify-content-between" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="hotel-tab" data-toggle="tab" data-target="#hotel" type="button" role="tab" aria-controls="hotel" aria-selected="true"> <img class="img-fluid d-block" src="assets/images/hotel-icon.png" alt="icon"> Hotels</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="cursor: not-allowed;" class="nav-link disabled" id="car-tab" data-target="#car" type="button" role="tab" aria-controls="car" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/car-rental-icon.png" alt="icon"> Car
                            Rentals</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="cursor: not-allowed;" class="nav-link disabled" id="flight-tab" data-target="#flight" type="button" role="tab" aria-controls="flight" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/flight-icon.png" alt="icon"> Flights</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="cursor: not-allowed;" class="nav-link disabled" id="trip-tab" data-target="#trip" type="button" role="tab" aria-controls="trip" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/trip-icon.png" alt="icon"> Trips</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="cursor: not-allowed;" class="nav-link disabled" id="cruise-tab" data-target="#cruise" type="button" role="tab" aria-controls="cruise" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/cruise-icon.png" alt="icon"> Cruises</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="cursor: not-allowed;" class="nav-link disabled" id="activity-tab" data-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/activity-icon.png" alt="icon"> Activities</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                        <div class="tab-inner-con text-left">

                            <div class="destination-con">
                                <label for="destination">Destination</label>
                                <input type="text" class="form-control" placeholder="" id="destination">
                                <!-- col -->
                            </div>
                            <div class="checkin-con">
                                <label for="checkin">Check in</label>
                                <input type="date" class="form-control" id="checkin" name="checkin" required="">
                                <!-- col -->
                            </div>
                            <div class="checkout-con">
                                <label for="checkout">Check Out</label>
                                <input type="date" class="form-control" id="checkout" name="checkout" required="">
                                <!-- col -->
                            </div>
                            <div class="adults-con">
                                <label for="adults">Adults </label>
                                <select class="form-select" id="adults" onchange="javascript: dynamicDropDown(this.options[this.selectedIndex].value);">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                                <!-- col -->
                            </div>
                            <div class="children-con">
                                <label for="children">Children </label>
                                <select class="form-select" id="children">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <!-- col -->
                            </div>
                            <!-- tab-inner-con -->
                        </div>
                        <div class="green-btn d-inline-block">
                            <a href="#" class="d-inline-block hotel-book-now-btn">Book Now</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="car" role="tabpanel" aria-labelledby="car-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="trip" role="tabpanel" aria-labelledby="trip-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="cruise" role="tabpanel" aria-labelledby="cruise-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                        
                    </div>
                </div>
                <!-- container -->
            </div>
            <!-- search booking tab con -->
        </div>










        <!-- bg outer wrapper -->
    </div>





    <!-- TOP DESTINATIONS SECTION -->
    <section class="float-left w-100 top-destinations-con position-relative padding-top padding-bottom main-box">
        <img alt="vector" class="vector4 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector4.png">
        <img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector5.png">
        <div class="container top-destination-con1 wow bounceInUp" data-wow-duration="2s">

            <div class="heading-title text-center">  
                <h4 class="text-uppercase">Car Rentals</h4>  
                <h2 class="">Comfortable Rides to Temples & Beaches <br> in Puri</h2>  
            </div>

            <div class="owl-carousel">
                <?php
                // Build/Reuse DB connection (reuse $conn if already set earlier)
                if (!isset($conn) || !($conn instanceof mysqli) || $conn->connect_error) {
                  require_once __DIR__ . '/config/config.php';
                  if (!isset($conn) || !($conn instanceof mysqli)) {
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $dbname = 'shreekshetra_travels';
                    $conn = @new mysqli($servername, $username, $password, $dbname);
                    if ($conn && !$conn->connect_error) {
                      @mysqli_set_charset($conn, 'utf8mb4');
                    }
                  }
                }

                $puriDestinations = [];
                if ($conn && !$conn->connect_error) {
                  $sql = "SELECT id, title, location, category, price, image_url
                            FROM destinations
                            WHERE status=1 AND (location LIKE '%Puri%' OR title LIKE '%Puri%')
                            ORDER BY id DESC";
                  if ($res = $conn->query($sql)) {
                    while ($row = $res->fetch_assoc()) {
                      $puriDestinations[] = $row;
                    }
                    $res->free();
                  }
                }
                ?>

                <?php if (!empty($puriDestinations)): ?>
                    <?php
                    foreach ($puriDestinations as $d):
                      $title = htmlspecialchars($d['title']);
                      $loc = htmlspecialchars($d['location']);
                      $price = number_format((float) $d['price']);
                      $img = htmlspecialchars($d['image_url']);
                      ?>
                    <div class="item">
                        <div class="destination-box position-relative">
                            <div class="orange-tag position-absolute">₹<?= $price ?></div>
                            <figure><img src="<?= $img ?>" alt="<?= $title ?>" class="img-fluid"></figure>
                            <div class="bottom-con">
                                <span class="d-block text-uppercase"><?= $loc ?></span>
                                <a href="destinations.php">
                                    <h4><?= $title ?></h4>
                                </a>
                                <span class="d-inline-block star-con"><i class="fa-solid fa-star"></i> 4.8 <span class="d-inline-block review-span">(1k+ Reviews)</span></span>
                            </div>
                            <button class="view-trip-btn book-now-btn"
                                    data-activity-id="<?= (int) $d['id'] ?>"
                                    data-activity-title="<?= $title ?>">
                                Book Now
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="item">
                        <div class="destination-box position-relative p-4 text-center">
                            <h6 class="mb-0">No Puri destinations available right now.</h6>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>










    <!-- TRAVEL TOUR AND PACKAGES -->
    <section class="float-left w-100 travel-tour-con position-relative">
        <div class="color-overlay position-relative padding-top padding-bottom main-box">
            <div class="container wow bounceInUp" data-wow-duration="2s">
                <img alt="vector" class="vector7 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector7.png">
                <div class="heading-content text-center position-relative">
                    <h4 class="text-uppercase">Explore wonderful experience</h4>
                    <h2 class="text-white">Visit Popular Destinations <br>
                        in the World</h2>
                </div>


                <div class="tab-content" id="myTabContent1">
                    <!-- Special Deals -->
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="deal-tab">
                        <div class="owl-carousel">
                            <?php
                            // Fetch latest 5 active destinations for homepage carousel
                            require_once __DIR__ . '/config/config.php';
                            if (!isset($conn) || !($conn instanceof mysqli)) {
                              $servername = 'localhost';
                              $username = 'root';
                              $password = '';
                              $dbname = 'shreekshetra_travels';
                              $conn = @new mysqli($servername, $username, $password, $dbname);
                              if ($conn && !$conn->connect_error) {
                                @mysqli_set_charset($conn, 'utf8mb4');
                              }
                            }

                            $latestDestinations = [];
                            if ($conn && !$conn->connect_error) {
                              $sql = 'SELECT id, title, location, category, price, image_url FROM destinations WHERE status=1 ORDER BY id DESC LIMIT 5';
                              if ($res = $conn->query($sql)) {
                                while ($row = $res->fetch_assoc()) {
                                  $latestDestinations[] = $row;
                                }
                                $res->free();
                              }
                            }
                            ?>
                            <?php if (!empty($latestDestinations)): ?>
                                <?php
                                foreach ($latestDestinations as $d):
                                  $title = htmlspecialchars($d['title']);
                                  $loc = htmlspecialchars($d['location']);
                                  $cat = htmlspecialchars($d['category']);
                                  $img = htmlspecialchars($d['image_url']);
                                  $price = number_format((float) $d['price']);
                                  ?>
                                <div class="item">
                                    <div class="package-box">
                                        <span class="d-block location-span"><i class="fa-solid fa-location-dot"></i> <?= $loc ?></span>
                                        <h6><a href="destinations.php"><?= $title ?></a></h6>
                                        <img class="img-fluid" alt="<?= $title ?>" src="<?= $img ?>">
                                        <div class="spans-wrapper">
                                            <span class="d-inline-block"><i class="fas fa-calendar-alt"></i> <?= $cat ?></span>
                                        </div>
                                        <div class="pkg-btn-con d-flex align-items-center justify-content-between">
                                            <span class="person d-inline-block p-0 m-0">
                                                <span class="price d-inline-block p-0 m-0">₹<?= $price ?></span>
                                            </span>
                                            <button class="grey-btn d-inline-block book-now-btn"
                                                    data-activity-id="<?= (int) $d['id'] ?>"
                                                    data-activity-title="<?= $title ?>">
                                                Book Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="item">
                                    <div class="package-box text-center p-4">
                                        <h6 class="mb-0">No destinations available right now.</h6>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- You can copy similar structure for Popular, Recommendation, Best Price if needed -->
                </div>
            </div>
        </div>
    </section>





































    <!-- ABOUT US SECTION -->
    <!-- ABOUT US SECTION -->
    <!-- ABOUT US SECTION -->
    <section class="float-left w-100 about-travel-con position-relative main-box padding-top padding-bottom">
        <img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector5.png">
        <img alt="vector" class="vector6 img-fluid position-absolute" src="assets/images/vector6.png">
        <div class="container wow bounceInUp" data-wow-duration="2s">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-travel-img-con position-relative">
                        <figure class="about-img"><img class="img-fluid" alt="image" src="assets/images/about-travel-img1.jpg"></figure>
                        <figure class="about-img2"><img class="img-fluid" alt="image" src="assets/images/about-travel-img2.jpg"></figure>
                        <div class="best-destination position-absolute">
                            <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube d-block"></i>
                                Explore Spiritual<br>and Holiday Tours</a>
                        </div>
                        <!-- about travel img con -->
                    </div>
                    <!-- col -->
                </div>
                <div class="col-lg-6">
                    <div class="about-travel-content">
                        <h4 class="text-uppercase">About Shreekhetra Travels</h4>
                        <h2>Leading Travel Partner<br>
                            For Pilgrimage & Holidays</h2>
                        <p>Shreekhetra Travels is one of the most trusted travel agencies in Odisha,
                            offering customized packages for pilgrimages, leisure tours, and holiday trips across India.
                            Whether it’s a sacred journey to Jagannath Dham or a family vacation to scenic destinations,
                            we ensure safe, reliable, and memorable experiences.</p>
                        <ul class="list-unstyled p-0 listing">
                            <li class="position-relative"><i class="fa-solid fa-check mr-3"></i>Specialized in Odisha pilgrimages – Puri, Konark, Lingaraj & more.</li>
                            <li class="position-relative"><i class="fa-solid fa-check mr-3"></i>Affordable packages with transport, stay, and guided tours.</li>
                            <li class="position-relative mb-0"><i class="fa-solid fa-check mr-3"></i>Thousands of satisfied customers across India and abroad.</li>
                        </ul>
                        <ul class="list-unstyled p-0 m-0 d-flex align-items-center about-count">
                            <li><span class="d-inline-block counter">10</span><span class="mb-0 plus1 d-inline-block">+</span><br>
                                Years<br>Service</li>
                            <li><span class="d-inline-block counter">150</span><span class="mb-0 plus1 d-inline-block">+</span><br>
                                Destinations<br>Covered</li>
                            <li><span class="d-inline-block counter">30k</span><span class="mb-0 plus1 d-inline-block">+</span><br>
                                Happy<br>Travelers</li>
                        </ul>
                        <div class="green-btn d-inline-block">
                            <a href="destinations.html" class="d-inline-block">Book Your Journey</a>
                        </div>
                        <!-- about travel content -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- about travel con -->
    </section>
















    <!-- TOP DESTINATIONS SECTION -->
    <section class="float-left w-100 top-destinations-con position-relative padding-top padding-bottom main-box">
        <img alt="vector" class="vector4 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector4.png">
        <img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector5.png">
        <div class="container top-destination-con1 wow bounceInUp" data-wow-duration="2s">
            <div class="heading-title text-center">
                <h4 class="text-uppercase">Top Attractions in Puri</h4>
                <h2 class="">Discover the Spiritual & Coastal <br> Beauty of Puri</h2>
            </div>
            <div class="owl-carousel">
                <?php
                // Build/Reuse DB connection (reuse $conn if already set earlier)
                if (!isset($conn) || !($conn instanceof mysqli) || $conn->connect_error) {
                  require_once __DIR__ . '/config/config.php';
                  if (!isset($conn) || !($conn instanceof mysqli)) {
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $dbname = 'shreekshetra_travels';
                    $conn = @new mysqli($servername, $username, $password, $dbname);
                    if ($conn && !$conn->connect_error) {
                      @mysqli_set_charset($conn, 'utf8mb4');
                    }
                  }
                }

                $puriDestinations = [];
                if ($conn && !$conn->connect_error) {
                  $sql = "SELECT id, title, location, category, price, image_url
                            FROM destinations
                            WHERE status=1 AND (location LIKE '%Puri%' OR title LIKE '%Puri%')
                            ORDER BY id DESC";
                  if ($res = $conn->query($sql)) {
                    while ($row = $res->fetch_assoc()) {
                      $puriDestinations[] = $row;
                    }
                    $res->free();
                  }
                }
                ?>

                <?php if (!empty($puriDestinations)): ?>
                    <?php
                    foreach ($puriDestinations as $d):
                      $title = htmlspecialchars($d['title']);
                      $loc = htmlspecialchars($d['location']);
                      $price = number_format((float) $d['price']);
                      $img = htmlspecialchars($d['image_url']);
                      ?>
                    <div class="item">
                        <div class="destination-box position-relative">
                            <div class="orange-tag position-absolute">₹<?= $price ?></div>
                            <figure><img src="<?= $img ?>" alt="<?= $title ?>" class="img-fluid"></figure>
                            <div class="bottom-con">
                                <span class="d-block text-uppercase"><?= $loc ?></span>
                                <a href="destinations.php">
                                    <h4><?= $title ?></h4>
                                </a>
                                <span class="d-inline-block star-con"><i class="fa-solid fa-star"></i> 4.8 <span class="d-inline-block review-span">(1k+ Reviews)</span></span>
                            </div>
                            <button class="view-trip-btn book-now-btn"
                                    data-activity-id="<?= (int) $d['id'] ?>"
                                    data-activity-title="<?= $title ?>">
                                Book Now
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="item">
                        <div class="destination-box position-relative p-4 text-center">
                            <h6 class="mb-0">No Puri destinations available right now.</h6>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>















    <!-- NEWS AND ARTICLES SECTION -->
    <section class="float-left w-100 news-articles-con position-relative padding-top padding-bottom main-box">
        <img alt="vector" class="vector4 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector4.png">
        <img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector5.png">
        <div class="container wow bounceInUp" data-wow-duration="2s">
            <div class="heading-title text-center">
                <h4 class="text-uppercase">News & Articles</h4>
                <h2 class="">Stay Update with <br>
                    Traveltrek</h2>
                <!-- heading title -->
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="article-box position-relative">
                        <figure><img class="img-fluid" src="assets/images/article-img1.jpg" alt="img"></figure>
                        <div class="bottom-left"><span class="d-block text-white">June 6, 2016 • John Smith</span>
                            <a href="single-blog.html">
                                <h6 class="text-white">Change your place and <br>
                                    get the fresh air</h6>
                            </a>
                            <!-- bottom left -->
                        </div>
                        <!-- article box -->
                    </div>
                    <!-- col -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="article-box position-relative">
                        <figure><img class="img-fluid" src="assets/images/article-img2.jpg" alt="img"></figure>
                        <div class="bottom-left"><span class="d-block text-white">June 6, 2016 • John Smith</span>
                            <a href="single-blog.html">
                                <h6 class="text-white">Change your place and <br>
                                    get the fresh air</h6>
                            </a>
                            <!-- bottom left -->
                        </div>
                        <!-- article box -->
                    </div>
                    <!-- col -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 last-con">
                    <div class="article-box position-relative">
                        <figure><img class="img-fluid" src="assets/images/article-img3.jpg" alt="img"></figure>
                        <div class="bottom-left"><span class="d-block text-white">June 6, 2016 • John Smith</span>
                            <a href="single-blog.html">
                                <h6 class="text-white">Change your place and <br>
                                    get the fresh air</h6>
                            </a>
                            <!-- bottom left -->
                        </div>
                        <!-- article box -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- news and article con -->
    </section>
    <!-- FOOTER SECTION -->


    <!-- Hotel Booking Modal -->
    <div class="modal fade" id="hotelBookingModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Hotel Booking</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form id="hotelBookingForm">
              <div class="mb-3" style="display:none;">
                <label for="hb_destination" class="form-label">Destination</label>
                <input type="text" class="form-control" id="hb_destination" name="destination" required>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3" style="display:none;">
                  <label for="hb_checkin" class="form-label">Check-in</label>
                  <input type="date" class="form-control" id="hb_checkin" name="checkin" required>
                </div>
                <div class="col-md-6 mb-3" style="display:none;">
                  <label for="hb_checkout" class="form-label">Check-out</label>
                  <input type="date" class="form-control" id="hb_checkout" name="checkout" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3" style="display:none;">
                  <label for="hb_adults" class="form-label">Adults</label>
                  <input type="number" class="form-control" id="hb_adults" name="adults" min="1" step="1" value="1" required>
                </div>
                <div class="col-md-6 mb-3" style="display:none;">
                  <label for="hb_children" class="form-label">Children</label>
                  <input type="number" class="form-control" id="hb_children" name="children" min="0" step="1" value="0">
                </div>
              </div>
              <div class="mb-3">
                <label for="hb_mobile" class="form-label">Mobile Number</label>
                <input type="tel" class="form-control" id="hb_mobile" name="mobile" pattern="[0-9]{10}" maxlength="10" placeholder="10-digit mobile" required>
              </div>
              <div class="mb-3">
                <label for="hb_email" class="form-label">Email (optional)</label>
                <input type="email" class="form-control" id="hb_email" name="email" placeholder="example@domain.com">
              </div>
              <div id="hb_alert" class="alert d-none" role="alert"></div>
              <button type="submit" class="btn btn-primary w-100" id="hb_submit">Submit Booking</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Book Destination</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form id="bookingForm">
              <input type="hidden" name="activity_id" id="bk_activity_id">
              <input type="hidden" name="activity_title" id="bk_activity_title">
              <div class="mb-3">
                <label class="form-label">Destination</label>
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

    <?php include 'config/footer.php'; ?>

    <script>
      (function(){
        // Hotel booking open + populate from Hotel tab inputs
        function openHotelModal(prefill){
          const alertBox = document.getElementById('hb_alert');
          if (alertBox) alertBox.className = 'alert d-none';
          if (prefill){
            const dest = document.getElementById('hb_destination');
            const cin = document.getElementById('hb_checkin');
            const cout = document.getElementById('hb_checkout');
            const ad = document.getElementById('hb_adults');
            const ch = document.getElementById('hb_children');
            if (dest) dest.value = prefill.destination || '';
            if (cin) cin.value = prefill.checkin || '';
            if (cout) cout.value = prefill.checkout || '';
            if (ad) ad.value = prefill.adults || 1;
            if (ch) ch.value = prefill.children || 0;
          }
          if (window.jQuery && $('#hotelBookingModal').modal) {
            $('#hotelBookingModal').modal('show');
          } else {
            var modalEl = document.getElementById('hotelBookingModal');
            if (modalEl) modalEl.style.display = 'block';
          }
        }

        // Hook Hotel Book Now button
        document.addEventListener('click', function(e){
          const btn = e.target.closest('.hotel-book-now-btn');
          if (!btn) return;
          e.preventDefault();
          const prefill = {
            destination: (document.getElementById('destination')||{}).value || '',
            checkin: (document.getElementById('checkin')||{}).value || '',
            checkout: (document.getElementById('checkout')||{}).value || '',
            adults: (document.getElementById('adults')||{}).value || 1,
            children: (document.getElementById('children')||{}).value || 0,
          };
          openHotelModal(prefill);
        });

        // Set min dates for hotel checkin/checkout
        function setMinDates(){
          const today = new Date();
          const yyyy = today.getFullYear();
          const mm = String(today.getMonth()+1).padStart(2,'0');
          const dd = String(today.getDate()).padStart(2,'0');
          const min = `${yyyy}-${mm}-${dd}`;
          const cin = document.getElementById('hb_checkin');
          const cout = document.getElementById('hb_checkout');
          if (cin) cin.min = min;
          if (cout) cout.min = min;
          if (cin && cout){
            cin.addEventListener('change', function(){
              cout.min = cin.value || min;
              if (cout.value && cout.value < cout.min){ cout.value = cout.min; }
            });
          }
        }
        setMinDates();

        // Submit hotel booking form
        const hbForm = document.getElementById('hotelBookingForm');
        if (hbForm){
          hbForm.addEventListener('submit', async function(e){
            e.preventDefault();
            const submitBtn = document.getElementById('hb_submit');
            const alertBox = document.getElementById('hb_alert');
            alertBox.className = 'alert d-none';
            submitBtn.disabled = true;
            try{
              const fd = new FormData(hbForm);
              const res = await fetch('process/booking.php', { method: 'POST', body: fd });
              const data = await res.json();
              if (data.success){
                alertBox.className = 'alert alert-success';
                alertBox.textContent = data.message || 'Booking submitted successfully!';
                hbForm.reset();
              } else {
                alertBox.className = 'alert alert-danger';
                alertBox.textContent = data.message || 'Failed to submit booking.';
              }
            } catch(err){
              alertBox.className = 'alert alert-danger';
              alertBox.textContent = 'Network or server error. Please try again.';
            } finally {
              submitBtn.disabled = false;
            }
          });
        }

        function openBookingModal(activityId, activityTitle){
          var idEl = document.getElementById('bk_activity_id');
          var titleEl = document.getElementById('bk_activity_title');
          var titleDispEl = document.getElementById('bk_activity_title_display');
          if (!idEl || !titleEl || !titleDispEl) return;
          idEl.value = activityId;
          titleEl.value = activityTitle;
          titleDispEl.value = activityTitle;
          const alertBox = document.getElementById('bk_alert');
          if (alertBox) alertBox.className = 'alert d-none';
          if (window.jQuery && $('#bookingModal').modal) {
            $('#bookingModal').modal('show');
          } else {
            var modalEl = document.getElementById('bookingModal');
            if (modalEl) modalEl.style.display = 'block';
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
    </script>


</body>


</html>