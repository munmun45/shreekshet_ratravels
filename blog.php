<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:30 GMT -->
<head>
  
<?php include 'config/meta.php'; ?>

</head>

<body>
  




<div class="bg-outer-wrapper sub-banner-outer-wrapper float-left w-100">



<?php include 'config/header.php'; ?>


        <section class="float-left w-100 banner-con sub-banner-con position-relative main-box">
            <img alt="vector" class="vector1  img-fluid position-absolute" src="assets/images/vector1.png">
            <img alt="vector" class="vector2 img-fluid position-absolute" src="assets/images/vector2.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="sub-banner-inner-con padding-bottom">
                            <h1>Blog</h1>
                            <p class="font-size-20">Travel stories, guides, tips, and updates from Puri, Odisha and beyond —
                                curated by Shree Kshetra Travels to help you plan better journeys.</p>
                            <div class="breadcrumb-con d-inline-block" data-aos="fade-up" data-aos-duration="600">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
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


    <div class="blog-posts blogpage-section w-100 float-left background-gradient" style="margin-top: 40px;">
        <div class="container">
            <div class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div id="blog" class="col-xl-12">
                    <div class="row">
                        <?php
                        // Database connection
                        require_once 'config/config.php';
                        
                        // Fetch published articles
                        $sql = "SELECT id, title, category, excerpt, content, image_url, created_at FROM blogs WHERE status = 1 ORDER BY created_at DESC";
                        $result = $conn->query($sql);
                        
                        if ($result && $result->num_rows > 0) {
                            while($article = $result->fetch_assoc()) {
                                $title = htmlspecialchars($article['title']);
                                $category = htmlspecialchars($article['category']);
                                $excerpt = htmlspecialchars($article['excerpt']);
                                $content = htmlspecialchars($article['content']);
                                $image_url = !empty($article['image_url']) ? htmlspecialchars($article['image_url']) : 'assets/images/blog/default-blog.jpg';
                                $date = date('M d, Y', strtotime($article['created_at']));
                                $short_excerpt = strlen($excerpt) > 120 ? substr($excerpt, 0, 120) . '...' : $excerpt;
                                if (empty($short_excerpt)) {
                                    $short_excerpt = strlen($content) > 120 ? substr($content, 0, 120) . '...' : $content;
                                }
                        ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                            <div class="blog-box modern-blog-card h-100" data-aos="fade-up" data-aos-duration="700">
                                <div class="post-item-wrap position-relative h-100 d-flex flex-column">
                                    <div class="post-image position-relative overflow-hidden">
                                        <a href="blog-detail.php?id=<?= $article['id'] ?>">
                                            <img alt="<?= $title ?>" src="<?= $image_url ?>" loading="lazy" class="img-fluid blog-img">
                                        </a>
                                        <div class="category-badge position-absolute">
                                            <span class="badge bg-light"><?= $category ?></span>
                                        </div>
                                    </div>
                                    <div class="blog-content p-4 flex-grow-1 d-flex flex-column">
                                        <div class="blog-meta mb-3">
                                            <div class="d-flex align-items-center text-muted">
                                                <i class="fas fa-calendar-alt me-2"></i>
                                                <span class="text-size-14"><?= $date ?></span>
                                                <i class="fas fa-user ms-3 me-2"></i>
                                                <span class="text-size-14">Admin</span>
                                            </div>
                                        </div>
                                        <h5 class="blog-title mb-3">
                                            <a href="blog-detail.php?id=<?= $article['id'] ?>" class="text-decoration-none text-dark">
                                                <?= $title ?>
                                            </a>
                                        </h5>
                                        <p class="blog-excerpt text-muted mb-4 flex-grow-1">
                                            <?= $short_excerpt ?>
                                        </p>
                                        <div class="blog-footer mt-auto">
                                            <a class="btn btn-outline-primary btn-sm read-more-btn" href="blog-detail.php?id=<?= $article['id'] ?>">
                                                Read More <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                        ?>
                        <div class="col-12">
                            <div class="text-center py-5">
                                <div class="no-articles-found">
                                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                    <h4 class="text-muted">No Articles Found</h4>
                                    <p class="text-muted">We're working on bringing you amazing travel stories and guides. Check back soon!</p>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .modern-blog-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        background: white;
    }

    .modern-blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    .blog-img {
        height: 250px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .modern-blog-card:hover .blog-img {
        transform: scale(1.05);
    }

    .category-badge {
        top: 15px;
        right: 15px;
        z-index: 2;
    }

    .category-badge .badge {
        font-size: 0.75rem;
        padding: 0.5rem 0.75rem;
        border-radius: 20px;
    }

    .blog-content {
        background: white;
    }

    .blog-meta {
        border-bottom: 1px solid #eee;
        padding-bottom: 0.75rem;
    }

    .blog-title a {
        font-weight: 600;
        line-height: 1.4;
        transition: color 0.3s ease;
    }

    .blog-title a:hover {
        color: var(--primary--color) !important;
    }

    .blog-excerpt {
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .read-more-btn {
        border-radius: 25px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .read-more-btn:hover {
        background-color: var(--primary--color);
        border-color: var(--primary--color);
        color: white;
    }

    .no-articles-found {
        padding: 3rem 1rem;
    }

    @media (max-width: 768px) {
        .blog-img {
            height: 200px;
        }
        
        .modern-blog-card {
            margin-bottom: 2rem;
        }
    }
    </style>










 







  
  <?php include 'config/footer.php'; ?>




</body>


<!-- Mirrored from html.designingmedia.com/traveltrek/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Aug 2025 18:00:31 GMT -->
</html>