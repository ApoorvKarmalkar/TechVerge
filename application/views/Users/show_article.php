<?php include "header.php" ?>
<div class="container mt-5">
  <div class="row">
    <h1><?= $article->title ?></h1>
  </div>
  <div class="row mt-4">
    <img src="<?= $article->image ?>" width="60%" height="60%">
  </div>
  <div class="row mt-4">
    <p style="font-weight: 500; font-family:verdana"><?= $article->body ?></p>
  </div>
</div>
<?php include "footer.php" ?>
