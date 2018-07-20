<?php

class app
{
	public $G;

	public function __construct(&$G)
	{
		$this->G = $G;
		$this->G = $G;
		$this->ev = $this->G->make('ev');
		$this->session = $this->G->make('session');
		$this->tpl = $this->G->make('tpl');
		$this->sql = $this->G->make('sql');
		$this->db = $this->G->make('db');
		$this->pg = $this->G->make('pg');
		$this->html = $this->G->make('html');
		$this->module = $this->G->make('module');
		$this->apps = $this->G->make('apps','core');
		$this->user = $this->G->make('user','user');
		$this->apply = $this->G->make('apply','user');
		$this->favor = $this->G->make('favor','exam');
		$this->_user = $_user = $this->session->getSessionUser();
		$group = $this->user->getGroupById($_user['sessiongroupid']);
		if($group['groupid'] != 1)
		{
			if($this->ev->get('userhash'))
			exit(json_encode(array(
				'statusCode' => 300,
				"message" => "请您重新登录",
			    "callbackType" => 'forward',
			    "forwardUrl" => "index.php?core-master-login"
			)));
			else
			{
				header("location:index.php?core-master-login");
				exit;
			}
		}
		$localapps = $this->apps->getLocalAppList();
		$apps = $this->apps->getAppList();
		$this->tpl->assign('localapps',$localapps);
		$this->tpl->assign('apps',$apps);
		$modules = $this->module->getModulesByApp('user');
		$groups = $this->user->getUserGroups();
		$this->tpl->assign('_user',$this->user->getUserById($_user['sessionuserid']));
		$this->tpl->assign('modules',$modules);
		$this->tpl->assign('groups',$groups);
		$this->tpl->assign('userhash',$this->ev->get('userhash'));
	}

	public function index()
	{
		$subaction = $this->ev->url(3);
		switch($subaction)
		{
			default:
			$this->tpl->display('index');
		}
	}

