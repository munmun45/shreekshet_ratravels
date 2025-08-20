<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.designingmedia.com/traveltrek/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:05 GMT -->

<head>

    <?php include 'config/meta.php'; ?>


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
                                    <div class="green-btn d-inline-block">
                                        <a href="about.html" class="d-inline-block">Book Now</a>
                                    </div>
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
                                        <a href="about.html" class="d-inline-block">Explore Packages</a>
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
                                        <a href="about.html" class="d-inline-block">Start Your Journey</a>
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
        <div class="float-left w-100 search-booking-tab-con position-relative main-box">
            <div class="container wow bounceInUp" data-wow-duration="2s">
                <ul class="nav nav-tabs text-center align-items-center justify-content-between" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="hotel-tab" data-toggle="tab" data-target="#hotel" type="button" role="tab" aria-controls="hotel" aria-selected="true"> <img class="img-fluid d-block" src="assets/images/hotel-icon.png" alt="icon"> Hotels</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled" id="car-tab" data-target="#car" type="button" role="tab" aria-controls="car" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/car-rental-icon.png" alt="icon"> Car
                            Rentals</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled" id="flight-tab" data-target="#flight" type="button" role="tab" aria-controls="flight" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/flight-icon.png" alt="icon"> Flights</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled" id="trip-tab" data-target="#trip" type="button" role="tab" aria-controls="trip" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/trip-icon.png" alt="icon"> Trips</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled" id="cruise-tab" data-target="#cruise" type="button" role="tab" aria-controls="cruise" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/cruise-icon.png" alt="icon"> Cruises</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link disabled" id="activity-tab" data-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false" aria-disabled="true" disabled><img class="img-fluid d-block" src="assets/images/activity-icon.png" alt="icon"> Activities</button>
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
                            <a href="booking.html" class="d-inline-block">Search Now</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="car" role="tabpanel" aria-labelledby="car-tab">
                        <div class="tab-inner-con text-left">
                            <div class="destination-con">
                                <label for="destination2">Destination</label>
                                <input type="text" class="form-control" placeholder="" id="destination2">
                                <!-- col -->
                            </div>
                            <div class="checkin-con">
                                <label for="checkin2">Check in</label>
                                <input type="date" class="form-control" id="checkin2" name="checkin" required="">
                                <!-- col -->
                            </div>
                            <div class="checkout-con">
                                <label for="checkout2">Check Out</label>
                                <input type="date" class="form-control" id="checkout2" name="checkout" required="">
                                <!-- col -->
                            </div>
                            <div class="adults-con">
                                <label for="adults2">Adults </label>
                                <select class="form-select" id="adults2" onchange="javascript: dynamicDropDown(this.options[this.selectedIndex].value);">
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
                                <label for="children2">Children </label>
                                <select class="form-select" id="children2">
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
                            <a href="booking.html" class="d-inline-block">Search Now</a>
                        </div>
                        <!-- car tab -->
                    </div>
                    <div class="tab-pane fade" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                        <div class="tab-inner-con text-left">

                            <div class="destination-con">
                                <label for="destination3">Destination</label>
                                <input type="text" class="form-control" placeholder="" id="destination3">
                                <!-- col -->
                            </div>
                            <div class="checkin-con">
                                <label for="checkin3">Check in</label>
                                <input type="date" class="form-control" id="checkin3" name="checkin" required="">
                                <!-- col -->
                            </div>
                            <div class="checkout-con">
                                <label for="checkout3">Check Out</label>
                                <input type="date" class="form-control" id="checkout3" name="checkout" required="">
                                <!-- col -->
                            </div>
                            <div class="adults-con">
                                <label for="adults3">Adults </label>
                                <select class="form-select" id="adults3" onchange="javascript: dynamicDropDown(this.options[this.selectedIndex].value);">
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
                                <label for="children3">Children </label>
                                <select class="form-select" id="children3">
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
                            <a href="booking.html" class="d-inline-block">Search Now</a>
                        </div>
                        <!-- flight tab -->
                    </div>
                    <div class="tab-pane fade" id="trip" role="tabpanel" aria-labelledby="trip-tab">
                        <div class="tab-inner-con text-left">

                            <div class="destination-con">
                                <label for="destination4">Destination</label>
                                <input type="text" class="form-control" placeholder="" id="destination4">
                                <!-- col -->
                            </div>
                            <div class="checkin-con">
                                <label for="checkin4">Check in</label>
                                <input type="date" class="form-control" id="checkin4" name="checkin" required="">
                                <!-- col -->
                            </div>
                            <div class="checkout-con">
                                <label for="checkout4">Check Out</label>
                                <input type="date" class="form-control" id="checkout4" name="checkout" required="">
                                <!-- col -->
                            </div>
                            <div class="adults-con">
                                <label for="adults4">Adults </label>
                                <select class="form-select" id="adults4" onchange="javascript: dynamicDropDown(this.options[this.selectedIndex].value);">
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
                                <label for="children4">Children </label>
                                <select class="form-select" id="children4">
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
                            <a href="booking.html" class="d-inline-block">Search Now</a>
                        </div>
                        <!-- trip tab -->
                    </div>
                    <div class="tab-pane fade" id="cruise" role="tabpanel" aria-labelledby="cruise-tab">
                        <div class="tab-inner-con text-left">

                            <div class="destination-con">
                                <label for="destination5">Destination</label>
                                <input type="text" class="form-control" placeholder="" id="destination5">
                                <!-- col -->
                            </div>
                            <div class="checkin-con">
                                <label for="checkin5">Check in</label>
                                <input type="date" class="form-control" id="checkin5" name="checkin" required="">
                                <!-- col -->
                            </div>
                            <div class="checkout-con">
                                <label for="checkout5">Check Out</label>
                                <input type="date" class="form-control" id="checkout5" name="checkout" required="">
                                <!-- col -->
                            </div>
                            <div class="adults-con">
                                <label for="adults5">Adults </label>
                                <select class="form-select" id="adults5" onchange="javascript: dynamicDropDown(this.options[this.selectedIndex].value);">
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
                                <label for="children5">Children </label>
                                <select class="form-select" id="children5">
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
                            <a href="booking.html" class="d-inline-block">Search Now</a>
                        </div>
                        <!-- cruise tab -->
                    </div>
                    <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                        <div class="tab-inner-con text-left">

                            <div class="destination-con">
                                <label for="destination6">Destination</label>
                                <input type="text" class="form-control" placeholder="" id="destination6">
                                <!-- col -->
                            </div>
                            <div class="checkin-con">
                                <label for="checkin6">Check in</label>
                                <input type="date" class="form-control" id="checkin6" name="checkin" required="">
                                <!-- col -->
                            </div>
                            <div class="checkout-con">
                                <label for="checkout6">Check Out</label>
                                <input type="date" class="form-control" id="checkout6" name="checkout" required="">
                                <!-- col -->
                            </div>
                            <div class="adults-con">
                                <label for="adults6">Adults </label>
                                <select class="form-select" id="adults6" onchange="javascript: dynamicDropDown(this.options[this.selectedIndex].value);">
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
                                <label for="children6">Children </label>
                                <select class="form-select" id="children6">
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
                            <a href="booking.html" class="d-inline-block">Search Now</a>
                        </div>
                        <!-- activity tab -->
                    </div>
                </div>
                <!-- container -->
            </div>
            <!-- search booking tab con -->
        </div>












        <!-- WHAT WE SERVE SECTION -->
        <section class="float-left w-100 what-we-serve-con position-relative main-box padding-top padding-bottom">
            <img alt="vector" class="vector4 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector4.png">
            <img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="assets/images/vector5.png">
            <div class="container wow bounceInUp" data-wow-duration="2s">
                <div class="row">
                    <div class="col-lg-5">
                        <h4 class="mustard-text text-uppercase">What We Serve</h4>
                        <h2 class="text-uppercase text-right">Top Values <br>
                            For You!</h2>
                    </div>
                    <div class="col-xl-10 col-12 mr-auto ml-auto serve-outer text-center">

                        <!-- Box 1 -->
                        <div class="server-box var1">
                            <img class="img-fluid" src="assets/images/serve-icon1.png" alt="icon">
                            <h4>Wide Range of Tours</h4>
                            <p class="mb-0">From Jagannath Puri Dham to Konark, Chilika, and tribal heartlands — we offer diverse packages to suit every traveler.</p>
                        </div>

                        <!-- Box 2 -->
                        <div class="server-box var2">
                            <img class="img-fluid" src="assets/images/serve-icon2.png" alt="icon">
                            <h4>Expert Local Guides</h4>
                            <p class="mb-0">Our knowledgeable guides share hidden stories, cultural insights, and make your journey truly meaningful.</p>
                        </div>

                        <!-- Box 3 -->
                        <div class="server-box var3">
                            <img class="img-fluid" src="assets/images/serve-icon3.png" alt="icon">
                            <h4>Easy & Hassle-Free Booking</h4>
                            <p class="mb-0">Simple booking process, transparent pricing, and 24/7 support to make your travel stress-free.</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- bg outer wrapper -->
    </div>













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
                            <!-- Nepal -->
                            <div class="item">
                                <div class="package-box">
                                    <span class="d-block location-span"><i class="fa-solid fa-location-dot"></i> Nepal, Philippines</span>
                                    <h6><a href="destinations.html">Experience a Jungle Safari in Chitwan National Park, Nepal</a></h6>
                                    <img class="img-fluid" alt="Nepal Safari" src="pexels-jaime-reimer-1376930-2662116.jpg">
                                    <div class="spans-wrapper">
                                        <span class="d-inline-block"><i class="fas fa-calendar-alt"></i> 6 Nights</span>
                                    </div>
                                    <div class="pkg-btn-con d-flex align-items-center justify-content-between">
                                        <span class="person d-inline-block p-0 m-0">
                                            <span class="price d-inline-block p-0 m-0"><del>₹1200</del> ₹1100</span>
                                        </span>
                                        <div class="grey-btn d-inline-block"><a href="booking.html">View Availability</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Japan -->
                            <div class="item">
                                <div class="package-box">
                                    <span class="d-block location-span"><i class="fa-solid fa-location-dot"></i> Japan</span>
                                    <h6><a href="destinations.html">Explore the Rich Heritage of Kyoto’s Temples in Japan</a></h6>
                                    <img class="img-fluid" alt="Kyoto Japan" src="pexels-jaime-reimer-1376930-2662116.jpg">
                                    <div class="spans-wrapper">
                                        <span class="d-inline-block"><i class="fas fa-calendar-alt"></i> 10 Nights</span>
                                    </div>
                                    <div class="pkg-btn-con d-flex align-items-center justify-content-between">
                                        <span class="person d-inline-block p-0 m-0">
                                            <span class="price d-inline-block p-0 m-0"><del>₹900</del> ₹700</span>
                                        </span>
                                        <div class="grey-btn d-inline-block"><a href="booking.html">View Availability</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sri Lanka -->
                            <div class="item">
                                <div class="package-box">
                                    <span class="d-block location-span"><i class="fa-solid fa-location-dot"></i> Colombo, India, Sri Lanka</span>
                                    <h6><a href="destinations.html">Wander India’s Palaces and Markets Journey Through Jaipur</a></h6>
                                    <img class="img-fluid" alt="Jaipur Palaces" src="pexels-jaime-reimer-1376930-2662116.jpg">
                                    <div class="spans-wrapper">
                                        <span class="d-inline-block"><i class="fas fa-calendar-alt"></i> 8 Nights</span>
                                    </div>
                                    <div class="pkg-btn-con d-flex align-items-center justify-content-between">
                                        <span class="person d-inline-block p-0 m-0">
                                            <span class="price d-inline-block p-0 m-0"><del>₹700</del> ₹600</span>
                                        </span>
                                        <div class="grey-btn d-inline-block"><a href="booking.html">View Availability</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bhutan -->
                            <div class="item">
                                <div class="package-box">
                                    <span class="d-block location-span"><i class="fa-solid fa-location-dot"></i> Bhutan</span>
                                    <h6><a href="destinations.html">Hike to Bhutan’s Tiger’s Nest and Uncover its Spiritual Mystique</a></h6>
                                    <img class="img-fluid" alt="Bhutan Tiger Nest" src="pexels-jaime-reimer-1376930-2662116.jpg">
                                    <div class="spans-wrapper">
                                        <span class="d-inline-block"><i class="fas fa-calendar-alt"></i> 6 Nights</span>
                                    </div>
                                    <div class="pkg-btn-con d-flex align-items-center justify-content-between">
                                        <span class="person d-inline-block p-0 m-0">
                                            <span class="price d-inline-block p-0 m-0"><del>₹1900</del> ₹1700</span>
                                        </span>
                                        <div class="grey-btn d-inline-block"><a href="booking.html">View Availability</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- South India -->
                            <div class="item">
                                <div class="package-box">
                                    <span class="d-block location-span"><i class="fa-solid fa-location-dot"></i> India</span>
                                    <h6><a href="destinations.html">Sail Through the Backwaters and Temples of Kerala in South India</a></h6>
                                    <img class="img-fluid" alt="Kerala Backwaters" src="pexels-jaime-reimer-1376930-2662116.jpg">
                                    <div class="spans-wrapper">
                                        <span class="d-inline-block"><i class="fas fa-calendar-alt"></i> 4 Nights</span>
                                    </div>
                                    <div class="pkg-btn-con d-flex align-items-center justify-content-between">
                                        <span class="person d-inline-block p-0 m-0">
                                            <span class="price d-inline-block p-0 m-0"><del>₹900</del> ₹800</span>
                                        </span>
                                        <div class="grey-btn d-inline-block"><a href="booking.html">View Availability</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Maldives -->
                            <div class="item">
                                <div class="package-box">
                                    <span class="d-block location-span"><i class="fa-solid fa-location-dot"></i> Japan</span>
                                    <h6><a href="destinations.html">Snorkel the Vibrant Coral Reefs and Lagoons in the Maldives</a></h6>
                                    <img class="img-fluid" alt="Maldives Snorkel" src="pexels-jaime-reimer-1376930-2662116.jpg">
                                    <div class="spans-wrapper">
                                        <span class="d-inline-block"><i class="fas fa-calendar-alt"></i> 6 Nights</span>
                                    </div>
                                    <div class="pkg-btn-con d-flex align-items-center justify-content-between">
                                        <span class="person d-inline-block p-0 m-0">
                                            <span class="price d-inline-block p-0 m-0"><del>₹1200</del> ₹1000</span>
                                        </span>
                                        <div class="grey-btn d-inline-block"><a href="booking.html">View Availability</a></div>
                                    </div>
                                </div>
                            </div>
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

                <!-- Jagannath Temple -->
                <div class="item">
                    <div class="destination-box position-relative">
                        <div class="orange-tag position-absolute">₹499</div>
                        <figure><img src="odisha-puri.jpg" alt="Jagannath Temple Puri" class="img-fluid"></figure>
                        <div class="bottom-con">
                            <span class="d-block text-uppercase">Jagannath Temple</span>
                            <a href="destinations.html">
                                <h4>Experience the divinity of Lord Jagannath</h4>
                            </a>
                            <span class="d-inline-block star-con"><i class="fa-solid fa-star"></i> 5.0 <span class="d-inline-block review-span">(3k Reviews)</span></span>
                        </div>
                    </div>
                </div>

                <!-- Konark Sun Temple -->
                <div class="item">
                    <div class="destination-box position-relative">
                        <div class="orange-tag position-absolute">₹399</div>
                        <figure><img src="odisha-puri.jpg" alt="Konark Sun Temple" class="img-fluid"></figure>
                        <div class="bottom-con">
                            <span class="d-block text-uppercase">Konark, Odisha</span>
                            <a href="destinations.html">
                                <h4>Marvel at the UNESCO World Heritage Sun Temple</h4>
                            </a>
                            <span class="d-inline-block star-con"><i class="fa-solid fa-star"></i> 4.9 <span class="d-inline-block review-span">(2.1k Reviews)</span></span>
                        </div>
                    </div>
                </div>

                <!-- Golden Beach -->
                <div class="item">
                    <div class="destination-box position-relative">
                        <div class="orange-tag position-absolute">₹299</div>
                        <figure><img src="odisha-puri.jpg" alt="Golden Beach Puri" class="img-fluid"></figure>
                        <div class="bottom-con">
                            <span class="d-block text-uppercase">Golden Beach</span>
                            <a href="destinations.html">
                                <h4>Relax at the Blue Flag certified beach</h4>
                            </a>
                            <span class="d-inline-block star-con"><i class="fa-solid fa-star"></i> 4.8 <span class="d-inline-block review-span">(1.5k Reviews)</span></span>
                        </div>
                    </div>
                </div>

                <!-- Chilika Lake -->
                <div class="item">
                    <div class="destination-box position-relative">
                        <div class="orange-tag position-absolute">₹349</div>
                        <figure><img src="odisha-puri.jpg" alt="Chilika Lake" class="img-fluid"></figure>
                        <div class="bottom-con">
                            <span class="d-block text-uppercase">Chilika Lake</span>
                            <a href="destinations.html">
                                <h4>Witness dolphins & migratory birds</h4>
                            </a>
                            <span class="d-inline-block star-con"><i class="fa-solid fa-star"></i> 4.9 <span class="d-inline-block review-span">(2.8k Reviews)</span></span>
                        </div>
                    </div>
                </div>

                <!-- Raghurajpur Heritage Village -->
                <div class="item">
                    <div class="destination-box position-relative">
                        <div class="orange-tag position-absolute">₹199</div>
                        <figure><img src="odisha-puri.jpg" alt="Raghurajpur Heritage Village" class="img-fluid"></figure>
                        <div class="bottom-con">
                            <span class="d-block text-uppercase">Raghurajpur Village</span>
                            <a href="destinations.html">
                                <h4>Explore Odisha’s traditional Pattachitra art</h4>
                            </a>
                            <span class="d-inline-block star-con"><i class="fa-solid fa-star"></i> 4.7 <span class="d-inline-block review-span">(1.2k Reviews)</span></span>
                        </div>
                    </div>
                </div>

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


    <?php include 'config/footer.php'; ?>


</body>


</html>