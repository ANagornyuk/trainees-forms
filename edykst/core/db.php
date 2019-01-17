<?php

  /**
   * Class DatabaseSettings.
   */
class DatabaseSettings {
  public $settings;

  /**
   * Function getSettings().
   */
  public function getSettings() {
    $settings['dbhost'] = 'localhost';
    $settings['dbname'] = 'test';
    $settings['dbusername'] = 'root';
    $settings['dbpassword'] = '123';
    return $settings;
  }

}
