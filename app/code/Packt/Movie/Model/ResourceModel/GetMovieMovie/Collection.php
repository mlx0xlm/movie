<?php
namespace Packt\Movie\Model\ResourceModel\GetMovieMovie;
class	Collection	extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public	function	_construct()	{
        $this->_init('Packt\Movie\Model\GetMovieMovie',
            'Packt\Movie\Model\ResourceModel\GetMovieMovie');
    }
}