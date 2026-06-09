<?php
/**
 * Template Name: Home Page
 * The front page template for Daniyal Pharma.
 */
get_header();
?>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">🏥 Trusted B2B Pharmaceutical Partner</div>
                <h1>Trusted Pharmaceutical Partner for <em>Hospitals & Healthcare Providers</em></h1>
                <p>Delivering high-quality, reliable, and affordable pharmaceutical formulations to healthcare institutions across India. Established 2020 · Delhi, India.</p>
                <div class="btn-group">
                    <a href="<?php echo esc_url(home_url('/products/')); ?>" class="btn btn-primary">💊 View Products</a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-white">📩 Business Inquiry</a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-value">2020</div>
                        <div class="hero-stat-label">Established</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">6+</div>
                        <div class="hero-stat-label">Therapeutic Segments</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">B2B</div>
                        <div class="hero-stat-label">Healthcare Model</div>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-card">
                    <div class="hero-card-icon">🏥</div>
                    <h4>Hospital Supply Network</h4>
                    <p>Direct supply to hospitals, clinics, and healthcare institutions across India</p>
                </div>
                <div class="hero-card">
                    <div class="hero-card-icon">💊</div>
                    <h4>Quality Formulations</h4>
                    <p>Tablets, Capsules, Softgels & Supplements</p>
                </div>
                <div class="hero-card">
                    <div class="hero-card-icon">🧬</div>
                    <h4>6 Therapeutic Segments</h4>
                    <p>Pain, Gastro, Antibiotics, Liver, Nutrition & General Medicine</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- COMPANY STRIP -->
<div class="company-strip">
    <div class="container">
        <div class="strip-inner">
            <div class="strip-item">📅 Established: <strong>2020</strong></div>
            <div class="strip-divider"></div>
            <div class="strip-item">🏭 Industry: <strong>Pharmaceutical</strong></div>
            <div class="strip-divider"></div>
            <div class="strip-item">🤝 Model: <strong>B2B Healthcare Supply</strong></div>
            <div class="strip-divider"></div>
            <div class="strip-item">📍 Location: <strong>Delhi, India</strong></div>
        </div>
    </div>
</div>

<!-- ABOUT PREVIEW -->
<section class="section section--alt about-preview">
    <div class="container">
        <div class="grid-2">
            <div class="about-img-wrap">
                <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('daniyal-card'); ?>
                <?php else: ?>
                    <div class="about-img-placeholder">
                        <div class="icon">🏢</div>
                        <p>Daniyal Pharma<br>Private Limited</p>
                    </div>
                <?php endif; ?>
                <div class="about-badge">
                    <div class="about-badge-icon">✅</div>
                    <div class="about-badge-text">
                        <strong>Quality Assured</strong>
                        <span>B2B Healthcare Supply</span>
                    </div>
                </div>
            </div>
            <div class="about-content">
                <span class="section-label">About Us</span>
                <h2 class="section-title">Committed to Reliable Pharmaceutical Supply</h2>
                <p>Daniyal Pharma Private Limited is a pharmaceutical company engaged in the marketing and supply of branded medicines to hospitals, clinics, and healthcare professionals. Established with a commitment to quality and reliability, we operate on a B2B model focused on consistent healthcare support.</p>
                <p>We specialize in a wide range of pharmaceutical formulations including tablets, capsules, softgel products, and nutritional supplements.</p>
                <ul class="check-list">
                    <li><span class="check-icon">✔</span> Hospital-focused B2B supply model</li>
                    <li><span class="check-icon">✔</span> Reliable pharmaceutical formulations</li>
                    <li><span class="check-icon">✔</span> Wide therapeutic coverage across 6 segments</li>
                    <li><span class="check-icon">✔</span> Quality-driven operations since 2020</li>
                </ul>
                <div class="mt-32">
                    <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="btn btn-outline">Read More About Us →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUCT CATEGORIES -->
