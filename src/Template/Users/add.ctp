<?php
/**
* @var \App\View\AppView $this
*/
?>
<div class="container-fluid" style="background-color: gray;">
  <div class="row">
    <div class="col">
      <div class="alert alert-secondary" role="alert">
        <strong>New User Registration</strong>
      </div>
      <!-- pages/create-account -->
      <div class="sample-form-3 create-account" style="height:420px;">

        <div class="side-bg-1"></div>
        <div class="side-bg-2 bg-secondary"></div>
        <div class="side-description">
          <div class="logo">
            <i class="sli-compass"></i>
            <span class="title">Delta</span>
          </div>
          <p>Enim saepe nulla culpa tempore voluptatem deleniti officia nihil.</p>
          <p>Veniam et est repellat corporis hic odio rerum nemo alias omnis.</p>
          <p>Laborum excepturi quis vel tenetur qui maxime.</p>
        </div>

        <?= $this->Form->create($user); ?>


        <div class="form-group row">
          <?= $this->Form->label('is_individual', __('Signing Up As'), ['class' => [ 'control-label col-md-4']]); ?>
          <label class="custom-control custom-radio">
            <input id="radio1" name="is_individual" type="radio" class="custom-control-input" value="Individual" checked>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Individual</span>
          </label>
          <label class="custom-control custom-radio">
            <input id="radio2" name="is_individual" type="radio" value="Business" class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Business</span>
          </label>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <?= $this->Form->label('first_name', __('First Name'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('first_name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter First name', 'required'=>'required']); ?>
          </div>
          <div class="col-md-6">
            <?= $this->Form->label('last_name', __('Last Name'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('last_name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Last name']); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <?= $this->Form->label('email', __('Email'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Email', 'required'=>'required']); ?>
          </div>
          <div class="col-md-6">
            <?= $this->Form->label('phone', __('Phone Number'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Phone number', 'required'=>'required']); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <?= $this->Form->label('password', __('Password'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please enter Password', 'required'=>'required']); ?>
          </div>
          <div class="col-md-6">
            <?= $this->Form->label('cnf_password', __('Confirm Password'), ['class' => [ 'control-label']]); ?>
            <?= $this->Form->Input('cnf_password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Please re-enter Password', 'required'=>'required']); ?>
          </div>
        </div>
        <div class="text-center">
          <button class="btn btn-success">Register</button>
          <a class="btn btn-default" href="<?= $this->Url->build('/users/login',true);?>">Cancel</a>
        </div>
      </form>
    </div>
    <!-- end pages/create-account -->
  </div>
</div>
</div>
