<?php

namespace Packt\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Config\Model\Config\Factory as configFactory;
class ChangeFieldText implements ObserverInterface
{
    const XML_PATH_FAQ_URL = 'movie/hellopage/header_title';

    /**
     * @var RequestInterface
     */
    private $request;
    protected $configWriter;

    /**
     * ConfigChange constructor.
     * @param RequestInterface $request
     * @param WriterInterface $configWriter
     */
    public function __construct(
        RequestInterface $request,
        WriterInterface $configWriter
    ) {
        $this->request = $request;
        $this->configWriter = $configWriter;

    }

    public function execute(EventObserver $observer)
    {
        //$faqParams = $this->request->getParam();
        //$urlKey = $faqParams['movie']['hellopage']['header_title']['value']; //Current faq_url value, Here you can filter current value
        $urlKey='Pong';     /*gan gia tri cua $urlkey bang Pong sau do save*/
        $this->configWriter->save('movie/hellopage/header_title', $urlKey);
        return $this;
    }
}