<?php $this->_compileInclude('header'); ?><body><?php $this->_compileInclude('nav'); ?><div class="container-fluid">	<div class="row-fluid">		<div class="span2">			<?php $this->_compileInclude('menu'); ?>		</div>		<div class="span10">			<ul class="breadcrumb">				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li>				<li class="active">首页</li>			</ul>			<div class="row-fluid">				<div class="span6">					<div class="well">						<h5>							开发者信息						</h5>						<p>							BII Testing Center						</p>					</div>				</div>				<div class="span6">				</div>			</div>		</div>	</div></div></body></html>