	public function user()
	{
		$subaction = $this->ev->url(3);
		$search = $this->ev->get('search');
		$u = '';
		if($search)
		{
			foreach($search as $key => $arg)
			{
				$u .= "&search[{$key}]={$arg}";
			}
		}
		switch($subaction)
		{
			case 'del':
			$page = $this->ev->get('page');
			$userid = $this->ev->get('userid');
			$this->user->delUserById($userid);
			$message = array(
				'statusCode' => 200,
				"message" => "操作成功",
			    "navTabId" => "",
			    "rel" => "",
			    "callbackType" => "forward",
			    "forwardUrl" => "index.php?user-master-user&page={$page}{$u}"
			);
			exit(json_encode($message));
			break;

			case 'batdel':
			if($this->ev->get('action') == 'delete')
			{
				$page = $this->ev->get('page');
				$delids = $this->ev->get('delids');
				foreach($delids as $userid => $p)
				$this->user->delUserById($userid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
				    "navTabId" => "",
				    "rel" => "",
				    "callbackType" => "forward",
				    "forwardUrl" => "index.php?user-master-user&page={$page}{$u}"
				);
				exit(json_encode($message));
			}
			break;

			case 'modify':
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
			if($this->ev->get('modifyusergroup'))
			{
				$groupid = $this->ev->get('groupid');
				$userid = $this->ev->get('userid');
				$this->user->modifyUserGroup($groupid,$userid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
				    "callbackType" => "forward",
				    "forwardUrl" => "index.php?user-master-user&page={$page}{$u}"
				);
				exit(json_encode($message));
			}
			elseif($this->ev->get('modifyuserinfo'))
			{
				$args = $this->ev->get('args');
				$userid = $this->ev->get('userid');
				$user = $this->user->getUserById($userid);
				$group = $this->user->getGroupById($user['usergroupid']);
				$args = $this->module->tidyNeedFieldsPars($args,$group['groupmoduleid'],array('iscurrentuser'=> $userid == $this->_user['sessionuserid'],'group' => $group));
				$id = $this->user->modifyUserInfo($args,$userid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
				    "callbackType" => "forward",
				    "forwardUrl" => "index.php?user-master-user&page={$page}{$u}"
				);
				exit(json_encode($message));
			}
			elseif($this->ev->get('modifyuserpassword'))
			{
				$args = $this->ev->get('args');
				$userid = $this->ev->get('userid');
				if($args['password'] == $args['password2'] && $userid)
				{
					$id = $this->user->modifyUserPassword($args,$userid);
					$message = array(
						'statusCode' => 200,
						"message" => "操作成功",
					    "callbackType" => "forward",
					    "forwardUrl" => "index.php?user-master-user&page={$page}{$u}"
					);
					exit(json_encode($message));
				}
				else
				{
					$message = array(
						'statusCode' => 300,
						"message" => "操作失败",
					    "navTabId" => "",
					    "rel" => ""
					);
					exit(json_encode($message));
				}
			}
			else
			{
				$userid = $this->ev->get('userid');
				$user = $this->user->getUserById($userid);
				$group = $this->user->getGroupById($user['usergroupid']);
				$fields = $this->module->getMoudleFields($group['groupmoduleid'],array('iscurrentuser'=> $userid == $this->_user['sessionuserid'],'group' => $this->user->getGroupById($this->_user['sessiongroupid'])));
				$forms = $this->html->buildHtml($fields,$user);
				$this->tpl->assign('moduleid',$group['groupmoduleid']);
				$this->tpl->assign('fields',$fields);
				$this->tpl->assign('forms',$forms);
				$this->tpl->assign('user',$user);
				$this->tpl->assign('page',$page);
				$this->tpl->display('modifyuser');
			}
			break;

			case 'batadd':
			if($this->ev->post('insertUser'))
			{
				$uploadfile = $this->ev->get('uploadfile');
				if(!file_exists($uploadfile))
				{
					$message = array(
						'statusCode' => 300,
						"message" => "上传文件不存在"
					);
					exit(json_encode($message));
				}
				else
				{
					setlocale(LC_ALL,'zh_CN');
					$handle = fopen($uploadfile,"r");
					$defaultgroup = $this->user->getDefaultGroup();
					$strings = $this->G->make('strings');
					while ($data = fgetcsv($handle,200))
					{

					    if($data[0] && $data[1])
					    {
						    $args = array();
						    $args['username'] = iconv("GBK","UTF-8",$data[0]);
						    if($strings->isUserName($args['username']))
						    {
							    $u = $this->user->getUserByUserName($args['username']);
							    if(!$u)
							    {
								    $args['useremail'] = $data[1];
								    if($strings->isEmail($args['useremail']))
								    {
									    $u = $this->user->getUserByEmail($args['useremail']);
									    if(!$u)
									    {
									    	if(!$data[2])$data[2] = '111111';
									    	$args['userpassword'] = md5($data[2]);
									    	$args['usergroupid'] = $defaultgroup['groupid'];
									    	$this->user->insertUser($args);
									    }
								    }
							    }
						    }
					    }
					}
					fclose($handle);
					$message = array(
						'statusCode' => 200,
						"message" => "操作成功",
					    "callbackType" => "forward",
					    "forwardUrl" => "index.php?user-master-user"
					);
					exit(json_encode($message));
				}
			}
			else
			{
				$this->tpl->display('batadduser');
			}
			break;

			case 'add':
			if($this->ev->post('insertUser'))
			{
				$args = $this->ev->post('args');
				if($args['userpassword'] == $args['userpassword2'])
				{
					$userbyname = $this->user->getUserByUserName($args['username']);
					$userbyemail = $this->user->getUserByEmail($args['useremail']);
					if($userbyname)
					$errmsg = "这个用户名已经被注册了";
					if($userbyemail)
					$errmsg = "这个邮箱已经被注册了";
					if($errmsg)
					{
						$message = array(
							'statusCode' => 300,
							"message" => "{$errmsg}",
						    "navTabId" => "",
						    "rel" => ""
						);
						exit(json_encode($message));
					}
					$args['userpassword'] = md5($args['userpassword']);
					$search = $this->ev->get('search');
					$u = '';
					if($search)
					{
						foreach($search as $key => $arg)
						{
							$u .= "&search[{$key}]={$arg}";
						}
					}
					unset($args['userpassword2']);
					$id = $this->user->insertUser($args);
					$message = array(
						'statusCode' => 200,
						"message" => "操作成功",
					    "callbackType" => "forward",
					    "forwardUrl" => "index.php?user-master-user&page={$page}{$u}"
					);
					exit(json_encode($message));
				}
			}
			else
			{
				$this->tpl->display('adduser');
			}
			break;

			default:
			$page = $this->ev->get('page')?$this->ev->get('page'):1;
			$search = $this->ev->get('search');
			$u = '';
			if($search)
			{
				foreach($search as $key => $arg)
				{
					$u .= "&search[{$key}]={$arg}";
				}
			}
			if($search['userid'])$args = array("userid = '{$search['userid']}'");
			elseif($search['username'])$args = array("username LIKE '%{$search['username']}%'");
			elseif($search['useremail'])$args = array("useremail  LIKE '%{$search['useremail']}%'");
			elseif($search['groupid'])$args = array("usergroupid = '{$search['groupid']}'");
			else
			$args = 1;
			if($search['stime'] || $search['etime'])
			{
				if(!is_array($args))$args = array();
				if($search['stime']){
					$stime = strtotime($search['stime']);
					$args[] = "userregtime >= '{$stime}'";
				}
				if($search['etime']){
					$etime = strtotime($search['etime']);
					$args[] = "userregtime <= '{$etime}'";
				}
			}
			$users = $this->user->getUserList($page,10,$args);
			$this->tpl->assign('users',$users);
			$this->tpl->assign('search',$search);
			$this->tpl->assign('u',$u);
			$this->tpl->assign('page',$page);
			$this->tpl->display('user');
			break;
		}
	}
	
