<?php
require_once __DIR__ . '/class/conexion.php';
require_once __DIR__ . '/models/estudiante.php';

try {
    $conexion = new conexion();
    $db = $conexion->conectar();
    $modelo = new estudiante($db);
   $estudiantes = $modelo->listar();

   
} catch (PDOException $e) {
    error_log($e->getMessage());
    exit('No se pudo conectar. Revise configuracion y registro');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estudiantes ECOTEC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estudiantes.css" rel="stylesheet">
</head>

<body>
    <header class="site-header py-3">
        <div class="container content d-flex align-items-center gap-3">
            <span class="brand">ECOTEC</span>
            <span class="border-start ps-3 header-label small">Registro académico</span>
        </div>
    </header>
    <main class="container content py-5">
        <div class="page-heading d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <p class="eyebrow mb-2">GESTIÓN ACADÉMICA</p>
                <h1 class="h2 fw-semibold mb-2">Estudiantes</h1>
                <p class="text-secondary mb-0">Consulta el directorio y los datos de contacto.</p>
            </div>
            <span class="count"><?= count($estudiantes) ?> <?= count($estudiantes) === 1 ? 'estudiante' : 'estudiantes' ?></span>
        </div>
        <section class="registry" aria-label="Estudiantes registrados">
            <div class="registry-toolbar d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h2 class="h6 mb-1 fw-semibold">Directorio de estudiantes</h2>
                    <span class="small text-secondary">Información de contacto</span>
                </div>
                <?php if (!empty($estudiantes)): ?>
                    <div class="search">
                        <label for="student-search" class="visually-hidden">Buscar por nombre, correo o ID</label>
                        <input type="search" id="student-search" class="form-control" placeholder="Buscar por nombre, correo o ID…" autocomplete="off" aria-controls="student-rows">
                    </div>
                <?php endif; ?>
            </div>
            <?php if (empty($estudiantes)): ?>
                <div class="text-center px-3 py-5">
                    <h2 class="h6 mb-2">No hay estudiantes registrados</h2>
                    <p class="text-secondary small mb-0">Los estudiantes aparecerán aquí cuando se registren.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <caption class="visually-hidden">Nombre y correo de los estudiantes registrados.</caption>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo electrónico</th>
                            </tr>
                        </thead>
                        <tbody id="student-rows">
                            <?php foreach ($estudiantes as $estudiante): ?>
                                <tr data-student>
                                    <td class="student-id"><?= htmlspecialchars((string) $estudiante['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="student-name">
                                        <div class="d-flex align-items-center gap-3"><span class="student-mark" aria-hidden="true"><?= htmlspecialchars(mb_substr(trim($estudiante['nombre']), 0, 1, 'UTF-8'), ENT_QUOTES, 'UTF-8') ?></span><span class="fw-medium"><?= htmlspecialchars($estudiante['nombre'], ENT_QUOTES, 'UTF-8') ?></span></div>
                                    </td>
                                    <td>
                                        <a class="email" href="mailto:<?= htmlspecialchars($estudiante['correo'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($estudiante['correo'], ENT_QUOTES, 'UTF-8') ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <p id="no-results" class="text-center text-secondary py-5 mb-0" hidden>No se encontraron estudiantes con esa búsqueda.</p>
                <div class="registry-footer" id="result-count" role="status" aria-live="polite">Mostrando <?= count($estudiantes) ?> de <?= count($estudiantes) ?> estudiantes</div>
            <?php endif; ?>
        </section>
    </main>

</body>

</html>