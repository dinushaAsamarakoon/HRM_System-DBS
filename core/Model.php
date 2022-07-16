<?php


class Model
{
    protected $_db, $_table, $_table1, $_table2, $_modelName, $_columnNames, $_columnNames1, $_columnNames2 = [];

    public function __construct($table)
    {
        $this->_db = DB::getInstance(HOST, DB_NAME, DB_USER, DB_PASSWORD);
        $this->_table = $table;
        $this->_setTableColumns();
        $this->_modelName = ucwords($this->_table);
    }

    protected function _setTableColumns()
    {
        $columns = $this->get_columns_table($this->_table);

        foreach ($columns as $column) {
            $columnName = $column->Field;
            $this->_columnNames[] = $column->Field;
            $this->{$columnName} = null;
        }
    }

    public function setCustomTableColomns($tbl)
    {
        if (!isset($this->_table1)) {
            $this->_table1 = $tbl;
            $columns1 = $this->get_columns_table($tbl);
            foreach ($columns1 as $column) {
                $columnName = $column->Field;
                $this->_columnNames1[] = $column->Field;
                $this->{$columnName} = null;
            }
        } else {
            $this->_table2 = $tbl;
            $columns2 = $this->get_columns_table($tbl);
            foreach ($columns2 as $column) {
                $columnName = $column->Field;
                $this->_columnNames2[] = $column->Field;
                $this->{$columnName} = null;
            }
        }
    }

    public function get_columns()
    {
        return $this->_db->get_columns($this->_table);
    }

    public function get_columns_table($table)
    {
        return $this->_db->get_columns($table);
    }


    public function find($params = [])
    {
        $results = [];
        $resultsQuery = $this->_db->find($this->_table, $params);
        if (!$resultsQuery) return $results;
        //dnd($resultsQuery);
        foreach ($resultsQuery as $result) {
            $obj = new $this->_modelName($this->_table);
            $obj->populateObjData($result);
            $results[] = $obj;
        }

        return $results;
    }

    public function findWithTable($table, $params = [])
    {
        $results = [];
        $resultsQuery = $this->_db->find($table, $params);
        if (!$resultsQuery) return $results;
        //dnd($resultsQuery);
        foreach ($resultsQuery as $result) {
            $obj = new $this->_modelName($table);
            $obj->populateObjData($result);
            $results[] = $obj;
        }

        return $results;
    }

    public function findFirst($params = [])
    {
        $resultsQuery = $this->_db->findFirst($this->_table, $params);
        // $result = new $this->_modelName($this->_table);
        if ($resultsQuery) {
            $this->populateObjData($resultsQuery);
        }
        // return $this;
    }

    protected function populateObjData($results)
    {
        foreach ($results as $key => $value) {
            $this->$key = $value;
        }
    }

    public function findById($id)
    {
        $this->findFirst(['conditions' => 'id=? ', 'bind' => [$id]]);
    }

    public function save()
    {
        $fields = [];
        foreach ($this->_columnNames as $column) {
            $fields[$column] = $this->$column;
        }

        // determine whether to update or insert
        if (property_exists($this, 'id') && $this->id != '') {
            return $this->update($this->id, $fields);
        } else {
            return $this->insert($fields);
        }
    }

    public function save_model($table_id)
    {
        $tbl = null;
        $columnNames = [];
        $fields = [];
        switch ($table_id) {
            case 0:
                $tbl = $this->_table;
                $columnNames = $this->_columnNames;
                break;
            case 1:
                $tbl = $this->_table1;
                $columnNames = $this->_columnNames1;
                $fields['current_employee'] = 1;
                break;
            case 2:
                $tbl = $this->_table2;
                $columnNames = $this->_columnNames2;
                break;
        }
        foreach ($columnNames as $column) {
            if ($column === 'id' && $table_id === 0) {
                $fields[$column] = $this->_db->lastId();
                Session::set('lastId', $this->_db->lastId());
            } else {
                if ($column != 'current_employee')
                    $fields[$column] = $this->$column;
                if ($column === 'registration_date') {
                    date_default_timezone_set('Asia/Colombo');
                    $fields[$column] = date('Y-m-d');
                }
            }
        }
        if ($table_id===2) {
            $fields['id'] = Session::get('lastId');
        }
        // determine whether to update or insert
        if (property_exists($this, 'id') && $this->id != '') {
            return $this->update_table($tbl, $this->id, $fields);
        } else {
            return $this->insert_into_table($tbl, $fields);
        }
    }

