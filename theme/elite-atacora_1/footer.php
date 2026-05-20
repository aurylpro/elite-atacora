</main>

<footer class="site-footer" role="contentinfo">

    <!-- Decorative SVG wave -->
    <div class="footer-deco-wave" aria-hidden="true">
        <svg width="420" height="200" viewBox="0 0 420 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 100 Q80 40 150 100 Q220 160 290 100 Q360 40 420 80" stroke="var(--honey)" stroke-width="1.5" stroke-dasharray="6 5" fill="none" opacity="0.45"/>
            <path d="M30 130 Q100 70 170 130 Q240 190 310 130 Q380 70 420 100" stroke="var(--honey)" stroke-width="1" stroke-dasharray="4 6" fill="none" opacity="0.28"/>
            <path d="M0 70 Q70 10 140 70 Q210 130 280 70 Q350 10 420 50" stroke="var(--honey)" stroke-width="1" stroke-dasharray="3 7" fill="none" opacity="0.20"/>
        </svg>
    </div>
    <div class="footer-deco-halo" aria-hidden="true"></div>

    <!-- ===== NEWSLETTER ===== -->
    <div class="footer__newsletter">
        <div class="footer__newsletter-left">
            <span class="eyebrow eyebrow--honey">Restons en contact</span>
            <h2 class="footer__newsletter-title" style="font-family:var(--font-serif)">
                Soutenez l'Atacora,
                <em style="font-style:italic;color:var(--honey)">une marche à la fois.</em>
            </h2>
        </div>
        <div class="footer__newsletter-right">
            <p class="footer__newsletter-desc">
                Recevez nos actualités, rapports d'activités et appels à bénévoles directement dans votre boîte mail. Sans publicité, sans cession de vos données.
            </p>
            <form class="footer__newsletter-form" action="#" method="post" aria-label="Formulaire d'abonnement à la newsletter">
                <div class="footer__newsletter-row">
                    <label for="footer-email" class="sr-only">Votre adresse e-mail</label>
                    <input type="email" id="footer-email" name="email" class="footer__email-input"
                           placeholder="votre@email.com" required autocomplete="email">
                    <button type="submit" class="footer__subscribe-btn">S'abonner →</button>
                </div>
                <?php wp_nonce_field('elite_newsletter', '_newsletter_nonce'); ?>
            </form>
        </div>
    </div>

    <!-- ===== MAIN GRID ===== -->
    <div class="footer__main">

        <!-- Brand column -->
        <div class="footer__col footer__col--brand">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__brand-logo" aria-label="Elite Atacora – Accueil">
                <span class="footer__brand-circle" aria-hidden="true">
                    <?php
                    $logo_id = get_theme_mod('custom_logo');
                    if ($logo_id) :
                        echo '<img src="' . esc_url(wp_get_attachment_image_url($logo_id, 'thumbnail')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" width="52" height="52" loading="lazy">';
                    else : ?>
                        <svg viewBox="0 0 52 52" fill="none" width="52" height="52">
                            <circle cx="26" cy="26" r="26" fill="var(--forest)"/>
                            <text x="26" y="33" text-anchor="middle" font-family="serif" font-size="20" font-weight="700" fill="var(--honey)">EA</text>
                        </svg>
                    <?php endif; ?>
                </span>
                <div class="footer__brand-text">
                    <span class="footer__brand-name" style="font-family:var(--font-serif)">Elite Atacora</span>
                    <span class="footer__brand-tagline">ONG · Bénin · depuis 2018</span>
                </div>
            </a>
            <p class="footer__brand-desc">
                Organisation Non Gouvernementale apolitique et à but non lucratif, œuvrant pour l'autonomisation des femmes, la scolarisation des enfants et le développement communautaire dans le département de l'Atacora.
            </p>
            <div class="footer__socials" aria-label="Réseaux sociaux">
                <a href="#" class="footer__social-btn" aria-label="Facebook" rel="noopener noreferrer" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                    </svg>
                </a>
                <a href="#" class="footer__social-btn" aria-label="Instagram" rel="noopener noreferrer" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="2" y="2" width="20" height="20" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                    </svg>
                </a>
                <a href="#" class="footer__social-btn" aria-label="LinkedIn" rel="noopener noreferrer" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                        <circle cx="4" cy="4" r="2"/>
                    </svg>
                </a>
                <a href="#" class="footer__social-btn" aria-label="WhatsApp" rel="noopener noreferrer" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- L'ONG column -->
        <div class="footer__col">
            <h3 class="footer__col-title">L'ONG</h3>
            <ul class="footer__nav">
                <li><a href="<?php echo esc_url(home_url('/a-propos/')); ?>" class="footer__nav-link">À propos</a></li>
                <li><a href="<?php echo esc_url(home_url('/gouvernance/')); ?>" class="footer__nav-link">Gouvernance</a></li>
                <li><a href="<?php echo esc_url(home_url('/nos-actions/')); ?>" class="footer__nav-link">Nos actions</a></li>
                <li><a href="<?php echo esc_url(home_url('/adherer/')); ?>" class="footer__nav-link">Adhérer</a></li>
            </ul>
        </div>

        <!-- Ressources column -->
        <div class="footer__col">
            <h3 class="footer__col-title">Ressources</h3>
            <ul class="footer__nav">
                <li><a href="<?php echo esc_url(home_url('/actualites/')); ?>" class="footer__nav-link">Actualités</a></li>
                <li><a href="<?php echo esc_url(home_url('/evenements/')); ?>" class="footer__nav-link">Événements</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="footer__nav-link">Contact</a></li>
                <li><a href="<?php echo esc_url(home_url('/politique-de-confidentialite/')); ?>" class="footer__nav-link">Confidentialité</a></li>
            </ul>
        </div>

        <!-- Contact column -->
        <div class="footer__col footer__col--contact">
            <h3 class="footer__col-title">Contact</h3>
            <ul class="footer__contact">
                <li class="footer__contact-item">
                    <span class="footer__contact-icon" aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </span>
                    <span class="footer__contact-text">Quartier Dassagaté<br>Natitingou, Atacora · Bénin</span>
                </li>
                <li class="footer__contact-item">
                    <span class="footer__contact-icon" aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.46 8.8 19.79 19.79 0 01.39 2.18 2 2 0 012.37.06h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.23-.84a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7a2 2 0 011.72 2z"/>
                        </svg>
                    </span>
                    <span class="footer__contact-text">
                        <a href="tel:+2290194055090" style="color:inherit">(+229) 01 94 05 50 90</a>
                    </span>
                </li>
                <li class="footer__contact-item">
                    <span class="footer__contact-icon" aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </span>
                    <span class="footer__contact-text">
                        <a href="mailto:contact@eliteatacora.org" style="color:inherit">contact@eliteatacora.org</a>
                    </span>
                </li>
            </ul>
        </div>

    </div><!-- /.footer__main -->

    <!-- ===== LEGAL STRIP ===== -->
    <div class="footer__legal">
        <span>© 2026 ONG Elite Atacora · tous droits réservés</span>
        <span>Conformément à la loi n°2025-19 du 22 juillet 2025 · République du Bénin</span>
    </div>

</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
