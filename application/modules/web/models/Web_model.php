<?php
class Web_model extends CI_Model
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
     /**
     *
     *
     * add gallery group
     */
   
    /*
     * list cms data
     */
    
    function findAllWithJoin($condition, $table, $fields, $join = NULL,$type=NULL,$or_cnd = NULL,$qr=NULL,$order=null,$order_type=null,$group_by=NULL,$limit=null, $start=null,$like=null,$cnt=null) {
        $this->db->select($fields);
        $this->db->from($table);
        if ($join != NULL) {
            foreach ($join as $key => $value) {
                $this->db->join($key, $value, "left");
            }
        }
        if($condition!=''){
            $this->db->where($condition);
        }
       
        if($or_cnd!=NULL){
            $this->db->where($or_cnd); 
        }
        if($like!=NULL){
            $this->db->like($like);
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

        if($cnt==1) {
            return $query->num_rows();
        }
       // return $this->db->last_query();
        if($type == 'single'){
            return $query->row_array();
        } else {
            return $query->result_array();
        }
       
    }


    function get_product_list($conditions = array(),$limit=null,$order_by=null,$qry=null){
        $result = array();
    	if (!empty($conditions)) {
			if (!is_array($conditions[0])) {
				$conditions = array($conditions);
            }
            foreach ($conditions as $cnd) {

				if (isset($cnd[2])) $cnd[0] = "{$cnd[2]}.{$cnd[0]}";
				$this->db->where_in($cnd[0], $cnd[1]);
				
            }
        }
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('products.status','Active');
        if(!empty($order_by)){
            $this->db->order_by($order_by[0],$order_by[1]);
        }
        /* if($start>=0){
            $this->db->limit($limit, $start);
        } */
        if (!is_null($limit)) {
            if (is_array($limit)) {
                $this->db->limit($limit[1], ($limit[0]-1)*$limit[1]);
            } else {
                $this->db->limit($limit);
            }
        }
        $query = $this->db->get();
        if($qry!=null){
            return $this->db->last_query();
        } else {
            return $query->result_array();
        }
        // return $this->db->last_query();
       
       

    }
    
   public function findAll($id=null,$table,$cond=null,$limit=null, $start=null,$order=null,$order_type=null,$join=null,$qry = null)
    {
        $this->db->select("$table.*");
        if($join!=''){
           $this->db->select("pr.program as program_name");
        }
        $this->db->from($table);
        if($id!=null){
            $this->db->where('id',$id); 
        }
        if($join!=''){
            $this->db->join('program_category pr',"pr.id=$table.program_category",'left');
        }
        if($cond!=null){
          $this->db->where($cond);
        }
        if($order!=null){
           $this->db->order_by($order,$order_type) ;
        }
        if($start>=0){
          $this->db->limit($limit, $start);
        }
    
        $query=$this->db->get()->result_array();
        if($qry!=''){
           return $this->db->last_query();
        }else {
           return $query;  
        }
     //  var_dump($query);die();
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
    
    public function delete($id,$table){
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }
    public function query($sql){
        return $this->db->query($sql);
    }
  
    public function delete_multiple($cn,$table){
        $this->db->where($cn);
        return $this->db->delete($table);
    }
    public function findDoctors($department='')
    {
         $sql = "select * from doctor where FIND_IN_SET('".$department."', departments) and status='Active' ORDER BY sort_id ASC";
         //echo $sql; die;
         $query = $this->db->query($sql);
        // $query = $this->db->get();
          return $query->result_array();
         
    }

    public function findDepartments($deptIds='')
    {
       $this->db->from('departments');
       $this->db->where_in('id', $deptIds);
       $query = $this->db->get(); 
       return $query->result_array();
    }
    public function findDoctorsById($id='')
    { 
            $this->db->from('doctor');
            $this->db->where_in('id', $id);
            $query = $this->db->get(); 
            return $query->result_array();         
    }

    
    
}