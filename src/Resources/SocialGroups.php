<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class SocialGroups extends AbstractResource
{
    protected string $segment = 'social-groups';

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

        return $this->sendRequest($httpMethod, 'social-groups/' . ltrim($path, '/'), $params);
    }

    public function addGroupMembers(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups/{groupId}/members', $pathParams, $params);
    }

    public function approveGroupRequests(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/group-requests/approve', $pathParams, $params);
    }

    public function approveJoinGroupRequests(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups/{groupId}/join-requests/approve', $pathParams, $params);
    }

    public function assignRole(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups/{groupId}/roles/assign', $pathParams, $params);
    }

    public function createGroup(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups', $pathParams, $params);
    }

    public function deleteGroup(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/groups/{groupId}', $pathParams, $params);
    }

    public function getGroup(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/groups/{groupId}', $pathParams, $params);
    }

    public function getGroupBySlug(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/groups/slugs/{slug}', $pathParams, $params);
    }

    public function listGroupMembers(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/groups/{groupId}/members', $pathParams, $params);
    }

    public function listGroupRequests(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/group-requests', $pathParams, $params);
    }

    public function listGroups(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/groups', $pathParams, $params);
    }

    public function listJoinGroupRequests(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/groups/{groupId}/join-requests', $pathParams, $params);
    }

    public function listMemberships(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/members/{siteMemberId}/memberships', $pathParams, $params);
    }

    public function queryGroupMembers(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups/{groupId}/members/query', $pathParams, $params);
    }

    public function queryGroupRequests(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/group-requests/query', $pathParams, $params);
    }

    public function queryGroups(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups/query', $pathParams, $params);
    }

    public function queryJoinGroupRequests(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups/{groupId}/join-requests/query', $pathParams, $params);
    }

    public function queryMemberships(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/members/{siteMemberId}/memberships/query', $pathParams, $params);
    }

    public function rejectGroupRequests(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/group-requests/reject', $pathParams, $params);
    }

    public function rejectJoinGroupRequests(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups/{groupId}/join-requests/reject', $pathParams, $params);
    }

    public function removeGroupMembers(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/groups/{groupId}/members', $pathParams, $params);
    }

    public function unassignRole(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/groups/{groupId}/roles/unassign', $pathParams, $params);
    }

    public function updateGroup(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/groups/{group.id}', $pathParams, $params);
    }

    public function listMembershipsV2MembersMemberidMemberships(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/members/{memberId}/memberships', $pathParams, $params);
    }

    public function queryMembershipsV2MembersMemberidMembershipsQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/members/{memberId}/memberships/query', $pathParams, $params);
    }

}