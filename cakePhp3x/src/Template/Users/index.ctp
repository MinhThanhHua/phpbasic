<?php
    $this->assign('title', $post->title);
    $this->start('child');
?>
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Danh sách users</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tên</th>
                  <th>Giới tính</th>
                  <th>Email</th>
                  <th>Avatar</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data as $value): ?>
                <tr>
                  <td><?= $value['id'] ?></td>
                  <td><?= $value['name'] ?></td>
                  <td><?= ($value['sex'])? 'Nam' : 'Nữ' ?></td>
                  <td><?= $value['email'] ?></td>
                  <td><?= $value['avatar'] ?></td>
                  <td><?= $value['address'] ?></td>
                  <td><?= $value['phone'] ?></td>
                  <td>
                    <a href="<?= $base_url . 'xoa-users/' . $value['id']?>" class="btn btn-success">Sửa</a>
                    <a href="<?= $base_url . 'xoa-users/' . $value['id']?>" class="btn btn-warning">Xóa</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Ngày cập nhật gần đây</div>
      </div>
    </div>
<?php $this->end(); ?>
<?= h($post->body) ?>