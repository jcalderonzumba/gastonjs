<?php

namespace Zumba\GastonJS\Tests;

/**
 * Class BrowserWindowTest
 * @package Zumba\GastonJS\Tests
 */
class BrowserWindowTest extends BrowserCommandsTestCase {

  public function testWindowHandleNoPage() {
    $this->assertEquals(0, $this->browser->windowHandle());
  }

  public function testWindowHandlePage() {
    $this->visitUrl($this->getTestPageBaseUrl() . "/static/basic.html");
    $this->assertEquals(0, $this->browser->windowHandle());
  }

  public function testWindowNameNoPage() {
    $this->assertEmpty($this->browser->windowName());
  }

  public function testWindowNamePage() {
    $this->visitUrl($this->getTestPageBaseUrl() . "/static/basic.html");
    $this->assertEquals("BASIC_WINDOW", $this->browser->windowName());
  }

  public function testCloseWindow() {
    $this->visitUrl($this->getTestPageBaseUrl() . "/static/basic.html");
    $this->assertEquals(0, $this->browser->windowHandle());
    $this->browser->closeWindow("0");
    $this->assertNull($this->browser->windowHandle());
  }

  public function testWindowHandlesNoPage() {
    $handles = $this->browser->windowHandles();
    $this->assertCount(1, $handles);
    $this->assertEquals($handles[0], "0");
  }

  public function testOpenNewWindow() {
    $this->assertTrue($this->browser->openNewWindow());
    $this->assertEquals("about:blank", $this->browser->currentUrl());
  }

  public function testWindowHandlesPage() {
    $this->visitUrl($this->getTestPageBaseUrl() . "/static/basic.html");
    $this->browser->openNewWindow();
    $this->visitUrl($this->getTestPageBaseUrl() . "/static/auth_ok.html");
    $this->assertCount(2, $this->browser->windowHandles());
  }

  public function testSwitchToWindow() {
    $this->testWindowHandlesPage();
    $this->assertEquals(0, $this->browser->windowHandle());
    $this->assertTrue($this->browser->switchToWindow("1"));
    $this->assertEquals(1, $this->browser->windowHandle());
  }

  public function testWindowTree() {
    // Open a stack of windows like following array of window names by handles:
    $expectedStack = array(
      0 =>       array('', 'windowing.html'),
        1 =>     array('', 'windowing.html'),
        2 =>     array('second', 'windowing.html'),
          3 =>   array('', 'windowing.html'),
          4 =>   array('third', 'windowing.html'),
            6 => array('', 'windowing.html'),
      5 =>       array('BASIC_WINDOW', 'basic.html'),
    );
    $this->visitUrl($this->getTestPageBaseUrl() . "/static/windowing.html"); // Open 0
    $element = $this->browser->find('xpath', '//*[@id="to_new"]');
    $this->browser->click($element['page_id'], $element['ids'][0]);          // Open 1 from 0
    $element = $this->browser->find('xpath', '//*[@id="to_second"]');
    $this->browser->click($element['page_id'], $element['ids'][0]);          // Open 2 from 0
    $this->browser->switchToWindow('2');
    $element = $this->browser->find('xpath', '//*[@id="to_new"]');
    $this->browser->click($element['page_id'], $element['ids'][0]);          // Open 3 from 2
    $element = $this->browser->find('xpath', '//*[@id="to_third"]');
    $this->browser->click($element['page_id'], $element['ids'][0]);          // Open 4 from 2
    $this->browser->switchToWindow('0');
    $element = $this->browser->find('xpath', '//*[@id="to_new_basic"]');
    $this->browser->click($element['page_id'], $element['ids'][0]);          // Open 5 from 0
    $this->browser->switchToWindow('4');
    $element = $this->browser->find('xpath', '//*[@id="to_new"]');
    $this->browser->click($element['page_id'], $element['ids'][0]);          // Open 6 from 4

    // Validate stack
    $validateStack = function() use (&$expectedStack) {
      $currentHandle = $this->browser->windowHandle();
      $actual = array();
      foreach($this->browser->windowHandles() as $handle) {
        $this->browser->switchToWindow($handle);
        $actual[$handle] = array($this->browser->windowName(), basename($this->browser->currentUrl()));
      }
      $this->assertEquals($expectedStack, $actual);  // assertEquals ignores key order
      $this->browser->switchToWindow($currentHandle);
    };
    $validateStack();

    // Open auth_ok.html from 1 into window 'third' (4), then revalidate stack and url of 'third'
    $this->browser->switchToWindow('1');
    $element = $this->browser->find('xpath', '//*[@id="to_third_auth_ok"]');
    $this->browser->click($element['page_id'], $element['ids'][0]);
    $expectedStack[$this->browser->windowHandle('third')][1] = 'auth_ok.html';
    $validateStack();

    // Close 3 and revalidate stack
    $this->browser->closeWindow('3');
    unset($expectedStack[3]);
    $validateStack();

    // Close 2, and thereby also 4 and 6, and revalidate stack
    $this->browser->closeWindow('2');
    unset($expectedStack[2], $expectedStack[4], $expectedStack[6]);
    $validateStack();

    // Close all others
    $this->browser->closeWindow('0');
    $this->assertEquals(null, $this->browser->windowHandles());
    $this->assertEquals(null, $this->browser->windowHandle());
    try {
      $this->fail($this->browser->windowName());
    } catch(\Exception $e) {
      $this->assertInstanceOf('Zumba\GastonJS\Exception\NoSuchWindowError', $e);
    }
    $this->browser->reset();
    $this->assertEquals(0, $this->browser->windowHandle());
  }
}
