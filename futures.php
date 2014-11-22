<?php
$access_key = "xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxx";//访问密匙 请替换成自己的
$secret_key = "xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx";//访问私匙 请替换成自己的
$base_url = "https://api.bitvc.com/futures/";

//演示的函数
header("Content-type:text/html;charset=utf-8"); //请求头信息中必须声明
get_account_info(); //获取个人资产信息
get_hold_order_list(); //获取用户持仓记录
get_hold_order(); //获取用户持仓记录(汇总)
get_order_list(); //获取所有正在进行的委托
get_order(); //委托单详情
order_save(); //下委托单
order_cancel(); //取消订单

/**
 * 获取个人资产信息
 */
function get_account_info(){
	global $access_key, $secret_key, $base_url;

	$method = "balance";
	$method_name = "获取期货资产信息";
	$url = $base_url . $method;
	$coin_type = 1;  //币种 1比特币 2 莱特币

	$post = array(
		"accessKey" => $access_key,
        "coinType" => $coin_type,
		"created" => time(),
		"sign" => md5("accessKey={$access_key}&coinType={$coin_type}&created=". time() ."&secretKey={$secret_key}"),//MD5签名结果

	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 获取用户持仓记录
 */
function get_hold_order_list(){
	global $access_key, $secret_key, $base_url;

	$method = "holdOrder/list";
	$method_name = "获取用户持仓记录";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$contractType = "week"; //合约类型 (week 周 quarter 季) 可选

	$post = array(
		"accessKey" => $access_key,
        "coinType" => $coin_type,
		"created" => time(),
		"sign" => md5("accessKey={$access_key}&coinType={$coin_type}&created=". time() ."&secretKey={$secret_key}"),//MD5签名结果
		"contractType" => $contractType,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 获取用户持仓记录(汇总)
 */
function get_hold_order(){
	global $access_key, $secret_key, $base_url;

	$method = "holdOrder";
	$method_name = "获取用户持仓记录(汇总)";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$contractType = "week"; //合约类型 (week 周 quarter 季) 可选

	$post = array(
		"accessKey" => $access_key,
        "coinType" => $coin_type,
		"created" => time(),
		"sign" => md5("accessKey={$access_key}&coinType={$coin_type}&created=". time() ."&secretKey={$secret_key}"),//MD5签名结果
		"contractType" => $contractType,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 获取所有正在进行的委托
 */
function get_order_list(){
	global $access_key, $secret_key, $base_url;

	$method = "order/list";
	$method_name = "获取所有正在进行的委托";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$contractType = "week"; //合约类型 (week 周 quarter 季) 可选

	$post = array(
		"accessKey" => $access_key,
        "coinType" => $coin_type,
		"created" => time(),
		"sign" => md5("accessKey={$access_key}&coinType={$coin_type}&created=". time() ."&secretKey={$secret_key}"),//MD5签名结果
		"contractType" => $contractType,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 委托单详情
 */
function get_order(){
	global $access_key, $secret_key, $base_url;

	$method = "order";
	$method_name = "委托单详情";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$contractType = "week"; //合约类型 (week 周 quarter 季)
	$id = 54; //订单ID

	$post = array(
		"accessKey" => $access_key,
        "coinType" => $coin_type,
        "contractType" => $contractType,
		"created" => time(),
		"sign" => md5("accessKey={$access_key}&coinType={$coin_type}&contractType={$contractType}&created=". time() ."&id={$id}&secretKey={$secret_key}"),//MD5签名结果
		"id" => $id,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 下委托单
 */
function order_save(){
	global $access_key, $secret_key, $base_url;

	$method = "order/save";
	$method_name = "下委托单";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$contractType = "week"; //合约类型(week 周 quarter 季)

	// (开多: orderType 1 tradeType 1 开空: orderType 1 tradeType 2)
	// (平多: orderType 2 tradeType 2 平空: orderType 2 tradeType 1)
	$orderType = 1; //订单类型
	$tradeType = 1; //交易类型
	$price = 2200; //价格
	$money = 2200; //金额数量
	$leverage = 10; //杠杆倍数(BTC周: 5、10、20 BTC季: 5、10 LTC: 5、10) 可选

	$post = array(
		"accessKey" => $access_key,
        "coinType" => $coin_type,
        "contractType" => $contractType,
		"created" => time(),
		"sign" => md5("accessKey={$access_key}&coinType={$coin_type}&contractType={$contractType}&created=". time() ."&money={$money}&orderType={$orderType}&price={$price}&secretKey={$secret_key}&tradeType={$tradeType}"),//MD5签名结果
		"orderType" => $orderType,
		"tradeType" => $tradeType,
		"price" => $price,
		"money" => $money,
		"leverage"=> $leverage
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 取消订单
 */
function order_cancel(){
	global $access_key, $secret_key, $base_url;

	$method = "order/cancel";
	$method_name = "取消订单";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$contractType = "week"; //合约类型 (week 周 quarter 季)
	$id = 54; //订单ID

	$post = array(
		"accessKey" => $access_key,
        "coinType" => $coin_type,
        "contractType" => $contractType,
		"created" => time(),
        "id" => $id,
		"sign" => md5("accessKey={$access_key}&coinType={$coin_type}&contractType={$contractType}&created=". time() ."&id={$id}&secretKey={$secret_key}"),//MD5签名结果
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 向接口post数据
 * @param string $url  请求的链接
 * @param string $data  post的数据
 * @return mixed
 */
function curl($url, $data){
	$headers = array(
		"Content-Type"  => "application/x-www-form-urlencoded ",//请求头信息中必须声明
		"Accept-Language" =>  "zh-CN", //错误信息支持中英文。默认返回英文错误信息。如需要，请设置Accept-Language=zh-CN
	);

	$headerArr = array();
	foreach( $headers as $n => $v ) {
		$headerArr[] = $n .':' . $v;
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER , $headerArr);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	return curl_exec($ch);
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
?>
