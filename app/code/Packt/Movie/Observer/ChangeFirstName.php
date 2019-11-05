<?php

namespace Packt\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;

class ChangeFirstName implements ObserverInterface
{
    protected $_customerRepositoryInterface;

    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $customer->setFirstName('Magenest');
        $this->_customerRepositoryInterface->save($customer);
    }
}