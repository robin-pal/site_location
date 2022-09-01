<?php

namespace Drupal\site_location\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
* Creating a Configuration form to set site location.
*/
class locationSettingsForm extends ConfigFormBase {

  /** 
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'site_location.settings';

	/**
	 * {@inheritdoc}
	 */
	public function getFormId() {
		return "location_settings_form";
	}

	/** 
	* {@inheritdoc}
	*/
	protected function getEditableConfigNames() {
		return [
		  static::SETTINGS,
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state) {

		$config = $this->config(static::SETTINGS);

	    $form['country'] = [
	      '#type' => 'textfield',
	      '#title' => $this->t('Country'),
	      '#default_value' => $config->get('country'),
	    ];  

	    $form['city'] = [
	      '#type' => 'textfield',
	      '#title' => $this->t('City'),
	      '#default_value' => $config->get('city'),
	    ];  

	    $form['timezone'] = [
			'#title' => t('Timezone'),
			'#type' => 'select',
			'#description' => 'Select your location.',
			'#options' => [
				'America/Chicago' => 'America/Chicago',
				'America/New_York' => 'America/New_York',
				'Asia/Tokyo' => 'Asia/Tokyo',
				'Asia/Dubai' => 'Asia/Dubai',
				'Asia/Kolkata' => 'Asia/Kolkata',
				'Europe/Amsterdam' => 'Europe/Amsterdam',
				'Europe/Oslo' => 'Europe/Oslo',
				'Europe/London' => 'Europe/London'
			],
			'#default_value' => $config->get('timezone'),
		];

	    return parent::buildForm($form, $form_state);
	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state) {
		// Retrieve the configuration.
	    $this->config(static::SETTINGS)
	      // Set the submitted configuration setting.
	      ->set('country', $form_state->getValue('country'))
	      ->set('city', $form_state->getValue('city'))
	      ->set('timezone', $form_state->getValue('timezone'))
	      ->save();

	    parent::submitForm($form, $form_state);
	}
}