	/**
	 * 认证申请管理
	 *
	 */
	public function apply()
	{
	    $subaction = $this->ev->url(3);
	    switch($subaction)
	    {
	        case "status":
            $status = $this->ev->get('status');
            $applyid = $this->ev->get('applyid');
            $page = intval($this->ev->get('page'));
            $args = array("status" => $status);
            $res = $this->apply->updateApplyStatus($args,$applyid);
            if($res) {
                $applyinfo = $this->apply->getApplyInfoByApplyId($applyid);
                $to = $applyinfo['email'];
                $name = $applyinfo['name'];
                $certifiedName = $applyinfo['certifiedName'];
                $mailres = $this->Maildata($to,$name,$certifiedName,$status);
                if($mailres) {
                    $message = array(
                        'statusCode' => 200,
                        "message" => "操作成功",
                        "callbackType" => 'forward',
                        "forwardUrl" => "index.php?user-master-apply&page={$page}"
                    );
                    exit(json_encode($message));
                }else{
                    $message = array(
                        'statusCode' => 300,
                        "message" => "邮件发送失败",
                        "callbackType" => 'forward',
                        "forwardUrl" => "index.php?user-master-apply&page={$page}"
                    );
                    exit(json_encode($message));
                }
                
            }else{
                $message = array(
                    'statusCode' => 300,
                    "message" => "操作失败",
                    "callbackType" => 'forward',
                    "forwardUrl" => "index.php?user-master-apply&page={$page}"
                );
                exit(json_encode($message));
            }
            break;
	        case "detail":
            $applyid = $this->ev->get('applyid');
            $applyinfo = $this->apply->getApplyInfoByApplyId($applyid);
            $this->tpl->assign('applyinfo',$applyinfo);
            $this->tpl->display('apply_detail');
            break;
            case "delete":
            $applyid = $this->ev->get('applyid');
            $res = $this->apply->deleteApplyById($applyid);
            $message = array(
                'statusCode' => 200,
                "message" => "操作成功",
                "callbackType" => 'forward',
                "forwardUrl" => "index.php?user-master-apply&page={$page}"
            );
            exit(json_encode($message));
            break;
	        default:
	            $apply = $this->apply->getApplyList();
	            $this->tpl->assign('data',$apply);
	            $this->tpl->display('apply');
	    }
	}
	
