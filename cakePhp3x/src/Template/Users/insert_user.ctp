<?php
    $this->start('child');
?>
  <div class="container">
      <?=
      ((!isset($validationErr) && isset($_POST['submit']))? 'Thành công' : '')
      ?>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Thêm user</div>
      <div class="card-body">
        <form action="kiem-tra-them-users" method="POST" onsubmit="return checkFormUser()">
          <div class="form-group">
            <label>Tên</label>
            <input class="form-control" name="name" type="text" placeholder="Họ và tên">
            <b class="show"></b>
            <?php if (isset($validationErr['name'])) {
                foreach ($validationErr['name'] as $key => $value) {
                    echo "<span>$value</span>";
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
            <input class="form-control" name="email" type="email" placeholder="Email">
            <b class="show"></b>
            <?php if (isset($validationErr['email'])) {
                foreach ($validationErr['email'] as $key => $value) {
                    echo "<span>$value</span>";
                }
            } 
            ?>
          </div>
          <div class="form-group">
            <label >Password</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
            <b class="show"></b>
            <?php if (isset($validationErr['password'])) {
                foreach ($validationErr['password'] as $key => $value) {
                    echo "<span>$value</span>";
                }
            } 
            ?>
          </div>
          <div class="form-group">
            <label >Hình avatar</label>
            <input type="file" name="avatar" >
          </div>
          <div class="form-group">
            <label >Địa chỉ</label>
            <input class="form-control" name="address" type="text" placeholder="Nhập địa chỉ">
            <b class="show"></b>
            <?php if (isset($validationErr['address'])) {
                foreach ($validationErr['address'] as $key => $value) {
                    echo "<span>$value</span>";
                }
            } 
            ?>
          </div>
          <div class="form-group">
            <label >Số điện thoại</label>
            <input class="form-control" name="phone" type="text" placeholder="Nhập số điện thoại">
            <b class="show"></b>
            <?php if (isset($validationErr['phone'])) {
                foreach ($validationErr['phone'] as $key => $value) {
                    echo "<span>$value</span>";
                }
            } 
            ?>
          </div>
          <input class="btn btn-primary btn-block" name="submit" value="Thêm" type="submit">
        </form>
      </div>
    </div>
  </div>
<?= $this->Html->script('users.js') ?>
<?= $this->Html->script('ajaxUser.js') ?>
<?php $this->end(); ?>