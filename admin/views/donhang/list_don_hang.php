<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Đơn hàng Sản Phẩm | NN Shop</title>
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
                                <h4 class="mb-sm-0">Quản đơn hàng sản phẩm</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Quản lý đơn hàng sản phẩm</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Danh Sách đơn hàng Sản Phẩm</h4>
                                    <form action="search.php" method="GET">
                                    <input type="text" name="example1" placeholder="Nhập từ khóa tìm kiếm">
                                    <button type="submit">Tìm kiếm</button>
                                    </form>
                                    </form>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Mã đơn hàng</th>
                                                        <th scope="col">Tên ngf nhận</th>
                                                        <th scope="col">Số điện thoại</th>
                                                        <th scope="col">ngày đặt</th>
                                                        <th scope="col">Tổng tiền</th>
                                                        <th scope="col">Trạng Thái</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($donHangs as $index => $donHang) : ?>
                                                    <tr>
                                                        <td class="fw-medium"><?= $index+1; ?></td>
                                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>  
                                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>  
                                                        <td><?= $donHang['ngay_dat'] ?></td>  
                                                        <td><?= $donHang['tong_tien'] ?></td>  
                                                       
                                                        <td>
                                                            <?php 
                                                            if($donHang['trang_thai_don_hang'] ==1) { ?>
                                                            <span class="badge bg-success">Đang xử lí</span>
                                                            <?php } else { ?>
                                                                <span class="badge bg-danger">đã giao</span>
                                                           <?php }
                                                            ?>
                                                            
                                                            
                                                        </td>
                                                        <td>
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href="?act=form-sua-don-hang&don_hang_id=<?= $donHang['id']?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                        
                                                                        
                                                                        
                                                                        <a href="?act=chitietdonhangs"><i class="ri-dashboard-2-line"></i></a>
                    
  
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                    </tr>
                                                    
                                                   <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div><!-- end card-body -->
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
     <script>
        $(function() {
            $("#example1").DataTable({
                "responsive" :true,
                "lengthChange" :false,
                "autoWidth" :false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging":true,
                "lengthChange":false,
                "searching":false,
                "ordering":true,
                "info":true,
                "autoWidth":false,
                "responsive":true,
            });
        });
     </script>



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