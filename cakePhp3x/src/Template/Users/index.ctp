<?php
    $this->assign('title', $post->title);
    $this->start('child');
?>
<style>
  .card-header input{
    width: 150px;
  }
</style>
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Danh sách users</i>
          <div >         
            <?= $this->Form->create('', ['type' => 'get', 'style' => 'display:flex']); ?>
              <?= $this->Form->control('Name',['default' => $this->request->getQuery('Name')])?>
              <?= $this->Form->control('Email',['default' => $this->request->getQuery('Email')])?>
              <?= $this->Form->control('Phone',['default' => $this->request->getQuery('Phone')])?>
              <?= $this->Form->control('Address',['default' => $this->request->getQuery('Address')])?>
              <div>
              <label>Giới tính</label>
              <?= $this->Form->select(
                  'Sex',
                  ['0' => 'Nữ','1' => 'Nam'],
                  ['empty' => 'Giới tính',
                   'default' => $this->request->getQuery('Sex') 
                  ]
              )?>
              </div>
              <div>
              <label>Trạng thái</label>
              <?= $this->Form->select(
                  'Active',
                  ['0' => 'Chưa kích hoạt','1' => 'Đã kích hoạt'],
                  ['empty' => '--Lựa chọn--',
                   'default' => $this->request->getQuery('Active') 
                  ]
              )?>
              </div>
              <div>
              <?= $this->Form->button('Search', ['class' => 'btn btn-info']); ?>
              </div>
            <?= $this->Form->end() ?>
          </div>
          </div>
        <div class="card-body">
        
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th><?=  $this->Paginator->sort('id', null, ['direction' => 'desc']);?></th>
                  <th><?= $this->Paginator->sort('name', null, ['direction' => 'desc']) ?></th>
                  <th>Giới tính</th>
                  <th><?= $this->Paginator->sort('email', null, ['direction' => 'desc']) ?></th>
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
                  <td>
                    <?php if (!empty($value['avatar'])): ?>
                      <img src="<?=  'img/uploads/' . $value['avatar'] ?>" alt="img" width="100px" height="100px">
                    <?php else: echo '';?>
                    <?php endif; ?>
                  </td>
                  <td><?= $value['address'] ?></td>
                  <td><?= $value['phone'] ?></td>
                  <td>
                    <a href="<?= $base_url . 'sua-user/' . $value['id']?>" class="btn btn-success">Sửa</a>
                    <?php  echo $this->Html->link(
                            'Delete',
                            ['controller' => 'Users', 'action' => 'deleteUser', $value['id']],
                            
                            [
                              'confirm' => "Bạn có chắc muốn xóa id $value[id]",
                              'class' =>'btn btn-danger'
                            ]
                           
                        );
                    ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <?php
      echo "<div class='center'><ul class='pagination'>";
      echo $this->Paginator->prev( ('previous'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
      echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); 
      echo $this->Paginator->next(__('next'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
      echo "</ul></div>";
      ?>
<?php $this->end(); ?>
<?= h($post->body) ?>