# Chkltlabs Wix Client
PHP implementation of Wix API as an SDK.

## Installation
```
composer require chkltlabs/wix-client
```

## Local Testing with Docker
To run tests with pinned versions (without relying on host PHP/composer), use Docker:
```
docker compose up -d --build
docker compose exec wix-client composer install
docker compose exec wix-client ./vendor/bin/phpunit
```

To stop the container:
```
docker compose down
```

## Usage
The use of this package is intentionally extremely basic, methods have no required inputs except where required by the underlying Wix API.
Please see [Wix API Docs](https://dev.wix.com/docs/rest/articles/getting-started/api-keys) for more information.

This package has only been tested using API Keys. Please see the Roadmap below for planned features.

To begin, instantiate the Wix class. Depending on the endpoints you plan to access, you may set one of `account_id/site_id` as a blank string (but not both).
```
use Chkltlabs\WixClient\Wix;

$api = new Wix(api_key: $my_api_key, account_id: $my_account_id, site_id: $my_site_id);
```
Now you have a class-based accessor to various api resources. These resources are treated as properties on the Wix class, or as properties of those properties:
```
//get all posts on the site's blog
$response = $api->blog->posts->list();
```
This structure aims to replicate the [Wix API Docs](https://dev.wix.com/docs/rest/articles/getting-started/api-keys) as closely as possible.

For endpoints that do not yet have dedicated resource methods, use explicit domain resources:
```
//members domain
$response = $api->members->get('v1/members', ['limit' => 100]);
$response = $api->members->listMembersV1Members([], ['limit' => 100]);

//ecom domain
$response = $api->ecom->post('v1/orders/query', ['query' => []]);
$response = $api->ecom->getOrder(['id' => $orderId]);

//site actions domain
$response = $api->site_actions->post('v1/site-actions', ['action' => []]);
$response = $api->site_actions->bulkDeleteSite([], ['siteIds' => [$siteId]]);
```

Regenerate typed domain operation methods from Wix public docs:
```
python3 tools/generate_typed_resources.py --docs-root /tmp/wix-rest-docs
```

### Typed Resource Coverage Snapshot
Generated from public docs currently available in `wix-incubator/wix-rest-docs`:

- `Api`: 0
- `Apps`: 5
- `Automations`: 1
- `B2BSiteManagement`: 0
- `Bookings`: 118
- `Chat`: 1
- `CurrencyConverter`: 2
- `DomainConnect`: 0
- `DomainSearch`: 1
- `Ecom`: 24
- `EmailMarketing`: 20
- `Events`: 63
- `EventsGuests`: 0
- `EventsPolicies`: 5
- `Faq`: 11
- `Forum`: 5
- `LocalDelivery`: 7
- `Locations`: 6
- `LoyaltyAccounts`: 8
- `LoyaltyPrograms`: 2
- `LoyaltyRewards`: 4
- `Marketing`: 2
- `MarketingConsent`: 8
- `Members`: 27
- `Notifications`: 0
- `Oauth`: 0
- `OauthApp`: 5
- `Payments`: 8
- `Pricing`: 0
- `PricingPlans`: 35
- `Progallery`: 9
- `PromoteSeoTxtFileServer`: 2
- `RedirectSession`: 1
- `Resellers`: 8
- `Restaurants`: 36
- `SiteActions`: 0
- `SiteFolders`: 6
- `SiteList`: 1
- `SiteMedia`: 24
- `SiteProperties`: 9
- `SocialGroups`: 24
- `Stores`: 82
- `V1`: 1
- `WixData`: 44

### Explicit Resource Status
All top-level domain resources in `src/Resources` are now explicit custom classes extending `AbstractResource` (no remaining top-level `Domain` subclasses).


## Roadmap
### Implemented
 - Blog
 - - Categories
   - Drafts
   - Posts
   - Tags
 - Business
 - - Location
   - Properties
 - Comments
 - Contacts
 - - Bulk
   - ExtendedFields
   - Facets
   - Labels
 - Coupons
 - - Bulk
 - Inbox
 - - Conversations
   - Messages

### Upcoming
 - Marketing
 - Media
 - Members
 - Site Content
 - Automations
 - Bookings
 - Chat
 - Data
 - Events
 - Forms
 - Forum
 - Groups
 - Notifications
 - Class method -> Route Documentation

### Not Planned
 - Cashier
 - eCommerce
 - Loyalty Program
 - Payments
 - Pricing Plans
 - Restaurants
 - Stores
 - Payment Provider SPI
 - Account Management

## Contributing
The Package uses a unified request system built on AbstractResource, so contributing new endpoints is as simple as creating a new class in `src/Resources`, and creating further subclasses is as simple as creating a new directory that matches your class name, and adding the `HasCachedResources` trait to your parent class. Make sure each extends `AbstractResource`.

Example from Blog.php:
```
//src/Resources/Blog.php
<?php

namespace Chkltlabs\WixClient\Resources;

use Chkltlabs\WixClient\Traits\HasCachedResources;

class Blog extends AbstractResource
{
    use HasCachedResources;
}

//src/Resources/Blog/Posts.php
<?php

namespace Chkltlabs\WixClient\Resources\Blog;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Posts extends AbstractResource
{
    public function list(array $params = []): object
    {
      //...
    }
  //...
}
```

## Credit && Thanks
This package is heavily inspired and influenced by the excellent (TomorrowIdeas/Plaid)[https://github.com/TomorrowIdeas/plaid-sdk-php] SDK implementation. Go show them some love!



