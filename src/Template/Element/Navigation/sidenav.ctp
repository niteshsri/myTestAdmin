<?php
?>
<div class="container-fluid">
  <div class="row">
    <div class="left-sidebar-placeholder"></div>
    <!-- left-sidebar-1 -->
    <div class="left-sidebar left-sidebar-1">
      <div class="wrapper">
        <div class="content">
          <!-- sidebar-heading -->
          <div class="sidebar-heading sidebar-heading-1">
            <!-- sidebar-heading-image -->
            <div class="sidebar-heading-image">
              <span class="badge badge-rounded badge-danger">8</span>
              <img src="" class="rounded-circle" alt="image" />
            </div>
            <!-- end sidebar-heading-image -->
            <!-- dropdown -->
            <div class="dropdown">
              <a class="btn btn-default btn-flat dropdown-toggle no-after" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="name">
                  <?= $sideNavData['full_name'] ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-center from-center">
                  <a class="dropdown-item" href="#">
                    <i class="sli-envelope"></i>
                    <span class="title">Inbox</span>
                    <div class="separator"></div>
                    <span class="badge badge-pill badge-raised badge-danger badge-sm">New</span>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="sli-star"></i>
                    <span class="title">Messages</span>
                    <div class="separator"></div>
                    <span class="badge badge-info badge-rounded badge-sm">5</span>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="sli-settings"></i>
                    <span class="title">Profile</span>
                    <div class="separator"></div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="sli-clock"></i>
                    <span class="title">Lock screen</span>
                    <div class="separator"></div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="sli-power"></i>
                    <span class="title">Logout</span>
                    <div class="separator"></div>
                  </a>
                </div>
              </div>
              <!-- end dropdown -->
              <!-- icons -->
            </div>
            <!-- end sidebar-heading -->
            <div class="section">
              <ul class="list-unstyled">
                <li>
                  <a class="btn btn-default btn-flat btn-sidebar btn-sidebar-1" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">
                    <i class="sli-star"></i>
                    <span class="title">Dashboard</span>
                  </a>
                </li>
                <li>
                  <a data-target="#merchants-info" data-toggle="collapse" class="btn btn-default btn-flat btn-sidebar btn-sidebar-1" href="#">
                    <i class="sli-star"></i>
                    <span class="title">Merchants</span>
                  </a>
                  <ul class="list-unstyled collapse" id="merchants-info">
                    <li>
                      <a href="<?= $this->Url->build(['controller' => 'Merchants', 'action' => 'index'])?>" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                        <i class="sli-star"></i>
                        <span class="title">View All Merchants</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                        <i class="sli-star"></i>
                        <span class="title">Verify Merchants</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
