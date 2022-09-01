<?php

namespace Drupal\site_location;

use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Class TimeConversionService
 * @package Drupal\site_location\Services
 */
class TimeConversionService {
  // Time Conversion function for converting time.
  public function currentTime($timezone) {
    $date = new DrupalDateTime('now', $timezone);
    $date->__toString();
    return $date->format('jS M Y - h:i:s A');
  }

  // Removes cache from Block.
  public function getCacheMaxAge() {
      return 0;
  }

}