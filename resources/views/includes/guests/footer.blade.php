<footer class="main-footer">
    <figure class="footer-o-logo">
        <img src="{{ asset('assets/images/o logo.png') }}" alt="">
    </figure>
    <div class="footer-container">
        <figure class="footer-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="">
        </figure>
        <div class="footer-content">
            <div class="footer-text">
                <p>Echos des communes est le premier site d'informations entièrement dédié à l'actualité des communes du Togo. Animé par une
                    équipe dynamique composée de journalistes aguerris et dévoués, il offre aux internautes et à ses lecteurs, des informations
                    diversifiées et crédibles sur les 117 communes que compte notre cher pays.
                </p>
                <p>Tel: <strong>90745071 / 99082306</strong></p>
                <p>Contactez-nous: <strong>contact@echosdescommunes.com</strong></p>
            </div>
            <div class="footer-links">
                <h3 class="footer-subtitle">Lien vers actualites:</h3>
                <ul>
                    <li><a href="">Développement</a></li>
                    <li><a href="">Santé</a></li>
                    <li><a href="">Education</a></li>
                    <li><a href="">Interview</a></li>
                    <li><a href="">Portrait</a></li>
                    <li><a href="">Economie</a></li>
                    <li><a href="">Environnement</a></li>
                </ul>
            </div>
            <div class="footer-newsletter">
                <h3 class="footer-subtitle">Abonnez à notre newsletter</h3>
                <p>Vous recevrez des notifications mail à chaque nouveauté</p>
                <form action="" method="post">
                    @csrf
                    <div class="footer-form-group">
                        <input type="email" name="newsletter-mail" id="newsletter-mail" placeholder="Adresse mail...">
                        <button type="submit">s'inscrire</button>
                    </div>
                </form>
                <div class="footer-social-network">
                    <a href="" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<footer class="copyright-footer">
    <p>Copyright &copy; 2024 <strong>Echos des Communes.</strong> Tous droits reservés</p>
    <p>Développé par <a href="https://wa.me/22891019245">ID GROUP</a></p>
</footer>

