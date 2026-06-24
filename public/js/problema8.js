// Problema 8: envía la fecha seleccionada al controller, valida la
// respuesta y actualiza la vista con la estación y la imagen correspondiente.

// Manejador del botón "Consultar" que realiza la petición de estación
// según la fecha ingresada.
document.getElementById('btnConsultar').addEventListener('click', function () {

    const fechaInput = document.getElementById('fecha');
    const fecha      = fechaInput.value.trim();

    const error  = document.getElementById('mensajeError');
    const panel  = document.getElementById('panelResultado');
    const imagen = document.getElementById('imagenEstacion');

    // Ocultar estado previo
    error.classList.remove('visible');
    panel.classList.remove('visible');
    imagen.style.display = 'none';

    // Validación básica en cliente
    if (fecha === '') {
        error.textContent = 'Por favor selecciona una fecha.';
        error.classList.add('visible');
        return;
    }

    // Armar datos del formulario para enviar la fecha al servidor.
    const datos = new FormData();
    datos.append('fecha', fecha);

    // Llamar al controller
    fetch((window.__APP_BASE || '') + '/app/Controllers/Problema8Controller.php', {
        method: 'POST',
        body: datos
    })
    .then(function (respuesta) {
        return respuesta.json();
    })
    .then(function (json) {

        if (json.error) {
            error.textContent = json.error;
            error.classList.add('visible');
            return;
        }

        // ── Mostrar la fecha en formato legible ──────────────────
        // Creamos un objeto Date a partir del string para formatearlo
        // Sumamos T00:00:00 para evitar problemas de zona horaria
        // Convertir la cadena ISO a Date para formateo local.
        const partes    = json.fecha.split('-');         // ['2024','12','25']
        const fechaObj  = new Date(partes[0], partes[1] - 1, partes[2]);
        const opciones  = { year: 'numeric', month: 'long', day: 'numeric' };
        const fechaLeg  = fechaObj.toLocaleDateString('es-PA', opciones);

        // Usar textContent siempre para datos dinámicos (evita XSS)
        document.getElementById('fechaMostrada').textContent  = fechaLeg;
        document.getElementById('nombreEstacion').textContent = json.estacion;

        // ── Mostrar imagen de la estación ────────────────────────
        // json.imagen viene del PHP, por ejemplo: /MINI_PROYECTO_2/public/img/verano.jpg
        imagen.src         = json.imagen;
        imagen.alt         = 'Imagen de ' + json.estacion;
        imagen.style.display = 'block';

        // Mostrar el panel de resultados al usuario.

        // ── Mostrar el panel completo ────────────────────────────
        panel.classList.add('visible');

    })
    .catch(function () {
        error.textContent = 'Error al conectar con el servidor. Intenta de nuevo.';
        error.classList.add('visible');
    });
});
