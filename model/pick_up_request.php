<?php
require_once "model.php";

Class Pick_Up_Request extends Model
{
  const TABLE_NAME = 'pick_up_request';
  protected $form = ["id" => "int", "name" => "string", "contact_no" => "string", "address" => "string", "waste_type" => "string", "request_date" => "string", "cp_id" => "int"];

  public function __construct()
  {
    $this->data = ["id" => 0, "name" => "", "contact_no" => "", "waste_type" => "", "address" => "", "request_date" => "", "cp_id" => 0];
  }

  public function set_id($value)
  {
    $this->data['id'] = $value;
  }

  public function get_id()
  {
    return $this->data['id'];
  }

  public function set_name($value)
  {
    $this->data['name'] = $value;
  }

  public function get_name()
  {
    return $this->data['name'];
  }

  public function set_contact_no($value)
  {
    $this->data['contact_no'] = $value;
  }

  public function get_contact_no()
  {
    return $this->data['contact_no'];
  }

  public function set_waste_type($value)
  {
    $this->data['waste_type'] = $value;
  }

  public function get_waste_type()
  {
    return $this->data['waste_type'];
  }
  
  public function set_address($value)
  {
    $this->data['address'] = $value;
  }

  public function get_address()
  {
    return $this->data['address'];
  }


  public function set_request_date($value)
  {
    $this->data['request_date'] = $value;
  }

  public function get_request_date()
  {
    return $this->data['request_date'];
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
    $this->data['name'] = $source['name'];
    $this->data['contact_no'] = $source['contact_no'];
    $this->data['address'] = $source['address'];
    $this->data['waste_type'] = $source['waste_type'];
    $this->data['request_date'] = $source['request_date'];
    $this->data['cp_id'] = intval($source['cp_id']);
  }
}

?>
