{x2;include:header}
<body>
{x2;include:nav}
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="span2 exambox">
			<div class="examform">
				<div>
					{x2;include:menu}
				</div>
			</div>
		</div>
		<div class="span10 exambox" id="datacontent">
			<div class="examform">
				<div>
					<ul class="breadcrumb">
						<li><a href="index.php?{x2;$_app}-app">用户中心</a> <span class="divider">/</span></li>
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
									{x2;tree:$applyinfo,apply,aid}
									<tr>
										<td>{x2;v:apply['certifiedName']}</td>
										<td>{x2;v:apply['name']}</td>
										<td>{x2;v:apply['email']}</td>
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
									</tr>
									{x2;endtree}
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