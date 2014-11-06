<?php
use IGetui\IGeTui;

//消息推送Demo
//增加了IOS的离线消息推送,IOS不支持IGtNotyPopLoadTemplate模板
//更新时间为2014年01月13日 VERSION:3.0.0.1
//IOS用户，增加PushInfo的长度判断，超过256字节的长度则禁止发送，android用户请注释 setPushInfo字段
//一个中文汉字为3个字节，一个英文与一个数字为一个字节
//增加用户状态查询接口
//增加任务停止功能
//更新时间为2014年02月25日 VERSION:3.0.0.2
//增加toList接口返回每个用户状态的功能
//更新时间为2014年08月30日
//IOS在设置setPushInfo为{"",-1,"","","","","",""} 会抛出异常，不允许设置
//更新时间为2014年9月10日
//1.增加APN简化版推送功能，推送接口apnPush()
//    a.注册应用后，不需集成SDK（IOS）版本
//    b.可根据IOS的DeivceToken推送APN消息

header("Content-Type: text/html; charset=utf-8");

// require_once(dirname(__FILE__) . '/' . 'IGt.Push.php');

define('APPKEY','IIwkVqriai61tylRQwt9K6');
define('APPID','doDrsBynvM63Ij7v1XUzJ3');
define('MASTERSECRET','8ozSd6KdoJ8IXS9172gdv1');
define('HOST','http://sdk.open.api.igexin.com/apiex.htm');
define('CID','请输入您的ClientID');
define('DEVICETOKEN','请输入IOS目标用户的DEVICETOKEN');

//获取用户状态接口
//getUserStatus();

//停止任务接口
//stoptask();

//单推接口
//pushMessageToSingle();

//多推接口
//pushMessageToList();

//群推接口
pushMessageToApp();

//IOS简化推送接口
//pushAPN();

//用户状态查询
function getUserStatus() {
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $rep = $igt->getClientIdStatus(APPID,CID);
    var_dump($rep);
    echo ("<br><br>");
}

//推送任务停止
function stoptask(){
	$igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
	$igt->stop("OSA-0225_d5GB1otdWLAsTb3gckDXY7");
}

function pushAPN(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $template = new APNTemplate();
    $template->set_pushInfo("按钮名称", 1, "标题弹框内容", "", "现行的房产税是第二步利改税以后开征的，1986年9月1", "", "", "");

//单个用户推送接口
    $message = new SingleMessage();
    $message->set_data($template);
    $ret = $igt->pushAPNMessageToSingle(APPID, DEVICETOKEN, $message);
    var_dump($ret);

//多个用户推送接口    
    //putenv("needDetails=true");
    //$listmessage = new IGtListMessage();
    //$listmessage->set_data($template);
    //$contentId = $igt->getAPNContentId(APPID, $listmessage);
    //$deviceTokenList = array(DEVICETOKEN);
    //$ret = $igt->pushAPNMessageToList(APPID, $contentId, $deviceTokenList);
    //var_dump($ret);
}




    //
    //服务端推送接口，支持三个接口推送
    //1.PushMessageToSingle接口：支持对单个用户进行推送
    //2.PushMessageToList接口：支持对多个用户进行推送，建议为50个用户
    //3.pushMessageToApp接口：对单个应用下的所有用户进行推送，可根据省份，标签，机型过滤推送
    //

//单推接口案例
function pushMessageToSingle(){
    	$igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    
    //消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板
	
    	$template = NotyPopLoadTemplateDemo();
    	//$template = IGtLinkTemplateDemo();
    	//$template = IGtNotificationTemplateDemo();    
    	//$template = IGtTransmissionTemplateDemo();

    //个推信息体
	$message = new SingleMessage();

	$message->set_isOffline(true);//是否离线
	$message->set_offlineExpireTime(3600*12*1000);//离线时间
	$message->set_data($template);//设置推送消息类型

	//接收方
	$target = new Target();
	$target->set_appId(APPID);
	$target->set_clientId(CID);

	$rep = $igt->pushMessageToSingle($message,$target);

	var_dump($rep);
    echo ("<br><br>");
}


//多推接口案例
function pushMessageToList(){
	putenv("needDetails=true");
	$igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    //消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板
	
    	//$template = IGtNotyPopLoadTemplateDemo();
    	$template = IGtLinkTemplateDemo();
    	//$template = IGtNotificationTemplateDemo();
    	//$template = IGtTransmissionTemplateDemo();
	
	//个推信息体
	$message = new SingleMessage();

	$message->set_isOffline(true);//是否离线
	$message->set_offlineExpireTime(3600*12*1000);//离线时间
	$message->set_data($template);//设置推送消息类型
	
	$contentId = $igt->getContentId($message);

	//接收方1	
	$target1 = new Target();
	$target1->set_appId(APPID);
	$target1->set_clientId(CID);
	
	$targetList[] = $target1;

	$rep = $igt->pushMessageToList($contentId, $targetList);

	var_dump($rep);
    echo ("<br><br>");

}

