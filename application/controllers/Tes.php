<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use mikehaertl\wkhtmlto\Pdf;

class Tes extends CI_Controller {

	public function index()
	{
		$pdf = new Pdf;

		// Add a HTML file, a HTML string or a page from a URL
		$pdf->addPage('/home/joe/page.html');
		$pdf->addPage('<html>....</html>');
		$pdf->addPage('http://google.com');

		// Add a cover (same sources as above are possible)
		$pdf->addCover('mycover.html');

		// Add a Table of contents
		$pdf->addToc();

		// Save the PDF
		$pdf->saveAs('/tmp/new.pdf');

		// ... or send to client for inline display
		$pdf->send();
	}

}

/* End of file Tes.php */
/* Location: ./application/controllers/Tes.php */