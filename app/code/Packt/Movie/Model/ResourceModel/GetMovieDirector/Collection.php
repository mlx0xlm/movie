<?php
namespace Packt\Movie\Model\ResourceModel\GetMovieDirector;
class	Collection	extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public	function	_construct()	{
        $this->_init('Packt\Movie\Model\GetMovieDirector',
            'Packt\Movie\Model\ResourceModel\GetMovieDirector');
    }
}