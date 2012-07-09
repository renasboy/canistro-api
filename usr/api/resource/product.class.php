<?php
namespace api\resource;

class product extends \api\simple_resource {

    // this is the data structure for the resource
    protected $_data                	= [
        'id'                          	=> null,
        'created'                   	=> null,
        'modified'                   	=> null,
        'store'                         => null,
        'name'                       	=> null,
        'description'                   => null,
        'img'                       	=> null,
        'price'                       	=> null
    ];

    // these are default request options
    protected $_default_options     	= [
        'get'                       	=> [
            'with'                  	=> [],
            'filter'                	=> [
                'id'                	=> [],
                'created_before'        => [],
                'created_after'         => [],
                'store_id'              => [],
                'search'            	=> [],
                'active'            	=> [1],
                'offset_start'      	=> 0,
                'offset_end'        	=> 30
            ]
        ],
        'post'                      	=> [
            'fields'                	=> [
                'id'                	=> null,
                'created'               => true,
                'modified'              => null,
                'store'                 => null,
                'store_id'              => null,
                'name'               	=> null,
                'description'           => null,
                'img'               	=> null,
                'price'               	=> null,
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
