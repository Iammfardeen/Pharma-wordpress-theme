<?php
/**
 * index.php / archive.php - Blog Archive
 */
get_header();
?>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span>/</span>
            <?php if(is_category()): echo single_cat_title(); elseif(is_tag()): echo single_tag_title(); else: _e('Blog','daniyal-pharma'); endif; ?>
        </div>
        <h1><?php if(is_category()): single_cat_title(); elseif(is_tag()): single_tag_title(); else: echo 'Pharmaceutical Insights & Updates'; endif; ?></h1>
        <p>Expert insights on pharmaceutical supply, product news, and healthcare industry updates.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <?php if(have_posts()): ?>
        <div class="grid-3">
            <?php while(have_posts()): the_post(); ?>
            <article class="post-card">
                <div class="post-thumb">
                    <?php if(has_post_thumbnail()): the_post_thumbnail('daniyal-card'); else: echo '💊'; endif; ?>
                </div>
                <div class="post-body">
                    <div class="post-meta">
                        <?php $cats = get_the_category(); if($cats): ?>
                        <span class="post-cat"><?php echo esc_html($cats[0]->name); ?></span>
                        <?php endif; ?>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="post-link">Read More →</a>
                </div>
            </article>
            <?php endwhile; ?>
        </div>
        <div class="text-center mt-48">
            <?php the_posts_pagination(['mid_size' => 2, 'prev_text' => '← Previous', 'next_text' => 'Next →']); ?>
        </div>
        <?php else: ?>
        <p class="text-center text-muted">No posts found.</p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