<section class="section">
    <div class="container">
        <div class="text-center mb-48">
            <span class="section-label">Our Products</span>
            <h2 class="section-title">Pharmaceutical Product Categories</h2>
            <p class="section-subtitle" style="margin: 0 auto;">We offer a diverse range of pharmaceutical formulations designed to support healthcare professionals in effective patient treatment.</p>
        </div>
        <div class="grid-4">
            <?php
            $categories = [
                ['💊','Tablets','Standard oral solid formulations for a wide range of therapeutic applications.'],
                ['🟡','Capsules','Hard and soft gelatin capsule formulations for precise therapeutic delivery.'],
                ['🔵','Softgel Formulations','Soft gelatin capsules for enhanced bioavailability and patient compliance.'],
                ['🧪','Nutritional Supplements','Vitamins, minerals, and specialty nutraceuticals for health support.'],
            ];
            foreach($categories as $cat): ?>
            <div class="category-card">
                <div class="category-icon"><?php echo $cat[0]; ?></div>
                <h3><?php echo esc_html($cat[1]); ?></h3>
                <p><?php echo esc_html($cat[2]); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-48">
            <a href="<?php echo esc_url(home_url('/products/')); ?>" class="btn btn-primary">View All Products 💊</a>
        </div>
    </div>
</section>

<!-- THERAPEUTIC SEGMENTS -->
<section class="section section--pale">
    <div class="container">
        <div class="text-center mb-48">
            <span class="section-label">Therapeutic Areas</span>
            <h2 class="section-title">Therapeutic Segments We Cover</h2>
            <p class="section-subtitle" style="margin: 0 auto;">Our products support healthcare professionals across multiple medical specialties and clinical areas.</p>
        </div>
        <div class="grid-3">
            <?php
            $segments = [
                ['🩺','Gastroenterology','Acid-related disorders, digestive conditions, peptic ulcers, and gastritis.'],
                ['💊','Pain Management','Musculoskeletal pain, inflammation, post-surgical pain, and injury-related swelling.'],
                ['🦠','Antibiotics & Anti-Infectives','Bacterial, gastrointestinal, and anaerobic infections with targeted antimicrobials.'],
                ['🧪','Nutritional Supplements','Calcium, vitamin deficiencies, immunity support, and general wellness formulations.'],
                ['🧬','Liver Care','Hepatoprotective formulations, gallstone management, and bile flow support.'],
                ['🏥','General Medicine','Common infections, fever, digestive issues, and routine clinical care needs.'],
            ];
            foreach($segments as $seg): ?>
            <div class="segment-card">
                <div class="segment-icon"><?php echo $seg[0]; ?></div>
                <h3><?php echo esc_html($seg[1]); ?></h3>
                <p><?php echo esc_html($seg[2]); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-48">
            <a href="<?php echo esc_url(home_url('/therapeutic-segments/')); ?>" class="btn btn-outline">Explore All Segments →</a>
        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="section section--alt">
    <div class="container">
        <div class="grid-2" style="gap: 64px;">
            <div>
                <span class="section-label">Why Choose Us</span>
                <h2 class="section-title">Why Healthcare Institutions Trust Us</h2>
                <p style="color: var(--text-muted); margin-top: 12px;">We combine product quality, reliable supply, and a customer-focused approach to become a long-term pharmaceutical partner for healthcare institutions.</p>
                <div class="mt-32">
                    <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="btn btn-primary">Learn More About Us</a>
                </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <?php
                $features = [
                    ['Hospital-Focused B2B Model','Specialized supply system designed for hospitals, clinics, and institutional healthcare providers.'],
                    ['Reliable Product Availability','Consistent supply chain ensures medicines are always available when your patients need them.'],
                    ['Quality-Driven Operations','Strict quality control at every stage from sourcing through packaging and distribution.'],
                    ['Wide Therapeutic Coverage','Six major therapeutic segments covering most common hospital and clinical care needs.'],
                    ['Trusted by Healthcare Professionals','Built on trust, transparency, and consistent product performance over time.'],
                    ['Timely & Efficient Supply','Professional logistics and dispatch system ensuring on-time delivery.'],
                ];
                foreach($features as $i => $f): ?>
                <div class="feature-card">
                    <div class="feature-num"><?php echo $i+1; ?></div>
                    <div>
                        <h4><?php echo esc_html($f[0]); ?></h4>
                        <p><?php echo esc_html($f[1]); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- OUR SERVICES -->
