<?php

namespace BsbDoctrineMysqlSpacial\Orm;

use InvalidArgumentException;

/**
 * Point object
 */
class Point
{
    /**
     * Latitude value of Point
     *
     * @var float $lat
     */
    protected $lat;

    /**
     * Longtitude value of Point
     *
     * @var float $lng
     */
    protected $lng;

    /**
     * Constructor of Point
     *
     * @param array|string $latitude
     * @param string|null  $longitude
     */
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
     * Set the latitude
     *
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = floatval($lat);
    }

    /**
     * Get the latitude
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set the longtitude
     *
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = floatval($lng);
    }

    /**
     * Get the longtitude
     *
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set point values from a string in the form of 'POINT(x.xxx y.yyy)'
     *
     * @param string $point
     * @throws InvalidArgumentException
     */
    public function fromString($point)
    {
        if (preg_match('/^POINT\((-?\d+\.\d+|-?\d+) (-?\d+\.\d+|-?\d+)\)$/i', $point, $matches)) {
            $this->setLat($matches[1]);
            $this->setLng($matches[2]);
        } else {
            throw new InvalidArgumentException("'POINT(x.xxx y.yyy)' expected as argument");
        }
    }

    /**
     * Return value in string format to be used in DQL
     *
     * @return string in form of POINT(%f %f)
     */
    public function __toString()
    {
        return sprintf('POINT(%f %f)', $this->lat, $this->lng);
    }

    /**
     * Return value in string format to be used in DQL
     *
     * @return string in form of POINT(%f %f)
     */
    public function toString()
    {
        return (string) $this;
    }

    /**
     * Retrieve point values
     *
     * @return array
     */
    public function toArray()
    {
        return array('lat' => $this->lat, 'lng' => $this->lng);
    }
}
