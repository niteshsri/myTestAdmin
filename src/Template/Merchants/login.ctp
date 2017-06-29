<div class="container-fluid" style="background-color: gray;">
	<div class="row">
		<div class="col">
			<!-- pages/login -->
			<div class="sample-form-3 create-account" style="height:420px;">
				<div class="side-bg-1"></div>
				<div class="side-bg-2 bg-danger"></div>
				<div class="side-description">
					<div class="logo">
						<i class="sli-compass"></i>
						<span class="title">Delta</span>
					</div>
					<p>Id rerum sapiente aperiam dicta atque quibusdam doloribus cumque vitae culpa.</p>
					<p>Et et quia necessitatibus beatae sed amet quaerat qui veniam dolores.</p>
					<p>Dolores neque consequuntur velit et qui consequuntur omnis placeat a.</p>
				</div>
				<?= $this->Form->create(null, ['class' => 'm-t']) ?>
					<div class="form-description">
						<h3>Login</h3>
						<p>Please enter your name and email to login.</p>
					</div>
					<div class="form-group">
						<label>Your email</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="sli-envelope"></i>
							</span>
							<?= $this->Form->Input('username', ['class' => '', 'label' => false, 'placeholder' => 'Email', 'required'=>'required']); ?>
						</div>
					</div>
					<div class="form-group">
						<label>Your password</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="sli-lock"></i>
							</span>
							<?= $this->Form->Input('password', ['type' => 'password', 'class' => '', 'label' => false, 'placeholder' => 'Password', 'required'=>'required']) ?>
						</div>
					</div>
					<div class="form-group">
						<?= $this->Form->button('Login', ['type' => 'submit', 'class' => 'btn btn-primary btn-rounded']); ?>
					</div>
					<div class="links">
						<p>New user?
							<a href="<?= $this->Url->build('/users/add',true);?>">Sign up here</a>
						</p>
					</div>
					 <?= $this->Form->end() ?>
			</div>
			<!-- end pages/login -->
		</div>
	</div>
</div>
