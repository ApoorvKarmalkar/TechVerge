<?php include "header.php" ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-6 mb-5">
      <a href="<?= base_url('admin/addArticle') ?>" class="btn btn-outline-primary">Add Article</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?php if($article_added = $this->session->flashdata('article_added')): ?>
        <div class="alert alert-success mt-2"><?=$article_added?></div>
      <?php elseif($article_not_added = $this->session->flashdata('article_not_added')): ?>
        <div class="alert alert-danger mt-2"><?=$article_not_added?></div>
      <?php elseif($article_deleted = $this->session->flashdata('article_deleted')): ?>
        <div class="alert alert-success mt-2"><?=$article_deleted?></div>
      <?php elseif($article_not_deleted = $this->session->flashdata('article_not_deleted')): ?>
        <div class="alert alert-danger mt-2"><?=$article_not_deleted?></div>
      <?php elseif($article_updated = $this->session->flashdata('article_updated')): ?>
        <div class="alert alert-success mt-2"><?=$article_updated?></div>
      <?php elseif($article_not_updated = $this->session->flashdata('article_not_updated')): ?>
        <div class="alert alert-danger mt-2"><?=$article_not_updated?></div>
      <?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <table class="table">
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Article Title</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
          <tbody>
            <?php if (count($articles)): ?>
              <?php $count = $this->uri->segment(3); ?>
            <?php foreach ($articles as $article): ?>
              <tr>
                <td><?= ++$count ?></td>
                <td><?= $article->title ?></td>
                <td><a href="<?= base_url('admin/editArticle') ?>/<?= $article->id ?>" class="btn btn-primary">Edit</a></td>
                <td>
                  <?= form_open('admin/delArticle'); ?>
                  <?= form_hidden('id',$article->id); ?>
                  <?= form_submit(['class'=>'btn btn-danger','value'=>'Delete']); ?>
                  <?= form_close(); ?>
                </td>
              </tr>
            <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3">No articles found</td>
              </tr>
            <?php endif; ?>
          </tbody>
      </table>
    </div>
  </div>
  <?= $this->pagination->create_links(); ?>
</div>
<?php include "footer.php" ?>
