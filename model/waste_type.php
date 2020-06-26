<?php
require_once "model.php";

Class Waste_Type extends Model
{
  const TABLE_NAME = 'waste_type';
  protected $form = ["id" => "int", "name" => "string"];

  public function __construct()
  {
    $this->data = ["id" => 0, "name" => ""];
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

  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['name'] = $source['name'];
  }
}

?>
