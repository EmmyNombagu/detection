<?php
include('../config/config.php');
$query = new query();
is_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | <?php print(SITENAME);?></title>
  <link rel="stylesheet" href="<?php print(SITELINK);?>control/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php print(SITELINK);?>control/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php print(SITELINK);?>control/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?php print(SITELINK);?>control/css/style.css">
  <link rel="shortcut icon" href="<?php print(LOGO);?>" />
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="container d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top">
          <a class="navbar-brand brand-logo" href="<?php print(SITELINK);?>dashboard">
            <img src="<?php print(LOGO);?>" alt="<?php print(SITENAME);?>"/>
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?php print(SITELINK);?>dashboard">
            <img src="<?php print(LOGO);?>" alt="<?php print(SITENAME);?>"/>
          </a>
        </div>
      </div>
      <div class="nav-bottom">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a href="<?php print(SITELINK);?>dashboard" class="nav-link"><i class="link-icon mdi mdi-account-plus"></i><span class="menu-title">Add User</span></a>
            </li>
            <li class="nav-item">
              <a href="<?php print(SITELINK);?>userlogs" class="nav-link"><i class="link-icon mdi mdi-account-multiple"></i><span class="menu-title">User Logs</span></a>
            </li>
            <li class="nav-item">
              <a href="<?php print(SITELINK);?>logout" class="nav-link"><i class="link-icon mdi mdi-key"></i><span class="menu-title">Logout</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>