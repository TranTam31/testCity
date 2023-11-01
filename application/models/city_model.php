<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class city_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getDatabase($cityID)
	{
		$this->db->select('
			d.district_id,
			d.district_name,
			c.city_name,
			ct.country_name
			');
		$this->db->join('city as c', 'd.city_id = c.city_id', 'inner');
		$this->db->join('country as ct', 'ct.country_id = c.country_id', 'inner');
		$this->db->where('ct.country_id', $cityID);
		$ketqua = $this->db->get('
			district as d
			');
		// $count = count($ketqua->result_array());
    	// $ketqua['count'] = $count;

		//$ketqua = $ketqua->result_array();
		// echo "<pre>";
		// var_dump($ketqua);
		return $ketqua;
	}

	public function getDatabase1($cityID)
	{
		// $this->db->select('
		// 	count
		// 	');
		// $this->db->join('city as c', 'd.city_id = c.city_id', 'inner');
		// $this->db->join('country as ct', 'ct.country_id = c.country_id', 'inner');
		// $this->db->where('ct.country_id', $cityID);
		// $ketqua = $this->db->get('
		// 	district as d
		// 	');
		// // $count = count($ketqua->result_array());
    	// // $ketqua['count'] = $count;

		// //$ketqua = $ketqua->result_array();
		// // echo "<pre>";
		// // var_dump($ketqua);
		// return $ketqua;


	    $this->db->select('
	    	c.city_name
	    	');
	    $this->db->from('country ct');
	    $this->db->join('city c', 'ct.country_id = c.country_id');

		$this->db->where('ct.country_id', $cityID);
	    $query = $this->db->get();

	    return $query;
	}

	public function getCityName()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('city');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	public function getCityName_ajax()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('city');
		$dulieu = $dulieu;
		return $dulieu;

	}public function getNameDis($cityID)
	{
		$this->db->select('
			district_id,
			district_name
			');
		$this->db->where('city_id', $cityID);
		return $this->db->get('district');
	}


	// các hàm post
	public function insertData($selectedData)
	{
		foreach ($selectedData as $data) {
			$city = $data['city'];
			$district = $data['district'];
			$dulieu = array(
				'city_db' => $city,
				'district_db' => $district 
			);
			$this->db->insert('test_insert', $dulieu);
		}
	}
}

/* End of file city_model.php */
/* Location: ./application/models/city_model.php */