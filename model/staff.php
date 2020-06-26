<?php
require_once "model.php";

Class Staff extends Model
{
  const TABLE_NAME = 'staff';
  protected $form = ["id" => "int", "cp_id" => "int", "name" => "string", "email" => "string", "contact_no" => "string", "staff_username" => "string", "password" => "string", "type" => "string"];

  public function __construct()
  {
    $this->data = ["id" => 0, "cp_id" => 0, "name" => "", "email" => "", "contact_no" => "", "staff_username" => "", "password" => "", "type" => ""];
  }

  public function set_id($value)
  {
    $this->data['id'] = $value;
  }

  public function get_id()
  {
    return $this->data['id'];
  }

  public function set_cp_id($value)
  {
    $this->data['cp_id'] = $value;
  }

  public function get_cp_id()
  {
    return $this->data['cp_id'];
  }

  public function set_name($value)
  {
    $this->data['name'] = $value;
  }

  public function get_name()
  {
    return $this->data['name'];
  }

  public function set_email($value)
  {
    $this->data['email'] = $value;
  }

  public function get_email()
  {
    return $this->data['email'];
  }

  public function set_contact_no($value)
  {
    $this->data['contact_no'] = $value;
  }

  public function get_contact_no()
  {
    return $this->data['contact_no'];
  }

  public function set_staff_username($value)
  {
    $this->data['staff_username'] = $value;
  }

  public function get_staff_username()
  {
    return $this->data['staff_username'];
  }

  public function set_password($value)
  {
    $this->data['password'] = $value;
  }

  public function get_password()
  {
    return $this->data['password'];
  }

  public function set_type($value)
  {
    $this->data['type'] = $value;
  }

  public function get_type()
  {
    return $this->data['type'];
  }
  
  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['cp_id'] = intval($source['cp_id']);
    $this->data['name'] = $source['name'];
    $this->data['email'] = $source['email'];
    $this->data['contact_no'] = $source['contact_no'];
    $this->data['staff_username'] = $source['staff_username'];
    $this->data['password'] = $source['password'];
	$this->data['type'] = $source['type'];
  }
}

?>
