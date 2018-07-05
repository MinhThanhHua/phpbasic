<style>
  .messageError{
    color: red;
  }
</style>
<?php
  $this->start('child');
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Thêm user</div>
      <div class="card-body">
        <form action="/luu-user/<?= $dataUser['id'] ?>" method="POST" onsubmit="return checkFormUser()" enctype="multipart/form-data">
          <div class="form-group">
            <label>Tên</label>
            <input class="form-control" value="<?=(isset($dataUser['name']) ? $dataUser['name'] : '')?>" name="name" type="text" placeholder="Họ và tên">
            <b class="show"></b>
            <?php if (isset($validationErr['name'])) {
                foreach ($validationErr['name'] as $key => $value) {
                  echo "<span class='messageError'>$value</span>";
                }
            } 
            ?>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" value="<?=(isset($dataUser['email']) ? $dataUser['email'] : '')?>" name="email" type="text" placeholder="adb@xyz.com">
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
            <label >Giới tính</label>
            <?php if ($dataUser['sex'] == 0): ?>
              <input type="radio" name="sex" value="1" >Nam
              <input type="radio" name="sex" value="0" checked>Nữ
            <?php else: ?>
              <input type="radio" name="sex" value="1" checked>Nam
              <input type="radio" name="sex" value="0" >Nữ
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label >Hình avatar</label>
            <input type="file" name="avatar" >
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
            <input class="form-control" value="<?=(isset($dataUser['address']) ? $dataUser['address'] : '')?>" name="address" type="text" placeholder="Nhập địa chỉ">
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
            <input class="form-control" value="<?=(isset($dataUser['phone']) ? $dataUser['phone'] : '')?>" name="phone" type="text" placeholder="Nhập số điện thoại">
            <b class="show"></b>
            <?php if (isset($validationErr['phone'])) {
                foreach ($validationErr['phone'] as $key => $value) {
                  echo "<span class='messageError'>$value</span>";
                }
            } 
            ?>
          </div>
          <div class="form-group">
            <label>Lần đầu đăng nhập </label>
            <p><?=(isset($dataUser['firstTimeLogin']) ? $dataUser['firstTimeLogin'] : '')?></p>
          </div>
          <div class="form-group">
            <label>Đăng nhập gần đây</label>
            <p><?=(isset($dataUser['lastTimeLogin']) ? ($dataUser['lastTimeLogin']) : '')?></p>
          </div>
          <div class="form-group">
            <label>Trạng thái active</label>
            <p><?=(($dataUser['active'] == 1) ? 'Đã kích hoạt' : 'Chưa kích hoạt')?></p>
          </div>
          <input class="btn btn-primary btn-block" name="submit" value="Lưu" type="submit">
        </form>
      </div>
    </div>
  </div>
<?php $this->end(); ?>