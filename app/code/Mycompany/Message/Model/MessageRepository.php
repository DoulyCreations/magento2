<?php

namespace Mycompany\Message\Model;

class MessageRepository implements \Mycompany\Message\Api\MessageRepositoryInterface
{
    protected $entityManager;
    protected $dataMessageFactory;
    protected $messageCollectionFactory;
    protected $collectionProcessor;
    protected $searchResultsFactory;


    public function __construct(
        \Magento\Framework\EntityManager\EntityManager $entitymanager,
        \Mycompany\Message\Api\Data\MessageInterfaceFactory $dataMessageFactory,
        \Mycompany\Message\Model\ResourceModel\Message\CollectionFactory $messageCollectionFactory,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        \Mycompany\Message\Api\Data\MessageSearchResultsInterfaceFactory $searchResultsFactory
    ) 
    {
        $this->entityManager = $entitymanager;
        $this->dataMessageFactory = $dataMessageFactory;
        $this->messageCollectionFactory = $messageCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }
    
    public function delete(\Mycompany\Message\Api\Data\MessageInterface $dataMessage): bool 
    {
        return $this->entityManager->delete($dataMessage);
    }

    public function deleteById($messageId): bool 
    {
        $dataMessage = $this->dataMessageFactory->create()->setId($messageId);
        return $this->delete($dataMessage);
    }

    public function getById($messageId): \Mycompany\Message\Api\Data\MessageInterface 
    {
        $dataMessage = $this->dataMessageFactory->create();
        
        if(!empty($messageId)) {
            $this->entityManager->load($dataMessage, $messageId);
        }
        
        return $dataMessage;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        // On doit passer par la collection car l'entity Manager ne gère qu'eun seul enregistrement
        
        /** @var \Magento\Cms\Model\ResourceModel\Page\Collection $collection */
        $collection = $this->messageCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var Data\PageSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        
        return $searchResults;
    }

    public function save(\Mycompany\Message\Api\Data\MessageInterface $dataMessage): \Mycompany\Message\Api\Data\MessageInterface 
    {
        return $this->entityManager->save($dataMessage);
    }

}
