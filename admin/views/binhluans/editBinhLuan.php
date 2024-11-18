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
              <h3 class="card-title">Sửa Bình Luận</h3>
            </div>

            <form action=" ?act=sua-binh-luan ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="id" value="<?= $binhLuan['id'] ?>" hidden>

              

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
