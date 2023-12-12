// Función para mostrar la imagen seleccionada y almacenarla localmente
function mostrarImagenSeleccionada(event) {
    const input = event.target;
    const reader = new FileReader();

    reader.onload = function () {
        const imagen = document.querySelector('img');
        imagen.src = reader.result;

        // Almacenar la imagen en el almacenamiento local
        localStorage.setItem('imagenPerfil', reader.result);
    };

    reader.readAsDataURL(input.files[0]);
}

// Obtener la imagen del almacenamiento local al cargar la página
window.addEventListener('DOMContentLoaded', function() {
    const imagenGuardada = localStorage.getItem('imagenPerfil');
    const imagen = document.querySelector('img');

    if (imagenGuardada) {
        imagen.src = imagenGuardada;
    }
});

// Asignar el evento onChange al campo de entrada de tipo archivo
document.getElementById('inputImagen').addEventListener('change', mostrarImagenSeleccionada);





// Ejecutar función en el evento click
document.getElementById("btn_open").addEventListener("click", open_close_menu);

// Declaramos variables
var side_menu = document.getElementById("menu_side");
var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");

// Evento para mostrar y ocultar menú
function open_close_menu() {
    body.classList.toggle("body_move");
    side_menu.classList.toggle("menu__side_move");
}

// Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página
if (window.innerWidth < 760) {
    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
}

// Haciendo el menú responsive (adaptable)
window.addEventListener("resize", function () {
    if (window.innerWidth > 760) {
        body.classList.remove("body_move");
        side_menu.classList.remove("menu__side_move");
    } else {
        body.classList.add("body_move");
        side_menu.classList.add("menu__side_move");
    }
});

// Función para mostrar una sección
function showSection(sectionId) {
    const sections = document.querySelectorAll('main section');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    document.getElementById(sectionId).style.display = 'block';
}


function showModal() {
    document.getElementById("successModal").style.display = "block";
    // También puedes enviar el formulario aquí si es necesario
    // document.forms[0].submit(); // Esto enviará el primer formulario en la página
    return false; // Evita que la página se recargue
}



// Ocultar el modal
function closeModal() {
    var modal = document.getElementById("successModal");
    modal.style.display = "none";
}

// Ocultar el mensaje después de 3 segundos (3000 milisegundos)
setTimeout(function() {
    document.getElementById("mensaje").style.display = "none";
}, 1000);


// Cerrar el modal haciendo clic en el botón de cierre
var closeModalButton = document.getElementById("closeModal");
if (closeModalButton) {
    closeModalButton.onclick = closeModal;
}

function showSection(sectionId) {
    // Obtén todas las secciones en tu página
    var sections = document.getElementsByTagName('section');

    // Recorre todas las secciones y ocúltalas
    for (var i = 0; i < sections.length; i++) {
        sections[i].style.display = 'none';
    }

    // Muestra la sección deseada
    var sectionToShow = document.getElementById(sectionId);
    if (sectionToShow) {
        sectionToShow.style.display = 'block';
    }
}



// Función para abrir el modal
// Función para abrir el modal
function cerrarModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none"; // Oculta el modal al hacer clic en "Cancelar"
}
function guardarDatos() {
    var nombre = document.getElementById('username').value;
    var apellido = document.getElementById('apellido').value;
    var correo = document.getElementById('correo').value;
    var cargo = document.getElementById('cargo').value;
    var contrasena = document.getElementById('contrasena').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('myModal').style.display='none';
            alert("Usuario agregado correctamente");
        }
    };
    xhttp.open("POST", "agregarUsuario.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nombre="+nombre+"&apellido="+apellido+"&correo="+correo+"&cargo="+cargo+"&contrasena="+contrasena);
     // Limpiar los campos del formulario después de insertar los datos
     document.getElementById("username").value = "";
     document.getElementById("apellido").value = "";
     document.getElementById("correo").value = "";
     document.getElementById("cargo").value = "";
     document.getElementById("contrasena").value = "";
}

    

      $(document).ready(function() {
        $('#search').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.cuadro table tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Modal show on click
        $('.cuadro table').on('click', 'tr', function() {
            var userId = $(this).data('userid');
            $('#myModal' + userId).modal('show');
        });
    });

    // Función para imprimir el contenido del gráfico
function imprimirGrafico() {
    // Obtener el contenido del gráfico
    var grafico = document.getElementById('graficoBarras');
    var contenidoGrafico = grafico.toDataURL(); // Convertir el gráfico a una URL base64

    // Crear un elemento de imagen para la impresión
    var imagen = new Image();
    imagen.src = contenidoGrafico;

    // Crear una ventana emergente para imprimir la imagen
    var ventanaImpresion = window.open('');
    ventanaImpresion.document.write('<img src="' + contenidoGrafico + '" style="width:100%;">');
    ventanaImpresion.document.close();

    // Esperar a que la imagen esté cargada antes de imprimir
    imagen.onload = function() {
        ventanaImpresion.print(); // Imprimir la imagen
        ventanaImpresion.close(); // Cerrar la ventana después de imprimir
    };
}


function abrirModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function cerrarModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}



