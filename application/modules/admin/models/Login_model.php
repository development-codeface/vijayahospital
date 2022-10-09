<?php
class Login_model extends CI_Model
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
     * Returns the name of the currently set context.
     *
     * @return
     */
    public function check_login($username,$pass){
        $this->db->select('*');
        $this->db->from('users');
        //$this->db->where('email',$email);
        $this->db->where('username',$username);
        $this->db->where('password',$pass);
        $query=$this->db->get()->result_array();
        
      // return $this->db->last_query();     
        return $query;
    }
  public function getmailid(){
      $this->db->select('email,password,username');
      $this->db->from('users');
  
      $query=$this->db->get()->result_array();
       return $query;
  }
  
   function findAllWithJoin($condition, $table, $fields, $join = NULL,$limit=NULL,$start=NULL,$order = null,$order_type=null) {
        $this->db->select($fields);
        $this->db->from($table);
        if ($join != NULL) {
            foreach ($join as $key => $value) {
                $this->db->join($key, $value);
            }
        }
        if($condition!=NULL){
          $this->db->where($condition);
        }
        if($order!=null){
            $this->db->order_by($order,$order_type) ;
         }
        if($start>=0){
          $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        
       // return $this->db->last_query();
        return $query->result_array();
       
    }
    
    public function query($sql){
        return $this->db->query($sql);
    }
    
     public function update($update,$table,$condition)
    {
        $this->db->where($condition);
        $query = $this->db->update($table,$update);
        //return $this->db->last_query();
        return $query;
    }
    
}
?>