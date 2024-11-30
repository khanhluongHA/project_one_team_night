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
                            <?php
                            if($donHang['trang_thai_don_hang'] == 1){
                                $colorAlerts = 'primary';

                            }elseif($donHang['trang_thai_don_hang'] >= 2 && $donHang['trang_thai_don_hang'] <= 6){
                                $colorAlerts = 'warning';
                            }elseif($donHang['trang_thai_don_hang'] == 7 ){
                                $colorAlerts = 'success';
                            }else{
                                $colorAlerts = 'danger';
                            }
                            ?>
                            
                            
                            
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                            
                             <h4 class="mb-sm-0">Quản lý danh sách đơn hàng - đơn hàng </h4>

                                <div >
                                <div >
                                        <form action="" method="POST">
                                            <select id="ForminputState" class="form-select" name="trang_thai_don_hang">
                                                            <option selected disabled>Chọn trạng thái</option>
                                                            <option value="1" <?= $donHang['trang_thai_don_hang'] == 1 ? 'selected' : '' ?> <?= $donHang['trang_thai_don_hang'] > 1 ? 'disabled' : '' ?>>Chưa xác nhận</option>
                                                            <option value="2" <?= $donHang['trang_thai_don_hang'] == 2 ? 'selected' : '' ?> <?= $donHang['trang_thai_don_hang'] > 2 ? 'disabled' : '' ?>>Đã xác nhận</option>
                                                            <option value="3" <?= $donHang['trang_thai_don_hang'] == 3 ? 'selected' : '' ?> <?= $donHang['trang_thai_don_hang'] > 3 ? 'disabled' : '' ?>>Đang giao</option>
                                                            <option value="4" <?= $donHang['trang_thai_don_hang'] == 4 ? 'selected' : '' ?> <?= $donHang['trang_thai_don_hang'] > 4 ? 'disabled' : '' ?>>Đã giao</option>
                                                            <option value="5" <?= $donHang['trang_thai_don_hang'] == 5 ? 'selected' : '' ?> <?= $donHang['trang_thai_don_hang'] > 5 ? 'disabled' : '' ?>>Giao hàng thành công</option>
                                                            <option value="6" <?= $donHang['trang_thai_don_hang'] == 6 ? 'selected' : '' ?> <?= $donHang['trang_thai_don_hang'] > 6 ? 'disabled' : '' ?>>Giao hàng thất bại</option>
                                                            <option value="7" <?= $donHang['trang_thai_don_hang'] == 7 ? 'selected' : '' ?> <?= $donHang['trang_thai_don_hang'] == 7 ? 'disabled' : '' ?>>Đã hủy</option>
                                                        </select>
                                        </form>
                                       
                                    </div>
                                   
                                </div>

                            </div>
                        </div>
                    </div> 
                    <!-- end page title --> <div class="row">
                        <!-- -------------------------------- -->
                    <div class="tab-pane" id="custom-hover-description">
                    <h5 class="text-danger">Ngày đặt hàng: <?= $donHang['ngay_dat'] ?></h5>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Thông tin người đặt</th>
                                                            <th scope="col">Người nhận</th>
                                                            <th scope="col">Thông tin</th>
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Họ tên: <?=$donHang['ten_nguoi_nhan']?></td>
                                                            <td>Họ tên: <?=$donHang['ten_nguoi_nhan']?></td>
                                                            <td>Mã đơn hàng: <?= $donHang['ma_don_hang']?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Email: <?=$donHang['email_nguoi_nhan']?></td>
                                                            <td>  Email: <?=$donHang['email_nguoi_nhan']?></td>
                                                            <td>  Tổng tiền: <?=$donHang['thanh_toan']?></td>
                                                            <th scope="col"> </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Số điện thoại: <?=$donHang['sdt_nguoi_nhan']?></td>
                                                            <td>Địa Chỉ: <?=$donHang['dia_chi_nguoi_nhan']?></td>
                                                            <td>Ghi chú: <?=$donHang['ghi_chu']?></td>
                                               

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Thanh toán: 

                                                            <?php 
                                                        if ($donHang['phuong_thuc_thanh_toan'] == 1) { ?>
                                                            <span class="badge bg-success">Chuyển khoản</span>
                                                        <?php } elseif ($donHang['phuong_thuc_thanh_toan'] == 2) { ?>
                                                            <span class="badge bg-danger">Tiền mặt</span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-warning">Thẻ tín dụng</span>
                                                        <?php } ?>
                                                            </td>
                                                        </tr>
                                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                        <div class="col-6">
                            <!-- ------------------------------------------ -->
                            
                         
                        </div>
                       
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        
                        <div class="col-xxl-9">
                            <div class="card">
                                
                                <form class="needs-validation" novalidate id="invoice_form">
                                   
                                        <!--end row-->
                                    </div>
                                   
                                    <div class="card-body p-4">
                                        <div class="row g-4">
                                            
                                        
                                         
                                                        
                                        <div class="page-right">
                                        
                                           
                                        
                                        
                                         
                            </div>
                                          
                                            <!--end col-->
                                           
                                            <!--end col-->
                                        
                                            <!--end col-->
                                           
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                   
                                    <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col"> Tên Sản Phẩmm</th>
                                                        <th scope="col">Đơn Giá</th>
                                                        <th scope="col">Số Lượng</th>
                                                        <th scope="col">Thành Tiền</th>
                                                   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $tongtien = 0;
                                                    ?>
                                                   <?php
                                                        foreach($sanPhamDonHang as $key=>$sanPham): ?>
                                                        <tr>
                                                            <td><?= $key+1 ?></td>
                                                            <td><?= $sanPham['ten_san_pham'] ?> </td>
                                                            <td><?= $sanPham['gia_san_pham'] ?> </td>
                                                            <td><?= $sanPham['so_luong'] ?> </td>
                                                            <td><?= $sanPham['gia_san_pham'] ?> </td>
                                                           
                                                           
                                                        </tr>
                                                        <?php
                                                        $tongtien += $sanPham['gia_san_pham'];
                                                        ?>
                                                        <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                 
                                </div><!-- end card-body -->
                                </form>
                                
                            </div>
                            <br><h1></h1> <br>
                            <h1></h1><br>
                            <div class="row">
                        <div class="tab-pane"  id="custom-hover-description">
                           <h5>Ngày đặt hàng: <?= $donHang['ngay_dat'] ?></h5>
                        </div>
                       
                        <div class="col-lg-2">
                      
                       
                                                    <tr>
                                                        <hr>
                                                        <th scope="col">Thành Tiền: </th> <td> <?= $tongtien ?></td> <br>
                                                        <hr>
                                                        <th scope="col">Vận chuyển: </th><td>200</td><br><hr>
                                                        <th scope="col">Tổng Tiền: </th><td><?= $tongtien + 200.000 ?></td><br>
                                                    </tr>
                                              
                                              
                                               
                                            </div>
                       
                        </div>
                    </div>
                        </div>
                        
                        <!--end col-->
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