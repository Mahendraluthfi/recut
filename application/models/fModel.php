<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FModel extends CI_Model {

	public function getpanty()
	{
		$this->db->from('order_panty');
		$this->db->where('date', date('Y-m-d'));
		$this->db->where_not_in('status', '0');
		$db = $this->db->get();
		return $db;		
	}	

	public function getbra()
	{
		$this->db->from('order_bra');
		$this->db->where('date', date('Y-m-d'));
		$this->db->where_not_in('status', '0');
		$db = $this->db->get();
		return $db;		
	}	

	public function getmask()
	{
		$this->db->from('order_mask');
		$this->db->where('date', date('Y-m-d'));
		$this->db->where_not_in('status', '0');
		$db = $this->db->get();
		return $db;		
	}	

	public function getapparel()
	{
		$this->db->from('order_apparel');
		$this->db->where('date', date('Y-m-d'));
		$this->db->where_not_in('status', '0');
		$db = $this->db->get();
		return $db;		
	}	

	public function getlast_status($type,$id)
	{
		$this->db->from('status');
		$this->db->where('type', $type);
		$this->db->where('order_id', $id);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$db= $this->db->get();
		return $db;
	}

}

/* End of file fModel.php */
/* Location: ./application/models/fModel.php */