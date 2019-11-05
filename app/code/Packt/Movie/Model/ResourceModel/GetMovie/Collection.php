<?php
namespace Packt\Movie\Model\ResourceModel\GetMovie;
class	Collection	extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public	function	_construct()	{
        $this->_init('Packt\Movie\Model\GetMovie',
            'Packt\Movie\Model\ResourceModel\GetMovie');
    }
}