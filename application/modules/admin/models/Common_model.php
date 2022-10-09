<?php
class Common_model extends CI_Model
{
/*
 * This file is part of the YourCompany.Package package.
 *
 * (c) YourCompany
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */
    
    
    /**
     * Default constructor for model.
     *
     * @return constructor
     */ 
 
    public function __construct()
    {
            parent::__construct();
    }
        
    function findAllWithJoin($condition=NULL, $table, $fields, $join = NULL,$type=NULL,$or_cnd = NULL,$qr=NULL,$limit=null, $start=null,$order=null,$order_type=null) {
        $this->db->select($fields);
        $this->db->from($table);
        if ($join != NULL) {
            foreach ($join as $key => $value) {
                $this->db->join($key, $value, "left");
            }
        }
        if($condition!=NULL){
            $this->db->where($condition);
        }
         
        if($or_cnd!=NULL){
            $this->db->where($or_cnd); 
        }
        if($order!=null){
            $this->db->order_by($order,$order_type) ;
        }
        if($start>=0){
           $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        if($qr!=NULL){
            return $this->db->last_query();
        }
       // return $this->db->last_query();
        if($type == 'single'){
            return $query->row_array();
        } else {
            return $query->result_array();
        }
       
    }
    public function db_update_batch($table='',$data='')	
    {	
        $this->db->update_batch($table, $data,'id');	
    }
    
    
    public function update($update,$table,$condition)
    {
        $this->db->where($condition);
        $query = $this->db->update($table,$update);
        //return $this->db->last_query();
        return $query;
    }
    public function add($data,$table)
    {
        $query = $this->db->insert($table,$data);
        return $query;
           // return $this->db->last_query();

    }
    
    public function delete($condition,$table){
        $this->db->where($condition);
        return  $this->db->delete($table);
        // return $this->db->last_query();
    }
    public function query($sql){
        return $this->db->query($sql);
    }

    public function add_with_insertid($data,$table)
    {
        $query = $this->db->insert($table,$data);
        return $this->db->insert_id();
           // return $this->db->last_query();

    }

    public function insertbatch($data,$table)
    {
        $query = $this->db->insert_batch($table,$data);
        return $query;
            //return $this->db->last_query();

    }
  
}