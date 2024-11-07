<?php

class DBConnection {
  private $db_host;
  private $db_user;
  private $db_password;
  private $db_name;
  private $db_connection;

  public function __construct() {
    $this->db_name     = 'formularios_jesus';
    $this->db_user     = 'root';
    $this->db_password = '';
    $this->db_host     = 'localhost';

    $this->connect();
  }

  public function get_last_insert_id() {
    return mysqli_insert_id($this->db_connection);
  }

  private function connect() {
    $this->db_connection = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);

    if ($this->db_connection->connect_error) {
      die("Connection failed: " . $this->db_connection->connect_error);
    }
  }

  public function escape($value) {
    return $this->db_connection->real_escape_string($value);
  }

  public function query($sql) {
    if (!$this->db_connection->select_db($this->db_name)) {
      die("Cannot select database: " . $this->db_connection->error);
    }

    $result = $this->db_connection->query($sql);
    if (!$result) {
      die("Query failed: " . $this->db_connection->error);
    }

    return $result;
  }

  public function delete($table, $condition = '') {
    // Ensure the database is selected
    if (!$this->db_connection->select_db($this->db_name)) {
        die("Cannot select database: " . $this->db_connection->error);
    }

    // Build the DELETE query
    $sql = "DELETE FROM $table";
    $sql .= !empty($condition) ? " WHERE $condition" : '';

    // Execute the query
    $result = $this->db_connection->query($sql);

    if (!$result) {
        die("Delete query failed: " . $this->db_connection->error);
    }

    return $result;
  }

  public function select($table, $columns = '*', $condition = '', $limit = '', $order = '') {
    // Ensure the database is selected
    if (!$this->db_connection->select_db($this->db_name)) {
      die("Cannot select database: " . $this->db_connection->error);
    }

    // Build the SELECT query
    $sql = "SELECT $columns FROM $table";

    if (!empty($condition)) $sql .= " WHERE $condition";
    if (!empty($limit)) $sql .= " LIMIT $limit";
    if (!empty($order)) $sql .= " $order";

    // Execute the query
    $result = $this->db_connection->query($sql);

    if (!$result) {
      die("Select query failed: " . $this->db_connection->error);
    }

    // Fetch and return the result
    $rows = [];
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }

    return $rows;
  }

  public function close() {
    $this->db_connection->close();
  }
}