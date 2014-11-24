<?php
//BitVC现货交易API
$access_key = "XXXXXXXXXXXXXXXXXXXX"; //访问密匙 请替换成自己的
$secret_key = "XXXXXXXXXXXXXXXXXXXX"; //访问私匙 请替换成自己的
$base_url = "https://api.bitvc.com/api/";


//演示的函数
header("Content-type:text/html;charset=utf-8"); //请求头信息中必须声明
get_account_info(); //获取个人资产信息
get_order_list(); //获取所有正在进行的委托
get_order(); //委托单详情
get_order_buy_market(); //买入市价单
get_order_buy(); //买入限价单
get_order_sell_market(); //卖出市价单
get_order_sell(); //卖出限价单
get_order_cancel(); //取消订单

/**
 * 获取个人资产信息
 */
function get_account_info(){
	global $access_key, $secret_key, $base_url;

	$method = "accountInfo/get";
	$method_name = "获取个人资产信息";
	$url = $base_url . $method;

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&created=". time() ."&secret_key={$secret_key}"),//MD5签名结果
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

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&coin_type={$coin_type}&created=". time() ."&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 委托单详情
 */
function get_order(){
	global $access_key, $secret_key, $base_url;

	$id = 54; // 订单ID
	$method = "order/{$id}";
	$method_name = "委托单详情";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&coin_type={$coin_type}&created=". time() ."&id={$id}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"id" => $id,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 买入市价单
 */
function get_order_buy_market(){
	global $access_key, $secret_key, $base_url;

	$method = "/order/buy_market";
	$method_name = "买入市价单";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$amount = 10; //买入金额
	$trade_password = "pass1234"; //此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$trade_id = "123456"; //此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"amount" => $amount,
		"trade_password" => $trade_password,
		"trade_id" => $trade_id,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 买入限价单
 */
function get_order_buy(){
	global $access_key, $secret_key, $base_url;

	$method = "/order/buy";
	$method_name = "买入限价单";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$amount = 10; //买入数量
	$price = 3000; //买入价格
	$trade_password = "pass1234"; //此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$trade_id = "123456"; //此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&price={$price}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"amount" => $amount,
		"price" => $price,
		"trade_password" => $trade_password,
		"trade_id" => $trade_id,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 卖出市价单
 */
function get_order_sell_market(){
	global $access_key, $secret_key, $base_url;

	$method = "/order/sell_market";
	$method_name = "卖出市价单";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$amount = 10; //卖出数量
	$trade_password = "pass1234"; //此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$trade_id = "123456"; //此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"amount" => $amount,
		"trade_password" => $trade_password,
		"trade_id" => $trade_id,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 卖出限价单
 */
function get_order_sell(){
	global $access_key, $secret_key, $base_url;

	$method = "/order/sell";
	$method_name = "卖出限价单";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币
	$amount = 10; //卖出数量
	$price = 3000; //卖出价格
	$trade_password = "pass1234"; //此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$trade_id = "123456"; //此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&price={$price}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"amount" => $amount,
		"price" => $price,
		"trade_password" => $trade_password,
		"trade_id" => $trade_id,
	);

	$res = curl($url, $post);
	echo_msg($method_name, $res);
}

/**
 * 取消订单
 */
function get_order_cancel(){
	global $access_key, $secret_key, $base_url;

	$id = 54; // 订单ID
	$method = "/order/cancel/{$id}";
	$method_name = "取消订单";
	$url = $base_url . $method;
	$coin_type = 1; //币种 1比特币 2 莱特币

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&coin_type={$coin_type}&created=". time() ."&id={$id}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
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
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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