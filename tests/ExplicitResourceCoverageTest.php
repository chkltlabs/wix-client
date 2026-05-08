<?php

namespace Tests;

use Chkltlabs\WixClient\Tests\TestCase;

class ExplicitResourceCoverageTest extends TestCase
{
    public function test_all_top_level_resources_are_explicit_abstract_resource_subclasses(): void
    {
        $resourceDir = __DIR__ . '/../src/Resources';
        $resourceFiles = glob($resourceDir . '/*.php') ?: [];

        foreach ($resourceFiles as $resourceFile) {
            $className = basename($resourceFile, '.php');
            if ($className === 'AbstractResource') {
                continue;
            }

            $fqcn = 'Chkltlabs\\WixClient\\Resources\\' . $className;
            if (!class_exists($fqcn)) {
                require_once $resourceFile;
            }

            $reflection = new \ReflectionClass($fqcn);
            self::assertTrue(
                $reflection->isSubclassOf('Chkltlabs\\WixClient\\Resources\\AbstractResource'),
                sprintf('%s should extend AbstractResource', $fqcn)
            );
            self::assertFalse(
                $reflection->isSubclassOf('Chkltlabs\\WixClient\\Resources\\Domain'),
                sprintf('%s should not extend Domain', $fqcn)
            );
        }
    }
}
