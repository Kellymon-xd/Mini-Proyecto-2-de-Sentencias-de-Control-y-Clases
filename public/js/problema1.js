// Problema 1: recoge cinco valores numéricos, valida el formulario
// y solicita al controller PHP el cálculo de estadísticas.

// Maneja el clic en el botón y coordina validación, envío y visualización.
document.getElementById('btnCalcular').addEventListener('click', function () {
    const error = document.getElementById('mensajeError');
    const panel = document.getElementById('panelResultado');
    error.classList.remove('visible');
    panel.classList.remove('visible');

    const datos = new FormData();
    let valido  = true;

    // Validar que todos los campos contengan números positivos.
    for (let i = 1; i <= 5; i++) {
        const val = document.getElementById('n' + i).value.trim();
        if (val === '' || isNaN(val) || Number(val) <= 0) {
            error.textContent = 'Todos los campos deben tener números positivos válidos.';
            error.classList.add('visible');
            valido = false;
            break;
        }
        datos.append('n' + i, val);
    }

    if (!valido) return;

    // Enviar los datos validados al servidor y manejar la respuesta.
    fetch((window.__APP_BASE || '') + '/app/Controllers/Problema1Controller.php', {
        method: 'POST',
        body: datos
    })
    .then(r => r.json())
    // Procesar la respuesta JSON del servidor.
    .then(function (json) {
        if (json.error) {
            error.textContent = json.error;
            error.classList.add('visible');
            return;
        }
        document.getElementById('rMedia').textContent      = json.media;
        document.getElementById('rDesviacion').textContent = json.desviacion;
        document.getElementById('rMinimo').textContent     = json.minimo;
        document.getElementById('rMaximo').textContent     = json.maximo;
        panel.classList.add('visible');
    })
    // Manejar errores de conexión y notificar al usuario.
    .catch(function () {
        error.textContent = 'Error al conectar con el servidor.';
        error.classList.add('visible');
    });
});
