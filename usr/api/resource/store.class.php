<?php
namespace api\resource;

class store extends \api\simple_resource {

    // this is the data structure for the resource
    protected $_data                	= [
        'id'                          	=> null,
        'created'                   	=> null,
        'modified'                   	=> null,
        'name'                       	=> null,
        'email'                       	=> null,
        'about'                       	=> null,
        'info'                       	=> null,
        'contact'                       => null,
        'currency'                      => null,
        'template'                      => null,
        'domain'                       	=> null,
        'logo'                       	=> null,
        'cover'                       	=> null,
        'total_products'                => null,
        'products'                      => [
            'id'                        => null,
            'created'                   => null,
            'modified'                  => null,
            'name'                      => null,
            'description'               => null,
            'img'                       => null,
            'price'                     => null
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
                'search'            	=> [],
                'active'            	=> [1],
                'offset_start'      	=> 0,
                'offset_end'        	=> 100
            ]
        ],
        'post'                      	=> [
            'fields'                	=> [
                'id'                	=> null,
                'created'               => true,
                'name'               	=> null,
                'email'               	=> null,
                'about'               	=> null,
                'info'               	=> null,
                'contact'               => null,
                'currency'              => null,
                'template'              => null,
                'domain'               	=> null,
                'logo'               	=> null,
                'cover'               	=> null,
                'active'            	=> 1
            ],
            'relations'             	=> []
        ],
        'delete'                    	=> [
            'fields'                	=> [
                'id'                	=> null
            ]
        ]
    ];
}
