<?php
session_start();
foreach($_POST as $key => $value) {
    $_POST[$key] = trim(htmlspecialchars($value));
}

$error = false;
$border = 'border border-danger';
if (isset($_POST['sujet'], $_POST['nom'], $_POST['prenom'],$_POST['email'], $_POST['phone'],$_POST['message'])) {
    extract($_POST);

    if (empty($nom)) {
        $errorNom = "<small class='text-danger text-italic'>Merci de renseigner un nom </small>";
        $error = true;
    } elseif (strlen($nom) < 2 || strlen($nom) > 50) {
        $errorNom = "<small class='text-danger text-italic'> Votre nom doit être comprit entre 2 et 50 caractères </small>";
        $error = true;
    }

    if (empty($prenom)) {
        $errorPrenom = "<small class='text-danger text-italic'>Merci de renseigner un prenom </small>";
        $error = true;
    } elseif (strlen($prenom) < 2 || strlen($prenom) > 50) {
        $errorPrenom = "<small class='text-danger text-italic'> Votre prénom doit être comprit entre 2 et 50 caractères </small>";
        $error = true;
    }

    if (empty($phone)) {
        $errorPhone = "<small class='text-danger text-italic'> Veuillez renseigner un numéro de téléphone </small>";
        $error = true;
    }

    if (empty($message)) {
        $errorMessage = "<small class='text-danger text-italic'> Veuillez saisir votre message</small>";
        $error = true;
    }

    if (empty($sujet)) {
        $errorSujet = "<small class='text-danger text-italic'> Veuillez selectionner le sujet de votre message</small>";
        $error = true;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "<small class='text-danger text-italic'> Merci de respecter le bon format ex: junior@yahoo.fr</small>";
        $error = true;
    }


    if(!$error) {
        $_SESSION['form'] = $_POST;
        header('Location: thanks.php');
    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contcat us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="text-center my-5 col-7 mx-auto bg-dark p-2 text-white rounded shadow-lg">Contactez-nous</h1>
        <form method="post" class="row g-3 mb-5 col-md-8 col-lg-10 col-xl-10 mx-auto my-2">
            <div class="col-12 col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control <?php if (isset($errorNom)) {
                    echo $border;
                } ?>" id="nom" name="nom" placeholder="Saisir votre nom">
                <?php if (isset($errorNom)) {
                    echo $errorNom;
                }?>
            </div>
            <div class="col-12 col-md-6">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control <?php if (isset($errorPrenom)) {
                    echo $border;
                }?>" id="prenom" name="prenom" placeholder="Saisir votre prénom">
                <?php if (isset($errorPrenom)) {
                    echo $errorPrenom;
                }?>
            </div>

            <div class="col-12 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control <?php if (isset($errorEmail)) {
                    echo $border;
                }?>" id="email" name="email" placeholder="Saisir votre adresse email" value="">
                <?php if (isset($errorEmail)) {
                    echo $errorEmail;
                }?>
            </div>

            <div class="col-12 col-md-6">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="text" class="form-control <?php if (isset($errorPhone)) {
                    echo $border;
                }?>" id="phone" name="phone" placeholder="Saisir votre numéro de téléphone" value="">
                <?php if (isset($errorPhone)) {
                    echo $errorPhone;
                }?>
            </div>

            <div class="col-6">
                <label for="sujet" class="form-label">Sujet</label>
                <select class="form-select <?php if (isset($errorSujet)) {
                    echo $border;
                }?>" id="sujet" name="sujet">
                    <option value="" aria-readonly="">--Selectionner un sujet-</option>
                    <option value="aide">Demande d'aide</option>
                    <option value="remboursement">Demande de rembousement</option>
                    <option value="autre">Autre</option>
                </select>
                <?php if (isset($errorSujet)) {
                    echo $errorSujet;
                }?>
            </div>
            <div class="col-12">
                <label for="message" class="form-label">Votre message</label>
                <textarea class="form-control  <?php if (isset($errorSujet)) {
                    echo $border;
                }?>" placeholder="" name="message" id="message" cols="40" rows="10"></textarea>
                <?php if (isset($errorMessage)) {
                    echo $errorMessage;
                }?>
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-dark">Confirmer</button>
            </div>
        </form>
    </div>
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