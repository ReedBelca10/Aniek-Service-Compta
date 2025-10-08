<?php
// ************************************************************
// ÉTAPE SÉCURITÉ: LE MOT DE PASSE EST MAINTENANT HACHÉ (HASH)
// COLLEZ VOTRE HASH GÉNÉRÉ À LA PLACE DE L'EXEMPLE CI-DESSOUS !
// ************************************************************
$hashed_password_correct = '$2y$10$6WXaLUe.Fk63gN3GEJVzo.nEfk6.xkmliWt5drOK3NQ6.LpACUZW2'; 

// Initialisation de la variable de message d'erreur
$error_message = "";

// Vérification de la tentative de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Logique de déconnexion si l'utilisateur clique sur Déconnexion
    if (isset($_POST['logout'])) {
        session_start();
        session_destroy();
        header('Location: partners.php');
        exit;
    }
    
    // Logique de connexion
    $entered_password = isset($_POST['partner-password']) ? $_POST['partner-password'] : '';

    // Utilisation de password_verify() pour vérifier le mot de passe
    if (password_verify($entered_password, $hashed_password_correct)) {
        // Succès : Démarrer la session et marquer l'utilisateur comme connecté
        session_start();
        $_SESSION['authenticated'] = true;
        // Rediriger pour éviter que l'utilisateur ne soumette à nouveau le formulaire
        header('Location: partners.php');
        exit;
    } else {
        $error_message = "Mot de passe incorrect. Veuillez réessayer.";
    }
}

// Vérification de l'état de connexion (doit être appelée avant tout HTML)
session_start();
$is_authenticated = isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès Partenaires</title>
    <link rel="stylesheet" href="styles.css">
    </head>
<body>

<nav class="nav_menu">
    <div class="partner-link">
        <a href="partners.php" title="Accès Partenaires" aria-label="Partenaires">PARTENAIRES</a>
    </div>
    <ul>
        <li><a href="index.html#togo" title="Afficher les services au Togo" aria-label="Togo"><img src="image/togo.png" alt="TOGO" class="flag"></a></li>
        <li><a href="index.html#mali" title="Afficher les services au Mali" aria-label="Mali"><img src="image/drapoMali.png" alt="MALI" class="flag"></a></li>
        <li><a href="index.html#cote-d-ivoire" title="Afficher les services en Côte d'Ivoire" aria-label="Côte d'Ivoire"> <img src="image/CI.png" alt="CÔTE D’IVOIRE" class="flag"></a></li>
        <li><a href="index.html#brukina-faso" title="Afficher les services au brukina-faso" aria-label="brukina-faso"><img src="image/burkina-faso.jpg" alt="burkina-faso" class="flag"></a></li>
        <li><a href="index.html#niger" title="Afficher les services au niger" aria-label="niger"><img src="image/niger.jpg" alt="niger" class="flag"></a></li>
    </ul>
</nav>

<main>

<?php if (!$is_authenticated): ?>
<section id="partners-login">
    <div class="login-container">
        <h2>Accès Partenaires</h2>
        <p>Veuillez entrer le mot de passe pour accéder à la liste complète de nos partenaires.</p>
        
        <?php if ($error_message): ?>
            <p id="login-message" style="display: block; color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        
        <form method="POST" action="partners.php">
            <label for="partner-password">Mot de passe :</label>
            <input type="password" id="partner-password" name="partner-password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</section>

<?php else: ?>
<section id="partners-content" class="country">
    <h2>NOS PARTENAIRES PRIVÉS</h2> 
    <div class="companies">
        
        <div class="company">
            <a href="https://as-pl.com/fr/cms/front/contact" target="_blank"><img src="image/AS-pl.jpg" alt="AS-PL"></a>
        </div>
        <div class="company">
            <a href="https://web.tecalliance.net/tecdoc/fr/home " target="_blank"><img src="image/Tecalliance.jpg" alt="Tecalliance"></a>
        </div>
        <div class="company">
            <a href="http://www.difcaa.com/" target="_blank"><img src="image/Difcaa.jpg" alt="Difcaa"></a>
        </div>
        <div class="company">
            <a href="http://www.av10.eu/ " target="_blank"><img src="image/AV-10.jpg" alt="av10"></a>
        </div>
        <div class="company">
            <a href="https://www.varta-automotive.com" target="_blank"><img src="image/vatar.jpg" alt="varta-automotive"></a>
        </div>
        <div class="company">
            <a href="https://www.deer-online.com/" target="_blank"><img src="image/Deer.jpg" alt="Deer"></a>
        </div>
        <div class="company">
            <a href="https://equipauto.mybadgeonline.com" target="_blank"><img src="image/Equipauto.jpg" alt="Equipauto"></a>
        </div>
        <div class="company">
            <a href="https://www.vindecoderz.com/" target="_blank"><img src="image/vin-decoderz-logo-alt.svg" alt="vin-decoderz"></a>
        </div>
        <div class="company">
            <a href="https://fr.ridex.eu/" target="_blank"><img src="image/logo-ridex-white-bw (1).svg" alt="ridex"></a>
        </div>
        <div class="company">
            <a href="https://app.j360.info/#/my-monitoring" target="_blank"><img src="image/j360.svg" alt="j360"></a>
        </div>
       <div class="company">
            <a href="https://fr.ridex.eu/" target="_blank"><img src="image/logo-ridex-white-bw (1).svg" alt="ridex"></a>
        </div>
        <div class="company">
            <a href="https://app.j360.info/#/my-monitoring" target="_blank"><img src="image/j360.svg" alt="j360"></a>
        </div>
        
    </div> <form method="POST" action="partners.php"> 
        <input type="hidden" name="logout" value="1">
        <button type="submit" style="background-color: #555;">Déconnexion</button>
    </form>
</section>

<section class="enterprise-page">
        <h2>NOS COMPAGNIES </h2>
        <div class="services">
                <div class="service">
                    <a href="https://www.aniekgroup.com/" target="_blank"><img src="image/ANIEKGROUP.webp" alt="ANIEKGROUP"></a></div>

                <div class="service">
                    <a href="https://www.aptint.com/fr" target="_blank"><img src="image/apt.jpeg" alt="APT"></a></div>

                <div class="service">
                    <a href="https://www.companyweb.be/fr/0676771374/kbs-construct" target="_blank"><img src="image/kbsc.jpg" alt="KBSC"></a></div>

                <div class="service">
                    <a href="https://www.keinagroup.com/" target="_blank"><img src="image/keinagroup.jpeg" alt="keinagroup"></a></div>

                <div class="service">
                    <a href="https://" target="_blank"><img src="image/anuba.jpg" alt="ANUBA"></a></div>

                
            </div>
        </section>
<?php endif; ?>

</main>
</body>
</html>