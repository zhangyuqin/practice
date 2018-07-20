<?php

class app
{
	public $G;

	public function __construct(&$G)
	{
		$this->G = $G;
		$this->ev = $this->G->make('ev');
		$this->tpl = $this->G->make('tpl');
		$this->sql = $this->G->make('sql');
		$this->db = $this->G->make('db');
		$this->pg = $this->G->make('pg');
		$this->html = $this->G->make('html');
		$this->module = $this->G->make('module');
		$this->session = $this->G->make('session');
		$this->user = $this->G->make('user','user');
		$this->order = $this->G->make('orders','bank');
		$this->apply = $this->G->make('apply','user');
		$this->_user = $_user = $this->session->getSessionUser();
		if(!$_user['sessionuserid'])
		{
			if($this->ev->get('userhash'))
			exit(json_encode(array(
				'statusCode' => 301,
				"message" => "请您重新登录",
			    "callbackType" => 'forward',
			    "forwardUrl" => "index.php?user-app-login"
			)));
			else
			{
				header("location:index.php?user-app-login");
				exit;
			}
		}
		$groups = $this->user->getUserGroups();
		$this->tpl->assign('groups',$groups);
		$this->tpl->assign('_user',$this->user->getUserById($_user['sessionuserid']));
		$this->tpl->assign('userhash',$this->ev->get('userhash'));
	}

	public function index()
	{
		$this->tpl->display('index');
	}

	public function payfor()
	{
		$subaction = $this->ev->url(3);
		$orderstatus = array(1=>'待付款',2=>'已完成',99=>'已撤单');
		$this->tpl->assign('orderstatus',$orderstatus);
		switch($subaction)
		{
			case 'remove':
			$oid = $this->ev->get('ordersn');
			$order = $this->order->getOrderById($oid);
			if($order['orderstatus'] == 1)
			{
				$this->order->delOrder($oid);
				$message = array(
					'statusCode' => 200,
					"message" => "订单删除成功",
				    "callbackType" => 'forward',
				    "forwardUrl" => "reload"
				);
			}
			else
			$message = array(
				'statusCode' => 300,
				"message" => "订单操作失败"
			);
			exit(json_encode($message));
			break;

			case 'orderdetail':
			$oid = $this->ev->get('ordersn');
			if(!$oid)exit(header("location:index.php?user-center"));
			//$order = $this->order->getOrderById($oid);
			$order = $this->order->getOrderAndBasicById($oid);
			$alipay = $this->G->make('alipay');
			$payforurl = $alipay->outPayForUrl($order,WP.'index.php?route=user-api-alipaynotify',WP.'index.php?route=user-api-alipayreturn');
			$this->tpl->assign('payforurl',$payforurl);
			$this->tpl->assign('order',$order);
			$this->tpl->display('payfor_detail');
			break;

			default:
				$page = $this->ev->get('page');
				$args = array("orders.orderuserid = '".$this->_user['sessionuserid']."'","orders.orderbasicid = basic.basicid");
				//$myorders = $this->order->getOrderList($args,$page);
				$myorders = $this->order->getOrderAndBasicList($args,$page);
				$this->tpl->assign('orders',$myorders);
				$this->tpl->display('payfor');
		}
	}

	public function privatement()
	{
		$page = $this->ev->get('page');
		$search = $this->ev->get('search');
		$u = '';
		if($search)
		{
			$this->tpl->assign('search',$search);
			foreach($search as $key => $arg)
			{
				$u .= "&search[{$key}]={$arg}";
			}
		}
		if($this->ev->get('modifyuserinfo'))
		{
			$args = $this->ev->get('args');
			$userid = $this->_user['sessionuserid'];
			$id = $this->user->modifyUserInfo($args,$userid);
			$message = array(
				'statusCode' => 200,
				"message" => "操作成功",
			    "callbackType" => 'forward',
			    "forwardUrl" => "index.php?user-center-privatement&page={$page}{$u}"
			);
			exit(json_encode($message));
		}
		elseif($this->ev->get('modifyuserpassword'))
		{
			$args = $this->ev->get('args');
			$oldpassword = $this->ev->get('oldpassword');
			$userid = $this->_user['sessionuserid'];
			$user = $this->user->getUserById($userid);
			if(md5($oldpassword) != $user['userpassword'])
			{
				$message = array(
					'statusCode' => 300,
					"message" => "操作失败，原密码验证失败"
				);
				exit(json_encode($message));
			}
			if($args['password'] == $args['password2'] && $userid)
			{
				$id = $this->user->modifyUserPassword($args,$userid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
				    "navTabId" => "",
				    "rel" => "",
				    "callbackType" => 'forward',
				    "forwardUrl" => "index.php?user-center-privatement&page={$page}{$u}"
				);
				exit(json_encode($message));
			}
			else
			{
				$message = array(
					'statusCode' => 300,
					"message" => "操作失败"
				);
				exit(json_encode($message));
			}
		}
		else
		{
			$userid = $this->_user['sessionuserid'];
			$user = $this->user->getUserById($userid);
			$group = $this->user->getGroupById($user['usergroupid']);
			$fields = $this->module->getMoudleFields($group['groupmoduleid'],array('iscurrentuser'=> $userid == $this->_user['sessionuserid'],'group' => $group));
			$forms = $this->html->buildHtml($fields,$user);
			$actors = $this->user->getGroupsByModuleid($group['groupmoduleid']);
			$this->tpl->assign('moduleid',$group['groupmoduleid']);
			$this->tpl->assign('fields',$fields);
			$this->tpl->assign('forms',$forms);
			$this->tpl->assign('actors',$actors);
			$this->tpl->assign('user',$user);
			$this->tpl->assign('page',$page);
			$this->tpl->display('modifyuser');
		}
	}
	
