<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- font css -->
	<link rel="stylesheet" href="<?php echo base_url()?>/templates/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/templates/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/templates/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/templates/vendors/css/vendor.bundle.addons.css">
	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo base_url()?>/templates/css/style.css?v=<?=mt_rand();?>" id="main-style-link">
    <title></title>

  </head>
  <body>
    <?php
      $uri = service('uri');
     ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="/">Ci4 Login</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if (session()->get('isLoggedIn')): ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
            <a class="nav-link"  href="/dashboard">Dashboard</a>
          </li>
          <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
            <a class="nav-link" href="/profile">Profile</a>
          </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      <?php else: ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
            <a class="nav-link" href="/">Login</a>
          </li>
          <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
            <a class="nav-link" href="/register">Register</a>
          </li>
        </ul>
        <?php endif; ?>
      </div>
      </div>
    </nav>
