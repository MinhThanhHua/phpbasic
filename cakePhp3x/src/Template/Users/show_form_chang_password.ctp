
<?php
  $this->start('child');
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đổi mật khẩu</div>
      <div class="card-body">
        <form action="/kiem-tra-doi-mat-khau" method="POST" >
          <div class="form-group">Tên:
            <label>
                <?php  
                    $session = $this->request->getSession();
                    echo $session->read('user')['name'];
                    if (isset($message)) {
                      echo "<span style='color:blue'>$message</span>";
                    }
                ?>
            </label>
          <div class="form-group">
            <label >Password</label>
            <input class="form-control"  name="password" type="password" placeholder="Nhập password">
            <b class="show"></b>
          </div>
          <div class="form-group">
            <label >Confirm password</label>
            <input class="form-control"  name="confirmPassword" type="password" placeholder="Nhập lại password">
            <?php 
              if (isset($err)) {
                echo "<span class='messageError'>$err</span>";
              }
            ?>
          </div>
          <input class="btn btn-primary btn-block" name="submit" value="Lưu" type="submit">
        </form>
      </div>
    </div>
  </div>
<?php $this->end(); ?>