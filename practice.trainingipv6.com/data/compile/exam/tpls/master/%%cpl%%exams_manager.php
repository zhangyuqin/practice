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
				<li class="active">考场选择</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">考场选择</a>
				</li>
			</ul>
	        <form action="index.php?exam-teach-users-basics" method="post" class="form-inline">
				<table class="table">
					<thead>
						<tr>
							<th colspan="6">搜索</th>
						</tr>
					</thead>
					<tr>
						<td>
							考场ID：
						</td>
						<td>
							<input name="search[basicid]" class="inline" type="text" class="number" value="<?php echo $this->tpl_var['search']['basicid']; ?>"/>
						</td>
						<td>
							关键字：
						</td>
						<td>
							<input name="search[keyword]" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
						</td>
			        </tr>
			        <tr>
						<td>
							科目：
						</td>
						<td>
			        		<select name="search[basicsubjectid]">
			        		<option value="0">选择科目</option>
					  		<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
					  		<option value="<?php echo $subject['subjectid']; ?>"<?php if($subject['subjectid'] == $this->tpl_var['search']['basicsubjectid']){ ?> selected<?php } ?>><?php echo $subject['subject']; ?></option>
					  		<?php } ?>
					  		</select>
			        	</td>
						<td>
							<button class="btn btn-primary" type="submit">搜索</button>
							<input type="hidden" value="1" name="search[argsmodel]" />
							<input type="hidden" value="<?php echo $this->tpl_var['userid']; ?>" name="userid" />
						</td>
						<td></td>
					</tr>
				</table>
			</form>
	        <table class="table table-hover">
	            <thead>
	                <tr>
	                    <th>考场ID</th>
				        <th>考场名称</th>
				       <!--  <th>考场地区</th> -->
				        <th>考试科目</th>
				        <th>状态</th>
				        <th>操作</th>
	                </tr>
	            </thead>
	            <tbody>
                    <?php $bid = 0;
 foreach($this->tpl_var['basics']['data'] as $key => $basic){ 
 $bid++; ?>
			        <tr>
						<td>
							<?php echo $basic['basicid']; ?>
						</td>
						<td>
							<?php echo $basic['basic']; ?>
						</td>
					<!-- 	<td>
							<?php echo $this->tpl_var['areas'][$basic['basicareaid']]['area']; ?>
						</td> -->
						<td>
							<?php echo $this->tpl_var['subjects'][$basic['basicsubjectid']]['subject']; ?>
						</td>
						<td>
							<?php if($basic['basicopen']){ ?>已开启<?php } else { ?>未开启<?php } ?>
						</td>
						<td>
							<?php if($basic['basicopen']){ ?><a class="ajax btn" title="关闭考场" href="index.php?exam-master-exammanager-closebasics&basicid=<?php echo $basic['basicid']; ?>"><em class="icon-minus-sign"></em></a><?php } else { ?><a class="ajax btn" href="index.php?exam-master-exammanager-openbasics&basicid=<?php echo $basic['basicid']; ?>" title="开启考场"><em class="icon-plus-sign"></em></a><?php } ?>
						</td>
			        </tr>
			        <?php } ?>
	        	</tbody>
	        </table>
	        <div class="pagination pagination-right">
	            <ul><?php echo $this->tpl_var['basics']['pages']; ?></ul>
	        </div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>