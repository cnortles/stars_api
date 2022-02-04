<?php 
echo '<meta name="referrer" content="never">';
$img_type = $_GET['type'];
$url_404='https://pan.cnortles.top/';
if (isset($img_type)) {
		//获取USER AGENT
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		//分析数据	
		$is_pc = (stripos($agent, 'windows nt')) ? true : false;	
		$is_iphone = (stripos($agent, 'iphone')) ? true : false;	
		$is_ipad = (stripos($agent, 'ipad')) ? true : false;	
		$is_android = (stripos($agent, 'android')) ? true : false;
		$is_linux = (stripos($agent, 'linux')) ? true : false;	
		$is_harmonyOS = (stripos($agent, 'harmonyOS')) ? true : false;
		//输出数据	
		if($is_linux && $is_android){
			img($img_type."/mobile.txt");	
		}
		if($is_linux && $is_harmonyOS){
			img($img_type."/mobile.txt");	
		}		
		if($is_linux && !$is_android && !$is_harmonyOS){
			img($img_type."/pc.txt");	
		}	
		if($is_pc){
			img($img_type."/pc.txt");	
		}	
		if($is_iphone){	
			img($img_type."/mobile.txt");	
		}	
		if($is_ipad){
			img($img_type."/mobile.txt");
		}	
		if($is_android){	
			img($img_type."/mobile.txt");	
		}
	
}
else {
	echo '您的参数有问题！';
}

function img($filename){
	if (file_exists($filename)) {
		$str = explode("\n", file_get_contents($filename));
		// 2.得到的$str是一个String的数组，然后获取随机数index
		$rand_index = rand(0,count($str)-1);
		// 根据生成的随机数选取index为$rand_index的图片链接
		$url = $str[$rand_index];
		// 3.重定向到目标url,返回302码,然后浏览器就会跳转到图片url的地址
			die(header("Location:".$url)); 
		// 替换掉一些换行、制表符等转义
	}
	else {
		echo '您所请求'.$img_type.'类型的图片我们暂未收录';
		die(header("Location:".$url_404));
	}
}
function str_re($str){
	$str = str_replace(' ', "", $str);
	$str = str_replace("\n", "", $str);
    $str = str_replace("\t", "", $str);
	$str = str_replace("\r", "", $str);
	return $str;
	 }
?>