<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('fModel');
		$this->load->library('telegram/Telegram_lib');		
	}
	public function index()
	{
		$data['content'] = 'home';
		$panty = $this->fModel->getpanty()->result();
		foreach ($panty as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('panty',$value->order_id)->result();
		}
		$bra = $this->fModel->getbra()->result();
		foreach ($bra as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('bra',$value->order_id)->result();
		}
		$mask = $this->fModel->getmask()->result();
		foreach ($mask as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('mask',$value->order_id)->result();
		}
		$apparel = $this->fModel->getapparel()->result();
		foreach ($apparel as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('apparel',$value->order_id)->result();
		}
		$data['panty'] = $panty;
		$data['bra'] = $bra;
		$data['mask'] = $mask;		
		$data['apparel'] = $apparel;		
		$this->load->view('index', $data);
		// print_r($panty);
	}

	public function request()
	{
		$cek = $this->db->get_where('order_panty', array('status' => 0));
		$cek2 = $this->db->get_where('order_bra', array('status' => 0));
		$cek3 = $this->db->get_where('order_mask', array('status' => 0));
		$cek4 = $this->db->get_where('order_apparel', array('status' => 0));
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

		if ($cek4->num_rows() > 0) {
			$row_apparel = $cek4->row();			
			$btn_apparel = '#APPAREL_REQ-'.$row_apparel->order_id;
			$order_id_apparel = $row_apparel->order_id;
			$btnadd_apparel = '';	
			$btnadd_apparel2 = '';	
			$btnsub_apparel = '';				
			$po_apparel = '<input type="text" name="po_apparel" class="form-control" placeholder="#PO" value="'.$row_apparel->po.'" required="">';
			$so_apparel = '<input type="text" name="so_apparel" class="form-control" placeholder="#SO" value="'.$row_apparel->so.'">';
			$line_apparel = '
				<select name="line_apparel" class="form-control select2" style="width:100%;">
				<option value="'.$row_apparel->line.'" selected="">'.$row_apparel->line.'</option>
			';
			$shift_apparel = '
				<select name="shift_apparel" class="form-control select2" style="width:100%;">
				<option value="'.$row_apparel->shift.'" selected="">'.$row_apparel->shift.'</option>
			';				
			$style_apparel = '<input type="text" name="style_apparel" class="form-control" placeholder="Style" value="'.$row_apparel->style.'">';
			$colour_apparel = '<input type="text" name="colour_apparel" class="form-control" placeholder="Colour" value="'.$row_apparel->colour.'">';		
		}else{
			$btn_apparel = '<a href="'.base_url().'welcome/add_apparel" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Order</a>';	
			$order_id_apparel = '0';				
			$btnadd_apparel = 'disabled=""';				
			$btnadd_apparel2 = 'disabled=""';				
			$btnsub_apparel = 'disabled=""';				
			$po_apparel = '<input type="text" name="po_apparel" class="form-control" placeholder="#PO" disabled="" required="">';
			$so_apparel = '<input type="text" name="so_apparel" class="form-control" placeholder="#SO" disabled="">';
			$line_apparel = '<select name="line_apparel" class="form-control select2" disabled="">';				
			$shift_apparel = '<select name="shift_apparel" class="form-control select2" disabled="">';				
			$style_apparel = '<input type="text" name="style_apparel" class="form-control" placeholder="Style" disabled="">';
			$colour_apparel = '<input type="text" name="colour_apparel" class="form-control" placeholder="Colour" disabled="">';	
		}

		$data = array(
			'content' => 'request',
			'button_bra' => $btn_bra,
			'button_mask' => $btn_mask,
			'button_apparel' => $btn_apparel,
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
			'order_id_apparel' => $order_id_apparel,
			'btnadd_apparel' => $btnadd_apparel,
			'btnadd_apparel2' => $btnadd_apparel2,
			'btnsub_apparel' => $btnsub_apparel,
			'po_apparel' => $po_apparel,
			'so_apparel' => $so_apparel,
			'line_apparel' => $line_apparel,
			'shift_apparel' => $shift_apparel,
			'style_apparel' => $style_apparel,
			'colour_apparel' => $colour_apparel,
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
			'remarks' => '1',
		));		
		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => 'Issue',
			'time' => date('H:i:s'),
			'type' => 'panty',
		));
		$this->telegram_lib->sendmsg("*Request Recut Panty*\n#PO : ".$this->input->post('po')."\n#SO : ".$this->input->post('so')."\nLine : ".$this->input->post('line')."\nDatetime : ".date('Y-m-d H:i:s')."\nEstimate : ".$this->get_estimated(date('H:i:s'))."\nStatus : New Issue\n\nPlease Receive & Approve this issue through the  Recut System. Thank You !");


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
			'remarks' => '1',
		));

		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => 'Issue',
			'time' => date('H:i:s'),
			'type' => 'bra',
		));

		$this->telegram_lib->sendmsg("*Request Recut Bra*\n#PO : ".$this->input->post('po_bra')."\n#SO : ".$this->input->post('so_bra')."\nLine : ".$this->input->post('line_bra')."\nDatetime : ".date('Y-m-d H:i:s')."\nEstimate : ".$this->get_estimated(date('H:i:s'))."\nStatus : New Issue\n\nPlease Receive & Approve this issue through the  Recut System. Thank You !");

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
			'remarks' => '1',
		));

		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => 'Issue',
			'time' => date('H:i:s'),
			'type' => 'mask',
		));

		$this->telegram_lib->sendmsg("*Request Recut Mask*\n#PO : ".$this->input->post('po_mask')."\n#SO : ".$this->input->post('so_mask')."\nLine : ".$this->input->post('line_mask')."\nDatetime : ".date('Y-m-d H:i:s')."\nEstimate : ".$this->get_estimated(date('H:i:s'))."\nStatus : New Issue\n\nPlease Receive & Approve this issue through the  Recut System. Thank You !");

		redirect('welcome','refresh');
	}

	public function submit_apparel($id)
	{
		$this->db->where('order_id', $id);
		$this->db->update('order_apparel', array(
			'po' => $this->input->post('po_apparel'),
			'so' => $this->input->post('so_apparel'),
			'line' => $this->input->post('line_apparel'),
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'style' => $this->input->post('style_apparel'),
			'colour' => $this->input->post('colour_apparel'),
			'shift' => $this->input->post('shift_apparel'),
			'time_estimated' => $this->get_estimated(date('H:i:s')),
			'status' => '1',
			'remarks' => '1',
		));

		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => 'Issue',
			'time' => date('H:i:s'),
			'type' => 'apparel',
		));

		$this->telegram_lib->sendmsg("*Request Recut Apparel*\n#PO : ".$this->input->post('po_apparel')."\n#SO : ".$this->input->post('so_apparel')."\nLine : ".$this->input->post('line_apparel')."\nDatetime : ".date('Y-m-d H:i:s')."\nEstimate : ".$this->get_estimated(date('H:i:s'))."\nStatus : New Issue\n\nPlease Receive & Approve this issue through the  Recut System. Thank You !");

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

	public function add_apparel()
	{
		$this->db->insert('order_apparel', array(
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

	public function get_apparel($id)
	{
		$data = $this->db->get_where('order_apparel', array('order_id' => $id))->row();
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

	public function total_apparel($id)
	{
		$q1 = $this->db->query("SELECT SUM(qty) as total_waist, SUM(inners) as total_inners, SUM(outers) as total_outers FROM `apparel_detail` WHERE id_apparel = '$id'")->row();
		$q2 = $this->db->query("SELECT SUM(qty) as total_body, SUM(lefts) as total_lefts, SUM(rights) as total_rights FROM `apparel_detail2` WHERE id_apparel = '$id'")->row();
		$data = array(
			'total_waist' => $q1->total_waist,
			'total_inners' => $q1->total_inners,
			'total_outers' => $q1->total_outers,
			'total_body' => $q2->total_body,
			'total_lefts' => $q2->total_lefts,
			'total_rights' => $q2->total_rights,
		);
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

	public function view_apparel($id)
	{
		$data = $this->db->get_where('apparel_detail', array('id_apparel' => $id))->result();
		echo json_encode($data);
	}

	public function view_apparel2($id)
	{
		$data = $this->db->get_where('apparel_detail2', array('id_apparel' => $id))->result();
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
			'type' => $this->input->post('type_panty'),
			'gusset_shape' => $this->input->post('gusset_shape'),
			'front_shape' => $this->input->post('front_shape'),
			'side_shape' => $this->input->post('side_shape'),
			'back_shape' => $this->input->post('back_shape'),
			'inners_shape' => $this->input->post('inner_shape'),
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
			'wing_shape' => $this->input->post('wing_shape'),
			'cf_shape' => $this->input->post('cf_shape'),
			'cup_shape' => $this->input->post('cup_shape'),
			'inners_shape' => $this->input->post('inners_shape'),
			'mesh_shape' => $this->input->post('mesh_shape'),
			'liner_shape' => $this->input->post('liner_shape'),
			'type' => $this->input->post('type_bra'),
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

	public function add_row_apparel($id)
	{							
		if ($this->input->post('type_apparel') == "AC") {
			$waist = 'Full Garment';
		}else{
			$waist = $this->input->post('waist');			
		}
		$data = $this->db->insert('apparel_detail', array(
			'id_apparel' => $id,
			'size' => $this->input->post('size'),
			'waist' => $waist,			
			'inners' => $this->input->post('inners'),			
			'outers' => $this->input->post('outers'),			
			'qty' => $this->input->post('qty'),			
			'type' => $this->input->post('type_apparel'),			
			'remarks' => $this->input->post('remarks'),
		));
		echo json_encode($data);
	}

	public function add_row_apparel2($id)
	{							
		if ($this->input->post('type_apparel') == "AC") {
			$body = 'Full Garment';
		}else{
			$body = $this->input->post('body');			
		}
		$data = $this->db->insert('apparel_detail2', array(
			'id_apparel' => $id,
			'size' => $this->input->post('size'),
			'body' => $body,			
			'lefts' => $this->input->post('lefts'),			
			'rights' => $this->input->post('rights'),			
			'qty' => $this->input->post('qty'),			
			'type' => $this->input->post('type_apparel'),			
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

	public function delete_apparel()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('apparel_detail');
		echo json_encode(array('status' => TRUE));
	}

	public function delete_apparel2()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('apparel_detail2');
		echo json_encode(array('status' => TRUE));
	}

	public function get_estimated($time)
	{
		$today = date('Y-m-d');
		$tomorrow = date('Y-m-d',strtotime($today . "+1 days"));
		if ($time < date('H:i:s', strtotime('07:00:00'))) {
			$estimate = $today.' 10:00"00';
		}elseif ($time < date('H:i:s', strtotime('10:00:00'))) {
			$estimate = $today.' 13:00"00';			
		}elseif ($time < date('H:i:s', strtotime('13:00:00'))) {
			$estimate = $today.' 16:00"00';
		}elseif ($time < date('H:i:s', strtotime('16:00:00'))) {
			$estimate = $today.' 19:00"00';
		}elseif ($time < date('H:i:s', strtotime('19:00:00'))) {
			$estimate = $today.' 21:30"00';
		}else{
			$estimate = $tomorrow.' 07:00"00';
		}

		return $estimate;
	}

	public function status_panty($id)
	{
		$data = $this->db->get_where('status', array('order_id' => $id, 'type' => 'panty'))->result();
		echo json_encode($data);
	}

	public function status_bra($id)
	{
		$data = $this->db->get_where('status', array('order_id' => $id, 'type' => 'bra'))->result();
		echo json_encode($data);
	}

	public function status_mask($id)
	{
		$data = $this->db->get_where('status', array('order_id' => $id, 'type' => 'mask'))->result();
		echo json_encode($data);
	}

	public function status_apparel($id)
	{
		$data = $this->db->get_where('status', array('order_id' => $id, 'type' => 'apparel'))->result();
		echo json_encode($data);
	}

	public function receive_status($type,$id)
	{
		$get = $this->db->get_where('order_'.$type, array('order_id' => $id))->row();
		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => 'Received by '.$this->input->post('status'),
			'time' => date('H:i:s'),
			'type' => $type,
		));

		$this->telegram_lib->sendmsg("*Recut ".$type."\n#PO : ".$get->po."\nHas been Received by ".$this->input->post('status')."\nTime :".date('H:i:s'));		

		$this->db->where('order_id', $id);
		$this->db->update('order_'.$type, array(
				'remarks' => '3',
				'status' => '2'
		));

		redirect(base_url(),'refresh');
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

	public function telechat()
	{
		$this->load->library('telegram/Telegram_lib');
		$this->telegram_lib->sendmsg("Joss Bot bekerja dengan baik");
	}
	
}