function validarCambiarContrasena() {
    // Obtener los valores de los campos
    var contrasenaActual = document.getElementById('contrasenaActual').value;
    var nuevaContrasena = document.getElementById('nuevaContrasena').value;
    var confirmarContrasena = document.getElementById('confirmarContrasena').value;

    // Validar si las nuevas contraseñas coinciden
    if (nuevaContrasena !== confirmarContrasena) {
        alert('Las nuevas contraseñas no coinciden');
        return false;
    }

    // Crear un objeto para enviar los datos al servidor
    var datos = {
        contrasenaActual: contrasenaActual,
        nuevaContrasena: nuevaContrasena
    };

    // Realizar la solicitud AJAX al servidor
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'actualizarD.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert(xhr.responseText); // Mostrar la respuesta del servidor (éxito o error)
            // Si la respuesta indica éxito, puedes realizar acciones adicionales aquí
        } else {
            alert('Error al actualizar la contraseña');
        }
    };
    xhr.send(JSON.stringify(datos)); // Enviar los datos al servidor en formato JSON

    // Cerrar modal y limpiar campos (esto ocurrirá antes de recibir la respuesta del servidor)
    cerrarModal('modalCambiarContrasena');
    document.getElementById('contrasenaActual').value = '';
    document.getElementById('nuevaContrasena').value = '';
    document.getElementById('confirmarContrasena').value = '';

    return false; // Esto evita el envío real del formulario en este ejemplo
}



function mostrarDetalles(id) {
    // Lógica para obtener detalles del elemento con el ID proporcionado
    // Realiza una solicitud AJAX para obtener los detalles del elemento con el ID

    $.ajax({
        type: "GET",
        url: "detalles_elemento.php", // Ruta a tu script PHP para obtener detalles
        data: { id: id }, // Envía el ID del elemento
        success: function(response) {
            // Cargar el contenido en el modal
            $("#userModal .modal-body").html(response);

            // Mostrar el modal
            $("#userModal").modal("show");
        },
        error: function() {
            alert("Error al cargar los detalles del elemento.");
        }
    });
}

function mostrarDetallesAdmi(id) {
    // Lógica para obtener detalles del elemento con el ID proporcionado
    // Realiza una solicitud AJAX para obtener los detalles del elemento con el ID

    $.ajax({
        type: "GET",
        url: "detalle_elemento_Admi.php", // Ruta a tu script PHP para obtener detalles
        data: { id: id }, // Envía el ID del elemento
        success: function(response) {
            // Cargar el contenido en el modal
            $("#userModal .modal-body").html(response);

            // Mostrar el modal
            $("#userModal").modal("show");
        },
        error: function() {
            alert("Error al cargar los detalles del elemento.");
        }
    });
}


function mostrarDetallesAula(id) {
    $.ajax({
        type: "GET",
        url: "detalle_Elemento_Aula.php",
        data: {id: id},
        success: function(response){
            $("#userModal .modal-body").html(response);
            $("#userModal").modal("show");

        },
        error: function(){
            alert("Error al cargar los detalles del elemento.");
        }
    });
}


//ELIMINAR CON EL VORON ELIMINAR DEL MODAL DEL INICIO
// Para talleres
function eliminarTaller(id) {
    if (confirm('¿Estás seguro de que quieres eliminar este taller?')) {
        $.ajax({
            type: 'POST',
            url: 'eliminar_taller.php', // Ruta a tu script PHP para eliminar talleres
            data: {
                id: id
            },
            success: function(response) {
                // Aquí puedes manejar la respuesta del servidor, por ejemplo, recargar la página o actualizar la lista de talleres
                location.reload(); // Recargar la página después de la eliminación
            },
            error: function(err) {
                console.error('Error al eliminar taller:', err);
            }
        });
    }
}

// Para aula
function eliminarAula(id) {
    if (confirm('¿Estás seguro de que quieres eliminar esta aula?')) {
        $.ajax({
            type: 'POST',
            url: 'eliminar_aula.php', // Ruta a tu script PHP para eliminar aulas
            data: {
                id: id
            },
            success: function(response) {
                // Aquí puedes manejar la respuesta del servidor, por ejemplo, recargar la página o actualizar la lista de aulas
                location.reload(); // Recargar la página después de la eliminación
            },
            error: function(err) {
                console.error('Error al eliminar aula:', err);
            }
        });
    }
}


// Para oficina
function eliminarOficina(id) {
    if (confirm('¿Estás seguro de que quieres eliminar esta oficina?')) {
        $.ajax({
            type: 'POST',
            url: 'eliminar_oficina.php', // Ruta a tu script PHP para eliminar oficinas
            data: {
                id: id
            },
            success: function(response) {
                // Aquí puedes manejar la respuesta del servidor, por ejemplo, recargar la página o actualizar la lista de oficinas
                location.reload(); // Recargar la página después de la eliminación
            },
            error: function(err) {
                console.error('Error al eliminar oficina:', err);
            }
        });
    }
}

//EDITAR FORMULARIO
function editarUsuario(userId, url) {
    // Realizar una solicitud AJAX para obtener el formulario de edición
    $.ajax({
        type: "GET",
        url: url,
        data: { id: userId },
        success: function (response) {
            // Insertar el contenido en el modal
            $("#editarModalContent").html(response);

            // Mostrar el modal
            $("#userModal").modal("show");
        },
        error: function () {
            alert("Error al cargar el formulario de edición.");
        }
    });
}


$(document).ready(function () {
    // Editar en sección de Oficina
    $(".editarOficina").click(function () {
        var userId = $(this).data("id");
        var url = "editar_oficina.php"; // Ruta para editar en la sección de oficina
        editarUsuario(userId, url);
    });

    // Editar en sección de Aula
    $(".editarAula").click(function () {
        var userId = $(this).data("id");
        var url = "editar_aula.php"; // Ruta para editar en la sección de aula
        editarUsuario(userId, url);
    });

    // Editar en sección de Talleres
    $(".editarTaller").click(function () {
        var userId = $(this).data("id");
        var url = "editar_taller.php"; // Ruta para editar en la sección de talleres
        editarUsuario(userId, url);
    });

        // Manejar el envío del formulario de actualización
    $("#editarModalContent").on("submit", "form", function (event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del envío del formulario
      
    });

});

// Función para cargar el formulario de edición del taller




