<?PHP
//火币现货交易API
$access_key = ""; //访问密匙 请替换成自己的
$secret_key = ""; //访问私匙 请替换成自己的
$base_url = "https://api.huobi.com/apiv2.php ";

//演示的函数
header("Content-type:text/html;charset=utf-8"); //请求头信息中必须声明
get_account_info(); //获取个人资产信息
get_orders(); //获取所有正在进行的委托
order_info(); //获取委托详情
order_buy(); //买入
order_sell(); //卖出
order_buy_market(); //买入(市价单)
order_sell_market(); //卖出(市价单)
cancel_order(); //取消委托单
modify_order(); //修改订单
get_new_deal_orders(); //查询个人最新10条成交订单
get_order_id_by_trade_id(); //根据trade_id查询oder_id

/**
 * 获取个人资产信息
 */
function get_account_info(){
	global $access_key, $secret_key, $base_url;

	$method_name = "获取个人资产信息";
	$method = "get_account_info";

	$post = array(
		"access_key" => $access_key,
		"created" => time(),
		"method" => $method,
		"sign" => md5("access_key={$access_key}&created=". time() ."&method={$method}&secret_key={$secret_key}"),//MD5签名结果
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 获取所有正在进行的委托
 */
function get_orders(){
	global $access_key, $secret_key, $base_url;

	$method_name = "获取所有正在进行的委托";
	$method = "get_orders";
	$coin_type = 1; //币种 1 比特币 2 莱特币

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&coin_type={$coin_type}&created=". time() ."&method={$method}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 获取委托详情
 */
function order_info(){
	global $access_key, $secret_key, $base_url;

	$method_name = "获取委托详情";
	$method = "order_info";
	$coin_type = 1; //币种 1 比特币 2 莱特币
	$id = 21; //委托订单ID

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&coin_type={$coin_type}&created=". time() ."&id={$id}&method={$method}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"id" => $id,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 买入
 */
function order_buy(){
	global $access_key, $secret_key, $base_url;

	$method_name = "买入";
	$method = "buy";
	$coin_type = 1; //币种 1 比特币 2 莱特币
	$price = 3000; //买入价格
	$amount = 1; //买入数量
	$trade_password = "pass1234"; //此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$trade_id = "123456"; //此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&method={$method}&price={$price}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"amount" => $amount,
		"price" => $price,
		"trade_password" => $trade_password,
		"trade_id" => $trade_id,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 卖出
 */
function order_sell(){
	global $access_key, $secret_key, $base_url;

	$method_name = "卖出";
	$method = "sell";
	$coin_type = 1; //币种 1 比特币 2 莱特币
	$price = 3000; //卖出价格
	$amount = 1; //卖出数量
	$trade_password = "pass1234"; //此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$trade_id = "123456"; //此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&method={$method}&price={$price}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"amount" => $amount,
		"price" => $price,
		"trade_password" => $trade_password,
		"trade_id" => $trade_id,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 买入(市价单)
 */
function order_buy_market(){
	global $access_key, $secret_key, $base_url;

	$method_name = "买入(市价单)";
	$method = "buy_market";
	$coin_type = 1; //币种 1 比特币 2 莱特币
	$amount = 1; //卖出数量
	$trade_password = "pass1234"; //此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$trade_id = "123456"; //此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&method={$method}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"amount" => $amount,
		"trade_password" => $trade_password,
		"trade_id" => $trade_id,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 卖出(市价单)
 */
function order_sell_market(){
	global $access_key, $secret_key, $base_url;

	$method_name = "卖出(市价单)";
	$method = "sell_market";
	$coin_type = 1; //币种 1 比特币 2 莱特币
	$amount = 1; //卖出数量
	$trade_password = "pass1234"; //此项不参与sign签名过程，如果开启下单时输入资金密码，必须传此参数
	$trade_id = 123456; //此项不参与sign签名过程，用户自定义订单号为数字(最多15位，唯一值)

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&method={$method}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"amount" => $amount,
		"trade_password" => $trade_password,
		"trade_id" => $trade_id,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 取消委托单
 */
function cancel_order(){
	global $access_key, $secret_key, $base_url;

	$method_name = "取消委托单";
	$method = "cancel_order";
	$coin_type = 1; //币种 1 比特币 2 莱特币
	$id = 1; //要取消的委托id

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&coin_type={$coin_type}&created=". time() ."&id={$id}&method={$method}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"id" => $id,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 修改订单
 */
function modify_order(){
	global $access_key, $secret_key, $base_url;

	$method_name = "修改订单";
	$method = "modify_order";
	$coin_type = 1; //币种 1 比特币 2 莱特币
	$id = 1; //委托单ID
	$amount = 1; //下单数量
	$price = 3000; //下单价格


	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&amount={$amount}&coin_type={$coin_type}&created=". time() ."&id={$id}&method={$method}&price={$price}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
		"id" => $id,
		"amount" => $amount,
		"price" => $price,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 查询个人最新10条成交订单
 */
function get_new_deal_orders(){
	global $access_key, $secret_key, $base_url;

	$method_name = "查询个人最新10条成交订单";
	$method = "get_new_deal_orders";
	$coin_type = 1; //币种 1 比特币 2 莱特币

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&coin_type={$coin_type}&created=". time() ."&method={$method}&secret_key={$secret_key}"),//MD5签名结果
		"coin_type" => $coin_type,
	);

	$res = curl($base_url, $post);
	echo_msg($method_name, $res);
}

/**
 * 根据trade_id查询oder_id
 */
function get_order_id_by_trade_id(){
	global $access_key, $secret_key, $base_url;

	$method_name = "根据trade_id查询oder_id";
	$method = "get_order_id_by_trade_id";
	$coin_type = 1; //币种 1 比特币 2 莱特币
	$trade_id = 123456; //调用下单接口时的参数trade_id

	$post = array(
		"access_key" => $access_key,
		"method" => $method,
		"created" => time(),
		"sign" => md5("access_key={$access_key}&coin_type={$coin_type}&created=". time() ."&method={$method}&secret_key={$secret_key}&trade_id={$trade_id}"),//MD5签名结果
		"coin_type" => $coin_type,
		"trade_id" => $trade_id,
	);
	$res = curl($base_url, $post);
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
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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