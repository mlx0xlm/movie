<?php
namespace Packt\Movie\Model\ResourceModel;
class    GetMovieMovie extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_movie', 'movie_id');
    }
}