	/**
	 * 邮件内容
	 * @param varchar $to
	 * @param varchar $name
	 */
	public function Maildata($to,$name,$certifiedName,$status) {
	    if($status==1) {
	        $subject = $certifiedName.'申请通过审核';
	        $body = "<b>".$name."</b>您好，<br /><br /><br />感谢您对IPv6认证的申请。您申请的：".$certifiedName."已通过审核。<br /><br />联系方式：<br /><br />E-mail：ipv6certification@biigroup.cn<br /><br />Tel：+86 010-58677002<br /><br /><br />";
	    }elseif($status==2){
	        $subject = $certifiedName.'申请未通过审核';
	        $body = "<b>".$name."</b>您好，<br /><br /><br />感谢您对IPv6认证的申请。由于您目前还未达到参加考试的条件，您申请的：".$certifiedName."未通过审核。<br /><br />联系方式：<br /><br />E-mail：ipv6certification@biigroup.cn<br /><br />Tel：+86 010-58677002<br /><br /><br />";
	    }
	    $res = $this->sendMail($to, $name, $subject, $body);
	    return $res;
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
	    if($mail->send()) {
	        //echo 'Mailer Error: ' . $mail->ErrorInfo;
	        return true;
	    } else {
	        return false;
	    }
	
	}

	public function ajax()
	{
		$subaction = $this->ev->url(3);
		switch($subaction)
		{
			case 'getActorsByModule':
			$moduleid = $this->ev->get('moduleid');
			$actors = $this->user->getGroupsByModuleid($moduleid);
			foreach($actors as $actor)
			{
				echo '<option value="'.$actor['groupid'].'">'.$actor['groupname'].'</option>';
			}
			break;

			default:
			break;
		}
	}
	
    /**
     * 查看用户的考试历史记录
     */
	public function examhistory()
	{
	    $page = $this->ev->get('page');
	    $userid = $this->ev->get('userid');
	    $basicid = $this->ev->get('basicsid');
	    $ehtype = 1;
	    $subaction = $this->ev->url(3);
	    switch($subaction) {
	        //删除考试历史记录
	        case 'del':
	            $ehid = $this->ev->get('ehid');
	            $aaa = $this->favor->delExamHistory($ehid,$userid);
	            $message = array(
	                'statusCode' => 200,
	                "message" => "删除成功",
	                "callbackType" => 'forward',
	                "forwardUrl" => "?exam-master-examhistory&userid={$userid}&basicid={$basicid}"
	            );
	            $this->G->R($message);
	            break;
	        default:
	            $page = $page > 0?$page:1;
	            $exams = $this->favor->getExamHistoryListByArgs($page,10,array("ehuserid = '".$userid."'","ehbasicid = '{$basicid}'","ehtype = '{$ehtype}'"));
	            foreach($exams['data'] as $key => $p)
	            {
	                $exams['data'][$key]['errornumber'] = 0;
	                $questions = unserialize($p['ehquestion']);
	                $scorelist = unserialize($p['ehscorelist']);
	                $examsetting = unserialize($p['ehsetting']);
	                if(is_array($questions['questions']) && is_array($scorelist))
	                {
	                    foreach($questions['questions'] as $nkey => $q)
	                    {
	                        if(is_array($q))
	                        {
	                            foreach($q as $qid => $t)
	                            {
	                                if($p['ehtype'] == 0)
	                                {
	                                    if($scorelist[$qid] != 1)$exams['data'][$key]['errornumber']++;
	                                }
	                                elseif($p['ehtype'] == 1)
	                                {
	                                    if($scorelist[$qid] != $examsetting['examsetting']['questype'][$nkey]['score'])$exams['data'][$key]['errornumber']++;
	                                }
	                                else
	                                {
	                                    if($scorelist[$qid] != $examsetting['examsetting']['questype'][$nkey]['score'])$exams['data'][$key]['errornumber']++;
	                                }
	                            }
	                        }
	                    }
	                    foreach($questions['questionrows'] as $nkey => $qt)
	                    {
	                        foreach($qt as $qtid => $q)
	                        {
	                            if(is_array($q))
	                            {
	                                foreach($q['data'] as $qid => $t)
	                                {
	                                    if($p['ehtype'] == 0)
	                                    {
	                                        if($scorelist[$qid] != 1)$exams['data'][$key]['errornumber']++;
	                                    }
	                                    elseif($p['ehtype'] == 1)
	                                    {
	                                        if($scorelist[$qid] != $examsetting['examsetting']['questype'][$nkey]['score'])$exams['data'][$key]['errornumber']++;
	                                    }
	                                    else
	                                    {
	                                        if($scorelist[$qid] != $examsetting['examsetting']['questype'][$nkey]['score'])$exams['data'][$key]['errornumber']++;
	                                    }
	                                }
	                            }
	                        }
	                    }
	                }
	            }
	            $avgscore = floatval($this->favor->getAvgScore(array("ehuserid = '".$this->_user['sessionuserid']."'","ehbasicid = '{$basicid}'","ehtype = '{$ehtype}'")));
	            $this->tpl->assign('ehtype',$ehtype);
	            $this->tpl->assign('page',$page);
	            $this->tpl->assign('exams',$exams);
	            $this->tpl->assign('avgscore',$avgscore);
	            $this->tpl->display('examhistory');
	    }
	    
	}

