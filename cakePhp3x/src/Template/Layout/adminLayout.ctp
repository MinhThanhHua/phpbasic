<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= (isset($title))? $title : '' ?></title>
  <!-- Bootstrap core CSS-->
  <?= $this->Html->css('bootstrap.min.css') ?>
  <!-- Custom fonts for this template-->
  <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
  <!-- Page level plugin CSS-->
  <?= $this->Html->css('dataTables.bootstrap4.css') ?>
  <!-- Custom styles for this template-->
  <?= $this->Html->css('sb-admin.css') ?>
  <style>
  .messageError{
    color: red;
  }
  .pagination li a{
    display: block;
    padding: 5px;
    text-decoration: none;
    
  }
  .pagination {

    float: right;
    border: 3px solid #73AD21;
  }
</style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-user-secret"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="/">Quản lý users</a>
            </li>
            <li>
              <a href="/them-user">Thêm users</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            Welcome 
            <?php 
                $session = $this->request->getSession();
                if ($session->check('user')) {
                  echo $session->read('user')['name'];
                }
             ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">
              <strong>Image</strong>
              <div class="dropdown-message small">
                <?php
                  if (!empty($session->read('user')['avatar'])) {
                    echo "<img  src='/img/uploads/" . $session->read('user')['avatar'] . "' width='50px' height='50px' ";
                  } else {
                    echo "Không có ảnh";
                  }
                ?>
                
              </div>
            </a>
            <strong > <a href="/doi-mat-khau">Đổi mật khẩu</a></strong>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <?= $this->fetch('child')?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Hứa Minh Thành</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thoát</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có thực sự muốn đăng xuất?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
            <a class="btn btn-primary" href="<?= $base_url ?> login">Đăng xuất</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>
    <!-- Core plugin JavaScript-->
    <?= $this->Html->script('jquery.easing.min.js') ?>
    <!-- Page level plugin JavaScript-->

    <?= $this->Html->script('dataTables.bootstrap4.js') ?>
    <!-- Custom scripts for all pages-->
    <?= $this->Html->script('sb-admin.min.js') ?>
    <!-- Custom scripts for this page-->
    <?= $this->Html->script('sb-admin-datatables.min.js') ?>
  </div>
</body>

</html>
