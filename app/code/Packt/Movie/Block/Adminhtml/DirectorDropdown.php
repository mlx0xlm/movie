<?php
namespace Packt\Movie\Block\Adminhtml;
use Magento\Framework\Escaper;
use Magento\Framework\Data\OptionSourceInterface;
use Packt\Movie\Model\GetMovieDirectorFactory as MagenestDirector;

class DirectorDropdown implements OptionSourceInterface
{
    protected $escaper;
    protected $_director;
    protected $options;
    protected $currentOptions = [];

    public function __construct(MagenestDirector $director, Escaper $escaper)
    {
        $this->_director = $director;
        $this->escaper = $escaper;
    }

    public function toOptionArray()
    {
        if ($this->options !== null) {
            return $this->options;
        }
        $this->options = $this->getAvailableGroups();
        return $this->options;
    }

    private function getAvailableGroups()
    {
        $collection = $this->_director->create()->getCollection();
        $result = [];
        $result[] = ['value' => ' ', 'label' => 'Select...'];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getDirectorId(), 'label' => $group->getName()];
        }
        return $result;
    }
}