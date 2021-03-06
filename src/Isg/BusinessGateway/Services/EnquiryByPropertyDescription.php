<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Services;

/**
 * Class EnquiryByPropertyDescription
 * Service which represents a Search by Property Description request.
 * @package Isg\BusinessGateway\Services
 */
class EnquiryByPropertyDescription extends BaseWebService
{
    /**
     * @inheritDoc
     */
    public function getServiceName() : string
    {
        return 'EnquiryByPropertyDescription';
    }

    /**
     * @inheritDoc
     */
    public function getRequestName() : string
    {
        return 'searchProperties';
    }

    /**
     * @inheritDoc
     */
    public function getVersion() : string
    {
        return '2.0';
    }

    /**
     * @inheritDoc
     */
    public function getNamespace() : string
    {
        return 'http://www.oscre.org/ns/eReg-Final/2011/RequestSearchByPropertyDescriptionV2_0';
    }
}
