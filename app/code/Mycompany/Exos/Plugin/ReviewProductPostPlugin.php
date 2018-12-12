<?php

namespace Mycompany\Exos\Plugin;

use Magento\Review\Model\Review;

class ReviewProductPostPlugin
{
    private $reviewFactory;
    private $ratingFactory;
    
    public function __construct(
        \Magento\Review\Model\ReviewFactory $reviewFactory,
        \Magento\Review\Model\RatingFactory $ratingFactory
    )
    {
        $this->reviewFactory = $reviewFactory;
        $this->ratingFactory = $ratingFactory;
    }
    
    public function aroundExecute(
        \Magento\Review\Controller\Product\Post $subject,
        \Closure $proceed
    )
    {
        $detail = $subject->getRequest()->getParam('detail');
        $data = $this->getRequest()->getPostValue();
        
        $review = $this->reviewFactory->create()->setData($data);
        
        /*
         * Si le message ne contient pas le mot clé 'super', faire en sorte que le review soit approuvé
         * Si le message contient le mot clé 'super', faire en sorte que le review soit refusé
         */
        
        if(stripos($detail, 'super') !== false) {
            // refusé
            $review->setStatusId(Review::STATUS_NOT_APPROVED);
        } else {
            // approuvé
            $review->setStatusId(Review::STATUS_APPROVED);
        }
        
        var_dump($data);
        
        //return $proceed();
    }

}
