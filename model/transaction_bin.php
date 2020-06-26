<?php
require_once "model.php";

Class Transaction_Bin extends Model
{
  const TABLE_NAME = 'transaction_bin';
  protected $form = ["id" => "int", "transaction_id" => "int", "bin_id" => "int", "weight" => "float"];

  public function __construct()
  {
    $this->data = ["id" => 0, "transaction_id" => 0, "bin_id" => 0, "weight" => 0.0];
  }

  public function set_id($value)
  {
    $this->data['id'] = $value;
  }

  public function get_id()
  {
    return $this->data['id'];
  }

  public function set_transaction_id($value)
  {
    $this->data['transaction_id'] = $value;
  }

  public function get_transaction_id()
  {
    return $this->data['transaction_id'];
  }

  public function set_bin_id($value)
  {
    $this->data['bin_id'] = $value;
  }

  public function get_bin_id()
  {
    return $this->data['bin_id'];
  }

  public function set_weight($value)
  {
    $this->data['weight'] = $value;
  }

  public function get_weight()
  {
    return $this->data['weight'];
  }

  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['transaction_id'] = intval($source['transaction_id']);
    $this->data['bin_id'] = intval($source['bin_id']);
    $this->data['weight'] = floatval($source['weight']);
  }
}

?>
