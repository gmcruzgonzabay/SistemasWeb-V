console.log("Archivo estudiante.js cargado");
const buscador = document.getElementById('student-search');

console.log("Buscador encontrado",buscador);

if (buscador) {
    const filas = document.querySelectorAll('[data-student]');
    buscador.addEventListener('input', function () {


        const texto = buscador.value.toLowerCase().trim();
            console.log(texto);

        let visible = 0;

        
        filas.forEach(function (fila) {
            fila.hidden = !fila.textContent.toLowerCase().includes(texto);

            if (!fila.hidden) visible++;

        });

        document.getElementById('no-results').hidden = visible > 0;
        document.getElementById('result-count').textContent = 'Mostrando' + visible + 'de' + filas.length + 'estudiantes';



    });

}