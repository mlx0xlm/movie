<?php

namespace Packt\Movie\Controller\Adminhtml\Index;

class ChangeRatingMovie extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza'));
        $this->_eventManager->dispatch('changerating', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}