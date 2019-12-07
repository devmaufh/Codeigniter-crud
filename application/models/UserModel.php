<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    public function getUsers($username = FALSE){
        if($username === FALSE) return $this->db->select('user_id, username, name')->from('users')->get()->result_array();
        return $this->db->where('username', $username)->select('user_id, username, name, password')->from('users')->get()->result_array();
    }
    public function check_if_exists_user(){
        $num_rows = $this->db->count_all_results('users');
        return $num_rows;
    }
    public function insert($data){
        $this->db->insert('users', array(
            'username' => $data['username'],
            'name' => $data['name'],
            'password' => md5($data['password']),
        ));
        if($this->db->affected_rows()!=1) return false;
        return $this->db->insert_id();
    }
    public function update($data, $username){
        $this->db->where('username',$username)->update('users',array(
            'username' => $data['username'],
            'name' => $data['name'],
            'password' => md5($data['password']),
        ));
        if($this->db->affected_rows() == 1) return $username;
        else return false;
    }
    public function delete($username){
        $this->db->where(array('username' => $username));
        $this->db->delete('users');
        if($this->db->affected_rows()==1) return $username;
        else return false;
    }
}