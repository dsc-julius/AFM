<?php $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); $node = menu_get_object(); ?>
    <div class="wrap">
        <div class="contact support clearfix section-row">
            <div class="container clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->title; ?><span class="border"></span></h1>
                    <p class="animated hiding" data-animation="fadeIn" data-delay="200"><?php echo $node->body['und']['0']['value']; ?></p>
                    <hr class="animated hiding" data-animation="fadeIn" data-delay="250">
                </div>
            </div>
        </div>
    </div>