<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function select($fields, $table, $condition, $orderField, $orderType = 'desc', $limit = null)
	{
		return $this->db->select($fields)->where($condition)->order_by($orderField, $orderType)->limit($limit)->get($table)->result();
	}

	public function select_distinct($fields, $table, $condition, $orderField, $orderType = 'desc', $limit = null)
	{
		$query = $this->db->select($fields)->distinct()->get($table);

		return $query->result();
	}


	public function insert($collection, $table)
	{
		$this->db->insert($table, $collection);
		return $this->db->insert_id();
	}

	public function insert_batch($collection, $table)
	{
		$this->db->insert_batch($table, $collection);
		return $this->db->insert_id();
	}

	public function update($table, $data, $where)
	{
		$query = $this->db->update($table, $data, $where);
		return $query;
	}


	public function delete($tableName, $condition)
	{
		return $this->db->delete($tableName, $condition);
	}

	//check duplicate
	public function checkDuplicate($tableName, $condition)
	{
		$query = $this->db->get_where($tableName, $condition);
		return $query->num_rows();
	}


	//count table records
	public function countTableRecords($tableName, $condition)
	{
		$query = $this->db->where($condition)->get($tableName);
		return $query->num_rows();
	}
	// to get last id of table
	public function getLastId($fields, $tableName, $orderField, $orderType = 'desc')
	{
		return $this->db->select($fields)->order_by($orderField, $orderType)->limit(1)->get($tableName)->result();
	}

	//simple join
	public function singleJoin($masterTable, $parentTable, $select, $condition)
	{
		$this->db->select($select);
		$this->db->from($masterTable);
		$this->db->join($parentTable, $condition);
		return $this->db->get()->result();
	}

	// mulitple joins with multiple where condition and multiple like condition
	function multijoins($fields, $from, $joins = array(), $where, $likes = NULL, $ordersby = '', $orderType = '', $num = '', $offset = NULL, $action = '', $wheretype = 'where', $groupby = '', $limit = NULL)
	{
		$this->db->select($fields);
		//	$this->db->from($from);
		if ($wheretype == 'where') {
			$this->db->where($where);
		}

		if ($wheretype == 'where_in') {
			$field =  implode(",", (array_keys($where)));
			$this->db->where_in('' . $field . '', $where['p.products_id']);
		}
		if ($groupby != '') {
			$this->db->group_by($groupby);
		}

		foreach ($joins as $key => $value) {
			$this->db->join($key, $value[0], $value[1]);
		}
		if ($likes != NULL) {
			foreach ($likes as $field => $like) {
				$this->db->like($field, $like[0], $like[1]);
			}
		}
		if ($ordersby != '') {
			if ($orderType != '') {
				$this->db->order_by('' . $ordersby . '', '' . $orderType . '');
			} else {
				$this->db->order_by('' . $ordersby . '');
			}
		}

		$this->db->limit($limit);

		if ($action == 'count') {
			return	$this->db->get($from, $num, $offset)->num_rows();
		} else {
			if ($num == '' && $offset == '') {
				return $this->db->get($from)->result();
			} else {
				return $this->db->get($from, $num, $offset)->result();
			}
		}
	}

	public function db_query($query)
	{

		return $this->db->query($query)->result();
	}

	function string_query($string)
	{

		return $string; //return $this->db->query($query)->result();
	}

	public function select_like($fields, $table, $column, $keyword, $orderField, $orderType = 'desc', $limit = null)
	{
		// $q = $q->like('p.party_name', $s, 'both');
		return $this->db->select($fields)->like($column, $keyword)->order_by($orderField, $orderType)->limit($limit)->get($table)->result();
	}

	public function size_hose_clamp_id()
	{
		$res = array(
			"16 to 18 mm - 1/2\"", "24 to 27 mm - 3/4\"", "30 to 33 mm - 1\"", "36 to 39 mm - 1.25\"", "42 to 45 mm - 1.5\"", "58 to 62 mm - 1.5\"", "66 to 69 mm - 1.75\"", "70 to 74 mm - 2\"", "80 to 84 mm - 2.5\"", "90 to 94 mm - 3\"", "95 to 97 mm - 3.25\"", "100 to 104 mm - 3.5\"", "110 to 115 mm - 4\"", "138 to 146 mm - 5\"", "162 to 170 mm - 6\"", "220 to 226 mm - 8\"", "274 to 280 mm - 10\""
		);  // All Data
		return $res;
	}

	public function bolt_size()
	{
		$res = array(
			"1/2\" x 45 mm", "1/2\" x 60 mm", "1/4\"(4 Ani)"
		);  // All Data
		return $res;
	}
}
