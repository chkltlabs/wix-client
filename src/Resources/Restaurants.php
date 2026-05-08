<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Restaurants extends Domain
{
    protected string $segment = 'restaurants';

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

    public function archiveMenu(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/catalogs/{catalogId}/menus/{menuId}/archive', $pathParams, $params);
    }

    public function bulkArchiveMenus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/menus/archive', $pathParams, $params);
    }

    public function bulkCreateDishes(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/dishes/create', $pathParams, $params);
    }

    public function bulkCreateMenus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/menus/create', $pathParams, $params);
    }

    public function bulkCreateSections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/sections/create', $pathParams, $params);
    }

    public function bulkCreateVariations(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/variations/create', $pathParams, $params);
    }

    public function bulkUnarchiveMenus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/menus/unarchive', $pathParams, $params);
    }

    public function bulkUpdateItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/items/update', $pathParams, $params);
    }

    public function bulkUpdateMenus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/menus/update', $pathParams, $params);
    }

    public function bulkUpdateSections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/bulk/sections/update', $pathParams, $params);
    }

    public function createDiscount(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/catalogs/{catalogId}/discounts', $pathParams, $params);
    }

    public function createDish(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/catalogs/{catalogId}/menus/{menuId}/sections/{sectionId}/items', $pathParams, $params);
    }

    public function createDraftCatalog(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/create', $pathParams, $params);
    }

    public function createMenu(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/catalogs/{catalogId}/menus', $pathParams, $params);
    }

    public function createSection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/catalogs/{catalogId}/menus/{menuId}/sections', $pathParams, $params);
    }

    public function createVariation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/catalogs/{catalogId}/variations', $pathParams, $params);
    }

    public function discardDraftCatalog(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v3/draft-catalogs/{catalogId}/discard', $pathParams, $params);
    }

    public function getDiscount(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs/{catalogId}/discounts/{discountId}', $pathParams, $params);
    }

    public function getItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs/{catalogId}/items/{itemId}', $pathParams, $params);
    }

    public function getMenu(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs/{catalogId}/menus/{menuId}', $pathParams, $params);
    }

    public function getSection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs/{catalogId}/menus/{menuId}/sections/{sectionId}', $pathParams, $params);
    }

    public function listCatalogs(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs', $pathParams, $params);
    }

    public function listDiscounts(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs/{catalogId}/discounts', $pathParams, $params);
    }

    public function listItems(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs/{catalogId}/items', $pathParams, $params);
    }

    public function listMenus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs/{catalogId}/menus', $pathParams, $params);
    }

    public function listSections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/catalogs/{catalogId}/sections', $pathParams, $params);
    }

    public function publishDraftCatalog(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/draft-catalogs/{catalogId}/publish', $pathParams, $params);
    }

    public function unarchiveMenu(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/catalogs/{catalogId}/menus/{menuId}/unarchive', $pathParams, $params);
    }

    public function updateDiscount(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v3/catalogs/{catalogId}/discounts/{discount.id}', $pathParams, $params);
    }

    public function updateItem(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v3/catalogs/{catalogId}/items/{item.id}', $pathParams, $params);
    }

    public function updateMenu(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v3/catalogs/{catalogId}/menus/{menu.id}', $pathParams, $params);
    }

    public function updateSection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v3/catalogs/{catalogId}/menus/{menuId}/sections/{section.id}', $pathParams, $params);
    }

    public function acceptOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/orders/{id}/accept', $pathParams, $params);
    }

    public function cancelOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/orders/{id}/cancel', $pathParams, $params);
    }

    public function fulfillOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/orders/{id}/fulfill', $pathParams, $params);
    }

    public function getOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/orders/{id}', $pathParams, $params);
    }

    public function listOrders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/orders', $pathParams, $params);
    }

}