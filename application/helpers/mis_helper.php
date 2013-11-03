<?php
/**
 * @package 美团SEO优化站
 * @author houhuiyang@sankuai.com
 * @copyright Sankuai Ltd.
 * @modified 2011-11-15
 * @todo 系统帮助函数
 */

/* 对象转数组 */
function objtoarr($arr) {
	if(!empty($arr)) {
		$tmp = array();
		foreach($arr as $key => $val) {
			if(!is_object($val)) {
				$tmp[$key] = $val;
			} else {
				$tmp[] = (array)$val;
			}
		}
		return $tmp;
	}
}

/* 分类多维数组 */
function mtsort($arr) {
	//初始化数组
	$a = $a0 = $a1 = $a2 = array();
	foreach($arr as $value) {
		$a0[$value['id']] = $value;
		$a1[$value['level']][$value['id']] = $value; //层级
	}
	//树形数组
	$num = count($a1);
	for ($i = $num; $i >= 0; $i--) {
		if(isset($a1[$i])) {
			foreach((array)$a1[$i] as $key => $value) {
				if ($i == 1) {
					$a2[] = $a0[$key];
				} else {
					$a0[$value['sortparent']]['nodes'][] = $a0[$key];
				}
			}
		}
		//检查空数组
	}
	return $a2;
}

//递归输出多维数组的JSON格式
function arrayrecursive(&$array, $function, $apply_to_keys_also = false) {
	static $recursive_counter = 0;
	if(++$recursive_counter > 1000) {
		die('possible deep recursion attack');

	}
	foreach($array as $key => $value) {
		if(is_array($value)) {
			arrayrecursive($array[$key], $function, $apply_to_keys_also);
		} else {
			$array[$key] = $function($value);
		}
		if($apply_to_keys_also && is_string($key)) {
			$new_key = $function($key);
			if($new_key != $key) {
				$array[$new_key] = $array[$key];
				unset($array[$key]);
			}
		}
	}
	$recursive_counter--;
}

/* 分页函数 */
function pagelink($total,$pagesize,$page,$url,$str) {
	$msg = " <div id=\"pages\"> ";
	$count	= ceil($total/$pagesize);
	$msg .=	"共 ".$total." ".$str."　当前：第".$page."/".$count."页　";
	if($page ==	1) {
		$msg .=	"首页　上一页　";
	} else {
		$msg .=	"<a href='".$url."page=1'>首页</a>　<a href='".$url."page=".($page-1)."'>上一页</a>　";
	}
	if($page ==	$count	||	$count	==	0) {
		$msg .= "下一页　末页　";
	} else {
		$msg .=	"<a href='".$url."page=".($page + 1)."'>下一页</a>　<a href='".$url."page=".$count."'>末页</a>　";
	}
	$msg .=	"跳转到<select name=p onchange=\"javascript:window.location='".$url."&page='+(this.options[this.selectedIndex].value)\">";
	for($i = 1 ;$i <= $count ;$i ++) {
		if($i == $page) {
			$msg .= "<option value=".$i." selected>第".$i."页</option>";
		} else {
			$msg .= "<option value=".$i.">第".$i."页</option>";
		}
	}
	$msg .=	"</select></div>";
	return $msg;
}

/* Select 只要ID和Name */
function tagselect($arr,$s) {
	$a1 = array();
	foreach((array)$arr as $key => $val) {
		$a1[$val['id']] = $val[$s];
		unset($val);
	}
	return $a1;
}

/* 转向函数 */
function jump($msg,$url = "") {
	if(empty($url)) {
		$url = $_SERVER['HTTP_REFERER'];
	} else {
		$url = base_url().$url;
	}
	echo $msg;
	header("Content-type:text/html;charset=utf-8");
	die("<meta http-equiv='Refresh' content='1;url=".strval($url)."'>");
}

