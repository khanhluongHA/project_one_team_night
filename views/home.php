<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2024 03:35:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">
    

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/demo4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="page-wrapper">
        
        <!-- End .top-notice -->

        <?php require_once './views/layout/header.php';  ?>
        
        <!-- End .header -->

        <main class="main">
            <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{
				'loop': false
                }">
                <?php foreach($ban as $ban1): ?>
                <div class="home-slide home-slide1 banner">
                    <img class="slide-bg" alt="<?= $ban1['anh_banner'] ?>" src="<?= $ban1['anh_banner'] ?>">
                    
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                            <h4 class="text-transform-none m-b-3">Find the Boundaries. Push Through!</h4>
                            <h2 class="text-transform-none mb-0"></h2>
                            <h3 class="m-b-3">70% Off</h3>
                            <h5 class="d-inline-block mb-0">
                                <span>Starting At</span>
                                <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup><em
										class="align-text-top">199</em><sup>99</sup></b>
                            </h5>
                            <a href="category.html" class="btn btn-dark btn-lg">Shop Now!</a>
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                </div>
                <?php endforeach; ?>
                
                <!-- End .home-slide -->
                
                
                <!-- End .home-slide -->
            </div>
            <!-- End .home-slider -->

           
            <!-- End .container -->

            <section class="featured-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-20 border-0">Sản phẩm</h2>
                    <form action="?act=sreach" class="d-flex" method="POST">
                                    <input type="text"  name="sreach"  placeholder="Nhập từ khóa tìm kiếm..." >
                                    <button type="submit" class="btn btn-soft-success material-shadow-none">Tìm kiếm</button>
                                    </form>
                                 

