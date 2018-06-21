<!doctype html>
<html lang="es">
 <?php include(__DIR__ . '/includes/head.php'); ?>

<body>
    <main class="main">
        <div class="form-container">
            <h1 class="form-title">
                <?php echo $GLOBALS['config']['APP']['NAME'] ?>
            </h1>
            <div class="body form">
                <div id="backurl">
                    <a href="<?php echo $GLOBALS['config']['APP']['URL'] ?>">
                        <i class="material-icons">arrow_back</i>
                        Volver
                    </a>
                </div>
                <div class="tables-container">
                    <div class="table-container">
                        <h2 class="table-title">Usuarios activos</h2>
                        <table class="table">
                            <thead>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                            </thead>
                            <tbody>
                            <?php
                                $ausers = $_SESSION['activeusers'];

                                foreach($ausers as $auser) : ?>

                                    <tr>
                                        <td><?php print $auser->email ?></td>
                                        <td><?php print $auser->nombre ?></td>
                                        <td><?php print $auser->apellido ?></td>
                                    </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-container">
                        <h2 class="table-title">Usuarios inactivos</h2>
                        <table class="table">
                            <thead>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            </thead>
                            <tbody>
                            <?php
                            $iusers = $_SESSION['inactiveusers'];

                            foreach($iusers as $iuser) : ?>

                                <tr>
                                    <td><?php print $iuser->email ?></td>
                                    <td><?php print $iuser->nombre ?></td>
                                    <td><?php print $iuser->apellido ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-container">
                        <h2 class="table-title">Usuarios en espera</h2>
                        <table class="table">
                            <thead>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            </thead>
                            <tbody>
                            <?php
                            $awusers = $_SESSION['awaitingusers'];

                            foreach($awusers as $awuser) : ?>

                                <tr>
                                    <td><?php print $awuser->email ?></td>
                                    <td><?php print $awuser->nombre ?></td>
                                    <td><?php print $awuser->apellido ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </main>

</body>
</html>