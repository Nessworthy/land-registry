<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Services;

use Nessworthy\BusinessGateway\System\Service;

/**
 * Class Base
 * Base implementation for API services.
 * Contains some helper methods to auto-generate bits like the WSDL name.
 * @package Nessworthy\BusinessGateway\Services
 */
abstract class Base implements Service
{
    /**
     * @inheritDoc
     */
    public function getWsdlName() : string
    {
        return sprintf(
            '%s%s%s',
            $this->getServiceName(),
            $this->getServiceVersion(),
            $this->getServiceType()
        );
    }

    /**
     * @return string
     */
    abstract protected function getServiceName() : string;

    /**
     * @return string
     */
    protected function getServiceVersion() : string
    {
        return 'V' . str_replace('.', '_', $this->getVersion());
    }

    /**
     * @return string
     */
    abstract protected function getServiceType() : string;
}