<?php
	//链接数据库
	include("config.php");
	
	//获取操作类别
	$action=$_GET['action'];
	
	//查询排名结果
	if($action=='showRanking'){
		$rank_result=mysql_query('select * from tetris_rank order by score desc limit 8');
		$rank_num=mysql_num_rows($rank_result);
		if($rank_num>0){
			for($i=0;$i<$rank_num;$i++){
				$rank_rows[$i]=mysql_fetch_array($rank_result);
			}
		}
		echo json_encode($rank_rows);
	}
	
	//新增记录
	if($action=='addRecord'){
		//获取玩家信息
		$player=$_POST['player'];
		$score=$_POST['score'];
		$playTime=$_POST['playTime'];
		//转换游戏时间
		if($playTime<60){
			$playTime=$playTime."秒";
		}
		else{
			$playTime=(int)($playTime/60)."分".($playTime%60)."秒";
		}
		//增加数据库记录
		if(mysql_query("insert into tetris_rank(player,score,playTime,createTime) values('$player','$score','$playTime',NOW()) "))
			echo 'ok';
		else
			echo 'false';
	}
?>