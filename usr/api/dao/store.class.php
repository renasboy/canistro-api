<?php
namespace api\dao;

class store extends \api\simple_dao {

    protected function _read_query ($filter) {
        $query = 'SELECT
        store.*,
        COUNT(DISTINCT(product.id)) AS total_products
        FROM
        store 
        LEFT JOIN product ON store.id = product.store_id';

        $filters    = [];

        $filters[]  = $this->_condition_query('store.created', 'greater', $filter, 'created_before');
        $filters[]  = $this->_condition_query('store.created', 'smaller', $filter, 'created_after');

        $filters[]  = $this->_condition_query('store.id', 'is', $filter, 'id');
        $filters[]  = $this->_condition_query('store.name', 'is', $filter, 'name');
        $filters[]  = $this->_condition_query('store.email', 'is', $filter, 'email');
        $filters[]  = $this->_condition_query('store.active', 'is', $filter, 'active');

        $or         = [];
        $or[]       = $this->_condition_query('store.about', 'like', $filter, 'search');
        $or[]       = $this->_condition_query('store.info', 'like', $filter, 'search');
        $or[]       = $this->_condition_query('store.contact', 'like', $filter, 'search');
        $or[]       = $this->_condition_query('store.name', 'like', $filter, 'search');
        $filters[]  = $this->_logical_condition_query('or', $or);

        $where      = $this->_logical_condition_query('and', $filters);

        $query .= ' WHERE ' . $where;
        $query .= ' GROUP BY store.id';

        $query .= ' ORDER BY store.id DESC';
        $query .= $this->_limit_query($filter);
        return $query;
    }
}
