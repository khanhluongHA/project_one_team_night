<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Thêm nngười dùng | NN Shop</title>
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
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <a href="?act=form-them-san-pham">
                    <button class="btn btn-success">
                        Thêm sản phẩm mới
                    </button>
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listSanPham as $key=>$sanPham): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $sanPham['ten_san_pham'] ?></td>
                        <td>
                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="width: 100px" alt="" 
                            onerror="this.onerror=null; this.src='https://i.imgur.com/puGSsnW.jpg'">
                        </td>
                        <td><?= $sanPham['gia_san_pham'] ?></td>
                        <td><?= $sanPham['so_luong'] ?></td>
                        <td><?= $sanPham['ten_danh_muc'] ?></td>
                        <td><?= $sanPham['trang_thai']== 1 ?'Còn bán':'Dừng bán'; ?></td>
                        <td>
                        <div class="btn-group">

                        <a  href="?act=chi-tiet-san-pham&id_san_pham=<?= $sanPham['id'] ?>">
                                <button style="border: none; background: none;" class="ri-dashboard-2-line"><i class="fas fa-eye"></i></button>
                        </a>

                        <a href="?act=form-sua-san-pham&id_san_pham=<?= $sanPham['id'] ?>">
                                <button style="border: none; background: none;" class="link-success fs-15"><i class="ri-edit-2-line"></i></button>
                        </a>

                        <a href="?act=xoa-san-pham&id_san_pham=<?= $sanPham['id'] ?>" onclick="return confirm('Bạn có muốn xóa không')">
                        <button type="submit" class="link-danger fs-15" style="border: none; background: none;">
                        <i class="ri-delete-bin-line"></i></button>
                        </a>

                        </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
    </section>
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