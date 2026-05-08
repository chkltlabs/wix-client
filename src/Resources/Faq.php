<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Faq extends Domain
{
    protected string $segment = 'faq';

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

    public function bulkSetQuestionStatus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/question-entries/update-status', $pathParams, $params);
    }

    public function bulkUpdateLabelOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/question-entries/update-label-order', $pathParams, $params);
    }

    public function createCategory(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/categories', $pathParams, $params);
    }

    public function createQuestion(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/question-entries', $pathParams, $params);
    }

    public function deleteCategory(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/categories/{id}', $pathParams, $params);
    }

    public function deleteQuestion(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/question-entries/{id}', $pathParams, $params);
    }

    public function listCategories(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/categories', $pathParams, $params);
    }

    public function listQuestions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/question-entries', $pathParams, $params);
    }

    public function setQuestionLabels(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/question-entries/{questionId}/labels', $pathParams, $params);
    }

    public function updateCategory(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/categories/{category.id}', $pathParams, $params);
    }

    public function updateQuestion(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/question-entries/{questionEntry.id}', $pathParams, $params);
    }

    public function updateQuestionsVisibility(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/question-entries/update-visibility', $pathParams, $params);
    }

}