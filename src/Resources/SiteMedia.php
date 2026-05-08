<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class SiteMedia extends AbstractResource
{
    protected string $segment = 'site-media';

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

        return $this->sendRequest($httpMethod, 'site-media/' . ltrim($path, '/'), $params);
    }

    public function bulkDeleteFiles(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/files/delete', $pathParams, $params);
    }

    public function bulkDeleteFolders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/folders/delete', $pathParams, $params);
    }

    public function bulkImportFiles(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/files/import', $pathParams, $params);
    }

    public function bulkRestoreFilesFromTrashBin(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/trash-bin/files/restore', $pathParams, $params);
    }

    public function bulkRestoreFoldersFromTrashBin(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bulk/trash-bin/folders/restore', $pathParams, $params);
    }

    public function createFolder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/folders', $pathParams, $params);
    }

    public function generateFileDownloadUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/files/{fileId}/generate-download-url', $pathParams, $params);
    }

    public function generateFileResumableUploadUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/files/generate-resumable-upload-url', $pathParams, $params);
    }

    public function generateFileUploadUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/files/generate-upload-url', $pathParams, $params);
    }

    public function generateFilesDownloadUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/files/generate-download-url', $pathParams, $params);
    }

    public function generateFolderDownloadUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/folders/{folderId}/generate-download-url', $pathParams, $params);
    }

    public function generateVideoStreamingUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/files/video/{fileId}/generate-stream-url', $pathParams, $params);
    }

    public function getFileDescriptor(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/files/{fileId}', $pathParams, $params);
    }

    public function getFileDescriptors(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/files/get-files', $pathParams, $params);
    }

    public function getFolder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/folders/{folderId}', $pathParams, $params);
    }

    public function importFile(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/files/import', $pathParams, $params);
    }

    public function listDeletedFiles(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/trash-bin/files', $pathParams, $params);
    }

    public function listDeletedFolders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/trash-bin/folders', $pathParams, $params);
    }

    public function listFiles(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/files', $pathParams, $params);
    }

    public function listFolders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/folders', $pathParams, $params);
    }

    public function searchFiles(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/files/search', $pathParams, $params);
    }

    public function searchFolders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/folders/search', $pathParams, $params);
    }

    public function updateFile(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/files/{fileId}', $pathParams, $params);
    }

    public function updateFileDescriptor(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/files/{file.id}/update', $pathParams, $params);
    }

    public function updateFolder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/folders/{folder.id}', $pathParams, $params);
    }

}