    public function insert_into_table($tbl, $fields)
    {
        if (empty($fields)) {
            return false;
        } else {
            $this->_db->insert($tbl, $fields);
        }
    }


    public function create($tableName, $fields)
    {
        if (empty($fields)) {
            return false;
        } else {

            return $this->_db->create($tableName, $fields);
        }
    }

    public function insert($fields)
    {
        if (empty($fields)) {
            return false;
        } else {
            return $this->_db->insert($this->_table, $fields);
        }
    }

    public function insertAttributeType($table, $fields)
    {
        if (empty($fields)) {
            return false;
        } else {
            return $this->_db->insert($table, $fields);
        }
    }

    public function update($id, $fields)
    {
        if (empty($fields) || $id == '') {
            return false;
        }
        return $this->_db->update($this->_table, $id, $fields);
    }

    public function delete($table, $field, $value)
    {
        if ($table == '' || $field == '' || $value == '') return false;

        return $this->_db->delete($table, $field, $value);
    }

    public function query($sql, $bind = [])
    {
        return $this->_db->query($sql, $bind);
    }

    public function data()
    {
        $data = new stdClass();
        foreach ($this->_columnNames as $column) {
            $data->{$column} = $this->{$column};
        }
        return $data;
    }


    public function assign($params)
    {
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (in_array($key, $this->_columnNames) || in_array($key, $this->_columnNames1) || in_array($key, $this->_columnNames2)) {
                    $this->$key = sanitize($val);
                }
            }
            return true;
        }
        return false;
    }

    public function assignInd($table, $params)
    {
        $columns = [];
        if (!empty($params)) {
            $table_columns = $this->get_columns_table($table);
            foreach ($params as $key => $val) {
                if (in_array($key, $table_columns)) {
                    $columns[$key] = sanitize($val);
                }
            }
        }
        return $columns;
    }

    public function assignVal($params)
    {
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (in_array($key, $this->_columnNames)) {
                    $this->$key = sanitize($val);
                }
            }
            return true;
        }
        return false;
    }

    public function getEmployeeAttributes()
    {
        return $this->_db->getEmployeeAttributes();
    }


    public function getPrimaryValues($table)
    {
        return $this->_db->getPrimaryValues($table);
    }

    public function update_table($tableName, $col_definition)
    {
        if (empty($col_definition)) {
            return false;
        } else {
            return $this->_db->update_table($tableName, $col_definition);
        }
    }

}




