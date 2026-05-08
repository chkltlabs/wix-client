<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Stores extends Domain
{
    protected string $segment = 'stores';

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

    public function bulkCreateCoupons(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/coupons/create', $pathParams, $params);
    }

    public function bulkDeleteCoupons(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/coupons/delete', $pathParams, $params);
    }

    public function create(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/coupons', $pathParams, $params);
    }

    public function createApiV2Coupons(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'api/v2/coupons', $pathParams, $params);
    }

    public function deleteOperation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/coupons/{id}', $pathParams, $params);
    }

    public function deleteOperationApiV2CouponsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'api/v2/coupons/{id}', $pathParams, $params);
    }

    public function getOperation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/coupons/{id}', $pathParams, $params);
    }

    public function getOperationApiV2CouponsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'api/v2/coupons/{id}', $pathParams, $params);
    }

    public function query(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/coupons/query', $pathParams, $params);
    }

    public function queryApiV2CouponsQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'api/v2/coupons/query', $pathParams, $params);
    }

    public function update(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/coupons/{id}', $pathParams, $params);
    }

    public function updateApiV2CouponsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'api/v2/coupons/{id}', $pathParams, $params);
    }

    public function generatePackingSlipLink(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/orders/{orderId}/packingSlip', $pathParams, $params);
    }

    public function generatePackingSlipLinkV2OrdersPackingslipOrderid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/orders/packingSlip/{orderId}', $pathParams, $params);
    }

    public function generateOrdersPdfLink(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/orders/generatePDF', $pathParams, $params);
    }

    public function getAbandonedCart(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/abandonedCarts/{id}', $pathParams, $params);
    }

    public function queryAbandonedCarts(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/abandonedCarts/query', $pathParams, $params);
    }

    public function getOperationV1CartsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/carts/{id}', $pathParams, $params);
    }

    public function getCartCheckoutUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/carts/{id}/checkoutUrl', $pathParams, $params);
    }

    public function addProductMedia(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/{id}/media', $pathParams, $params);
    }

    public function addProductMediaToChoices(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/products/{id}/choices/media', $pathParams, $params);
    }

    public function addProductsToCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/collections/{id}/productIds', $pathParams, $params);
    }

    public function bulkAdjustProductProperties(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/products/adjust-properties', $pathParams, $params);
    }

    public function bulkAdjustProductPropertiesV1BulkProductsAdjust(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/products/adjust', $pathParams, $params);
    }

    public function bulkUpdateProducts(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/products/update', $pathParams, $params);
    }

    public function createCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/collections', $pathParams, $params);
    }

    public function createProduct(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products', $pathParams, $params);
    }

    public function deleteCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/collections/{id}', $pathParams, $params);
    }

    public function deleteProduct(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/products/{id}', $pathParams, $params);
    }

    public function deleteProductOptions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/products/{id}/options', $pathParams, $params);
    }

    public function getCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/collections/{id}', $pathParams, $params);
    }

    public function getCollectionApiV1CollectionsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'api/v1/collections/{id}', $pathParams, $params);
    }

    public function getCollectionBySlug(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/collections/slug/{slug}', $pathParams, $params);
    }

    public function getProduct(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/products/{id}', $pathParams, $params);
    }

    public function getProductApiV1ProductsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'api/v1/products/{id}', $pathParams, $params);
    }

    public function productOptionsAvailability(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/{id}/productOptionsAvailability', $pathParams, $params);
    }

    public function productOptionsAvailabilityApiV1ProductsIdProductoptionsavailability(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'api/v1/products/{id}/productOptionsAvailability', $pathParams, $params);
    }

    public function getStoreVariant(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/variants/{id}', $pathParams, $params);
    }

    public function queryCollections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/collections/query', $pathParams, $params);
    }

    public function queryCollectionsApiV1CollectionsQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'api/v1/collections/query', $pathParams, $params);
    }

    public function queryProductVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/{id}/variants/query', $pathParams, $params);
    }

    public function queryProducts(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/query', $pathParams, $params);
    }

    public function queryProductsApiV1ProductsQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'api/v1/products/query', $pathParams, $params);
    }

    public function queryStoreVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/variants/query', $pathParams, $params);
    }

    public function removeBrand(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/{id}/remove-brand', $pathParams, $params);
    }

    public function removeProductMedia(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/{id}/media/delete', $pathParams, $params);
    }

    public function removeProductMediaFromChoices(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/{id}/choices/media/delete', $pathParams, $params);
    }

    public function removeProductsFromCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/collections/{id}/productIds/delete', $pathParams, $params);
    }

    public function removeRibbon(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/{id}/remove-ribbon', $pathParams, $params);
    }

    public function resetAllVariantData(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/products/{id}/variants/resetToDefault', $pathParams, $params);
    }

    public function updateCollection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/collections/{collection.id}', $pathParams, $params);
    }

    public function updateProduct(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/products/{product.id}', $pathParams, $params);
    }

    public function updateVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/products/{id}/variants', $pathParams, $params);
    }

    public function decrementInventory(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/inventoryItems/decrement', $pathParams, $params);
    }

    public function getInventoryVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/inventoryItems/{inventoryId}/getVariants', $pathParams, $params);
    }

    public function getInventoryVariantsV2InventoryitemsExternalExternalidGetvariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/inventoryItems/external/{externalId}/getVariants', $pathParams, $params);
    }

    public function getInventoryVariantsV2InventoryitemsProductProductidGetvariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/inventoryItems/product/{productId}/getVariants', $pathParams, $params);
    }

    public function incrementInventory(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/inventoryItems/increment', $pathParams, $params);
    }

    public function queryInventory(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/inventoryItems/query', $pathParams, $params);
    }

    public function updateInventoryVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/inventoryItems/product/{inventoryItem.productId}', $pathParams, $params);
    }

    public function updateInventoryVariantsV2InventoryitemsInventoryitemId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/inventoryItems/{inventoryItem.id}', $pathParams, $params);
    }

    public function updateInventoryVariantsV2InventoryitemsExternalInventoryitemExternalid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/inventoryItems/external/{inventoryItem.externalId}', $pathParams, $params);
    }

    public function createFulfillment(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/orders/{orderId}/fulfillments', $pathParams, $params);
    }

    public function createOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/orders', $pathParams, $params);
    }

    public function deleteFulfillment(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/orders/{orderId}/fulfillments/{fulfillmentId}', $pathParams, $params);
    }

    public function getOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/orders/{id}', $pathParams, $params);
    }

    public function queryOrders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/orders/query', $pathParams, $params);
    }

    public function updateFulfillment(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v2/orders/{orderId}/fulfillments/{fulfillmentId}', $pathParams, $params);
    }

    public function updateOrderEmail(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/orders/{orderId}/updateEmail', $pathParams, $params);
    }

    public function updateOrderShippingAddress(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v2/orders/{orderId}/updateShippingAddress', $pathParams, $params);
    }

    public function allowOneTimePurchases(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/subscription-options/product/{productId}/allowOneTimePurchase', $pathParams, $params);
    }

    public function assignSubscriptionOptionsToProduct(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/subscription-options/product/{productId}/assign', $pathParams, $params);
    }

    public function bulkCreateSubscriptionOptions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/subscription-options/createBulk', $pathParams, $params);
    }

    public function bulkDeleteSubscriptionOptions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/subscription-options/deleteBulk', $pathParams, $params);
    }

    public function bulkUpdateSubscriptionOptions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/subscription-options', $pathParams, $params);
    }

    public function createSubscriptionOption(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/subscription-options', $pathParams, $params);
    }

    public function deleteSubscriptionOption(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/subscription-options/{id}', $pathParams, $params);
    }

    public function getProductIdsForSubscriptionOption(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/subscription-options/{id}/productIds', $pathParams, $params);
    }

    public function getOneTimePurchasesStatus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/subscription-options/product/{productId}/oneTimePurchasesStatus', $pathParams, $params);
    }

    public function getSubscriptionOption(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/subscription-options/{id}', $pathParams, $params);
    }

    public function getSubscriptionOptionsForProduct(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/subscription-options/byProduct/{productId}', $pathParams, $params);
    }

    public function listSubscriptionOptions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/subscription-options/list', $pathParams, $params);
    }

    public function updateSubscriptionOption(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/subscription-options/{subscriptionOption.id}', $pathParams, $params);
    }

}