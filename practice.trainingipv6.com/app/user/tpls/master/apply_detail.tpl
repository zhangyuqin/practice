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
				<li class="active">认证管理/详细信息</li>
			</ul>
			<div class="form-horizontal">
				<div class="control-group">
					<label for="" class="control-label">certifiedName:</label>
					<div class="controls">
						{x2;$applyinfo['certifiedName']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">name:</label>
					<div class="controls">
						{x2;$applyinfo['name']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">salutation:</label>
					<div class="controls">
						{x2;$applyinfo['salutation']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">email:</label>
					<div class="controls">
						{x2;$applyinfo['email']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">passport:</label>
					<div class="controls">
						{x2;$applyinfo['passport']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">phone:</label>
					<div class="controls">
						{x2;$applyinfo['phone']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">company:</label>
					<div class="controls">
						{x2;$applyinfo['company']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">country:</label>
					<div class="controls">
						{x2;$applyinfo['country']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">department:</label>
					<div class="controls">
						{x2;$applyinfo['department']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">designation:</label>
					<div class="controls">
						{x2;$applyinfo['designation']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">tel:</label>
					<div class="controls">
						{x2;$applyinfo['tel']}
					</div>
				</div>

				<div class="control-group">
					<label for="" class="control-label">fax:</label>
					<div class="controls">
						{x2;$applyinfo['fax']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">address:</label>
					<div class="controls">
						{x2;$applyinfo['address']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">postcode:</label>
					<div class="controls">
						{x2;$applyinfo['postcode']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">industrialRole:</label>
					<div class="controls">
						{x2;$applyinfo['industrialRole']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">organizationType:</label>
					<div class="controls">
						{x2;$applyinfo['organizationType']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">companyType:</label>
					<div class="controls">
						{x2;$applyinfo['companyType']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">companyScale:</label>
					<div class="controls">
						{x2;$applyinfo['companyScale']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">companyOtherDetails:</label>
					<div class="controls">
						{x2;$applyinfo['companyOtherDetails']}
					</div>
				</div>

				<div class="control-group">
					<label for="" class="control-label">experience:</label>
					<div class="controls">
						{x2;$applyinfo['experience']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">certificationOtherDetails:</label>
					<div class="controls">
						{x2;$applyinfo['certificationOtherDetails']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">applyTime:</label>
					<div class="controls">
						{x2;date:$applyinfo['applyTime'],'Y-m-d'}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">status:</label>
					<div class="controls">
						{x2;$applyinfo['status']}
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">username:</label>
					<div class="controls">
						{x2;$applyinfo['username']}
					</div>
				</div>

			</div>
			



		<!-- 	<div class="pagination pagination-right">
			<ul>{x2;$users['pages']}</ul>
		</div> -->
{x2;if:!$userhash}
		</div>
	</div>
</div>
</body>
</html>
{x2;endif}
