<?php include "header.php" ?>
<div class="container mt-4">
  <h1 class="mb-4">Admin Login</h1>
  <?=form_open('login/index')?>
  <div class="form-group">
    <?=form_label('Username:','username')?>
    <?=form_input(['class'=>'form-control','name'=>'username','value'=>set_value("username")])?>
  </div>
  <div class="form-group">
    <?=form_label('Password:','password')?>
    <?=form_input(['type'=>'password','class'=>'form-control','name'=>'password'])?>
  </div>
  <?=form_submit(['class'=>'btn btn-primary','value'=>'Submit'])?>
  <?=form_reset(['class'=>'btn btn-secondary','value'=>'Reset'])?>
  <?= anchor('login/register','SignUp?','class="ml-3"') ?>
    <?php if(validation_errors()): ?>
      <div class="alert alert-danger mt-5"><?=validation_errors();?></div>
    <?php endif; ?>
    <?php if($login_failed = $this->session->flashdata('login_failed')): ?>
      <div class="alert alert-danger mt-5"><?=$login_failed?></div>
    <?php endif; ?>
</div>
<?php include "footer.php" ?>
