// public/js/problema3.js

document.getElementById('btnGenerar').addEventListener('click', function () {
    const error = document.getElementById('mensajeError');
    const panel = document.getElementById('panelResultado');
    error.classList.remove('visible');
    panel.classList.remove('visible');

    const n = document.getElementById('n').value.trim();
    if (n === '' || !Number.isInteger(Number(n)) || Number(n) < 1 || Number(n) > 500) {
        error.textContent = 'Ingresa un número entero entre 1 y 500.';
        error.classList.add('visible');
        return;
    }

    const datos = new FormData();
    datos.append('n', n);

    fetch((window.__APP_BASE || '') + '/app/Controllers/Problema3Controller.php', {
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

        // Título dinámico
        document.getElementById('tituloResultado').textContent =
            'Los ' + json.n + ' primeros múltiplos de 4';

        // Renderizar chips — usamos textContent en cada chip (no innerHTML)
        const contenedor = document.getElementById('contenedorMultiplos');
        contenedor.innerHTML = ''; // limpiar anterior

        json.multiplos.forEach(function (num) {
            const chip = document.createElement('span');
            chip.className   = 'badge chip';
            chip.textContent = num;   // textContent: seguro contra XSS
            contenedor.appendChild(chip);
        });

        panel.classList.add('visible');
    })
    .catch(function () {
        error.textContent = 'Error al conectar con el servidor.';
        error.classList.add('visible');
    });
});
