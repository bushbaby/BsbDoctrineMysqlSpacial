<?php

return array(
    'doctrine' => array(
        'configuration' => array(
            'orm_default' => array(
                'types'             => array(
                    'point' => 'BsbDoctrineMysqlSpacial\Dbal\PointType'
                ),
                'numeric_functions' => array(
                    'distance'  => 'BsbDoctrineMysqlSpacial\Orm\Distance',
                    'point_str' => 'BsbDoctrineMysqlSpacial\Orm\PointStr',
                )
            ),
        ),
        'connection'    => array(
            'orm_default' => array(
                'doctrine_type_mappings' => array('Point' => 'point')
            ),
        ),
    )
);
