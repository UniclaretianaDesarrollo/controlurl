<script>
    window.addEventListener('alert', function (mensajeAlerta) {
        var titulo = mensajeAlerta.detail.split("-")[0];
        var mensaje = mensajeAlerta.detail.split("-")[1];
        var icono = mensajeAlerta.detail.split("-")[2];
        Swal.fire(
            titulo,
            mensaje,
            icono
            // en iconos, se pueden utlizar estos: success - error - warning - info - question
            // https://sweetalert2.github.io/#icons
        )
    });
</script>