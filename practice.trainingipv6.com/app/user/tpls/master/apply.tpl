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
				<!-- <li><a href="index.php?{x2;$_app}-master">{x2;$apps[$_app]['appname']}</a> <span class="divider">/</span></li> -->
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
					{x2;tree:$data,apply,uid}
					<tr>
						<td>{x2;v:apply['certifiedName']}</td>
						<td>{x2;v:apply['username']}</td>
						<td>{x2;v:apply['name']}</td>
						<td>{x2;v:apply['email']}</td>
					<!-- 	<td>{x2;v:user['userregip']}</td>
						<td>{x2;v:user['usercoin']}</td> -->
						<td>{x2;v:apply['passport']}</td>
						<td>{x2;v:apply['phone']}</td>
						<td>{x2;date:v:apply['applyTime'],'Y-m-d'}</td>
						<td>
							{x2;if:v:apply['status'] == 0}
								审核中
							{x2;elseif:v:apply['status'] == 1}
								审核通过
							{x2;elseif:v:apply['status'] == 2}
								审核不通过
							{x2;endif}
						</td>
						<td>
							<div class="btn-group">
								<a class="btn" title="查看详情" href="index.php?user-master-apply-detail&applyid={x2;v:apply['applyid']}">
									<em class="icon-info-sign"></em>
								</a>
								<a class="ajax btn" title="审核通过" href="index.php?user-master-apply-status&applyid={x2;v:apply['applyid']}&status=1">
									<em class="icon-plus-sign"></em>
								</a>
								<a class="ajax btn" title="审核不通过" href="index.php?user-master-apply-status&applyid={x2;v:apply['applyid']}&status=2">
									<em class="icon-minus-sign"></em>
								</a>
								<a class="ajax btn" title="删除" href="index.php?user-master-apply-delete&applyid={x2;v:apply['applyid']}"> 
									<em class="icon-remove-sign"></em>
								</a>			
									
							</div>
						</td>
					</tr>
					{x2;endtree}
				</tbody>
			</table>
			<div class="pagination pagination-right">
				<ul>{x2;$users['pages']}</ul>
			</div>
{x2;if:!$userhash}
		</div>
	</div>
</div>
</body>
</html>
{x2;endif}
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