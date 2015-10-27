<?php $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); $node = node_load(21); ?>
    <div class="wrap">
        <div class="hero-image">
            <div class="hero-overlay" >
                <div class="overlay-brown" >
                    <div></div>
                </div>
                <div class="container">
                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="800"><?php echo $node->field_header_title['und']['0']['value']; ?></h1>
                    <?php include('includes/countdowntimer-3.tpl.php'); ?>
                </div>
            </div>   
        </div>
        <div class="hero-overlay2"></div>   
        <?php include('includes/countdowntimer-mobile.tpl.php'); ?>
        <div class="about section-row">
            <div class="about-content">
                <div class="container">
                    <div class="desc">
                        <h1 class="animated hiding" data-animation="fadeIn" data-delay="100" ><?php echo $node->field_welcome_title['und']['0']['value']; ?></h1>
                        <p class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->field_welcome_text['und']['0']['value']; ?></p>
                        <p class="sub-text animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->field_welcome_subtext['und']['0']['value']; ?></p>
                        <a href="#" class="btn animated hiding" data-animation="fadeIn" data-delay="100" data-toggle="modal" data-target="#newsletter-sign-up">Get The Intel First</a>
                        <a href="<?php echo url(drupal_get_path_alias('node/9')); ?>" class="btn animated hiding" data-animation="fadeIn"data-delay="200">Field Report</a>
                    </div>
                    <div class="truck animated hiding" data-animation="fadeIn" data-delay="300" ><img src="<?php echo $theme_url; ?>/images/truck2.png"></div>
                </div>
            </div>
        </div>
        <div class="vehicle-type clearfix section-row">
            <div class="container">
                <div class="desc">
                    <h2 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->field_vehicles_title['und']['0']['value']; ?></h2>
                    <p class="animated hiding" data-animation="fadeIn"data-delay="100"><?php echo $node->field_short_description['und']['0']['value']; ?></p>
                </div>
                <?php include('includes/countdowntimer-2.tpl.php'); ?>
            </div>
            <div class="vehicle-type-wrapper clearfix">
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
                  $index = 0;
                  foreach ($nodes as $key => $data) {
                    if($index == 5) continue;
                    else $index += 1;
                    
                    $image = ($data->field_homepage_panel_image) ? file_create_url($data->field_homepage_panel_image['und']['0']['uri']) : drupal_get_path('theme','afm') . '/images/vehicle-img-c1.jpg';
                    $filename_d = ($data->field_homepage_panel_image) ? file_create_url($data->field_homepage_panel_image['und']['0']['uri']) : drupal_get_path('theme','afm') . '/images/vehicle-img-c1.jpg';
                    $filename_m = ($data->field_homepage_panel_image_m) ? file_create_url($data->field_homepage_panel_image_m['und']['0']['uri']) : drupal_get_path('theme','afm') . '/images/m-vehicle-img-c1.jpg';
                ?>
                <div class="vehicle-item animated hiding" data-animation="fadeIn" data-delay="200">
                    <a href="<?php echo url(drupal_get_path_alias('node/'.$data->nid)); ?>"> 
                        <img src="<?php echo $image; ?>" data-desktop-image="<?php echo $filename_d; ?>" data-mobile-image="<?php echo $filename_m; ?>">
                    </a>
                    <p><?php echo $data->title; ?></p>
                </div>
                <?php
                  }
                ?>
            </div>

        </div>
        <div class="more-intel section-row">
            <div class="container">
                <h1 class="animated hiding" data-animation="fadeIn" data-delay="100">More Intel</h1>


                <a href="<?php echo url(drupal_get_path_alias('node/9')); ?>" class="tile-item animated hiding" data-animation="fadeIn" data-delay="500">
                    <div class="tile-item-img">
                            <div class="tile-img-hover">
                                <div class="tile-hover">
                                    <img src="<?php echo $theme_url; ?>/images/tile-img1-hover.png">
                                </div>
                            </div>
                            <div class="tile-img">
                                <img src="<?php echo $theme_url; ?>/images/tile-img1.png">
                            </div>

                            <div class="flare-left flare"><img src="<?php echo $theme_url; ?>/images/flare.png"></div>

                            <div class="flare-right flare"><img src="<?php echo $theme_url; ?>/images/flare.png"></div>
                    </div>
                    <p>Field Report</p>
                </a>

                <a href="<?php echo url(drupal_get_path_alias('node/22')); ?>" class="tile-item animated hiding" data-animation="fadeIn" data-delay="500">
                    <div class="tile-item-img">
                            <div class="tile-img-hover">
                                <div class="tile-hover">
                                    <img src="<?php echo $theme_url; ?>/images/tile-img2-hover.png">
                                </div>
                            </div>
                            <div class="tile-img">
                                <img src="<?php echo $theme_url; ?>/images/tile-img2.png">
                            </div>

                            <div class="flare-left flare"><img src="<?php echo $theme_url; ?>/images/flare.png"></div>

                            <div class="flare-right flare"><img src="<?php echo $theme_url; ?>/images/flare.png"></div>
                    </div>
                    <p>History</p>
                </a>

                <a href="<?php echo url(drupal_get_path_alias('node/23')); ?>" class="tile-item animated hiding" data-animation="fadeIn" data-delay="500">
                    <div class="tile-item-img">
                            <div class="tile-img-hover">
                                <div class="tile-hover">
                                    <img src="<?php echo $theme_url; ?>/images/tile-img3-hover.png">
                                </div>
                            </div>
                            <div class="tile-img">
                                <img src="<?php echo $theme_url; ?>/images/tile-img3.png">
                            </div>

                            <div class="flare-left flare"><img src="<?php echo $theme_url; ?>/images/flare.png"></div>

                            <div class="flare-right flare"><img src="<?php echo $theme_url; ?>/images/flare.png"></div>
                    </div>
                    <p>Connect</p>
                </a>

            </div>
        </div>
    </div>
    


