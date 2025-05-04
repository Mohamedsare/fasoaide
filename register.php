<?php
require_once 'classes/Database.php';
require_once 'classes/User.php';
require_once 'classes/Utils.php';
require_once 'classes/Auth.php';

// Initialisation des classes
$db = new Database();
$user = new User();
$utils = new Utils();
$auth = new Auth();

// Traitement du formulaire d'inscription
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyage des données
    $data = [
        'username' => $utils->sanitize($_POST['username'] ?? ''),
        'email' => $utils->sanitize($_POST['email'] ?? ''),
        'password' => $_POST['password'] ?? '',
        'password_confirm' => $_POST['password_confirm'] ?? '',
        'first_name' => $utils->sanitize($_POST['first_name'] ?? ''),
        'last_name' => $utils->sanitize($_POST['last_name'] ?? '')
    ];

    // Validation des données
    if (empty($data['username'])) {
        $errors['username'] = "Le nom d'utilisateur est requis";
    } elseif (strlen($data['username']) < 3) {
        $errors['username'] = "Le nom d'utilisateur doit contenir au moins 3 caractères";
    }

    if (empty($data['email'])) {
        $errors['email'] = "L'email est requis";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'email n'est pas valide";
    } elseif ($user->emailExists($data['email'])) {
        $errors['email'] = "Cet email est déjà utilisé";
    }

    if (empty($data['password'])) {
        $errors['password'] = "Le mot de passe est requis";
    } elseif (strlen($data['password']) < 6) {
        $errors['password'] = "Le mot de passe doit contenir au moins 6 caractères";
    } elseif ($data['password'] !== $data['password_confirm']) {
        $errors['password_confirm'] = "Les mots de passe ne correspondent pas";
    }

    // Si aucune erreur, procéder à l'inscription
    if (empty($errors)) {
        if ($user->register($data)) {
            $success = true;
            
            // Connecter automatiquement l'utilisateur après inscription
            $auth->login($data['email'], $data['password']);
            
            // Rediriger vers le tableau de bord
            header('Location: dashboard.php');
            exit();
        } else {
            $errors['general'] = "Une erreur s'est produite lors de l'inscription";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - FasoAide</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Créer un compte</h2>

                        <?php if (!empty($errors['general'])): ?>
                        <div class="alert alert-danger"><?= $errors['general'] ?></div>
                        <?php endif; ?>

                        <form method="post" action="register.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>"
                                    id="username" name="username"
                                    value="<?= htmlspecialchars($data['username'] ?? '') ?>">
                                <?php if (isset($errors['username'])): ?>
                                <div class="invalid-feedback"><?= $errors['username'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                    class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email"
                                    name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>">
                                <?php if (isset($errors['email'])): ?>
                                <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="first_name" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="<?= htmlspecialchars($data['first_name'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="<?= htmlspecialchars($data['last_name'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password"
                                    class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                                    id="password" name="password">
                                <?php if (isset($errors['password'])): ?>
                                <div class="invalid-feedback"><?= $errors['password'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4">
                                <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
                                <input type="password"
                                    class="form-control <?= isset($errors['password_confirm']) ? 'is-invalid' : '' ?>"
                                    id="password_confirm" name="password_confirm">
                                <?php if (isset($errors['password_confirm'])): ?>
                                <div class="invalid-feedback"><?= $errors['password_confirm'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="register" class="btn btn-primary btn-lg">S'inscrire</button>
                            </div>
                        </form>

                        <div class="mt-4 text-center">
                            <p>Déjà un compte ? <a href="login.php">Connectez-vous</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>