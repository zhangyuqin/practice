<div class="row-fluid topLine">
	<div class="container-fluid">
		<div class="span4"></div>
		<div class="span8">
			<span class="pull-right">
			<?php if($this->tpl_var['_user']['userid']){ ?>
			您好（<?php echo $this->tpl_var['_user']['username']; ?>）&nbsp;&nbsp;<a href="index.php?user-center"><em class="icon-user"></em> 用户中心</a><?php if($this->tpl_var['_user']['teacher_subjects']){ ?>&nbsp;&nbsp;<em class="icon-edit"></em> <a href="index.php?exam-teach">教师管理</a><?php } elseif($this->tpl_var['_user']['groupid'] == 1){ ?>&nbsp;&nbsp;<em class="icon-edit"></em> <a href="index.php?core-master">后台管理</a><?php } ?>&nbsp;&nbsp;<a href="index.php?user-app-logout"><em class="icon-lock"></em> 退出</a>
			<?php } else { ?>
			<a href="javascript:;" onclick="javascript:$.loginbox.show();"><em class="icon-lock"></em> 登录</a>&nbsp;&nbsp;<a href="index.php?user-center"><em class="icon-user"></em> 注册</a>
			<?php } ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
		</div>
	</div>
</div>
<div class="row-fluid top">
	<div class="container-fluid">
		<div class="span6">  
			<h3>IPv6论坛认证网络工程师练习系统</h3>
			<h3 style="font-size:14px;">IPv6 Forum Certified Network Engineer Practice System</h3>
		</div> 
	</div>
</div>