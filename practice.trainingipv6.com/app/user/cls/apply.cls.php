<?php

class apply_user
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
		$this->pg = $this->G->make('pg');
		$this->ev = $this->G->make('ev');
		$this->module = $this->G->make('module');
		$this->session = $this->G->make('session');
	}
	/**
	 * 查询申请类型
	 */
	public function applyType() 
	{
	    $data = array(false,'apply_type');
	    $sql = $this->sql->makeSelect($data);
	    return $this->db->fetchALL($sql);
	    
	}
	
	/**
	 * 获取申请表信息
	 * @param unknown $id
	 */
	public function getApplyInfoByApplyId($id)
	{
	    $data = array(false,array('apply_info','apply_type'),array("apply_info.applyType = apply_type.id","apply_info.applyid = '{$id}'"));
	    $sql = $this->sql->makeSelect($data);
	    return $this->db->fetch($sql);
	     
	}
	
	/**
	 * 获取申请表信息
	 * @param unknown $id
	 */
	public function getApplyInfoByUserId($id)
	{
	    $data = array(false,array('apply_info','apply_type'),array("apply_info.applyType = apply_type.id","apply_info.userid = '{$id}'"));
	    $sql = $this->sql->makeSelect($data);
	    return $this->db->fetchAll($sql);
	
	}
	
	/**
	 * 申请认证
	 * @param unknown $args
	 */
	public function insertApplyInfo($args)
	{
	    $data = array('apply_info',$args);
	    $sql = $this->sql->makeInsert($data);
	    $this->db->exec($sql);
	    return $this->db->lastInsertId();
	}
	
	/**
	 * 获取申请列表
	 * @param unknown $id
	 */
	public function getApplyList()
	{
	    $data = array(false,array('apply_info','apply_type','user'),array("apply_info.applyType = apply_type.id","apply_info.userid = user.userid"));
	    $sql = $this->sql->makeSelect($data);
	    return $this->db->fetchALL($sql);
	
	}
	
	/**
	 * 更改状态值
	 * @param unknown $args
	 */
	public function updateApplyStatus($args,$applyid)
	{
	    if(!$args)return false;
	    $data = array('apply_info',$args,"applyid = '{$applyid}'");
	    $sql = $this->sql->makeUpdate($data);
	    $this->db->exec($sql);
	    return $this->db->affectedRows();
	}
	
	public function deleteApplyById($applyid)
	{
	    $data = array('apply_info',"applyid = '{$applyid}'");
	    $sql = $this->sql->makeDelete($data);
	    $this->db->exec($sql);
	    return $this->db->affectedRows();
	}
	
}