	public function actor()
	{
		$subaction = $this->ev->url(3);
		switch($subaction)
		{
			case 'selectactor':
			$groupid = $this->ev->get('groupid');
			$group = $this->user->getGroupById($groupid);
			if($group)
			{
				$this->user->selectDefaultActor($groupid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
					"callbackType" => "forward",
				    "forwardUrl" => "reload"
				);
			}
			else
			$message = array(
				'statusCode' => 300,
				"message" => "操作失败，存在同名角色！"
			);
			exit(json_encode($message));
			break;

			case 'modifyactor':
			$page = $this->ev->get('page');
			if($this->ev->get('modifyactor'))
			{
				$groupid = $this->ev->get('groupid');
				$args = $this->ev->get('args');
				$r = $this->user->modifyActor($groupid,$args);
				if($r)
				{
					$message = array(
						'statusCode' => 200,
						"message" => "操作成功",
						"callbackType" => "forward",
					    "forwardUrl" => "index.php?user-master-actor"
					);
				}
				else
				{
					$message = array(
						'statusCode' => 300,
						"message" => "操作失败，存在同名角色！",
					    "callbackType" => ''
					);
				}
				exit(json_encode($message));
			}
			else
			{
				$groupid = $this->ev->get('groupid');
				$group = $this->user->getGroupById($groupid);
				$this->tpl->assign('group',$group);
				$this->tpl->display('modifyactor');
			}
			break;

			case 'delactor':
			$page = intval($this->ev->get('page'));
			$groupid = $this->ev->get('groupid');
			$r = $this->user->delActorById($groupid);
			if($r)
			{
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
					"callbackType" => "forward",
					"forwardUrl" => "index.php?user-master-actor&page={$page}"
				);
			}
			else
			{
				$message = array(
					'statusCode' => 300,
					"message" => "操作失败，该角色下存在用户，请删除所有用户后再删除本角色"
				);
			}
			exit(json_encode($message));
			break;

			case 'add':
			if($this->ev->post('insertactor'))
			{
				$args = $this->ev->post('args');
				$id = $this->user->insertActor($args);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
					"callbackType" => "forward",
					"forwardUrl" => "index.php?user-master-actor&moduleid={$args['groupmoduleid']}"
				);
				exit(json_encode($message));
			}
			else
			{
				$this->tpl->display('addactor');
			}
			break;

