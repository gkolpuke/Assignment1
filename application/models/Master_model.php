<?php


class Master_model extends CI_Model
{
    
    function __construct()
    {
        $this->load->database();
    }
    
    /**
     * master_insert method 
     *
     * @access	public
     * @param	array data
     * @param	string tablename
     * @return	int last inserted id
     */
    public function master_insert($data, $tablename)
    {
        $this->db->insert($tablename, $data);
        return $this->db->insert_id();
    }
    
    /**
     * master_max_id method 
     *
     * @access	public
     * @param	string column name
     * @param	string tablename
     * @return	array
     */
    public function master_max_id($column_name, $tablename)
    {
        $this->db->select_max($column_name);
        $query = $this->db->get($tablename);
        $row   = $query->row_array();
        return $row[$column_name];
    }
    
    /**
     * master_update method 
     *
     * @access	public
     * @param	array data
     * @param	string tablename
     * @param	array where
     * @return	bool true/false
     */
    public function master_update($data, $tablename, $where)
    {
        if ($where) {
            foreach ($where as $key => $value) {
                
                $this->db->where($key, $value);
            }
        }
        $this->db->update($tablename, $data);

        //echo $this->db->last_query();die;
        return true;
    }
    
    /**
     * master_delete method 
     *
     * @access	public
     * @param	array data
     * @param	string tablename
     * @return	bool true/false
     */
    public function master_delete($tablename, $where)
    {
        $this->db->where($where, NULL, FALSE);
        $this->db->delete($tablename);
        return true;
    }
    
    /**
     * getMaster method 
     *
     * @access	public
     * @param	array join
     * @param	string tablename
     * @param	string where
     * @return	array result set
     */
    public function getMaster($tablename, $where = FALSE, $join = FALSE, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false)
    {

		if($limit){
			$this->db->limit($limit, $start);
		}
		if ($search) {
                $where = $this->searchString($search);
                $query = $this->db->get_where($tablename, $where);
        } 
        if ($where) {
            $this->db->where($where, NULL, FALSE);
        }
        if ($order && $field) {
            $this->db->order_by($field, $order);
        }
        if ($join) {
            if (count($join) > 0) {
                foreach ($join as $key => $value) {
                    $explode = explode('|', $value);
                    $this->db->join($key, $explode[0], $explode[1]);
                }
            }
        }
        if ($select) {
            $this->db->select($select, FALSE);
        } else {
            $this->db->select('*');
        }
		$query = $this->db->get($tablename);
        //echo $this->db->last_query();die;
        return $query->result_array();
    }

      
  

}