//群推接口案例
function pushMessageToApp(){
	$igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    //消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板
	
    	//$template = IGtNotyPopLoadTemplateDemo();
    	//$template = IGtLinkTemplateDemo();
    	$template = IGtNotificationTemplateDemo();
    	//$template = IGtTransmissionTemplateDemo();
	
	//个推信息体
	//基于应用消息体
	$message = new AppMessage();

	$message->set_isOffline(true);
	$message->set_offlineExpireTime(3600*12*1000);//离线时间单位为毫秒，例，两个小时离线为3600*1000*2
	$message->set_data($template);

 
	$message->set_appIdList(array(APPID));
	$message->set_phoneTypeList(array('ANDROID'));
//	$message->set_provinceList(array('浙江','北京','河南'));
//	$message->set_tagList(array('开心'));

	$rep = $igt->pushMessageToApp($message);

	var_dump($rep);
    echo ("<br><br>");
}

    	//所有推送接口均支持四个消息模板，依次为通知弹框下载模板，通知链接模板，通知透传模板，透传模板
    	//注：IOS离线推送需通过APN进行转发，需填写pushInfo字段，目前仅不支持通知弹框下载功能

function IGtNotyPopLoadTemplateDemo(){
        $template =  new NotyPopLoadTemplate();

        $template ->set_appId(APPID);//应用appid
        $template ->set_appkey(APPKEY);//应用appkey
        //通知栏
        $template ->set_notyTitle("个推");//通知栏标题
        $template ->set_notyContent("个推最新版点击下载");//通知栏内容
        $template ->set_notyIcon("");//通知栏logo
        $template ->set_isBelled(true);//是否响铃
        $template ->set_isVibrationed(true);//是否震动
        $template ->set_isCleared(true);//通知栏是否可清除
        //弹框
        $template ->set_popTitle("弹框标题");//弹框标题
        $template ->set_popContent("弹框内容");//弹框内容
        $template ->set_popImage("");//弹框图片
        $template ->set_popButton1("下载");//左键
        $template ->set_popButton2("取消");//右键
        //下载
        $template ->set_loadIcon("");//弹框图片
        $template ->set_loadTitle("地震速报下载");
        $template ->set_loadUrl("http://dizhensubao.igexin.com/dl/com.ceic.apk");
        $template ->set_isAutoInstall(false);
        $template ->set_isActived(true);

        return $template;
}

function IGtLinkTemplateDemo(){
        $template =  new LinkTemplate();
        $template ->set_appId(APPID);//应用appid
        $template ->set_appkey(APPKEY);//应用appkey
        $template ->set_title("请输入通知标题");//通知栏标题
        $template ->set_text("请输入通知内容");//通知栏内容
        $template ->set_logo("");//通知栏logo
        $template ->set_isRing(true);//是否响铃
        $template ->set_isVibrate(true);//是否震动
        $template ->set_isClearable(true);//通知栏是否可清除
        $template ->set_url("http://www.igetui.com/");//打开连接地址
        // iOS推送需要设置的pushInfo字段
        //$template ->set_pushInfo($actionLocKey,$badge,$message,$sound,$payload,$locKey,$locArgs,$launchImage);
        //$template ->set_pushInfo("",2,"","","","","","");
	return $template;
}

function IGtNotificationTemplateDemo(){
        $template =  new NotificationTemplate();
        $template->set_appId(APPID);//应用appid
        $template->set_appkey(APPKEY);//应用appkey
        $template->set_transmissionType(1);//透传消息类型
        $template->set_transmissionContent("测试离线");//透传内容
        $template->set_title("个推");//通知栏标题
        $template->set_text("个推最新版点击下载");//通知栏内容
        $template->set_logo("http://wwww.igetui.com/logo.png");//通知栏logo
        $template->set_isRing(true);//是否响铃
        $template->set_isVibrate(true);//是否震动
        $template->set_isClearable(true);//通知栏是否可清除
        // iOS推送需要设置的pushInfo字段
        //$template ->set_pushInfo($actionLocKey,$badge,$message,$sound,$payload,$locKey,$locArgs,$launchImage);
        //$template ->set_pushInfo("test",1,"message","","","","","");
        return $template;
}

function IGtTransmissionTemplateDemo(){
        $template =  new TransmissionTemplate();
        $template->set_appId(APPID);//应用appid
        $template->set_appkey(APPKEY);//应用appkey
        $template->set_transmissionType(1);//透传消息类型
        $template->set_transmissionContent("测试离线");//透传内容
	//iOS推送需要设置的pushInfo字段
	//$template ->set_pushInfo($actionLocKey,$badge,$message,$sound,$payload,$locKey,$locArgs,$launchImage);
	//$template ->set_pushInfo("", 0, "", "", "", "", "", "");
        return $template;
}


 
?>
