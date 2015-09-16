<?php 
    $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); 
    $node = menu_get_object(); 
    $auctions = node_load(13);

    $count = 0;
    foreach ($auctions->field_auction['und'] as $key => $value) {
        $entry = field_collection_field_get_entity($value);
        $count += (!empty($entry->field_location['und']['0']['value'])) ? 1 : 0;
    }
?>
    <div class="wrap">
        <?php if(!$count) { ?>

        <div class="showrooms clearfix section-row">
            <div class="container">
                <h1 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $auctions->title; ?></h1>
                <div class="showrooms-details col-lg-6 col-md-6 col-sm-12 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="200">
                    <p><?php echo $node->node_fields[1]['value']; ?></p>
                    <br>
                    <p>46 Airds Road, Minto, NSW 2566</p>
                    <p>PO Box 5172, Minto, NSW 2566</p>
                    <p>Phone: <a href="tel:0287961800">02 8796 1800</a></p>
                    <p>Fax: <a href="tel:0287950465">02 8795 0465</a></p>
                    <p>Email: <a class="email-txt" href="mailto:info@australianfrontlinemachinery.com.au">info@australianfrontlinemachinery.com.au</a></p>
                </div>
                <div class="showroom-location col-lg-6 col-md-6 col-sm-12 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="300">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6612.98800889426!2d150.83924500000003!3d-34.031197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ec185d095e41%3A0x3d1b4ea1e950c69f!2s46+Airds+Rd%2C+Minto+NSW+2566%2C+Australia!5e0!3m2!1sen!2sph!4v1441779416167" width="545" height="253" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <?php } else { ?>

        <div class="auction-showroom clearfix section-row">
            <div class="container">
                <div class="desc">
                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $auctions->title; ?></h1>
                    <p class="animated hiding" data-animation="fadeIn"data-delay="100"><?php echo $node->node_fields[2]['value']; ?></p>
                </div>
                <?php include('includes/countdowntimer-1.tpl.php'); ?>
            </div>   
        </div>
        <div class="wrap-navigation section-row">
            <ul class="wrap-nav animated hiding" data-animation="fadeIn" data-delay="100">
                <?php  
                foreach ($auctions->field_auction['und'] as $key => $value) {
                    $entry = field_collection_field_get_entity($value);
                ?>
                <li><a href="#auction-<?php echo $key; ?>"><?php echo $entry->field_location['und']['0']['value']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="auction-location section-row">
            <div class="container">
                <?php  
                foreach ($auctions->field_auction['und'] as $key => $value) {
                    $entry = field_collection_field_get_entity($value);
                ?>

                <div id="auction-<?php echo $key; ?>" class="auction-location-item clearfix">
                    <h2  class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $entry->field_location['und']['0']['value']; ?></h2>
                    <div class="auction-item-details col-lg-6 col-md-6 col-sm-12 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="200">
                        <p><span class="item-label">Auction Dates</span> <span><?php echo date('d', strtotime($entry->field_auction_dates['und']['0']['value'])); ?>-<?php echo date('d M', strtotime($entry->field_auction_dates['und']['0']['value2'])); ?></span></p>
                        <p>
                            <span class="item-label">Inspection Dates</span> 
                            <span>
                            <?php 
                            foreach ($entry->field_inspection_dates['und'] as $k => $v) {
                                $e = field_collection_field_get_entity($v);
                                echo date('d F | H:ia', strtotime($e->field_date['und']['0']['value'])) . ' - ' . date('H:ia', strtotime($e->field_date['und']['0']['value2'])).'<br>';
                            } 
                            ?>
                            </span>
                        </p>
                        <p><span class="item-label">Product Range</span> <span><?php echo $entry->field_product_range['und']['0']['value']; ?></span></p>
                        <p><span class="item-label">Showroom Location</span> <span><?php echo $entry->field_showroom_location['und']['0']['value']; ?></span></p>   

                         <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6612.98800889426!2d150.83924500000003!3d-34.031197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ec185d095e41%3A0x3d1b4ea1e950c69f!2s46+Airds+Rd%2C+Minto+NSW+2566%2C+Australia!5e0!3m2!1sen!2sph!4v1441779416167" width="545" height="253" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <a href="<?php echo ($entry->field_auction_link['und']['0']['value']) ? $entry->field_auction_link['und']['0']['value'] : '#'; ?>" class="btn"><i class="icon icon-auction"></i>View Auction</a>
                    </div>
                    <div class="auction-location-map col-lg-6 col-md-6 col-sm-12 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="300">
                        <?php echo $entry->field_map_embed_code['und']['0']['value']; ?>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>

        <?php } ?>
        <div class="upcoming-auctions seciont-row clearfix">
            <div class="container">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->node_fields[3]['value']; ?></h1>
                    <p class="animated hiding" data-animation="fadeIn" data-delay="200"><?php echo $node->node_fields[4]['value']; ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animated hiding" data-animation="fadeIn" data-delay="300">
                    <a href="#" class="btn" data-toggle="modal" data-target="#newsletter-sign-up">Sign Up</a>
                </div>
            </div>
        </div>
    </div>