/**
 * class Model
 * {
 * protected $_db, $_table, $_modelName, $_columnNames = [];
 *
 * public function __construct($table)
 * {
 * $this->_db = DB::getInstance(HOST, DB_NAME, DB_USER, DB_PASSWORD);
 * $this->_table = $table;
 * $this->_setTableColumns();
 * $this->_modelName = ucwords($this->_table);
 * }
 *
 * protected function _setTableColumns()
 * {
 * $columns = $this->get_columns();
 *
 * foreach ($columns as $column) {
 * $columnName = $column->Field;
 * $this->_columnNames[] = $column->Field;
 * $this->{$columnName} = null;
 * }
 * }
 *
 * public function get_columns()
 * {
 * return $this->_db->get_columns($this->_table);
 * }
 * public function get_columns_table($table)
 * {
 * return $this->_db->get_columns($table);
 * }
 *
 *
 * public function find($params = [])
 * {
 * $results = [];
 * $resultsQuery = $this->_db->find($this->_table, $params);
 * if (!$resultsQuery) return $results;
 * //dnd($resultsQuery);
 * foreach ($resultsQuery as $result) {
 * $obj = new $this->_modelName($this->_table);
 * $obj->populateObjData($result);
 * $results[] = $obj;
 * }
 *
 * return $results;
 * }
 * public function findWithTable($table, $params = [])
 * {
 * $results = [];
 * $resultsQuery = $this->_db->find($table, $params);
 * if (!$resultsQuery) return $results;
 * //dnd($resultsQuery);
 * foreach ($resultsQuery as $result) {
 * $obj = new $this->_modelName($table);
 * $obj->populateObjData($result);
 * $results[] = $obj;
 * }
 *
 * return $results;
 * }
 *
 * public function findFirst($params = [])
 * {
 * $resultsQuery = $this->_db->findFirst($this->_table, $params);
 * // $result = new $this->_modelName($this->_table);
 * if ($resultsQuery) {
 * $this->populateObjData($resultsQuery);
 * }
 * // return $this;
 * }
 *
 * protected function populateObjData($results)
 * {
 * foreach ($results as $key => $value) {
 * $this->$key = $value;
 * }
 * }
 *
 * //    public function findById($id)
 * //    {
 * //        $this->findFirst(['conditions' => 'id=? and is_closed=?', 'bind' => [$id, 0]]);
 * //    }
 *
 * public function save()
 * {
 * $fields = [];
 * foreach ($this->_columnNames as $column) {
 * $fields[$column] = $this->$column;
 * }
 *
 * // determine whether to update or insert
 * if (property_exists($this, 'id') && $this->id != '') {
 * return $this->update($this->id, $fields);
 * } else {
 * return $this->insert($fields);
 * }
 * }
 *
 * //    public function saveWithoutId($table, $columns)
 * //    {
 * //        $fields = [];
 * //        foreach ($columns as $column) {
 * //            $fields[$column] = $this->$column;
 * //        }
 * //
 * //        // determine whether to update or insert
 * ////        if (property_exists($this, 'id') && $this->id != '') {
 * ////            return $this->update($this->id, $fields);
 * ////        } else {
 * //        return $this->insertAttributeType($table, $fields);
 * ////        }
 * //    }
 *
 * public function create($tableName, $fields)
 * {
 * if (empty($fields)) {
 * return false;
 * } else {
 * return $this->_db->create($tableName, $fields);
 * }
 * }
 *
 * public function insert($fields)
 * {
 * if (empty($fields)) {
 * return false;
 * } else {
 * return $this->_db->insert($this->_table, $fields);
 * }
 * }
 *
 * public function insertAttributeType($table, $fields)
 * {
 * if (empty($fields)) {
 * return false;
 * } else {
 * return $this->_db->insert($table, $fields);
 * }
 * }
 *
 * public function update($id, $fields)
 * {
 * if (empty($fields) || $id == '') {
 * return false;
 * }
 * return $this->_db->update($this->_table, $id, $fields);
 * }
 *
 * public function delete($table, $field, $value)
 * {
 * if ($table == '' || $field == '' || $value == '') return false;
 *
 * return $this->_db->delete($table, $field, $value);
 * }
 *
 * public function query($sql, $bind = [])
 * {
 * return $this->_db->query($sql, $bind);
 * }
 *
 * public function data()
 * {
 * $data = new stdClass();
 * foreach ($this->_columnNames as $column) {
 * $data->{$column} = $this->{$column};
 * }
 * return $data;
 * }
 *
 *
 * public function assign($params)
 * {
 * if (!empty($params)) {
 * foreach ($params as $key => $val) {
 * if (in_array($key, $this->_columnNames)) {
 * $this->$key = sanitize($val);
 * }
 * }
 * return true;
 * }
 * return false;
 * }
 *
 * public function assignInd($table, $params)
 * {
 * $columns = [];
 * if (!empty($params)) {
 * $table_columns = $this->get_columns_table($table);
 * foreach ($params as $key => $val) {
 * if (in_array($key, $table_columns)) {
 * $columns[$key] = sanitize($val);
 * }
 * }
 * }
 * return $columns;
 * }
 *
 * public function getEmployeeAttributes(){
 * return $this->_db->getEmployeeAttributes();
 * }
 *
 *
 *
 * public function getPrimaryValues($table){
 * return $this->_db->getPrimaryValues($table);
 * }
 * }
 */