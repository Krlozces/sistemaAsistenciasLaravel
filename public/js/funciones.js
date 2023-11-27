$(document).ready(function() {
    $('#dni').keypress(function(e) {
        if (e.which < 48 || e.which > 57) {
            e.preventDefault();
        }
    });
});

$(document).ready(function() {
    $('#ruc').keypress(function(e) {
        if (e.which < 48 || e.which > 57) {
            e.preventDefault();
        }
    });
});

$(document).ready(function() {
    $('#telefono').keypress(function(e) {
        if (e.which < 48 || e.which > 57) {
            e.preventDefault();
        }
    });
});

//Fecha y hora
function actualizarFechaHora() {
    var now = new Date();
    var dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    var dia = dias[now.getDay()];
    var fecha = now.toLocaleDateString('es-ES', { year: 'numeric', month: '2-digit', day: '2-digit' });
    var hora = now.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

    document.getElementById('dia').textContent = dia;
    document.getElementById('fecha').textContent = fecha;
    document.getElementById('hora').textContent = hora;
}
setInterval(actualizarFechaHora, 1000);
actualizarFechaHora();

// Obtener acceso a la cámara
async function activarCamara() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        const videoElement = document.getElementById('camara');
        videoElement.srcObject = stream;
    } catch (error) {
        console.error('Error al acceder a la cámara: ', error);
    }
}

// Tomar una foto
function tomarFoto() {
    const canvasElement = document.getElementById('foto');
    const videoElement = document.getElementById('camara');
    const context = canvasElement.getContext('2d');
    context.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);
    const dataURL = canvasElement.toDataURL('image/png');
    mostrarFoto(dataURL);
    return dataURL; // Retornamos la URL de la imagen para su uso posterior
}

// Mostrar la foto en un elemento img en la página
function mostrarFoto(dataURL) {
    const imagenElement = document.getElementById('imagenMostrada'); // Asegúrate de que este ID corresponda a un elemento img en tu HTML
    if (imagenElement) {
        imagenElement.src = dataURL;
        imagenElement.style.display = 'block'; // Asegúrate de que el estilo coincida con cómo debería mostrarse
    }
}

// Vincular el botón de entrada con la acción de tomar una foto, mostrarla, y enviarla
function vincularBotonEntrada() {
    const botonEntrada = document.querySelector('button[name="marcar"][value="entrada"]');
    botonEntrada.addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir el comportamiento por defecto del formulario
        const dataURL = tomarFotoYMostrar();
        enviarFotoAlServidor(dataURL, 'entrada');
    });
}

// Ocultar la foto después de un tiempo
function ocultarFotoDespuesDe(segundos) {
    setTimeout(function() {
        const imagenElement = document.getElementById('imagenMostrada');
        if (imagenElement) {
            imagenElement.style.display = 'none';
        }
    }, segundos * 1000);
}

// Vincular el botón de entrada con la acción de tomar una foto y enviarla
function vincularBotonEntrada() {
    const botonEntrada = document.querySelector('button[name="marcar"][value="entrada"]');
    botonEntrada.addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir el comportamiento por defecto del formulario
        const dataURL = tomarFoto();
        enviarFotoAlServidor(dataURL, 'entrada');
    });
}

function enviarFotoAlServidor(dataURL, accion) {
    let formData = new FormData();
    formData.append('imagen', dataURL);
    formData.append('dni', document.getElementById('dni').value);
    formData.append('marcar', accion); 
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formData.append('_token', token);

    fetch('/asistencia', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            document.getElementById('foto')
            return response.json();
        } else {
            return response.text().then(text => {
                throw new Error(text);
            });
        }
    })
    .then(data => {
        console.log(data);
        alert('Entrada registrada correctamente');
        ocultarFotoDespuesDe(5);
        window.location.reload();
    })
    .catch(error => {
        console.error('Error:', error.message);
        alert('Error al registrar la entrada');
    });
}

window.addEventListener('load', function() {
    activarCamara();
    vincularBotonEntrada();
});

