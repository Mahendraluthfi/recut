<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$data['content'] = 'home';
		$data['panty'] = $this->db->get_where('order_panty', array('date' => date('Y-m-d'), 'status' => '1'))->result();
		$data['bra'] = $this->db->get_where('order_bra', array('date' => date('Y-m-d'), 'status' => '1'))->result();
		$data['mask'] = $this->db->get_where('order_mask', array('date' => date('Y-m-d'), 'status' => '1'))->result();
		$this->load->view('index', $data);
	}

	public function request()
	{
		$cek = $this->db->get_where('order_panty', array('status' => 0));
		$cek2 = $this->db->get_where('order_bra', array('status' => 0));
		$cek3 = $this->db->get_where('order_mask', array('status' => 0));
		if ($cek->num_rows() > 0) {
			$res_cek = $cek->row();				
			$button_panty = '#PNTY_REQ-'.$res_cek->order_id; 
			$order_id = $res_cek->order_id;
			$btnadd = '';	
			$btnsub = '';				
			$po = '<input type="text" name="po" class="form-control" placeholder="#PO" value="'.$res_cek->po.'" required="">';
			$so = '<input type="text" name="so" class="form-control" placeholder="#SO" value="'.$res_cek->so.'">';
			$line = '
				<select name="line" class="form-control select2" style="width:100%;">
				<option value="'.$res_cek->line.'" selected="">'.$res_cek->line.'</option>
			';
			$shift = '
				<select name="shift" class="form-control select2" style="width:100%;">
				<option value="'.$res_cek->shift.'" selected="">'.$res_cek->shift.'</option>
			';				
			$style = '<input type="text" name="style" class="form-control" placeholder="Style" value="'.$res_cek->style.'">';
			$colour = '<input type="text" name="colour" class="form-control" placeholder="Colour" value="'.$res_cek->colour.'">';				
		}else{			
			$button_panty = '<a href="'.base_url().'welcome/add_panty" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Order</a>';
			// $data = array(
			// 	'button_panty' => '<a href="'.base_url().'welcome/add_panty" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Order</a>', 
				$order_id = '0';				
				$btnadd = 'disabled=""';				
				$btnsub = 'disabled=""';				
				$po = '<input type="text" name="po" class="form-control" placeholder="#PO" disabled="" required="">';
				$so = '<input type="text" name="so" class="form-control" placeholder="#SO" disabled="">';
				$line = '<select name="line" class="form-control select2" disabled="">';				
				$shift = '<select name="shift" class="form-control select2" disabled="">';				
				$style = '<input type="text" name="style" class="form-control" placeholder="Style" disabled="">';
				$colour = '<input type="text" name="colour" class="form-control" placeholder="Colour" disabled="">';				
			// );
		}

		if ($cek2->num_rows() > 0) {
			$row_bra = $cek2->row();			
			$btn_bra = '#BRA_REQ-'.$row_bra->order_id;
			$order_id_bra = $row_bra->order_id;
			$btnadd_bra = '';	
			$btnsub_bra = '';				
			$po_bra = '<input type="text" name="po_bra" class="form-control" placeholder="#PO" value="'.$row_bra->po.'" required="">';
			$so_bra = '<input type="text" name="so_bra" class="form-control" placeholder="#SO" value="'.$row_bra->so.'">';
			$line_bra = '
				<select name="line_bra" class="form-control select2" style="width:100%;">
				<option value="'.$row_bra->line.'" selected="">'.$row_bra->line.'</option>
			';
			$shift_bra = '
				<select name="shift_bra" class="form-control select2" style="width:100%;">
				<option value="'.$row_bra->shift.'" selected="">'.$row_bra->shift.'</option>
			';				
			$style_bra = '<input type="text" name="style_bra" class="form-control" placeholder="Style" value="'.$row_bra->style.'">';
			$colour_bra = '<input type="text" name="colour_bra" class="form-control" placeholder="Colour" value="'.$row_bra->colour.'">';
		}else{
			$btn_bra = '<a href="'.base_url().'welcome/add_bra" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Order</a>';	
			$order_id_bra = '0';				
			$btnadd_bra = 'disabled=""';				
			$btnsub_bra = 'disabled=""';				
			$po_bra = '<input type="text" name="po_bra" class="form-control" placeholder="#PO" disabled="" required="">';
			$so_bra = '<input type="text" name="so_bra" class="form-control" placeholder="#SO" disabled="">';
			$line_bra = '<select name="line_bra" class="form-control select2" disabled="">';				
			$shift_bra = '<select name="shift_bra" class="form-control select2" disabled="">';				
			$style_bra = '<input type="text" name="style_bra" class="form-control" placeholder="Style" disabled="">';
			$colour_bra = '<input type="text" name="colour_bra" class="form-control" placeholder="Colour" disabled="">';		
		}

		if ($cek3->num_rows() > 0) {			
			$row_mask = $cek3->row();			
			$btn_mask = '#MASK_REQ-'.$row_mask->order_id;
			$order_id_mask = $row_mask->order_id;
			$btnadd_mask = '';	
			$btnsub_mask = '';				
			$po_mask = '<input type="text" name="po_mask" class="form-control" placeholder="#PO" value="'.$row_mask->po.'" required="">';
			$so_mask = '<input type="text" name="so_mask" class="form-control" placeholder="#SO" value="'.$row_mask->so.'">';
			$line_mask = '
				<select name="line_mask" class="form-control select2" style="width:100%;">
				<option value="'.$row_mask->line.'" selected="">'.$row_mask->line.'</option>
			';
			$shift_mask = '
				<select name="shift_mask" class="form-control select2" style="width:100%;">
				<option value="'.$row_mask->shift.'" selected="">'.$row_mask->shift.'</option>
			';				
			$style_mask = '<input type="text" name="style_mask" class="form-control" placeholder="Style" value="'.$row_mask->style.'">';
			$colour_mask = '<input type="text" name="colour_mask" class="form-control" placeholder="Colour" value="'.$row_mask->colour.'">';		
		}else{
			$btn_mask = '<a href="'.base_url().'welcome/add_mask" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Order</a>';	
			$order_id_mask = '0';				
			$btnadd_mask = 'disabled=""';				
			$btnsub_mask = 'disabled=""';				
			$po_mask = '<input type="text" name="po_mask" class="form-control" placeholder="#PO" disabled="" required="">';
			$so_mask = '<input type="text" name="so_mask" class="form-control" placeholder="#SO" disabled="">';
			$line_mask = '<select name="line_mask" class="form-control select2" disabled="">';				
			$shift_mask = '<select name="shift_mask" class="form-control select2" disabled="">';				
			$style_mask = '<input type="text" name="style_mask" class="form-control" placeholder="Style" disabled="">';
			$colour_mask = '<input type="text" name="colour_mask" class="form-control" placeholder="Colour" disabled="">';	
		}

		$data = array(
			'content' => 'request',
			'button_bra' => $btn_bra,
			'button_mask' => $btn_mask,
			'button_panty' => $button_panty,
			'order_id' => $order_id,
			'btnadd' => $btnadd,
			'btnsub' => $btnsub,
			'po' => $po,
			'so' => $so,
			'line' => $line,
			'shift' => $shift,
			'style' => $style,
			'colour' => $colour,
			'order_id_bra' => $order_id_bra,
			'btnadd_bra' => $btnadd_bra,
			'btnsub_bra' => $btnsub_bra,
			'po_bra' => $po_bra,
			'so_bra' => $so_bra,
			'line_bra' => $line_bra,
			'shift_bra' => $shift_bra,
			'style_bra' => $style_bra,
			'colour_bra' => $colour_bra,
			'order_id_mask' => $order_id_mask,
			'btnadd_mask' => $btnadd_mask,
			'btnsub_mask' => $btnsub_mask,
			'po_mask' => $po_mask,
			'so_mask' => $so_mask,
			'line_mask' => $line_mask,
			'shift_mask' => $shift_mask,
			'style_mask' => $style_mask,
			'colour_mask' => $colour_mask,
		);
		// $data['content'] = 'request';
		$this->load->view('index', $data);
	}

	public function submit_apply($id)
	{
		$this->db->where('order_id', $id);
		$this->db->update('order_panty', array(
			'po' => $this->input->post('po'),
			'so' => $this->input->post('so'),
			'line' => $this->input->post('line'),
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'style' => $this->input->post('style'),
			'colour' => $this->input->post('colour'),
			'shift' => $this->input->post('shift'),
			'time_estimated' => $this->get_estimated(date('H:i:s')),
			'status' => '1',
		));
		redirect('welcome','refresh');
	}

	public function submit_bra($id)
	{
		$this->db->where('order_id', $id);
		$this->db->update('order_bra', array(
			'po' => $this->input->post('po_bra'),
			'so' => $this->input->post('so_bra'),
			'line' => $this->input->post('line_bra'),
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'style' => $this->input->post('style_bra'),
			'colour' => $this->input->post('colour_bra'),
			'shift' => $this->input->post('shift_bra'),
			'time_estimated' => $this->get_estimated(date('H:i:s')),
			'status' => '1',
		));
		redirect('welcome','refresh');
	}

	public function submit_mask($id)
	{
		$this->db->where('order_id', $id);
		$this->db->update('order_mask', array(
			'po' => $this->input->post('po_mask'),
			'so' => $this->input->post('so_mask'),
			'line' => $this->input->post('line_mask'),
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'style' => $this->input->post('style_mask'),
			'colour' => $this->input->post('colour_mask'),
			'shift' => $this->input->post('shift_mask'),
			'time_estimated' => $this->get_estimated(date('H:i:s')),
			'status' => '1',
		));
		redirect('welcome','refresh');
	}

	public function add_panty()
	{
		$this->db->insert('order_panty', array(
			'status' => 0
		));

		redirect('welcome/request','refresh');
	}

	public function add_bra()
	{
		$this->db->insert('order_bra', array(
			'status' => 0
		));

		redirect('welcome/request','refresh');
	}

	public function add_mask()
	{
		$this->db->insert('order_mask', array(
			'status' => 0
		));

		redirect('welcome/request','refresh');
	}

	public function get_panty($id)
	{
		$data = $this->db->get_where('order_panty', array('order_id' => $id))->row();
		echo json_encode($data);
	}

	public function get_bra($id)
	{
		$data = $this->db->get_where('order_bra', array('order_id' => $id))->row();
		echo json_encode($data);
	}

	public function get_mask($id)
	{
		$data = $this->db->get_where('order_mask', array('order_id' => $id))->row();
		echo json_encode($data);
	}

	public function total_panty($id)
	{
		$data = $this->db->query("SELECT sum(gusset) as totgusset, SUM(front) as totfront, SUM(back) as totback, sum(side) as totside, SUM(inners) as totinners FROM `panty_detail` WHERE id_panty = '$id'")->row();
		echo json_encode($data);
	}

	public function total_bra($id)
	{
		$data = $this->db->query("SELECT sum(wing) as twing, sum(cf) as tcf, sum(cup) as tcup, sum(inners) as tinners, sum(mesh) as tmesh, sum(liner) as tliner FROM `bra_detail` WHERE id_bra = '$id'")->row();
		echo json_encode($data);
	}

	public function total_mask($id)
	{
		$data = $this->db->query("SELECT sum(panel) as tpanel FROM `mask_detail` WHERE id_mask = '$id'")->row();
		echo json_encode($data);
	}

	public function view_panty($id)
	{
		$data = $this->db->get_where('panty_detail', array('id_panty' => $id))->result();
		echo json_encode($data);
	}

	public function view_bra($id)
	{
		$data = $this->db->get_where('bra_detail', array('id_bra' => $id))->result();
		echo json_encode($data);
	}

	public function view_mask($id)
	{
		$data = $this->db->get_where('mask_detail', array('id_mask' => $id))->result();
		echo json_encode($data);
	}

	public function add_row_panty($id)
	{
		
		$data = $this->db->insert('panty_detail', array(
			'id_panty' => $id,
			'size' => $this->input->post('size'),
			'gusset' => $this->input->post('gusset'),
			'front' => $this->input->post('front'),
			'side' => $this->input->post('side'),
			'back' => $this->input->post('back'),
			'inners' => $this->input->post('inner'),
			'remarks' => $this->input->post('remarks'),
		));
		echo json_encode($data);
	}

	public function add_row_bra($id)
	{
		
		$data = $this->db->insert('bra_detail', array(
			'id_bra' => $id,
			'size' => $this->input->post('size'),
			'wing' => $this->input->post('wing'),
			'cf' => $this->input->post('cf'),
			'cup' => $this->input->post('cup'),
			'inners' => $this->input->post('inner'),
			'mesh' => $this->input->post('mesh'),
			'liner' => $this->input->post('liner'),
			'remarks' => $this->input->post('remarks'),
		));
		echo json_encode($data);
	}

	public function add_row_mask($id)
	{		
		$data = $this->db->insert('mask_detail', array(
			'id_mask' => $id,
			'size' => $this->input->post('size'),
			'panel' => $this->input->post('panel'),			
			'remarks' => $this->input->post('remarks'),
		));
		echo json_encode($data);
	}

	public function delete_panty()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('panty_detail');
		echo json_encode(array('status' => TRUE));
	}

	public function delete_bra()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('bra_detail');
		echo json_encode(array('status' => TRUE));
	}

	public function delete_mask()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('mask_detail');
		echo json_encode(array('status' => TRUE));
	}

	public function get_estimated($time)
	{
		$timestamp = strtotime($time) + 180*60;
		$time = date('H:i:s', $timestamp);
		return $time;
		// echo $time;
	}

	public function login()
	{
		$epf = $this->input->post('epf');
		$password = md5($this->input->post('password'));

		$get = $this->db->get_where('user', array('epf' => $epf, 'password' => $password));
		if ($get->num_rows() > 0) {
			echo json_encode(TRUE);
			$array = $get->row();
			$array = array(
				'epf' => $array->epf,
				'username' => $array->username,
				'level' => $array->level,
			);
			
			$this->session->set_userdata( $array );
		}else{
			echo json_encode(FALSE);
		}			
	}

	public function logout()
	{
		session_destroy();
		redirect('welcome','refresh');
	}
}
