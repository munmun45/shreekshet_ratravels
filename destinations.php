<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:30 GMT -->
<head>
  
<?php include 'config/meta.php'; ?>


    <style>
        
        
        
        
        .destinations-grid {
            padding: 50px 0;
        }
        
        .destination-item {
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }
        
        .destination-item.hidden {
            display: none;
        }
        
        .destination-box {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .destination-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .destination-box figure {
            position: relative;
            overflow: hidden;
            height: 200px;
            margin: 0;
        }
        
        .destination-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .destination-box:hover img {
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
        
        .category-tag {
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
        
        .bottom-con {
            padding: 20px;
        }
        
        .location {
            color: #667eea;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .destination-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            text-decoration: none;
        }
        
        .destination-title:hover {
            color: #667eea;
            text-decoration: none;
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
                            <h1>Destinations</h1>
                            <p class="font-size-20">Discover the best of Puri & Odisha — Jagannath Temple, Konark Sun
                                Temple, Chilika Lake, heritage villages — along with handpicked world destinations.
                            </p>
                            <div class="breadcrumb-con d-inline-block" data-aos="fade-up" data-aos-duration="600">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Destinations</li>
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
                <button class="filter-btn active" data-filter="all">All Destinations</button>
                <button class="filter-btn" data-filter="odisha">Odisha</button>
                <button class="filter-btn" data-filter="west-bengal">West Bengal</button>
                <button class="filter-btn" data-filter="jharkhand">Jharkhand</button>
                <button class="filter-btn" data-filter="andhra-pradesh">Andhra Pradesh</button>
                <button class="filter-btn" data-filter="chhattisgarh">Chhattisgarh</button>
                <button class="filter-btn" data-filter="temples">Temples</button>
                <button class="filter-btn" data-filter="beaches">Beaches</button>
                <button class="filter-btn" data-filter="heritage">Heritage</button>
                <button class="filter-btn" data-filter="nature">Nature</button>
            </div>
            
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search destinations...">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

    <!-- DESTINATIONS GRID -->
    <section class="destinations-grid">
        <div class="container">
            <div class="row" id="destinationsGrid">
                <!-- Odisha Destinations -->
                <div class="col-lg-4 col-md-6 destination-item" data-category="odisha temples" data-name="Jagannath Temple Puri Beach">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1582510003544-4d00b7f74220?w=400&h=200&fit=crop" alt="Puri Jagannath Temple">
                            <div class="price-tag">₹2,999</div>
                            <div class="category-tag">Temple</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Puri, Odisha</div>
                            <a href="#" class="destination-title">Jagannath Temple & Puri Beach</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.9</span>
                                <span class="reviews">(1.7k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="odisha temples heritage" data-name="Konark Sun Temple">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1570168007204-dfb528c6958f?w=400&h=200&fit=crop" alt="Konark Sun Temple">
                            <div class="price-tag">₹1,899</div>
                            <div class="category-tag">Heritage</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Konark, Odisha</div>
                            <a href="#" class="destination-title">Konark Sun Temple</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.8</span>
                                <span class="reviews">(2.1k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="odisha nature" data-name="Chilika Lake Satapada">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop" alt="Chilika Lake">
                            <div class="price-tag">₹2,499</div>
                            <div class="category-tag">Nature</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Chilika Lake, Odisha</div>
                            <a href="#" class="destination-title">Satapada Dolphin Point</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.7</span>
                                <span class="reviews">(1.3k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="odisha heritage" data-name="Raghurajpur Heritage Village">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop" alt="Heritage Village">
                            <div class="price-tag">₹1,599</div>
                            <div class="category-tag">Heritage</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Raghurajpur, Odisha</div>
                            <a href="#" class="destination-title">Heritage Crafts Village</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.6</span>
                                <span class="reviews">(892 Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="odisha temples" data-name="Bhubaneswar Lingaraja Temple">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1605538883669-825200433431?w=400&h=200&fit=crop" alt="Bhubaneswar Temples">
                            <div class="price-tag">₹1,999</div>
                            <div class="category-tag">Temple</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Bhubaneswar, Odisha</div>
                            <a href="#" class="destination-title">Lingaraja Temple & Old Town</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.5</span>
                                <span class="reviews">(1.1k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="odisha nature" data-name="Simlipal National Park">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&h=200&fit=crop" alt="Simlipal National Park">
                            <div class="price-tag">₹3,499</div>
                            <div class="category-tag">Nature</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Mayurbhanj, Odisha</div>
                            <a href="#" class="destination-title">Simlipal National Park</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.4</span>
                                <span class="reviews">(756 Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- West Bengal Destinations -->
                <div class="col-lg-4 col-md-6 destination-item" data-category="west-bengal heritage" data-name="Kolkata Victoria Memorial">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop" alt="Victoria Memorial">
                            <div class="price-tag">₹3,999</div>
                            <div class="category-tag">Heritage</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Kolkata, West Bengal</div>
                            <a href="#" class="destination-title">Victoria Memorial & City of Joy</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.8</span>
                                <span class="reviews">(2.3k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="west-bengal nature" data-name="Darjeeling Himalayan Railway">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop" alt="Darjeeling">
                            <div class="price-tag">₹5,999</div>
                            <div class="category-tag">Nature</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Darjeeling, West Bengal</div>
                            <a href="#" class="destination-title">Himalayan Railway & Tea Gardens</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.9</span>
                                <span class="reviews">(3.2k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="west-bengal nature" data-name="Sundarbans Mangrove Forest">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&h=200&fit=crop" alt="Sundarbans">
                            <div class="price-tag">₹4,299</div>
                            <div class="category-tag">Nature</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Sundarbans, West Bengal</div>
                            <a href="#" class="destination-title">Mangrove Forest & Royal Bengal Tigers</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.6</span>
                                <span class="reviews">(1.8k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jharkhand Destinations -->
                <div class="col-lg-4 col-md-6 destination-item" data-category="jharkhand nature" data-name="Betla National Park">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&h=200&fit=crop" alt="Betla National Park">
                            <div class="price-tag">₹2,799</div>
                            <div class="category-tag">Nature</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Palamu, Jharkhand</div>
                            <a href="#" class="destination-title">Betla National Park</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.3</span>
                                <span class="reviews">(654 Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="jharkhand nature" data-name="Ranchi Waterfalls">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop" alt="Ranchi Waterfalls">
                            <div class="price-tag">₹2,199</div>
                            <div class="category-tag">Nature</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Ranchi, Jharkhand</div>
                            <a href="#" class="destination-title">Dassam & Hundru Falls</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.2</span>
                                <span class="reviews">(892 Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Andhra Pradesh Destinations -->
                <div class="col-lg-4 col-md-6 destination-item" data-category="andhra-pradesh temples" data-name="Tirupati Balaji Temple">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1582510003544-4d00b7f74220?w=400&h=200&fit=crop" alt="Tirupati">
                            <div class="price-tag">₹4,999</div>
                            <div class="category-tag">Temple</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Tirupati, Andhra Pradesh</div>
                            <a href="#" class="destination-title">Venkateswara Temple</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.9</span>
                                <span class="reviews">(5.2k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="andhra-pradesh beaches" data-name="Visakhapatnam Beaches">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop" alt="Visakhapatnam Beach">
                            <div class="price-tag">₹3,299</div>
                            <div class="category-tag">Beach</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Visakhapatnam, Andhra Pradesh</div>
                            <a href="#" class="destination-title">RK Beach & Araku Valley</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.5</span>
                                <span class="reviews">(1.9k Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chhattisgarh Destinations -->
                <div class="col-lg-4 col-md-6 destination-item" data-category="chhattisgarh nature" data-name="Chitrakote Falls">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop" alt="Chitrakote Falls">
                            <div class="price-tag">₹2,699</div>
                            <div class="category-tag">Nature</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Bastar, Chhattisgarh</div>
                            <a href="#" class="destination-title">Chitrakote Falls - Niagara of India</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.4</span>
                                <span class="reviews">(723 Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 destination-item" data-category="chhattisgarh heritage" data-name="Sirpur Archaeological Site">
                    <div class="destination-box">
                        <figure>
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop" alt="Sirpur">
                            <div class="price-tag">₹1,999</div>
                            <div class="category-tag">Heritage</div>
                        </figure>
                        <div class="bottom-con">
                            <div class="location">Sirpur, Chhattisgarh</div>
                            <a href="#" class="destination-title">Ancient Buddhist Temples</a>
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <span>4.1</span>
                                <span class="reviews">(456 Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="no-results" id="noResults" style="display: none;">
                <i class="fas fa-search"></i>
                <h3>No destinations found</h3>
                <p>Try adjusting your search criteria or filters</p>
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