<?php
namespace BsbDoctrineMysqlSpacial\Dbal;

use BsbDoctrineMysqlSpacial\Orm\Point;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Type that maps spatial POINT objects.
 *
 * @since 2.0
 */
class PointType extends Type
{

    const POINT = 'point';

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::POINT;
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'POINT';
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        // Null fields come in as empty strings
        if ($value == '') {
            return null;
        }

        $data = unpack('x/x/x/x/corder/Ltype/dlat/dlon', $value);

        return new Point($data['lat'], $data['lon']);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($point, AbstractPlatform $platform)
    {
        if (!$point) {
            return;
        }

        if (is_string($point)) {
            $point = new Point($point);
        }

        return pack('xxxxcLdd', '0', 1, $point->getLat(), $point->getLng());
    }
}
