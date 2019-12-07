<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CompanyModel extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    public function getCompanies($id = FALSE){
        if($id === FALSE) return $this->db->select('id,name,address,phone,description,visits')->from('companies')->get()->result_array();
        else return $this->db->where('id', $id)->select('id,name,address,phone,description,visits')->from('companies')->get()->result_array();
    }
    public function insert($data){
        $this->db->insert('companies',array(
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'description' => $data['description'],
            'visits' => 0
        ));
        if($this->db->affected_rows() != 1) return false; 
        return $this->db->insert_id();
    }
    public function update($data,$id){
        $this->db->where('id', $id)->update('companies',array(
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'description' => $data['description'],
        ));
        if($this->db->affected_rows() ==1 ) return $id;
        else return false;
    }
    public function update_visits($id){
        $this->db->query(" update companies as c inner join companies as cc on c.id = cc.id set c.visits = cc.visits+1 where c.id = $id");
    }
    public function delete($id){
        $this->db->where(array('id'=>$id));
        $this->db->delete('companies');
        if($this->db->affected_rows() ==1 ) return $id;
        else return false;
    }
}