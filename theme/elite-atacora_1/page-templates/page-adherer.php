<?php
/**
 * Template Name: Adhérer
 */
get_header(); ?>

<!-- PAGE HERO -->
<section class="page-hero bg-forest" aria-labelledby="adherer-hero-title">
    <div class="container">
        <div class="page-hero__inner">
            <div class="page-hero__content">
                <span class="eyebrow eyebrow--cream">Adhérer · rejoindre l'ONG</span>
                <h1 id="adherer-hero-title" class="page-hero__title" style="font-family:var(--font-serif);font-size:clamp(2.5rem,5vw,4rem);line-height:1.02;color:var(--cream);margin-top:1.25rem;">
                    Rejoignez
                    <em style="font-style:italic;color:var(--honey)">la communauté Elite Atacora.</em>
                </h1>
                <p class="page-hero__subtitle" style="color:var(--cream);opacity:.85;max-width:540px;margin-top:1.25rem;line-height:1.7;">
                    Adhérer à Elite Atacora, c'est rejoindre une communauté soudée autour d'un idéal commun : bâtir un avenir meilleur pour toutes les femmes et tous les enfants de l'Atacora. Chaque adhésion renforce notre capacité d'action.
                </p>
                <nav class="breadcrumb" aria-label="Fil d'Ariane">
                    <ol>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="color:var(--honey)">Accueil</a></li>
                        <li aria-current="page" style="color:var(--cream)">Adhérer</li>
                    </ol>
                </nav>
                <a href="#formulaire" class="btn btn--primary" style="margin-top:2rem;">Postuler maintenant</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     1. TYPES DE MEMBRES
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="types-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Articles 17 à 20</span>
            <h2 id="types-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Quatre <em style="font-style:italic;color:var(--terracotta)">catégories</em> de membres.
            </h2>
        </div>
        <div class="types-grid">

            <!-- Adhérent·e -->
            <article class="type-card type-card--forest" aria-labelledby="type-adherent">
                <div class="type-card__badge type-card__badge--forest">Le plus courant</div>
                <span class="type-card__article">Article 17</span>
                <h3 id="type-adherent" class="type-card__title" style="font-family:var(--font-serif)">Membre Adhérent·e</h3>
                <p class="type-card__desc">Tout individu qui adhère aux objectifs de l'ONG et s'engage à respecter ses statuts et son règlement intérieur.</p>
                <dl class="type-card__tarifs">
                    <div class="type-card__tarif-row">
                        <dt>Droits d'adhésion</dt>
                        <dd>5 000 FCFA</dd>
                    </div>
                    <div class="type-card__tarif-row">
                        <dt>Cotisation annuelle</dt>
                        <dd>2 000 FCFA</dd>
                    </div>
                </dl>
                <a href="#formulaire" class="btn btn--outline">Postuler</a>
            </article>

            <!-- Actif -->
            <article class="type-card type-card--terracotta" aria-labelledby="type-actif">
                <div class="type-card__badge type-card__badge--terracotta">Engagement renforcé</div>
                <span class="type-card__article">Article 18</span>
                <h3 id="type-actif" class="type-card__title" style="font-family:var(--font-serif)">Membre Actif</h3>
                <p class="type-card__desc">Membre qui s'implique activement dans les activités et projets de l'ONG, au-delà de la simple adhésion.</p>
                <dl class="type-card__tarifs">
                    <div class="type-card__tarif-row">
                        <dt>Droits d'adhésion</dt>
                        <dd>5 000 FCFA</dd>
                    </div>
                    <div class="type-card__tarif-row">
                        <dt>Cotisation annuelle</dt>
                        <dd>2 000 FCFA</dd>
                    </div>
                </dl>
                <a href="#formulaire" class="btn btn--outline">Postuler</a>
            </article>

            <!-- Sympathisant·e -->
            <article class="type-card type-card--honey" aria-labelledby="type-sympathisant">
                <div class="type-card__badge type-card__badge--honey">Soutien souple</div>
                <span class="type-card__article" style="color:var(--coffee)">Article 19</span>
                <h3 id="type-sympathisant" class="type-card__title" style="font-family:var(--font-serif);color:var(--ink)">Membre Sympathisant·e</h3>
                <p class="type-card__desc" style="color:var(--coffee)">Personne physique ou morale qui soutient les valeurs de l'ONG sans s'engager formellement dans ses activités régulières.</p>
                <dl class="type-card__tarifs">
                    <div class="type-card__tarif-row" style="color:var(--coffee)">
                        <dt>Droits d'adhésion</dt>
                        <dd>5 000 FCFA</dd>
                    </div>
                    <div class="type-card__tarif-row" style="color:var(--coffee)">
                        <dt>Cotisation annuelle</dt>
                        <dd>Libre</dd>
                    </div>
                </dl>
                <a href="#formulaire" class="btn btn--outline">Postuler</a>
            </article>

            <!-- Honneur -->
            <article class="type-card type-card--ink" aria-labelledby="type-honneur">
                <div class="type-card__badge type-card__badge--ink">Personnalité distinguée</div>
                <span class="type-card__article" style="color:var(--honey)">Article 20</span>
                <h3 id="type-honneur" class="type-card__title" style="font-family:var(--font-serif);color:var(--cream)">Membre d'Honneur</h3>
                <p class="type-card__desc" style="color:var(--cream);opacity:.85;">Titre décerné par l'Assemblée Générale à des personnes qui ont rendu des services exceptionnels à l'ONG.</p>
                <dl class="type-card__tarifs">
                    <div class="type-card__tarif-row" style="color:var(--cream);opacity:.85;">
                        <dt>Droits d'adhésion</dt>
                        <dd style="color:var(--honey)">Exempté</dd>
                    </div>
                    <div class="type-card__tarif-row" style="color:var(--cream);opacity:.85;">
                        <dt>Cotisation annuelle</dt>
                        <dd style="color:var(--honey)">Exempté</dd>
                    </div>
                </dl>
                <span class="btn btn--ondark" style="opacity:.6;cursor:default;">Sur invitation</span>
            </article>

        </div>
    </div>
