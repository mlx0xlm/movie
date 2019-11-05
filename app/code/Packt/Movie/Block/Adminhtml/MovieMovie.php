<?php
namespace	Packt\Movie\Block\Adminhtml;
class	MovieMovie	extends	\Magento\Backend\Block\Widget\Grid\Container
{
    protected	function	_construct()
    {
        $this->_blockGroup	=	'Packt_Movie';
        $this->_controller	=	'adminhtml_MovieMovie';
        parent::_construct();
    }
}