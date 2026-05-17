// Genera campos de nota según la cantidad indicada.
// Recolecta los valores, los envía como JSON y muestra estadísticas.

document.getElementById('btnGenerarCampos').addEventListener('click', function () {
    const error = document.getElementById('mensajeError');
    error.classList.remove('visible');

    const cantidad = parseInt(document.getElementById('cantidad').value, 10);

    if (isNaN(cantidad) || cantidad < 1 || cantidad > 100) {
        error.textContent = 'Ingresa un número entre 1 y 100.';
        error.classList.add('visible');
        return;
    }

    const contenedor = document.getElementById('camposNotas');
    contenedor.innerHTML = ''; // limpiar campos previos

    for (let i = 1; i <= cantidad; i++) {
        const div   = document.createElement('div');
        div.className = 'campo';

        const label = document.createElement('label');
        label.textContent = 'Nota ' + i + ':';
        label.setAttribute('for', 'nota' + i);

        const input = document.createElement('input');
        input.type        = 'number';
        input.id          = 'nota' + i;
        input.placeholder = '0 – 100';
        input.min         = '0';
        input.max         = '100';
        input.step        = 'any';

        div.appendChild(label);
        div.appendChild(input);
        contenedor.appendChild(div);
    }

    // Mostrar el paso 2 y ocultar el panel de resultados anterior
    document.getElementById('paso2').style.display = 'block';
    document.getElementById('panelResultado').classList.remove('visible');
});


document.getElementById('btnCalcular').addEventListener('click', function () {
    const error = document.getElementById('mensajeError');
    const panel = document.getElementById('panelResultado');
    error.classList.remove('visible');
    panel.classList.remove('visible');

    const cantidad = parseInt(document.getElementById('cantidad').value, 10);
    const notas    = [];
    let valido     = true;

    for (let i = 1; i <= cantidad; i++) {
        const campo = document.getElementById('nota' + i);
        if (!campo) break;

        const val = campo.value.trim();
        if (val === '' || isNaN(val) || Number(val) < 0 || Number(val) > 100) {
            error.textContent = 'La nota ' + i + ' debe ser un número entre 0 y 100.';
            error.classList.add('visible');
            valido = false;
            break;
        }
        notas.push(Number(val));
    }

    if (!valido) return;

    fetch((window.__APP_BASE || '') + '/app/Controllers/Problema7Controller.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ notas: notas })
    })
    .then(r => r.json())
    .then(function (json) {
        if (json.error) {
            error.textContent = json.error;
            error.classList.add('visible');
            return;
        }
        document.getElementById('rCantidad').textContent   = json.cantidad;
        document.getElementById('rPromedio').textContent   = json.promedio;
        document.getElementById('rDesviacion').textContent = json.desviacion;
        document.getElementById('rMinima').textContent     = json.minima;
        document.getElementById('rMaxima').textContent     = json.maxima;
        panel.classList.add('visible');
    })
    .catch(function () {
        error.textContent = 'Error al conectar con el servidor.';
        error.classList.add('visible');
    });
});
