//   Enviar el formulario al controller via fetch.
//   Mostrar los resultados en la tabla.
//   Dibujar la gráfica circular con Canvas API.

document.getElementById('btnCalcular').addEventListener('click', function () {

    const presupuesto = document.getElementById('presupuesto').value.trim();

    const error   = document.getElementById('mensajeError');
    const panel   = document.getElementById('panelResultado');

    error.classList.remove('visible');
    panel.classList.remove('visible');

    if (presupuesto === '' || isNaN(presupuesto) || Number(presupuesto) <= 0) {
        error.textContent = 'Por favor ingresa un monto positivo válido.';
        error.classList.add('visible');
        return;
    }

    const datos = new FormData();
    datos.append('presupuesto', presupuesto);
fetch((window.__APP_BASE || '') + '/app/Controllers/Problema6Controller.php', {
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

        const formato = new Intl.NumberFormat('es-PA', {
            style: 'currency',
            currency: 'USD'
        });

        document.getElementById('montoGinecologia').textContent   = formato.format(json.ginecologia);
        document.getElementById('montoTraumatologia').textContent = formato.format(json.traumatologia);
        document.getElementById('montoPediatria').textContent     = formato.format(json.pediatria);

        panel.classList.add('visible');

        dibujarGrafica(json.ginecologia, json.traumatologia, json.pediatria);

    })
    .catch(function () {
        error.textContent = 'Ocurrió un error al comunicarse con el servidor.';
        error.classList.add('visible');
    });
});


/**
 * Dibuja una gráfica de pastel (pie chart) usando Canvas API.
 * No necesita ninguna librería externa.
 */
function dibujarGrafica(ginecologia, traumatologia, pediatria) {
    const canvas = document.getElementById('graficaPresupuesto');
    const ctx    = canvas.getContext('2d');

    const total  = ginecologia + traumatologia + pediatria;
    const cx     = (canvas.width  / 2)-25;   // Centro X del canvas
    const cy     = (canvas.height / 2)-25;   // Centro Y del canvas
    const radio  = 120;                  // Radio del círculo

    // Definir los segmentos con su valor, color y etiqueta
    const segmentos = [
        { valor: ginecologia,   color: '#2563eb', etiqueta: 'Ginecología (40%)'   },
        { valor: traumatologia, color: '#16a34a', etiqueta: 'Traumatología (35%)' },
        { valor: pediatria,     color: '#ea580c', etiqueta: 'Pediatría (25%)'     },
    ];

    // Limpiar el canvas antes de redibujar
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    let anguloInicio = -Math.PI / 2;

    segmentos.forEach(function (seg) {
        const proporcion  = seg.valor / total;
        const anguloFinal = anguloInicio + proporcion * 2 * Math.PI;

        // Dibujar el sector
        ctx.beginPath();
        ctx.moveTo(cx, cy);
        ctx.arc(cx, cy, radio, anguloInicio, anguloFinal);
        ctx.closePath();
        ctx.fillStyle = seg.color;
        ctx.fill();

        // Línea de borde entre sectores
        ctx.strokeStyle = '#ffffff';
        ctx.lineWidth   = 2;
        ctx.stroke();

        anguloInicio = anguloFinal; // El siguiente sector empieza donde terminó este
    });

    const iniLeyenda = cy + radio + 18+10;
    segmentos.forEach(function (seg, i) {
        const yPos = iniLeyenda + i * 22;

        // Cuadrado de color
        ctx.fillStyle = seg.color;
        ctx.fillRect(cx - 115, yPos - 12, 14, 14);

        // Texto de la etiqueta
        ctx.fillStyle   = '#1e293b';
        ctx.font        = '13px Segoe UI, sans-serif';
        ctx.fillText(seg.etiqueta, cx - 95, yPos);
    });
}