/* 提取分页统一的属性 pageunified($_GET['type'],$_GET['page']) */
function pageunified($type,$page,$s,$add = 0 , $xz = '' ,$d1='',$d2 ='' ) {
	//提取参数
	$type = empty($type) ? '' : strval($type);
	$xz = empty($xz) ? '' : strval($xz);
	$page = empty($page) ? 1 : intval($page);
	$d1 = empty($d1)?  '' : strval($d1);
	$d2 = empty($d2)?  '' : strval($d2);
	if($page == 1) {
		$startnum = 0;
	} else {
		$startnum = ($page - 1) * (PageSize+$add);
	}
	if(!empty($type)) {
		if(!empty($xz)) {
			$string = base_url().$s.'?type='.$type.'&xz='.$xz.'&';
		} else {
			$string = base_url().$s.'?type='.$type.'&';
		}
	} else {
		$string = base_url().$s.'?';
	}
	if(!empty($d1) || !empty($d2)){
		$string .= 'd1='. $d1 . '&d2='.$d2 .'&';
	}
	//分页列表
	return array('type' => $type, 'startnum' => $startnum, 'page' => $page, 'string' => $string);
}


/*
获取用户IP
*/
function getuip() {
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
		$sIp = getenv('HTTP_CLIENT_IP');
	} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
		$sIp = getenv('HTTP_X_FORWARDED_FOR');
	} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
		$sIp = getenv('REMOTE_ADDR');
	} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
		$sIp = $_SERVER['REMOTE_ADDR'];
	}
	return preg_match("/[\d\.]{7,15}/", $sIp, $aMatches) ? $aMatches[0] : 'None';
}
/*
* 扩展三级目录显示 (不规范)
 */

function check_parent($id) {
	if ( !$id ) return 0;
	$CI =& get_instance() ;
	$CI -> load -> model('tag_model','t') ;
	$cid = $CI -> t ->check_id($id);
	return $cid;
}

function encodeUTF8(&$array){
	foreach($array as $key=>$value){
		if(!is_array($value)){
			$array[$key]=mb_convert_encoding($value,"UTF8","GBK");
		}else{
			encodeUTF8($array[$key]);
		}
	}
	return $array;
}
/*重写上传图片*/
function upload_img($input,$image='',$dir='meituan'){
	$z = $_FILES[$input];
	if ($z && strpos($z['type'], 'image')===0 && $z['error']==0) {
		if(!$image){
			$image = time().rand(1000,9999).'.jpg';
			$path = getcwd()."/attached/{$dir}/" .$image;
			move_uploaded_file($z['tmp_name'], $path);
			return $image;
		}	
	}
	return $image;
}

/*增加电影城市*/
function showmovie($city){
	if(!$city) return false;
	$sacity = array(
		'bj' => '北京',
		'sh' => '上海',
		'gz' => '广州',
		'sz' => '深圳',
		'tj' => '天津',
		'cd' => '成都',
		'hz' => '杭州',
		'nj' => '南京',
		'wh' => '武汉',
		'xa' => '西安',
		'cq' => '重庆',	
	);	
	if(in_array($city,$sacity))  return true;
	return false;
}
/* 获取 美团cdn图片地址*/
function getImgUrl($method,$url,$header,$post_data){
    $me = ($method == 'POST') ? 'true' : 'false';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE );
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result);
}
//查询链接所在tag目录
function check_link($id) {
    if ($id === 0) return '首页';
    if ($id === 8888) return 'review';
    if ($id === 9999) return 'brand';
    $ids = explode(";",$id);
    $CI =& get_instance() ;
	$CI -> load -> model('tag_model','t') ;
    $cid = '';
    foreach($ids as $key=>$val){
        if($val == 0 ) {
            $cid .= '首页,';
        }else if($val == 8888){
            $cid .= 'review,';
        }else if($val == 9999){
            $cid .= 'brand,';
        }else{
	        $cid .= $CI -> t ->gettagname($val).",";
	    }
    }
    $cid = substr($cid,0,-1); 
    return $cid;
}

//查询brand
function getBrand($typeid, $objid){
    if(empty($typeid)) return array();
    $CI =& get_instance() ;
	$CI -> load -> model('brand_model','b') ;
	$b = $CI -> b -> getBrandFromMT($typeid);
    if (count($b) <= 10) {
        return $b;
    }
    $brands = array();
    foreach ($b as $key => $val) {
        if ($objid%10 == $key%10) {
            $brands[] = $val;
        }
    }
    return $brands;
}
