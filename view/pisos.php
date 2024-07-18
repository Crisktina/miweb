<?php 
session_start(); 
if (!isset($_SESSION['username'])){
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agencia Pisos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="../index.php">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav  me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">registre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pisos.php">Pisos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="noupis.php">Alta Pis</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav  me-auto">
                <?php
                session_start(); 
                if (!isset(($_SESSION['username']))){
                ?>
                    <li class="nav-item">
                        <a href="../index.php">Login</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item"><p class="text-white mx-4">¡Hola <?= $_SESSION['username']; ?>!</p></li>
                    <li class="nav-item">
                        <a href="../includes/logout.php">Logout</a>
                    </li>
                    <?php } ?>
                </ul>


            </div>
        </div>
    </div>
</nav>
<div class="container mt-3">
    <h2>Pisos</h2>
    <div class="float-end"><a href="../includes/generatePdf.php"><button class="btn btn-primary">Generate PDF</button></a> </div>
   <table class="table table-striped">
       <thead>
       <tr>
           <th>Identifador pis</th>
           <th>Tipus</th>
           <th>Num. habitacions</th>
           <th>Num. Lavabos</th>
       </tr>
       </thead>
       
       <?php
       include_once '../includes/show-pisos.php';
        foreach ($pisos as $pis): ?>
        <tr>
           <td><?= htmlspecialchars($pis['uidpis']); ?></td>
           <td><?php if (htmlspecialchars($pis['tipus'])==1){echo 'Venta';} else {echo 'Lloguer';} ?></td>
           <td><?= htmlspecialchars($pis['numHabitacions']); ?></td>
           <td><?= htmlspecialchars($pis['numLavabos']); ?></td>
       </tr>
       <?php endforeach; ?>
   </table>
</div>
</body>
</html>