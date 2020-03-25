<?php include "header.php" ?>
<div class="container mt-5 mb-3">
  <div class="row">
    <table class="table">
      <thead>
        <th>S.No.</th>
        <th>Article Title</th>
        <th>Published On</th>
      </thead>
      <tbody>
        <?php if(count($articles)): ?>
        <?php $count = $this->uri->segment(3); ?>
        <?php foreach($articles as $article): ?>
        <tr>
        <td><?= ++$count ?></td>
        <td><a href="<?= base_url('users/showArticle/'.$article->id) ?>" style="color: inherit; font-weight:650;"><?= $article->title ?></a></td>
        <td><?= $article->created_on ?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <?= $this->pagination->create_links(); ?>
</div>
<?php include "footer.php" ?>
