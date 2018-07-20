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
						<li class="active">订单支付</li>
					</ul>
					<div class="row-fluid">
						<div class="span12">
							<h5>订单号：<?php echo $this->tpl_var['order']['ordersn']; ?></h5>
							<table class="table table-bordered">
								<thead>
									<td>课程</td>
									<td>金额</td>
									<!-- <td>可兑换积分</td> -->
									<td>下单时间</td>
									<td>订单状态</td>
								</thead>
								<tr>
									<td><?php echo $this->tpl_var['order']['basic']; ?></td>
									<td><?php echo $this->tpl_var['order']['orderprice']; ?></td>
									<!-- <td><?php echo $this->tpl_var['order']['orderprice']*10; ?></td> -->
									<td><?php echo date('Y-m-d',$this->tpl_var['order']['ordercreatetime']); ?></td>
									<td><?php echo $this->tpl_var['orderstatus'][$this->tpl_var['order']['orderstatus']]; ?></td>
								</tr>
								<tr>
									<td colspan="4"><p class="text-right">应付款：￥<?php echo $this->tpl_var['order']['orderprice']; ?></p></td>
								</tr>
							</table>
							<p class="text-right">
								<?php if($this->tpl_var['order']['orderstatus'] == 1){ ?>
									<a class="btn btn-danger" href="<?php echo $this->tpl_var['payforurl']; ?>" target="_blank">去支付</a>
								<?php } else { ?> 
									<a class="btn btn-primary" href="index.php">去学习</a>
								<?php } ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>