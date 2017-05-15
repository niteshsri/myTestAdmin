<?php
/**
* @var \App\View\AppView $this
*/
?>
<div class="register-container">
  <div class="row">
    <div class="col-md-12">
      <div class="text-center m-b-md">
        <h3>Registration</h3>
      </div>
      <div class="hpanel">
        <div class="panel-body">
          <?= $this->Form->create($user); ?>
            <div class="form-group row">
              <div class="col-md-4">
                <?= $this->Form->label('first_name', __('First Name'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('first_name', ['class' => 'form-control col-md-4', 'label' => false, 'placeholder' => 'Please enter First Name', 'required'=>'required']); ?>
              </div>
              <div class="col-md-4">
                <?= $this->Form->label('middle_name', __('Middle Name'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('middle_name', ['class' => 'form-control col-md-4', 'label' => false, 'placeholder' => 'Please enter Middle Name']); ?>
              </div>
              <div class="col-md-4">
                <?= $this->Form->label('last_name', __('Last Name'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('last_name', ['class' => 'form-control col-md-4', 'label' => false, 'placeholder' => 'Please enter Last Name']); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <?= $this->Form->label('email', __('Email'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('email', ['class' => 'form-control col-md-6', 'label' => false, 'placeholder' => 'Please enter Email', 'required'=>'required']); ?>
              </div>
              <div class="col-md-6">
                <?= $this->Form->label('phone', __('Phone Number'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('phone', ['class' => 'form-control col-md-6', 'label' => false, 'placeholder' => 'Please enter Phone Number', 'required'=>'required']); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <?= $this->Form->label('password', __('Password'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('password', ['class' => 'form-control col-md-6', 'label' => false, 'placeholder' => 'Please enter Password', 'required'=>'required']); ?>
              </div>
              <div class="col-md-6">
                <?= $this->Form->label('cnf_password', __('Confirm Password'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('cnf_password', ['class' => 'form-control col-md-6', 'label' => false, 'placeholder' => 'Please re-enter Password', 'required'=>'required']); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <?= $this->Form->label('address1', __('Address'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('address1', ['class' => 'form-control col-md-12', 'label' => false, 'placeholder' => 'Please enter Address', 'required'=>'required']); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <?= $this->Form->Input('address2', ['class' => 'form-control col-md-12', 'label' => false]); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <?= $this->Form->label('pin_code', __('Pin Code'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('pin_code', ['class' => 'form-control col-md-4', 'label' => false, 'placeholder' => 'Please enter First Name', 'required'=>'required']); ?>
              </div>
              <div class="col-md-4">
                <?= $this->Form->label('city', __('City'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('city', ['class' => 'form-control col-md-4', 'label' => false, 'placeholder' => 'Please enter Middle Name']); ?>
              </div>
              <div class="col-md-4">
                <?= $this->Form->label('state', __('state'), ['class' => [ 'control-label']]); ?>
                <?= $this->Form->Input('state', ['class' => 'form-control col-md-4', 'label' => false, 'placeholder' => 'Please enter Last Name']); ?>
              </div>
            </div>

          <div class="text-center">
            <button class="btn btn-success">Register</button>
            <button class="btn btn-default">Cancel</button>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 text-center">
    <strong>HOMER</strong> - AngularJS Responsive WebApp <br/> 2015 Copyright Company Name
  </div>
</div>
</div>
