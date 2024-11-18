<!-- header -->
<?php require './views/layout/header.php'; ?>   
<!-- end header -->

<!-- navbar -->
<?php include './views/layout/navbar.php'; ?>   
<!-- end navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lí Bình Luận</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm Bình Luận</h3>
            </div>

            <form action=" ?act=them-binh-luan" method="POST" enctype="multipart/form-data">
              <div class="card-body">

                <div class="form-group">
                  <label>ID sản phẩm</label>
                  <input type="number" class="form-control" name="san_pham_id" placeholder="Nhập id sản phẩm">
                  <?php if (isset($errors['san_pham_id'])){ ?>
                    <p class="text-danger"><?= $errors['san_pham_id'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>ID tài khoản</label>
                  <input type="number" class="form-control" name="tai_khoan_id" placeholder="Nhập id tài khoản">
                  <?php if (isset($errors['tai_khoan_id'])){ ?>
                    <p class="text-danger"><?= $errors['tai_khoan_id'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Nội dung</label>
                  <textarea class="form-control" name="noi_dung" placeholder="Nhập nội dung bình luận"></textarea>
                  <?php if (isset($errors['noi_dung'])){ ?>
                    <p class="text-danger"><?= $errors['noi_dung'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Ngày đăng</label>
                  <input type="date" class="form-control" name="ngay_dang" placeholder="Chọn ngày đăng">
                  <?php if (isset($errors['ngay_dang'])){ ?>
                    <p class="text-danger"><?= $errors['ngay_dang'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
  <label>Trạng thái</label>
  <select class="form-control" name="trang_thai">
    <option value="1" <?= (isset($trang_thai) && $trang_thai == 1) ? 'selected' : '' ?>>Hiển thị</option>
    <option value="2" <?= (isset($trang_thai) && $trang_thai == 2) ? 'selected' : '' ?>>Ẩn</option>
  </select>
  <?php if (isset($errors['trang_thai'])) { ?>
    <p class="text-danger"><?= $errors['trang_thai'] ?></p>
  <?php } ?>
</div>


              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->
