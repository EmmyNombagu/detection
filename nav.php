<?php
include('config/config.php');
$query = new query();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php print(SITENAME);?></title>
  <link rel="stylesheet" href="<?php print(SITELINK);?>control/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php print(SITELINK);?>control/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php print(SITELINK);?>control/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?php print(SITELINK);?>control/css/style.css">
  <link rel="shortcut icon" href="<?php print(LOGO);?>" />
</head>
<body>
  <style type="text/css">
    b{
      font-weight: bolder;;
      font-size: 45px;
      font-family: "Arial Black";
    }
  </style>
  <div class="container-scroller">
    <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="nav-bottom">
        <div class="container">
              <b>
                <?php print(SITENAME);?>
              </b>
          <ul class="nav page-navigation">
            <li class="nav-item nav-link">
            </li>
            <li class="nav-item">
              <a href="<?php print(SITELINK);?>" class="nav-link"><i class="link-icon mdi mdi-home"></i><span class="menu-title">Home</span></a>
            </li>
            <li class="nav-item">
              <a href="<?php print(SITELINK);?>login" class="nav-link"><i class="link-icon mdi mdi-key"></i><span class="menu-title">Login</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>