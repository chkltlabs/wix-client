<?php

namespace Chkltlabs\WixClient\Resources;

use Chkltlabs\WixClient\Traits\HasCachedResources;

/**
 * @property Chkltlabs\WixClient\Resources\Blog\Categories $categories
 * @property Chkltlabs\WixClient\Resources\Blog\Drafts $drafts
 * @property Chkltlabs\WixClient\Resources\Blog\Posts $posts
 * @property Chkltlabs\WixClient\Resources\Blog\Tags $tags
 * 
 */
class Blog extends AbstractResource 
{
    use HasCachedResources;
}