# Guía de validaciones con JavaScript

El formulario está en `index.html`, los estilos en `css/styles.css` y el archivo `js/app.js` está vacío para desarrollar la práctica.

## Preparación

Agrega esta línea dentro de `<head>` en `index.html` cuando empieces a programar:

```html
<script src="js/app.js" defer></script>
```

El formulario tiene `novalidate`, por lo que el navegador no muestra automáticamente sus avisos al enviar. Los atributos HTML como `required`, `min` y `pattern` siguen definidos como referencia y pueden consultarse desde JavaScript.

El botón `validar` es de tipo `button`: debes escuchar su evento `click`. Actualmente no envía datos.

## Campos e identificadores

| Campo | ID | Obtener dato | Qué validar | ID del mensaje de error |
| --- | --- | --- | --- | --- |
| Nombre completo | `nombre` | `.value.trim()` | Obligatorio; entre 3 y 80 caracteres después de quitar espacios externos. | `error-nombre` |
| Correo electrónico | `correo` | `.value.trim()` | Obligatorio; formato de correo válido. Puedes consultar `.validity.typeMismatch`. | `error-correo` |
| Edad | `edad` | `.value` y `.valueAsNumber` | Obligatoria; número entero entre 18 y 100. Comprueba primero que no esté vacía. | `error-edad` |
| País | `pais` | `.value` | Selección obligatoria; el valor no debe ser `""`. | `error-pais` |
| Contraseña | `clave` | `.value` | Obligatoria; mínimo 8 caracteres, al menos una mayúscula, una minúscula y un número. No uses `trim()` en contraseñas. | `error-clave` |
| Confirmar contraseña | `confirmar` | `.value` | Obligatoria; debe coincidir exactamente con `clave`. | `error-confirmar` |
| Nombre de usuario | `usuario` | `.value` | Obligatorio; de 4 a 20 caracteres. Solo letras sin tildes, números y guion bajo. | `error-usuario` |
| Aceptar términos | `terminos` | `.checked` | Debe ser `true`. En un checkbox se valida `.checked`, no `.value`. | `error-terminos` |

Los textos de ayuda usan IDs con el prefijo `ayuda-`, por ejemplo `ayuda-nombre` y `ayuda-clave`. El checkbox `terminos` solo tiene un mensaje de error asociado.

## Otros elementos

| Elemento | ID o selector | Uso en JavaScript |
| --- | --- | --- |
| Formulario | `formulario` | Acceder a los campos y escuchar el evento `reset`. |
| Botón de validación | `validar` | Escuchar `click` y ejecutar las validaciones. |
| Resultado general | `resultado` | Mostrar un resumen. Empieza oculto con `hidden`. |
| Botón de limpieza | `button[type="reset"]` | Limpia los valores de forma nativa. Añade limpieza de mensajes y clases en el evento `reset` del formulario. |

## Ejemplo inicial: validar el nombre

Este ejemplo se escribe en `js/app.js`. Valida únicamente el nombre; no sustituye las validaciones de los demás campos.

```js
const nombre = document.getElementById('nombre');
const errorNombre = document.getElementById('error-nombre');
const validar = document.getElementById('validar');

validar.addEventListener('click', function () {
  const texto = nombre.value.trim();
  let mensaje = '';

  if (texto === '') {
    mensaje = 'Escribe tu nombre.';
  } else if (texto.length < 3 || texto.length > 80) {
    mensaje = 'El nombre debe tener entre 3 y 80 caracteres.';
  }

  const tieneError = mensaje !== '';

  errorNombre.textContent = mensaje;
  nombre.classList.toggle('is-invalid', tieneError);
  nombre.classList.toggle('is-valid', !tieneError);
  nombre.setAttribute('aria-invalid', String(tieneError));

  if (tieneError) {
    nombre.focus();
  }
});
```

Bootstrap muestra el mensaje `.invalid-feedback` cuando el campo tiene la clase `is-invalid`. Usa `textContent` para escribir mensajes.

## Orden sugerido para la clase

1. Obtener los elementos con `document.getElementById()`.
2. Escuchar el evento `click` de `validar`.
3. Comprobar campos vacíos.
4. Validar longitudes, formato del correo y rango de edad.
5. Validar la contraseña y comparar la confirmación.
6. Revisar el país y la aceptación de términos.
7. Mostrar mensajes y aplicar `is-invalid` o `is-valid`.
8. Mostrar el resumen en `resultado` y enfocar el primer campo incorrecto.
9. Añadir validación al salir de un campo con `blur` o al modificarlo con `input` y `change`.
10. Limpiar mensajes, clases y `aria-invalid` cuando se reinicie el formulario.

Para mostrar el resultado general:

```js
const resultado = document.getElementById('resultado');

resultado.hidden = false;
resultado.className = 'alert alert-success';
resultado.textContent = 'Todos los campos son válidos.';
```

Usa `alert-danger` si existen errores. Muestra éxito únicamente cuando todos los campos pasen sus validaciones.

## Datos para probar

| Campo | Ejemplo válido | Ejemplo inválido |
| --- | --- | --- |
| Nombre | `Ana Torres` | `Al` |
| Correo | `ana@example.com` | `ana@` |
| Edad | `22` | `17`, `101` o `22.5` |
| País | `Ecuador` | Opción inicial sin selección |
| Contraseña | `Ejemplo2026` | `ejemplo` |
| Confirmación | Mismo valor de `clave` | Un valor distinto |
| Usuario | `ana_torres` | `ana torres` |
| Términos | Marcados | Sin marcar |

Esta práctica valida en el navegador. En una aplicación real también se comprueban los datos en el servidor.
