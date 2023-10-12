# Chkltlabs Wix Client
PHP implementation of Wix API as an SDK.

## Installation
```
composer require chkltlabs/wix-client
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



