<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Common_model extends CI_Model{
    
    function getAllrecords($table,$order_by_field='',$order_by_value='',$where_field='',$where_val=''){
        if($order_by_field){
            $this->db->order_by($order_by_field,$order_by_value);
        }
        if($where_field){
            $this->db->where($where_field,$where_val);
        }
        $query=$this->db->get($table);
        if($query->num_rows() >0)
        {   
            return $query->result_array();
        }
       // return $query->result_array();die
       //die;
    }
    function insert_entry($table,$data){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    function update_entry($table,$data,$where){
        $this->db->update($table,$data,$where);
        
    }
    function Getwhere($table,$where){
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result();
    }
    
    
    
}


?>