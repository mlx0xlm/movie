<?php
namespace Packt\Movie\Block\System\Config\Form\Field;

use Magento\Framework\Data\Form\Element\AbstractElement;

class DisableText extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
        /*$element->setDisabled('disabled')*/
        $element->setReadonly(1);
        return $element->getElementHtml();
    }
}
