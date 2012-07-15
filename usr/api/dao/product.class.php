<?php
namespace api\dao;

class product extends \api\simple_dao {

    protected function _read_query ($filter) {
        $query = 'SELECT product.*,';

        if (array_key_exists('shop_id', $filter) &&
            $filter['shop_id']) {
            $query .= 'product_shop.quantity,';
            $query .= 'product_shop.price AS price,';
        }

        $query .= 'store.name AS store
        FROM product
        LEFT JOIN store ON product.store_id = store.id';

        if (array_key_exists('shop_id', $filter) &&
            $filter['shop_id']) {
            $query .= ' LEFT JOIN product_shop ON product.id = product_shop.product_id';
        }

        $filters    = [];

        $filters[]  = $this->_condition_query('product.created', 'greater', $filter, 'created_before');
        $filters[]  = $this->_condition_query('product.created', 'smaller', $filter, 'created_after');

        $filters[]  = $this->_condition_query('product.id', 'is', $filter, 'id');
        $filters[]  = $this->_condition_query('product.name', 'is', $filter, 'name');
        $filters[]  = $this->_condition_query('product.active', 'is', $filter, 'active');

        $filters[]  = $this->_condition_query('store.name', 'is', $filter, 'store');
        $filters[]  = $this->_condition_query('product.store_id', 'is', $filter, 'store_id');

        $filters[]  = $this->_condition_query('product_shop.shop_id', 'is', $filter, 'shop_id');

        $or         = [];
        $or[]       = $this->_condition_query('product.description', 'like', $filter, 'search');
        $or[]       = $this->_condition_query('product.name', 'like', $filter, 'search');
        $filters[]  = $this->_logical_condition_query('or', $or);

        $where      = $this->_logical_condition_query('and', $filters);

        $query .= ' WHERE ' . $where;
        $query .= ' GROUP BY product.id';

        $query .= ' ORDER BY product.id DESC';
        $query .= $this->_limit_query($filter);
        return $query;
    }
}
