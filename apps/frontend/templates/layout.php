<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
    <body>
      <div class="navbar">
          <div class="navbar-inner">
              <div class="container">
                  <a class="brand" href="<?php echo url_for('@homepage') ?>">You Food !</a>
                  <?php if($sf_user->isAuthenticated()): ?>
                  <ul class="nav pull-right">
                      <li><?php echo link_to('Commandes', 'table_order') ?></li>
                      <li><?php echo link_to('Menus', 'menu')?></li>
                      <li><?php echo link_to('Plats', '@homepage')?></li>
                      <li><?php echo link_to('Restaurants', 'zone')?></li>
                      <li><?php echo link_to('Serveurs', 'sf_guard_list')?></li>
                      <li><?php echo link_to('Association tablette', 'tablet_request')?></li>
                  </ul>
                  <?php endif; ?>
              </div>
          </div>
      </div>
      <div class="container">
          <?php echo $sf_content ?>
      </div>
  </body>
</html>
