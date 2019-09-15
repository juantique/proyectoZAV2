<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ClientesModel extends CI_Model{

  function ClienteList(){
    $allClientes=$this->db->get('tblvisitas');
    return $allClientes->result();
  }

  function GuardarCliente(){
    $data = array(
      'nombre' => $this->input->post('nombre'), 
      'correo' => $this->input->post('correo'), 
      'celular' => $this->input->post('celular'), 
      'motivo' => $this->input->post('motivo'), 
      'comentario' => $this->input->post('comentario'), 
    );
    $result=$this->db->insert('tblvisitas',$data);
    return $result;
  }

  function ActualizarCliente(){
    $IdCliente=$this->input->post('idcliente');
    $Nombre=$this->input->post('nombre');
    $Correo=$this->input->post('correo');
    $Celular=$this->input->post('celular');
    $Motivo=$this->input->post('motivo');
    $Comentario=$this->input->post('comentario');
    $this->db->set('nombrecliente', $Nombre);
    $this->db->set('correocliente', $Correo);
    $this->db->set('celularcliente', $Celular);
    $this->db->set('motivocliente', $Motivo);
    $this->db->set('comentariocliente', $Comentario);
    $this->db->where('idcliente', $IdCliente);
    $result=$this->db->update('tblciente');
    return $result;	
  }

  function EliminarCliente(){
    $IdCliente=$this->input->post('idcliente');
    $this->db->where('idcliente', $IdCliente);
    $result=$this->db->delete('tblcliente');
    return $result;
  }

}