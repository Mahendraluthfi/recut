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
		$this->load->model('Model');
		$this->load->library('pdfgenerator');		
	}

	public function index()
	{
		$data['panty'] = $this->Model->pantywait()->result();
		$data['bra'] = $this->Model->brawait()->result();
		$data['mask'] = $this->Model->maskwait()->result();
		$data['content'] = 'admin_dashboard';
		$this->load->view('dashboard', $data);		
	}

	public function request_panty()
	{
		$data['get'] = $this->Model->get_panty()->result();
		$data['content'] = 'admin_request';
		$this->load->view('dashboard', $data);		
	}

	public function request_bra()
	{	
		$data['get'] = $this->Model->get_bra()->result();
		$data['content'] = 'admin_bra';
		$this->load->view('dashboard', $data);
	}

	public function request_mask()
	{	
		$data['get'] = $this->Model->get_mask()->result();
		$data['content'] = 'admin_mask';
		$this->load->view('dashboard', $data);
	}

	public function validate_panty($id)
	{
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

		redirect('admin/request_panty','refresh');
	}

	public function validate_bra($id)
	{
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

		redirect('admin/request_bra','refresh');
	}

	public function validate_mask($id)
	{
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

		redirect('admin/request_mask','refresh');
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
		$data['detail'] = $this->db->get_where('panty_detail', array('id_panty' => $id))->result();
    	$html = $this->load->view('panty_pdf', $data, TRUE);
    	$filename = 'Panty_recut_'.$id;    	
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'potrait');		
	}

	public function download_bra($id)
	{
		$data['total'] = $this->db->query("SELECT sum(wing) as twing, sum(cf) as tcf, sum(cup) as tcup, sum(inners) as tinners, sum(mesh) as tmesh, sum(liner) as tliner FROM `bra_detail` WHERE id_bra = '$id'")->row();		
		$data['get'] = $this->db->get_where('order_bra', array('order_id' => $id))->row();
		$data['detail'] = $this->db->get_where('bra_detail', array('id_bra' => $id))->result();
    	$html = $this->load->view('bra_pdf', $data, TRUE);
    	$filename = 'Bra_recut_'.$id;    	
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'potrait');		
	}

	public function download_mask($id)
	{
		$data['total'] = $this->db->query("SELECT sum(panel) as tpanel FROM `mask_detail` WHERE id_mask = '$id'")->row();		
		$data['get'] = $this->db->get_where('order_mask', array('order_id' => $id))->row();
		$data['detail'] = $this->db->get_where('mask_detail', array('id_mask' => $id))->result();
    	$html = $this->load->view('mask_pdf', $data, TRUE);
    	$filename = 'Mask_recut_'.$id;    	
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
		->setCellValue('Q1', 'REMARKS')		
		;

		$spreadsheet->getActiveSheet()->getStyle('A1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

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
		->setCellValue('Q'.$i, $data->remarks);	
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
		->setCellValue('E1', 'DATE')
		->setCellValue('F1', 'TIME')
		->setCellValue('G1', 'STYLE')
		->setCellValue('H1', 'COLOUR')
		->setCellValue('I1', 'SIZE')
		->setCellValue('J1', 'WING')
		->setCellValue('K1', 'CF')
		->setCellValue('L1', 'CUP')
		->setCellValue('M1', 'INNER')
		->setCellValue('N1', 'MESH')
		->setCellValue('O1', 'LINER')		
		->setCellValue('P1', 'REMARKS')		
		;

		$spreadsheet->getActiveSheet()->getStyle('A1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i=2; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->po)
		->setCellValue('C'.$i, $data->so)
		->setCellValue('D'.$i, $data->line)
		->setCellValue('E'.$i, $data->date)
		->setCellValue('F'.$i, $data->time)
		->setCellValue('G'.$i, $data->style)
		->setCellValue('H'.$i, $data->colour)
		->setCellValue('I'.$i, $data->size)
		->setCellValue('J'.$i, $data->wing)
		->setCellValue('K'.$i, $data->cf)
		->setCellValue('L'.$i, $data->cup)
		->setCellValue('M'.$i, $data->inners)
		->setCellValue('N'.$i, $data->mesh)
		->setCellValue('O'.$i, $data->liner)	
		->setCellValue('P'.$i, $data->remarks);	
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
		->setCellValue('E1', 'DATE')
		->setCellValue('F1', 'TIME')
		->setCellValue('G1', 'STYLE')
		->setCellValue('H1', 'COLOUR')
		->setCellValue('I1', 'SIZE')
		->setCellValue('J1', 'WING')
		->setCellValue('K1', 'CF')
		->setCellValue('L1', 'CUP')
		->setCellValue('M1', 'INNER')
		->setCellValue('N1', 'MESH')
		->setCellValue('O1', 'LINER')		
		->setCellValue('P1', 'REMARKS')		
		;

		$spreadsheet->getActiveSheet()->getStyle('A1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('cecece');

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i=2; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->po)
		->setCellValue('C'.$i, $data->so)
		->setCellValue('D'.$i, $data->line)
		->setCellValue('E'.$i, $data->date)
		->setCellValue('F'.$i, $data->time)
		->setCellValue('G'.$i, $data->style)
		->setCellValue('H'.$i, $data->colour)
		->setCellValue('I'.$i, $data->size)
		->setCellValue('J'.$i, $data->wing)
		->setCellValue('K'.$i, $data->cf)
		->setCellValue('L'.$i, $data->cup)
		->setCellValue('M'.$i, $data->inners)
		->setCellValue('N'.$i, $data->mesh)
		->setCellValue('O'.$i, $data->liner)	
		->setCellValue('P'.$i, $data->remarks);	
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
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */