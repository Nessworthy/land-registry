<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Primitive;

use Isg\BusinessGateway\Parts\Primitive\DateType;

class DateTest extends \PHPUnit_Framework_TestCase
{
    public function testDateTimeTypeAcceptsValidDate()
    {
        $dateObject = new DateType('2010-12-31');
        $this->assertSame('2010-12-31', $dateObject->getValue());
    }

    public function testDateTimeTypeDoesNotAcceptInvalidDate()
    {
        $this->expectException(\InvalidArgumentException::class);
        new DateType('Foo Bar');
    }
}