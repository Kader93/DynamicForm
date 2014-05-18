<?php

namespace DynamicFormTest;

use DynamicFormTest\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testSample()
    {
        $this->assertInstanceOf('Zend\Di\LocatorInterface', $this->getLocator());
    }
}
