<?php include "header.php" ?>
<div class="container mt-4">
  <h1 class="mb-4">Add Articles</h1>
  <?php if(validation_errors()): ?>
    <div class="alert alert-danger mt-2"><?=validation_errors();?></div>
  <?php endif; ?>
  <?php if(isset($uploadError)): ?>
    <div class="alert alert-danger mt-2"><?= $uploadError ?></div>
  <?php endif; ?>
  <?=form_open_multipart('admin/addArticle')?>
  <?= form_hidden('user_id',$this->session->userdata('id')); ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <?=form_label('Article Title:','title')?>
        <?=form_input(['class'=>'form-control','name'=>'title','value'=>set_value("title")])?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <?=form_label('Article Content:','body')?>
        <?=form_textarea(['class'=>'form-control','name'=>'body'])?>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-6">
      <div class="form-group custom-file">
        <?=form_label('Select Image','image',['class'=>'custom-file-label'])?>
        <?=form_upload(['class'=>'custom-file-input','name'=>'image'])?>
      </div>
    </div>
  </div>
  <?=form_submit(['class'=>'btn btn-primary','value'=>'Submit'])?>
  <?=form_reset(['class'=>'btn btn-secondary','value'=>'Reset'])?>
</div>
<?php include "footer.php" ?>
