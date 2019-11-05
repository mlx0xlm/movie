<?php
namespace Packt\Eav\Block;
use Magento\Framework\View\Element\Template;
use \Magento\Store\Model\StoreManagerInterface as storeManager;

class ShowInfoAccount extends Template
{
    protected $_customerSession;
    protected $storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    )
    {
        $this->storeManager = $storeManager;
        $this->_customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);

        return $mediaUrl;
    }

    public function getLoggedinCustomerId()
    {
        $om = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSession = $om->create('\Magento\Customer\Model\Session');
        if ($this->_customerSession->isLoggedIn()) {
            $id = $customerSession->getCustomer();
            return $id;
        }
    }
}