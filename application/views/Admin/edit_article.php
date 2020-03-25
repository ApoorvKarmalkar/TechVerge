<?php include "header.php" ?>
<div class="container mt-4">
  <h1 class="mb-4">Edit Article</h1>
  <?php if(validation_errors()): ?>
    <div class="alert alert-danger mt-2"><?=validation_errors();?></div>
  <?php endif; ?>
  <?=form_open('admin/changeArticle/'.$this->uri->segment(3))?>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <?=form_label('Article Title:','title')?>
        <?=form_input(['class'=>'form-control','name'=>'title','value'=>set_value("title",$article->title,false)])?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <?=form_label('Article Content:','body')?>
        <?=form_textarea(['class'=>'form-control','name'=>'body','value'=>set_value("body",$article->body,false)])?>
      </div>
    </div>
  </div>
  <?=form_submit(['class'=>'btn btn-primary','value'=>'Submit'])?>
  <?=form_reset(['class'=>'btn btn-secondary','value'=>'Reset'])?>
</div>
<?php include "footer.php" ?>
