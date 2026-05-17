// El Problema 2 no necesita datos de entrada: solo dispara el fetch.

document.getElementById('btnCalcular').addEventListener('click', function () {
    const error = document.getElementById('mensajeError');
    const panel = document.getElementById('panelResultado');
    error.classList.remove('visible');
    panel.classList.remove('visible');

    fetch((window.__APP_BASE || '') + '/app/Controllers/Problema2Controller.php', {
        method: 'POST',
        body: new FormData()   // body vacío, el controller no necesita input
    })
    .then(r => r.json())
    .then(function (json) {
        if (json.error) {
            error.textContent = json.error;
            error.classList.add('visible');
            return;
        }

        document.getElementById('rResultado').textContent = json.resultado;
        panel.classList.add('visible');
    })
    .catch(function () {
        error.textContent = 'Error al conectar con el servidor.';
        error.classList.add('visible');
    });
});
