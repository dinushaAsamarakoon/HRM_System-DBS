<?php

class DB
{

    private static $_instance = null;
    private $_pdo, $_query, $_error = false, $_result, $_count = 0, $_lastInsertId = null;

    private function __construct($host, $dbname, $dbuser, $dbpassword)
    {
        try {
            $this->_pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbuser, $dbpassword);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Singleton Pattern
    public static function getInstance($host, $dbname, $dbuser, $dbpassword)
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB($host, $dbname, $dbuser, $dbpassword);
        }

        return self::$_instance;
    }

    public function query($sql, $params = [])
    {
        $this->_error = false;

        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
        }

        if ($this->_query->execute()) {
            $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
            $this->_lastInsertId = $this->_pdo->lastInsertId();
        } else {
            $this->_error = true;
        }

        return $this;
    }

    public function create($table, $fields = [])
    {
        $fieldString = '';
        foreach ($fields as $field => $value) {
            $fieldString .= '`' . $field . ' ' . $value . '`,';
        }
        $fieldString = rtrim($fieldString, ',');
        $sql = "CREATE TABLE {$table} ({$fieldString} );";
        if (!$this->query($sql)->error()) {
            return true;
        }
        return false;
    }

    public function insert($table, $fields = [])
    {
        $fieldString = '';
        $valueString = '';
        $values = [];

        foreach ($fields as $field => $value) {
            $fieldString .= '`' . $field . '`,';
            $valueString .= '?,';
            $values [] = $value;
        }
        $fieldString = rtrim($fieldString, ',');
        $valueString = rtrim($valueString, ',');
        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
        if (!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

    public function update($table, $id, $fields = [])
    {
        $fieldString = '';
        $values = [];

        foreach ($fields as $field => $value) {
            $fieldString .= ' ' . $field . '=?,';
            $values [] = $value;
        }
        $fieldString = trim($fieldString);
        $fieldString = rtrim($fieldString, ',');

        $sql = "UPDATE {$table} SET {$fieldString} WHERE emp_id = {$id}";
        if (!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

    public function delete($table, $field, $value)
    {
        $sql = "DELETE FROM {$table} WHERE {$field} = {$value}";
        if (!$this->query($sql)->error()) {
            return true;
        }
        return false;
    }

    public function deleteTable($table)
    {
        $sql = "DROP TABLE {$table}";
        if (!$this->query($sql)->error()) {
            return true;
        }
        return false;
    }


    public function results()
    {
        return (!empty($this->_result)) ? $this->_result : [];
    }

    public function first()
    {
        return (!empty($this->_result)) ? $this->_result[0] : [];
    }

    public function count()
    {
        return $this->_count;
    }

    public function lastId()
    {
        return $this->_lastInsertId;
    }

    public function get_columns($table)
    {
        return $this->query("SHOW COLUMNS FROM {$table}")->results();
    }

    protected function _read($table, $params = [])
    {
        $conditionString = '';
        $bind = [];
        $order = '';
        $limit = '';

        // added to avoid closed accounts
//        if (isset($params['conditions'])) {
//            if (is_array($params['conditions'])) {
//                foreach ($params['conditions'] as $condition) {
//                    $conditionString .= ' ' . $condition . ' AND';
//                }
//                $conditionString = trim($conditionString);
//                $conditionString = rtrim($conditionString, ' AND');
//                // dnd($params['conditions']);
//            } else {
//                $conditionString = $params['conditions'];
//            }
//        }

        //conditions
        if (isset($params['conditions'])) {
            if (is_array($params['conditions'])) {
                foreach ($params['conditions'] as $condition) {
                    $conditionString .= ' ' . $condition . ' AND';
                }
                $conditionString = trim($conditionString);
                $conditionString = rtrim($conditionString, ' AND');
                // dnd($params['conditions']);
            } else {
                $conditionString = $params['conditions'];
            }
        }

        if ($conditionString != "") {
            $conditionString = ' WHERE ' . $conditionString;
        }
        //binding
        if (array_key_exists('bind', $params)) {
            $bind = $params['bind'];
        }
        //order
        if (array_key_exists('order', $params)) {
            $order = ' ORDER BY ' . $params['order'];
        }
        //limit
        if (array_key_exists('limit', $params)) {
            $limit = ' LIMIT ' . $params['limit'];
        }

        $sql = "SELECT * FROM {$table}{$conditionString}{$order}{$limit}";
        // dnd($sql);


        if ($this->query($sql, $bind)) {
            // dnd(count($this->results()));
            if (!count($this->results())) return false;
            return true;
        }


    }

    public function find($table, $params = [])
    {
        if ($this->_read($table, $params)) {
            return $this->results();
        }
        return false;

    }

    public function findFirst($table, $params = [])
    {
        if ($this->_read($table, $params)) {
            return $this->first();
        }
        return false;
    }

    public function getEmployeeAttributes()
    {
        return $this->_pdo->query("CALL getTables();")->fetchAll();
    }

    public function getPrimaryValues($table){
        $key = $this->getPrimary($table);
        return $this->_pdo->query("SELECT {$key} FROM {$table}")->fetchAll();
    }

    private function getPrimary($table)
    {
        return $this->_pdo->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'hrm_system' AND COLUMN_KEY = 'PRI' AND TABLE_NAME = '{$table}' ;")->fetchAll()[0]["COLUMN_NAME"];
    }

    public function error()
    {
        $this->_error;
    }

    public function begin_transaction() {
        $this->_pdo->beginTransaction();
    }

    public function commit() {
        return $this->_pdo->commit();
    }

    public function rollback(){
        $this->_pdo->rollBack();
    }
}