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
                $this->save_credentials($user_data);
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
        $this->load->view('templates/header');
        $this->load->view('auth/register');

    }
    public function save(){
        $data = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );

        /*
            TO-DO: Implementar registro de usuarios;
        */
        var_dump($data);die();
    }
    private function save_credentials($data){
        $this->session->set_userdata('logged_in', true);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('role', -1259);
    }
}