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
				<li class="active">认证管理/详细信息</li>
			</ul>
			<div class="form-horizontal">
				<div class="control-group">
					<label for="" class="control-label">certifiedName:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['certifiedName']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">name:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['name']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">salutation:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['salutation']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">email:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['email']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">passport:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['passport']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">phone:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['phone']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">company:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['company']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">country:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['country']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">department:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['department']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">designation:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['designation']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">tel:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['tel']; ?>
					</div>
				</div>

				<div class="control-group">
					<label for="" class="control-label">fax:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['fax']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">address:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['address']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">postcode:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['postcode']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">industrialRole:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['industrialRole']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">organizationType:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['organizationType']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">companyType:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['companyType']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">companyScale:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['companyScale']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">companyOtherDetails:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['companyOtherDetails']; ?>
					</div>
				</div>

				<div class="control-group">
					<label for="" class="control-label">experience:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['experience']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">certificationOtherDetails:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['certificationOtherDetails']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">applyTime:</label>
					<div class="controls">
						<?php echo date('Y-m-d',$this->tpl_var['applyinfo']['applyTime']); ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">status:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['status']; ?>
					</div>
				</div>
				<div class="control-group">
					<label for="" class="control-label">username:</label>
					<div class="controls">
						<?php echo $this->tpl_var['applyinfo']['username']; ?>
					</div>
				</div>

			</div>
			



		<!-- 	<div class="pagination pagination-right">
			<ul><?php echo $this->tpl_var['users']['pages']; ?></ul>
		</div> -->
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>
