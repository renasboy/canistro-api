<?php
namespace api\model;

class product extends \api\simple_model {

    // this is the fields/types for the model
    protected $_fields              = [
        'id'                        => 'number',
        'created'                   => 'datetime',
        'modified'                  => 'datetime',
        'store_id'                  => 'number',
        'name'                      => 'text',
        'description'               => 'text',
        'img'                       => 'text',
        'price'                     => 'price',
        'active'                    => 'flag',
    ];

    // these are the relations for the model
    protected $_relations           = [
        'many_one'                  => [
            'store'
        ],
        'one_many'                  => [],
        'many_many'                 => []
    ];

    protected $_dependencies        = [
        'store'                     => null,
        'product'                   => null
    ];

    protected $_validate            = [
        'save'                      => [
            'relation'              => [
                'store'
            ],
            'field'                 => [
                'name',
                'img',
                'price'
            ]
        ]
    ];
}
