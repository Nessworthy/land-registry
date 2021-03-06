<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;
use Isg\BusinessGateway\Parts\Content\Q3Text;
use Isg\BusinessGateway\Parts\Content\ReferenceText;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1CustomerReference
 * Holds a unique identifying reference for the customer.
 *
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property ReferenceText Reference A unique reference.
 * @property Q3Text|null AllocatedBy Not officially used.
 * @property Q3Text|null Description Not officially used.
 */
class Q1CustomerReference extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Reference', 1, 1);
        $this->defineChild('AllocatedBy', 0, 1);
        $this->defineChild('Description', 0, 1);
    }

    /**
     * Q1CustomerReference constructor.
     * @param ReferenceText $reference
     */
    public function __construct(ReferenceText $reference)
    {
        parent::__construct();

        $this->addChild('Reference', $reference);
    }

    /**
     * AllocatedBy by isn't officially used.
     * @param Q3Text $allocatedBy
     */
    public function setAllocatedBy(Q3Text $allocatedBy)
    {
        $this->addChild('AllocatedBy', $allocatedBy);
    }

    /**
     * Description by isn't officially used.
     * @param Q3Text $description
     */
    public function setDescription(Q3Text $description)
    {
        $this->addChild('Description', $description);
    }
}
