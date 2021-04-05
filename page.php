<?php get_header(); ?>
<div class="container">

    <div style="text-align:center;">
        <?php posts_nav_link(' · ', 'Page précédente', 'Page suivante'); ?>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='post'>
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(__('(En lire plus...)')); ?></p>
            </div>

        <?php endwhile;
    else :
        ?>

        <p><?php _e('Désolé, aucun ' . $wp_query->query["category_name"] . ' ne représente votre recherche'); ?></p>
    <?php endif; ?>
    <div style="text-align:center;">
        <?php posts_nav_link(' · ', 'Page précédente', 'Page suivante'); ?>
    </div>
</div>
<?php
if (strpos($pagename, 'serv') !== false) {
?>

    <section class="services-page container">
        <section class="services full">
            <?php $evenements_query = new WP_Query(array(
                'post_type' => 'services', 'posts_per_page' => '3',
            ));
            if ($evenements_query->have_posts()) : ?>
                <?php while ($evenements_query->have_posts()) : $evenements_query->the_post(); ?>
                    <article id="<?= $post->post_name ?>" class="service">
                        <div class="service-titre-resume">
                            <div class="service-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </section>
    </section>
<?php
}
?>
<?php get_footer(); ?>