			default:
			$search = $this->ev->post('search');
			$args = 1;
			$page = $this->ev->get('page');
			$page = $page>1?$page:1;
			if($search['groupmoduleid'])
			{
				$args = "groupmoduleid = '{$search['groupmoduleid']}'";
			}
			$actors = $this->user->getUserGroupList($args,10,$page);
			$this->tpl->assign('page',$page);
			$this->tpl->assign('actors',$actors);
			$this->tpl->display('actor');
		}
	}

	public function module()
	{
		$subaction = $this->ev->url(3);
		switch($subaction)
		{
			case 'fields':
			$moduleid = $this->ev->get('moduleid');
			$page = $this->ev->post('page');
			if($this->ev->get('modifyfieldsequence'))
			{
				$ids = $this->ev->post('ids');
				if($ids)
				{
					foreach($ids as $key => $value)
					{
						$args = array('fieldsequence'=>$value);
						$this->module->modifyFieldHtmlType($args,$key);
					}
				}
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
					"callbackType" => "forward",
				    "forwardUrl" => "index.php?user-master-module-fields&moduleid={$moduleid}"
				);
				exit(json_encode($message));
			}
			else
			{
				$module = $this->module->getModuleById($moduleid);
				$fields = $this->module->getMoudleFields($moduleid,true);
				$this->tpl->assign('moduleid',$moduleid);
				$this->tpl->assign('module',$module);
				$this->tpl->assign('fields',$fields);
				$this->tpl->display('fields');
			}
			break;

			case 'addfield':
			$moduleid = $this->ev->get('moduleid');
			$fieldpublic = $this->ev->get('fieldpublic');
			$page = $this->ev->post('page');
			if($this->ev->get('insertfield'))
			{
				$args = $this->ev->post('args');
				$moduleid = $args['fieldmoduleid'];
				$module = $this->module->getModuleById($moduleid);
				if(!$args['fieldpublic'])
				$args['field'] = $module['modulecode'].'_'.$args['field'];
				$args['fieldforbidactors'] = ','.implode(',',$args['fieldforbidactors']).',';
				$id = $this->module->insertModuleField($args);
				if($id)
				{
					$message = array(
						'statusCode' => 200,
						"message" => "操作成功",
						"callbackType" => "forward",
					    "forwardUrl" => "index.php?user-master-module-fields&moduleid={$moduleid}&page={$page}"
					);
				}
				else
				{
					$message = array(
						'statusCode' => 300,
						"message" => "操作失败"
					);
				}
				exit(json_encode($message));
			}
			else
			{
				$module = $this->module->getModuleById($moduleid);
				$this->tpl->assign('moduleid',$moduleid);
				$this->tpl->assign('fieldpublic',$fieldpublic);
				$this->tpl->assign('module',$module);
				$this->tpl->display('addfield');
			}
			break;

			case 'preview':
			$moduleid = $this->ev->get('moduleid');
			$module = $this->module->getModuleById($moduleid);
			$fields = $this->module->getMoudleFields($moduleid);
			$forms = $this->html->buildHtml($fields);
			$this->tpl->assign('moduleid',$moduleid);
			$this->tpl->assign('module',$module);
			$this->tpl->assign('fields',$fields);
			$this->tpl->assign('forms',$forms);
			$this->tpl->display('preview');
			break;

			case 'modifyfield':
			if($this->ev->get('modifyfieldhtml'))
			{
				$args = $this->ev->post('args');
				$args['fieldforbidactors'] = ','.implode(',',$args['fieldforbidactors']).',';
				$fieldid = $this->ev->post('fieldid');
				$field = $this->module->getFieldById($fieldid);
				$this->module->modifyFieldHtmlType($args,$fieldid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
				    "navTabId" => "",
				    "rel" => "",
				    "callbackType" => "forward",
				    "forwardUrl" => "index.php?user-master-module-fields&moduleid={$field['fieldmoduleid']}"
				);
				exit(json_encode($message));
			}
			elseif($this->ev->get('modifyfielddata'))
			{
				$args = $this->ev->post('args');
				$fieldid = $this->ev->post('fieldid');
				$field = $this->module->getFieldById($fieldid);
				$this->module->modifyFieldDataType($args,$fieldid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
				    "navTabId" => "",
				    "rel" => "",
				    "callbackType" => "forward",
				    "forwardUrl" => "index.php?user-master-module-fields&moduleid={$field['fieldmoduleid']}"
				);
				exit(json_encode($message));
			}
			else
			{
				$fieldid = $this->ev->get('fieldid');
				$field = $this->module->getFieldById($fieldid);
				$this->tpl->assign('fieldid',$fieldid);
				$this->tpl->assign('field',$field);
				$this->tpl->display('modifyfield');
			}
			break;

			case 'delfield':
			$fieldid = $this->ev->get('fieldid');
			$moduleid = $this->ev->get('moduleid');
			$r = $this->module->delField($fieldid);
			$message = array(
				'statusCode' => 200,
				"message" => "操作成功",
			    "callbackType" => "forward",
			    "forwardUrl" => "index.php?user-master-module-fields&moduleid={$moduleid}"
			);
			exit(json_encode($message));
			break;

			case 'modify':
			$page = $this->ev->get('page');
			if($this->ev->get('modifymodule'))
			{
				$args = $this->ev->get('args');
				$moduleid = $this->ev->get('moduleid');
				$this->module->modifyModule($args,$moduleid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
				    "callbackType" => "forward",
				    "forwardUrl" => "index.php?user-master-module"
				);
				exit(json_encode($message));
			}
			else
			{
				$moduleid = $this->ev->get('moduleid');
				$module = $this->module->getModuleById($moduleid);
				$this->tpl->assign('module',$module);
				$this->tpl->display('modifymodule');
			}
			break;

			case 'forbiddenfield':
			$fieldid = $this->ev->get('fieldid');
			$moduleid = $this->ev->get('moduleid');
			$field = $this->module->getFieldById($fieldid);
			if(!$moduleid)$moduleid = $field['fieldmoduleid'];
			$args = array();
			if($field['fieldlock'])
			$args['fieldlock'] = 0;
			else
			$args['fieldlock'] = 1;
			$this->module->modifyFieldHtmlType($args,$fieldid);
			$message = array(
				'statusCode' => 200,
				"message" => "操作成功",
			    "callbackType" => "forward",
			    "forwardUrl" => "index.php?user-master-module-fields&moduleid={$moduleid}"
			);
			exit(json_encode($message));
			break;

			case 'add':
			$page = intval($this->ev->get('page'));
			if($this->ev->post('insertmodule'))
			{
				$args = $this->ev->post('args');
				$errmsg = false;
				if($this->module->searchModules("modulecode = '{$args['modulecode']}'"))
				{
					$message = array(
						'statusCode' => 300,
						"message" => "操作失败，存在同名（代码）模型"
					);
					exit(json_encode($message));
				}
				$id = $this->module->insertModule($args);
				if(!$id)$errmsg = '模型添加出错';
				if(!$errmsg)
				{
					$message = array(
						'statusCode' => 200,
						"message" => "操作成功",
						"callbackType" => "forward",
					    "forwardUrl" => "index.php?user-master-module&page={$page}"
					);
					exit(json_encode($message));
				}
				else
				{
					$message = array(
						'statusCode' => 300,
						"message" => "操作失败，{$errmsg}"
					);
				}
				exit(json_encode($message));
			}
			else
			$this->tpl->display('addmodule');
			break;

			case 'del':
			$moduleid = $this->ev->get('moduleid');
			$fileds = $this->module->getPrivateMoudleFields($moduleid);
			$groups = $this->user->getGroupsByModuleid($moduleid);
			if($fileds || $groups)
			$message = array(
				'statusCode' => 300,
				"message" => "操作失败，请先删除该模型下所有模型字段和角色"
			);
			else
			{
				$this->module->delModule($moduleid);
				$message = array(
					'statusCode' => 200,
					"message" => "操作成功",
					"callbackType" => "forward",
					"forwardUrl" => "index.php?user-master-module&page={$page}"
				);
			}
			exit(json_encode($message));
			break;

			default:
			$this->tpl->display('module');
		}
	}
}

?>