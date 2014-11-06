<?php
namespace IGeTui;

use Protobuf\PBMessage;

class PushInfo extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "Protobuf\\Type\\PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "Protobuf\\Type\\PBString";
    $this->values["2"] = "";
    $this->fields["3"] = "Protobuf\\Type\\PBString";
    $this->values["3"] = "";
    $this->fields["4"] = "Protobuf\\Type\\PBString";
    $this->values["4"] = "";
    $this->fields["5"] = "Protobuf\\Type\\PBString";
    $this->values["5"] = "";
    $this->fields["6"] = "Protobuf\\Type\\PBString";
    $this->values["6"] = "";
    $this->fields["7"] = "Protobuf\\Type\\PBString";
    $this->values["7"] = "";
    $this->fields["8"] = "Protobuf\\Type\\PBString";
    $this->values["8"] = "";
    $this->fields["9"] = "Protobuf\\Type\\PBString";
    $this->values["9"] = "";
  }
  function message()
  {
    return $this->_get_value("1");
  }
  function set_message($value)
  {
    return $this->_set_value("1", $value);
  }
  function actionKey()
  {
    return $this->_get_value("2");
  }
  function set_actionKey($value)
  {
    return $this->_set_value("2", $value);
  }
  function sound()
  {
    return $this->_get_value("3");
  }
  function set_sound($value)
  {
    return $this->_set_value("3", $value);
  }
  function badge()
  {
    return $this->_get_value("4");
  }
  function set_badge($value)
  {
    return $this->_set_value("4", $value);
  }
  function payload()
  {
    return $this->_get_value("5");
  }
  function set_payload($value)
  {
    return $this->_set_value("5", $value);
  }
  function locKey()
  {
    return $this->_get_value("6");
  }
  function set_locKey($value)
  {
    return $this->_set_value("6", $value);
  }
  function locArgs()
  {
    return $this->_get_value("7");
  }
  function set_locArgs($value)
  {
    return $this->_set_value("7", $value);
  }
  function actionLocKey()
  {
    return $this->_get_value("8");
  }
  function set_actionLocKey($value)
  {
    return $this->_set_value("8", $value);
  }
  function launchImage()
  {
    return $this->_get_value("9");
  }
  function set_launchImage($value)
  {
    return $this->_set_value("9", $value);
  }
}