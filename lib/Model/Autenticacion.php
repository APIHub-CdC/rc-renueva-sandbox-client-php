<?php

namespace RcRenueva\Simulacion\Client\Model;

use \ArrayAccess;
use \RcRenueva\Simulacion\Client\ObjectSerializer;

class Autenticacion implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $RCCPMModelName = 'Autenticacion';
    
    protected static $RCCPMTypes = [
        'numero_autenticacion' => 'string',
        'numero_solicitud' => 'string',
        'estatus_autenticacion' => 'bool'
    ];
    
    protected static $RCCPMFormats = [
        'numero_autenticacion' => null,
        'numero_solicitud' => null,
        'estatus_autenticacion' => null
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
        'numero_autenticacion' => 'numeroAutenticacion',
        'numero_solicitud' => 'numeroSolicitud',
        'estatus_autenticacion' => 'estatusAutenticacion'
    ];
    
    protected static $setters = [
        'numero_autenticacion' => 'setNumeroAutenticacion',
        'numero_solicitud' => 'setNumeroSolicitud',
        'estatus_autenticacion' => 'setEstatusAutenticacion'
    ];
    
    protected static $getters = [
        'numero_autenticacion' => 'getNumeroAutenticacion',
        'numero_solicitud' => 'getNumeroSolicitud',
        'estatus_autenticacion' => 'getEstatusAutenticacion'
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
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['numero_autenticacion'] = isset($data['numero_autenticacion']) ? $data['numero_autenticacion'] : null;
        $this->container['numero_solicitud'] = isset($data['numero_solicitud']) ? $data['numero_solicitud'] : null;
        $this->container['estatus_autenticacion'] = isset($data['estatus_autenticacion']) ? $data['estatus_autenticacion'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if (!is_null($this->container['numero_autenticacion']) && (mb_strlen($this->container['numero_autenticacion']) > 10)) {
            $invalidProperties[] = "invalid value for 'numero_autenticacion', the character length must be smaller than or equal to 10.";
        }
        if (!is_null($this->container['numero_solicitud']) && (mb_strlen($this->container['numero_solicitud']) > 25)) {
            $invalidProperties[] = "invalid value for 'numero_solicitud', the character length must be smaller than or equal to 25.";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getNumeroAutenticacion()
    {
        return $this->container['numero_autenticacion'];
    }
    
    public function setNumeroAutenticacion($numero_autenticacion)
    {
        if (!is_null($numero_autenticacion) && (mb_strlen($numero_autenticacion) > 10)) {
            throw new \InvalidArgumentException('invalid length for $numero_autenticacion when calling Autenticacion., must be smaller than or equal to 10.');
        }
        $this->container['numero_autenticacion'] = $numero_autenticacion;
        return $this;
    }
    
    public function getNumeroSolicitud()
    {
        return $this->container['numero_solicitud'];
    }
    
    public function setNumeroSolicitud($numero_solicitud)
    {
        if (!is_null($numero_solicitud) && (mb_strlen($numero_solicitud) > 25)) {
            throw new \InvalidArgumentException('invalid length for $numero_solicitud when calling Autenticacion., must be smaller than or equal to 25.');
        }
        $this->container['numero_solicitud'] = $numero_solicitud;
        return $this;
    }
    
    public function getEstatusAutenticacion()
    {
        return $this->container['estatus_autenticacion'];
    }
    
    public function setEstatusAutenticacion($estatus_autenticacion)
    {
        $this->container['estatus_autenticacion'] = $estatus_autenticacion;
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
