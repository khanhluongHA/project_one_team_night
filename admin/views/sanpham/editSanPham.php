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
            <div class="col-md-15">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Thông tin sản phẩm</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <form action="?act=sua-san-pham" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                      <label for="ten_san_pham">Tên sản phẩm</label>
                      <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control"
                        value="<?= $sanPham['ten_san_pham'] ?>">
                      <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="gia_san_pham">Giá sản phẩm</label>
                      <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control"
                        value="<?= $sanPham['gia_san_pham'] ?>">
                      <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                      <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control"
                        value="<?= $sanPham['gia_khuyen_mai'] ?>">
                      <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="hinh_anh">Hình ảnh</label>
                      <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="so_luong">Số lượng</label>
                      <input type="number" id="so_luong" name="so_luong" class="form-control"
                        value="<?= $sanPham['so_luong'] ?>">
                      <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="ngay_nhap">Ngày nhập</label>
                      <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control"
                        value="<?= $sanPham['ngay_nhap'] ?>">
                      <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="inputStatus">Danh mục sản phẩm</label>
                      <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                        <?php foreach ($listDanhMuc as $danhMuc): ?>
                          <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>">
                            <?= $danhMuc['ten_danh_muc'] ?>
                          </option>
                        <?php endforeach ?>
                      </select>
                      </select>
                      <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="trang_thai">Trạng thái</label>
                      <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                        
                          <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                          <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán</option>
                        
                      </select>
                      </select>
                      <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="mo_ta">Mô tả sản phẩm</label>
                      <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $danhMuc['mo_ta'] ?></textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                  </div>
              </div>
              </form>
              <!-- /.card -->
            </div>
           
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