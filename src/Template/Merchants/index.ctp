<?php
// pr($users);
?>
<div class="row">
  <div class="col">
    <ol class="breadcrumb breadcrumb-default icon-grid icon-angle-double-right">
      <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">Dashboard</a>
      <li><a href="<?= $this->Url->build(['controller' => 'Merchants', 'action' => 'index'])?>">Merchants</a>
    </ol>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="widget">
      <div class="row">
        <div class="col">
          <div class="title">Merchants</div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table id="merchant-list" class="table table-responsive table-hover table-striped table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Account Number</th>
                <th>Verified User</th>
                <th>Document Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $key => $user) {?>
                <tr>
                  <td><?= ($key)?></td>
                  <td><?= ($user->first_name)?></td>
                  <td><?= ($user->last_name)?></td>
                  <td><?= ($user->email)?></td>
                  <td><?= ($user->account_number)?></td>
                  <td><?= ($user->is_verified)?'Verified':'Not Verified' ?></td>
                  <td><?= ($user->is_approved)?'Approved':'Not Approved' ?></td>
                  <td class="actions">
                    <?= '<a href='.$this->Url->build(['action' => 'view', $user->id]).' class="btn btn-sm btn-success">' ?>
                      <i class="fa fa-eye fa-fw"></i>
                    </a>
                    <?= '<a href='.$this->Url->build(['action' => 'edit', $user->id]).' class="btn btn-sm btn-warning"">' ?>
                      <i class="fa fa-pencil fa-fw"></i>
                    </a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#merchant-list').DataTable({
        responsive: true
      });
    })
    </script>