<section class="section">
    <div class="container">
        <div class="text-center mb-48">
            <span class="section-label">Our Services</span>
            <h2 class="section-title">Complete Pharmaceutical Supply Solutions</h2>
            <p class="section-subtitle" style="margin: 0 auto;">We provide end-to-end pharmaceutical support to healthcare institutions, distributors, and medical professionals.</p>
        </div>
        <div class="grid-3">
            <?php
            $services = [
                ['🏥','Hospital Medicine Supply',['Consistent supply chain support','Wide range of therapeutic medicines','Hospital-grade packaging standards','Timely delivery system']],
                ['📦','Bulk Pharmaceutical Distribution',['Large volume order handling','Competitive pricing structure','Efficient logistics management','Stable product availability']],
                ['🧾','Institutional Orders',['Customized order fulfillment','Long-term supply agreements','Dedicated account support','Priority dispatch system']],
                ['👨‍⚕️','Doctor & Clinic Supply',['Small and medium order fulfillment','Fast processing and dispatch','Reliable product availability','Professional support system']],
                ['🧪','Pharmaceutical Marketing Support',['Product portfolio management','Supply coordination','Distribution support','Market-based fulfillment']],
                ['🚚','Supply Chain & Logistics',['Safe and efficient delivery','Temperature-controlled storage','Professional logistics network','On-time delivery system']],
            ];
            foreach($services as $svc): ?>
            <div class="service-card">
                <div class="service-icon"><?php echo $svc[0]; ?></div>
                <h3><?php echo esc_html($svc[1]); ?></h3>
                <ul>
                    <?php foreach($svc[2] as $item): ?>
                    <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-48">
            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn-outline">View All Services →</a>
        </div>
    </div>
</section>

<!-- QUALITY ASSURANCE (DARK) -->
<section class="section section--dark">
    <div class="container">
        <div class="quality-inner">
            <div>
                <span class="section-label" style="color: #6BE0B0; background: rgba(26,127,90,0.2); border-color: rgba(26,127,90,0.4);">Quality Assurance</span>
                <h2 class="section-title" style="color: white;">Quality is the Foundation of Everything We Do</h2>
                <p style="color: rgba(255,255,255,0.75); margin-top: 12px;">We ensure strict quality control at every stage of sourcing, packaging, and distribution to maintain product reliability and safety for healthcare use.</p>
                <div class="quality-points">
                    <?php
                    $qpoints = [
                        ['🔬','Strict Sourcing Standards','All products sourced from reliable, regulated pharmaceutical manufacturers.'],
                        ['📦','Packaging Integrity','Hospital-grade packaging to ensure product safety and shelf life.'],
                        ['🚚','Controlled Distribution','Temperature-managed storage and professional logistics networks.'],
                        ['✅','Consistent Compliance','Adherence to pharmaceutical regulatory standards at every step.'],
                    ];
                    foreach($qpoints as $qp): ?>
                    <div class="quality-point">
                        <div class="q-icon"><?php echo $qp[0]; ?></div>
                        <div>
                            <h4><?php echo esc_html($qp[1]); ?></h4>
                            <p><?php echo esc_html($qp[2]); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="quality-visual">
                <div class="quality-badge">✅</div>
                <h3>Quality Assured Supply Chain</h3>
                <p>From manufacturer to healthcare provider, every step is quality-controlled for reliability and patient safety.</p>
                <div class="mt-32">
                    <a href="<?php echo esc_url(home_url('/quality/')); ?>" class="btn btn-white">Learn About Our Quality →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BUSINESS INQUIRY CTA -->
<section class="section">
    <div class="container">
        <div class="cta-banner">
            <div>
                <h2>Looking for Reliable Pharmaceutical Supply?</h2>
                <p>Partner with us for consistent and quality-driven pharmaceutical solutions for your healthcare institution.</p>
            </div>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-white">Contact for Business Inquiry 📩</a>
        </div>
    </div>
</section>

<!-- LATEST BLOG POSTS -->
<section class="section section--alt">
    <div class="container">
        <div class="text-center mb-48">
            <span class="section-label">From Our Blog</span>
            <h2 class="section-title">Latest Insights & Updates</h2>
        </div>
        <div class="grid-3">
            <?php
            $posts = get_posts(['numberposts' => 3, 'post_status' => 'publish']);
            if($posts):
                foreach($posts as $post): setup_postdata($post); ?>
                <article class="post-card">
                    <div class="post-thumb">
                        <?php if(has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('daniyal-card'); ?>
                        <?php else: ?>
                            💊
                        <?php endif; ?>
                    </div>
                    <div class="post-body">
                        <div class="post-meta">
                            <?php
                            $cats = get_the_category();
                            if ( $cats ) {
                                echo '<span class="post-cat">' . esc_html( $cats[0]->name ) . '</span>';
                            }
                            ?>
                            <span><?php echo get_the_date(); ?></span>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="post-link">Read More →</a>
                    </div>
                </article>
            <?php endforeach; wp_reset_postdata();
            else: ?>
                <p class="text-muted">Blog posts coming soon.</p>
            <?php endif; ?>
        </div>
        <div class="text-center mt-48">
            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-outline">View All Posts →</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
