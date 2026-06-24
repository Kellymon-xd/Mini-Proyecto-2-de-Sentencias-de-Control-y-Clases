// Problema 4: envía un rango de inicio y fin al controller para obtener
// la suma de pares e impares en ese intervalo.

// Manejador del botón "Calcular" que valida el rango y genera la
// consulta para el servidor.
document.getElementById('btnCalcular').addEventListener('click', function () {
    const error = document.getElementById('mensajeError');
    const panel = document.getElementById('panelResultado');
    error.classList.remove('visible');
    panel.classList.remove('visible');

    const inicio = document.getElementById('inicio').value.trim();
    const fin    = document.getElementById('fin').value.trim();

    if (inicio === '' || fin === '') {
        error.textContent = 'Completa ambos campos.';
        error.classList.add('visible');
        return;
    }

    const datos = new FormData();
    datos.append('inicio', inicio);
    datos.append('fin',    fin);

    // Enviar inicio/fin al servidor y procesar los totales devueltos.
    fetch((window.__APP_BASE || '') + '/app/Controllers/Problema4Controller.php', {
        method: 'POST',
        body: datos
    })
    .then(r => r.json())
    .then(function (json) {
        if (json.error) {
            error.textContent = json.error;
            error.classList.add('visible');
            return;
        }

        const fmt = new Intl.NumberFormat('es-PA');
        document.getElementById('tituloResultado').textContent =
            'Pares e impares entre ' + json.inicio + ' y ' + json.fin;

        document.getElementById('rTotalPares').textContent    = json.totalPares;
        document.getElementById('rSumaPares').textContent     = fmt.format(json.sumaPares);
        document.getElementById('rTotalImpares').textContent  = json.totalImpares;
        document.getElementById('rSumaImpares').textContent   = fmt.format(json.sumaImpares);

        panel.classList.add('visible');
    })
    .catch(function () {
        error.textContent = 'Error al conectar con el servidor.';
        error.classList.add('visible');
    });
});
