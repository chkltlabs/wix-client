<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Members extends AbstractResource
{
    protected string $segment = 'members';

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

        return $this->sendRequest($httpMethod, 'members/' . ltrim($path, '/'), $params);
    }

    public function getActivityCounters(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/activity-counters/{memberId}', $pathParams, $params);
    }

    public function queryActivityCounters(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/activity-counters/query', $pathParams, $params);
    }

    public function setActivityCounters(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/activity-counters/{memberId}', $pathParams, $params);
    }

    public function assignBadge(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/badges/{id}/members', $pathParams, $params);
    }

    public function createBadge(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/badges', $pathParams, $params);
    }

    public function deleteBadge(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v3/badges/{id}', $pathParams, $params);
    }

    public function getBadge(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/badges/{id}', $pathParams, $params);
    }

    public function getMemberCountsPerBadge(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/badges/members/count', $pathParams, $params);
    }

    public function listBadges(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/badges', $pathParams, $params);
    }

    public function listMembersBadgeIds(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/badges/members', $pathParams, $params);
    }

    public function listMembers(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v3/badges/{id}/members', $pathParams, $params);
    }

    public function queryBadges(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v3/badges/query', $pathParams, $params);
    }

    public function unassignBadge(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v3/badges/{id}/members', $pathParams, $params);
    }

    public function updateBadge(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v3/badges/{badge.id}', $pathParams, $params);
    }

    public function updateBadgesDisplayOrder(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v3/badges/order', $pathParams, $params);
    }

    public function sendSetPasswordEmail(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/auth/members/send-set-password-email', $pathParams, $params);
    }

    public function listMemberConnections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/followers/{memberId}/connections', $pathParams, $params);
    }

    public function listMemberFollowers(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/followers/{memberId}', $pathParams, $params);
    }

    public function listMemberFollowing(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/followers/{memberId}/following', $pathParams, $params);
    }

    public function createMember(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/members', $pathParams, $params);
    }

    public function deleteMember(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/members/{id}', $pathParams, $params);
    }

    public function deleteMemberAddresses(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/members/{id}/addresses', $pathParams, $params);
    }

    public function deleteMemberEmails(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/members/{id}/emails', $pathParams, $params);
    }

    public function deleteMemberPhones(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/members/{id}/phones', $pathParams, $params);
    }

    public function getMember(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/members/{id}', $pathParams, $params);
    }

    public function listMembersV1Members(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/members', $pathParams, $params);
    }

    public function queryMembers(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/members/query', $pathParams, $params);
    }

    public function updateMember(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/members/{member.id}', $pathParams, $params);
    }

}