<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('././vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('epf'))) {
			redirect('welcome','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('Model');
		$this->load->model('fModel');
		$this->load->library('pdfgenerator');
		$this->load->library('telegram/Telegram_lib');					
	}

	public function index()
	{
		$data['panty'] = $this->Model->pantywait()->result();
		$data['bra'] = $this->Model->brawait()->result();
		$data['mask'] = $this->Model->maskwait()->result();
		$data['apparel'] = $this->Model->apparelwait()->result();
		$data['content'] = 'admin_dashboard';
		$this->load->view('dashboard', $data);		
	}

	public function request_panty()
	{
		$panty = $this->Model->get_panty()->result();
		foreach ($panty as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('panty',$value->order_id)->result();			
		}
		$sent = $this->Model->get_panty_sent()->result();
		foreach ($sent as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('panty',$value->order_id)->result();						
		}
		$data['get'] = $panty;
		$data['sent'] = $sent;
		$data['content'] = 'admin_request';
		$this->load->view('dashboard', $data);		
	}

	public function request_bra()
	{	
		$bra = $this->Model->get_bra()->result();
		foreach ($bra as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('bra',$value->order_id)->result();			
		}
		$sent = $this->Model->get_bra_sent()->result();
		foreach ($sent as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('bra',$value->order_id)->result();						
		}
		$data['get'] = $bra;
		$data['sent'] = $sent;
		$data['content'] = 'admin_bra';
		$this->load->view('dashboard', $data);
	}

	public function request_mask()
	{	
		$mask = $this->Model->get_mask()->result();
		foreach ($mask as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('mask',$value->order_id)->result();			
		}
		$sent = $this->Model->get_mask_sent()->result();
		foreach ($sent as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('mask',$value->order_id)->result();						
		}
		$data['get'] = $mask;
		$data['sent'] = $sent;
		$data['content'] = 'admin_mask';
		$this->load->view('dashboard', $data);
	}


	public function request_apparel()
	{	
		$apparel = $this->Model->get_apparel()->result();
		foreach ($apparel as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('apparel',$value->order_id)->result();			
		}
		$sent = $this->Model->get_apparel_sent()->result();
		foreach ($sent as $key => $value) {
			$value->getstatus = $this->fModel->getlast_status('apparel',$value->order_id)->result();						
		}
		$data['get'] = $apparel;
		$data['sent'] = $sent;
		$data['content'] = 'admin_apparel';
		$this->load->view('dashboard', $data);
	}

	public function validate_panty($id)
	{		
		$get = $this->db->get_where('order_panty', array('order_id'=> $id))->row();
		if ($this->session->userdata('level')=="QA") {
			$this->db->where('order_id', $id);
			$this->db->update('order_panty', array('check_qa' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by QA',
				'time' => date('H:i:s'),
				'type' => 'panty',
			));

			$this->telegram_lib->sendmsg("*Request Recut Panty*\n#PO : ".$get->po."\nHas been approved by QA (".$this->session->userdata('username').") at ".date('H:i:s'));
		}elseif($this->session->userdata('level')=="VSE"){
			$this->db->where('order_id', $id);
			$this->db->update('order_panty', array('check_vse' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by VSE',
				'time' => date('H:i:s'),
				'type' => 'panty',
			));

			$this->telegram_lib->sendmsg("*Request Recut Panty*\n#PO : ".$get->po."\nHas been approved by VSE (".$this->session->userdata('username').") at ".date('H:i:s'));
		}elseif($this->session->userdata('level')=="LAB"){
			$this->db->where('order_id', $id);
			$this->db->update('order_panty', array('check_lab' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by LAB',
				'time' => date('H:i:s'),
				'type' => 'panty',
			));

			$this->telegram_lib->sendmsg("*Request Recut Panty*\n#PO : ".$get->po."\nHas been approved by LAB (".$this->session->userdata('username').") at ".date('H:i:s'));
		}else{
			$this->db->where('order_id', $id);
			$this->db->update('order_panty', array('check_cutting' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by Cutting',
				'time' => date('H:i:s'),
				'type' => 'panty',
			));

			$this->telegram_lib->sendmsg("*Request Recut Panty*\n#PO : ".$get->po."\nHas been approved by Cutting (".$this->session->userdata('username').") at ".date('H:i:s'));				
		}

		redirect('admin/request_panty','refresh');
	}

	public function validate_bra($id)
	{		
		$get = $this->db->get_where('order_bra', array('order_id'=> $id))->row();
		if ($this->session->userdata('level')=="QA") {
			$this->db->where('order_id', $id);
			$this->db->update('order_bra', array('check_qa' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by QA',
				'time' => date('H:i:s'),
				'type' => 'bra',
			));

			$this->telegram_lib->sendmsg("*Request Recut Bra*\n#PO : ".$get->po."\nHas been approved by QA (".$this->session->userdata('username').") at ".date('H:i:s'));
		}elseif($this->session->userdata('level')=="VSE"){
			$this->db->where('order_id', $id);
			$this->db->update('order_bra', array('check_vse' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by VSE',
				'time' => date('H:i:s'),
				'type' => 'bra',
			));

			$this->telegram_lib->sendmsg("*Request Recut Bra*\n#PO : ".$get->po."\nHas been approved by VSE (".$this->session->userdata('username').") at ".date('H:i:s'));
		}elseif($this->session->userdata('level')=="LAB"){
			$this->db->where('order_id', $id);
			$this->db->update('order_bra', array('check_lab' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by LAB',
				'time' => date('H:i:s'),
				'type' => 'bra',
			));

			$this->telegram_lib->sendmsg("*Request Recut Bra*\n#PO : ".$get->po."\nHas been approved by LAB (".$this->session->userdata('username').") at ".date('H:i:s'));
		}else{
			$this->db->where('order_id', $id);
			$this->db->update('order_bra', array('check_cutting' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by Cutting',
				'time' => date('H:i:s'),
				'type' => 'bra',
			));

			$this->telegram_lib->sendmsg("*Request Recut Bra*\n#PO : ".$get->po."\nHas been approved by Cutting (".$this->session->userdata('username').") at ".date('H:i:s'));				
		}

		redirect('admin/request_bra','refresh');
	}

	public function validate_mask($id)
	{		
		$get = $this->db->get_where('order_mask', array('order_id'=> $id))->row();
		if ($this->session->userdata('level')=="QA") {
			$this->db->where('order_id', $id);
			$this->db->update('order_mask', array('check_qa' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by QA',
				'time' => date('H:i:s'),
				'type' => 'mask',
			));

			$this->telegram_lib->sendmsg("*Request Recut Mask*\n#PO : ".$get->po."\nHas been approved by QA (".$this->session->userdata('username').") at ".date('H:i:s'));
		}elseif($this->session->userdata('level')=="VSE"){
			$this->db->where('order_id', $id);
			$this->db->update('order_mask', array('check_vse' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by VSE',
				'time' => date('H:i:s'),
				'type' => 'mask',
			));

			$this->telegram_lib->sendmsg("*Request Recut Mask*\n#PO : ".$get->po."\nHas been approved by VSE (".$this->session->userdata('username').") at ".date('H:i:s'));
		}elseif($this->session->userdata('level')=="LAB"){
			$this->db->where('order_id', $id);
			$this->db->update('order_mask', array('check_lab' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by LAB',
				'time' => date('H:i:s'),
				'type' => 'mask',
			));

			$this->telegram_lib->sendmsg("*Request Recut Mask*\n#PO : ".$get->po."\nHas been approved by LAB (".$this->session->userdata('username').") at ".date('H:i:s'));
		}else{
			$this->db->where('order_id', $id);
			$this->db->update('order_mask', array('check_cutting' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by Cutting',
				'time' => date('H:i:s'),
				'type' => 'mask',
			));

			$this->telegram_lib->sendmsg("*Request Recut Mask*\n#PO : ".$get->po."\nHas been approved by Cutting (".$this->session->userdata('username').") at ".date('H:i:s'));				
		}

		redirect('admin/request_mask','refresh');
	}

	public function validate_apparel($id)
	{		
		$get = $this->db->get_where('order_apparel', array('order_id'=> $id))->row();
		if ($this->session->userdata('level')=="QA") {
			$this->db->where('order_id', $id);
			$this->db->update('order_apparel', array('check_qa' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by QA',
				'time' => date('H:i:s'),
				'type' => 'apparel',
			));

			$this->telegram_lib->sendmsg("*Request Recut Apparel*\n#PO : ".$get->po."\nHas been approved by QA (".$this->session->userdata('username').") at ".date('H:i:s'));
		}elseif($this->session->userdata('level')=="VSE"){
			$this->db->where('order_id', $id);
			$this->db->update('order_apparel', array('check_vse' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by VSE',
				'time' => date('H:i:s'),
				'type' => 'apparel',
			));

			$this->telegram_lib->sendmsg("*Request Recut Apparel*\n#PO : ".$get->po."\nHas been approved by VSE (".$this->session->userdata('username').") at ".date('H:i:s'));
		}elseif($this->session->userdata('level')=="LAB"){
			$this->db->where('order_id', $id);
			$this->db->update('order_apparel', array('check_lab' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by LAB',
				'time' => date('H:i:s'),
				'type' => 'apparel',
			));

			$this->telegram_lib->sendmsg("*Request Recut Apparel*\n#PO : ".$get->po."\nHas been approved by LAB (".$this->session->userdata('username').") at ".date('H:i:s'));
		}else{
			$this->db->where('order_id', $id);
			$this->db->update('order_apparel', array('check_cutting' => '1'));

			$this->db->insert('status', array(
				'order_id' => $id,
				'status' => 'Approved by Cutting',
				'time' => date('H:i:s'),
				'type' => 'apparel',
			));

			$this->telegram_lib->sendmsg("*Request Recut Apparel*\n#PO : ".$get->po."\nHas been approved by Cutting (".$this->session->userdata('username').") at ".date('H:i:s'));				
		}

		redirect('admin/request_apparel','refresh');
	}

	public function dash_approve($type,$id)
	{		
		if ($type == 'panty') {
			if ($this->session->userdata('level')=="QA") {
				$this->db->where('order_id', $id);
				$this->db->update('order_panty', array('check_qa' => '1'));
			}elseif($this->session->userdata('level')=="VSE"){
				$this->db->where('order_id', $id);
				$this->db->update('order_panty', array('check_vse' => '1'));
			}else{
				$this->db->where('order_id', $id);
				$this->db->update('order_panty', array('check_cutting' => '1'));
			}			
		}elseif($type == "bra"){
			if ($this->session->userdata('level')=="QA") {
				$this->db->where('order_id', $id);
				$this->db->update('order_bra', array('check_qa' => '1'));
			}elseif($this->session->userdata('level')=="VSE"){
				$this->db->where('order_id', $id);
				$this->db->update('order_bra', array('check_vse' => '1'));
			}else{
				$this->db->where('order_id', $id);
				$this->db->update('order_bra', array('check_cutting' => '1'));
			}
		}else{
			if ($this->session->userdata('level')=="QA") {
				$this->db->where('order_id', $id);
				$this->db->update('order_mask', array('check_qa' => '1'));
			}elseif($this->session->userdata('level')=="VSE"){
				$this->db->where('order_id', $id);
				$this->db->update('order_mask', array('check_vse' => '1'));
			}else{
				$this->db->where('order_id', $id);
				$this->db->update('order_mask', array('check_cutting' => '1'));
			}
		}

		redirect('admin','refresh');	
	}

	public function user()
	{
		$data['get'] = $this->db->get('user')->result();
		$data['content'] = 'admin_user';
		$this->load->view('dashboard', $data);			
	}

	public function get_user($id)
	{
		$data = $this->db->get_where('user', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function save_user()
	{
		$this->db->insert('user', array(
			'epf' => $this->input->post('epf'),
			'username' => $this->input->post('username'),
			'level' => $this->input->post('level'),
			'password' => md5($this->input->post('epf'))
		));
		redirect('admin/user','refresh');
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		redirect('admin/user','refresh');
	}

	public function edit_user()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user', array(
			'username' => $this->input->post('username1'),
			'level' => $this->input->post('level1'),
		));

		redirect('admin/user','refresh');
	}

	public function download_panty($id)
	{
		$data['total'] = $this->db->query("SELECT sum(gusset) as totgusset, SUM(front) as totfront, SUM(back) as totback, sum(side) as totside, SUM(inners) as totinners FROM `panty_detail` WHERE id_panty = '$id'")->row();		
		$data['get'] = $this->db->get_where('order_panty', array('order_id' => $id))->row();
		$data['status'] = $this->db->get_where('status', array('type' => 'panty', 'order_id' => $id))->result();
		$data['detail'] = $this->db->get_where('panty_detail', array('id_panty' => $id))->result();
    	$html = $this->load->view('panty_pdf', $data, TRUE);
    	$filename = 'Panty_recut_'.$id;    	
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'potrait');		
	}

	public function download_bra($id)
	{
		$data['total'] = $this->db->query("SELECT sum(wing) as twing, sum(cf) as tcf, sum(cup) as tcup, sum(inners) as tinners, sum(mesh) as tmesh, sum(liner) as tliner FROM `bra_detail` WHERE id_bra = '$id'")->row();		
		$data['get'] = $this->db->get_where('order_bra', array('order_id' => $id))->row();
		$data['status'] = $this->db->get_where('status', array('type' => 'bra', 'order_id' => $id))->result();		
		$data['detail'] = $this->db->get_where('bra_detail', array('id_bra' => $id))->result();
    	$html = $this->load->view('bra_pdf', $data, TRUE);
    	$filename = 'Bra_recut_'.$id;    	
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'potrait');		
	}

	public function download_mask($id)
	{
		$data['total'] = $this->db->query("SELECT sum(panel) as tpanel FROM `mask_detail` WHERE id_mask = '$id'")->row();		
		$data['get'] = $this->db->get_where('order_mask', array('order_id' => $id))->row();
		$data['status'] = $this->db->get_where('status', array('type' => 'mask', 'order_id' => $id))->result();				
		$data['detail'] = $this->db->get_where('mask_detail', array('id_mask' => $id))->result();
    	$html = $this->load->view('mask_pdf', $data, TRUE);
    	$filename = 'Mask_recut_'.$id;    	
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'potrait');		
	}

	public function download_apparel($id)
	{
		$data['total'] = $this->db->query("SELECT SUM(qty) as total_waist, SUM(inners) as total_inners, SUM(outers) as total_outers FROM `apparel_detail` WHERE id_apparel = '$id'")->row();
		$data['total2'] = $this->db->query("SELECT SUM(qty) as total_body, SUM(lefts) as total_lefts, SUM(rights) as total_rights FROM `apparel_detail2` WHERE id_apparel = '$id'")->row();
		$data['get'] = $this->db->get_where('order_apparel', array('order_id' => $id))->row();
		$data['status'] = $this->db->get_where('status', array('type' => 'apparel', 'order_id' => $id))->result();				
		$data['detail'] = $this->db->get_where('apparel_detail', array('id_apparel' => $id))->result();
		$data['detail2'] = $this->db->get_where('apparel_detail2', array('id_apparel' => $id))->result();
    	$html = $this->load->view('apparel_pdf', $data, TRUE);
    	$filename = 'Apparel_recut_'.$id;    	
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'potrait');		
	}

	public function exportexcel()
	{
		$ds = $this->input->post('ds');
		$de = $this->input->post('de');
		$get = $this->Model->get_excel($ds,$de)->result();
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Recut System')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'NO')
		->setCellValue('B1', 'PO#')
		->setCellValue('C1', 'SO#')
		->setCellValue('D1', 'LINE')
		->setCellValue('E1', 'SHIFT')
		->setCellValue('F1', 'DATE')
		->setCellValue('G1', 'TIME')
		->setCellValue('H1', 'ESTIMATED_TIME')
		->setCellValue('I1', 'STYLE')
		->setCellValue('J1', 'COLOUR')
		->setCellValue('K1', 'SIZE')
		->setCellValue('L1', 'GUSSET')
		->setCellValue('M1', 'FRONT')
		->setCellValue('N1', 'BACK')
		->setCellValue('O1', 'SIDE')
		->setCellValue('P1', 'INNER')
		->setCellValue('Q1', 'GUSSET_SHAPE')
		->setCellValue('R1', 'FRONT_SHAPE')
		->setCellValue('S1', 'BACK_SHAPE')
		->setCellValue('T1', 'SIDE_SHAPE')
		->setCellValue('U1', 'INNER_SHAPE')
		->setCellValue('V1', 'TYPE')				
		->setCellValue('W1', 'REMARKS')				
		;

		$spreadsheet->getActiveSheet()->getStyle('A1:W1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i=2; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->po)
		->setCellValue('C'.$i, $data->so)
		->setCellValue('D'.$i, $data->line)
		->setCellValue('E'.$i, $data->shift)
		->setCellValue('F'.$i, $data->date)
		->setCellValue('G'.$i, $data->time)
		->setCellValue('H'.$i, $data->time_estimated)
		->setCellValue('I'.$i, $data->style)
		->setCellValue('J'.$i, $data->colour)
		->setCellValue('K'.$i, $data->size)
		->setCellValue('L'.$i, $data->gusset)
		->setCellValue('M'.$i, $data->front)
		->setCellValue('N'.$i, $data->back)
		->setCellValue('O'.$i, $data->side)
		->setCellValue('P'.$i, $data->inners)
		->setCellValue('Q'.$i, $data->gusset_shape)
		->setCellValue('R'.$i, $data->front_shape)
		->setCellValue('S'.$i, $data->back_shape)
		->setCellValue('T'.$i, $data->side_shape)
		->setCellValue('U'.$i, $data->inners_shape)
		->setCellValue('V'.$i, $data->type)	
		->setCellValue('W'.$i, $data->remarks);	
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Export Data Request');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$filename = "Recut Panty ".$ds."-".$de.".xlsx";
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function braexcel()
	{
		$ds = $this->input->post('ds');
		$de = $this->input->post('de');
		$get = $this->Model->get_excel_bra($ds,$de)->result();
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Recut System')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'NO')
		->setCellValue('B1', 'PO#')
		->setCellValue('C1', 'SO#')
		->setCellValue('D1', 'LINE')
		->setCellValue('E1', 'SHIFT')
		->setCellValue('F1', 'DATE')
		->setCellValue('G1', 'TIME')
		->setCellValue('H1', 'ESTIMATED_TIME')
		->setCellValue('I1', 'STYLE')
		->setCellValue('J1', 'COLOUR')
		->setCellValue('K1', 'SIZE')
		->setCellValue('L1', 'WING')
		->setCellValue('M1', 'CF')
		->setCellValue('N1', 'CUP')
		->setCellValue('O1', 'INNER')
		->setCellValue('P1', 'MESH')
		->setCellValue('Q1', 'LINER')		
		->setCellValue('R1', 'WING_SHAPE')
		->setCellValue('S1', 'CF_SHAPE')
		->setCellValue('T1', 'CUP_SHAPE')
		->setCellValue('U1', 'INNER_SHAPE')
		->setCellValue('V1', 'MESH_SHAPE')
		->setCellValue('W1', 'LINER_SHAPE')		
		->setCellValue('X1', 'TYPE')		
		->setCellValue('Y1', 'REMARKS')		
		;

		$spreadsheet->getActiveSheet()->getStyle('A1:Y1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i=2; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->po)
		->setCellValue('C'.$i, $data->so)
		->setCellValue('D'.$i, $data->line)
		->setCellValue('E'.$i, $data->shift)
		->setCellValue('F'.$i, $data->date)
		->setCellValue('G'.$i, $data->time)
		->setCellValue('H'.$i, $data->time_estimated)
		->setCellValue('I'.$i, $data->style)
		->setCellValue('J'.$i, $data->colour)
		->setCellValue('K'.$i, $data->size)
		->setCellValue('L'.$i, $data->wing)
		->setCellValue('M'.$i, $data->cf)
		->setCellValue('N'.$i, $data->cup)
		->setCellValue('O'.$i, $data->inners)
		->setCellValue('P'.$i, $data->mesh)
		->setCellValue('Q'.$i, $data->liner)
		->setCellValue('R'.$i, $data->wing_shape)
		->setCellValue('S'.$i, $data->cf_shape)
		->setCellValue('T'.$i, $data->cup_shape)
		->setCellValue('U'.$i, $data->inners_shape)
		->setCellValue('V'.$i, $data->mesh_shape)
		->setCellValue('W'.$i, $data->liner_shape)	
		->setCellValue('X'.$i, $data->type)	
		->setCellValue('Y'.$i, $data->remarks);	
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Export Data Request');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$filename = "Recut Bra ".$ds."-".$de.".xlsx";
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function maskexcel()
	{
		$ds = $this->input->post('ds');
		$de = $this->input->post('de');
		$get = $this->Model->get_excel_mask($ds,$de)->result();
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Recut System')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'NO')
		->setCellValue('B1', 'PO#')
		->setCellValue('C1', 'SO#')
		->setCellValue('D1', 'LINE')
		->setCellValue('E1', 'SHIFT')
		->setCellValue('F1', 'DATE')
		->setCellValue('G1', 'TIME')
		->setCellValue('H1', 'ESTIMATED TIME')
		->setCellValue('I1', 'STYLE')
		->setCellValue('J1', 'COLOUR')
		->setCellValue('K1', 'SIZE')
		->setCellValue('L1', 'MAIN PANEL')		
		->setCellValue('N1', 'REMARKS')		
		;

		$spreadsheet->getActiveSheet()->getStyle('A1:M1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i=2; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->po)
		->setCellValue('C'.$i, $data->so)
		->setCellValue('D'.$i, $data->line)
		->setCellValue('E'.$i, $data->shift)
		->setCellValue('F'.$i, $data->date)
		->setCellValue('G'.$i, $data->time)
		->setCellValue('H'.$i, $data->time_estimated)
		->setCellValue('I'.$i, $data->style)
		->setCellValue('J'.$i, $data->colour)
		->setCellValue('K'.$i, $data->size)
		->setCellValue('L'.$i, $data->panel)		
		->setCellValue('M'.$i, $data->remarks);	
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Export Data Request');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$filename = "Recut Mask ".$ds."-".$de.".xlsx";
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function apparelexcel()
	{
		$ds = $this->input->post('ds');
		$de = $this->input->post('de');
		$get = $this->Model->get_excel_apparel($ds,$de)->result();
		$numget = $this->Model->get_excel_apparel($ds,$de)->num_rows();
		$get2 = $this->Model->get_excel_apparel2($ds,$de)->result();
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Recut System')
		->setLastModifiedBy('Autonomation')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'NO')
		->setCellValue('B1', 'PO#')
		->setCellValue('C1', 'SO#')
		->setCellValue('D1', 'LINE')
		->setCellValue('E1', 'SHIFT')
		->setCellValue('F1', 'DATE')
		->setCellValue('G1', 'TIME')
		->setCellValue('H1', 'ESTIMATED TIME')
		->setCellValue('I1', 'STYLE')
		->setCellValue('J1', 'COLOUR')
		->setCellValue('K1', 'SIZE')
		->setCellValue('L1', 'PANEL WAIST BAND NAME')		
		->setCellValue('M1', 'INNER')		
		->setCellValue('N1', 'OUTER')		
		->setCellValue('O1', 'QTY')		
		->setCellValue('P1', 'REMARKS')		
		->setCellValue('Q1', 'TYPE')		
		;

		$spreadsheet->getActiveSheet()->getStyle('A1:Q1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i=2; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->po)
		->setCellValue('C'.$i, $data->so)
		->setCellValue('D'.$i, $data->line)
		->setCellValue('E'.$i, $data->shift)
		->setCellValue('F'.$i, $data->date)
		->setCellValue('G'.$i, $data->time)
		->setCellValue('H'.$i, $data->time_estimated)
		->setCellValue('I'.$i, $data->style)
		->setCellValue('J'.$i, $data->colour)
		->setCellValue('K'.$i, $data->size)
		->setCellValue('L'.$i, $data->waist)		
		->setCellValue('M'.$i, $data->inners)		
		->setCellValue('N'.$i, $data->outers)		
		->setCellValue('O'.$i, $data->qty)		
		->setCellValue('P'.$i, $data->remarks)	
		->setCellValue('Q'.$i, $data->type);		
		$i++;
		}

		$cell2 = $numget + 4;

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$cell2, 'NO')
		->setCellValue('B'.$cell2, 'PO#')
		->setCellValue('C'.$cell2, 'SO#')
		->setCellValue('D'.$cell2, 'LINE')
		->setCellValue('E'.$cell2, 'SHIFT')
		->setCellValue('F'.$cell2, 'DATE')
		->setCellValue('G'.$cell2, 'TIME')
		->setCellValue('H'.$cell2, 'ESTIMATED TIME')
		->setCellValue('I'.$cell2, 'STYLE')
		->setCellValue('J'.$cell2, 'COLOUR')
		->setCellValue('K'.$cell2, 'SIZE')
		->setCellValue('L'.$cell2, 'PANEL BODY BAND NAME')		
		->setCellValue('M'.$cell2, 'LEFT')		
		->setCellValue('N'.$cell2, 'RIGHT')		
		->setCellValue('O'.$cell2, 'QTY')		
		->setCellValue('P'.$cell2, 'REMARKS')		
		->setCellValue('Q'.$cell2, 'TYPE')		
		;

		$x=$cell2+1; foreach($get2 as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$x, $no++)		
		->setCellValue('B'.$x, $data->po)
		->setCellValue('C'.$x, $data->so)
		->setCellValue('D'.$x, $data->line)
		->setCellValue('E'.$x, $data->shift)
		->setCellValue('F'.$x, $data->date)
		->setCellValue('G'.$x, $data->time)
		->setCellValue('H'.$x, $data->time_estimated)
		->setCellValue('I'.$x, $data->style)
		->setCellValue('J'.$x, $data->colour)
		->setCellValue('K'.$x, $data->size)
		->setCellValue('L'.$x, $data->body)		
		->setCellValue('M'.$x, $data->lefts)		
		->setCellValue('N'.$x, $data->rights)		
		->setCellValue('O'.$x, $data->qty)		
		->setCellValue('P'.$x, $data->remarks)	
		->setCellValue('Q'.$x, $data->type);		
		$i++;
		}

		$spreadsheet->getActiveSheet()->getStyle('A'.$cell2.':Q'.$cell2)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');		

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Export Data Request');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		$filename = "Recut Apaprel ".$ds."-".$de.".xlsx";
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	
	public function senditem($table,$id)
	{
		$get = $this->db->get_where($table, array('order_id' => $id))->row();
		$this->db->where('order_id', $id);
		$this->db->update($table, array(
			'remarks' => '2'
		));

		$type = str_replace('order_', '', $table);

		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => 'Sent to line',
			'time' => date('H:i:s'),
			'type' => $type,
		));

		$title = str_replace("order_","Request Recut ",$table);		

		$this->telegram_lib->sendmsg("*".$title."*\n#PO : ".$get->po."\nHas been sent to ".$get->line."\n".date('H:i:s')."\n---------------\nStatus by ".$this->session->userdata('username'));

		$red = str_replace("order","request",$table);
		redirect('admin/'.$red,'refresh');

	}

	public function addstatus_panty($id)
	{
		$get = $this->db->get_where('order_panty', array('order_id' => $id))->row();
		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => $this->input->post('status').' ('.$this->session->userdata('username').')',
			'time' => date('H:i:s'),
			'type' => 'panty',
		));

		$this->telegram_lib->sendmsg("*Request Recut Panty*\n#PO : ".$get->po."\n".$this->session->userdata('username')." has updated new status\n".date('H:i:s')."\n---------------\n".$this->input->post('status'));


		redirect('admin/request_panty','refresh');
	}

	public function addstatus_bra($id)
	{
		$get = $this->db->get_where('order_bra', array('order_id' => $id))->row();
		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => $this->input->post('status').' ('.$this->session->userdata('username').')',
			'time' => date('H:i:s'),
			'type' => 'bra',
		));

		$this->telegram_lib->sendmsg("*Request Recut Bra*\n#PO : ".$get->po."\n".$this->session->userdata('username')." has updated new status\n".date('H:i:s')."\n---------------\n".$this->input->post('status'));


		redirect('admin/request_bra','refresh');
	}

	public function addstatus_mask($id)
	{
		$get = $this->db->get_where('order_mask', array('order_id' => $id))->row();
		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => $this->input->post('status').' ('.$this->session->userdata('username').')',
			'time' => date('H:i:s'),
			'type' => 'mask',
		));

		$this->telegram_lib->sendmsg("*Request Recut Mask*\n#PO : ".$get->po."\n".$this->session->userdata('username')." has updated new status\n".date('H:i:s')."\n---------------\n".$this->input->post('status'));


		redirect('admin/request_mask','refresh');
	}

	public function addstatus_apparel($id)
	{
		$get = $this->db->get_where('order_apparel', array('order_id' => $id))->row();
		$this->db->insert('status', array(
			'order_id' => $id,
			'status' => $this->input->post('status').' ('.$this->session->userdata('username').')',
			'time' => date('H:i:s'),
			'type' => 'apparel',
		));

		$this->telegram_lib->sendmsg("*Request Recut Apparel*\n#PO : ".$get->po."\n".$this->session->userdata('username')." has updated new status\n".date('H:i:s')."\n---------------\n".$this->input->post('status'));


		redirect('admin/request_apparel','refresh');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */