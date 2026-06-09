</main><!-- #main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand -->
            <div class="footer-brand">
                <div class="site-logo">
                    <div class="logo-icon">D</div>
                    <div class="logo-text">
                        <span class="name">Daniyal Pharma</span>
                        <span class="tagline">Private Limited</span>
                    </div>
                </div>
                <p class="footer-desc">
                    A B2B pharmaceutical company engaged in the marketing and supply of high-quality branded medicines to hospitals, clinics, and healthcare professionals across India. Established 2020 · Delhi, India.
                </p>
                <div class="social-icons">
                    <a href="#" class="social-icon" aria-label="LinkedIn">in</a>
                    <a href="#" class="social-icon" aria-label="Facebook">f</a>
                    <a href="#" class="social-icon" aria-label="Twitter">𝕏</a>
                    <a href="#" class="social-icon" aria-label="WhatsApp">💬</a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4><?php _e('Quick Links', 'daniyal-pharma'); ?></h4>
                <ul>
                    <?php
                    $links = [
                        'Home'                  => '/',
                        'About Us'              => '/about-us/',
                        'Products'              => '/products/',
                        'Therapeutic Segments'  => '/therapeutic-segments/',
                        'Services'              => '/services/',
                        'Quality Assurance'     => '/quality/',
                        'Blog'                  => '/blog/',
                        'Contact Us'            => '/contact/',
                    ];
                    foreach($links as $label => $url):
                    ?>
                    <li><a href="<?php echo esc_url(home_url($url)); ?>"><?php echo esc_html($label); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Therapeutic Segments -->
            <div class="footer-col">
                <h4><?php _e('Therapeutic Segments', 'daniyal-pharma'); ?></h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/therapeutic-segments/')); ?>">Gastroenterology</a></li>
                    <li><a href="<?php echo esc_url(home_url('/therapeutic-segments/')); ?>">Pain Management</a></li>
                    <li><a href="<?php echo esc_url(home_url('/therapeutic-segments/')); ?>">Antibiotics</a></li>
                    <li><a href="<?php echo esc_url(home_url('/therapeutic-segments/')); ?>">Liver Care</a></li>
                    <li><a href="<?php echo esc_url(home_url('/therapeutic-segments/')); ?>">Nutritional Supplements</a></li>
                    <li><a href="<?php echo esc_url(home_url('/therapeutic-segments/')); ?>">General Medicine</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-col">
                <h4><?php _e('Contact Details', 'daniyal-pharma'); ?></h4>
                <ul>
                    <li>📍 <?php echo esc_html(get_theme_mod('daniyal_address', 'Shop No. 27, Sarai Julaina, Near Mother Dairy, Sukhdev Vihar, New Delhi – 110025')); ?></li>
                    <li>📞 <a href="tel:+918587870997"><?php echo esc_html(get_theme_mod('daniyal_phone', '+91-85878 70997')); ?></a></li>
                    <li>✉️ <a href="mailto:info@daniyalpharma.com"><?php echo esc_html(get_theme_mod('daniyal_email', 'info@daniyalpharma.com')); ?></a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved.', 'daniyal-pharma'); ?> | Registered under RoC Delhi</p>
            <p>CIN: U24231DL2020PTC000000 &nbsp;|&nbsp; <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
