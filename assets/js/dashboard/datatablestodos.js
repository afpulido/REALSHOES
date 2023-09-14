

    $(document).ready(function(){
        $('#tablamostrartodos').DataTable({
          /*   "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            }, */
    
            dom: 'Bfrtip',
            buttons: [
                {extend: 'copy', text:  'Copiar', title:'Real Shoes', messageTop: 'Información General!'},
                {extend: 'csv', title:'Información GeneralReal Shoes', messageTop:'Información General' },
                {extend: 'excel', title:'Real Shoes', messageTop:'Informción General' },
                'pdf',
                {extend: 'print', text: 'Imprimir', title:'Real Shoes', messageTop:'Información General' },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ de _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
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