</section>

<!-- ============================================================
     2. TARIFS OFFICIELS
     ============================================================ -->
<section class="section bg-paper" aria-labelledby="tarifs-title">
    <div class="container">
        <div class="bg-honey" style="border-radius:1.5rem;padding:3rem;position:relative;overflow:hidden;">
            <div style="max-width:520px;margin-bottom:2.5rem;">
                <span class="eyebrow eyebrow--terracotta">Règlement intérieur</span>
                <h2 id="tarifs-title" style="font-family:var(--font-serif);font-size:clamp(2rem,3.5vw,2.75rem);line-height:1.08;color:var(--ink);margin-top:1.25rem;">
                    Tarifs <em style="font-style:italic;color:var(--terracotta)">officiels.</em>
                </h2>
            </div>
            <div class="pricing-boxes">
                <div class="pricing-box">
                    <span class="pricing-box__amount" style="font-family:var(--font-serif)">5 000</span>
                    <span class="pricing-box__currency">FCFA</span>
                    <span class="pricing-box__label">Droits d'adhésion<br><small>(une seule fois)</small></span>
                </div>
                <div class="pricing-box">
                    <span class="pricing-box__amount" style="font-family:var(--font-serif)">2 000</span>
                    <span class="pricing-box__currency">FCFA</span>
                    <span class="pricing-box__label">Cotisation annuelle<br><small>(renouvelée chaque année)</small></span>
                </div>
                <div class="pricing-box">
                    <span class="pricing-box__amount" style="font-family:var(--font-serif)">24 000</span>
                    <span class="pricing-box__currency">FCFA</span>
                    <span class="pricing-box__label">Cotisation sur 10 ans<br><small>(tarif préférentiel)</small></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     3. PROCESSUS
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="processus-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Comment adhérer</span>
            <h2 id="processus-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Quatre étapes, <em style="font-style:italic;color:var(--terracotta)">simples et claires.</em>
            </h2>
        </div>
        <div class="process-grid">
            <div class="process-card">
                <div class="process-card__num" style="font-family:var(--font-serif)">01</div>
                <h3 class="process-card__title" style="font-family:var(--font-serif)">Remplir le formulaire</h3>
                <p class="process-card__body">Complétez le formulaire d'adhésion en ligne ci-dessous avec vos informations personnelles et le type de membership souhaité.</p>
            </div>
            <div class="process-card">
                <div class="process-card__num" style="font-family:var(--font-serif)">02</div>
                <h3 class="process-card__title" style="font-family:var(--font-serif)">Recevoir l'avis du BE</h3>
                <p class="process-card__body">Le Bureau Exécutif examine votre candidature et vous notifie de sa décision dans un délai maximum de 7 jours ouvrables.</p>
            </div>
            <div class="process-card">
                <div class="process-card__num" style="font-family:var(--font-serif)">03</div>
                <h3 class="process-card__title" style="font-family:var(--font-serif)">Régler les droits</h3>
                <p class="process-card__body">Suite à l'avis favorable, vous réglez les droits d'adhésion (5 000 FCFA) et la cotisation annuelle (2 000 FCFA) en agence.</p>
            </div>
            <div class="process-card">
                <div class="process-card__num" style="font-family:var(--font-serif)">04</div>
                <h3 class="process-card__title" style="font-family:var(--font-serif)">Recevoir votre carte</h3>
                <p class="process-card__body">Vous recevez votre carte de membre officielle qui vous donne accès à tous les droits et avantages liés à votre catégorie d'adhésion.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     4. FORMULAIRE
     ============================================================ -->
