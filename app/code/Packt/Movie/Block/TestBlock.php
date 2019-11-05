<?php
namespace Packt\Movie\Block;
use Packt\Movie\Model\GetMovieFactory;
class TestBlock extends \Magento\Framework\View\Element\Template
{
    protected $movieCollectionFactory;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, GetMovieFactory $movieCollectionFactory, array $data = [])
    {
        $this->movieCollectionFactory = $movieCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductCollection()
    {
        $collection = $this->movieCollectionFactory->create()->getCollection();
        $collection->getSelect()->join(
            ['Magenest_Movie_Actor' => $collection->getTable('Magenest_Movie_Actor')],
            'main_table.actor_id = Magenest_Movie_Actor.actor_id',
            []);
        $collection->getSelect()->joinRight(
            ['magenest_movie' => $collection->getTable('magenest_movie')],
            'Magenest_Movie_Actor.movie_id = magenest_movie.movie_id',
            ['movie' => 'magenest_movie.name',
            ]);
        $collection->getSelect()->join(
            ['magenest_director' => $collection->getTable('magenest_director')],
            'magenest_movie.director_id = magenest_director.director_id',
            ['director' => 'magenest_director.name',
            ]
        );
        return $collection;
    }
}