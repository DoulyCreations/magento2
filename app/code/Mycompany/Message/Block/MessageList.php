<?php

namespace Mycompany\Message\Block;

class MessageList extends \Magento\Framework\View\Element\Template
{
    protected $messageRepository;
    protected $searchCriteriaBuilder;
    
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Mycompany\Message\Api\MessageRepositoryInterface $messageRepository,
        \Magento\Framework\Api\Search\SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = array()
    ) {
        parent::__construct($context, $data);
        $this->messageRepository = $messageRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }
    
    public function getMessageSearchResult()
    {
        return $this->messageRepository->getList($this->searchCriteriaBuilder->create());
    }
}
