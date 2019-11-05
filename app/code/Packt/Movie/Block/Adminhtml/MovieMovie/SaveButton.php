<?php
namespace Packt\Movie\Block\Adminhtml\MovieMovie;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
/**
 * Class SaveButton
 * @package Magento\Customer\Block\Adminhtml\Edit
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
            ],
            'sort_order' => 90,
        ];
    }
}