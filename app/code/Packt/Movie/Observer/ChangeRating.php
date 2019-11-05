<?php
namespace Packt\Movie\Observer;
use Packt\Movie\Model\GetMovieMovieFactory as Model;
use Magento\Framework\Event\ObserverInterface;

class ChangeRating implements \Magento\Framework\Event\ObserverInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getObject()->getData();
        $variable = $this->model->create()->load($customer['movie_id']);
        if($customer['rating'] >5){
            $variable->setData('rating',5);

        }
        else if($customer['rating'] <0)
        {
            $variable->setData('rating',1);
        }
        $variable->save();
        return $this;
    }
}