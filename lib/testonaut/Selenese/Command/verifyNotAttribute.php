<?php

namespace testonaut\Selenese\Command;

use testonaut\Selenese\Command;
// VerifyNotAttribute(attributeLocator,pattern)
class VerifyNotAttribute extends Command {
   public function runWebDriver(\WebDriver $session) {
    $index = strrpos($this->arg1, '/@');
    $pattern = '/@';
    if ($index === FALSE) {
      $index = strrpos($this->arg1, '@');
      $pattern = '@';
    }
    $attribute = substr($this->arg1, $index);
    
    $element = substr($this->arg1, 0, $index);
    
    $attrPattern = str_replace('/@', '', $attribute);
    $attrPattern = str_replace('@', '', $attrPattern);
    
    $elementText = $this->getElement($session, $element)->getAttribute($attrPattern);
    
    return $this->verifyNot($elementText, $this->arg2);
  }
}
