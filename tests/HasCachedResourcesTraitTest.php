<?php

namespace Tests;

use Chkltlabs\WixClient\Resources\Blog;
use Chkltlabs\WixClient\Resources\Blog\Tags;
use Chkltlabs\WixClient\Tests\TestCase;

class HasCachedResourcesTraitTest extends TestCase
{
    public function test_top_level_resources_instantiate()
    {
        $wix = $this->getWixClient();

        self::assertInstanceOf(Blog::class, $wix->blog);
    }

    public function test_second_level_resources_instantiate()
    {
        $wix = $this->getWixClient();

        self::assertInstanceOf(Tags::class, $wix->blog->tags);
    }
}