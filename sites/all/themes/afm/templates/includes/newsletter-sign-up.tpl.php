<div class="modal fade" id="newsletter-sign-up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Newsletter Signup</h4>
            </div>
            <div class="modal-body">
                <?php 
                    if(!empty($_SESSION['newsletter-form'])) {
                        echo '<p class="form-success">'.$_SESSION['newsletter-form'].'</p>';
                    }

                    $form = drupal_get_form('afm_newsletter_form');
                    echo drupal_render($form);
                ?>
            </div>
        </div>
    </div>
</div>