<?php

class database
{
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_database = 'newsblog';

    private $conn = false;
    private $mysqli;
    private $result = array();


    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_database);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                push_array($this->result, $this->mysqli->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }

    public function insert($table, $param = array())
    {
        if ($this->tableexist($table)) {
            print_r($param);
            $table_col = implode(',', array_keys($param));
            $table_val = implode("','", $param);
            $sql = "insert into $table($table_col) values('$table_val')";
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }

    }

    private function tableexist($table)
    {
        $query = "show tables from $this->db_database like '$table'";
        $tabledb = $this->mysqli->query($query);
        if ($tabledb) {
            if ($tabledb->num_rows == 1) {
                return true;
            } else {
                array_push($this->result, $table . 'table does not exist in database');
                return false;
            }

        }
    }

    public function getresult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    public function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;

            }
            return true;

        } else {
            return false;
        }
    }

}

?>