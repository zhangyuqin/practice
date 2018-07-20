{x2;if:!$userhash}
{x2;include:header}
<body>
{x2;include:nav}
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			{x2;include:menu}
		</div>
		<div class="span10" id="datacontent">
{x2;endif}
			<ul class="breadcrumb">
				<li><a href="index.php?{x2;$_app}-master">{x2;$apps[$_app]['appname']}</a> <span class="divider">/</span></li>
				<li class="active">模拟考试记录</li>
			</ul>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>课程名称</th>
						<th>答题时间</th>
						<th>用时</th>
						<th>得分</th>
						<th>错题数量</th>
						<th>删除记录</th>
					</tr>
				</thead>
				<tbody>
					{x2;tree:$exams['data'],exam,eid}
					<tr>
						<td>{x2;v:exam['ehexam']}</td>
						<td>{x2;date:v:exam['ehstarttime'],'Y-m-d'}</td>
						<td>{x2;if:v:exam['ehtime'] >= 60}{x2;if:v:exam['ehtime']%60}{x2;eval: echo intval(v:exam['ehtime']/60)+1}{x2;else}{x2;eval: echo intval(v:exam['ehtime']/60)}{x2;endif}分钟{x2;else}{x2;v:exam['ehtime']}秒{x2;endif}</td>
                        <td><b class="red">{x2;if:!v:exam['ehstatus'] && v:exam['ehdecide']}评分中{x2;else}{x2;v:exam['ehscore']}{x2;endif}</b></td>
						<td><b class="red">{x2;v:exam['errornumber']}</b></td>
						<td>
							{x2;if:$ehtype != 2}
							<a href="javascript:;" onclick="javascript:delhistory({x2;v:exam['ehid']},{x2;v:exam['ehuserid']},{x2;v:exam['ehbasicid']})">删除</a>
							{x2;else}
							-
							{x2;endif}
						</td>
					</tr>
					{x2;endtree}
				</tbody>
			</table>
			<div class="pagination pagination-right">
				<ul>{x2;$exams['pages']}</ul>
			</div>
{x2;if:!$userhash}
		</div>
	</div>
</div>
</body>
</html>
{x2;endif}
<script>
var delhistory = function(ehid,userid,basicsid)
{
 	$.get("index.php?user-master-examhistory-del&ehid="+ehid+"&userid="+userid+"basicsid="+basicsid+"&rand"+Math.random(),function(data){
 		console.log(data);
 		alert('删除成功');window.location.reload();});
}
</script>