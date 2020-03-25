<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?=link_tag('assets/css/bootstrap.min.css')?>
    <title>Article List</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?= base_url('users/index') ?>">TechVerge</a>
  <?php if($this->session->userdata('id')): ?>
    <a href="<?= base_url('admin/logout') ?>" class="btn btn-warning">Logout</a>
  <?php endif; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
