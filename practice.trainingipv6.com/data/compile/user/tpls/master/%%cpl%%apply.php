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
				<!-- <li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li> -->
				<li class="active">认证管理</li>
			</ul>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>认证名称</th>
						<th>用户名</th>
						<th>姓名</th>
						<th>邮箱</th>
						<th>护照/身份证</th>
						<th>电话</th>
						<th>时间</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php $uid = 0;
 foreach($this->tpl_var['data'] as $key => $apply){ 
 $uid++; ?>
					<tr>
						<td><?php echo $apply['certifiedName']; ?></td>
						<td><?php echo $apply['username']; ?></td>
						<td><?php echo $apply['name']; ?></td>
						<td><?php echo $apply['email']; ?></td>
					<!-- 	<td><?php echo $user['userregip']; ?></td>
						<td><?php echo $user['usercoin']; ?></td> -->
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
						<td>
							<div class="btn-group">
								<a class="btn" title="查看详情" href="index.php?user-master-apply-detail&applyid=<?php echo $apply['applyid']; ?>">
									<em class="icon-info-sign"></em>
								</a>
								<a class="ajax btn" title="审核通过" href="index.php?user-master-apply-status&applyid=<?php echo $apply['applyid']; ?>&status=1">
									<em class="icon-plus-sign"></em>
								</a>
								<a class="ajax btn" title="审核不通过" href="index.php?user-master-apply-status&applyid=<?php echo $apply['applyid']; ?>&status=2">
									<em class="icon-minus-sign"></em>
								</a>
								<a class="ajax btn" title="删除" href="index.php?user-master-apply-delete&applyid=<?php echo $apply['applyid']; ?>"> 
									<em class="icon-remove-sign"></em>
								</a>			
									
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="pagination pagination-right">
				<ul><?php echo $this->tpl_var['users']['pages']; ?></ul>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>
<script>
	$(document).ready(function(){
		$('.table tbody tr').each(function(){
			var character = $(this).children('td').eq(3).html();
			if(character == '普通用户'){
				$(this).css('display','none');
			}
		})
	})
</script>