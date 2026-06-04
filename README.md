# Mini Proyecto – Desarrollo de Software VII



## Descripción
Este proyecto contiene una serie de problemas prácticos implementados en **PHP** usando arquitectura **MVC (Model-View-Controller)**. Cada problema se centra en cálculos matemáticos, estadísticas, manejo de datos, validación y visualización de resultados mediante tablas, listas y gráficas.

El proyecto está diseñado para ser modular, reutilizable y fácil de mantener.

---

## Problemas Implementados

| # | Nombre | Descripción |
|---|--------|-------------|
| 1 | Estadísticas de Números | Media, mínimo, máximo y desviación estándar de 5 números positivos. |
| 2 | Suma de Números | Suma de los números del 1 al 1000. |
| 3 | Múltiplos de 4 | Genera los primeros N múltiplos y detecta desbordamiento. |
| 4 | Suma Pares e Impares | Suma los números pares e impares entre 1 y 200. |
| 5 | [Problema 5] | Breve descripción de la funcionalidad. |
| 6 | Presupuesto Hospitalario | Reparte presupuesto entre Ginecología, Traumatología y Pediatría con barra de visualización y gráficos. |
| 7 | Estadísticas de Notas | Calcula promedio, mínimo, máximo y desviación de notas ingresadas. |
| 8 | Estación del Año | Determina la estación según la fecha ingresada y muestra imagen representativa. |
| 9 | Potencias | Calcula las primeras 15 potencias de un número del 1 al 9. |

---

## Estructura de Carpetas


MiniProyecto/
│
├─ app/
│ ├─ Controllers/ # Controladores de cada problema
│ ├─ Models/ # Clases utilitarias y funciones de cálculo
│ └─ Views/ # Vistas HTML y layout
│
├─ Public/
│ ├─ Css/ # Archivo general.css unificado
│ ├─ Js/ # Scripts para gráficos
│ └─ Assets/ # Imágenes y recursos
│
├─ index.php # Entrada principal y menú
└─ README.md # Documentación


---

## Clases Utilitarias

- `SumaNumeros` → Problema 2  
- `SumaParImpar` → Problema 4  
- `PresupuestoHospital` → Problema 6  
- `Estadistica` → Problema 1 y 7  
- `EstacionAnio` → Problema 8  
- `Potencia` → Problema 9  

**Funciones incluidas**: Validación de datos, sanitización y manejo de errores para garantizar resultados correctos.

---

## Tecnologías Utilizadas

- **Backend:** PHP 8.x  
- **Frontend:** HTML5, CSS3, JavaScript  
- **Gráficas:** Chart.js (v4.x desde CDN)  
- **Tipografía:** Google Fonts – Roboto  
- **Servidor local:** WAMP / XAMPP  

---

## Cómo Ejecutar

1. Coloca el proyecto en tu carpeta de servidor local (`htdocs` o `www`).  
2. Inicia Apache + PHP en WAMP o XAMPP.  
3. Accede desde el navegador:

http://localhost/MiniProyecto/index.php

4. Selecciona cualquier problema desde el menú para ingresar datos y visualizar resultados.

---

## Diseño y Estilo

- Menú principal con **botones grandes** y gradientes modernos.  
- **Tarjetas** para formularios y resultados con sombras suaves y bordes redondeados.  
- **Tablas** estilizadas y responsivas.  
- **Botón "Volver al menú"** estilizado en todas las vistas.  
- **Gráficas y barras** visuales uniformes con colores diferenciados por categoría.

---

## Observaciones

- Se utiliza un **archivo CSS global** (`general.css`) para mantener coherencia visual.  
- La arquitectura **MVC** permite separar lógica de negocio, control y presentación.  
- Todos los problemas incluyen **validación y manejo de errores** visibles para el usuario.

---

**¡Listo para usar y entregar!**
