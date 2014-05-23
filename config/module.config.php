<?php

$configuration = array(
    'types' => array(
        'point'=> 'BsbDoctrineMysqlSpacial\Dbal\PointType'
    ),
    'numeric_functions' => array(
        'distance' => 'BsbDoctrineMysqlSpacial\Orm\Distance',
        'point_str' => 'BsbDoctrineMysqlSpacial\Orm\PointStr',
    )
);

$connection = array(
    'doctrine_type_mappings' => array('Point' => 'point')
);

return array(
    'doctrine' => array(
        'configuration' => array(
            'orm_default' => $configuration,
        ),
        'connection' => array(
            'orm_default' => $connection,
        ),
    )
);
