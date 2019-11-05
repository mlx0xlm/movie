<?php
namespace Packt\Movie\Model\ResourceModel;
class    GetMovie extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_actor', 'actor_id');
    }
}