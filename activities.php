<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:30 GMT -->
<head>
  
<?php include 'config/meta.php'; ?>


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
                        <button class="filter-btn" data-filter="city-tour">City Tours</button>
                        <button class="filter-btn" data-filter="hiking">Hiking</button>
                        <button class="filter-btn" data-filter="trekking">Trekking</button>
                        <button class="filter-btn" data-filter="rafting">Rafting</button>
                        <button class="filter-btn" data-filter="temple-tours">Temple Tours</button>
                        <button class="filter-btn" data-filter="beach-activities">Beach Activities</button>
                        <button class="filter-btn" data-filter="wildlife">Wildlife</button>
                    </div>
                    
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="Search activities...">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                </div>
            </section>







    <section class="destinations-grid">
                <div class="container">
                    <div class="row" id="destinationsGrid">
                        <!-- Bhubaneswar City Tour -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="city-tour temple-tours" data-name="Bhubaneswar City Tour Heritage Temples Lingaraja">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1605538883669-825200433431?w=400&h=250&fit=crop" alt="Bhubaneswar City Tour">
                                    <div class="price-tag">₹2,999</div>
                                    <div class="activity-tag">City Tour</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Bhubaneswar, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Temple City Heritage Tour</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Lingaraja Temple</span>
                                        <span class="activity-chip">Mukteshwar Temple</span>
                                        <span class="activity-chip">Udayagiri Caves</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.8</span>
                                            <span class="reviews">(1.2k Reviews)</span>
                                        </div>
                                        <div class="duration-days">2 Days</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>

                        <!-- Puri Beach & Temple Tour -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="city-tour temple-tours beach-activities" data-name="Puri Jagannath Temple Beach Activities Golden Beach">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1582510003544-4d00b7f74220?w=400&h=250&fit=crop" alt="Puri Temple & Beach">
                                    <div class="price-tag">₹3,499</div>
                                    <div class="activity-tag">Beach & Temple</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Puri, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Jagannath Temple & Golden Beach</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Temple Visit</span>
                                        <span class="activity-chip">Beach Activities</span>
                                        <span class="activity-chip">Sand Art</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.9</span>
                                            <span class="reviews">(2.1k Reviews)</span>
                                        </div>
                                        <div class="duration-days">3 Days</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>

                        <!-- Simlipal Trekking -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="hiking trekking wildlife" data-name="Simlipal National Park Trekking Wildlife Safari Waterfall">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&h=250&fit=crop" alt="Simlipal Trekking">
                                    <div class="price-tag">₹4,999</div>
                                    <div class="activity-tag">Trekking</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Simlipal, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Simlipal Wildlife Trekking</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Jungle Trekking</span>
                                        <span class="activity-chip">Wildlife Safari</span>
                                        <span class="activity-chip">Waterfall Visit</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.6</span>
                                            <span class="reviews">(856 Reviews)</span>
                                        </div>
                                        <div class="duration-days">4 Days</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>

                        <!-- Chilika Lake Activities -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="rafting beach-activities wildlife" data-name="Chilika Lake Boating Dolphin Safari Satapada">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=250&fit=crop" alt="Chilika Lake">
                                    <div class="price-tag">₹3,299</div>
                                    <div class="activity-tag">Water Sports</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Chilika Lake, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Chilika Lake Dolphin Safari</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Boat Ride</span>
                                        <span class="activity-chip">Dolphin Watching</span>
                                        <span class="activity-chip">Bird Watching</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.7</span>
                                            <span class="reviews">(1.4k Reviews)</span>
                                        </div>
                                        <div class="duration-days">2 Days</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>

                        <!-- Konark Heritage Walk -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="city-tour temple-tours hiking" data-name="Konark Sun Temple Heritage Walk Archaeological Site">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1570168007204-dfb528c6958f?w=400&h=250&fit=crop" alt="Konark Sun Temple">
                                    <div class="price-tag">₹2,199</div>
                                    <div class="activity-tag">Heritage</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Konark, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Sun Temple Heritage Walk</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Guided Tour</span>
                                        <span class="activity-chip">Photography</span>
                                        <span class="activity-chip">Cultural Show</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.8</span>
                                            <span class="reviews">(1.8k Reviews)</span>
                                        </div>
                                        <div class="duration-days">1 Day</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>

                        <!-- Dhauli Hills Hiking -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="hiking temple-tours" data-name="Dhauli Hills Hiking Peace Pagoda Kalinga War Memorial">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=250&fit=crop" alt="Dhauli Hills">
                                    <div class="price-tag">₹1,899</div>
                                    <div class="activity-tag">Hiking</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Dhauli, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Dhauli Hills Peace Pagoda Trek</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Hill Hiking</span>
                                        <span class="activity-chip">Peace Pagoda</span>
                                        <span class="activity-chip">Sunset Views</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.5</span>
                                            <span class="reviews">(672 Reviews)</span>
                                        </div>
                                        <div class="duration-days">1 Day</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>

                        <!-- Raghurajpur Village Tour -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="city-tour" data-name="Raghurajpur Heritage Village Art Crafts Traditional Culture">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=250&fit=crop" alt="Heritage Village">
                                    <div class="price-tag">₹1,699</div>
                                    <div class="activity-tag">Cultural</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Raghurajpur, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Heritage Crafts Village Tour</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Art Workshop</span>
                                        <span class="activity-chip">Village Walk</span>
                                        <span class="activity-chip">Cultural Show</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.6</span>
                                            <span class="reviews">(543 Reviews)</span>
                                        </div>
                                        <div class="duration-days">1 Day</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>

                        <!-- Gopalpur Beach Activities -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="beach-activities rafting" data-name="Gopalpur Beach Water Sports Surfing Fishing">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400&h=250&fit=crop" alt="Gopalpur Beach">
                                    <div class="price-tag">₹2,799</div>
                                    <div class="activity-tag">Beach</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Gopalpur, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Gopalpur Beach Water Adventures</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Water Sports</span>
                                        <span class="activity-chip">Beach Volleyball</span>
                                        <span class="activity-chip">Lighthouse Visit</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.4</span>
                                            <span class="reviews">(789 Reviews)</span>
                                        </div>
                                        <div class="duration-days">2 Days</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>

                        <!-- Daringbadi Hill Station -->
                        <div class="col-lg-4 col-md-6 destination-item" data-category="hiking trekking" data-name="Daringbadi Hill Station Kashmir Odisha Coffee Garden Trek">
                            <div class="destination-box">
                                <figure>
                                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=250&fit=crop" alt="Daringbadi Hills">
                                    <div class="price-tag">₹3,999</div>
                                    <div class="activity-tag">Hill Station</div>
                                </figure>
                                <div class="bottom-con">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Daringbadi, Odisha
                                    </div>
                                    <a href="#" class="destination-title">Kashmir of Odisha Adventure</a>
                                    <div class="activity-list">
                                        <span class="activity-chip">Hill Trekking</span>
                                        <span class="activity-chip">Coffee Plantation</span>
                                        <span class="activity-chip">Nature Walk</span>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.7</span>
                                            <span class="reviews">(934 Reviews)</span>
                                        </div>
                                        <div class="duration-days">3 Days</div>
                                    </div>
                                </div>
                                <button class="view-trip-btn">View Trip</button>
                            </div>
                        </div>
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