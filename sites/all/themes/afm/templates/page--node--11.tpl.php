<?php $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); $node = menu_get_object(); ?>
    <div class="wrap">
        <div class="vehicle-type clearfix section-row">
            <div class="container">
                <div class="desc">
                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->title; ?></h1>
                    <p class="animated hiding" data-animation="fadeIn"data-delay="100"><?php echo $node->body['und']['0']['value']; ?></p>
                </div>
                <?php include('includes/countdowntimer-2.tpl.php'); ?>
            </div>   
        </div>
        <?php include('includes/countdowntimer-mobile.tpl.php'); ?>
        <div class="vehicle-container section-row clearfix">
            <?php
              $nodes = db_select('node', 'n')
                  ->fields('n', array('nid'))
                  ->fields('n', array('type'))
                  ->condition('n.type', 'vehicle_type')
                  ->execute()
                  ->fetchCol();
              $nodes = node_load_multiple($nodes);

              $odd = count($nodes) % 2;
              $count = count($nodes);
              foreach ($nodes as $key => $data) {
                $class = ($count == $key && $odd) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-6 col-md-6 col-sm-6';
                $image = ($data->field_featured['und']['0']['uri']) ? file_create_url($data->field_featured['und']['0']['uri']) : drupal_get_path('theme','afm') . '/images/v-img1.jpg';
                $filename_d = ($data->field_featured) ? file_create_url($data->field_featured['und']['0']['uri']) : drupal_get_path('theme','afm') . '/images/v-img1.jpg';
                $filename_m = ($data->field_featured) ? file_create_url($data->field_featured['und']['0']['uri']) : drupal_get_path('theme','afm') . '/images/mobile-v-img1.jpg';
               
            ?>
                <div class="vehicle-row-item <?php echo $class; ?> col-xs-12 animated hiding" data-animation="fadeIn" data-delay="100">
                    <a href="<?php echo url(drupal_get_path_alias('node/' . $data->nid), array('absolute' => TRUE)) ?>" class="modal-btn">
                        <img src="<?php echo $image; ?>" data-desktop-image="<?php echo $filename_d; ?>" data-mobile-image="<?php echo $filename_m; ?>">
                        <div class="content">
                            <h3><?php echo $data->title; ?></h3>
                            <p>Click to view range</p>
                        </div>
                    </a>
                </div>
            <?php
              }
            ?>
        </div>
    </div>