<?php
  $auctions = node_load(13);

  $dates = array();
  foreach ($auctions->field_auction['und'] as $key => $value) {
      $entry = field_collection_field_get_entity($value);
      $dates[] = strtotime($entry->field_auction_dates['und']['0']['value']);
  }

  sort($dates);
  $min = $dates[0];
  $max = $dates[count($dates) - 1];
  $now = strtotime('now');
  if(count($dates) && !empty($min)) {
    $label = ($min < $now) ? 'Auction Ends In' : 'Next Auction Starts In';
    $date = ($min < $now) ? $max : $min;

    $showCounter = false;
    $showCounter = ($max >= $now) ? true : false;

    if($showCounter) {
      echo '
      <script type="text/javascript">
        (function($){ 
          $(\'.auction-timer-label\').html(\'' . $label . '\');
          CountDownTimer(\'' . date('m/d/Y H:i A', $date) . '\', \'.timer\'); 
        })(jQuery);
      </script>';
    }
    else {
      echo '
      <script type="text/javascript">
        (function($){ 
          $(\'.auction-timer\').remove();
          $(\'.counter-cont\').remove();
        })(jQuery);
      </script>';
    }
  } 
  else {
    echo '
    <script type="text/javascript">
      (function($){ 
        $(\'.auction-timer\').remove();
        $(\'.counter-cont\').remove();
      })(jQuery);
    </script>';
  }
?>