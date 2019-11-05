<?php
namespace Packt\Movie\Controller\Adminhtml\MagenestDirector;
use Packt\Movie\Model\GetMovieDirectorFactory as Director;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
class Save extends \Magento\Framework\App\Action\Action
{
    protected $director;
    public function __construct(Context $context, Director $movie)
    {
        $this->director = $movie;
        parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $movieModel = $this->director->create();
        $movieModel->setData($data)->save();
        $this->messageManager->addSuccessMessage('Add Done !');
        $this->_redirect("movie/magenestdirector");
    }
}