<!-- Hiển thị sản phẩm -->
<!-- Form chọn kiểu sắp xếp -->
                                        <form method="POST" action="?act=loc">
                                                <label for="sapxep">Sắp xếp giá bán:</label>
                                                <select name="sapxep" id="sapxep">
                                                    <option value="desc">Từ thấp đến cao</option>
                                                    <option value="asc">Từ cao đến thấp</option>
                                                </select>
                                                <button type="submit">Sắp xếp</button>
                                            </form>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center" data-owl-options="{
						'dots': false,
						'nav': true
                        
					}">

                        <?php foreach($product as $key): ?>
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="?act=sanpham&id=<?= $key['id'] ?>">
                                    <img src="<?= $key['hinh_anh'] ?>" width="280" height="280" alt="product">
                            
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html"><?= $key['ten_san_pham'] ?></a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price"><?= $key['gia_san_pham'] ?></del>
                                    <span class="product-price"><?= $key['gia_khuyen_mai'] ?></span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
                                    <a href="product.html" class="btn-icon btn-add-cart"><i
											class="fa fa-arrow-right"></i><span>SELECT
											OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <?php endforeach ?>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .featured-proucts -->
                </div>
            </section>

            <section class="new-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-20 border-0">New sản phẩm</h2>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2" data-owl-options="{
						'dots': false,
						'nav': true,
						'responsive': {
							'992': {
								'items': 5
							},
							'1200': {
								'items': 7
							}
						}
					}">
                    <?php foreach($product as $key): ?>
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="product.html">
                                    <img src="<?= $key['hinh_anh'] ?>" width="220" height="220" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="product.html"><?= $key['ten_san_pham'] ?></a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price"><?= $key['gia_san_pham'] ?></del>
                                    <span class="product-price"><?= $key['gia_khuyen_mai'] ?></span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <?php endforeach ?>
                    <!-- End .featured-proucts -->

                    

                    <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="category.html">
                                <figure>
                                    <img src="assets/images/demoes/demo4/products/categories/category-1.jpg" alt="category" width="280" height="240" />
                                </figure>
                                <div class="category-content">
                                    <h3>Dress</h3>
                                    <span><mark class="count">3</mark> products</span>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="category.html">
                                <figure>
                                    <img src="assets/images/demoes/demo4/products/categories/category-2.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Watches</h3>
                                    <span><mark class="count">3</mark> products</span>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="category.html">
                                <figure>
                                    <img src="assets/images/demoes/demo4/products/categories/category-3.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Machine</h3>
                                    <span><mark class="count">3</mark> products</span>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="category.html">
                                <figure>
                                    <img src="assets/images/demoes/demo4/products/categories/category-4.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Sofa</h3>
                                    <span><mark class="count">3</mark> products</span>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="category.html">
                                <figure>
                                    <img src="assets/images/demoes/demo4/products/categories/category-6.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Headphone</h3>
                                    <span><mark class="count">3</mark> products</span>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="category.html">
                                <figure>
                                    <img src="assets/images/demoes/demo4/products/categories/category-5.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Sports</h3>
                                    <span><mark class="count">3</mark> products</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="feature-boxes-container">
                <div class="container appear-animate" data-animation-name="fadeInUpShorter">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 feature-box-simple text-center">
                                <div class="feature-box-icon">
                                    <i class="icon-earphones-alt"></i>
                                </div>

                                <div class="feature-box-content p-0">
                                    <h3>Customer Support</h3>
                                    <h5>You Won't Be Alone</h5>

                                    <p>We really care about you and your website as much as you do. Purchasing Porto or any other theme from us you get 100% free support.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 feature-box-simple text-center">
                                <div class="feature-box-icon">
                                    <i class="icon-credit-card"></i>
                                </div>

                                <div class="feature-box-content p-0">
                                    <h3>Fully Customizable</h3>
                                    <h5>Tons Of Options</h5>

                                    <p>With Porto you can customize the layout, colors and styles within only a few minutes. Start creating an amazing website right now!</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box px-sm-5 feature-box-simple text-center">
                                <div class="feature-box-icon">
                                    <i class="icon-action-undo"></i>
                                </div>
                                <div class="feature-box-content p-0">
                                    <h3>Powerful Admin</h3>
                                    <h5>Made To Help You</h5>

                                    <p>Porto has very powerful admin features to help customer to build their own shop in minutes without any special skills in web development.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container-->
            </section>
            <!-- End .feature-boxes-container -->

            <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="assets/images/demoes/demo4/banners/banner-5.jpg">
                <div class="promo-banner banner container text-uppercase">
                    <div class="banner-content row align-items-center text-center">
                        <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                            <h2 class="mb-md-0 text-white">Top Fashion<br>Deals</h2>
                        </div>
                        <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn" data-animation-delay="300">
                            <a href="category.html" class="btn btn-dark btn-black ls-10">View Sale</a>
                        </div>
                        <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="600">
                            <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                                <b>Exclusive
									COUPON</b></h4>
                            <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-white bg-secondary ls-n-10">$100</b> OFF</h5>
                        </div>
                    </div>
                </div>
            </section>

            <section class="blog-section pb-0">
                <div class="container">
                    <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
                        Latest News</h2>

                    <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
						'dots': false,
						'items': 2,
						'responsive': {
							'0': {
								'items': 1
							},
							'480': {
								'items': 2
							},
							'576': {
								'items': 3
							},
							'768': {
								'items': 4
							}
						}
					}">
                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="assets/images/blog/home/post-1.jpg" alt="Post" width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>
                            </div>
                            <!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="single.html">Top New Collection</a>
                                </h2>
                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
                                </div>
                                <!-- End .post-content -->
                                <a href="single.html" class="post-comment">0 Comments</a>
                            </div>
                            <!-- End .post-body -->
                        </article>
                        <!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="assets/images/blog/home/post-2.jpg" alt="Post" width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>
                            </div>
                            <!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="single.html">Fashion Trends</a>
                                </h2>
                                <div class="post-content">
                                    <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of...</p>
                                </div>
                                <!-- End .post-content -->
                                <a href="single.html" class="post-comment">0 Comments</a>
                            </div>
                            <!-- End .post-body -->
                        </article>
                        <!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="assets/images/blog/home/post-3.jpg" alt="Post" width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>
                            </div>
                            <!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="single.html">Right Choices</a>
                                </h2>
                                <div class="post-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the...</p>
                                </div>
                                <!-- End .post-content -->
                                <a href="single.html" class="post-comment">0 Comments</a>
                            </div>
                            <!-- End .post-body -->
                        </article>
                        <!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="assets/images/blog/home/post-4.jpg" alt="Post" width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>
                            </div>
                            <!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="single.html">Perfect Accessories</a>
                                </h2>
                                <div class="post-content">
                                    <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of...</p>
                                </div>
                                <!-- End .post-content -->
                                <a href="single.html" class="post-comment">0 Comments</a>
                            </div>
                            <!-- End .post-body -->
                        </article>
                        <!-- End .post -->
                    </div>

                    <hr class="mt-0 m-b-5">

                    <div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="500" data-owl-options="{
					'margin': 0}">
                        <img src="assets/images/brands/brand1.png" width="130" height="56" alt="brand">
                        <img src="assets/images/brands/brand2.png" width="130" height="56" alt="brand">
                        <img src="assets/images/brands/brand3.png" width="130" height="56" alt="brand">
                        <img src="assets/images/brands/brand4.png" width="130" height="56" alt="brand">
                        <img src="assets/images/brands/brand5.png" width="130" height="56" alt="brand">
                        <img src="assets/images/brands/brand6.png" width="130" height="56" alt="brand">
                    </div>
                    <!-- End .brands-slider -->

                    <hr class="mt-4 m-b-5">

                    <div class="product-widgets-container row pb-2">
                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                            <h4 class="section-sub-title">Featured Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-1.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-1-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Ultimate 3D Bluetooth Speaker</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-2.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-2-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Brown Women Casual HandBag</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-3.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-3-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Circled Ultimate 3D Speaker</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                            <h4 class="section-sub-title">Best Selling Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-4.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-4-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Blue Backpack for the Young -
											S</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-5.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-5-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Casual Spring Blue Shoes</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-6.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-6-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Men Black Gentle Belt</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="800">
                            <h4 class="section-sub-title">Latest Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-7.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-7-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Brown-Black Men Casual Glasses</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-8.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-8-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Brown-Black Men Casual Glasses</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-9.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-9-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Black Men Casual Glasses</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="1100">
                            <h4 class="section-sub-title">Top Rated Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-10.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-10-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Basketball Sports Blue Shoes</a>
                                    </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-11.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-11-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Men Sports Travel Bag</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/small/product-12.jpg" width="84" height="84" alt="product">
                                        <img src="assets/images/products/small/product-12-2.jpg" width="84" height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <h3 class="product-title"> <a href="product.html">Brown HandBag</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                    </div>
                    <!-- End .row -->
                </div>
            </section>
        </main>
        <!-- End .main -->

        <footer class="footer bg-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Address:</span>123 Street Name, City, England
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Phone:</span><a href="tel:">(123)
											456-7890</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a href="https://portotheme.com/cdn-cgi/l/email-protection#b7dad6dedbf7d2cfd6dac7dbd299d4d8da"><span class="__cf_email__" data-cfemail="4e232f27220e2b362f233e222b602d2123">[email&#160;protected]</span></a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                                </div>
                                <!-- End .social-icons -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>

                                <ul class="links">
                                    <li><a href="#">Help & FAQs</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Shipping & Delivery</a></li>
                                    <li><a href="#">Orders History</a></li>
                                    <li><a href="#">Advanced Search</a></li>
                                    <li><a href="dashboard.html">My Account</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="#">Corporate Sales</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Popular Tags</h4>

                                <div class="tagcloud">
                                    <a href="#">Bag</a>
                                    <a href="#">Black</a>
                                    <a href="#">Blue</a>
                                    <a href="#">Clothes</a>
                                    <a href="#">Fashion</a>
                                    <a href="#">Hub</a>
                                    <a href="#">Shirt</a>
                                    <a href="#">Shoes</a>
                                    <a href="#">Skirt</a>
                                    <a href="#">Sports</a>
                                    <a href="#">Sweater</a>
                                </div>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget widget-newsletter">
                                <h4 class="widget-title">Subscribe newsletter</h4>
                                <p>Get all the latest information on events, sales and offers. Sign up for newsletter:
                                </p>
                                <form action="#" class="mb-0">
                                    <input type="email" class="form-control m-b-3" placeholder="Email address" required>

                                    <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                                </form>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom">
                    <div class="container d-sm-flex align-items-center">
                        <div class="footer-left">
                            <span class="footer-copyright">© Porto eCommerce. 2021. All Rights Reserved</span>
                        </div>

                        <div class="footer-right ml-auto mt-1 mt-sm-0">
                            <div class="payment-icons">
                                <span class="payment-icon visa" style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                                <span class="payment-icon paypal" style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                                <span class="payment-icon stripe" style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                                <span class="payment-icon verisign" style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .footer-bottom -->
            </div>
            <!-- End .container -->
        </footer>
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="demo4.html">Home</a></li>
                    <li>
                        <a href="?act=danhmuc">Danh mục</a>
                        
                    </li>
                    <li>
                        <a href="product.html">Products</a>
                        <ul>
                            <li>
                                <a href="#" class="nolink">PRODUCT PAGES</a>
                                <ul>
                                    <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                    <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                    <li><a href="product.html">SALE PRODUCT</a></li>
                                    <li><a href="product.html">FEATURED & ON SALE</a></li>
                                    <li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
                                    <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                    <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                    <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                <ul>
                                    <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                    <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                    <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                    <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                    <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                    <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
                                    <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                    <li><a href="#">BUILD YOUR OWN</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        <ul>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="#">Elements</a>
                        <ul class="custom-scrollbar">
                            <li><a href="element-accordions.html">Accordion</a></li>
                            <li><a href="element-alerts.html">Alerts</a></li>
                            <li><a href="element-animations.html">Animations</a></li>
                            <li><a href="element-banners.html">Banners</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-call-to-action.html">Call to Action</a></li>
                            <li><a href="element-countdown.html">Count Down</a></li>
                            <li><a href="element-counters.html">Counters</a></li>
                            <li><a href="element-headings.html">Headings</a></li>
                            <li><a href="element-icons.html">Icons</a></li>
                            <li><a href="element-info-box.html">Info box</a></li>
                            <li><a href="element-posts.html">Posts</a></li>
                            <li><a href="element-products.html">Products</a></li>
                            <li><a href="element-product-categories.html">Product Categories</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                            <li><a href="element-testimonial.html">Testimonials</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="mobile-menu mt-2 mb-2">
                    <li class="border-0">
                        <a href="#">
							Special Offer!
						</a>
                    </li>
                    <li class="border-0">
                        <a href="#" target="_blank">
							Buy Porto!
							<span class="tip tip-hot">Hot</span>
						</a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="login.html" class="login-link">Log In</a></li>
                </ul>
            </nav>
            <!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo4.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="category.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
					<span class="cart-count badge-circle">3</span>
				</i>Cart
            </a>
        </div>
    </div>

    
    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/optional/isotope.pkgd.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
</body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2024 03:35:29 GMT -->
</html>