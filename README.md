Mini Proyecto – Desarrollo de Software VII
Nombre del Estudiante

[Tu nombre aquí]

Grupo

1GS-133

Fecha

03/06/2026

Descripción

Este proyecto implementa un conjunto de problemas prácticos en PHP con arquitectura MVC, enfocados en cálculos matemáticos, estadísticas, manejo de cadenas, validación de datos y visualización de resultados.

Cada problema se organiza de manera modular con controladores, modelos y vistas independientes, siguiendo buenas prácticas de programación orientada a objetos y separación de responsabilidades.

Problemas Implementados
Estadísticas de Números: Calcula media, mínimo, máximo y desviación estándar de 5 números ingresados por el usuario.
Suma de números del 1 al 1000.
Múltiplos de 4: Genera los primeros N múltiplos y detecta desbordamiento.
Suma de números pares e impares entre 1 y 200.
[Problema 5] (Breve descripción si aplica).
Reparto del presupuesto hospitalario: Distribuye un presupuesto entre Ginecología, Traumatología y Pediatría con barra de visualización.
Estadísticas de Notas: Calcula promedio, mínimo, máximo y desviación estándar de un conjunto de notas.
Estación del Año: Determina la estación según la fecha ingresada, mostrando imagen representativa.
Potencias: Genera las primeras 15 potencias de un número (1-9).
Estructura de Carpetas
MiniProyecto/
│
├─ app/
│   ├─ Controllers/       # Controladores para cada problema
│   ├─ Models/            # Clases utilitarias y funciones de cálculo
│   └─ Views/             # Vistas HTML y layout
│
├─ Public/
│   ├─ Css/               # Archivo general.css unificado
│   ├─ Js/                # Scripts de gráficos
│   └─ Assets/            # Imágenes y recursos
│
├─ index.php              # Entrada principal y menú
└─ README.md              # Documentación del proyecto
Clases Utilitarias
SumaNumeros → Problema 2
SumaParImpar → Problema 4
PresupuestoHospital → Problema 6
Estadistica → Problema 1 y 7
EstacionAnio → Problema 8
Potencia → Problema 9

Estas clases incluyen métodos de validación, cálculo y sanitización de datos para asegurar que los resultados sean correctos y evitar errores en tiempo de ejecución.

Tecnologías Utilizadas
PHP 8.x
HTML5, CSS3, JavaScript
Chart.js para gráficas dinámicas
Google Fonts – Roboto
Servidor local: WAMP / XAMPP
Cómo Ejecutar
Coloca el proyecto en tu carpeta de servidor local (htdocs o www).
Inicia el servidor Apache + PHP.

Accede al proyecto desde tu navegador:

http://localhost/MiniProyecto/index.php
Haz clic en cualquier problema para ingresar datos y ver los resultados.
Estilo y Diseño
Menú principal con botones grandes y gradientes.
Tarjetas (.tarjeta) para formularios y resultados.
Tablas estilizadas y responsivas.
Botón “Volver al menú” consistente en todas las vistas.
Tarjetas y formularios con sombras suaves, bordes redondeados y efecto hover.
Observaciones
Se utiliza un CSS global unificado (general.css) para mantener coherencia visual.
La arquitectura MVC permite separar lógica de negocio (Models), control de flujo (Controllers) y presentación (Views).
Cada problema tiene validación de datos y manejo de errores, mostrando mensajes claros al usuario.
