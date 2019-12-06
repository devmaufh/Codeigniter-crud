<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CompanyController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CompanyModel');
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index(){
        $data['companies'] = $this->CompanyModel->getCompanies();
        $this->load->view('templates/header');
        $this->load->view('companies/index', $data);
    }
    public function view($id){
        $this->CompanyModel->update_visits($id);
        $data['company'] = $this->CompanyModel->getCompanies($id);
        $this->load->view('templates/header');
        $this->load->view('companies/view',$data);
    }
    public function admin()
    {
        if(!$this->session->userdata('logged_in'))redirect('login');
        if($this->session->userdata('role') ==ADMIN){
            $data['companies'] = $this->CompanyModel->getCompanies();
        $this->load->view('templates/header');
        $this->load->view('admin/companies', $data);
        }
        else redirect('login');
    }
    public function create()
    {
        if(!$this->session->userdata('logged_in'))redirect('login');
        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'description' => $this->input->post('description'),
            'updated' => false,
        );
        $inserted_id = $this->CompanyModel->insert($data);
        $res = array();
        if ($inserted_id != false) {
            $data['id'] = $inserted_id;
            $data['visits'] = 0;
            $res['status'] = true;
            $res['data'] = $data;
        } else {
            $res['status'] = false;
        }
        echo json_encode($res);
    }
    public function delete($id)
    {
        if(!$this->session->userdata('logged_in'))redirect('login');
        $response = array();
        $dbRes = $this->CompanyModel->delete($id);
        if ($dbRes == false) {
            $response['status'] = $dbRes;
        } else {
            $response['status'] = true;
            $response['deleted_id'] = $id;
        }
        echo json_encode($response);
    }
    public function edit($id){
        if(!$this->session->userdata('logged_in'))redirect('login');
        $data = array(
            'id' => $id,
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'description' => $this->input->post('description'),
            'visits' => $this->input->post('visits'),
            'update' => true,
        );
        $dbRes = $this->CompanyModel->update($data,$id);
        if($dbRes == false){
            $response['status'] = $dbRes;
        }else{
            $response['status'] =true;
            $response['data']= $data;
        }
        echo json_encode($response);
    }
}
