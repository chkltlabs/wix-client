<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Bookings extends AbstractResource
{
    protected string $segment = 'bookings';

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

        return $this->sendRequest($httpMethod, 'bookings/' . ltrim($path, '/'), $params);
    }

    public function getAttendance(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/attendance/{attendanceId}', $pathParams, $params);
    }

    public function queryAttendance(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/attendance/query', $pathParams, $params);
    }

    public function setAttendance(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/attendance/set', $pathParams, $params);
    }

    public function book(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/book', $pathParams, $params);
    }

    public function cancel(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/{id}/cancel', $pathParams, $params);
    }

    public function checkout(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/{bookingId}/checkout', $pathParams, $params);
    }

    public function confirm(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/requests/{id}/confirm', $pathParams, $params);
    }

    public function confirmV1BookingsIdConfirm(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/{id}/confirm', $pathParams, $params);
    }

    public function decline(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/requests/{id}/decline', $pathParams, $params);
    }

    public function declineV1BookingsIdDecline(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/{id}/decline', $pathParams, $params);
    }

    public function isAvailable(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/availability', $pathParams, $params);
    }

    public function list(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/bookings', $pathParams, $params);
    }

    public function lock(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/availability/lock', $pathParams, $params);
    }

    public function markAsPaid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/{bookingId}/markAsPaid', $pathParams, $params);
    }

    public function query(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/query', $pathParams, $params);
    }

    public function reschedule(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/{bookingId}/reschedule', $pathParams, $params);
    }

    public function setAttendanceV1BookingsBookingidSetattendance(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/{bookingId}/setAttendance', $pathParams, $params);
    }

    public function unlock(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/availability/unlock', $pathParams, $params);
    }

    public function updateCustomerInfo(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bookings/{bookingId}/updateCustomerInfo', $pathParams, $params);
    }

    public function listSessions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/listSessions', $pathParams, $params);
    }

    public function listSlots(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/listSlots', $pathParams, $params);
    }

    public function querySessions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/calendar/sessions/query', $pathParams, $params);
    }

    public function checkoutOptions(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/checkout/checkoutOptions', $pathParams, $params);
    }

    public function syncStatus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/externalCalendar/status/{resourceId}', $pathParams, $params);
    }

    public function listEvents(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/externalCalendar/events', $pathParams, $params);
    }

    public function listV1ExternalcalendarStatus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/externalCalendar/status', $pathParams, $params);
    }

    public function sendSyncEmail(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/externalCalendar/sync', $pathParams, $params);
    }

    public function unSync(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/externalCalendar/unsync', $pathParams, $params);
    }

    public function connectByCredentials(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendars/connections:connectByCredentials', $pathParams, $params);
    }

    public function connectByCredentialsV2ExternalCalendarConnectByCredentials(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendar/connect-by-credentials', $pathParams, $params);
    }

    public function connectByOAuth(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendars/connections:connectByOAuth', $pathParams, $params);
    }

    public function connectByOAuthV2ExternalCalendarConnectByOauth(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendar/connect-by-oauth', $pathParams, $params);
    }

    public function disconnect(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendars/connections/{connectionId}/disconnect', $pathParams, $params);
    }

    public function disconnectV2ExternalCalendarConnectionsConnectionidDisconnect(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendar/connections/{connectionId}/disconnect', $pathParams, $params);
    }

    public function getConnection(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/external-calendars/connections/{connectionId}', $pathParams, $params);
    }

    public function getConnectionV2ExternalCalendarConnectionsConnectionid(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/external-calendar/connections/{connectionId}', $pathParams, $params);
    }

    public function listCalendars(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/external-calendars/connections/{connectionId}/calendars', $pathParams, $params);
    }

    public function listCalendarsV2ExternalCalendarConnectionsConnectionidCalendars(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/external-calendar/connections/{connectionId}/calendars', $pathParams, $params);
    }

    public function listConnections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/external-calendars/connections', $pathParams, $params);
    }

    public function listConnectionsV2ExternalCalendarListConnections(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendar/list-connections', $pathParams, $params);
    }

    public function listEventsV2ExternalCalendarsEvents(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/external-calendars/events', $pathParams, $params);
    }

    public function listEventsV2ExternalCalendarListEvents(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendar/list-events', $pathParams, $params);
    }

    public function listProviders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/external-calendars/providers', $pathParams, $params);
    }

    public function listProvidersV2ExternalCalendarProviders(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/external-calendar/providers', $pathParams, $params);
    }

    public function updateSyncConfig(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/external-calendars/connections/{connectionId}/sync-config', $pathParams, $params);
    }

    public function updateSyncConfigV2ExternalCalendarConnectionsConnectionidSyncConfig(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/external-calendar/connections/{connectionId}/sync-config', $pathParams, $params);
    }

    public function create(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/resources', $pathParams, $params);
    }

    public function deleteOperation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/resources/{id}', $pathParams, $params);
    }

    public function listV1Resources(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/resources', $pathParams, $params);
    }

    public function queryV1ResourcesQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/resources/query', $pathParams, $params);
    }

    public function update(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/resources/{resource.id}', $pathParams, $params);
    }

    public function updateSchedule(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/resources/{resourceId}/updateSchedule', $pathParams, $params);
    }

    public function cancelV1CalendarSchedulesScheduleidCancel(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/schedules/{scheduleId}/cancel', $pathParams, $params);
    }

    public function createV1CalendarSchedules(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/schedules', $pathParams, $params);
    }

    public function createSession(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/sessions', $pathParams, $params);
    }

    public function deleteSession(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/sessions/{id}/cancel', $pathParams, $params);
    }

    public function getOperation(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/calendar/schedules/{id}', $pathParams, $params);
    }

    public function getSession(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/calendar/sessions/{id}', $pathParams, $params);
    }

    public function listV1CalendarSchedules(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/calendar/schedules', $pathParams, $params);
    }

    public function listSessionsV1CalendarSessionsList(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/sessions/list', $pathParams, $params);
    }

    public function splitInterval(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/intervals/{intervalId}/split', $pathParams, $params);
    }

    public function updateInterval(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/calendar/intervals/{interval.id}', $pathParams, $params);
    }

    public function updateV1CalendarSchedulesScheduleId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/calendar/schedules/{schedule.id}', $pathParams, $params);
    }

    public function updateSession(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/calendar/sessions/{session.id}', $pathParams, $params);
    }

    public function getOperationV1CatalogServicesId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/catalog/services/{id}', $pathParams, $params);
    }

    public function getOperationServicesId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'services/{id}', $pathParams, $params);
    }

    public function listByCategorySlug(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'services/byCategorySlug/{slug}', $pathParams, $params);
    }

    public function listByResourceSlug(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'services/byResourceSlug/{slug}', $pathParams, $params);
    }

    public function listV1CatalogServices(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/catalog/services', $pathParams, $params);
    }

    public function listServices(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'services', $pathParams, $params);
    }

    public function listV1Catalog(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/catalog', $pathParams, $params);
    }

    public function queryV1CatalogServicesQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/catalog/services/query', $pathParams, $params);
    }

    public function queryServices(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'services', $pathParams, $params);
    }

    public function queryV1Catalog(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/catalog', $pathParams, $params);
    }

    public function getService(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/services/{serviceId}', $pathParams, $params);
    }

    public function queryServicesV2ServicesQuery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/services/query', $pathParams, $params);
    }

    public function createV1Forms(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/forms', $pathParams, $params);
    }

    public function createV1Services(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/services', $pathParams, $params);
    }

    public function createV1Categories(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/categories', $pathParams, $params);
    }

    public function deleteOperationV1ServicesIdDelete(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/services/{id}/delete', $pathParams, $params);
    }

    public function deleteOperationV1CategoriesId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/categories/{id}', $pathParams, $params);
    }

    public function getOperationV1FormsId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/forms/{id}', $pathParams, $params);
    }

    public function getOperationV1ServicesId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/services/{id}', $pathParams, $params);
    }

    public function getOperationV1Forms(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/forms', $pathParams, $params);
    }

    public function getOperationV1ServicesPolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/services/policy', $pathParams, $params);
    }

    public function listV1Services(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/services', $pathParams, $params);
    }

    public function listV1Categories(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/categories', $pathParams, $params);
    }

    public function updateV1Forms(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/forms', $pathParams, $params);
    }

    public function updateV1Services(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/services', $pathParams, $params);
    }

    public function updateV1CategoriesCategoryId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/categories/{category.id}', $pathParams, $params);
    }

    public function updateV1ServicesServiceId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/services/{service.id}', $pathParams, $params);
    }

    public function updateV1ServicesPolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/services/policy', $pathParams, $params);
    }

    public function enroll(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/waitingList/{registrationId}', $pathParams, $params);
    }

    public function enrollV1WaitlistEnroll(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/waitlist/enroll', $pathParams, $params);
    }

    public function leave(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/waitlist/leave', $pathParams, $params);
    }

    public function listV1Waitinglist(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/waitingList', $pathParams, $params);
    }

    public function listV1WaitlistList(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/waitlist/list', $pathParams, $params);
    }

    public function register(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/waitingList', $pathParams, $params);
    }

    public function registerV1WaitlistRegister(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/waitlist/register', $pathParams, $params);
    }

    public function queryAvailability(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/availability/query', $pathParams, $params);
    }

    public function calculatePrice(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/pricing/calculate', $pathParams, $params);
    }

    public function previewPrice(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/pricing/preview', $pathParams, $params);
    }

    public function queryExtendedBookings(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'bookings-reader/v2/extended-bookings/query', $pathParams, $params);
    }

    public function bulkCreateBooking(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bulk/bookings/create', $pathParams, $params);
    }

    public function cancelBooking(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bookings/{bookingId}/cancel', $pathParams, $params);
    }

    public function confirmBooking(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bookings/{bookingId}/confirm', $pathParams, $params);
    }

    public function createBooking(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bookings', $pathParams, $params);
    }

    public function declineBooking(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bookings/{bookingId}/decline', $pathParams, $params);
    }

    public function rescheduleBooking(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bookings/{bookingId}/reschedule', $pathParams, $params);
    }

    public function updateNumberOfParticipants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/bookings/{bookingId}/update_number_of_participants', $pathParams, $params);
    }

    public function listSessionsV2CalendarSessionsList(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/calendar/sessions/list', $pathParams, $params);
    }

    public function confirmOrDeclineBooking(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/confirmation/{bookingId}:confirmOrDecline', $pathParams, $params);
    }

    public function cloneServiceOptionsAndVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/serviceOptionsAndVariants/{cloneFromId}/clone', $pathParams, $params);
    }

    public function createServiceOptionsAndVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/serviceOptionsAndVariants', $pathParams, $params);
    }

    public function deleteServiceOptionsAndVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/serviceOptionsAndVariants/{serviceOptionsAndVariantsId}', $pathParams, $params);
    }

    public function getServiceOptionsAndVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/serviceOptionsAndVariants/{serviceOptionsAndVariantsId}', $pathParams, $params);
    }

    public function getServiceOptionsAndVariantsByServiceId(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/serviceOptionsAndVariants/service_id/{serviceId}', $pathParams, $params);
    }

    public function queryServiceOptionsAndVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/serviceOptionsAndVariants/query', $pathParams, $params);
    }

    public function updateServiceOptionsAndVariants(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/serviceOptionsAndVariants/{serviceOptionsAndVariants.id}', $pathParams, $params);
    }

}