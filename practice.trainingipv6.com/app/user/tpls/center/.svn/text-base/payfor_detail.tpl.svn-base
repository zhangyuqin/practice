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
						<li class="active">订单支付</li>
					</ul>
					<div class="row-fluid">
						<div class="span12">
							<h5>订单号：{x2;$order['ordersn']}</h5>
							<table class="table table-bordered">
								<thead>
									<td>课程</td>
									<td>金额</td>
									<!-- <td>可兑换积分</td> -->
									<td>下单时间</td>
									<td>订单状态</td>
								</thead>
								<tr>
									<td>{x2;$order['basic']}</td>
									<td>{x2;$order['orderprice']}</td>
									<!-- <td>{x2;eval:echo $order['orderprice']*10}</td> -->
									<td>{x2;date:$order['ordercreatetime'],'Y-m-d'}</td>
									<td>{x2;$orderstatus[$order['orderstatus']]}</td>
								</tr>
								<tr>
									<td colspan="4"><p class="text-right">应付款：￥{x2;$order['orderprice']}</p></td>
								</tr>
							</table>
							<p class="text-right">
								{x2;if:$order['orderstatus'] == 1}
									<a class="btn btn-danger" href="{x2;$payforurl}" target="_blank">去支付</a>
								{x2;else} 
									<a class="btn btn-primary" href="index.php">去学习</a>
								{x2;endif}
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