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
        <div class="section-row how-it-works clearfix">
          <div class="container">
            <?php 
            if(!empty($node->field_steps)) {
                foreach ($node->field_steps['und'] as $key => $value) { $entry = field_collection_field_get_entity($value);  ?>

            <div class="step clearfix animated hiding" data-animation="fadeIn" data-delay="100">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <h3>Step <span><?php echo ($key + 1); ?></span></h3>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <h4><?php echo $entry->field_title['und']['0']['value']; ?></h4>
                    <p><?php echo $entry->field_short_description['und']['0']['value']; ?></p>
                    <?php 
                    if(!empty($entry->field_button_label) && !empty($entry->field_link_to_page)) {
                        echo '<a href="' . $entry->field_link_to_page['und']['0']['value'] . '" class="btn">' . $entry->field_button_label['und']['0']['value'] . '</a>';
                    }
                    ?>
                </div>
            </div>

            <?php 
                }
            } 
            ?>
              <h1 class="animated hiding" data-animation="fadeIn" data-delay="600">What's Next?<span>Check Our Vehicle Range</span></h1>
          </div>
        </div>
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
            ?>
                <div class="vehicle-row-item <?php echo $class; ?> col-xs-12 animated hiding" data-animation="fadeIn" data-delay="100">
                    <a href="<?php echo url(drupal_get_path_alias('node/' . $data->nid), array('absolute' => TRUE)) ?>" class="modal-btn">
                        <img src="<?php echo $image; ?>">
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