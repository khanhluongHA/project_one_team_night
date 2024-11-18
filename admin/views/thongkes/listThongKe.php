<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>cập nhập trạng thái  | NN Shop</title>
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
        ?>
        
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Báo cáo thống kê</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- <style>
            .a{
                margin-left: 20px;
                text-align: center;
            }
        </style> -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                        <div class="row">
                            <!-- Tổng Doanh Thu -->
                            <div class="col-12 col-sm-6 col-md-3" style="margin-left: 13%;">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1">
                                        <img src="https://png.pngtree.com/png-vector/20220805/ourmid/pngtree-monochrome-revenue-icon-for-infographics-web-design-and-templates-vector-png-image_47958498.jpg" alt="Tổng Doanh Thu" style="width: 40px; height: 40px;">
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Tổng Doanh Thu</span>
                                        <span class="info-box-number">
                                            <?php if (isset($tongDoanhThu['TongDoanhThu'])): ?>
                                                <strong><?= number_format($tongDoanhThu['TongDoanhThu'], 2) ?> VNĐ</strong>
                                            <?php else: ?>
                                                <strong>0 VNĐ</strong>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Hàng tồn -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1">
                                        <img width="40" height="40" src="https://intech-group.vn/uploads/noidung/images/safety-stock-1.jpg" alt="Logo" class="info-box-logo">
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Số lượng hàng còn</span>
                                        <span class="info-box-number">
                                            <?php if (isset($tongDonHangChoXuLy['TongDonHangTon'])): ?>
                                                <strong><?= $tongDonHangChoXuLy['TongDonHangTon'] ?></strong>
                                            <?php else: ?>
                                                <strong>0</strong>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Đơn hàng đã bán -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1">
                                        <img width="40px" height="40px" src="https://phuongnamvina.com/img_data/images/design-logo-ban-hang-online.jpg" alt="Logo" class="info-box-logo">
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Đơn hàng đã bán</span>
                                        <span class="info-box-number">
                                            <?php if (isset($soLuongBan['so_luong_ban'])): ?>
                                                <strong><?= $soLuongBan['so_luong_ban'] ?></strong>
                                            <?php else: ?>
                                                <strong>0</strong>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Monthly Recap Report -->
                        <div class="row">
                            <!-- Biểu đồ Doanh Thu Hàng Ngày -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Bảng thống kê</h5>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="doanhThuHangNgayChart" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>

         

            <script>
                <?php
                // Sử dụng dữ liệu đã được lấy từ model
                $labels = array_column($doanhThuHangNgay, 'Ngay'); // Nhãn cho các cột (ngày)
                $dataDoanhThu = array_column($doanhThuHangNgay, 'TongDoanhThu'); // Dữ liệu doanh thu
                ?>

                // Chuyển dữ liệu PHP sang JavaScript cho Chart.js
                const labels = <?php echo json_encode($labels); ?>;
                const data = <?php echo json_encode($dataDoanhThu); ?>;

                const ctx = document.getElementById('doanhThuHangNgayChart').getContext('2d');
                const doanhThuHangNgayChart = new Chart(ctx, {
                    type: 'bar', // Loại biểu đồ (bar, line, pie,...)
                    data: {
                        labels: labels, // Gán nhãn (ngày)
                        datasets: [{
                            label: 'Doanh Thu (VND)',
                            data: data, // Dữ liệu doanh thu
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true,
                            tension: 0.3 // Độ cong của đường biểu đồ
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Doanh Thu 5 Ngày Gần Nhất'
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Ngày'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Doanh Thu (VND)'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });

            </script>

        </body>

        <style>

        /* Cải thiện giao diện thẻ chứa biểu đồ */
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 2px solid #ddd;
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
        }

        .card-tools button {
            font-size: 16px;
        }
        .info-box {
        display: flex;
        margin: 5px;
        border-radius: 8px; /* Bo tròn góc */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        padding: 10px; /* Padding bên trong */
        transition: transform 0.3s; /* Hiệu ứng khi hover */
        }

        .info-box:hover {
            transform: scale(1.05); /* Phóng to khi hover */
        }

        .info-box-icon {
            font-size: 20px; /* Kích thước biểu tượng */
            padding: 5px; /* Padding cho biểu tượng */
            border-radius: 10%; /* Bo tròn biểu tượng */
        }

        .info-box-text {
            font-size: 15px; /* Kích thước chữ cho tiêu đề */
            font-weight: bold; /* Chữ đậm */
            color: #333; /* Màu chữ */
        }

        .info-box-number {
            font-size: 15px; /* Kích thước chữ cho số tiền */
            color: #28a745; /* Màu chữ cho số tiền */
        }

        /* Cải thiện giao diện cho canvas (biểu đồ) */
        canvas {
            max-width: 100% !important;
            height: auto !important;
        }



        </style>

        </html>
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
