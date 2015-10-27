<?php $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); $node = menu_get_object(); ?>
<?php 
$nids = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'vehicle_parts')
    ->execute()
    ->fetchCol();
$models = node_load_multiple($nids);

if(!empty($node->field_hero_image['und']['0']['uri'])) {
    $image = file_create_url($node->field_hero_image['und']['0']['uri']);
    echo '<style type="text/css">';
    echo '#vehicle .hero-overlay { 
             background: url(\'' . $image . '\') no-repeat center top; 
                background-attachment: initial;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
        }';
    echo '</style>';
}
?>
    <div class="wrap">
        <div class="hero-image">
            <div class="hero-overlay">
                <div class="container">
                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="800"><?php echo $node->title; ?></h1>
                    <?php include('includes/countdowntimer-3.tpl.php'); ?>
                </div>
            </div>   
        </div>
        <?php include('includes/countdowntimer-mobile.tpl.php'); ?>
        <div class="wrap-navigation section-row">
            <ul class="wrap-nav animated hiding" data-animation="fadeIn" data-delay="100">
                <li class="active"><a href="#overview">Overview</a></li>
                <?php if(count($models) > 0) { ?><li><a href="#available-model">Available Models</a></li><?php } ?>
            </ul>
        </div>
        <div id="overview" class="overview-container section-parallax section-row black-bg" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <h1 class="animated hiding" data-animation="fadeIn" data-delay="100" >Overview</h1>
                        <p class="animated hiding" data-animation="fadeIn" data-delay="200"><?php echo $node->body['und']['0']['value']; ?></p>
                        <ul class="animated hiding" data-animation="fadeIn" data-delay="300">
                            <?php if(!empty($node->field_showroom_link['und']['0']['value'])) { ?><li><a href="<?php echo $node->field_showroom_link['und']['0']['value']; ?>"><i class="icon icon-22 icon-view"></i><span>VIEW SHOWROOM</span></a></li><?php } ?>
                            <li><a href="javascript: window.print();"><i class="icon icon-22 icon-print"></i><span>PRINT PAGE</span></a></li>
                            <li class="sharing-wrapper">
                                <a href="#">
                                    <i class="icon icon-22 icon-share"></i>
                                    <span>SHARE</span>
                                </a>
                                <div class="sharing">
                                    <ul class="social-links clearfix">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a><span class='st_facebook_large' displayText='Facebook'></span></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a><span class='st_twitter_large' displayText='Tweet'></span></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a><span class='st_linkedin_large' displayText='LinkedIn'></span></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a><span class='st_googleplus_large' displayText='Google +'></span></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a><span class='st_pinterest_large' displayText='Pinterest'></span></li>
                                        <li><a href="#"><i class="fa fa-envelope"></i></a><span class='st_email_large' displayText='Email'></span></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <?php if(count($node->field_sidebar_specs) > 0) { ?>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="metal-container animated hiding" data-animation="fadeIn" data-delay="400">
                            <ul>
                                <?php foreach ($node->field_sidebar_specs['und'] as $key => $data) {  $entry = field_collection_field_get_entity($data); ?>
                                <li><i class="icon icon-27 icon-tick"></i><span><?php echo $entry->field_specification['und']['0']['value']; ?></span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php if(count($node->field_panels) > 0) { ?>
            <?php
                $classes = ''; 
                foreach ($node->field_panels['und'] as $key => $data) {  
                $entry = field_collection_field_get_entity($data); 
                $classes .= (!empty($entry->field_background['und']['0']['uri'])) ? ' .section-row.black-bg.panel-'.$key.'{background: url(\'' . file_create_url($entry->field_background['und']['0']['uri']) . '\') no-repeat center top;-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;}' : ' .section-row.black-bg.panel-'.$key.'{background: #252525;}';
            ?>
            <div id="adventure" class="adventure-container section-parallax section-row black-bg panel-<?php echo $key; ?>" data-stellar-background-ratio="0.5">
                <div class="container">
                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="100" ><?php echo $entry->field_title['und']['0']['value']; ?></h1>
                    <p class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $entry->field_content['und']['0']['value']; ?></p>
                </div>
            </div>
            <?php } ?>
        <?php 
            if(!empty($classes)) { echo '<style type="text/css">' . $classes . '</style>'; }
            } 
        ?>

        <?php if(count($models) > 0) { ?>
        <div id="available-model" class="model-container section-parallax section-row black-bg clearfix" data-stellar-background-ratio="0.5">
            <h1 class="animated hiding" data-animation="fadeIn" data-delay="100">Available Models</h1>
            <div class="model-col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php foreach ($models as $k => $v) { ?>
                    <?php if($v->field_available['und']['0']['value'] == 0) { ?>
                    <div class="model-item col-lg-4 col-md-4 col-sm-4 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="200">
                        <div class="model-image">  
                            <div class="notice-soon">
                                <h1>Available <br>Soon</h1>
                                <a href="#" class="subscribe-btn" data-toggle="modal" data-target="#newsletter-sign-up">
                                    <span class="fa fa-angle-left angle-3"></span>
                                    <span class="fa fa-angle-left angle-2"></span>
                                    <span class="fa fa-angle-left angle-1"></span>
                                    <div>Subscribe</div>
                                    <span class="fa fa-angle-right angle-1"></span>
                                    <span class="fa fa-angle-right angle-2"></span>
                                    <span class="fa fa-angle-right angle-3"></span>
                                </a>
                            </div>
                            <img class="m-img" src="<?php echo $theme_url; ?>/images/available-img1.jpg">
                        </div>
                        <div class="model-desc">
                            <h1><?php echo $v->title; ?></h1>
                            <p><?php echo $v->body['und']['0']['value']; ?></p>
                            <?php if(!empty($v->field_safety_specs)) { ?><a href="<?php echo file_create_url($v->field_safety_specs['und']['0']['uri']); ?>" class="download"><i class="icon icon-download"></i>Download spec sheet</a><?php } ?>
                            <a href="#" class="btn" data-toggle="modal" data-target="#newsletter-sign-up">Get Intel First</a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="model-item available col-lg-4 col-md-4 col-sm-4 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="400">
                        <div class="model-image">
                            <img class="notice-available" src="<?php echo $theme_url; ?>/images/icon-available.png">
                            <img class="m-img" src="<?php echo $theme_url; ?>/images/available-img1.jpg">
                        </div>
                        <div class="model-desc">
                            <h1><?php echo $v->title; ?></h1>
                            <p><?php echo $v->body['und']['0']['value']; ?></p>
                            <?php if(!empty($v->field_safety_specs)) { ?><a href="<?php echo file_create_url($v->field_safety_specs['und']['0']['uri']); ?>" class="download"><i class="icon icon-download"></i>Download spec sheet</a><?php } ?>
                            <a href="<?php echo url(drupal_get_path_alias('node/12')); ?>" class="btn">Go To Auction</a>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>  
        <?php } ?>
    </div>
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "1b7dd0ba-60c0-48ca-a506-b9d59c1fa42f", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>