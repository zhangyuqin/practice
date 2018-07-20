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
				<!-- <li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-teach"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li> -->
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exammanager-score">成绩管理</a> <span class="divider">/</span></li>
				<li class="active">成绩统计</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">成绩统计</a>
				</li>
				<li class="pull-right">
					<a class="ajax" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exammanager-outscore&basicid=<?php echo $this->tpl_var['basicid']; ?>">导出成绩</a>
				</li>
			</ul>
	        <table class="table table-hover">
	            <thead>
	                <tr>
	                    <th>ID</th>
	                    <th>考生用户名</th>
	                    <th>分数</th>
				        <th>考试名称</th>
				        <th>考试时间</th>
				        <th>组卷类型</th>
	                </tr>
	            </thead>
	            <tbody>
                    <?php $eid = 0;
 foreach($this->tpl_var['exams']['data'] as $key => $exam){ 
 $eid++; ?>
			        <tr>
						<td>
							<?php echo $exam['ehid']; ?>
						</td>
						<td>
							<?php echo $exam['ehusername']; ?>
						</td>
						<td>
							<?php echo $exam['ehscore']; ?>
						</td>
						<td>
							<?php echo $exam['subject']; ?>
						</td>
						<td>
							<?php echo date('Y-m-d',$exam['ehstarttime']); ?>
						</td>
						<td>
							<?php if($exam['ehtype'] == 1){ ?>随机组卷<?php } else { ?>手工组卷<?php } ?>
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