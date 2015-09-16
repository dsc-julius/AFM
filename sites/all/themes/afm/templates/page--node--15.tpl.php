<?php $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); $node = menu_get_object(); ?>
    <div class="wrap">
        <div class="contact clearfix section-row">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    

                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->title; ?></h1>
                    <div class="contact-form col-lg-8 col-md-8 col-sm-8 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="100">
                        <p><?php echo $node->body['und']['0']['value']; ?></p>
                        <p class="reach-us">You can Reach us at <a class="email-txt" href="mailtol:info@australianfrsontlinemachinery.com.au">info@australianfrontlinemachinery.com.au</a></p>
                        <a href="mailto:info@australianfrsontlinemachinery.com.au" class="m-reach-us"><i class="fa fa-envelope"></i>Reach Us</a>
                        <div class="or clearfix"><span class="border border-left"></span>or<span class="border border-right"></span></div>

                        <?php
                            if(!empty($_SESSION['contact-form'])) {
                                echo '<p class="form-success">'.$_SESSION['contact-form'].'</p>';
                            }

                            $form = drupal_get_form('afm_contact_form');
                            echo drupal_render($form);
                        ?>

                    </div>
                    <div class="showroom col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="showroom-details animated hiding" data-animation="fadeIn" data-delay="200">
                            <h2>Showroom</h2>
                            <p><?php echo variable_get('address_1', ''); ?> <br> <?php echo variable_get('address_2', ''); ?></p>
                            <a href="tel:0287961800"><i class="icon icon-22 icon-phone"></i><?php echo variable_get('phone', ''); ?></a>
                            <a href="tel:0287950465"><i class="icon icon-22 icon-print"></i><?php echo variable_get('fax', ''); ?></a>
                        </div>
                        <div class="social-media animated hiding" data-animation="fadeIn" data-delay="300">
                            <h2>Share The Intel</h2>
                            <ul class="social-links clearfix">
                                <li><a href="#"><i class="fa fa-facebook"></i></a><span class='st_facebook_large' displayText='Facebook'></span></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a><span class='st_twitter_large' displayText='Tweet'></span></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a><span class='st_linkedin_large' displayText='LinkedIn'></span></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a><span class='st_googleplus_large' displayText='Google +'></span></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a><span class='st_pinterest_large' displayText='Pinterest'></span></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a><span class='st_email_large' displayText='Email'></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "1b7dd0ba-60c0-48ca-a506-b9d59c1fa42f", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>