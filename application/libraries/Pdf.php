<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf
{
	protected $ci;

	public function __construct()
	{
        // $this->ci =& get_instance();
        include_once APPPATH . '/third_party/TCPDF-6.3.5/tcpdf.php';
	}

	

}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
