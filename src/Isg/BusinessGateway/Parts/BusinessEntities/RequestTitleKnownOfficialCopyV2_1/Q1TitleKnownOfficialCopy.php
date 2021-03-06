<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1;

use Isg\BusinessGateway\Parts\BusinessEntities\Q1CertificateInFormCI;
use Isg\BusinessGateway\Parts\Content\Indicator;
use Isg\BusinessGateway\Parts\Content\OfficialCopyCode;
use Isg\BusinessGateway\Parts\Content\PropertyDescriptionText;
use Isg\BusinessGateway\Parts\Content\RequestedOfficialCopyCode;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1TitleKnownOfficialCopy extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('RequestedOfficialCopyCode', 0, 1);
        $this->defineChild('PropertyDescription', 1, 1);
        $this->defineChild('OfficialCopyTypeCode', 1, 1);
        $this->defineChild('ContinueIfTitleIsClosedAndContinuedIndicator', 1, 1);
        $this->defineChild('NotifyIfPendingFirstRegistrationIndicator', 1, 1);
        $this->defineChild('NotifyIfPendingApplicationIndicator', 1, 1);
        $this->defineChild('SendBackDatedIndicator', 1, 1);
        $this->defineChild('ContinueIfActualFeeExceedsExpectedFeeIndicator', 1, 1);
        $this->defineChild('CertificateInFormCI', 0, 1);
    }

    public function __construct(
        PropertyDescriptionText $propertyDescription,
        OfficialCopyCode $officialCopyTypeCode,
        Indicator $continueIfTitleIsClosedAndContinuedIndicator,
        Indicator $notifyIfPendingFirstRegistrationIndicator,
        Indicator $notifyIfPendingApplicationIndicator,
        Indicator $sendBackDatedIndicator,
        Indicator $continueIfActualFeeExceedsExpectedFeeIndicator
    ) {
        parent::__construct();
        $this->addChild('PropertyDescription', $propertyDescription);
        $this->addChild('OfficialCopyTypeCode', $officialCopyTypeCode);
        $this->addChild('ContinueIfTitleIsClosedAndContinuedIndicator', $continueIfTitleIsClosedAndContinuedIndicator);
        $this->addChild('NotifyIfPendingFirstRegistrationIndicator', $notifyIfPendingFirstRegistrationIndicator);
        $this->addChild('NotifyIfPendingApplicationIndicator', $notifyIfPendingApplicationIndicator);
        $this->addChild('SendBackDatedIndicator', $sendBackDatedIndicator);
        $this->addChild(
            'ContinueIfActualFeeExceedsExpectedFeeIndicator',
            $continueIfActualFeeExceedsExpectedFeeIndicator
        );
    }

    public function setRequestedOfficialCopyCode(RequestedOfficialCopyCode $requestedOfficialCopyCode)
    {
        $this->addChild('RequestedOfficialCopyCode', $requestedOfficialCopyCode);
    }

    public function setCertificateInFormCI(Q1CertificateInFormCI $certificateInFormCI)
    {
        $this->addChild('CertificateInFormCI', $certificateInFormCI);
    }
}
