<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('showCity_view');
	}

	// public function insertData_controller()
	// {
	// 	$cityID = $this->input->post('search');
	// 	$this->load->model('city_model');
	// 	$dulieu = $this->city_model->getDatabase($cityID);
	// 	// $dulieu = array('dulieutucontroller' => $dulieu);
	// 	// $this->load->view('showCity_view', $dulieu, FALSE);
	// }

	public function ajax_show()
	{
		$cityID = $this->input->post('search');
		$this->load->model('city_model');
		$districts = $this->city_model->getDatabase($cityID)->result();
		$noidungmahoa = json_encode($districts);
		// echo "<pre>";
		// var_dump($noidungmahoa);
		echo $noidungmahoa;
	}
}

/* End of file showData.php */
/* Location: ./application/controllers/showData.php */