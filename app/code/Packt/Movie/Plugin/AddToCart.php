<?php

namespace Packt\Movie\Plugin;
use Magento\Framework\Exception\LocalizedException;

class AddToCart
{
    protected $quote;

    protected $request;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->quote = $checkoutSession->getQuote();
        $this->request = $request;
    }

    public function beforeAddProduct($subject, $productInfo, $requestInfo = null)
    {
        $productId = $this->request->getParam('product', 0);
        $qty = (int)$this->request->getParam('qty');
        $img= (int)$this->request->getParam('img');
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productId);
        $name = $product->getName();
        $img=$product->getImage();
        $a=1;
    }

}