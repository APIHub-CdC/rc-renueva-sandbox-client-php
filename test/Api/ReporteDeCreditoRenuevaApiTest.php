<?php

namespace RcRenueva\Simulacion\Client;

use \RcRenueva\Simulacion\Client\Configuration;
use \RcRenueva\Simulacion\Client\ApiException;
use \RcRenueva\Simulacion\Client\ObjectSerializer;

use \RcRenueva\Simulacion\Client\Model\PersonaPeticion;
use \RcRenueva\Simulacion\Client\Model\DomicilioPeticion;

use \RcRenueva\Simulacion\Client\Api\ReporteDeCrditoRenuevaApi as Instance;

use \GuzzleHttp\Client;

class ReporteDeCreditoRenuevaApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $config = new Configuration();
        $config->setHost('the_url');
        $this->x_api_key = "your_api_key";
        $client = new Client();
        $this->apiInstance = new Instance($client,$config);
    }
    
    public function testGetReporte()
    {
        try{
            $request = new PersonaPeticion();
            $domicilio = new DomicilioPeticion();

            $request->setApellidoPaterno("SESENTAYDOS");
            $request->setApellidoMaterno("PRUEBA");
            $request->setPrimerNombre("JUAN");
            $request->setFechaNacimiento("1965-08-09");
            $request->setRfc("SEPJ650809JG1");
            $request->setNacionalidad("MX");
            $request->setCuenta("CC7588788-A876");

            $domicilio->setDireccion("PASADISO ENCONTRADO 58");
            $domicilio->setColoniaPoblacion("MONTEVIDEO");
            $domicilio->setDelegacionMunicipio("GUSTAVO A MADERO");
            $domicilio->setCiudad("CIUDAD DE MÉXICO");
            $domicilio->setEstado("CDMX");
            $domicilio->setCp("07730");

            $request->setDomicilio($domicilio);

            $response = $this->apiInstance->getReporte($this->x_api_key, $request);
            $this->assertNotNull($response );
            print_r($response);

        }
        catch(Exception $e){
            echo 'Exception when calling ApiTest->testGetReporteRenueva: ', $e->getMessage(), PHP_EOL;
        }
    }
}
