<?php
namespace Nessworthy\BusinessGateway;

use Nessworthy\BusinessGateway\System\Cert;
use Nessworthy\BusinessGateway\System\Credentials;
use Nessworthy\BusinessGateway\System\Environment;
use Nessworthy\BusinessGateway\System\Service;

class Foo
{
    public $_;
    public $Type = '';

    public function __construct($var, $type) {
        $this->_ = $var;
        $this->Type = $type;
    }
}

class Client extends \SoapClient
{
    private $environment;
    private $service;
    private $credentials;
    private $cert;
    protected $locale = 'en';

    public function __construct(Cert $cert, Credentials $credentials, Environment $environment, Service $service, $options = array())
    {
        $this->environment = $environment;
        $this->service = $service;
        $this->credentials = $credentials;
        $this->cert = $cert;

        $options['local_cert'] = $cert->getCertLocation();
        $passPhrase = $cert->getCertPassPhrase();
        if ($passPhrase) {
            $options['passphrase'] = $passPhrase;
        }
        $options['login'] = $credentials->getUsername();
        $options['password'] = $credentials->getPassword();
        $options['soap_version'] = SOAP_1_1;
        $options['cache_wsdl'] = WSDL_CACHE_NONE;

        $options['location'] = $environment->getUri() . '/' . $service->getWsdlName();

        //return parent::__construct($environment->getUri() . '/' . $service->getWsdlName(), $options);
        return parent::__construct(__DIR__ . '/assets/schemas/EnquiryByPropertyDescriptionV2_0WebService/EnquiryByPropertyDescriptionV2_0WebService.wsdl', $options);

    }

    public function buildHeaders()
    {
        $wsseNamespace = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';
        $i18nNamespace = 'http://www.w3.org/2005/09/ws-i18n';
        $passwordType = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText';

        // I HATE SOAPVAR, SOAPCLIENT, AND SOAPHEADER.

        // WSSE Security
        $xml = sprintf('<wsse:Security xmlns:wsse="%s">', $wsseNamespace);
        $xml .= '<wsse:UsernameToken>';
        $xml .= sprintf('<wsse:Username>%s</wsse:Username>', $this->credentials->getUsername());
        $xml .= sprintf('<wsse:Password type="%s">%s</wsse:Password>', $passwordType, $this->credentials->getPassword());
        $xml .= '</wsse:UsernameToken>';
        $xml .= '</wsse:Security>';

        $wsse = new \SoapVar($xml, XSD_ANYXML);

        // i18n Locale. Override this class with the protected $this->locale to change the locale.
        // Currently, only 'en' is supported by the gateway.
        $xml = sprintf('<i18n:international xmlns:i18n="%s">', $i18nNamespace);
        $xml .= sprintf('<i18n:locale>%s</i18n:locale>', $this->locale);
        $xml .= '</i18n:international>';

        $i18n = new \SoapVar($xml, XSD_ANYXML);

        return [
            new \SoapHeader($this->service->getNamespace(), 'unused', $wsse),
            new \SoapHeader($this->service->getNamespace(), 'unused', $i18n)
        ];

    }

    public function sendRequest($body)
    {
        return $this->__soapCall(
            $this->service->getRequestName(),
            [['arg0' => $body]],
            null,
            $this->buildHeaders()
        );
    }

    public function __doRequest($request, $location, $action, $version, $one_way = 0)
    {
/*        $doc = new \DOMDocument('1.0');
        $doc->loadXML($request);
        $doc->formatOutput = true;
        echo $doc->saveXML();
        die();*/
        return parent::__doRequest($request, $location, $action, $version, $one_way); // TODO: Change the autogenerated stub
    }
}