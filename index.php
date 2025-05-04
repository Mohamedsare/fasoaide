<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FasoAide - Plateforme d'Apprentissage et d'Entraide</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <a href="#"><span class="faso">Faso</span><span class="aide">Aide</span></a>
                </div>
                <div class="menu-toggle" id="mobile-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="nav-list">
                    <li><a href="#" class="nav-link active">Accueil</a></li>
                    <li><a href="#" class="nav-link">Formations</a></li>
                    <li><a href="#" class="nav-link">Forum</a></li>
                    <li><a href="#" class="nav-link">Ressources</a></li>
                    <li><a href="#" class="nav-link">Contact</a></li>
                    <li class="auth-buttons">
                        <a href="login.php" class="btn btn-login">Se connecter</a>
                        <a href="register.php" class="btn btn-signup">S'inscrire</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Slider -->
    <section class="hero-slider">
        <div class="slider-container">
            <div class="slide active"
                style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                <div class="slide-content">
                    <h1>Apprenez sans limites</h1>
                    <p>Accédez à des centaines de formations gratuites dans divers domaines professionnels</p>
                    <a href="#" class="btn btn-primary">Commencer maintenant</a>
                </div>
            </div>
            <div class="slide"
                style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                <div class="slide-content">
                    <h1>Communauté d'entraide</h1>
                    <p>Échangez avec des experts et des pairs pour progresser ensemble</p>
                    <a href="#" class="btn btn-primary">Rejoindre la communauté</a>
                </div>
            </div>
            <div class="slide"
                style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                <div class="slide-content">
                    <h1>Boostez votre carrière</h1>
                    <p>Développez des compétences recherchées sur le marché</p>
                    <a href="#" class="btn btn-primary">Découvrir les formations</a>
                </div>
            </div>
            <div class="slider-controls">
                <button class="prev-slide"><i class="fas fa-chevron-left"></i></button>
                <button class="next-slide"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="slider-dots"></div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number" data-count="12500">0</div>
                    <div class="stat-label">Utilisateurs</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="350">0</div>
                    <div class="stat-label">Formations</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="1200">0</div>
                    <div class="stat-label">Experts</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="98">0</div>
                    <div class="stat-label">% Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Pourquoi choisir FasoAide ?</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Formations gratuites</h3>
                    <p>Accès illimité à toutes nos formations sans frais cachés.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Communauté active</h3>
                    <p>Échangez avec des milliers de membres et des experts.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Certifications</h3>
                    <p>Obtenez des attestations valorisables sur votre CV.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Accessible partout</h3>
                    <p>Apprenez depuis votre smartphone, tablette ou ordinateur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">Catégories populaires</h2>
            <div class="categories-grid">
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Informatique</h3>
                    <p>Développement, réseaux, sécurité informatique</p>
                    <a href="#" class="btn btn-outline">Explorer</a>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Business</h3>
                    <p>Management, entrepreneuriat, marketing</p>
                    <a href="#" class="btn btn-outline">Explorer</a>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3>Design</h3>
                    <p>Graphisme, UX/UI, architecture</p>
                    <a href="#" class="btn btn-outline">Explorer</a>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-language"></i>
                    </div>
                    <h3>Langues</h3>
                    <p>Anglais, français, espagnol, etc.</p>
                    <a href="#" class="btn btn-outline">Explorer</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title">Ce qu'ils disent de nous</h2>
            <div class="testimonials-carousel">
                <div class="testimonial-item active">
                    <div class="testimonial-content">
                        <p>"Grâce à FasoAide, j'ai pu acquérir des compétences en développement web qui m'ont permis de
                            décrocher un emploi stable. La qualité des formations est exceptionnelle!"</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Aminata K.">
                        <div class="author-info">
                            <h4>Aminata K.</h4>
                            <span>Développeuse Web</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"La communauté FasoAide est incroyable. J'ai pu trouver des réponses à toutes mes questions
                            et progresser rapidement dans mon apprentissage du marketing digital."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Ousmane D.">
                        <div class="author-info">
                            <h4>Ousmane D.</h4>
                            <span>Entrepreneur</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"En tant qu'enseignante, j'utilise FasoAide pour me former continuellement. Les ressources
                            sont adaptées à nos réalités locales et très pratiques."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Fatoumata S.">
                        <div class="author-info">
                            <h4>Fatoumata S.</h4>
                            <span>Enseignante</span>
                        </div>
                    </div>
                </div>
                <div class="carousel-controls">
                    <button class="prev-testimonial"><i class="fas fa-chevron-left"></i></button>
                    <button class="next-testimonial"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="carousel-dots"></div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Prêt à commencer votre voyage d'apprentissage ?</h2>
                <p>Rejoignez des milliers d'apprenants et développez vos compétences dès aujourd'hui.</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary btn-large">S'inscrire gratuitement</a>
                    <a href="#" class="btn btn-outline btn-large">Découvrir les formations</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>FasoAide</h3>
                    <p>Plateforme d'apprentissage et d'entraide pour le développement des compétences professionnelles.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Liens rapides</h3>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Formations</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Ressources</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Catégories</h3>
                    <ul>
                        <li><a href="#">Informatique</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Langues</a></li>
                        <li><a href="#">Santé</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Contact</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Ouagadougou, Burkina Faso</li>
                        <li><i class="fas fa-phone"></i> +226 64 71 20 44</li>
                        <li><i class="fas fa-envelope"></i> contact@fasoaide.bf</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 FasoAide. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="js/index.js"></script>
</body>

</html>