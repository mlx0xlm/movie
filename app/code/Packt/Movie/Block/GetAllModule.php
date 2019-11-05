<?php
namespace Packt\Movie\Block;

class GetAllModule extends \Magento\Framework\View\Element\Template
{
    protected $creditmemoCollection;
    protected $invoice_collection;
    public $moduleList;
    protected $_customer;
    protected $_productCollectionFactory;
    protected $_orderCollectionFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,array $data = [],
        \Magento\Sales\Model\ResourceModel\Order\Creditmemo\Collection $creditmemoCollection,
        \Magento\Sales\Model\Order\InvoiceRepository $invoice_collection,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        \Magento\Framework\Module\ModuleList $moduleList,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory )
    {
        $this->creditmemoCollection = $creditmemoCollection;
        $this->invoice_collection = $invoice_collection;
        $this->_orderCollectionFactory = $orderCollectionFactory;
        $this->moduleList = $moduleList;
        $this->_customer = $customerFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }
    public function myFunction()
    {
        $modules = $this->moduleList->getAll();
        return count($modules);

    }
    public function getMyData()
    {
        $product=$this->_productCollectionFactory->create();
        return $product;
    }
    public function getCustomer()
    {
        return $this->_customer->create()->getCollection();
    }
    public  function getOrder()
    {
        return $this->_orderCollectionFactory->create();
    }
    public function getInvoice()
    {
        return $this->invoice_collection->create();
    }
    public function getCredit()
    {
        return $this->creditmemoCollection;
    }
}