<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login-Admin</title>
  <!-- Bootstrap core CSS-->
  <?= $this->Html->css('bootstrap.min.css') ?>
  <!-- Custom fonts for this template-->
  <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
  <!-- Custom styles for this template-->
  <?= $this->Html->css('sb-admin.css') ?>
  <style>
   .messageError{
    color: red;
  }
  </style>
</head>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đăng nhập</div>
      <div class="card-body">
        <form action="<?= $base_url ?>kiem-tra-dang-nhap" method="POST">
        <?php if (isset($err)) {
            echo "<span class='messageError'>$err</span>";
        } 
        ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" value="<?= isset($_POST['email'])? $_POST['email'] : '' ?>" id="exampleInputEmail1" type="text" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Lưu mật khẩu</label>
            </div>
          </div>
          <input type="submit" value="Đăng nhập" class="btn btn-primary btn-block" >
        </form>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="register.html">Đăng ký tài khoản</a>
          <a class="d-block small" href="forgot-password.html">Quên mật khẩu?</a> -->
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <?= $this->Html->script('jquery.min.js') ?>
  <?= $this->Html->script('bootstrap.bundle.min.js') ?>
  <!-- Core plugin JavaScript-->
  <?= $this->Html->script('jquery.easing.min.js') ?>
</body>

</html>
