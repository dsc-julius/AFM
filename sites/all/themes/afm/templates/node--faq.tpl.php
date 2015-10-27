<?php $theme_url = url(drupal_get_path('theme',$GLOBALS['theme'])); $node = menu_get_object(); ?>
    <div class="wrap">
        <div class="contact support clearfix section-row">
            <div class="container clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    

                    <h1 class="animated hiding" data-animation="fadeIn" data-delay="100"><?php echo $node->title; ?></h1>

                    <p class="animated hiding" data-animation="fadeIn" data-delay="200"><?php echo $node->body['und']['0']['value']; ?></p>

                    <hr class="animated hiding" data-animation="fadeIn" data-delay="250">


                    <div class="panel-group" id="accordion">
                        <?php 
                        if(!empty($node->field_questions)) {
                            foreach ($node->field_questions['und'] as $key => $value) { $entry = field_collection_field_get_entity($value);  ?>

                        <div class="panel">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key+1; ?>"><?php echo $key+1; ?>. <?php echo $entry->field_question['und']['0']['value']; ?></a>
                            </h4>
                            <div id="collapse<?php echo $key+1; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p><?php echo $entry->field_answer['und']['0']['value']; ?></p>
                                </div>
                            </div>
                        </div>
                            <?php } ?>
                        <?php } ?>

                        <!-- <div class="panel">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. What is Ipsum?</a>
                            </h4>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. What is Dolor?</a>
                            </h4>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,</p>
                                </div>
                            </div>
                        </div> -->
                    </div>


                </div>
            </div>
        </div>
    </div>