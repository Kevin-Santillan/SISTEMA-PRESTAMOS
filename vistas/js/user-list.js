document.addEventListener("DOMContentLoaded", function() {
    fetch("http://localhost/prestamos/ajax/usuarioAjax.php?action=list")
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById("user-table-body");
            if (data.length > 0) {
                data.forEach((usuario, index) => {
                    tbody.innerHTML += `
                        <tr class="text-center">
                            <td>${index + 1}</td>
                            <td>${usuario.usuario_dni}</td>
                            <td>${usuario.usuario_nombre}</td>
                            <td>${usuario.usuario_apellido}</td>
                            <td>${usuario.usuario_telefono}</td>
                            <td>${usuario.usuario_usuario}</td>
                            <td>${usuario.usuario_email}</td>
                            <td>
                                <a href="${"<?php echo SERVERURL; ?>"}user-update/${usuario.usuario_dni}/" class="btn btn-success">
                                    <i class="fas fa-sync-alt"></i>	
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                });
            } else {
                tbody.innerHTML = `<tr class="text-center"><td colspan="9">No hay usuarios registrados.</td></tr>`;
            }
        })
        .catch(error => console.error("Error al cargar usuarios:", error));
});