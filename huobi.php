<?php

// 火币现货交易API
define('ACCESS_KEY', 'xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxx'); // 访问密匙 请替换成自己的
define('SECRET_KEY', 'xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxx'); // 访问私匙 请替换成自己的

// 使用 apiv2
define('API_URL', 'https://api.huobi.com/apiv2.php');

header("Content-type:text/html;charset=utf-8");

// 获取个人资产信息
get_account_info();
// 获取所有正在进行的委托
get_orders();
// 获取委托详情
order_info();
// 买入
order_buy();
// 卖出
order_sell();
// 买入(市价单)
order_buy_market();
// 卖出(市价单)
order_sell_market();
// 取消委托单
cancel_order();
// 查询个人最新10条成交订单
get_new_deal_orders();
// 根据trade_id查询oder_id
get_order_id_by_trade_id();

/**
 * 获取个人资产信息
 */
function get_account_info(){
	$method_name = '获取个人资产信息';

	$tParams = $extra = array();
	$tParams['method'] = 'get_account_info';
	// 不参与签名样例
	// $extra['test'] = 'test';
	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 获取所有正在进行的委托
 */
function get_orders(){
	$method_name = '获取所有正在进行的委托';

	$tParams = $extra = array();
	$tParams['method'] = 'get_orders';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 获取委托详情
 */
function order_info(){
	$method_name = '获取委托详情';

	$tParams = $extra = array();
	$tParams['method'] = 'order_info';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币
	$tParams['id'] = 21; // 委托订单ID

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 买入
 */
function order_buy(){
	$method_name = '买入';

	$tParams = $extra = array();
	$tParams['method'] = 'buy';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币
	$tParams['price'] = 1000; // 委托订单ID
	$tParams['amount'] = 1; // 委托订单ID

	$extra['trade_password'] = 'pass1234'; // 此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$extra['trade_id'] = 123456; // 此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 卖出
 */
function order_sell(){
	$method_name = '卖出';

	$tParams = $extra = array();
	$tParams['method'] = 'sell';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币
	$tParams['price'] = 3000; // 委托订单ID
	$tParams['amount'] = 1; // 委托订单ID

	$extra['trade_password'] = 'pass1234'; // 此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$extra['trade_id'] = 123456; // 此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 买入(市价单)
 */
function order_buy_market(){
	$method_name = '买入(市价单)';

	$tParams = $extra = array();
	$tParams['method'] = 'buy_market';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币
	$tParams['amount'] = 1; // 买入金额

	$extra['trade_password'] = 'pass1234'; // 此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$extra['trade_id'] = 123456; // 此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 卖出(市价单)
 */
function order_sell_market(){
	$method_name = '卖出(市价单)';

	$tParams = $extra = array();
	$tParams['method'] = 'sell_market';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币
	$tParams['amount'] = 1; // 卖出数量

	$extra['trade_password'] = 'pass1234'; // 此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$extra['trade_id'] = 123456; // 此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 取消委托单
 */
function cancel_order(){
	$method_name = '取消委托单';

	$tParams = $extra = array();
	$tParams['method'] = 'cancel_order';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币
	$tParams['id'] = 1; // 要取消的委托id

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 查询个人最新10条成交订单
 */
function get_new_deal_orders(){
	$method_name = '查询个人最新10条成交订单';

	$tParams = $extra = array();
	$tParams['method'] = 'get_new_deal_orders';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 根据trade_id查询oder_id
 */
function get_order_id_by_trade_id(){
	$method_name = '根据trade_id查询oder_id';

	$tParams = $extra = array();
	$tParams['method'] = 'get_order_id_by_trade_id';
	$tParams['coin_type'] = 1; // 币种 1 比特币 2 莱特币
	$tParams['trade_id'] = 123456; // 币种 1 比特币 2 莱特币

	$res = send2api($tParams, $extra);
	echo_msg($method_name, $res);
}

/**
 * 发送信息到api
 */
function send2api($pParams, $extra = array()) {
	$pParams['access_key'] = ACCESS_KEY;
	$pParams['created'] = time();
	$pParams['sign'] = createSign($pParams);
	if($extra) {
		$pParams = array_merge($pParams, $extra);
	}
	$tResult = httpRequest(API_URL, $pParams);
	return $tResult;
}

/**
 * 签名生成
 */
function createSign($pParams = array()){
	$pParams['secret_key'] = SECRET_KEY;
	ksort($pParams);
	$tPreSign = http_build_query($pParams);
	$tSign = md5($tPreSign);
	return strtolower($tSign);
}

function httpRequest($pUrl, $pData){
	$tCh = curl_init();
	if($pData){
		is_array($pData) && $pData = http_build_query($pData);
		curl_setopt($tCh, CURLOPT_POST, true);
		curl_setopt($tCh, CURLOPT_POSTFIELDS, $pData);
	}
	curl_setopt($tCh, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded;charset=UTF-8"));
	curl_setopt($tCh, CURLOPT_URL, $pUrl);
	curl_setopt($tCh, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($tCh, CURLOPT_SSL_VERIFYPEER, false);
	$tResult = curl_exec($tCh);
	curl_close($tCh);
	return $tResult;
}

/**
 * 以数组形式输出json信息
 * @param string $res 接口返回的json数据
 */
function echo_msg($method_name, $res){
	$res = json_decode($res, true);
	echo "
		<style>
			pre {
				background: none repeat scroll 0 0 #333;
				border-radius: 10px;
				color: #FF147E;
				margin: 20px;
				padding: 30px;
				page-break-inside: avoid;
				text-align: left;
				white-space: pre-wrap;
				font-family: Monaco,Menlo,Consolas,'Courier New',monospace;
			}
		</style>
	";
	echo "<pre>";
	echo "<br/>请求的接口为:{$method_name}<br/><br/>";
	print_r($res);
	echo "</pre>";
}
