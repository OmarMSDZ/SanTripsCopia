$(function () {

    //ENVIA EL TOKEN csrf A LA CABECERA DE FORMA AUTOMATICA
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const PARAMETROS = {
        URL_DATATABLE: route('adminincidentes.getIncidentes')
    }
    var dataTable = $('#tablaincidentes').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        //se hace de esta manera el ajax por si da un error saber localizarlo
        //  ajax: {
        //      url: PARAMETROS.URL_DATATABLE,
        //      type: 'GET',
        //      data: $('#formBusqueda').serialize(),
        //      success: function(data) {
        //          dataTable.clear().draw();
        //          dataTable.rows.add(data).draw();
        //      },
        //      error: function(xhr, textStatus, errorThrown) {
        //          console.log(xhr.responseText);
        //          console.log(textStatus);
        //          console.log(errorThrown);
        //      }   
        //  },
        "ajax": `${PARAMETROS.URL_DATATABLE}?${$('#formBusqueda').serialize()}`,
        "language": {
            // "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        "columns": [

            // {data: 'id'},
            { data: 'FechaIncidente' },
            { data:  'Descripcion' },
            { data:  'TipoIncidente' },
            { data:  'Usuario' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    $('#formBusqueda').submit(function (e) {

        //EVITA QUE SE ACTUALICE LA PAGINA AL ENVIAR LA DATA DE BUSQUEDA
        e.preventDefault();
        dataTable.ajax.url(`${PARAMETROS.URL_DATATABLE}?${$('#formBusqueda').serialize()}`).load();
    });

    //LIMPIA EL FORMULARIO
    const limpiarFormModal = () => {
        $('#codigo_incidente').val('0');
        $('.limpiarForm').val('');
        $('.selectLimpiarForm').val('');
        $('#estado').val('ACTIVO');
    }

    $('#btnNuevoRegistro').click( function () {
        limpiarFormModal();
        $('#modalRegistroIncidentes').modal('show');
    });

    $('#btnGuardar').click( function () {
        $('#registroIncidentes').submit();
    });

    $('#btnProcesar').click(function () {
       $("#registroIncidentes").submit();
    });


    $("#registroIncidentes").validate({
        // rules: {
        //     incidente: "required",
        // },
        // messages: {

        // },
        highlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                $("#select2-" + elem.attr("id") + "-container").parent().addClass(errorClass);
            } else {
                elem.addClass(errorClass);
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                $("#select2-" + elem.attr("id") + "-container").parent().removeClass(errorClass);
            } else {
                elem.removeClass(errorClass);
            }
        },
        errorPlacement: function (error, element) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                element = $("#select2-" + elem.attr("id") + "-container").parent();
                error.insertAfter(element);
            } else {
                if (elem.parent().hasClass("input-group")) {
                    elem = elem.parent();
                    error.addClass("invalid-feedback");
                    error.insertAfter(elem);
                } else {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                }
            }
        },
        submitHandler: function (form) {

            const data_form = new FormData(form);
            let url = route('adminincidentes.store');
            let method = 'POST';

            const ID = $('#codigo_incidente').val();

            if (ID != 0) {

                url = route('incidentes.update', { id: ID }); //que id va ahi
            }

            $.ajax({
                type: "POST", //params.method,
                method: method,
                url: url,
                data: data_form,
                //   mimeType: "multipart/form-data",
                contentType: false,
                dataType: "json",
                cache: false,
                processData: false,
                beforeSend: function () {
                    $("#btnGuarda").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...').prop("disabled", true);
                },
                success: function (response) {

                    //VUELVE HABILITAR EL BUTON
                    $("#btnGuarda").html("Guardar").prop("disabled", false);

                    //LIMPIAR EL FORMULARIO
                    limpiarFormModal();

                    //CONSULTA LA DATA DEL SERVIDOR NUEVAMENTE!!
                    $('#formBusqueda').submit();
                    setTimeout(() => $("#btnGuarda").html("Guardar").prop("disabled", false), 1000);

                    //CIERRA EL MODAL ACTIVO
                    $('#modalRegistroIncidentes').modal('hide');

                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                    })
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    setTimeout(() => $("#btnProcesar").html("Guardar").prop("disabled", false), 1000);
                    const data = XMLHttpRequest.responseJSON;
                    console.log(
                        "XMLHttpRequest: ",
                        XMLHttpRequest.responseJSON
                    );

                    Swal.fire({
                        icon: "warning",
                        title: "Alerta",
                        text: data.msg,
                    });
                },
                complete: function () {
                    setTimeout(() => $("#btnProcesar").html("Guardar").prop("disabled", false), 1000);
                },
            });
        },
    });

    //EVENTO ASOCIADO AL BOTON DE ACTUALIZAR DE LA TABLA
    $('#tablaincidentes').on('click', '.btnActualizar', function () {

        $('#btnProcesar').text('ACTUALIZAR');
        $('#modalRegistroIncidentes  .modal-title').text('Actualizar registro de incidentes');

        //CODIGO IDENTIFICADOR DEL REGISTRO
        const codigo = $(this).attr('codigo');
        const descripcion = $(this).attr('descripcion');
        const tipoIncidente = $(this).attr('tipoIncidente');
        const usuario = $(this).data('usuario');
        const estado = $(this).data('estado');

        //RUTA DE CONSULTA DEL ID DE INCIDENTES
        const $form = $('#registroIncidentes');
        $form.find('#codigo').val(codigo);
        $form.find('#Descripcion').val(descripcion);
        $form.find('#Fk_IdTipoIncidente').val(tipoIncidente);
        $form.find('#Fk_IdUsuario').val(usuario);
        $form.find('#estado').val(estado);
        
        $('#modalRegistroIncidentes').modal('show');
    });

    $('#tablaincidentes').on('click', '.btnBorrarRegistro', function () {

        const codigo = $(this).attr('codigo');

        console.log('codigo: ', codigo);

        Swal.fire({
            position: "top-center",
            icon: "question",
            title: 'Estas seguro que desean borrar este registro',
            confirmButtonText: "Si, borrar",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            // showConfirmButton: false,
            // timer: 1500,
        }).then((results) => {

            $.ajax({
                url: route('incidentes.delete', {id: codigo}),
                type: 'DELETE',
                success: function(result) {
                    // alert(result.message);
                
                    //CONSULTA LOS RECORDS
                    $('#formBusqueda').submit();
                    // console.log('result: ', result);
                    Swal.fire({
                        title: "Notificación!",
                        text: result.msg,
                        icon: "success"
                      });
                },
                error: function(xhr) {
                    // alert(xhr.responseJSON.message);
                }
            });
        });

    });


});
