<?php

namespace BsbDoctrineMysqlSpacial\Orm;

/**
 * Point object for spatial mapping
 */
class Point
{
    /**
     * @var float $lat
     */
    protected $lat;
    /**
     * @var float $lng
     */
    protected $lng;

    public function __construct($latitude, $longitude = null)
    {
        if (is_array($latitude)) {
            $this->lat = array_shift($latitude);
            $this->lng = array_shift($latitude);
        } else {
            if ($longitude !== null) {
                $this->lat = $latitude;
                $this->lng = $longitude;
            } else {
                $this->fromString($latitude);
            }
        }
    }

    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = floatval($lat);
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = floatval($lng);
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    //Output from this is used with POINT_STR in DQL so must be in specific format
    public function __toString()
    {
        return $this->toString();
    }

    public function toString()
    {
        return sprintf('POINT(%f %f)', $this->lat, $this->lng);
    }

    public function fromString($point)
    {
        if (preg_match('/^POINT\((-?\d+\.\d+|-?\d+) (-?\d+\.\d+|-?\d+)\)$/i', $point, $matches)) {
            $this->setLat($matches[1]);
            $this->setLng($matches[2]);
        } else {
            throw new \InvalidArgumentException("'POINT(x.xxx y.yyy)' expected as argument");
        }
    }

    public function toArray()
    {
        return array('lat'=>$this->lat, 'lng'=>$this->lng);
    }
}
