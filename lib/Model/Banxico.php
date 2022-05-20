<?php

namespace RcRenueva\Simulacion\Client\Model;

use \ArrayAccess;
use \RcRenueva\Simulacion\Client\ObjectSerializer;

class Banxico implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $RCCPMModelName = 'Banxico';
    
    protected static $RCCPMTypes = [
        'numero_firma' => 'string',
        'numero_solicitud' => 'string',
        'tarjeta_de_credito' => 'string',
        'numero_cuenta' => 'string',
        'credito_hipotecario' => 'string',
        'credito_automotriz' => 'string'
    ];
    
    protected static $RCCPMFormats = [
        'numero_firma' => null,
        'numero_solicitud' => null,
        'tarjeta_de_credito' => null,
        'numero_cuenta' => null,
        'credito_hipotecario' => null,
        'credito_automotriz' => null
    ];
    
    public static function RCCPMTypes()
    {
        return self::$RCCPMTypes;
    }
    
    public static function RCCPMFormats()
    {
        return self::$RCCPMFormats;
    }
    
    protected static $attributeMap = [
        'numero_firma' => 'numeroFirma',
        'numero_solicitud' => 'numeroSolicitud',
        'tarjeta_de_credito' => 'tarjetaDeCredito',
        'numero_cuenta' => 'numeroCuenta',
        'credito_hipotecario' => 'creditoHipotecario',
        'credito_automotriz' => 'creditoAutomotriz'
    ];
    
    protected static $setters = [
        'numero_firma' => 'setNumeroFirma',
        'numero_solicitud' => 'setNumeroSolicitud',
        'tarjeta_de_credito' => 'setTarjetaDeCredito',
        'numero_cuenta' => 'setNumeroCuenta',
        'credito_hipotecario' => 'setCreditoHipotecario',
        'credito_automotriz' => 'setCreditoAutomotriz'
    ];
    
    protected static $getters = [
        'numero_firma' => 'getNumeroFirma',
        'numero_solicitud' => 'getNumeroSolicitud',
        'tarjeta_de_credito' => 'getTarjetaDeCredito',
        'numero_cuenta' => 'getNumeroCuenta',
        'credito_hipotecario' => 'getCreditoHipotecario',
        'credito_automotriz' => 'getCreditoAutomotriz'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$RCCPMModelName;
    }
    const TARJETA_DE_CREDITO_V = 'V';
    const TARJETA_DE_CREDITO_F = 'F';
    const CREDITO_HIPOTECARIO_V = 'V';
    const CREDITO_HIPOTECARIO_F = 'F';
    const CREDITO_AUTOMOTRIZ_V = 'V';
    const CREDITO_AUTOMOTRIZ_F = 'F';
    
    
    
    public function getTarjetaDeCreditoAllowableValues()
    {
        return [
            self::TARJETA_DE_CREDITO_V,
            self::TARJETA_DE_CREDITO_F,
        ];
    }
    
    
    public function getCreditoHipotecarioAllowableValues()
    {
        return [
            self::CREDITO_HIPOTECARIO_V,
            self::CREDITO_HIPOTECARIO_F,
        ];
    }
    
    
    public function getCreditoAutomotrizAllowableValues()
    {
        return [
            self::CREDITO_AUTOMOTRIZ_V,
            self::CREDITO_AUTOMOTRIZ_F,
        ];
    }
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['numero_firma'] = isset($data['numero_firma']) ? $data['numero_firma'] : null;
        $this->container['numero_solicitud'] = isset($data['numero_solicitud']) ? $data['numero_solicitud'] : null;
        $this->container['tarjeta_de_credito'] = isset($data['tarjeta_de_credito']) ? $data['tarjeta_de_credito'] : null;
        $this->container['numero_cuenta'] = isset($data['numero_cuenta']) ? $data['numero_cuenta'] : null;
        $this->container['credito_hipotecario'] = isset($data['credito_hipotecario']) ? $data['credito_hipotecario'] : null;
        $this->container['credito_automotriz'] = isset($data['credito_automotriz']) ? $data['credito_automotriz'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if (!is_null($this->container['numero_firma']) && (mb_strlen($this->container['numero_firma']) > 25)) {
            $invalidProperties[] = "invalid value for 'numero_firma', the character length must be smaller than or equal to 25.";
        }
        if (!is_null($this->container['numero_solicitud']) && (mb_strlen($this->container['numero_solicitud']) > 25)) {
            $invalidProperties[] = "invalid value for 'numero_solicitud', the character length must be smaller than or equal to 25.";
        }
        $allowedValues = $this->getTarjetaDeCreditoAllowableValues();
        if (!is_null($this->container['tarjeta_de_credito']) && !in_array($this->container['tarjeta_de_credito'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'tarjeta_de_credito', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }
        if (!is_null($this->container['tarjeta_de_credito']) && (mb_strlen($this->container['tarjeta_de_credito']) > 1)) {
            $invalidProperties[] = "invalid value for 'tarjeta_de_credito', the character length must be smaller than or equal to 1.";
        }
        if (!is_null($this->container['numero_cuenta']) && (mb_strlen($this->container['numero_cuenta']) > 4)) {
            $invalidProperties[] = "invalid value for 'numero_cuenta', the character length must be smaller than or equal to 4.";
        }
        if (!is_null($this->container['numero_cuenta']) && (mb_strlen($this->container['numero_cuenta']) < 4)) {
            $invalidProperties[] = "invalid value for 'numero_cuenta', the character length must be bigger than or equal to 4.";
        }
        $allowedValues = $this->getCreditoHipotecarioAllowableValues();
        if (!is_null($this->container['credito_hipotecario']) && !in_array($this->container['credito_hipotecario'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'credito_hipotecario', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }
        if (!is_null($this->container['credito_hipotecario']) && (mb_strlen($this->container['credito_hipotecario']) > 1)) {
            $invalidProperties[] = "invalid value for 'credito_hipotecario', the character length must be smaller than or equal to 1.";
        }
        $allowedValues = $this->getCreditoAutomotrizAllowableValues();
        if (!is_null($this->container['credito_automotriz']) && !in_array($this->container['credito_automotriz'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'credito_automotriz', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }
        if (!is_null($this->container['credito_automotriz']) && (mb_strlen($this->container['credito_automotriz']) > 1)) {
            $invalidProperties[] = "invalid value for 'credito_automotriz', the character length must be smaller than or equal to 1.";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getNumeroFirma()
    {
        return $this->container['numero_firma'];
    }
    
    public function setNumeroFirma($numero_firma)
    {
        if (!is_null($numero_firma) && (mb_strlen($numero_firma) > 25)) {
            throw new \InvalidArgumentException('invalid length for $numero_firma when calling Banxico., must be smaller than or equal to 25.');
        }
        $this->container['numero_firma'] = $numero_firma;
        return $this;
    }
    
    public function getNumeroSolicitud()
    {
        return $this->container['numero_solicitud'];
    }
    
    public function setNumeroSolicitud($numero_solicitud)
    {
        if (!is_null($numero_solicitud) && (mb_strlen($numero_solicitud) > 25)) {
            throw new \InvalidArgumentException('invalid length for $numero_solicitud when calling Banxico., must be smaller than or equal to 25.');
        }
        $this->container['numero_solicitud'] = $numero_solicitud;
        return $this;
    }
    
    public function getTarjetaDeCredito()
    {
        return $this->container['tarjeta_de_credito'];
    }
    
    public function setTarjetaDeCredito($tarjeta_de_credito)
    {
        $allowedValues = $this->getTarjetaDeCreditoAllowableValues();
        if (!is_null($tarjeta_de_credito) && !in_array($tarjeta_de_credito, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'tarjeta_de_credito', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        if (!is_null($tarjeta_de_credito) && (mb_strlen($tarjeta_de_credito) > 1)) {
            throw new \InvalidArgumentException('invalid length for $tarjeta_de_credito when calling Banxico., must be smaller than or equal to 1.');
        }
        $this->container['tarjeta_de_credito'] = $tarjeta_de_credito;
        return $this;
    }
    
    public function getNumeroCuenta()
    {
        return $this->container['numero_cuenta'];
    }
    
    public function setNumeroCuenta($numero_cuenta)
    {
        if (!is_null($numero_cuenta) && (mb_strlen($numero_cuenta) > 4)) {
            throw new \InvalidArgumentException('invalid length for $numero_cuenta when calling Banxico., must be smaller than or equal to 4.');
        }
        if (!is_null($numero_cuenta) && (mb_strlen($numero_cuenta) < 4)) {
            throw new \InvalidArgumentException('invalid length for $numero_cuenta when calling Banxico., must be bigger than or equal to 4.');
        }
        $this->container['numero_cuenta'] = $numero_cuenta;
        return $this;
    }
    
    public function getCreditoHipotecario()
    {
        return $this->container['credito_hipotecario'];
    }
    
    public function setCreditoHipotecario($credito_hipotecario)
    {
        $allowedValues = $this->getCreditoHipotecarioAllowableValues();
        if (!is_null($credito_hipotecario) && !in_array($credito_hipotecario, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'credito_hipotecario', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        if (!is_null($credito_hipotecario) && (mb_strlen($credito_hipotecario) > 1)) {
            throw new \InvalidArgumentException('invalid length for $credito_hipotecario when calling Banxico., must be smaller than or equal to 1.');
        }
        $this->container['credito_hipotecario'] = $credito_hipotecario;
        return $this;
    }
    
    public function getCreditoAutomotriz()
    {
        return $this->container['credito_automotriz'];
    }
    
    public function setCreditoAutomotriz($credito_automotriz)
    {
        $allowedValues = $this->getCreditoAutomotrizAllowableValues();
        if (!is_null($credito_automotriz) && !in_array($credito_automotriz, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'credito_automotriz', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        if (!is_null($credito_automotriz) && (mb_strlen($credito_automotriz) > 1)) {
            throw new \InvalidArgumentException('invalid length for $credito_automotriz when calling Banxico., must be smaller than or equal to 1.');
        }
        $this->container['credito_automotriz'] = $credito_automotriz;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
