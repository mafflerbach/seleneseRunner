<?php

namespace testonaut\Selenese\Command;

use testonaut\Selenese\Command;
use testonaut\Selenese\Exception\NoSuchElement;

// VerifyElementNotPresent(locator)
class VerifyElementNotPresent extends Command {

  /**
   * @see Command::runWebDriver()
   */
  public function runWebDriver(\WebDriver $session) {
    try {
      $this->getElement($session, $this->arg1);
      return $this->commandResult(true, false, 'Found, should not have been');
    } catch (\NoSuchElementException $e) {
      return $this->commandResult(true, true, 'Not found, as per-request');
    }
  }

}