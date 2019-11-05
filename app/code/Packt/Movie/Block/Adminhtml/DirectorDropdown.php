<?php
namespace Packt\Movie\Block\Adminhtml;
use Magento\Framework\Escaper;
use Magento\Framework\Data\OptionSourceInterface;
use Packt\Movie\Model\GetMovieDirectorFactory as MagenestDirector;
/**
 * Class Options
 */
class DirectorDropdown implements OptionSourceInterface
{
    /**
     * Escaper
     *
     * @var Escaper
     */
    protected $escaper;
    protected $_director;
    /**
     * @var array
     */
    protected $options;
    /**
     * @var array
     */
    protected $currentOptions = [];
    /**
     * Constructor
     *
     * @param MagenestDirector $systemStore
     * @param Escaper $escaper
     */
    public function __construct(MagenestDirector $director, Escaper $escaper)
    {
        $this->_director = $director;
        $this->escaper = $escaper;
    }
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->options !== null) {
            return $this->options;
        }
        $this->options = $this->getAvailableGroups();
        return $this->options;
    }
    /**
     * Prepare groups
     *
     * @return array
     */
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