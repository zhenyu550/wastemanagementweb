<?php
require_once "model.php";

Class Feedback extends Model
{
  const TABLE_NAME = 'feedback';
  protected $form = ["id" => "int", "name" => "string", "email" => "string", "contact_no" => "string", "preferred_comm" => "string", "feedback_date" => "string", "feedback_type" => "string", "feedback_content" => "string", "cp_id" => "int"];

  public function __construct()
  {
    $this->data = ["id" => 0, "name" => "", "email" => "", "contact_no" => "", "preferred_comm" => "", "feedback_date" => "", "feedback_type" => "", "feedback_content" => "", "cp_id" => 0];
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

  public function set_preferred_comm($value)
  {
    $this->data['preferred_comm'] = $value;
  }

  public function get_preferred_comm()
  {
    return $this->data['preferred_comm'];
  }

  public function set_feedback_date($value)
  {
    $this->data['feedback_date'] = $value;
  }

  public function get_feedback_date()
  {
    return $this->data['feedback_date'];
  }

  public function set_feedback_type($value)
  {
    $this->data['feedback_type'] = $value;
  }

  public function get_feedback_type()
  {
    return $this->data['feedback_type'];
  }

  public function set_feedback_content($value)
  {
    $this->data['feedback_content'] = $value;
  }

  public function get_feedback_content()
  {
    return $this->data['feedback_content'];
  }

  public function set_cp_id($value)
  {
    $this->data['cp_id'] = $value;
  }

  public function get_cp_id()
  {
    return $this->data['cp_id'];
  }

  public function get_state()
  {
    return $this->data['state'];
  }

  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['name'] = $source['name'];
    $this->data['email'] = $source['email'];
    $this->data['contact_no'] = $source['contact_no'];
    $this->data['preferred_comm'] = $source['preferred_comm'];
    $this->data['feedback_date'] = $source['feedback_date'];
    $this->data['feedback_type'] = $source['feedback_type'];
    $this->data['feedback_content'] = $source['feedback_content'];
    $this->data['cp_id'] = intval($source['cp_id']);
  }


}

?>
