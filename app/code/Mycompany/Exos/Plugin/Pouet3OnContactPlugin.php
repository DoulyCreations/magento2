<?php

namespace Mycompany\Exos\Plugin;

class Pouet3OnContactPlugin
{
    public function aroundExecute(
        \Magento\Contact\Controller\Index\Index $subject,
        \Closure $proceed
    )
    {
        var_dump('pouet3');
        
        return $proceed();
    }
}
