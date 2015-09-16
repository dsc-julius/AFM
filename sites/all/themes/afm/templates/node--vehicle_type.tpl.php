<?php $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); $node = menu_get_object(); ?>
<?php 
$nids = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'vehicle')
    ->execute()
    ->fetchCol();
$nodes = node_load_multiple($nids);

$models = array();
foreach ($nodes as $key => $data) {
    foreach ($data->field_vehicle_type['und'] as $k => $v) {
        if($v['target_id'] == $node->nid)
            $models[] = $data;
    }
}

$videos = array();
foreach ($node->field_videos['und'] as $key => $data) {
    if($data != NULL && !empty($data['target_id'])) {
        $videos[] = node_load($data['target_id']);
    }
}

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
                <?php if(count($videos)  > 0 && $videos[0] != NULL) { ?><li><a href="#videos">Videos</a></li><?php } ?>
                <?php if(!empty($node->field_safety_and_specs)) { ?><li><a href="<?php echo $node->field_safety_and_specs['und']['0']['value']; ?>">Safety & Specs</a></li><?php } ?>
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
                            <?php if(!empty($node->field_safety_and_specs)) { ?><li><a href="<?php echo $node->field_safety_and_specs['und']['0']['value']; ?>" target="_blank"><i class="icon icon-22 icon-safety"></i><span>SAFETY & SPECS</span></a></li><?php } ?>
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
        <?php if(count($videos) > 0 && $videos[0] != NULL) { ?>
        <div id="videos" class="videos-container section-parallax section-row black-bg">
            <div class="container">
                <?php 
                foreach ($videos as $i => $v) {
                    $k = $i + 1; 
                    $video_url = $v->field_video_url['und']['0']['value'];

                    if(strpos($video_url,'youtube.com') !== false) {
                        $video_data = file_get_contents('http://www.youtube.com/oembed?url='.$video_url.'&format=json');
                        $video_data = json_decode($video_data);
                        $thumbnail = $video_data->thumbnail_url;
                        $description = '';
                        $iframe = $video_data->html;
                        $video_id = $video_data->video_id;
                        $title =  (!empty($v->title)) ? $v->title : $video_data->title;
                    }
                    else if(strpos($video_url,'vimeo.com') !== false) {
                        $video_data = file_get_contents('http://vimeo.com/api/oembed.json?url='.$video_url);
                        $video_data = json_decode($video_data);
                        $thumbnail = $video_data->thumbnail_url;
                        $description = $video_data->description;
                        $iframe = $video_data->html;
                        $video_id = $video_data->video_id;
                        $title =  (!empty($v->title)) ? $v->title : $video_data->title;
                    }

                    $description = (!empty($v->field_description['und']['0']['value'])) ? $v->field_description['und']['0']['value'] : $description;
                    $date = (!empty($v->field_video_date['und']['0']['value'])) ? date('d F Y', strtotime($v->field_video_date['und']['0']['value'])) : date('d F Y', $v->created);
                ?>
                    <?php if($k == 1 || (($k % 2) == 1)) { ?>
                    <div data="<?php echo $k; ?>" data2="<?php echo ($k % 2); ?>" class="video-row col-lg-12 col-lg-12 col-lg-12 col-lg-12">
                    <?php } ?>
                        <div class="video-item col-lg-6 col-md-6 col-sm-12 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="100">
                            <div class="video-desc clearfix">
                                <h1><?php echo $title; ?></h1>
                                <p><span class="date"><?php echo $date; ?></span><span class="desc"><?php echo $description; ?></span></p>
                            </div>
                            <div class="video">
                                <a href="#" data-toggle="modal" data-target="#video-<?php echo $k; ?>">
                                    <?php if(!empty($thumbnail)) { ?>
                                    <img src="<?php echo $thumbnail; ?>">
                                    <?php } else { ?>
                                    <img src="<?php echo $theme_url; ?>/images/video-img1.jpg">
                                    <?php } ?>
                                </a>
                            </div>
                        </div>  
                        <div class="modal fade" id="video-<?php echo $k; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-content">
                                    <div class="modal-body iframe-wrapper">
                                        <?php echo $iframe; ?>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <?php if((($k % 2) == 0) || (($k) == count($videos))) { ?>
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