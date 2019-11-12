<?php
namespace Packt\Movie\Block\Adminhtml\Movie;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

use Packt\Movie\Model\GetMovieMovieFactory;

class Rating extends Column
{
    protected $_movieFactory;
    public function __construct(
        GetMovieMovieFactory $movieFactory,
        UrlInterface $urlBuilder,
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    )
    {
        $this->_movieFactory = $movieFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $fieldName = $this->getData('name');
                $rating = '';
                $x= $item['rating'];
                // lặp số sao
                for ($i = 0; $i < $x; $i++) {
                    $rating .= "<label style=\"color: darkred;\">★</label>";
                }
                //
                for ($i = $x; $i < 5; $i++) {
                    $rating .= "<label  style=\"color: rgb(204, 204, 204);\">★</label>";
                }
                $item[$fieldName] = $rating;
            }
        }
        return $dataSource;
    }
}