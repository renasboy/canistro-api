<?php
namespace api\model;

class store extends \api\simple_model {

    // this is the fields/types for the model
    protected $_fields              = [
        'id'                        => 'number',
        'created'                   => 'datetime',
        'modified'                  => 'datetime',
        'name'                      => 'text',
        'email'                     => 'text',
        'about'                     => 'text',
        'info'                      => 'text',
        'contact'                   => 'text',
        'currency'                  => 'text',
        'domain'                    => 'text',
        'logo'                      => 'text',
        'cover'                     => 'text',
        'active'                    => 'flag'
    ];

    // these are the relations for the model
    protected $_relations           = [
        'many_one'                  => [],
        'one_many'                  => [
            'product'
        ],
        'many_many'                 => []
    ];

    protected $_dependencies        = [
        'product'                   => null
    ];

    protected $_validate            = [
        'save'                      => [
            'relation'              => [],
            'field'                 => [
                'name',
                'email'
            ]
        ]
    ];

    // FIND
    // each of these methods maps to the
    // list of "with" options in the
    // resource get method
    public function find_products () {
        // get dependency model object
        $model      = $this->_dependencies['product'];

        // compose options for the find call
        $options    = [
            'store_id'      => $this->id,
            'active'        => 1,
            'offset_start'  => 0,
            'offset_end'    => 30
        ];

        // execute find call and return result
        return $model->find($options);
    }
}
