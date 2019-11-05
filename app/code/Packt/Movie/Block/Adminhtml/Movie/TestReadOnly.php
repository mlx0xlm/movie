<?php
namespace Packt\Movie\Block\Adminhtml\Movie;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field as BaseField;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\UrlInterface;
use Zend\Uri\UriFactory;
use Packt\Movie\Model\ResourceModel\GetMovie;
class TestReadOnly extends BaseField
{
    /**
     * Render element value
     *
     * @param      \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return      string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected $_movieCollectionFactory;
    public function __construct(
        Context $context,
        \Packt\Movie\Model\ResourceModel\GetMovie\CollectionFactory $movieCollectionFactory,
        array $data = [])
    {
        $this->_movieCollectionFactory = $movieCollectionFactory;
        parent::__construct($context, $data);
    }
    protected function _renderValue(AbstractElement $element)
    {
        $movies = $this->_movieCollectionFactory->create();
        $count=count($movies);
        $element->setReadonly(true);
        $element->setValue($count);
        return parent::_renderValue($element);
    }
}