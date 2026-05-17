document.getElementById('btnClasificar').addEventListener('click', function () {
    const error = document.getElementById('mensajeError');
    const panel = document.getElementById('panelResultado');
    error.classList.remove('visible');
    panel.classList.remove('visible');

    const datos = new FormData();
    let valido   = true;

    for (let i = 1; i <= 5; i++) {
        const val = document.getElementById('edad' + i).value.trim();
        if (val === '' || !Number.isInteger(Number(val)) || Number(val) < 0 || Number(val) > 120) {
            error.textContent = 'Todas las edades deben ser enteros entre 0 y 120.';
            error.classList.add('visible');
            valido = false;
            break;
        }
        datos.append('edad' + i, val);
    }

    if (!valido) return;

    fetch((window.__APP_BASE || '') + '/app/Controllers/Problema5Controller.php', {
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

        const tbody = document.getElementById('cuerpoTabla');
        tbody.innerHTML = '';
        json.personas.forEach(function (p, idx) {
            const fila = document.createElement('tr');

            const tdNum  = document.createElement('td');
            const tdEdad = document.createElement('td');
            const tdCat  = document.createElement('td');

            tdNum.textContent  = 'Persona ' + (idx + 1);
            tdEdad.textContent = p.edad;
            tdCat.textContent  = p.categoria;
            fila.appendChild(tdNum);
            fila.appendChild(tdEdad);
            fila.appendChild(tdCat);
            tbody.appendChild(fila);
        });

        document.getElementById('rMedia').textContent  = json.media;
        document.getElementById('rMinimo').textContent = json.minimo;
        document.getElementById('rMaximo').textContent = json.maximo;

        panel.classList.add('visible');

        dibujarBarras(json.conteo);
    })
    .catch(function () {
        error.textContent = 'Error al conectar con el servidor.';
        error.classList.add('visible');
    });
});


/**
 * Dibuja un gráfico de barras con Canvas API puro.
 * Muestra cuántas personas hay en cada categoría de edad.
 *
 * @param {Object} conteo  { "Niño": n, "Adolescente": n, "Adulto": n, "Adulto mayor": n }
 */
function dibujarBarras(conteo) {
    const canvas  = document.getElementById('graficaEdades');
    const ctx     = canvas.getContext('2d');

    const categorias = ['Niño', 'Adolescente', 'Adulto', 'Adulto mayor'];
    const colores    = ['#f59e0b', '#2563eb', '#16a34a', '#7c3aed'];
    const valores    = categorias.map(c => conteo[c] || 0);
    const maxVal     = Math.max(...valores, 1);

    const margenIzq  = 50;
    const margenInf  = 50;
    const anchoGraf  = canvas.width  - margenIzq - 20;
    const altoGraf   = canvas.height - margenInf - 20;
    const anchoBarra = anchoGraf / categorias.length;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Eje Y (líneas de guía)
    ctx.strokeStyle = '#e2e8f0';
    ctx.lineWidth   = 1;
    for (let i = 0; i <= maxVal; i++) {
        const y = 20 + altoGraf - (i / maxVal) * altoGraf;
        ctx.beginPath();
        ctx.moveTo(margenIzq, y);
        ctx.lineTo(margenIzq + anchoGraf, y);
        ctx.stroke();

        // Etiqueta numérica del eje Y
        ctx.fillStyle  = '#94a3b8';
        ctx.font       = '11px Segoe UI, sans-serif';
        ctx.fillText(i, margenIzq - 22, y + 4);
    }

    // Barras
    categorias.forEach(function (cat, i) {
        const valor   = valores[i];
        const altBarra= (valor / maxVal) * altoGraf;
        const x       = margenIzq + i * anchoBarra + anchoBarra * 0.1;
        const y       = 20 + altoGraf - altBarra;
        const ancho   = anchoBarra * 0.8;

        ctx.fillStyle = colores[i];
        ctx.fillRect(x, y, ancho, altBarra);

        // Valor encima de la barra
        ctx.fillStyle  = '#1e293b';
        ctx.font       = 'bold 14px Segoe UI, sans-serif';
        ctx.textAlign  = 'center';
        ctx.fillText(valor, x + ancho / 2, y - 5);

        // Etiqueta de la categoría debajo
        ctx.fillStyle  = '#475569';
        ctx.font       = '11px Segoe UI, sans-serif';
        ctx.fillText(cat, x + ancho / 2, 20 + altoGraf + 18);
    });

    ctx.textAlign = 'left'; // resetear alineación
}
