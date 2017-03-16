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

  /**
   * Sets or unsets web proxy.
   *
   * @param string|false $proxy proxy url formatted as '(http|socks5)://[username:password@]host:port', or false to unset
   * @return bool
   * @throws \UnexpectedValueException when the proxy url is invalid
   */
  public function setProxy($proxy)
  {
    $args = array('set_proxy');
    if ($proxy !== false)
    {
      if (preg_match('~^(http|socks5)://(?:([^:@/]*?):([^:@/]*?)@)?([^:@/]+):(\d+)$~', $proxy, $components))
      {
        array_push($args, $components[4], intval($components[5], 10), $components[1]);
        if (strlen($components[2]) || strlen($components[3]))
        {
          array_push($args, urldecode($components[2]), urldecode($components[3]));
        }
      }
      else
      {
        throw new \UnexpectedValueException('Invalid proxy url ' . $proxy);
      }
    }
    return call_user_func_array(array($this, 'command'), $args);
  }
}