<section class="section bg-paper" id="formulaire" aria-labelledby="formulaire-title">
    <div class="container">
        <div class="form-split">

            <!-- Aside info -->
            <aside class="form-split__aside" style="background:var(--forest);border-radius:1.25rem;padding:2.5rem;">
                <span class="eyebrow eyebrow--cream">Formulaire d'adhésion</span>
                <h2 id="formulaire-title" style="font-family:var(--font-serif);font-size:clamp(1.75rem,3vw,2.5rem);line-height:1.1;color:var(--cream);margin-top:1rem;">
                    Quelques minutes <em style="font-style:italic;color:var(--honey)">suffisent.</em>
                </h2>
                <ul class="form-split__checklist">
                    <li class="form-split__check-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--honey)" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/><path d="M8 12l3 3 5-5"/>
                        </svg>
                        <span style="color:var(--cream)">Processus 100% confidentiel</span>
                    </li>
                    <li class="form-split__check-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--honey)" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/><path d="M8 12l3 3 5-5"/>
                        </svg>
                        <span style="color:var(--cream)">Réponse du Bureau Exécutif sous 7 jours</span>
                    </li>
                    <li class="form-split__check-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--honey)" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/><path d="M8 12l3 3 5-5"/>
                        </svg>
                        <span style="color:var(--cream)">Carte de membre remise en main propre</span>
                    </li>
                </ul>
                <div style="margin-top:2rem;padding-top:2rem;border-top:1px solid rgba(255,255,255,.15);">
                    <p style="color:var(--cream);opacity:.75;font-size:.875rem;line-height:1.7;">
                        Une question avant de postuler ?<br>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="color:var(--honey)">Contactez-nous directement →</a>
                    </p>
                </div>
            </aside>

            <!-- Form -->
            <div class="form-split__form">
                <?php if (function_exists('wpcf7_get_tag')) :
                    echo do_shortcode('[wpcf7 id="adhesion" title="Formulaire adhésion"]');
                else : ?>
                <form class="elite-form" action="#formulaire" method="post" novalidate aria-label="Formulaire d'adhésion">
                    <?php wp_nonce_field('elite_adhesion', '_adhesion_nonce'); ?>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="adh-prenom" class="form-label">Prénom <span aria-hidden="true">*</span></label>
                            <input type="text" id="adh-prenom" name="prenom" class="form-input" required autocomplete="given-name" placeholder="Votre prénom">
                        </div>
                        <div class="form-group">
                            <label for="adh-nom" class="form-label">Nom <span aria-hidden="true">*</span></label>
                            <input type="text" id="adh-nom" name="nom" class="form-input" required autocomplete="family-name" placeholder="Votre nom de famille">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="adh-email" class="form-label">Adresse e-mail <span aria-hidden="true">*</span></label>
                        <input type="email" id="adh-email" name="email" class="form-input" required autocomplete="email" placeholder="votre@email.com">
                    </div>

                    <div class="form-group">
                        <label for="adh-tel" class="form-label">Téléphone</label>
                        <input type="tel" id="adh-tel" name="telephone" class="form-input" autocomplete="tel" placeholder="(+229) 01 XX XX XX XX">
                    </div>

                    <div class="form-group">
                        <p class="form-label">Type d'adhésion <span aria-hidden="true">*</span></p>
                        <div class="form-type-selector" role="group" aria-label="Choisissez votre type d'adhésion">
                            <button type="button" class="form-type-btn" data-value="adherent" aria-pressed="false">Adhérent·e</button>
                            <button type="button" class="form-type-btn" data-value="actif" aria-pressed="false">Actif</button>
                            <button type="button" class="form-type-btn" data-value="sympathisant" aria-pressed="false">Sympathisant·e</button>
                            <button type="button" class="form-type-btn" data-value="honneur" aria-pressed="false">D'honneur</button>
                        </div>
                        <input type="hidden" name="type_adhesion" id="adh-type" required>
                    </div>

                    <div class="form-group">
                        <label for="adh-motivation" class="form-label">Motivation <span aria-hidden="true">*</span></label>
                        <textarea id="adh-motivation" name="motivation" class="form-textarea" rows="5" required placeholder="Dites-nous pourquoi vous souhaitez rejoindre Elite Atacora..."></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox" name="privacy" required>
                            <span>J'accepte que mes données soient traitées conformément à la <a href="<?php echo esc_url(home_url('/politique-de-confidentialite/')); ?>">politique de confidentialité</a> d'Elite Atacora. <span aria-hidden="true">*</span></span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn--primary" style="width:100%;">
                        Envoyer ma candidature
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true" style="margin-left:.5rem;">
                            <path d="M2 8h12M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     5. FAQ
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="faq-title">
    <div class="container container--narrow">
        <div style="text-align:center;max-width:600px;margin:0 auto 3rem;">
            <span class="eyebrow eyebrow--terracotta">Questions fréquentes</span>
            <h2 id="faq-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Tout savoir avant <em style="font-style:italic;color:var(--terracotta)">d'adhérer.</em>
            </h2>
        </div>

        <?php
        $faqs = [
            [
                'q' => 'Quelle est la différence entre membre adhérent·e et membre actif ?',
                'a' => 'Le membre adhérent·e souscrit aux valeurs de l\'ONG et verse sa cotisation annuelle. Le membre actif, en plus de ces obligations, s\'implique directement et régulièrement dans les activités et projets de l\'organisation, en participant aux réunions, aux actions terrain et aux prises de décision.',
            ],
            [
                'q' => 'Le paiement des droits d\'adhésion est-il possible en ligne ?',
                'a' => 'Non. Conformément aux procédures actuelles de l\'ONG, le règlement des droits d\'adhésion (5 000 FCFA) et de la cotisation annuelle (2 000 FCFA) s\'effectue exclusivement en agence ou auprès d\'un représentant du Bureau Exécutif, après réception de l\'avis favorable.',
            ],
            [
                'q' => 'Que se passe-t-il si je ne règle pas ma cotisation annuelle ?',
                'a' => 'Conformément aux statuts (Article 17), le non-paiement de la cotisation annuelle après mise en demeure peut entraîner la suspension puis l\'exclusion du membre. Un délai de régularisation est toujours accordé avant toute décision de radiation.',
            ],
            [
                'q' => 'Puis-je participer aux activités de l\'ONG sans adhérer ?',
                'a' => 'Oui, dans certaines conditions. Des bénévoles ponctuels peuvent participer à des événements spécifiques sur invitation. Cependant, pour une implication régulière et pour bénéficier des droits liés à la qualité de membre, l\'adhésion formelle est requise.',
            ],
        ];
        ?>
        <div class="faq-list" role="list">
            <?php foreach ($faqs as $i => $faq) : ?>
            <div class="faq-item" role="listitem">
                <button class="faq-btn" aria-expanded="false" aria-controls="faq-body-<?php echo esc_attr($i); ?>" type="button">
                    <span class="faq-btn__q"><?php echo esc_html($faq['q']); ?></span>
                    <span class="faq-btn__icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M6 9l6 6 6-6"/>
                        </svg>
                    </span>
                </button>
                <div class="faq-body" id="faq-body-<?php echo esc_attr($i); ?>" hidden>
                    <p><?php echo esc_html($faq['a']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
