<?php
namespace Packt\Movie\Block\TestBackend;
class Product extends \Magento\Framework\View\Element\Template
{
    protected $_productCollectionFactory;
    protected $_customer;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    )
    {
        $this->_customer = $customerFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductCollection()
    {
        $this->_customer->create()->getCollection();
        $collection = $this->_productCollectionFactory->create();
        return $collection;
    }
}