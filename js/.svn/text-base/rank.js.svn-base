//-------------- 有关积分排名的js --------------------//

//加载并显示排名
function loadRanking(){
	//异步提交请求
	$.ajax({
		url: 'admin/rank.php?action=showRanking',
		type: 'POST',
		dataType: 'json',
		timeout: 1000,
		error: function(){
			alert('加载排名失败');
		},
		success: function(data){
			var $rankTbody=$('#rankTable tbody');
			$rankTbody.empty();
			var playerNum=data.length;
			for(var i=0;i<playerNum;i++){
				var playerRow='<tr><td>'+(i+1)+'</td><td>'+data[i].player+'</td><td>'+data[i].score+'</td><td>'+data[i].playTime+'</td><td>'+data[i].createTime+'</td></tr>';
				$rankTbody.append(playerRow);
			}
		}
	});
};

//添加新的玩家记录
function submitScore(){
	//获取玩家信息
	var player=$('#player').val();
	if(player==''){
		alert('请填写名字');
		return false;
	}
	var score=tetris.score;
	var playTime=tetris.playTime;
	//异步提交分数
	$.ajax({
		url: 'admin/rank.php?action=addRecord',
		type: 'POST',
		data: 'player='+player+'&score='+score+'&playTime='+playTime,
		dataType: 'text',
		timeout: 1000,
		error: function(){
			alert('增加记录失败');
		},
		success: function(data){
			if(data=='ok'){
				loadRanking();
				$('#openWindow').fadeOut();
				$('#cover').fadeOut();
			}
			else{
				alert('操作失败，请重试');
			}
		}
	});
}

//取消弹出框
function cancel(){
	$('#openWindow').fadeOut();
	$('#cover').fadeOut();
}

//文档加载完毕后显示排名
$(document).ready(function(){loadRanking()});