<?php

class app
{
	public $G;

	public function __construct(&$G)
	{
		$this->G = $G;
		$this->session = $this->G->make('session');
		$this->tpl = $this->G->make('tpl');
		$this->ev = $this->G->make('ev');
		$this->user = $this->G->make('user','user');
		$this->basic = $this->G->make('basic','exam');
		$this->order = $this->G->make('orders','bank');
	}

	public function alipayreturn()
	{
		$orderobj = $this->G->make('orders','bank');
		$alipay = $this->G->make('alipay');
		$orderid = $this->ev->get('out_trade_no');
		$order = $orderobj->getOrderById($orderid);
		$verify_result = $alipay->alireturn();
		$this->tpl->assign('order',$order);
		if($verify_result)
		{
			if($order['orderstatus'] == 2)
			{
				$this->tpl->assign('status',1);
				$this->tpl->display('payfor_status');
				exit;
			}
			else
			{
				if($this->ev->get('trade_status') == 'TRADE_FINISHED' ||$this->ev->get('trade_status') == 'TRADE_SUCCESS')
				{
					$orderobj->modifyOrderById($orderid,array('orderstatus' => 2));
					$user = $this->user->getUserById($order['orderuserid']);
// 					$args['usercoin'] = $user['usercoin']+$order['orderprice']*10;
// 					$this->user->modifyUserInfo($args,$order['orderuserid']);
					//添加到openbasics表中 代表购买课程start
    				$order = $this->order->getOrderById($orderid);
		            $basic = $this->basic->getBasicById($order['orderbasicid']);
    				$price = 0;
    				if(trim($basic['basicprice']))
    				{
    				    $price = array();
    				    $basic['basicprice'] = explode("\n",$basic['basicprice']);
    				    foreach($basic['basicprice'] as $p)
    				    {
    				        if($p)
    				        {
    				            $p = explode(":",$p);
    				            $price[] = array('time'=>intval($p[0]),'price'=>intval($p[1]));
    				        }
    				    }
    				}
    				if(!$price[1])$t = $price[0];
    				else
    				    $t = $price[1];
    				$time = $t['time']*24*3600;
    				$args = array('obuserid'=>$order['orderuserid'],'obbasicid'=>$order['orderbasicid'],'obendtime'=>TIME + $time);
    				$this->basic->openBasic($args);
    				//end
					$this->tpl->assign('status',1);
					$this->tpl->display('payfor_status');
				}
				else
				{
					$this->tpl->assign('status',0);
					$this->tpl->display('payfor_status');
				}
			}
		}
		else
		{
			$this->tpl->assign('status',0);
			$this->tpl->display('payfor_status');
		}
	}

	public function alipaynotify()
	{
		$orderobj = $this->G->make('orders','bank');
		$alipay = $this->G->make('alipay');
		$orderid = $this->ev->get('out_trade_no');
		$order = $orderobj->getOrderById($orderid);
		$verify_result = $alipay->alinotify();
		$this->tpl->assign('order',$order);
		if($verify_result)
		{
			if($this->ev->get('trade_status') == 'TRADE_FINISHED' ||$this->ev->get('trade_status') == 'TRADE_SUCCESS')
			{
				$user = $this->user->getUserById($order['orderuserid']);
				$args['usercoin'] = $user['usercoin']+$order['orderprice']*10;
				$this->user->modifyUserInfo($args,$order['orderuserid']);
				$orderobj->modifyOrderById($orderid,array('orderstatus' => 2));
				//添加到openbasics表中 代表购买课程start
				$order = $this->order->getOrderById($orderid);
	            $basic = $this->basic->getBasicById($order['orderbasicid']);
				$price = 0;
				if(trim($basic['basicprice']))
				{
				    $price = array();
				    $basic['basicprice'] = explode("\n",$basic['basicprice']);
				    foreach($basic['basicprice'] as $p)
				    {
				        if($p)
				        {
				            $p = explode(":",$p);
				            $price[] = array('time'=>intval($p[0]),'price'=>intval($p[1]));
				        }
				    }
				}
				if(!$price[1])$t = $price[0];
				else
				    $t = $price[1];
				$time = $t['time']*24*3600;
				$args = array('obuserid'=>$order['orderuserid'],'obbasicid'=>$order['orderbasicid'],'obendtime'=>TIME + $time);
				$this->basic->openBasic($args);
				//end
				exit('sucess');
			}
			elseif($_POST['trade_status'] == 'WAIT_BUYER_PAY')
			{
				exit('sucess');
			}
			else
			{
				exit('fail');
			}
		}
		else
		{
			exit('fail');
		}
	}
}

?>