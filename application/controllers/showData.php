<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	

	// public function insertData_controller()
	// {
	// 	$cityID = $this->input->post('search');
	// 	$this->load->model('city_model');
	// 	$dulieu = $this->city_model->getDatabase($cityID);
	// 	// $dulieu = array('dulieutucontroller' => $dulieu);
	// 	// $this->load->view('showCity_view', $dulieu, FALSE);
	// }

	// public function ajax_show()
	// {
	// 	$cityID = $this->input->post('search');
	// 	$this->load->model('city_model');
	// 	$districts = $this->city_model->getDatabase($cityID)->result();
	// 	$noidungmahoa = json_encode($districts);
	// 	// echo "<pre>";
	// 	// var_dump($districts);
	// 	echo $noidungmahoa;
	// }

	//phân cách
	// public function index()
	// {
	// 	$this->load->view('showCity_view');
	// }

	// public function ajax_show()
	// {
	// 	$cityID = $this->input->post('search');
	// 	$this->load->model('city_model');
	// 	$districts = $this->city_model->getDatabase1($cityID)->result();
	// 	$districts1 = $this->city_model->getDatabase($cityID)->result();

	// 	//$noidungmahoa = json_encode($districts, $districts1);
	// 	// echo "<pre>";
	// 	// var_dump($districts);
	// 	$noidungmahoa = json_encode([
	//     	'soluong' => $districts,
	//     	'dulieu' => $districts1,
	//     ]);
	// 	echo $noidungmahoa;
	// }

	//phân cách

	public function index()
	{
		$this->load->model('city_model');
		$citys = $this->city_model->getCityName();
		// echo"<pre>";
		// var_dump($citys);
		$citys = array("mangketqua" => $citys);
		$this->load->view('insertCity_view', $citys);
	}

	public function ajax_showw()
	{
		$this->load->model('city_model');
		$districts = $this->city_model->getCityName_ajax()->result();

		//$noidungmahoa = json_encode($districts, $districts1);
		// echo "<pre>";
		// var_dump($districts);
		$noidungmahoa = json_encode([
	    	'dulieu' => $districts,
	    ]);
		echo $noidungmahoa;
	}

	public function getDataDis()
	{
		$cityID = $this->input->post('city_id');
		$this->load->model('city_model');
		$districts = $this->city_model->getNameDis($cityID)->result();
		$noidungmahoa = json_encode([
	    	'dulieuquan' => $districts,
	    ]);
		echo $noidungmahoa;
	}

	public function pushDataToModel()
	{
		$selectedData = $this->input->post('selectedData');
		$this->load->model('city_model');
		$this->city_model->insertData($selectedData);
	}
}

/* End of file showData.php */
/* Location: ./application/controllers/showData.php */