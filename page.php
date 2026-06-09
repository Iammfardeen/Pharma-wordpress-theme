<?php
/**
 * page.php - Default Page Template
 */
get_header();
?>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span>/</span>
            <?php the_title(); ?>
        </div>
        <h1><?php the_title(); ?></h1>
        <?php if(has_excerpt()): ?><p><?php the_excerpt(); ?></p><?php endif; ?>
    </div>
</div>
<section class="section">
    <div class="container">
        <?php while(have_posts()): the_post(); ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
    </div>
</section>
<?php get_footer();
