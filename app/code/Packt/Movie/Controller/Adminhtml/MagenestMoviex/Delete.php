<?php

namespace Packt\Movie\Controller\Adminhtml\MagenestMoviex;
use Packt\Movie\Model\GetMovieMovieFactory;
use Magento\Backend\App\Action;

class Delete extends Action
{
    protected $movie;
    public function __construct( Action\Context $context, GetMovieMovieFactory $movie)
    {
        $this->movie = $movie;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParam("selected"); /*lấy request từ bên trang danh sách phim*/
        $count = 0;
        foreach ($data as $item)
        {
            $model = $this->movie->create()->load($item);
            if ($model->getId())
            {
                $model->delete();
                $count++;
            }
        }
        $this->messageManager->addSuccess('A total of '.$count.' record(s) has been removed successfully, ');
        $this->_redirect('movie/magenestmoviex');
        return;
    }
}