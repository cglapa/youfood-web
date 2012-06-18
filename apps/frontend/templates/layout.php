<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php if($sf_user->isAuthenticated()): ?>
    <?php include_javascripts() ?>
    <?php endif; ?>
  </head>
    <body>
      <div class="navbar">
          <div class="navbar-inner">
              <div class="container">
                  <a class="brand" href="<?php echo url_for('@homepage') ?>">You Food !</a>
                  <?php if($sf_user->isAuthenticated()): ?>
                  <p class="nav navbar-text">Vous êtes connecté en tant que <?php echo $sf_user->getGuardUser()->getFirstName()." ".$sf_user->getGuardUser()->getLastName()?>. <?php echo link_to('Se déconnecter', 'sf_guard_signout') ?></p>
                  <ul class="nav pull-right">
                      <li><?php echo link_to('Commandes', 'table_order') ?></li>
                      <li><?php echo link_to('Menus', 'menu')?></li>
                      <li><?php echo link_to('Plats', 'category')?></li>
                      <li><?php echo link_to('Restaurants', 'zone')?></li>
                      <li><?php echo link_to('Serveurs', 'sf_guard_list')?></li>
                      <li><?php echo link_to('Association tablette', 'tablet_request')?></li>
                      <li><?php echo link_to('Statistiques', 'stats') ?></li>
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
