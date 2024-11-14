<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Cập nhật danh mục sản phẩm | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once  "views/layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>
        
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Cập nhật đơn hàng sản phẩm</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Cập nhật đơn hàng sản phẩm</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Cập nhật danh mục</h4>
                                    
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="?act=sua-don-hang" method="POST">
                                            <input type="hidden" name="id" value="<?= $donHang['id'] ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên đơn hàng</label>
                                                        <input type="text" class="form-control"  name="ma_don_hang" value="<?= $donHang['ma_don_hang'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['ma_don_hang'] ) ? $_SESSION['errors']['ma_don_hang'] : '' ?>
                                                        </span>
                                                        </div>
                                                </div>
                                                        <div class="col-md-6">
                                                        <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên đơn hàng</label>
                                                        <input type="text" class="form-control"  name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['ten_nguoi_nhan'] ) ? $_SESSION['errors']['ten_nguoi_nhan'] : '' ?>
                                                        </span>
                                                        </div>
                                                </div>
                                                        <div class="col-md-6">
                                                        <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên đơn hàng</label>
                                                        <input type="text" class="form-control"  name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['sdt_nguoi_nhan'] ) ? $_SESSION['errors']['sdt_nguoi_nhan'] : '' ?>
                                                        </span>
                                                        </div>
                                                </div>
                                                        <div class="col-md-6">
                                                        <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên đơn hàng</label>
                                                        <input type="date" class="form-control"  name="ngay_dat" value="<?= $donHang['ngay_dat'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['ngay_dat'] ) ? $_SESSION['errors']['ngay_dat'] : '' ?>
                                                        </span>
                                                        </div>
                                                </div>
                                                        <div class="col-md-6">
                                                        <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên đơn hàng</label>
                                                        <input type="double" class="form-control"  name="tong_tien" value="<?= $donHang['tong_tien'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['tong_tien'] ) ? $_SESSION['errors']['tong_tien'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Trạng Thái</label>
                                                        <select id="ForminputState"  class="form-select" name="trang_thai_don_hang" value="<?= $donHang['trang_thai_don_hang'] ?>">
                                                            <option selected disabled>Chọn trạng thái</option>          
                                                            <option value="1" <?= $donHang['trang_thai_don_hang'] == 1 ? 'selected' : '' ?> >Đang xử lí</option>
                                                            <option value="2" <?= $donHang['trang_thai_don_hang'] == 2 ? 'selected' : '' ?>>Đã giao</option>
                                                        </select>
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['trang_thai_don_hang'] ) ? $_SESSION['errors']['trang_thai_don_hang'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                    
                                </div>
                            </div><!-- end card -->

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>