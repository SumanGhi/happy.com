<?php

abstract class Database
{
    // DB query
    protected $conn = null;
    protected $sql = null;
    protected $stmt = null;
    protected $table = null;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";", DB_USER, DB_PWD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->sql = "SET NAMES utf8";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();

            // SET NAMES utf8

        } catch (PDOException $e) {
            $msg = "Exception (PDO, Connection) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Connection) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        } catch (Exception $e) {
            $msg = "Exception (General, Connection) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Connection) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        }
    }

    final protected function table($_table)
    {
        $this->table = $_table;
    }

    final protected function select($args = array(), $is_debug = false)
    {
        try {
            /**
             *  SELECT fields FROM table 
             *      JOIN clause
             *      WHERE clause
             *      GROUP BY clause
             *      ORDER BY clause
             *      LIMIT offset, count
             * 
             *  SELECT * FROM users 
             *      WHERE email = '".$user_name."'
             */

            $this->sql = "SELECT ";

            if (isset($args['fields']) && !empty($args['fields'])) {
                if (is_array($args['fields'])) {
                    $this->sql .= " " . implode(", ", $args['fields']);
                } else {
                    $this->sql .= " " . $args['fields'];
                }
            } else {
                $this->sql .= " * ";
            }

            $this->sql .= " FROM ";

            if (!isset($this->table) || empty($this->table)) {
                throw new Exception("Table not set");
            }

            $this->sql .= $this->table;


            /** Join Statement */
            /** Join Statement */

            /** where Statement */
            if (isset($args['where']) && !empty($args['where'])) {
                if (is_array($args['where'])) {
                    $temp = array();
                    foreach ($args['where'] as $column_name => $value) {
                        $str = $column_name . " = :" . $column_name;
                        $temp[] = $str;
                    }

                    $this->sql .= " WHERE " . implode(' AND ', $temp);
                } else {
                    $this->sql .= " WHERE " . $args['where'];
                }
            }
            /** where Statement */


            /** GROUP BY Statement */
            /** GROUP By Statement */



            /** ORDER BY Statement */
            /** ORDER By Statement */

            /** LIMIT Statement */
            /** LIMIT Statement */

            if ($is_debug) {
                    debug($args);
                    debug($this->sql, true);
                }

            $this->stmt = $this->conn->prepare($this->sql);


            if (isset($args, $args['where']) && !empty($args['where']) && is_array($args['where'])) {
                foreach ($args['where'] as $column_name => $value) {

                    if (is_integer($value)) {
                        $param = PDO::PARAM_INT;
                    } else if (is_bool($value)) {
                        $param = PDO::PARAM_BOOL;
                    } /*else if(is_null($value)){
                            $param = PDO::PARAM_NULL;
                            $value = null;
                        }*/ else {
                        $param = PDO::PARAM_STR;
                    }

                    if ($param) {
                        $this->stmt->bindValue(":" . $column_name, $value, $param);
                    }
                }
            }

            $this->stmt->execute();

            $data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            $msg = "Exception (PDO, Select) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Select) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        } catch (Exception $e) {
            $msg = "Exception (General, Select) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Connection) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        }
    }

    final protected function update($data = array(), $args = array(), $is_debug = false)
    {
        try {
            /**
             * UPDATE table SET
             *          column_name = value,
             *          column_name = value,
             *          .....
             *          column_name = value,
             * 
             * WHERE clause
             */

            $this->sql = "UPDATE ";

            if (!isset($this->table) || empty($this->table)) {
                throw new Exception("Table not set");
            }

            $this->sql .= $this->table . " SET ";


            if (isset($data) && !empty($data)) {

                if (is_array($data)) {
                    $temp = array();
                    foreach ($data as $column_name => $value) {
                        $str = $column_name . " = :_" . $column_name;
                        $temp[] = $str;
                    }

                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= " " . $data;
                }
            } else {
                throw new Exception('Update data is not defined');
            }


            /** where Statement */
            if (isset($args['where']) && !empty($args['where'])) {
                if (is_array($args['where'])) {
                    $temp = array();
                    foreach ($args['where'] as $column_name => $value) {
                        $str = $column_name . " = :" . $column_name;
                        $temp[] = $str;
                    }

                    $this->sql .= " WHERE " . implode(' AND ', $temp);
                } else {
                    $this->sql .= " WHERE " . $args['where'];
                }
            }
            /** where Statement */



            if ($is_debug) {
                    debug($data);
                    debug($args);
                    debug($this->sql, true);
                }

            $this->stmt = $this->conn->prepare($this->sql);

            if (isset($data) && !empty($data) && is_array($data)) {
                foreach ($data as $column_name => $value) {
                    if (is_integer($value)) {
                        $param = PDO::PARAM_INT;
                    } else if (is_bool($value)) {
                        $param = PDO::PARAM_BOOL;
                    } /*else if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                        $value = null;
                    }*/ else {
                        $param = PDO::PARAM_STR;
                    }

                    if ($param) {
                        $this->stmt->bindValue(":_" . $column_name, $value, $param);
                    }
                }
            }



            if (isset($args, $args['where']) && !empty($args['where']) && is_array($args['where'])) {
                foreach ($args['where'] as $column_name => $value) {

                    if (is_integer($value)) {
                        $param = PDO::PARAM_INT;
                    } else if (is_bool($value)) {
                        $param = PDO::PARAM_BOOL;
                    } /*else if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                        $value = null;
                    }*/ else {
                        $param = PDO::PARAM_STR;
                    }

                    if ($param) {
                        $this->stmt->bindValue(":" . $column_name, $value, $param);
                    }
                }
            }

            return $this->stmt->execute();
        } catch (PDOException $e) {
            $msg = "Exception (PDO, Update) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Update) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        } catch (Exception $e) {
            $msg = "Exception (General, Update) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Connection) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        }
    }
    
    final protected function insert($data = array(), $is_debug=false){
        try {
            /**
             * INSERT INTO table SET
             *          column_name = value,
             *          column_name = value,
             *          .....
             *          column_name = value,
             */

            $this->sql = "INSERT INTO ";

            if (!isset($this->table) || empty($this->table)) {
                throw new Exception("Table not set");
            }

            $this->sql .= $this->table . " SET ";


            if (isset($data) && !empty($data)) {

                if (is_array($data)) {
                    $temp = array();
                    foreach ($data as $column_name => $value) {
                        $str = $column_name . " = :_" . $column_name;
                        $temp[] = $str;
                    }

                    $this->sql .= implode(', ', $temp);
                } else {
                    $this->sql .= " " . $data;
                }
            } else {
                throw new Exception('insert data is not defined');
            }



            if ($is_debug) {
                    debug($data);
                    debug($this->sql, true);
                }

            $this->stmt = $this->conn->prepare($this->sql);

            if (isset($data) && !empty($data) && is_array($data)) {
                foreach ($data as $column_name => $value) {
                    if (is_integer($value)) {
                        $param = PDO::PARAM_INT;
                    } else if (is_bool($value)) {
                        $param = PDO::PARAM_BOOL;
                    } /*else if(is_null($value)){
                        $param = PDO::PARAM_NULL;
                        $value = null;
                    }*/ else {
                        $param = PDO::PARAM_STR;
                    }

                    if ($param) {
                        $this->stmt->bindValue(":_" . $column_name, $value, $param);
                    }
                }
            }


            $status = $this->stmt->execute();
            if($status){
                return $this->conn->lastInsertId();
            } else {
                throw new Exception('Data could not be inserted at this moment. '.$this->sql);
            }
        } catch (PDOException $e) {
            $msg = "Exception (PDO, Insert) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Insert) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        } catch (Exception $e) {
            $msg = "Exception (General, Insert) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Connection) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        }
    }


    final protected function delete($args = array(), $is_debug = false)
    {
        try {
            /**
             *  DELETE FROM table 
             *      WHERE clause
             *      
             */

            $this->sql = "DELETE FROM ";

            if (!isset($this->table) || empty($this->table)) {
                throw new Exception("Table not set");
            }

            $this->sql .= $this->table;


            /** where Statement */
            if (isset($args['where']) && !empty($args['where'])) {
                if (is_array($args['where'])) {
                    $temp = array();
                    foreach ($args['where'] as $column_name => $value) {
                        $str = $column_name . " = :" . $column_name;
                        $temp[] = $str;
                    }

                    $this->sql .= " WHERE " . implode(' AND ', $temp);
                } else {
                    $this->sql .= " WHERE " . $args['where'];
                }
            }
            /** where Statement */


            if ($is_debug) {
                    debug($args);
                    debug($this->sql, true);
                }

            $this->stmt = $this->conn->prepare($this->sql);


            if (isset($args, $args['where']) && !empty($args['where']) && is_array($args['where'])) {
                foreach ($args['where'] as $column_name => $value) {

                    if (is_integer($value)) {
                        $param = PDO::PARAM_INT;
                    } else if (is_bool($value)) {
                        $param = PDO::PARAM_BOOL;
                    } /*else if(is_null($value)){
                            $param = PDO::PARAM_NULL;
                            $value = null;
                        }*/ else {
                        $param = PDO::PARAM_STR;
                    }

                    if ($param) {
                        $this->stmt->bindValue(":" . $column_name, $value, $param);
                    }
                }
            }

            return $this->stmt->execute();

        } catch (PDOException $e) {
            $msg = "Exception (PDO, Delete) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Delete) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        } catch (Exception $e) {
            $msg = "Exception (General, Delete) " . date('Y-m-d H:i:s') . ": " . $e->getMessage() . "\r\n";   // Exception (PDO, Connection) 2019-04-23 18:11:00: cannot connect to db 
            error_log($msg, 3, LOG_PATH . "/error.log");
            return false;
        }
    }
}
