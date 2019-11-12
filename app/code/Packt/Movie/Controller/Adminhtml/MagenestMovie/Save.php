<?php
namespace Packt\Movie\Controller\Adminhtml\MagenestMovie;
use Packt\Movie\Model\GetMovieFactory as Movie;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
class Save extends \Magento\Framework\App\Action\Action
{
    protected $movie;
    public function __construct(Context $context, Movie $movie)
    {
        $this->movie = $movie;
        parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $movieModel = $this->movie->create();
        $movieModel->setData($data)->save();
        $this->messageManager->addSuccessMessage('Add Done !');
        $this->_redirect("movie/magenestmovie");
    }
}