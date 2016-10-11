<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1;

use Nessworthy\BusinessGateway\Parts\Content\Q2Text;
use Nessworthy\BusinessGateway\Parts\Content\TenureCode;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1SubjectProperty extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('TitleNumber', 1, 1);
        $this->defineChild('TenureTypeCode', 0, 1);
    }

    /**
     * Q1SubjectProperty constructor.
     * @param Q2Text $titleNumber
     */
    public function __construct(Q2Text $titleNumber)
    {
        parent::__construct();
        $this->addChild('TitleNumber', $titleNumber);
    }

    /**
     * @param TenureCode $tenureTypeCode
     */
    public function setTenureCodeType(TenureCode $tenureTypeCode)
    {
        $this->addChild('TenureTypeCode', $tenureTypeCode);
    }

}