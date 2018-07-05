
<?php
    $this->start('child');
?>
  <div class="container">
      <?php 
        echo (isset($message) ? $message : '');
      ?>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Thêm user</div>
      <div class="card-body">
        <form action="kiem-tra-them-users" method="POST" onsubmit="return checkFormUser()" enctype="multipart/form-data">
          <div class="form-group">
            <label>Tên</label>
            <input class="form-control" value="<?= isset($_POST['name'])? $_POST['name'] : '' ?>" name="name" type="text" placeholder="Họ và tên">
            <b class="show"></b>
            <?php if (isset($validationErr['name'])) {
                foreach ($validationErr['name'] as $key => $value) {
                  echo "<span class='messageError'>$value</span>";
                }
            } 
            ?>
          </div>
          
          <div class="form-group">
            <label >Giới tính</label>
            <input type="radio" name="sex" value="1" >Nam
            <input type="radio" name="sex" value="0" checked>Nữ
          </div>
          <div class="form-group">
            <label >Email</label>
            <input class="form-control" value="<?= isset($_POST['email'])? $_POST['email'] : '' ?>"   name="email" type="text" placeholder="Email">
            <b class="show"></b>
            <?php 
            if (isset($validationErr['email'])) {
                foreach ($validationErr['email'] as $key => $value) {
                  echo "<span class='messageError'>$value</span>";
                }
            }
            if (isset($err)) {
              foreach ($err['email'] as $key => $value) {
                echo "<span class='messageError'>$value</span>";
              }
            }
            ?>
          </div>
          <div class="form-group">
            <label >Password</label>
            <input class="form-control" value="<?= isset($_POST['password'])? $_POST['password'] : '' ?>"  name="password" type="password" placeholder="Password">
            <b class="show"></b>
            <?php if (isset($validationErr['password'])) {
                foreach ($validationErr['password'] as $key => $value) {
                  echo "<span class='messageError'>$value</span>";
                }
            } 
            ?>
          </div>
          <div class="form-group">
            <label >Hình avatar</label>
            <input type="file" name="avatar"  >
            <b class="show"></b>
            <?php 
              if (isset($validationErr['avatar'])) {
                foreach ($validationErr['avatar'] as $key => $value) {
                  echo "<span class='messageError'>$value</span>";
                }
              }
            ?>
          </div>
          <div class="form-group">
            <label >Địa chỉ</label>
            <input class="form-control" value="<?= isset($_POST['address'])? $_POST['address'] : '' ?>"  name="address" type="text" placeholder="Nhập địa chỉ">
            <b class="show"></b>
            <?php if (isset($validationErr['address'])) {
                foreach ($validationErr['address'] as $key => $value) {
                  echo "<span class='messageError'>$value</span>";
                }
            } 
            ?>
          </div>
          <div class="form-group">
            <label >Số điện thoại</label>
            <input class="form-control" value="<?= isset($_POST['phone'])? $_POST['phone'] : '' ?>" name="phone" type="text" placeholder="Nhập số điện thoại">
            <b class="show"></b>
            <?php if (isset($validationErr['phone'])) {
                foreach ($validationErr['phone'] as $key => $value) {
                  echo "<span class='messageError'>$value</span>";
                }
            } 
            ?>
          </div>
          <input class="btn btn-primary btn-block" name="submit" value="Thêm" type="submit">
        </form>
      </div>
    </div>
  </div>
<?php $this->end(); ?>