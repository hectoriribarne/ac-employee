<?php

namespace Drupal\Tests\acquia_lift\Unit\Service\Helper;

use Drupal\Tests\UnitTestCase;
use Drupal\acquia_lift\Service\Helper\HelpMessageHelper;

require_once __DIR__ . '/../../Polyfill/Drupal.php';

/**
 * HelpMessageHelper Test.
 *
 * @coversDefaultClass Drupal\acquia_lift\Service\Helper\HelpMessageHelper
 * @group acquia_lift
 */
class HelpMessageHelperTest extends UnitTestCase {
  /**
   * Tests the getMessage() method - AdminSettingsForm.
   *
   * @covers ::getMessage
   *
   * @param string $route_name
   * @param string $has_message
   *
   * @dataProvider providerRouteNames
   */
  public function testGetMessageAdminSettingsFormNoApiUrl($route_name, $has_message) {
    $help_message_helper = new HelpMessageHelper();
    $message = $help_message_helper->getMessage($route_name);
    $this->assertEquals('You can find more info in <a href="https://docs.acquia.com/lift" target="_blank">Documentation</a>.' === $message, $has_message);
  }

  /**
   * Data provider to produce route names.
   */
  public function providerRouteNames() {
    $data = [];

    $data['help page, has message'] = ['help.page.acquia_lift', TRUE];
    $data['admin settings form, has message'] = ['acquia_lift.admin_settings_form', TRUE];
    $data['admin settings form, has no message'] = ['acquia_contenthub.admin_settings_form', FALSE];

    return $data;
  }
}
