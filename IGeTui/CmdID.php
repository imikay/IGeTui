<?php
namespace IGeTui;

use Protobuf\PBMessage;
use Protobuf\PBEnum;

class CmdID extends PBEnum
{
  const GTHEARDBT  = 0;
  const GTAUTH  = 1;
  const GTAUTH_RESULT  = 2;
  const REQSERVHOST  = 3;
  const REQSERVHOSTRESULT  = 4;
  const PUSHRESULT  = 5;
  const PUSHOSSINGLEMESSAGE  = 6;
  const PUSHMMPSINGLEMESSAGE  = 7;
  const STARTMMPBATCHTASK  = 8;
  const STARTOSBATCHTASK  = 9;
  const PUSHLISTMESSAGE  = 10;
  const ENDBATCHTASK  = 11;
  const PUSHMMPAPPMESSAGE  = 12;
  const SERVERNOTIFY  = 13;
  const PUSHLISTRESULT  = 14;
  const SERVERNOTIFYRESULT  = 15;
}

class GtAuth extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
    $this->fields["3"] = "PBInt";
    $this->values["3"] = "";
    $this->fields["4"] = "PBString";
    $this->values["4"] = "";
  }
  function sign()
  {
    return $this->_get_value("1");
  }
  function set_sign($value)
  {
    return $this->_set_value("1", $value);
  }
  function appkey()
  {
    return $this->_get_value("2");
  }
  function set_appkey($value)
  {
    return $this->_set_value("2", $value);
  }
  function timestamp()
  {
    return $this->_get_value("3");
  }
  function set_timestamp($value)
  {
    return $this->_set_value("3", $value);
  }
  function seqId()
  {
    return $this->_get_value("4");
  }
  function set_seqId($value)
  {
    return $this->_set_value("4", $value);
  }
}

class GtAuthResult_GtAuthResultCode extends PBEnum
{
  const successed  = 0;
  const failed_noSign  = 1;
  const failed_noAppkey  = 2;
  const failed_noTimestamp  = 3;
  const failed_AuthIllegal  = 4;
  const redirect  = 5;
}

class GtAuthResult extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBInt";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
    $this->fields["3"] = "PBString";
    $this->values["3"] = "";
    $this->fields["4"] = "PBString";
    $this->values["4"] = "";
  }
  function code()
  {
    return $this->_get_value("1");
  }
  function set_code($value)
  {
    return $this->_set_value("1", $value);
  }
  function redirectAddress()
  {
    return $this->_get_value("2");
  }
  function set_redirectAddress($value)
  {
    return $this->_set_value("2", $value);
  }
  function seqId()
  {
    return $this->_get_value("3");
  }
  function set_seqId($value)
  {
    return $this->_set_value("3", $value);
  }
  function info()
  {
    return $this->_get_value("4");
  }
  function set_info($value)
  {
    return $this->_set_value("4", $value);
  }
}
class ReqServList extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["3"] = "PBInt";
    $this->values["3"] = "";
  }
  function seqId()
  {
    return $this->_get_value("1");
  }
  function set_seqId($value)
  {
    return $this->_set_value("1", $value);
  }
  function timestamp()
  {
    return $this->_get_value("3");
  }
  function set_timestamp($value)
  {
    return $this->_set_value("3", $value);
  }
}

class ReqServListResult_ReqServHostResultCode extends PBEnum
{
  const successed  = 0;
  const failed  = 1;
  const busy  = 2;
}

