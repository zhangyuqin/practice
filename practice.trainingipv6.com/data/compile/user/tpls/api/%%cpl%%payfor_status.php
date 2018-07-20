<?php $this->_compileInclude('header'); ?>
<body>
<div class="row-fluid top">
	<div class="container">
		<div class="span7">  
			<h2>IPv6论坛认证网络工程师考试系统</h2>
			<h3 style="font-size:14px;">IPv6 Forum Certified Network Engineer Examination System</h3>
		</div>
		<div class="span5">
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="container logcontent">
		<div class="logbox">
			<form class="form-horizontal logform" method="post" action="index.php?user-app-login">
				<fieldset>
					<legend>订单号：<?php echo $this->tpl_var['order']['ordersn']; ?></legend>
					<div class="logcontrol">
						<p class="text-center">
							<?php if($this->tpl_var['status']){ ?>
							<a class="btn btn-success" href="index.php?user-center-payfor-orderdetail&ordersn=<?php echo $this->tpl_var['order']['ordersn']; ?>">付款成功，查看订单详情</a>
							<?php } else { ?>
							<a class="btn btn-danger" href="index.php?item-app-order-lists">付款失败</a>
							<a class="btn" href="index.php?user-center-payfor">查看充值记录</a>
							<?php } ?>
						</p>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="logbotm"></div>
	</div>
</div>
<?php $this->_compileInclude('foot'); ?>
</body>
</html>