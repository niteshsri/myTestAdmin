<?php 
use Cake\Network\Session;
$session = new Session();
$this->Auth = $session->read('Auth');
//Inflecting the names of the controller
$underscore = \Cake\Utility\Inflector::underscore($this->request->params['controller']);
$humanize = \Cake\Utility\Inflector::humanize($underscore);

$underscoreAction = \Cake\Utility\Inflector::underscore($this->request->params['action']);
$humanizeAction = \Cake\Utility\Inflector::humanize($underscoreAction);
                
if($humanize == 'Review Request Statuses'){
    $humanize = 'Review Requests';
    }
 ?>
<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
            <?php if($humanize == 'Users' && $humanizeAction == 'Dashboard'){
                    echo '<h2 id="pageTitle">Dashboard</h2>';
                }else{
            ?>
            <h2 id="pageTitle"><?= $humanize ?></h2>
            <?php }
                if(!($humanize == 'Users' && $humanizeAction == 'Dashboard')){
            ?>
        
        <ol class="breadcrumb .breadcrumb-secondary" id="breadcrumb">
            <li>
            <?php if($this->Auth['User']['role']->name == 'admin'){ ?>
                
                <a href="<?=$this->Url->build(["controller" => "users","action" => "index"]);?>">Home</a>
            <?php } else{ ?>
                <a href="<?=$this->Url->build(["controller" => "users","action" => "dashboard"]);?>#/">Home</a>
              <?php  } ?>
            </li>
            <li>
                <?= $humanize;?>
            </li>
            <?php if(!($humanizeAction == 'Index')){ ?>
            <li class="active">
                <strong><?= $humanizeAction; //ucfirst($this->request->params['action']) ?></strong>
            </li>
            <?php } ?>
        </ol>
        <?php } ?>
    </div>
</div>