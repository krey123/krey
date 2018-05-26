# 无限极菜单分类
$arr = array(['id'=>1,'name'=>'电视','pid'=>0],
 ['id'=>2,'name'=>'手机','pid'=>0],['id'=>3,'name'=>'三星','pid'=>2]
)
function getTree($arr,$pid = 0,$step = 0){
	global $tree;
	foreach($arr as $key=>$val){
		if($val['pid'] == $pid){
			$flag = str_repeat('-',$step);
			$val['name'] = $flag.$val['name'];
			$tree[] = $val;
			getTree($arr, $val['id'], $step + 1);
		}
	}
	return $tree;	
}

# 第二种情况
function make_tree($list,$pk='id',$pid='pid',$child='_child',$root=0){
	$tree = array();
	$packData = array();
	foreach($list as $data){
		$packData[$data[$pk]] = $data;
	}
	foreach($packData as $key => $val){
		if($val[$pid]==$root){
			$tree[] = &$packData[$key];
		}else{
			$packData[$val[$pid][$child]][] = &$packData[$key];
		}
	}
	return $tree;
}
