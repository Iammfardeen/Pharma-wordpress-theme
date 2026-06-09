<?php
/**
 * single.php - Single Blog Post Template
 */
get_header();
?>
<?php while(have_posts()): the_post(); ?>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a>
            <span>/</span>
            <?php the_title(); ?>
        </div>
        <h1 style="max-width: 700px; margin: 0 auto;"><?php the_title(); ?></h1>
        <div class="post-meta" style="justify-content: center; margin-top: 16px;">
            <?php $cats = get_the_category(); if($cats): ?>
            <span class="post-cat"><?php echo esc_html($cats[0]->name); ?></span>
            <?php endif; ?>
            <span><?php echo get_the_date(); ?></span>
            <span>By <?php the_author(); ?></span>
        </div>
    </div>
</div>
<section class="section">
    <div class="container" style="max-width: 780px;">
        <?php if(has_post_thumbnail()): ?>
        <div style="border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 48px; height: 360px; background: var(--accent-pale); display:flex; align-items:center; justify-content:center; font-size:4rem;">
            <?php the_post_thumbnail('daniyal-hero'); ?>
        </div>
        <?php else: ?>
        <div style="border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 48px; height: 240px; background: linear-gradient(135deg, var(--accent-pale), #C8EDDB); display:flex; align-items:center; justify-content:center; font-size:4rem;">💊</div>
        <?php endif; ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <!-- Tags -->
        <?php $tags = get_the_tags(); if($tags): ?>
        <div style="margin-top: 40px; padding-top: 24px; border-top: 1px solid var(--border);">
            <?php foreach($tags as $tag): ?>
            <span class="product-tag"><?php echo esc_html($tag->name); ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Author -->
        <div class="post-author">
            <div class="author-avatar">🏥</div>
            <div>
                <strong style="display:block; font-size: 0.95rem; color: var(--primary);">Daniyal Pharma Editorial Team</strong>
                <span style="font-size: 0.85rem; color: var(--text-muted);">B2B Pharmaceutical Insights · Delhi, India</span>
            </div>
        </div>

        <!-- Navigation -->
        <div style="display: flex; justify-content: space-between; margin-top: 48px; padding-top: 32px; border-top: 1px solid var(--border); gap: 16px; flex-wrap: wrap;">
            <?php $prev = get_previous_post(); if($prev): ?>
            <a href="<?php echo esc_url(get_permalink($prev->ID)); ?>" class="btn btn-outline" style="font-size: 0.85rem;">← <?php echo esc_html($prev->post_title); ?></a>
            <?php endif; ?>
            <?php $next = get_next_post(); if($next): ?>
            <a href="<?php echo esc_url(get_permalink($next->ID)); ?>" class="btn btn-outline" style="font-size: 0.85rem;"><?php echo esc_html($next->post_title); ?> →</a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section--pale">
    <div class="container text-center">
        <h2>Looking for Pharmaceutical Supply Solutions?</h2>
        <p class="section-subtitle" style="margin: 12px auto 28px;">Contact Daniyal Pharma for hospital and institutional pharmaceutical supply.</p>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">📩 Business Inquiry</a>
    </div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>
