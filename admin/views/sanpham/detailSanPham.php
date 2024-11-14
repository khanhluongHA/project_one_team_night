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

<!-- Default box -->
            <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                    <img style="width: 430px; height: 400px" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>"
                        class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                    <?php foreach ($listAnhSanPham as $key => $anhSP): ?>
                        <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img
                            src="<?= BASE_URL . $anhSP['link_hinh_anh']; ?>" alt="Product Image"></div>
                    <?php endforeach ?>
                    <style>
                        .product-image-thumbs {
                        display: flex;
                        gap: 10px;
                        margin-top: 20px;
                        }

                        .product-image-thumb {
                        flex: 0 0 auto;
                        border: 1px solid #ccc;
                        padding: 5px;
                        border-radius: 5px;
                        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
                        transition: transform 0.2s ease;
                        }

                        .product-image-thumb img {
                        width: 90px;
                        height: 80px;
                        display: block;
                        }

                        .product-image-thumb:hover {
                        transform: scale(1.05);
                        }
                    </style>    
                    </div>
                </div>
                <div class="col-12 col-sm-6" style="margin-top: 50px;">
                    <h3 class="my-3">Tên sản phẩm: <?= $sanPham['ten_san_pham'] ?></h3>
                    <hr>
                    <h4 class="mt-3">Giá tiền: <small><?= $sanPham['gia_san_pham'] ?></small></h4>
                    <h4 class="mt-3">Giá khuyến mãi: <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>
                    <h4 class="mt-3">Số lượng: <small><?= $sanPham['so_luong'] ?></small></h4>
                    <h4 class="mt-3">Lượt xem: <small><?= $sanPham['luot_xem'] ?></small></h4>
                    <h4 class="mt-3">Ngày nhập: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
                    <h4 class="mt-3">Danh mục: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
                    <h4 class="mt-3">Trạng thái: <small><?= $sanPham['trang_thai'] == 1 ? 'Còn Bán' : 'Dừng bán' ?></small></h4>
                    <h4 class="mt-3">Mô tả: <small><?= $sanPham['mo_ta'] ?></small></h4>
                </div>
                </div>

                <div class="col-12">
                <hr>
                <br>
                <h2>Bình luận của sản phẩm</h2>
                <div>
                    <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>STT</th>
                        <th>Người bình luận</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><a target="_blank" href="?act=chi-tiet-khach-hang&id_khach_hang=<?= $binhLuan['tai_khoan_id'] ?>">
                                <?= $binhLuan['ho_ten'] ?></a>
                            </td>
                            <td><?= $binhLuan['noi_dung'] ?></td>
                            <td><?= $binhLuan['ngay_dang'] ?></td>
                            <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                            <td>
                            <div class="btn-group">

                                <form action="?act=update-trang-thai-binh-luan" method="POST">
                                <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>" id="">
                                <input type="hidden" name="name_view" value="detail_sanpham" id="">
                                <button onclick="return confirm('Đại vương có muốn ẩn bình luận không')"
                                    class="btn btn-warning">
                                    <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Hiển thị' ?>
                                </button>
                                </form>

                            </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                    </table>
                </div>
                </div>

            </div>
            <!-- /.card-body -->
            </div>
<!-- /.card -->

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