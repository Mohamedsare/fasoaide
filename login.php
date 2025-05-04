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

// Si l'utilisateur est déjà connecté, rediriger vers le tableau de bord
if ($auth->isLoggedIn()) {
    header('Location: dashboard.php');
    exit();
}

// Traitement du formulaire de connexion
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyage des données
    $email = $utils->sanitize($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    // Validation des données
    if (empty($email)) {
        $errors['email'] = "L'email est requis";
    }

    if (empty($password)) {
        $errors['password'] = "Le mot de passe est requis";
    }

    // Si aucune erreur, procéder à la connexion
    if (empty($errors)) {
        if ($auth->login($email, $password)) {
            // Si "Se souvenir de moi" est coché, créer un cookie
            if ($remember) {
                $token = bin2hex(random_bytes(32));
                setcookie('remember_token', $token, time() + 60 * 60 * 24 * 30, '/'); // 30 jours

                // Stocker le token en base de données
                $user->updateRememberToken($auth->getUser()['id'], $token);
            }

            // Rediriger vers la page demandée ou le tableau de bord par défaut
            $redirect = $_GET['redirect'] ?? 'dashboard.php';
            header('Location: ' . $redirect);
            exit();
        } else {
            $errors['general'] = "Email ou mot de passe incorrect";
        }
    }
}

// Vérifier si un cookie "remember me" existe
if (empty($_POST) && isset($_COOKIE['remember_token'])) {
    $user = $user->getUserByRememberToken($_COOKIE['remember_token']);

    if ($user) {
        $auth->login($user['email'], '', true); // Passer true pour ignorer la vérification du mot de passe
        header('Location: dashboard.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FasoAide</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Connexion</h2>

                        <?php if (isset($_GET['registered'])): ?>
                            <div class="alert alert-success">Inscription réussie ! Veuillez vous connecter.</div>
                        <?php endif; ?>

                        <?php if (isset($_GET['logout'])): ?>
                            <div class="alert alert-info">Vous avez été déconnecté avec succès.</div>
                        <?php endif; ?>

                        <?php if (isset($_GET['expired'])): ?>
                            <div class="alert alert-warning">Votre session a expiré. Veuillez vous reconnecter.</div>
                        <?php endif; ?>

                        <?php if (!empty($errors['general'])): ?>
                            <div class="alert alert-danger"><?= $errors['general'] ?></div>
                        <?php endif; ?>

                        <form method="post"
                            action="login.php<?= isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : '' ?>">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                    class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email"
                                    name="email" value="<?= htmlspecialchars($email ?? '') ?>">
                                <?php if (isset($errors['email'])): ?>
                                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                <?php endif; ?>
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

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" name="login" class="btn btn-primary btn-lg">Se connecter</button>
                            </div>

                            <div class="text-center mb-3">
                                <a href="forgot_password.php">Mot de passe oublié ?</a>
                            </div>
                        </form>

                        <div class="mt-4 text-center">
                            <p>Pas encore de compte ? <a href="register.php">Inscrivez-vous</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>