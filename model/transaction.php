<?php
require_once "model.php";

Class Transaction extends Model
{
  const TABLE_NAME = 'transaction';
  protected $form = ["id" => "int", "staff_id" => "int", "name" => "string", "email" => "string", "contact_no" => "string", "transaction_date" => "string"];

  public function __construct()
  {
    $this->data = ["id" => 0, "staff_id" => 0, "name" => "", "email" => "", "contact_no" => "", "transaction_date" => ""];
  }

  public function set_id($value)
  {
    $this->data['id'] = $value;
  }

  public function get_id()
  {
    return $this->data['id'];
  }

  public function set_staff_id($value)
  {
    $this->data['staff_id'] = $value;
  }

  public function get_staff_id()
  {
    return $this->data['staff_id'];
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

  public function set_transaction_date($value)
  {
    $this->data['transaction_date'] = $value;
  }

  public function get_transaction_date()
  {
    return $this->data['transaction_date'];
  }

  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['staff_id'] = intval($source['staff_id']);
    $this->data['name'] = $source['name'];
    $this->data['email'] = $source['email'];
    $this->data['contact_no'] = $source['contact_no'];
    $this->data['transaction_date'] = $source['transaction_date'];
  }
}

?>
