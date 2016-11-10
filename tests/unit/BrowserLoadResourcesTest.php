<?php

namespace Zumba\GastonJS\Tests;

/**
 * Class BrowserRenderTest
 * @package Zumba\GastonJS\Tests
 */
class BrowserLoadResourcesTest extends BrowserCommandsTestCase {

  public function testLoadResourcesHang() {

    $startTime = microtime(true);
    # visiting this url will simulate resource loading up to 5 seconds
    $this->visitUrl($this->getTestPageBaseUrl() . "/static/hang_resources.html");
    $finishTime = microtime(true);
    $visitTime = $finishTime - $startTime;
    static::assertGreaterThan(5, $visitTime);

  }

  public function testLoadResources() {

    $this->browser->resourceTimeout(3500);
    $startTime = microtime(true);
    # visiting this url will simulate resource loading up to 5 seconds.
    # setting resourceTimeout allows us to proceed with other parts
    # of the page and not to hang on this particular resource
    $this->visitUrl($this->getTestPageBaseUrl() . "/static/hang_resources.html");
    $finishTime = microtime(true);
    $visitTime = $finishTime - $startTime;
    static::assertLessThan(4, $visitTime);

  }

}