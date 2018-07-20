<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<?php $this->_compileInclude('menu'); ?>
		</div>
		<div class="span10" id="datacontent">
<?php } ?>
			<ul class="breadcrumb">
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li>
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
					<?php $eid = 0;
 foreach($this->tpl_var['exams']['data'] as $key => $exam){ 
 $eid++; ?>
					<tr>
						<td><?php echo $exam['ehexam']; ?></td>
						<td><?php echo date('Y-m-d',$exam['ehstarttime']); ?></td>
						<td><?php if($exam['ehtime'] >= 60){ ?><?php if($exam['ehtime']%60){ ?><?php echo intval($exam['ehtime']/60)+1; ?><?php } else { ?><?php echo intval($exam['ehtime']/60); ?><?php } ?>分钟<?php } else { ?><?php echo $exam['ehtime']; ?>秒<?php } ?></td>
                        <td><b class="red"><?php if(!$exam['ehstatus'] && $exam['ehdecide']){ ?>评分中<?php } else { ?><?php echo $exam['ehscore']; ?><?php } ?></b></td>
						<td><b class="red"><?php echo $exam['errornumber']; ?></b></td>
						<td>
							<?php if($this->tpl_var['ehtype'] != 2){ ?>
							<a href="javascript:;" onclick="javascript:delhistory(<?php echo $exam['ehid']; ?>,<?php echo $exam['ehuserid']; ?>,<?php echo $exam['ehbasicid']; ?>)">删除</a>
							<?php } else { ?>
							-
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="pagination pagination-right">
				<ul><?php echo $this->tpl_var['exams']['pages']; ?></ul>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>
<script>
var delhistory = function(ehid,userid,basicsid)
{
 	$.get("index.php?user-master-examhistory-del&ehid="+ehid+"&userid="+userid+"basicsid="+basicsid+"&rand"+Math.random(),function(data){
 		console.log(data);
 		alert('删除成功');window.location.reload();});
}
</script>