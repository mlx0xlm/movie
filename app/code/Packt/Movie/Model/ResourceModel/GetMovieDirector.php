<?php
namespace Packt\Movie\Model\ResourceModel;
class    GetMovieDirector extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_director', 'director_id');
    }
}