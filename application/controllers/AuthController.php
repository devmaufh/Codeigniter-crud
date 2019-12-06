<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index(){
        $this->load->view('templates/header');
        $this->load->view('auth/login');
    }
    public function login(){
        $user_data = $this->UserModel->getUsers($this->input->post('username'));
        if(count($user_data) != 0){
            $user_data = $user_data[0];
            if($user_data['password'] == md5($this->input->post('password'))){
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('username', $user_data['username']);
                $this->session->set_userdata('role', -1259);
                redirect('admin/companies');
            }
            var_dump($user_data);
        }
        $this->load->view('templates/header');
        $this->load->view('auth/login',array('error'=>'Usuario y/o contraseña incorrectos'));
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
    public function register(){
        
    }
}