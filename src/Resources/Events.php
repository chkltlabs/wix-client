<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Events extends Domain
{
    protected string $segment = 'events';

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

    public function changeCurrency(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/ticket-definitions/currency', $pathParams, $params);
    }

    public function createTicketDefinition(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/ticket-definitions', $pathParams, $params);
    }

    public function deleteTicketDefinition(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/ticket-definitions', $pathParams, $params);
    }

    public function getTicketDefinition(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/ticket-definitions/{definitionId}', $pathParams, $params);
    }

    public function listTicketDefinitions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/ticket-definitions', $pathParams, $params);
    }

    public function queryTicketDefinitions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/ticket-definitions/query', $pathParams, $params);
    }

    public function updateTicketDefinition(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/ticket-definitions/{definitionId}', $pathParams, $params);
    }

    public function addControl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/form/control', $pathParams, $params);
    }

    public function bulkUpdate(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/orders', $pathParams, $params);
    }

    public function bulkUpdateV1EventsEventidRsvp(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/rsvp', $pathParams, $params);
    }

    public function bulkUpdateV1EventsEventidTickets(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/tickets', $pathParams, $params);
    }

    public function cancel(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{id}/cancel', $pathParams, $params);
    }

    public function cancelReservation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/events/{eventId}/tickets/reservation/{id}', $pathParams, $params);
    }

    public function changeCurrencyV1EventsEventidTicketsDefinitionsCurrency(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/events/{eventId}/tickets/definitions/currency', $pathParams, $params);
    }

    public function checkIn(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/rsvp/check-in', $pathParams, $params);
    }

    public function checkInV1TicketsCheckIn(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/tickets/check-in', $pathParams, $params);
    }

    public function checkout(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/tickets/checkout', $pathParams, $params);
    }

    public function confirm(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/orders/confirm', $pathParams, $params);
    }

    public function copy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/copy', $pathParams, $params);
    }

    public function create(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/policies', $pathParams, $params);
    }

    public function createV1Events(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events', $pathParams, $params);
    }

    public function createV1EventsEventidRsvp(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/rsvp', $pathParams, $params);
    }

    public function createReservation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/tickets/reservation', $pathParams, $params);
    }

    public function createV1EventsEventidTicketsDefinitions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/tickets/definitions', $pathParams, $params);
    }

    public function deleteOperation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/policies/{policyId}', $pathParams, $params);
    }

    public function deleteCheckIn(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/rsvp/check-in', $pathParams, $params);
    }

    public function deleteControl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/events/{eventId}/form/controls/{id}', $pathParams, $params);
    }

    public function deleteOperationV1EventsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/events/{id}', $pathParams, $params);
    }

    public function deleteOperationV1EventsEventidRsvp(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/events/{eventId}/rsvp', $pathParams, $params);
    }

    public function deleteOperationV1EventsEventidTicketsDefinitions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/events/{eventId}/tickets/definitions', $pathParams, $params);
    }

    public function deleteCheckInV1TicketsCheckIn(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/tickets/check-in', $pathParams, $params);
    }

    public function discardDraft(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/events/{eventId}/form', $pathParams, $params);
    }

    public function getOperation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/events/{eventId}/orders/{orderNumber}', $pathParams, $params);
    }

    public function getCheckoutOptions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/checkout/options', $pathParams, $params);
    }

    public function getOperationV1EventsEvent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/events/event', $pathParams, $params);
    }

    public function getOperationV1EventsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/events/{id}', $pathParams, $params);
    }

    public function getOperationV1EventsEventidForm(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/events/{eventId}/form', $pathParams, $params);
    }

    public function getInvoice(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/tickets/reservation/{reservationId}/invoice', $pathParams, $params);
    }

    public function getOperationV1EventsEventidRsvpRsvpid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/events/{eventId}/rsvp/{rsvpId}', $pathParams, $params);
    }

    public function getSummary(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/orders/summary', $pathParams, $params);
    }

    public function getOperationV1EventsEventidTicketsTicketnumber(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/events/{eventId}/tickets/{ticketNumber}', $pathParams, $params);
    }

    public function getOperationV1TicketsDefinitionsDefinitionid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/tickets/definitions/{definitionId}', $pathParams, $params);
    }

    public function getTokens(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/policies/tokens', $pathParams, $params);
    }

    public function list(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/orders', $pathParams, $params);
    }

    public function listAvailableTickets(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/tickets/available', $pathParams, $params);
    }

    public function listV1Events(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/events', $pathParams, $params);
    }

    public function listV1Rsvp(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/rsvp', $pathParams, $params);
    }

    public function listV1TicketsDefinitions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/tickets/definitions', $pathParams, $params);
    }

    public function listV1EventsEventidTickets(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/events/{eventId}/tickets', $pathParams, $params);
    }

    public function publishDraft(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/{eventId}/form/publish', $pathParams, $params);
    }

    public function queryAvailableTickets(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/tickets/available/query', $pathParams, $params);
    }

    public function query(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/events/query', $pathParams, $params);
    }

    public function queryPolicies(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/policies/query', $pathParams, $params);
    }

    public function queryV1RsvpQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/rsvp/query', $pathParams, $params);
    }

    public function queryV1TicketsDefinitionsQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/tickets/definitions/query', $pathParams, $params);
    }

    public function update(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/orders/{orderNumber}', $pathParams, $params);
    }

    public function updateV1PoliciesPolicyid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/policies/{policyId}', $pathParams, $params);
    }

    public function updateCheckout(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/tickets/checkout/{orderNumber}', $pathParams, $params);
    }

    public function updateControl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/events/{eventId}/form/controls/{id}', $pathParams, $params);
    }

    public function updateV1EventsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{id}', $pathParams, $params);
    }

    public function updateMessages(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/form/messages', $pathParams, $params);
    }

    public function updateV1EventsEventidRsvpRsvpid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/rsvp/{rsvpId}', $pathParams, $params);
    }

    public function updateV1EventsEventidTicketsTicketnumber(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/tickets/{ticketNumber}', $pathParams, $params);
    }

    public function updateV1EventsEventidTicketsDefinitionsDefinitionid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/events/{eventId}/tickets/definitions/{definitionId}', $pathParams, $params);
    }

}