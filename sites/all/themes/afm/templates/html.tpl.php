<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php print $head_title; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php print $head; ?>
  <?php print $styles; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php 
    $theme_url = url(drupal_get_path('theme',$GLOBALS['theme']));
    $node = menu_get_object();
    $alias = (drupal_get_path_alias()) ? drupal_get_path_alias() : ''; 
    $alias = (drupal_is_front_page()) ? 'home' : $alias;
    $alias = (is_object($node) && $node->nid == '15') ? 'contact-us' : $alias;
    $alias = (is_object($node) && $node->nid == '30') ? 'contact-us' : $alias;
    $alias = (is_object($node) && $node->nid == '26') ? 'vehicle-overview' : $alias;

    if(is_object($node) && $node->nid == 12) {
      $auctions = node_load(13);
      $count = 0;
      foreach ($auctions->field_auction['und'] as $key => $value) {
          $entry = field_collection_field_get_entity($value);
          $count += (!empty($entry->field_location['und']['0']['value'])) ? 1 : 0;
      }

      if($count > 0)
        $alias = 'auction';
    }
    $alias = (is_object($node) && $node->type == 'vehicle_type') ? 'vehicle' : $alias;
    $alias = ($alias == 'user/login') ? 'contact-us' : $alias;

    $nid = (is_object($node)) ? $node->nid : NULL; 
    $class = ($nid && $node->type == 'page' || $alias == 'user/login' || $node->nid == '30') ? 'wrapper-2' : '';
  ?>
  <div id="<?php echo $alias; ?>" class="wrapper <?php echo $class; ?>">
    <?php include('includes/header-newsletter-sign-up.tpl.php'); ?>
    <div class="header clearfix">
      <div class="main-header">
          <a href="<?php echo url(drupal_get_path_alias('<front>')); ?>" class="logo"><img src="<?php echo $theme_url; ?>/images/logo.png"></a>
          <a href="<?php echo url(drupal_get_path_alias('<front>')); ?>" class="mobile-logo"><img src="<?php echo $theme_url; ?>/images/logo-nav.jpg"></a>
          <a href="#" class="hamburger">
              <span class="bar-1 patty-1"></span>
              <span class="bar-2 patty-2"></span>
              <span class="bar-3 patty-3"></span>
          </a>
      </div>           
      <div class="navigation clearfix">
          <a href="<?php echo url(drupal_get_path_alias('<front>')); ?>" class="sub-logo"><img src="<?php echo $theme_url; ?>/images/logo-nav.jpg"></a>
          <?php $menu = menu_tree('menu-header-menu'); print drupal_render($menu); ?>
          <a href="#" class="hamburger active">
            <span class="bar-1 patty-1"></span>
            <span class="bar-2 patty-2"></span>
            <span class="bar-3 patty-3"></span>
          </a>
      </div>
    </div>
    <?php print $page; ?>
    <div class="footer section-row">
          <div class="footer-wrap">
              <div class="container">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="footer-block col-lg-3 col-md-3 col-sm-6 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="100">
                          <h1>Contact Us</h1>
                          <p> <?php echo variable_get('address_1', ''); ?><br>
                              <?php echo variable_get('address_2', ''); ?><br>
                              Phone: <?php echo variable_get('phone', ''); ?><br>
                              Fax: <?php echo variable_get('fax', ''); ?></p>
                      </div>
                      <div class="footer-block col-lg-3 col-md-3 col-sm-6 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="300">
                          <h1>Vehicle Range</h1>
                          <ul>
                            <?php
                              $nids = db_select('node', 'n')
                                  ->fields('n', array('nid'))
                                  ->fields('n', array('type'))
                                  ->condition('n.type', 'vehicle_type')
                                  ->execute()
                                  ->fetchCol();
                              $nodes = node_load_multiple($nids);

                              $thumbs = array();
                              foreach ($nodes as $key => $data) {
                                $thumb = (!empty($data->field_thumbnail['und'])) ? file_create_url($data->field_thumbnail['und']['0']['uri']) : $theme_url . '/images/menu-img1.jpg';
                                $thumbs[] = array($data->nid, $thumb, '' . drupal_get_path_alias('node/' . $data->nid) . '');
                                echo '<li><a href="' . url(drupal_get_path_alias('node/' . $data->nid)) . '">' . $data->title . '</a></li>';
                              }
                            ?>
                          </ul>
                      </div>
                      <div class="footer-block col-lg-3 col-md-3 col-sm-6 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="500">
                          <h1>Buy A Vehicle</h1>
                          <?php $menu = menu_tree('menu-footer-column-menu'); print drupal_render($menu); ?>
                      </div>
                      <div class="footer-block col-lg-3 col-md-3 col-sm-6 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="700">
                          <h1>Enlist</h1>
                          <div class="contact-form">
                              <?php 
                                  if(!empty($_SESSION['newsletter-form'])) {
                                      echo '<p class="form-success">'.$_SESSION['newsletter-form'].'</p>';
                                  }

                                  $form = drupal_get_form('afm_newsletter_form');
                                  echo drupal_render($form);
                              ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="copyright">
              <div class="container clearfix">
                  <p>australian frontline machinery 2015</p>
                  <div class="terms-link">
                    <?php $menu = menu_tree('menu-footer-menu'); print drupal_render($menu); ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script type="text/javascript">var theme_path = '<?php echo $theme_url; ?>/'; var navThumbs = [],navAliases = [];<?php foreach ($thumbs as $key => $value) { echo 'navThumbs[' . $value[0] . '] = \'' . $value[1] . '\';navAliases[' . $value[0] . '] = \'' . $value[2] . '\';'; } ?></script>
  <?php print $scripts; ?>
  <?php include('includes/countdowntimer-script.tpl.php'); ?>
  <?php include('includes/modal-newsletter-sign-up.tpl.php'); ?>
  <?php print $page_bottom; ?>
</body>
</html>
