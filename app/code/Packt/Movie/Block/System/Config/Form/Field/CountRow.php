<?php
namespace  Packt\Movie\Block\System\Config\Form\Field;
use Packt\Movie\Model\GetMovieFactory;
class CountRow extends \Magento\Framework\View\Element\Template
{
    protected $movieCollectionFactory;


    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        GetMovieFactory $movieCollectionFactory,
        array $data = []
    ) {
        $this->movieCollectionFactory = $movieCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductCollection() {

        $collection = $this->movieCollectionFactory->create()->getCollection();
        $collection->getData();
        $count=$collection->getData()->count();
        return $count;
    }
}