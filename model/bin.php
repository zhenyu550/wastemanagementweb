<?php

require_once "model.php";

class Bin extends Model
{
  const TABLE_NAME = 'bin'; 
  protected $form = ["id" => "int", "capacity_current" => "float", "capacity_max" => "float",
   "type_id" => "int", "status" => "string", "cp_id" => "int"];
  
  public function __construct()
  {
    $this->data = ["id" => 0, "capacity_current" => 0.0, "capacity_max" => 0.0,
    "type_id" => 0, "status" => "", "cp_id" => 0
    ]; 
  }

  public function set_capacity_current($value)
  {
    $this->data['capacity_current'] = $value;
  }

  public function get_capacity_current()
  {
    return $this->data['capacity_current'];
  }
  
  public function set_capacity_max($value)
  {
    $this->data['capacity_max'] = $value;
  }

  public function get_capacity_max()
  {
    return $this->data['capacity_max'];
  }
  
  public function set_type_id($value)
  {
    $this->data['type_id'] = $value;
  }

  public function get_type_id()
  {
    return $this->data['type_id'];
  }
  
  public function set_status($value)
  {
    $this->data['status'] = $value;
  }

  public function get_status()
  {
    return $this->data['status'];
  }
  
  public function set_cp_id($value)
  {
    $this->data['cp_id'] = $value;
  }

  public function get_cp_id()
  {
    return $this->data['cp_id'];
  }  
  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['capacity_current'] = $source['capacity_current'];
    $this->data['capacity_max'] = $source['capacity_max'];
    $this->data['type_id'] = $source['type_id'];
    $this->data['status'] = $source['status'];
    $this->data['cp_id'] = $source['cp_id'];
  }
  
}

?>