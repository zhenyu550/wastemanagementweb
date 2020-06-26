<?php
require_once "model.php";

Class Collection_Point extends Model
{
  const TABLE_NAME = 'collection_point';
  protected $form = ["id" => "int", "name" => "string", "phone_no" => "string", "fax_no" => "string", "social_media_tag" => "string", "address" => "string", "state" => "string"];

  public function __construct()
  {
    $this->data = ["id" => 0, "name" => "", "phone_no" => "", "fax_no" => "", "social_media_tag" => "", "address" => "", "state" => ""];
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

  public function set_phone_no($value)
  {
    $this->data['phone_no'] = $value;
  }

  public function get_phone_no()
  {
    return $this->data['phone_no'];
  }

  public function set_fax_no($value)
  {
    $this->data['fax_no'] = $value;
  }

  public function get_fax_no()
  {
    return $this->data['fax_no'];
  }

  public function set_social_media_tag($value)
  {
    $this->data['social_media_tag'] = $value;
  }

  public function get_social_media_tag()
  {
    return $this->data['social_media_tag'];
  }

  public function set_address($value)
  {
    $this->data['address'] = $value;
  }

  public function get_address()
  {
    return $this->data['address'];
  }

  public function set_state($value)
  {
    $this->data['state'] = $value;
  }

  public function get_state()
  {
    return $this->data['state'];
  }

  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['name'] = $source['name'];
    $this->data['phone_no'] = $source['phone_no'];
    $this->data['fax_no'] = $source['fax_no'];
    $this->data['social_media_tag'] = $source['social_media_tag'];
    $this->data['address'] = $source['address'];
    $this->data['state'] = $source['state'];
  }
}

?>
