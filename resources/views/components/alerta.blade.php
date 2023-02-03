<script>
    window.addEventListener('alert', function () {
        Swal.fire(
            '{{$titulo}}',
            '{{$slot}}',
            '{{$icono}}'
            // en iconos, se pueden utlizar estos: success - error - warning - info - question
            // https://sweetalert2.github.io/#icons
        )
    });
</script>