<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(__DIR__ . '/includes/head.php'); ?>
</head>
<body>

<main class="main">
    <div class="form-container">
        <h1 class="form-title">
            <?php echo $GLOBALS['config']['APP']['NAME'] ?>
        </h1>
        <form action="?c=index&m=loadArchive" method="post" enctype="multipart/form-data" class="form">
            <h2 class="form-subtitle">
                Formulario de carga de información
            </h2>
            <div class="input-field-container">
                <i class="material-icons file-icon">insert_drive_file</i>
                <div class="input-field">
                    <input type="text" name="filename" disabled placeholder="examinar..."
                        class="text-field" id="filename">

                    <label class="file-input">
                        Cargar archivo
                        <input type="file" name="uploaded_file" class="file-field" id="uploaded_file">
                    </label>

                    <span class="errors">
                        <?php if (isset($_SESSION['error'])) : ?>
                            <?php echo $_SESSION['error'] ?>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="form-button">
                    Enviar formulario
                </button>
            </div>
        </form>
    </div>
</main>

<script src="./public/js/loadfile.js"></script>

</body>
</html>