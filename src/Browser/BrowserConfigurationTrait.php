<?php

namespace Zumba\GastonJS\Browser;


/**
 * Trait BrowserConfigurationTrait
 * @package Zumba\GastonJS\Browser
 */
trait BrowserConfigurationTrait {
  /**
   * Set whether to fail or not on javascript errors found on the page
   * @param bool $enabled
   * @return bool
   */
  public function jsErrors($enabled = true) {
    return $this->command('set_js_errors', $enabled);
  }

  /**
   * Set a blacklist of urls that we are not supposed to load
   * @param array $blackList
   * @return bool
   */
  public function urlBlacklist($blackList) {
    return $this->command('set_url_blacklist', $blackList);
  }

  /**
   * Set the debug mode on the browser
   * @param bool $enable
   * @return bool
   */
  public function debug($enable = false) {
    $this->debug = $enable;
    return $this->command('set_debug', $this->debug);
  }

  /**
   * Set the timeout after which any resource requested will stop
   * trying and proceed with other parts of the page
   * @param int $resourceTimeout
   * @return bool
   */
  public function resourceTimeout($resourceTimeout) {
    return $this->command('set_resource_timeout', $resourceTimeout);
  }

}
