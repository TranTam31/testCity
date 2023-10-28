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
		$this->db->where('c.city_id', $cityID);
		$ketqua = $this->db->get('
			district as d
			');		
		//$ketqua = $ketqua->result_array();
		// echo "<pre>";
		// var_dump($ketqua);
		return $ketqua;
	}
}

/* End of file city_model.php */
/* Location: ./application/models/city_model.php */