<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\Amount;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1ExpectedPrice
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property null|Amount GrossPriceAmount
 * @property null|Amount NetPriceAmount
 * @property null|Amount VATAmount
 */
class Q1ExpectedPrice extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('GrossPriceAmount', 0, 1);
        $this->defineChild('NetPriceAmount', 0, 1);
        $this->defineChild('VATAmount', 0, 1);
    }

    /**
     * @param Amount $grossPriceAmount
     */
    public function setGrossPriceAmount(Amount $grossPriceAmount)
    {
        $this->addChild('GrossPriceAmount', $grossPriceAmount);
    }

    /**
     * @param Amount $netPriceAmount
     */
    public function setNetPriceAmount(Amount $netPriceAmount)
    {
        $this->addChild('NetPriceAmount', $netPriceAmount);
    }

    /**
     * @param Amount $vatAmount
     */
    public function setVATAmount(Amount $vatAmount)
    {
        $this->addChild('VATAmount', $vatAmount);
    }
}