class ReqServListResult extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBInt";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = array();
    $this->fields["3"] = "PBString";
    $this->values["3"] = "";
  }
  function code()
  {
    return $this->_get_value("1");
  }
  function set_code($value)
  {
    return $this->_set_value("1", $value);
  }
  function host($offset)
  {
    $v = $this->_get_arr_value("2", $offset);
    return $v->get_value();
  }
  function append_host($value)
  {
    $v = $this->_add_arr_value("2");
    $v->set_value($value);
  }
  function set_host($index, $value)
  {
    $v = new $this->fields["2"]();
    $v->set_value($value);
    $this->_set_arr_value("2", $index, $v);
  }
  function remove_last_host()
  {
    $this->_remove_last_arr_value("2");
  }
  function host_size()
  {
    return $this->_get_arr_size("2");
  }
  function seqId()
  {
    return $this->_get_value("3");
  }
  function set_seqId($value)
  {
    return $this->_set_value("3", $value);
  }
}
class PushResult_EPushResult extends PBEnum
{
  const successed_online  = 0;
  const successed_offline  = 1;
  const successed_ignore  = 2;
  const failed  = 3;
  const busy  = 4;
  const success_startBatch  = 5;
  const success_endBatch  = 6;
}
class PushResult extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PushResult_EPushResult";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
    $this->fields["3"] = "PBString";
    $this->values["3"] = "";
    $this->fields["4"] = "PBString";
    $this->values["4"] = "";
    $this->fields["5"] = "PBString";
    $this->values["5"] = "";
    $this->fields["6"] = "PBString";
    $this->values["6"] = "";
    $this->fields["7"] = "PBString";
    $this->values["7"] = "";
  }
  function result()
  {
    return $this->_get_value("1");
  }
  function set_result($value)
  {
    return $this->_set_value("1", $value);
  }
  function taskId()
  {
    return $this->_get_value("2");
  }
  function set_taskId($value)
  {
    return $this->_set_value("2", $value);
  }
  function messageId()
  {
    return $this->_get_value("3");
  }
  function set_messageId($value)
  {
    return $this->_set_value("3", $value);
  }
  function seqId()
  {
    return $this->_get_value("4");
  }
  function set_seqId($value)
  {
    return $this->_set_value("4", $value);
  }
  function target()
  {
    return $this->_get_value("5");
  }
  function set_target($value)
  {
    return $this->_set_value("5", $value);
  }
  function info()
  {
    return $this->_get_value("6");
  }
  function set_info($value)
  {
    return $this->_set_value("6", $value);
  }
  function traceId()
  {
    return $this->_get_value("7");
  }
  function set_traceId($value)
  {
    return $this->_set_value("7", $value);
  }
}
class PushListResult extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PushResult";
    $this->values["1"] = array();
  }
  function results($offset)
  {
    return $this->_get_arr_value("1", $offset);
  }
  function add_results()
  {
    return $this->_add_arr_value("1");
  }
  function set_results($index, $value)
  {
    $this->_set_arr_value("1", $index, $value);
  }
  function remove_last_results()
  {
    $this->_remove_last_arr_value("1");
  }
  function results_size()
  {
    return $this->_get_arr_size("1");
  }
}

class PushInfo extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
    $this->fields["3"] = "PBString";
    $this->values["3"] = "";
    $this->fields["4"] = "PBString";
    $this->values["4"] = "";
    $this->fields["5"] = "PBString";
    $this->values["5"] = "";
    $this->fields["6"] = "PBString";
    $this->values["6"] = "";
    $this->fields["7"] = "PBString";
    $this->values["7"] = "";
    $this->fields["8"] = "PBString";
    $this->values["8"] = "";
    $this->fields["9"] = "PBString";
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

class SMSStatus extends PBEnum
{
  const unread  = 0;
  const read  = 1;
}

class AppStartUp extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
    $this->fields["3"] = "PBString";
    $this->values["3"] = "";
  }
  function android()
  {
    return $this->_get_value("1");
  }
  function set_android($value)
  {
    return $this->_set_value("1", $value);
  }
  function symbia()
  {
    return $this->_get_value("2");
  }
  function set_symbia($value)
  {
    return $this->_set_value("2", $value);
  }
  function ios()
  {
    return $this->_get_value("3");
  }
  function set_ios($value)
  {
    return $this->_set_value("3", $value);
  }
}
class Button extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "PBInt";
    $this->values["2"] = "";
  }
  function text()
  {
    return $this->_get_value("1");
  }
  function set_text($value)
  {
    return $this->_set_value("1", $value);
  }
  function next()
  {
    return $this->_get_value("2");
  }
  function set_next($value)
  {
    return $this->_set_value("2", $value);
  }
}
class Target extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    $this->fields["1"] = "PBString";
    $this->values["1"] = "";
    $this->fields["2"] = "PBString";
    $this->values["2"] = "";
  }
  function appId()
  {
    return $this->_get_value("1");
  }
  function set_appId($value)
  {
    return $this->_set_value("1", $value);
  }
  function clientId()
  {
    return $this->_get_value("2");
  }
  function set_clientId($value)
  {
    return $this->_set_value("2", $value);
  }
}
class ActionChain_Type extends PBEnum
{
  const refer  = 0;
  const notification  = 1;
  const popup  = 2;
  const startapp  = 3;
  const startweb  = 4;
  const smsinbox  = 5;
  const checkapp  = 6;
  const eoa  = 7;
  const appdownload  = 8;
  const startsms  = 9;
  const httpproxy  = 10;
  const smsinbox2  = 11;
  const mmsinbox2  = 12;
  const popupweb  = 13;
  const dial  = 14;
  const reportbindapp  = 15;
  const reportaddphoneinfo  = 16;
  const reportapplist  = 17;
  const terminatetask  = 18;
  const reportapp  = 19;
  const enablelog  = 20;
  const disablelog  = 21;
  const uploadlog  = 22;
}














