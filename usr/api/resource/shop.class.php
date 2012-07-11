<?php
namespace api\resource;

class shop extends \api\simple_resource {

    // this is the data structure for the resource
    protected $_data                	= [
        'id'                          	=> null,
        'store'                         => null,
        'created'                   	=> null,
        'modified'                   	=> null,
        'status'                       	=> null,
        'name'                       	=> null,
        'email'                       	=> null,
        'address'                       => null,
        'comments'                      => null,
        'total'                         => null,
        'products'                      => [
            'id'                        => null,
            'created'                   => null,
            'modified'                  => null,
            'store'                     => null,
            'name'                      => null,
            'description'               => null,
            'img'                       => null,
            'price'                     => null,
            'quantity'                  => null
        ]
    ];

    // these are default request options
    protected $_default_options     	= [
        'get'                       	=> [
            'with'                  	=> [
                'products'              => false
            ],
            'filter'                	=> [
                'id'                	=> [],
                'created_before'        => [],
                'created_after'         => [],
                'store'                 => [],
                'store_id'              => [],
                'search'            	=> [],
                'offset_start'      	=> 0,
                'offset_end'        	=> 100
            ]
        ],
        'post'                      	=> [
            'fields'                	=> [
                'id'                	=> null,
                'created'               => true,
                'store'                 => null,
                'store_id'              => null,
                'status'               	=> null,
                'name'               	=> null,
                'email'               	=> null,
                'address'               => null,
                'comments'              => null,
                'total'                 => null
            ],
            'relations'             	=> [
                'product_id'            => [
                    'relations'         => [],
                    'fields'            => [
                        'shop_id'       => null,
                        'product_id'    => null,
                        'quantity'      => null,
                        'price'         => null
                    ]
                ]
            ]
        ],
        'delete'                    	=> [
            'fields'                	=> [
                'id'                	=> null
            ]
        ]
    ];
}
