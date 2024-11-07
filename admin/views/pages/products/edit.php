<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        require_once "models/TinTuc.php"
        ?>
    


        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                    <?php
            ?>
        <form action="index.php?action=update&id=<?php echo $tinTuc['id_tin_tuc']; ?>" method="post">
        <div class="mb-3">
                <label for="tieu_de" class="form-label">Tiêu đề:</label>
                <input type="text" class="form-control" id="tieu_de" name="tieu_de" value="<?php echo htmlspecialchars($tinTuc['tieu_de']); ?>" required> 


            </div>
            <div class="mb-3">
                <label for="noi_dung" class="form-label">Nội dung:</label>
                <textarea class="form-control" id="noi_dung" name="noi_dung" rows="5" required><?php echo htmlspecialchars($tinTuc['noi_dung']); ?></textarea>


            </div>
            <div class="mb-3">
                <label for="trang_thai" class="form-label">Trạng thái:</label>
                <select class="form-select" id="trang_thai" name="trang_thai" required>
                    <option value="1" <?php if ($tinTuc['trang_thai'] == 1) echo 'selected'; ?>>Xuất bản</option>
                    <option value="0" <?php if ($tinTuc['trang_thai'] == 0) echo 'selected'; ?>>Nháp</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
        <?php


        // Rest of file assuming you use some layout given html page includes, or form


        ?>
            </div>
            <?php
                $conn = connectDB();
                if ($conn) {
                    displayNews($conn); // Call the function to display news items
                    $conn = null;
                }
                ?>
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