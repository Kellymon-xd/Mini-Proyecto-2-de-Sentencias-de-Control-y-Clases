# Mini Proyecto #2

**Universidad Tecnológica de Panamá**  
**Facultad de Ingeniería de Sistemas Computacionales**  
**Materia:** Desarrollo Web VII  
**Tema:** Resolviendo problemas con estructuras de decisión y repetición en PHP  

---

## Integrantes

- Kelly Beitia
- Lionel Cordoba
 

---

# Índice

1. [Introducción](#introducción)
2. [Requisitos](#requisitos)
3. [Instalación](#instalación)
4. [Descripción general del taller](#descripción-general-del-taller)
5. [Estructura MVC](#estructura-mvc)
6. [Problemas implementados](#problemas-implementados)
7. [Convenciones de código](#convenciones-de-código)
8. [Validación, sanitización y seguridad OWASP](#validación-sanitización-y-seguridad-owasp)
9. [Descripción de los problemas y capturas](#descripción-de-los-problemas-y-capturas)
10. [Conclusiones o reflexiones del equipo](#conclusiones-o-reflexiones-del-equipo)

---

# Introducción

Este mini proyecto tiene como finalidad aplicar estructuras de decisión y repetición en PHP mediante la resolución de diferentes problemas algorítmicos. Durante el desarrollo se utilizaron condicionales, ciclos, arreglos, funciones, formularios, clases y métodos estáticos.

Además de resolver los ejercicios, el proyecto busca fortalecer la organización del código mediante una estructura MVC simple, separando la lógica de negocio, la presentación visual y el manejo de las peticiones del usuario. También se aplican buenas prácticas como DRY, validación de datos, sanitización de salidas y medidas básicas de seguridad recomendadas por OWASP.

---

# Requisitos

- PHP 7.4 o superior, recomendado PHP 8.x.
- Servidor web local: XAMPP, Laragon o WAMP.
- Navegador moderno: Chrome, Firefox o Edge.

---

# Instalación

1. Clonar o copiar la carpeta `MINI_PROYECTO` dentro de la carpeta `htdocs` de XAMPP, o dentro de `www` si se utiliza Laragon/WAMP.

2. Verificar que Apache esté corriendo.

3. Abrir en el navegador:

```text
http://localhost/MINI_PROYECTO/index.php
```

---

# Descripción general del taller

El taller consiste en desarrollar una aplicación web en PHP que permita resolver nueve problemas utilizando estructuras de control, arreglos, funciones y clases. Cada problema cuenta con su propio formulario, archivo JavaScript, controlador y modelo.

El usuario selecciona el problema desde un menú principal. Luego ingresa los datos solicitados mediante formularios. JavaScript envía los datos al controlador correspondiente usando `fetch`. El controlador valida la petición, llama al modelo encargado de realizar el cálculo y devuelve una respuesta en formato JSON. Finalmente, JavaScript muestra los resultados en la vista.

La estructura del proyecto permite mantener separado el código de presentación, la lógica de negocio y el procesamiento de solicitudes.

---

# Estructura MVC

```text
MINI_PROYECTO/
├── index.php                    ← Menú principal
├── app/
│   ├── Controllers/             ← Reciben POST, llaman al Model, devuelven JSON
│   ├── Models/                  ← Lógica de cálculo sin HTML
│   └── Utils/
│       ├── Utilidades.php       ← Sanitización, validación, conversión
│       └── Navegacion.php       ← Genera botón "Volver al menú"
├── views/
│   ├── layouts/
│   │   ├── header.php           ← Cabecera reutilizable
│   │   └── footer.php           ← Pie con fecha dinámica
│   └── problema[1-9].php        ← Formularios y HTML por problema
└── public/
    ├── css/style.css            ← Estilos globales
    ├── js/problema[1-9].js      ← fetch y actualización del DOM
    └── img/                     ← Imágenes de estaciones
        ├── verano.jpg
        ├── otono.jpg
        ├── invierno.jpg
        └── primavera.jpg
```

---

# Problemas implementados

| # | Problema | Model | Gráfica |
|---|----------|-------|---------|
| 1 | Media, desviación estándar, mínimo y máximo de 5 números | `Estadistica.php` | — |
| 2 | Sumatoria del 1 al 1000 | `Sumatoria.php` | — |
| 3 | N primeros múltiplos de 4 | `Multiplos.php` | — |
| 4 | Suma de pares e impares entre dos valores | `SumaParesImpares.php` | — |
| 5 | Clasificador de edades de 5 personas | `ClasificadorEdades.php` | Canvas |
| 6 | Distribución del presupuesto hospitalario | `PresupuestoHospital.php` | Canvas circular |
| 7 | Estadísticas de N notas | `EstadisticaNotas.php` | — |
| 8 | Estación del año con imagen | `EstacionAnio.php` | Imagen |
| 9 | 15 primeras potencias de un número | `Potencias.php` | — |

---

# Convenciones de código

- **Clases:** StudlyCaps. Ejemplo: `PresupuestoHospital`.
- **Métodos y variables:** camelCase. Ejemplo: `calcularDistribucion`.
- **Controllers:** reciben datos por POST, llaman al modelo y devuelven JSON.
- **Models:** contienen solamente lógica de cálculo, sin HTML.
- **Views:** contienen formularios y estructura visual.
- **JavaScript:** utiliza `fetch` para enviar datos y `textContent` para mostrar resultados.
- **CSS:** se centraliza en `public/css/style.css`.

---

# Funciones utilizadas

## PHP

- `trim()` para limpiar espacios en blanco de los datos ingresados.
- `htmlspecialchars()` para escapar caracteres especiales y prevenir XSS.
- `is_numeric()` para validar que el valor ingresado sea numérico.
- Conversiones con `(int)` y `(float)` para procesar valores numéricos.
- `round()` para redondear resultados a decimales especificados.
- `count()` para obtener cantidad de elementos en arreglos.
- `sqrt()` para calcular la raíz cuadrada en la desviación estándar.
- `json_encode()` y `json_decode()` para serializar y deserializar datos JSON.
- `file_get_contents('php://input')` para leer datos crudos enviados desde JavaScript.
- `date_default_timezone_set()` y `DateTime` para manejar fechas y mostrar la fecha de ejecución.
- `rtrim()` y `dirname()` para construir rutas de navegación seguras.
- `isset()` para verificar la presencia de datos antes de procesarlos.

## JavaScript

- `document.getElementById()` para obtener elementos del DOM.
- `addEventListener()` para manejar eventos de clic en botones.
- `fetch()` para enviar peticiones al servidor y recibir respuestas JSON.
- `JSON.stringify()` para convertir datos a JSON antes de enviarlos.
- `textContent` para mostrar resultados de manera segura en la página.
- `classList.add()` y `classList.remove()` para controlar la visibilidad de mensajes y paneles.
- `Intl.NumberFormat` para formatear números de manera local.

---

# Validación, sanitización y seguridad OWASP

Para mejorar la seguridad del proyecto se aplicaron medidas básicas de validación y sanitización.

## Prevención de XSS

Se utiliza `htmlspecialchars()` dentro de la clase `Utilidades` para evitar que datos ingresados por el usuario se interpreten como código HTML o JavaScript.

```php
public static function escaparHTML(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
```

## Validación de entradas

Antes de procesar los datos, se verifica que sean del tipo esperado.

```php
public static function esNumero(string $valor): bool
{
    return is_numeric(trim($valor));
}
```

## Uso seguro del DOM

En JavaScript se utiliza `textContent` para mostrar resultados, evitando insertar contenido HTML dinámico con datos del usuario.

```javascript
resultado.textContent = data.resultado;
```

## Manejo de errores

Los controladores devuelven mensajes controlados en JSON, evitando mostrar errores técnicos, rutas internas o información sensible del servidor.

---

# Descripción de los problemas y capturas

## Problema 1: Estadísticas de números positivos

Este problema permite ingresar cinco números positivos mediante un formulario. El sistema calcula la media, desviación estándar, número mínimo y número máximo.

**Modelo utilizado:** `Estadistica.php`  
**Controlador utilizado:** `Problema1Controller.php`  
**Vista utilizada:** `problema1.php`  
**JavaScript utilizado:** `problema1.js`

### Captura del código

![Problema 1](Captures/Problema1.png)

### Captura de ejecución

![alt text](Captures/problema1-ejecucion.png)

---

## Problema 2: Sumatoria del 1 al 1000

Este problema calcula la suma de los números del 1 al 1000. El resultado esperado es 500500.

**Modelo utilizado:** `Sumatoria.php`  
**Controlador utilizado:** `Problema2Controller.php`  
**Vista utilizada:** `problema2.php`  
**JavaScript utilizado:** `problema2.js`

### Captura del código

![Problema 2](Captures/Problema2.png)

### Captura de ejecución

![alt text](Captures/problema2-ejecucion.png)

---

## Problema 3: Múltiplos de 4

El usuario ingresa un valor `N` y el sistema muestra los primeros `N` múltiplos de 4.

**Modelo utilizado:** `Multiplos.php`  
**Controlador utilizado:** `Problema3Controller.php`  
**Vista utilizada:** `problema3.php`  
**JavaScript utilizado:** `problema3.js`

### Captura del código

![Problema 3](Captures/Problema3.png)

### Captura de ejecución

![alt text](Captures/problema3-ejecucion.png)

---

## Problema 4: Suma de pares e impares

Este problema calcula por separado la suma de los números pares e impares comprendidos entre dos valores ingresados por el usuario.

**Modelo utilizado:** `SumaParesImpares.php`  
**Controlador utilizado:** `Problema4Controller.php`  
**Vista utilizada:** `problema4.php`  
**JavaScript utilizado:** `problema4.js`

### Captura del código

![Problema 4](Captures/Problema4.png)

### Captura de ejecución

![alt text](Captures/problema4-ejecucion.png)

---

## Problema 5: Clasificador de edades

El usuario ingresa la edad de cinco personas. Cada edad se clasifica en niño, adolescente, adulto o adulto mayor. Además, se generan estadísticas de edades repetidas y una gráfica por categorías.

**Modelo utilizado:** `ClasificadorEdades.php`  
**Controlador utilizado:** `Problema5Controller.php`  
**Vista utilizada:** `problema5.php`  
**JavaScript utilizado:** `problema5.js`

### Captura del código

![Problema 5](Captures/Problema5.png)

### Captura de ejecución

![alt text](Captures/problema5-ejecucion.png)

---

## Problema 6: Presupuesto hospitalario

El usuario ingresa el presupuesto anual del hospital. El sistema distribuye el presupuesto en tres áreas: Ginecología 40%, Traumatología 35% y Pediatría 25%. También se muestra una gráfica circular en canvas.

**Modelo utilizado:** `PresupuestoHospital.php`  
**Controlador utilizado:** `Problema6Controller.php`  
**Vista utilizada:** `problema6.php`  
**JavaScript utilizado:** `problema6.js`

### Captura del código

![Problema 6](Captures/Problema6.png)

### Captura de ejecución con gráfica circular

![alt text](Captures/problema6-ejecucion.png)

---

## Problema 7: Calculadora de datos estadísticos

El usuario indica cuántas notas desea ingresar. Luego se calculan el promedio, la desviación estándar, la nota mínima y la nota máxima.

**Modelo utilizado:** `Estadistica.php`  
**Controlador utilizado:** `Problema7Controller.php`  
**Vista utilizada:** `problema7.php`  
**JavaScript utilizado:** `problema7.js`

### Captura del código

![Problema 7](Captures/Problema7-1.png)

![Problema 7](Captures/Problema7-2.png)

### Captura de ejecución

![alt text](Captures/problema7-ejecucion.png)

---

## Problema 8: Estación del año

El usuario ingresa una fecha. El sistema identifica la estación del año correspondiente y muestra una imagen representativa.

**Modelo utilizado:** `EstacionAnio.php`  
**Controlador utilizado:** `Problema8Controller.php`  
**Vista utilizada:** `problema8.php`  
**JavaScript utilizado:** `problema8.js`

### Captura del código

![Problema 8](Captures/Problema8.png)

### Captura de ejecución con imagen

![alt text](Captures/problema8-ejecucion.png)

---

## Problema 9: Potencias

El usuario ingresa un número del 1 al 9. El sistema calcula las primeras 15 potencias del número ingresado.

**Modelo utilizado:** `Potencias.php`  
**Controlador utilizado:** `Problema9Controller.php`  
**Vista utilizada:** `problema9.php`  
**JavaScript utilizado:** `problema9.js`

### Captura del código

![Problema 9](Captures/Problema9.png)


### Captura de ejecución

![alt text](Captures/problema9-ejecucion.png)

---

# Conclusiones o reflexiones del equipo

Durante el desarrollo de este mini proyecto se reforzó el uso de estructuras de control en PHP, tales como condicionales, ciclos, arreglos y funciones. También se practicó la programación orientada a objetos mediante clases con métodos estáticos, lo cual permitió separar mejor las responsabilidades de cada parte del sistema.

Una de las principales dificultades fue organizar correctamente los archivos para evitar mezclar la lógica de cálculo con el HTML. Para solucionar esto, se utilizó una estructura MVC simple, separando modelos, controladores, vistas, archivos JavaScript, estilos y utilidades.

También se comprendió la importancia de validar los datos ingresados por el usuario antes de realizar cualquier cálculo. Esto ayuda a evitar errores en la ejecución y mejora la seguridad de la aplicación.

El uso de `fetch` permitió enviar los datos de los formularios al servidor sin recargar completamente la página, haciendo la interacción más dinámica. Además, el uso de gráficas e imágenes ayudó a mejorar la presentación visual de los resultados.

En conclusión, este proyecto permitió aplicar conocimientos fundamentales de desarrollo web, programación en PHP, buenas prácticas de organización, reutilización de código y seguridad básica en aplicaciones web.

---

# Repositorio

Enlace del repositorio:

```text
http
```
