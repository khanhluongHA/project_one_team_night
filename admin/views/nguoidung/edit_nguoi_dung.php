<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Cập nhật người dùng | NN Shop</title>
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
                                <h4 class="mb-sm-0">Cập nhật người dùng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Cập nhật người dùng</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Cập nhật người dùng</h4>
                                    
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="?act=sua-nguoi-dung" method="POST">
                                            <input type="hidden" name="id_nguoi_dung" value="<?= $nguoiDung['id_nguoi_dung'] ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên người dùng</label>
                                                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= $nguoiDung['email'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['email'] ) ? $_SESSION['errors']['email'] : '' ?>
                                                        </span>

                                                        <label for="citynameInput" class="form-label">ngày sinh</label>
                                                        <input type="text" class="form-control" placeholder="Nhập ngày sinh" name="ngay_sinh" value="<?= $nguoiDung['ngay_sinh'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['ngay_sinh'] ) ? $_SESSION['errors']['ngay_sinh'] : '' ?>
                                                        </span>

                                                        <label for="citynameInput" class="form-label">giới tính</label>
                                                        <input type="text" class="form-control" placeholder="Nhập giới tính" name="gioi_tinh" value="<?= $nguoiDung['gioi_tinh'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['gioi_tinh'] ) ? $_SESSION['errors']['gioi_tinh'] : '' ?>
                                                        </span>

                                                        <label for="citynameInput" class="form-label">số điện thoại</label>
                                                        <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="so_dien_thoai" value="<?= $nguoiDung['so_dien_thoai'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['so_dien_thoai'] ) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>
                                                        </span>

                                                        <label for="citynameInput" class="form-label">Tên ngày đăng kí</label>
                                                        <input type="text" class="form-control" placeholder="Nhập ngày đăng kí" name="ngay_dang_ki" value="<?= $nguoiDung['ngay_dang_ki'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['ngay_dang_ki'] ) ? $_SESSION['errors']['ngay_dang_ki'] : '' ?>
                                                        </span>

                                                        <label for="citynameInput" class="form-label">đăng nhập ngày cuối</label>
                                                        <input type="text" class="form-control" placeholder="Nhập ngày đăng nhập cuối" name="dang_nhap_ngay_cuoi" value="<?= $nguoiDung['dang_nhap_ngay_cuoi'] ?>">
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['dang_nhap_ngay_cuoi'] ) ? $_SESSION['errors']['dang_nhap_ngay_cuoi'] : '' ?>
                                                        </span>
                                                    </div>

                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Trạng Thái</label>
                                                        <select  class="form-select" name="trang_thai">
                                                        
                                                            <option selected disabled>Chọn trạng thái</option>
                                                           
                                                            <option value="1" <?= $nguoiDung['trang_thai'] == 1 ? 'selected' : '' ?> >Hiển thị</option>
                                                            <option value="2" <?= $nguoiDung['trang_thai'] == 2 ? 'selected' : '' ?>>Không hiển thị</option>
                                                        </select>
                                                        <span class="text-danger">
                                                         <?= !empty($_SESSION['errors']['trang_thai'] ) ? $_SESSION['errors']['trang_thai'] : '' ?>
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