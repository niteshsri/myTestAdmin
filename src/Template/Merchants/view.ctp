<?php
// pr($user);die;
?>
<div class="row mb-4">
  <div class="col">
    <ol class="breadcrumb breadcrumb-default icon-grid icon-angle-double-right">
      <li><a href="<?= $this->Url->build(['controller' => 'User', 'action' => 'index'])?>">Dashboard</a>
        <li><a href="<?= $this->Url->build(['controller' => 'Merchants', 'action' => 'index'])?>">Merchants</a>
          <li><a href="#">Merchant Profile</a>
          </ol>
        </div>
      </div>
      <div class = "row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-10 offset-md-1">
              <div class="text-center">
                <h2><?= h($user->first_name." ".$user->last_name) ?></h2>
              </div>
              <div class="row">
                <span class="col-md-4">
                  <span>First Name</span><?= $user->first_name?>
                </span>
                <span class="col-md-4">
                  <span>Last Name</span><?= $user->last_name?>
                </span>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-center">
              <?= $this->Html->link('Back',$this->request->referer(),['class' => ['btn', 'btn-warning']]);?>
            </div>
          </div>

        </div>
      </div>