	/**
	 * 申请认证
	 */
	public function applycertified(){
	    $page = $this->ev->get('page');
	    $subaction = $this->ev->url(3);
	    switch($subaction) {
	        case 'apply':
                if($_POST['form']) {
                    array_pop($_POST);
                    array_pop($_POST);
                    $_POST['applyTime'] = time();
                    $userid = $this->_user['sessionuserid'];
                    $_POST['userid'] = $userid;
                    $applyid = $this->apply->insertApplyInfo($_POST);
                    if($applyid) {
                        $to = $_POST['email'];
                        $name = $_POST['name'];
                        $this->Maildata($to,$name);
                        $message = array(
                            'statusCode' => 200,
                            "message" => "操作成功",
                            "callbackType" => 'forward',
                            "forwardUrl" => "index.php?user-center-applyinfo&page={$page}"
                        );
                    }else{
                        $message = array(
                            'statusCode' => 300,
                            "message" => "操作失败",
                        );
                    }
                    exit(json_encode($message));
	            
	             }
	        break;
	        default:
	            $applyType = $this->apply->applyType();
	            $this->tpl->assign('applyType',$applyType);
	            $this->tpl->display('applycertified');
	    }
	}
	
	public function applyinfo() {
	    $userid = $this->_user['sessionuserid'];
	    $applyinfo = $this->apply->getApplyInfoByUserId($userid);
	    $this->tpl->assign('applyinfo',$applyinfo);
	    $this->tpl->display('applyinfo');
	}
	
	/**
	 * 邮件内容
	 * @param varchar $to
	 * @param varchar $name
	 */
	public function Maildata($to,$name) {
	    $subject = '认证申请已经收到';
	    $body = "<b>".$name."</b>您好，<br /><br /><br />感谢您对IPv6认证的申请。我们将尽快处理您的申请并与您联系。<br /><br />联系方式：<br /><br />E-mail：ipv6certification@biigroup.cn<br /><br />Tel：+86 010-58677002<br /><br /><br />";
	    $this->sendMail($to, $name, $subject, $body);
	}
	
	/**
	 * 发送邮件类
	 * @param varchar $to
	 * @param varchar $name
	 * @param varchar $subject
	 * @param varchar $body
	 * @return boolean
	 */
	public function sendMail($to,$name,$subject,$body) {
	    require ROOT.'/lib/PHPMailer/PHPMailerAutoload.php';
	    $mail = new PHPMailer;
	    //变量设置
	    $replyEmail = REPLY_EMAIL?REPLY_EMAIL:FROM_EMAIL;
	    $replyName = REPLY_NAME?REPLY_NAME:FROM_NAME;
	    //邮件配置
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
	    $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = SMTP_USER;                 // SMTP username
	    $mail->Password = SMTP_PASS;                           // SMTP password
	    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = SMTP_PORT;                                    // TCP port to connect to
	    $mail->From = FROM_EMAIL;
	    $mail->FromName = FROM_NAME;
	    $mail->addAddress($to, $name);     // Add a recipient
	    $mail->addReplyTo($replyEmail, $replyName);
	    $mail->addCC(CC);
	    $mail->isHTML(true);
	    $mail->Subject = $subject;
	    $mail->Body    = $body;
	    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	    if(!$mail->send()) {
	        //echo 'Mailer Error: ' . $mail->ErrorInfo;
	        return true;
	    } else {
	        return false;
	    }
	
	}
}

?>