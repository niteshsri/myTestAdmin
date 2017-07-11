<?php
$userProfile =  $user;
$userAddress  = ($user->user_address)?$user->user_address[0]:null;
$userBankDetails  = ($user->business_bank_details)?$user->business_bank_details[0]:null;
$userBusinessDetails  = ($user->user_business_basic_details)?$user->user_business_basic_details[0]:null;
$businessAddress = null;
if($userBusinessDetails){
  $businessAddress  = ($userBusinessDetails->user_business_contact_details)?$userBusinessDetails->user_business_contact_details[0]:null;  
}

?>
<style>
  .white-box{

    background: gray;
    border: 1px solid black;
  }
</style>
<div class="row mb-4">
  <div class="col">
    <ol class="breadcrumb breadcrumb-default icon-grid icon-angle-double-right">
      <li><a href="<?= $this->Url->build(['controller' => 'User', 'action' => 'index'])?>">Dashboard</a>
        <li><a href="<?= $this->Url->build(['controller' => 'Merchants', 'action' => 'index'])?>">Merchants</a>
          <li><a href="#">Merchant Profile</a>
          </ol>
        </div>
      </div>
      <div class="white-box">
        <div class="row">
          <div class="col">
            <ul class="nav nav-tabs" style="background: rgb(38, 50, 56) none repeat scroll 0px 0px;">
              <li class="nav-item">
                <a href="#" class="nav-link active" data-toggle="tab" data-target="#default-tabs-0-1">Profile</a>
              </li>
              <?php if(!$userProfile->is_individual){?>
              <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="tab" data-target="#default-tabs-business">Business</a>
              </li>
              <?php } ?>
              <?php if($userBankDetails) {?>
              <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="tab" data-target="#default-tabs-bank">Bank</a>
              </li>
              <?php } ?>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="default-tabs-0-1">
                <div class="form-group row">
                  <div class="col-md-6">
                    <?= $this->Form->label('first_name', __('First Name'), ['class' => [ 'control-label col-md-3']]); ?>
                    <?= $this->Form->text('first_name', ['value'=>$userProfile->first_name,'class' => 'col-md-8', 'disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->label('last_name', __('Last Name'), ['class' => [ 'control-label col-md-3']]); ?>
                    <?= $this->Form->text('last_name', ['value'=>$userProfile->last_name,'class' => 'col-md-8','label' => false, 'disabled'=>'disabled']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <?= $this->Form->label('email', __('Email'), ['class' => [ 'control-label col-md-3']]); ?>
                    <?= $this->Form->text('email', ['value'=>$userProfile->email,'class' => 'col-md-8', 'disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->label('phone', __('Phone'), ['class' => [ 'control-label col-md-3']]); ?>
                    <?= $this->Form->text('phone', ['value'=>$userProfile->phone,'class' => 'col-md-8','label' => false, 'disabled'=>'disabled']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <?= $this->Form->label('pan_number', __('Pan Number'), ['class' => [ 'control-label col-md-3']]); ?>
                    <?= $this->Form->text('pan_number', ['value'=>$userProfile->pan_number,'class' => 'col-md-8', 'disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->label('adhaar_number', __('Adhaar Number'), ['class' => [ 'control-label col-md-4']]); ?>
                    <?= $this->Form->text('adhaar_number', ['value'=>$userProfile->adhaar_number,'class' => 'col-md-7','label' => false, 'disabled'=>'disabled']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 text-center">
                    <a href = "<?= $user->pan_image_url?>" target=_blank;>Click here to view PAN image</a>
                  </div>
                  <div class="col-md-6 text-center">
                    <a href ="<?= $user->adhaar_image_url?>" target=_blank;>Click here to view Adhaar image</a>
                  </div>
                </div>
                <?php if(!empty($userAddress)){ ?>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->label('address1', __('Address'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('address1', ['value'=>$userAddress->address1,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Address', 'disabled'=>'disabled']); ?>
                  </div>
                </div>
                <?php  if($userAddress->address2){?>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->Input('address2', ['value'=>$userAddress->address2,'class' => 'form-control col-md-12', 'label' => false,'disabled'=>'disabled']); ?>
                  </div>
                </div>
                <?php }?>

                <div class="form-group row">
                  <div class="col-md-3">
                    <?= $this->Form->label('pin_code', __('Pin Code'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('pin_code', ['value'=>$userAddress->zip,'class' => '', 'label' => false, 'placeholder' => 'Please enter Pin Code', 'disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('country', __('Country'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('country', ['value'=>$userAddress->country,'class' => '', 'label' => false, 'placeholder' => 'Please enter Country','disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('city', __('City'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('city', ['value'=>$userAddress->city,'class' => '', 'label' => false, 'placeholder' => 'Please enter City','disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('state', __('State'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('state', ['value'=>$userAddress->state,'class' => '', 'label' => false, 'placeholder' => 'Please enter State','disabled'=>'disabled']); ?>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-md-2">
                  <button class="btn btn-secondary approve" data-status= "1" data-m="<?php echo $userProfile->id ?>" data-type="user" data-id="<?php echo $userBankDetails->id ?>">approve</button>
                </div>
                <div class="col-md-2">
                 <button class="btn btn-danger decline" data-status= "0" data-remark= "failed" data-m="<?php echo $userProfile->id ?>" data-type="user" data-id="<?php echo $userBankDetails->id ?>">Decline</button>
               </div>
             </div>
                <?php } ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="default-tabs-business">
                <div class="form-group row">
                  <div class="col-md-6">
                    <?= $this->Form->label('name', __('Legal Entity Name'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('name', ['value'=>$userBusinessDetails->legal_entity_name,'class' => 'form-control col-md-12', 'label' => false,'required'=>'required']); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->label('business_type', __('Business Type'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('business_type', ['value'=>$userBusinessDetails->business_type->name,'class' => 'form-control col-md-12', 'label' => false,  'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <?= $this->Form->label('business_category', __('Business Category'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('business_category', ['value'=>$userBusinessDetails->business_category->name,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Account Holder Name', 'required'=>'required']); ?>
                  </div>
                  <div class="col-md-6">
                    <?= $this->Form->label('pan_number', __('Business Pan Number'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('pan_number', ['value'=>$userBusinessDetails->pan_number,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Bank Name', 'required'=>'required']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 text-center">
                    <a href = "<?= $userBusinessDetails->pan_image_url?>" target=_blank;>Click here to view PAN image</a>
                  </div>
                  <div class="col-md-6 text-center">
                    <a href ="<?= $userBusinessDetails->govt_doc_url?>" target=_blank;>Click here to view Govt Document Image</a>
                  </div>
                </div>
                <?php if(!empty($businessAddress)){ ?>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->label('address1', __('Address'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('address1', ['value'=>$businessAddress->address1,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Address', 'disabled'=>'disabled']); ?>
                  </div>
                </div>
                <?php  if($businessAddress->address2){?>
                <div class="form-group row">
                  <div class="col-md-12">
                    <?= $this->Form->Input('address2', ['value'=>$businessAddress->address2,'class' => 'form-control col-md-12', 'label' => false,'disabled'=>'disabled']); ?>
                  </div>
                </div>
                <?php } ?>

                <div class="form-group row">
                  <div class="col-md-3">
                    <?= $this->Form->label('pin_code', __('Pin Code'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('pin_code', ['value'=>$businessAddress->zip,'class' => '', 'label' => false, 'placeholder' => 'Please enter Pin Code', 'disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('country', __('Country'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('country', ['value'=>$businessAddress->country,'class' => '', 'label' => false, 'placeholder' => 'Please enter Country','disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('city', __('City'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('city', ['value'=>$businessAddress->city,'class' => '', 'label' => false, 'placeholder' => 'Please enter City','disabled'=>'disabled']); ?>
                  </div>
                  <div class="col-md-3">
                    <?= $this->Form->label('state', __('State'), ['class' => [ 'control-label']]); ?>
                    <?= $this->Form->Input('state', ['value'=>$businessAddress->state,'class' => '', 'label' => false, 'placeholder' => 'Please enter State','disabled'=>'disabled']); ?>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-md-2">
                  <button class="btn btn-secondary approve"  data-status= "1" data-type="business" data-m="<?php echo $userProfile->id ?>" data-id="<?php echo $userBankDetails->id ?>">approve</button>
                </div>
                <div class="col-md-2">
                 <button class="btn btn-danger decline"  data-status= "0" data-remark= "failed" data-type="business" data-m="<?php echo $userProfile->id ?>" data-id="<?php echo $userBankDetails->id ?>">Decline</button>
               </div>
             </div>
                <?php } ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="default-tabs-bank">
               <?php if($userBankDetails) {?>
               <div class="form-group row">
                <div class="col-md-6">
                  <?= $this->Form->label('name', __('Account holder Name'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('name', ['value'=>$userBankDetails->bank_account_name,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Account Holder Name', 'required'=>'required']); ?>
                </div>
                <div class="col-md-6">
                  <?= $this->Form->label('bank_name', __('Bank Name'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('bank_name', ['value'=>$userBankDetails->bank_name,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Bank Name', 'required'=>'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <?= $this->Form->label('account_type', __('Account Type'), ['class' => [ 'control-label col-md-3']]); ?>
                <label class="custom-control custom-radio">
                  <input id="radio1" name="account_type" type="radio" class="custom-control-input" value="savings" checked>
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Savings</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="account_type" type="radio" value="current" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Current</span>
                </label>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <?= $this->Form->label('account_number', __('Account Number'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('account_number', ['value'=>$userBankDetails->account_number,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Account Number', 'required'=>'required']); ?>
                </div>
                <div class="col-md-6">
                  <?= $this->Form->label('ifsc', __('IFSC Code'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('ifsc', ['value'=>$userBankDetails->ifsc_code,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter IFSC Code', 'required'=>'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <?= $this->Form->label('bank_branch', __('Bank Branch'), ['class' => [ 'control-label']]); ?>
                  <?= $this->Form->Input('bank_branch', ['value'=>$userBankDetails->bank_branch,'class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Branch Name', 'required'=>'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 text-center">
                  <a href = "<?= $userBankDetails->cancelled_cheque_image_url?>" target=_blank;>Click here to view Cancelled Cheque image</a>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2">
                  <button class="btn btn-secondary approve" data-status= "1" data-type="bank" data-m="<?php echo $userProfile->id ?>" data-id="<?php echo $userBankDetails->id ?>">approve</button>
                </div>
                <div class="col-md-2">
                 <button class="btn btn-danger decline"  data-status= "0" data-remark= "failed" data-type="bank" data-m="<?php echo $userProfile->id ?>" data-id="<?php echo $userBankDetails->id ?>">Decline</button>
               </div>
             </div>
             <?php } ?>
           </div>
         </div>
       </div>
     </div>

   </div>
   <div class="row">
    <div class="col-lg-12 text-center">
      <?= $this->Html->link('Back',$this->request->referer(),['class' => ['btn', 'btn-warning']]);?>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function(){
      host = 'http://localhost/myTestCodeAdmin/';
      $('.approve').on('click',function(){
        var dataT = $(this).attr('data-type');
        var dataId = null;
        if(dataT != 'user'){
        dataId = $(this).attr('data-id');
        }
        var dataM = $(this).attr('data-m');
        var dataS = $(this).attr('data-status');
        var dataR = $(this).attr('data-remark');

        $.ajax({
          url: host+"api/users/approveUserDetails/",
          headers:{"accept":"application/json"},
          dataType: 'json',
          data:{
            "data_id" : dataId,
            "data_type" : dataT,
            "data_m" : dataM,
            "data_status" : dataS,
            "data_remark" : dataR
          },
          type: "post",
          success:function(data){
            alert('updated');
          },
          error:function(data){
            alert('not able to update');
          },
          beforeSend: function() {
             alert('updating..');
          }
        });
      });
       $('.decline').on('click',function(){
        var dataT = $(this).attr('data-type');
        var dataId = null;
        if(dataT != 'user'){
        dataId = $(this).attr('data-id');
        }
        var dataM = $(this).attr('data-m');
        var dataS = $(this).attr('data-status');
        var dataR = $(this).attr('data-remark');

        $.ajax({
          url: host+"api/users/approveUserDetails/",
          headers:{"accept":"application/json"},
          dataType: 'json',
          data:{
            "data_id" : dataId,
            "data_type" : dataT,
            "data_m" : dataM,
            "data_status" : dataS,
            "data_remark" : dataR
          },
          type: "post",
          success:function(data){
            alert('updated');
          },
          error:function(data){
            alert('not able to update');
          },
          beforeSend: function() {
             alert('updating..');
          }
        });
      });
    });
  </script>