function listClientes(){
  $.ajax({
    type  : 'ajax',
    url   : 'ClientesController/ClienteList',
    async : false,
    dataType : 'json',
    success : function(data){
      var html = '';
      var i;
      for(i=0; i<data.length; i++){
        html += '<tr id="'+data[i].idcliente+'">'+
          '<td>'+data[i].nombrecliente+'</td>'+
          '<td>'+data[i].correocliente+'</td>'+
          '<td>'+data[i].celularcliente+'</td>'+		                        
          '<td>'+data[i].motivocliente+'</td>'+
          '<td>'+data[i].comentariocliente+'</td>'+
          '<td style="text-align:right;">'+
          '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+data[i].idcliente+'" data-nombre="'+data[i].nombrecliente+'" data-correo="'+data[i].correocliente+'" data-celular="'+data[i].celularcliente+'" data-motivo="'+data[i].motivocliente+'" data-comentario="'+data[i].comentariocliente+'">Edit</a>'+' '+
          '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].idcliente+'">Delete</a>'+
          '</td>'+
          '</tr>';
      }
      $('#ctrlListadoClientes').html(html);
    }
  });
}


$('#GuardarClienteForm').submit('click',function(){
  var nuevoNombre = $('#txtGuardarNombre').val();
  var nuevoCorreo = $('#txtGuardarCorreo').val();
  var nuevoCelular = $('#txtGuardarCelular').val();
  var nuevoMotivo = $('#txtGuardarMotivo').val();
  var nuevoComentario = $('#txtGuardarComentario').val();
  $.ajax({
    type : "POST",
    url  : "ClientesController/GuardarCliente",
    dataType : "JSON",
    data : {nombre:nuevoNombre, correo:nuevoCorreo, celular:nuevoCelular, motivo:nuevoMotivo, comentario:nuevoComentario},
    success: function(data){
      $('#txtGuardarNombre').val("");
      $('#txtGuardarCorreo').val("");
      $('#txtGuardarCelular').val("");
      $('#txtGuardarMotivo').val("");
      $('#txtGuardarComentario').val("");
      $('#addClienteModal').modal('hide');
      listClientes();
    }
  });
  return false;
});


$('#ActualizaClienteForm').on('submit',function(){
  var updateIdCliente = $('#hideIdCliente').val();
  var updateNombreCliente = $('#txtUpdateNombre').val();
  var updateCorreoCliente = $('#txtUpdateCorreo').val();
  var updateCelularCliente = $('#txtUpdateCelular').val();
  var updateMotivoCliente = $('#txtUpdateMotivo').val();
  var updateComentarioCliente = $('#txtUpdateComentario').val();
  $.ajax({
    type : "POST",
    url  : "ClientesController/ActualizarCliente",
    dataType : "JSON",
    data : {idcliente:updateIdCliente, nombre:updateNombreCliente, correo:updateCorreoCliente, celular:updateCelularCliente, motivo:updateMotivoCliente, comentario:updateComentarioCliente},
    success: function(data){
      $("#hideIdCliente").val("");
      $("#txtUpdateNombre").val("");
      $('#txtUpdateCorreo').val("");
      $("#txtUpdateCelular").val("");
      $('#txtUpdateMotivo').val("");
      $("#txtUpdateComentario").val("");
      $('#editClienteModal').modal('hide');
      listClientes();
    }
  });
  return false;
});


$('#EliminarClienteForm').on('submit',function(){
  var eliminarIdCliente = $('#deleteHideIdCliente').val();
  $.ajax({
    type : "POST",
    url  : "ClientesController/EliminarCliente",
    dataType : "JSON",
    data : {idcliente:eliminarIdCliente},
    success: function(data){
      $("#"+eliminarIDCliente).remove();
      $("#deleteHideIdCliente").val("");
      $('#deleteClienteModal').modal('hide');
      listClientes();
    }
  });
}