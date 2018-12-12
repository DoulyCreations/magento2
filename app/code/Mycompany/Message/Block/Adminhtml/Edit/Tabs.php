<?php

namespace Mycompany\Message\Block\Adminhtml\Edit;

use Magento\Backend\Block\Widget\Tabs as BaseTabs;

class Tabs extends BaseTabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('message_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__(''));
    }
}
