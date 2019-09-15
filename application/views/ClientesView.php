<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Ajax CRUD CodeIgniter ZAP</title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.dataTables.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dataTables.bootstrap4.css">
      <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
          box-sizing: border-box;
          display: inline-block;
          min-width: 1.5em;
          padding: 1px;
          margin-left: 2px;
          text-align: center;
          text-decoration: none !important;
          cursor: pointer;
          color: #333 !important;
          border: 1px solid transparent;
          border-radius: 2px;
        }
      </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="https://www.webdamn.com" class="navbar-brand">ZAP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>

      <div class="container">	
        <div class="row">		
          <div class="col-12">		
            <div class="col-md-12">
              <br>
              <h1>Ajax CRUD CodeIgniter ZAP<br>
                <div class="float-right">
                  <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addClienteModal">
                    <span class="fa fa-plus"></span> Crear Cliente
                  </a>
                </div>
                <br>
              </h1>
            </div>
            <!-- Lista los Clientes -->



              <!-- Script -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
              <script type='text/javascript'>
                $(document).ready(function(){
                    $.ajax({
                      url:'<?=base_url()?>index.php/ClientesController/show',
                      method: 'get',
                      dataType: 'json',
                      success: function(response){
                        var len = response.length;
                        if(len > 0){
                          var html = '';
                          var i;
 		  	  for(i=0; i<response.length; i++){
		              html += '<tr id="'+response[i].id_cliente+'">'+
			          '<td>'+response[i].Nombre+'</td>'+
			          '<td>'+response[i].Correo+'</td>'+
			          '<td>'+response[i].Celular+'</td>'+		                        
			          '<td>'+response[i].Motivo+'</td>'+
			          '<td>'+response[i].Comentario+'</td>'+
			          '<td style="text-align:right;">'+
          			  '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+response[i].idcliente+'" data-nombre="'+response[i].nombrecliente+'" data-correo="'+response[i].correocliente+'" data-celular="'+response[i].celularcliente+'" data-motivo="'+response[i].motivocliente+'" data-comentario="'+response[i].comentariocliente+'">Edit</a>'+' '+
          			  '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+response[i].idcliente+'">Delete</a>'+
			          '</td>'+
			          '</tr>';
		          }
		          $('#ctrlListadoClientes').html(html);
                        }else{
                          //$('#suname').text('');
                          //$('#sname').text('');
                          //$('#semail').text('');
                        } 
                      }
                    });                
                });
              </script>




            <table class="table table-striped" id="tblViewClientes">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Celular</th>
                  <th>Motivo de Visita</th>
                  <th>Comentario</th>
                  <th style="text-align: right;">Acciones</th>
                </tr>
              </thead>
              <tbody id="ctrlListadoClientes"></tbody>
            </table>
          </div>
        </div>        
      </div>	

<!-- Crea cliente nuevo -->
<form id="GuardarClienteForm" method="post">
  <div class="modal fade" id="addClienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">                       
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Nombre*</label>
            <div class="col-md-10">
              <input type="text" name="txtGuardarNombre" id="txtGuardarNombre" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Correo*</label>
            <div class="col-md-10">
              <input type="text" name="txtGuardarCorreo" id="txtGuardarCorreo" class="form-control" required> 
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Celular*</label>
            <div class="col-md-10">
              <input type="text" name="txtGuardarCelular" id="txtGuardarCelular" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Motivo de Visita*</label>
            <div class="col-md-10">
              <input type="text" name="txtGuardarMotivo" id="txtGuardarMotivo" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Comentario*</label>
            <div class="col-md-10">
              <textarea name="txtGuardarComentario" id="txtGuardarComentario" class="form-control" rows="5" required></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>	


<!-- Actualiza Cliente -->
<form id="ActualizaClienteForm" method="post">
  <div class="modal fade" id="editClienteModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Actualizar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Nombre*</label>
            <div class="col-md-10">
              <input type="text" name="txtUpdateNombre" id="txtUpdateNombre" class="form-control" placeholder="Nombre" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Correo*</label>
            <div class="col-md-10">
              <input type="text" name="txtUpdateCorreo" id="txtUpdateCorreo" class="form-control" placeholder="Correo" required>
            </div>
          </div>				
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Celular*</label>
            <div class="col-md-10">
              <input type="text" name="txtUpdateCelular" id="txtUpdateCelular" class="form-control" placeholder="123456" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Motivo de Visita*</label>
            <div class="col-md-10">
              <input type="text" name="txtUpdateMotivo" id="txtUpdateMotivo" class="form-control" placeholder="Motivo" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Comentario*</label>
            <div class="col-md-10">
              <textarea name="txtUpdateComentario" id="txtUpdateComentario" class="form-control" rows="5" required></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="hideIdCliente" id="hideIdCliente" class="form-control">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>


<form id="EliminarClienteForm" method="post">
  <div class="modal fade" id="deleteClienteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Eliminar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <strong>Estás seguro que deseas eliminar este Cliente?</strong>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="deleteHideIdCliente" id="deleteHideIdCliente" class="form-control">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Si</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.bootstrap4.js"></script>


</body>