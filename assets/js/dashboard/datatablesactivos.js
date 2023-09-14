
    $(document).ready(function(){
        $('#tablamostraractivos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
    
            dom: 'Bfrtip',
            
            buttons:[ 
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fas fa-file-excel"></i> Excel [6]',
                    titleAttr: 'Exportar a Excel [6]',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5]
                    }
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fas fa-file-excel"></i> Excel [8]',
                    titleAttr: 'Exportar a Excel [8]',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5]
                    }
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fas fa-file-pdf"></i> PDF [6]',
                    titleAttr: 'Exportar a PDF [6]',
                    className: 'btn btn-danger',
                          exportOptions: {
                            columns: [ 0,1,2,3,4,5]
                    }
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fas fa-file-pdf"></i> PDF [8]',
                    titleAttr: 'Exportar a PDF [8]',
                    className: 'btn btn-danger',
                          exportOptions: {
                            columns: [ 0,1,2,3,4,5,8,9]
                    }
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i> Imprimir [6] ',
                    titleAttr: 'Imprimir [6]',
                    className: 'btn btn-info',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5]
                    }
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i> Imprimir [8] ',
                    titleAttr: 'Imprimir [8]',
                    className: 'btn btn-info',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,8,9]
                    }
                },
            ] ,
           /*  buttons: [
                {extend: 'copy', text:  'Copiar', title:'Real Shoes', messageTop: 'Información General ! '},
                {extend: 'csv', title:'Informción GeneralReal Shoes', messageTop:'Informción General' },
                {extend: 'excel', title:'Real Shoes', messageTop:'Informción General' },
                'pdf',
                {extend: 'print', text: 'Imprimir', title:'Real Shoes', messageTop:'Informción General' },
            ], */
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 de 0 - 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }, /* funcion para asignar nueva clase y color a los botones */
            initComplete: function () {
                var btns = $('.dt-button');
                btns.addClass('btn btn-primary btn-sm');
                btns.removeClass('dt-button');
            }
        });
            
    });


