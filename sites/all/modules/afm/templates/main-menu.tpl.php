<?php
 global $base_url;
 $content_types = node_type_get_types();
 asort($content_types);
 $icons = array(
  'therapy_area' => 'fa-user-md',
  'medicine' => 'fa-medkit',
  'events' => 'fa-users',
  'resources' => 'fa-file-text-o',
  'condition' => 'fa-child',
  'samples' => 'fa-tasks',
  'page' => 'fa-file',
  'article' => 'fa-file-text',
  'media_gallery' => 'fa-file-image-o',
  'videos' => 'fa-file-video-o',
  'websites' => 'fa-copy'
 );
?>
<div class="az-main-menu">
  <ul class="main-list">
    <?php foreach($content_types as $content){
      $type_name = str_replace("_","-",$content->type);
      $type_icon = isset($icons[$content->type]) ? $icons[$content->type] : 'fa-bars';
      if('media_gallery' != $content->type && 'orders' != $content->type && 'poll' != $content->type && 'advpoll' != $content->type && 'variants' != $content->type){
    ?>
    <li>
      <a href="<?php echo $base_url . '/node/add/' . $type_name; ?>">
        <div class="fa <?php echo $type_icon ?> az-icons"></div>
        <div class="label"><?php echo $content->name; ?></div>
      </a>
    </li> 
  <?php }
    }?>
    <li>
      <a href="<?php echo $base_url . '/node/871/edit?destination=/node/871/edit'; ?>">
        <div class="fa fa-bars az-icons"></div>
        <div class="label">Multivariates</div>
      </a>
    </li> 
  </ul>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery('#branding').css('position','relative').append('<div class="site_logo" style="position: absolute;right: 20px;top: 50%;margin-top: -30px;"><img src="<?php echo $base_url; ?>/sites/all/themes/astrazeneca/images/logo_simply.png"></div>');
});
</script>