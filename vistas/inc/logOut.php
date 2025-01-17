<script>
   
    let bton_salir = document.querySelector(".btn-exit-system");

    bton_salir.addEventListener('click', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Seguro que quiere cerrar session?',
            text: "Te saldrás del sistema",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, exit!',
            cancelButtonText: 'No, cancel'
        }).then((result) => {
            if (result.value) {
                let url = '<?php echo SERVERURL;?>ajax/loginAjax.php';
                let token = '<?php echo $lc->encryption($_SESSION['token_sispres']);?>';
                let usuario = '<?php echo $lc->encryption($_SESSION['usuario_sispres']);?>';

                let datos = new FormData();
                datos.append("token",token);
                datos.append("usuario",usuario);

                {fetch(url,{
                    method: 'POST',
                    body: datos
                    })
                        .then(respuesta=>respuesta.json())
                        .then(respuesta=>{
                            return alertas_ajax(respuesta);})
                }

            }
        });
    });

</script>