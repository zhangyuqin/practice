<?php

class orders_bank
{
	public $G;

	public function __construct(&$G)
	{
		$this->G = $G;
	}

	public function _init()
	{
		$this->sql = $this->G->make('sql');
		$this->db = $this->G->make('db');
		$this->ev = $this->G->make('ev');
		$this->files = $this->G->make('files');
	}

	public function getOrderList($args,$page,$number = 20,$order = 'ordercreatetime DESC')
	{
		$data = array(
			'select' => false,
			'table' => 'orders',
			'query' => $args,
			'orderby' => $order,
			'serial' => array('orderitems','orderuserinfo')
		);
		$r = $this->db->listElements($page,$number,$data);
		return $r;
	}
	
	/**
	 * 多表查询（orders、basic）获取订单绑定考场相关信息
	 * @param unknown $args
	 * @param unknown $page
	 * @param number $number
	 * @param string $order
	 * @return unknown
	 */
	public function getOrderAndBasicList($args,$page,$number = 20,$order = 'ordercreatetime DESC')
	{
	    $data = array(
	        'select' => false,
	        'table' => array('orders','basic'),
	        'query' => $args,
	        'orderby' => $order,
	        'serial' => array('orderitems','orderuserinfo')
	    );
	    $r = $this->db->listElements($page,$number,$data);
	    return $r;
	}

	public function delOrder($id)
	{
		return $this->db->delElement(array('table' => 'orders','query' => "ordersn = '{$id}'"));
	}

	public function modifyOrder($id,$args)
	{
		$data = array(
			'table' => 'orders',
			'value' => $args,
			'query' => "ordersn = '{$id}'"
		);
		$this->db->updateElement($data);
		return $this->db->affectedRows();
	}

	public function addOrder($args)
	{
		return $this->db->insertElement(array('table' => 'orders','query' => $args));
	}

	public function getOrderById($id)
	{
		$data = array(false,'orders',"ordersn = '{$id}'");
		$sql = $this->sql->makeSelect($data);
		return $this->db->fetch($sql,array('orderitems','orderpost','orderuserinfo'));
	}
	
	/**
	 * 查询订单表与订单所对应的课程表
	 * @param unknown $id
	 * @param unknown $basicid
	 */
	public function getOrderAndBasicById($id,$basicid) 
	{ 
	    $data = array(false,array('orders','basic'),array("orders.ordersn = '{$id}'","orders.orderbasicid = basic.basicid"));
	    $sql = $this->sql->makeSelect($data);
	    return $this->db->fetch($sql,array('orderitems','orderpost','orderuserinfo'));
	}

	public function modifyOrderById($id,$args)
	{
		$data = array('orders',$args,"ordersn = '{$id}'");
		$sql = $this->sql->makeUpdate($data);
		return $this->db->exec($sql);
	}

	public function addSaledItem($args)
	{
		return $this->db->insertElement(array('table' => 'saleditems','query' => $args));
	}
	
	/**
	 * 根据参数查询order表，但是返回值为查询结果的数量，没有为0
	 * @param unknown $args
	 */
	public function getOrderByArgs($args)
	{
	    $sql = $this->sql->makeSelect($args);
	    return $sql;
	    return $this->db->exec($sql);
	}
}

?>
