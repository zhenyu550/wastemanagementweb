<?php
require_once "model.php";

Class Collector extends Model
{
  const TABLE_NAME = 'collector';
  protected $form = ["id" => "int", "type_id" => "int", "company_name" => "string", "company_address" => "string", "tel_no" => "string", "fax_no" => "string"];

  public function __construct()
  {
    $this->data = ["id" => 0, "type_id" => 0, "company_name" => "", "company_address" => "", "tel_no" => "", "fax_no" => ""];
  }

  public function set_id($value)
  {
    $this->data['id'] = $value;
  }

  public function get_id()
  {
    return $this->data['id'];
  }

  public function set_type_id($value)
  {
    $this->data['type_id'] = $value;
  }

  public function get_type_id()
  {
    return $this->data['type_id'];
  }

  public function set_company_name($value)
  {
    $this->data['company_name'] = $value;
  }

  public function get_company_name()
  {
    return $this->data['company_name'];
  }

  public function set_company_address($value)
  {
    $this->data['company_address'] = $value;
  }

  public function get_company_address()
  {
    return $this->data['company_address'];
  }

  public function set_tel_no($value)
  {
    $this->data['tel_no'] = $value;
  }

  public function get_tel_no()
  {
    return $this->data['tel_no'];
  }

  public function set_fax_no($value)
  {
    $this->data['fax_no'] = $value;
  }

  public function get_fax_no()
  {
    return $this->data['fax_no'];
  }

  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['type_id'] = intval($source['type_id']);
    $this->data['company_name'] = $source['company_name'];
    $this->data['company_address'] = $source['company_address'];
    $this->data['tel_no'] = $source['tel_no'];
    $this->data['fax_no'] = $source['fax_no'];
  }
}

?>
