<?php
session_start();
if(isset($_SESSION['form'])) {
    extract($_SESSION['form']);
} else {
    header('Location: index.php');
    exit();
}
unset($_SESSION['form']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h2 class="display-5 fw-bold">Merci <?php if(isset($prenom)) {
                    echo $prenom;
                }?> de nous avoirr contacté à
                    propos de votre <?php if(isset($sujet)) {
                        echo $sujet;
                    }?>
                </h2>
                <h4>Un de nos conseillers vous contactera soit à l’adresse <?php if(isset($email)) {
                    echo $email;
                }?> ou
                    par téléphone au
                    <?php if(isset($phone)) {
                        echo $phone;
                    }?>
                    dans les plus brefs délais pour traiter votre demande : </h4>
                <p class="col-md-8 fs-4"> <i><?php if(isset($message)) {
                    echo $message;
                }?></i></p>
                <a href="index.php" class="btn btn-primary btn-lg" role="button">Revenir au formulaire</a>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>