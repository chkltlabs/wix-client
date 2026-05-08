<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class WixData extends Domain
{
    protected string $segment = 'wix-data';

    private function executeOperation(string $httpMethod, string $path, array $pathParams = [], array $params = []): object
    {
        if (preg_match_all('/\{([^}]+)\}/', $path, $matches) > 0 && !empty($matches[1])) {
            foreach ($matches[1] as $placeholder) {
                $pathParamKey = explode('=', $placeholder)[0];
                if (!array_key_exists($pathParamKey, $pathParams)) {
                    throw new UnexpectedValueException('Missing required path param: ' . $pathParamKey);
                }
                $path = str_replace('{' . $placeholder . '}', rawurlencode((string) $pathParams[$pathParamKey]), $path);
            }
        }

        return $this->request($httpMethod, $path, $params);
    }

    public function aggregateDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/aggregate', $pathParams, $params);
    }

    public function bulkInsertDataItemReferences(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/items/insert-references', $pathParams, $params);
    }

    public function bulkInsertDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/items/insert', $pathParams, $params);
    }

    public function bulkRemoveDataItemReferences(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/items/remove-references', $pathParams, $params);
    }

    public function bulkRemoveDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/items/remove', $pathParams, $params);
    }

    public function bulkSaveDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/items/save', $pathParams, $params);
    }

    public function bulkUpdateDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/items/update', $pathParams, $params);
    }

    public function connectSharedDataCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/data-collection-sharing/shared', $pathParams, $params);
    }

    public function countDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/count', $pathParams, $params);
    }

    public function createDataCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/collections', $pathParams, $params);
    }

    public function createExternalDatabaseConnection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/external-database-connections', $pathParams, $params);
    }

    public function createIndex(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/indexes', $pathParams, $params);
    }

    public function createSharePolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/data-collection-sharing/policies', $pathParams, $params);
    }

    public function deleteDataCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/collections/{dataCollectionId=**}', $pathParams, $params);
    }

    public function deleteExternalDatabaseConnection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/external-database-connections/{name}', $pathParams, $params);
    }

    public function deleteSharePolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/data-collection-sharing/policies/{sharePolicyId}', $pathParams, $params);
    }

    public function deleteSharedDataCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/data-collection-sharing/shared/{dataCollectionId=**}', $pathParams, $params);
    }

    public function dropIndex(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/indexes', $pathParams, $params);
    }

    public function getDataCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/collections/{dataCollectionId=**}', $pathParams, $params);
    }

    public function getDataItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/items/{dataItemId}', $pathParams, $params);
    }

    public function getDataItemV2ItemsGet(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/get', $pathParams, $params);
    }

    public function getExternalDatabaseConnection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/external-database-connections/{name}', $pathParams, $params);
    }

    public function getSharePolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/data-collection-sharing/policies/{sharePolicyId}', $pathParams, $params);
    }

    public function insertDataItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items', $pathParams, $params);
    }

    public function insertDataItemReference(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/insert-reference', $pathParams, $params);
    }

    public function isReferencedDataItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/is-referenced', $pathParams, $params);
    }

    public function listDataCollections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/collections', $pathParams, $params);
    }

    public function listExternalDatabaseConnections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/external-database-connections', $pathParams, $params);
    }

    public function listIndexes(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/indexes', $pathParams, $params);
    }

    public function listSharePolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/data-collection-sharing/policies', $pathParams, $params);
    }

    public function listSharedDataCollections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/data-collection-sharing/shared', $pathParams, $params);
    }

    public function queryDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/query', $pathParams, $params);
    }

    public function queryDistinctValues(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/query-distinct-values', $pathParams, $params);
    }

    public function queryReferencedDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/query-referenced', $pathParams, $params);
    }

    public function removeDataItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/items/{dataItemId}', $pathParams, $params);
    }

    public function removeDataItemV2ItemsRemove(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/remove', $pathParams, $params);
    }

    public function removeDataItemReference(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/remove-reference', $pathParams, $params);
    }

    public function replaceDataItemReferences(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/replace-references', $pathParams, $params);
    }

    public function saveDataItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/save', $pathParams, $params);
    }

    public function truncateDataItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/truncate', $pathParams, $params);
    }

    public function updateDataCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v2/collections', $pathParams, $params);
    }

    public function updateDataItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v2/items/{dataItem.id}', $pathParams, $params);
    }

    public function updateDataItemV2ItemsUpdate(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/items/update', $pathParams, $params);
    }

    public function updateExternalDatabaseConnection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/external-database-connections/{externalDatabaseConnection.name}', $pathParams, $params);
    }

    public function updateSharePolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/data-collection-sharing/policies/{sharePolicy.id}', $pathParams, $params);
    }

}