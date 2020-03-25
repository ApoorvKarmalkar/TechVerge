<?php include "header.php" ?>
<div class="container mt-4">
  <h1 class="mb-4">Register Form</h1>
  <?php if(validation_errors()): ?>
  <div class="alert alert-danger mt-5"><?=validation_errors();?></div>
  <?php endif; ?>
  <div class="row">
    <div class="col-lg-6">
      <?php if($user_added = $this->session->flashdata('user_added')): ?>
        <div class="alert alert-success mt-2"><?=$user_added?></div>
      <?php elseif($user_not_added = $this->session->flashdata('user_not_added')): ?>
          <div class="alert alert-danger mt-2"><?=$user_not_added?></div>
      <?php endif; ?>
    </div>
  </div>
  <?=form_open('login/register')?>
  <div class="form-group">
    <?=form_label('Username:','username')?>
    <?=form_input(['class'=>'form-control','name'=>'username','value'=>set_value("username")])?>
  </div>
  <div class="form-group">
    <?=form_label('Password:','password')?>
    <?=form_input(['type'=>'password','class'=>'form-control','name'=>'password'])?>
  </div>
  <div class="form-group">
    <?=form_label('First Name:','firstname')?>
    <?=form_input(['class'=>'form-control','name'=>'firstname','value'=>set_value("firstname")])?>
  </div>
  <div class="form-group">
    <?=form_label('Last Name:','lastname')?>
    <?=form_input(['class'=>'form-control','name'=>'lastname','value'=>set_value("lastname")])?>
  </div>
  <div class="form-group">
    <?=form_label('Email:','email')?>
    <?=form_input(['class'=>'form-control','name'=>'email','value'=>set_value("email")])?>
  </div>
  <?=form_submit(['class'=>'btn btn-primary','value'=>'Submit'])?>
  <?=form_reset(['class'=>'btn btn-secondary','value'=>'Reset'])?>
</div>
<?php include "footer.php" ?>
