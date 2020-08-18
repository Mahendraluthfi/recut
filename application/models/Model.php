<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function get_panty()
		{
			$this->db->from('order_panty');
			$this->db->where('status', '1');
			$this->db->order_by('date', 'desc');
			$db = $this->db->get();
			return $db;
		}

	public function get_bra()
		{
			$this->db->from('order_bra');
			$this->db->where('status', '1');			
			$this->db->order_by('date', 'desc');
			$db = $this->db->get();
			return $db;
		}	

	public function get_mask()
		{
			$this->db->from('order_mask');
			$this->db->where('status', '1');			
			$this->db->order_by('date', 'desc');
			$db = $this->db->get();
			return $db;
		}	

	public function get_apparel()
		{
			$this->db->from('order_apparel');
			$this->db->where('status', '1');			
			$this->db->order_by('date', 'desc');
			$db = $this->db->get();
			return $db;
		}	

	public function get_excel($ds,$de)
	{
		$this->db->from('order_panty');
		$this->db->join('panty_detail', 'panty_detail.id_panty = order_panty.order_id');
		$this->db->where('order_panty.date >=', $ds);
		$this->db->where('order_panty.date <=', $de);
		$db = $this->db->get();
		return $db;
	}

	public function get_excel_bra($ds,$de)
	{
		$this->db->from('order_bra');
		$this->db->join('bra_detail', 'bra_detail.id_bra = order_bra.order_id');
		$this->db->where('order_bra.date >=', $ds);
		$this->db->where('order_bra.date <=', $de);
		$db = $this->db->get();
		return $db;
	}

	public function get_excel_mask($ds,$de)
	{
		$this->db->from('order_mask');
		$this->db->join('mask_detail', 'mask_detail.id_mask = order_mask.order_id');
		$this->db->where('order_mask.date >=', $ds);
		$this->db->where('order_mask.date <=', $de);
		$db = $this->db->get();
		return $db;
	}

	public function get_excel_apparel($ds,$de)
	{
		$this->db->from('order_apparel');
		$this->db->join('apparel_detail', 'apparel_detail.id_apparel = order_apparel.order_id');
		$this->db->where('order_apparel.date >=', $ds);
		$this->db->where('order_apparel.date <=', $de);
		$db = $this->db->get();
		return $db;
	}

	public function get_excel_apparel2($ds,$de)
	{
		$this->db->from('order_apparel');
		$this->db->join('apparel_detail2', 'apparel_detail2.id_apparel = order_apparel.order_id');
		$this->db->where('order_apparel.date >=', $ds);
		$this->db->where('order_apparel.date <=', $de);
		$db = $this->db->get();
		return $db;
	}

	
	public function pantywait()
	{
		if ($this->session->userdata('level') == "CUTTING") {
			$ses = 'check_cutting';
		}elseif ($this->session->userdata('level') == "VSE") {
			$ses = 'check_vse';			
		}elseif ($this->session->userdata('level') == "LAB") {
			$ses = 'check_lab';			
		}else{
			$ses = 'check_qa';			
		}

		$this->db->from('order_panty');
		$this->db->where($ses, '0');
		$this->db->where('status', '1');
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function brawait()
	{
		if ($this->session->userdata('level') == "CUTTING") {
			$ses = 'check_cutting';
		}elseif ($this->session->userdata('level') == "VSE") {
			$ses = 'check_vse';			
		}elseif ($this->session->userdata('level') == "LAB") {
			$ses = 'check_lab';			
		}else{
			$ses = 'check_qa';			
		}

		$this->db->from('order_bra');
		$this->db->where($ses, '0');
		$this->db->where('status', '1');		
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function maskwait()
	{
		if ($this->session->userdata('level') == "CUTTING") {
			$ses = 'check_cutting';
		}elseif ($this->session->userdata('level') == "VSE") {
			$ses = 'check_vse';			
		}elseif ($this->session->userdata('level') == "LAB") {
			$ses = 'check_lab';			
		}else{
			$ses = 'check_qa';			
		}

		$this->db->from('order_mask');
		$this->db->where($ses, '0');
		$this->db->where('status', '1');		
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function apparelwait()
	{
		if ($this->session->userdata('level') == "CUTTING") {
			$ses = 'check_cutting';
		}elseif ($this->session->userdata('level') == "VSE") {
			$ses = 'check_vse';			
		}elseif ($this->session->userdata('level') == "LAB") {
			$ses = 'check_lab';			
		}else{
			$ses = 'check_qa';			
		}

		$this->db->from('order_apparel');
		$this->db->where($ses, '0');
		$this->db->where('status', '1');		
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}

	function get_panty_sent()
	{
		$this->db->from('order_panty');
		$this->db->where('status', '2');
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}

	function get_bra_sent()
	{
		$this->db->from('order_bra');
		$this->db->where('status', '2');
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}

	function get_mask_sent()
	{
		$this->db->from('order_mask');
		$this->db->where('status', '2');
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}

	function get_apparel_sent()
	{
		$this->db->from('order_apparel');
		$this->db->where('status', '2');
		$this->db->order_by('date', 'desc');
		$db = $this->db->get();
		return $db;
	}
}

/* End of file Model.php */
/* Location: ./application/models/Model.php */