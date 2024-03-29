<?php
namespace	Packt\Movie\Block\Adminhtml;
class	RatingDropdown	implements	\Magento\Framework\Option\ArrayInterface
{
    public	function	toOptionArray()
    {
        return	[
            [
                'value'	=>	null,
                'label'	=>	__('Select...')
            ],
            [
                'value'	=>	'1',
                'label'	=>	__('1')
            ],
            [
                'value'	=>	'2',
                'label'	=>	__('2')
            ],
            [
                'value'	=>	'3',
                'label'	=>	__('3')
            ],
            [
                'value'	=>	'4',
                'label'	=>	__('4')
            ],
            [
                'value'	=>	'5',
                'label'	=>	__('5')
            ],
        ];
    }
}