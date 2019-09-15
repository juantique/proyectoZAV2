<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesController extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('ClientesModel');
    // load base_url
    $this->load->helper('url');
  }
  function index(){
    $this->load->view('ClientesView');
  }
  function show(){
    $data=$this->ClientesModel->ClienteList();
    echo json_encode($data);
  }
  function save(){
    $data=$this->ClientesModel->GuardarCliente();
    echo json_encode($data);
  }
  function update(){
    $data=$this->ClientesModel->ActualizarCliente();
    echo json_encode($data);
  }
  function delete(){
    $data=$this->ClientesModel->EliminarCliente();
    echo json_encode($data);
  }
}