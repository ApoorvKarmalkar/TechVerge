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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php if($this->session->userdata('id')): ?>
      <a href="<?= base_url('admin/logout') ?>" class="btn btn-warning ml-3">Logout</a>
    <?php else: ?>
      <a href="<?= base_url('login/index') ?>" class="btn btn-warning ml-3">Admin Login</a>
    <?php endif; ?>
  </div>
  </nav>
