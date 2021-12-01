<?php
namespace Dev\Banner\Model;

use Dev\Banner\Model\ResourceModel\Banner\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $loadedData;
/**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $employeeCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $employeeCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $employeeCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
  
        if (isset($this->loadedData)) {
 
            return $this->loadedData;
 
        }
 
        $items = $this->collection->getItems();
 
        foreach ($items as $item) {
 
            $this->loadedData[$item->getId()] = $item->getData();
 
        }
 
        return $this->loadedData;
 
    }
}    

