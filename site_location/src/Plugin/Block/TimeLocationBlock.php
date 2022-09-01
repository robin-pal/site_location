<?php

namespace Drupal\site_location\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
* Provides time and location block.
* 
* @Block(
*	id = "location_block",
*	admin_label = @Translation("Location Block"),
* )
*/
class TimeLocationBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
	public function build(){
		$config = \Drupal::config('site_location.settings');
        $country = $config->get('country');
        $city = $config->get('city');
        $timezone = $config->get('timezone');
        $timezone_service = \Drupal::service('site_location.time_conversion');
        $time = $timezone_service->currentTime($timezone);
		return array(
			'#theme' => 'timezone_template',
			'#time' => $time,
			'#country' => $country,
			'#city' => $city,
			'#timezone' => $timezone
		);
	}
}