<?php $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); $node = menu_get_object(); ?>
    <div class="wrap">
        <div class="contact support clearfix section-row">
            <div class="container clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    

                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->title; ?><span class="border"></span></h1>

                    <p class="animated hiding" data-animation="fadeIn" data-delay="200"><?php echo $node->body['und']['0']['value']; ?></p>

                    <hr class="animated hiding" data-animation="fadeIn" data-delay="250">

                    <?php 
                    if(!empty($node->field_support_panels)) {
                        foreach ($node->field_support_panels['und'] as $key => $value) { $entry = field_collection_field_get_entity($value);  ?>

                    <div class="support-item clearfix animated hiding" data-animation="fadeIn" data-delay="300">

                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <p><?php echo $entry->field_short_description['und']['0']['value']; ?></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo $entry->field_link_to_page['und']['0']['value']; ?>" class="btn"><?php echo $entry->field_button_label['und']['0']['value']; ?></a>
                        </div>
                    </div>

                    <?php 
                        }
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>