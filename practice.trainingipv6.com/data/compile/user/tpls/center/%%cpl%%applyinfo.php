<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="span2 exambox">
			<div class="examform">
				<div>
					<?php $this->_compileInclude('menu'); ?>
				</div>
			</div>
		</div>
		<div class="span10 exambox" id="datacontent">
			<div class="examform">
				<div>
					<ul class="breadcrumb">
						<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-app">用户中心</a> <span class="divider">/</span></li>
						<li class="active">认证信息</li>
					</ul>
					<div class="row-fluid">
						<div class="span12">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>认证名称</th>
										<th>姓名</th>
										<th>邮箱</th>
										<th>护照/身份证</th>
										<th>电话</th>
										<th>时间</th>
										<th>状态</th>
									</tr>
								</thead>
								<tbody>
									<?php $aid = 0;
 foreach($this->tpl_var['applyinfo'] as $key => $apply){ 
 $aid++; ?>
									<tr>
										<td><?php echo $apply['certifiedName']; ?></td>
										<td><?php echo $apply['name']; ?></td>
										<td><?php echo $apply['email']; ?></td>
										<td><?php echo $apply['passport']; ?></td>
										<td><?php echo $apply['phone']; ?></td>
										<td><?php echo date('Y-m-d',$apply['applyTime']); ?></td>
										<td>
											<?php if($apply['status'] == 0){ ?>
												审核中
											<?php } elseif($apply['status'] == 1){ ?>
												审核通过
											<?php } elseif($apply['status'] == 2){ ?>
												审核不通过
											<?php } ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>