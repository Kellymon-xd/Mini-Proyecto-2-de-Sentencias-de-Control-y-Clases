// Problema 9: valida el número ingresado, solicita las primeras 15 potencias
// al controller y renderiza exponentes con superíndices legibles.

// Superíndices usados para mostrar exponentes como texto legible.
const SUPERINDICES = {
    "0": "⁰",
    "1": "¹",
    "2": "²",
    "3": "³",
    "4": "⁴",
    "5": "⁵",
    "6": "⁶",
    "7": "⁷",
    "8": "⁸",
    "9": "⁹"
};

// Manejador del botón "Calcular" que valida el número ingresado,
// solicita el cálculo de potencias y renderiza la tabla resultante.
document.getElementById('btnCalcular').addEventListener('click', function () {
    const error = document.getElementById('mensajeError');
    const panel = document.getElementById('panelResultado');

    error.classList.remove('visible');
    panel.classList.remove('visible');

    const numero = document.getElementById('numero').value.trim();

    if (numero === '' || !Number.isInteger(Number(numero)) || Number(numero) < 1 || Number(numero) > 9) {
        error.textContent = 'Ingresa un número entero entre 1 y 9.';
        error.classList.add('visible');
        return;
    }

    const datos = new FormData();
    datos.append('numero', numero);

    fetch((window.__APP_BASE || '') + '/app/Controllers/Problema9Controller.php', {
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

        document.getElementById('tituloPotencias').textContent =
            'Las 15 primeras potencias de ' + json.base;

        const tbody = document.getElementById('cuerpoPotencias');
        tbody.innerHTML = '';

        json.potencias.forEach(function (item) {
            const fila = document.createElement('tr');

            // Construir el exponente en formato superíndice.
            const tdExp = document.createElement('td');
            const tdExpr = document.createElement('td');
            const tdRes = document.createElement('td');

            let exponenteBonito = '';

            String(item.exponente).split('').forEach(function (digito) {
                exponenteBonito += SUPERINDICES[digito];
            });

            tdExp.textContent = item.exponente;
            tdExpr.textContent = json.base + exponenteBonito;
            tdRes.textContent = new Intl.NumberFormat('es-PA').format(item.resultado);

            fila.appendChild(tdExp);
            fila.appendChild(tdExpr);
            fila.appendChild(tdRes);
            tbody.appendChild(fila);
        });

        panel.classList.add('visible');
    })
    .catch(function () {
        error.textContent = 'Error al conectar con el servidor.';
        error.classList.add('visible');
    });
});