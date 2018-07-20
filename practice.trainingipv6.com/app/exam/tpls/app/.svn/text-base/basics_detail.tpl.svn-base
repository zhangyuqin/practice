{x2;if:!$userhash}
{x2;include:header}
<body>
{x2;include:nav}
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="exambox" id="datacontent">
{x2;endif}
			<div class="examform">
				<ul class="breadcrumb">
					<li>
						<span class="icon-home"></span> <a href="index.php?exam">课程选择</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="index.php?exam-app-basics-open">开通课程</a> <span class="divider">/</span>
					</li>
					<li class="active">
						{x2;$basic['basic']}
					</li>
				</ul>
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#" data-toggle="tab">开通课程</a>
					</li>
				</ul>
				<div class="row-fluid">
					<div class="span1"></div>
					<div class="span3">
						<div class="thumbnail"><img alt="300x200" src="{x2;if:$basic['basicthumb']}{x2;$basic['basicthumb']}{x2;else}app/exam/styles/image/paper.png{x2;endif}" /></div>
					</div>
					<div class="span1"></div>
					<div class="span7">
						<div class="caption">
							<h3>{x2;$basic['basic']}</h3> 
							<p>&nbsp;</p>
							<p>科目：{x2;$subjects[$basic['basicsubjectid']]['subject']}</p>
							<p>地区：{x2;$areas[$basic['basicareaid']]['area']}</p>
							<!-- <p>价格：{x2;$price}</p>
							 <p>您现有积分：{x2;$_user['usercoin']} （<a href="index.php?user-center-payfor">支付宝充值</a> / <a href="#myModal" role="button" data-toggle="modal">代金券充值</a>）</p>
							{x2;if:$isopen}<p>到期时间：{x2;date:$isopen['obendtime'],'Y-m-d'}</p>{x2;endif} -->
							<p>课程介绍：</p>
							<p><pre>IPv6论坛认证网络工程师（银牌）是初级阶段的认证。该认证通过考核申请人对网络知识，主要是IPv6基础知识的掌握程度，为合格的申请人颁发证书。持有该证书，表明证书持有人具备IPv6专业能力。</pre> </p>
							<p>包含服务：</p>
							<pre>
							<p><b>三分练</b>：课后练习+强化训练+模拟考试</p>
							<p><b>两分问</b>：QQ互动答疑+邮件答疑</p>
							<p><b>基础服务</b>：丰富的题库，根据章节和知识点以及题型强化训练，模拟正式考试，提高自己的实战</p>
							<p><font color="red">特需保障：一年免费学习   三次免费考试</font></p>
							<p><b>注：根据自己在线学习和模拟考试的情况，可申请认证考试</b></p>
							</pre>
						</div>
						<!-- <div>&nbsp;</div> -->
						{x2;if:!$isopen}
						<!-- <form action="index.php?exam-app-basics-openit" method="post"> -->
							<form action="index.php?exam-app-basics-payfor" method="post">
							{x2;if:!$basic['basicdemo']}
								{x2;if:$price}
								<p>
									价格：{x2;$price[0]['price']}元
									
									<!-- <select name="opentype" class="input-large">
										{x2;tree:$price,p,pid}
										<option value="{x2;v:key}">{x2;v:p['price']}积分兑换{x2;v:p['time']}天</option>
										{x2;endtree}
									</select> -->
								</p>
								<p>
									<!-- 现价：{x2;$price[1]['price']}元 -->
									<input type="hidden" name="money" value="{x2;$price[0]['price']}" > <!--原价-->
									<input type="hidden" name="opentype" value="1">
								</p>
								<p>

									<input type="hidden" name="payforit" value="1" /> <!--支付验证-->
									<input value="{x2;$basic['basicid']}" name="basicid" type="hidden"/><!---->
									<input class="btn btn-primary" value="购买" type="submit"/>
								</p>
								{x2;else}
								<p>
									<input class="btn" value="请先设置价格" type="button"/>
								</p>
								{x2;endif}
							{x2;else}
							<p>
								<input type="hidden" name="payforit" value="1" />
								<input value="{x2;$basic['basicid']}" name="basicid" type="hidden"/>
								<input class="btn btn-primary" value="购买" type="submit"/> 
							</p>
							{x2;endif}
						</form>
						
					{x2;else}
					<p>
						<a class="btn ajax" href="index.php?exam-app-index-setCurrentBasic&basicid={x2;$basic['basicid']}">进入考场</a>
					</p>
					{x2;endif}
					</div>
				</div>
				<div class="pagination pagination-right">
					<ul>{x2;$basics['pages']}</ul>
		        </div>
			</div>
{x2;if:!$userhash}
		</div>
	</div>
</div>
<!-- <form aria-hidden="true" id="myModal" method="post" class="modal hide fade" role="dialog" aria-labelledby="#myModalLabel" action="index.php?exam-app-basics-coupon">
	<div class="modal-header">
		<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
		<h3 id="myModalLabel">
			代金券充值
		</h3>
	</div>
	<div class="modal-body" id="modal-body">
		<div class="control-group">
			<label class="control-label" for="content">代金券号码：</label>
	  		<div class="controls">
	  			<input type="text" name="couponsn" value="" needle="needle" msg="请输入16位代金券号码"/>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		 <input name="coupon" type="hidden" value="1">
		 <button class="btn" type="submit">充值</button>
	</div>
</form> -->
{x2;include:foot}
</body>
</html>
{x2;endif}