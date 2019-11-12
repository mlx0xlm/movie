<?php

namespace Packt\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
class ChangeFieldText implements ObserverInterface
{
    const XML_PATH_FAQ_URL = 'movie/hellopage/header_title';

    private $request;
    protected $configWriter, $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        RequestInterface $request,
        WriterInterface $configWriter
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->request = $request;
        $this->configWriter = $configWriter;

    }

    public function execute(EventObserver $observer)
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $getValue = $this->scopeConfig->getValue(self::XML_PATH_FAQ_URL, $storeScope);
        if($getValue =='Ping')
            $getValue = 'Pong';
        $this->configWriter->save('movie/hellopage/header_title', $getValue);
        return $this;
    }
}