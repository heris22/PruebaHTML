$('#enviar').click(function(){
    
    var codigo = document.getElementById('cod').value;
    var descripcion = document.getElementById('desc').value;
    var precio = document.getElementById('precio').value;
    var cantidad = document.getElementById('cant').value;
    var estado = document.getElementById('est').value;
    
    if (codigo != "" && descripcion != "" && precio != "" && cantidad != "" && estado != ""){
            
            if (estado == "Disponible") {
              var numEstado = 1;
            } else {
              var numEstado = 0;
            }
            var ruta = "codigo="+codigo+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad+"&estado="+numEstado; 

           $.ajax({
            url:"insertar.php ",
            type:"POST",
            data: ruta,
           })
           .done(function(){
               location.reload();
           })
           .fail(function(){
               console.log("error");
           })
           .always(function(){

           });
    }
        
            
    
       
    });
    $('#dataTable').dataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        dom: 'lBfrtip',
        buttons: ['excelHtml5', 'pdfHtml5' ],
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
        
    });