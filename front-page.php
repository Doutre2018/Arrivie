<?php get_header(); ?>

<div class="front-page-container">
    <?php $lang = get_bloginfo("language"); ?>
    <div class="wp-block-group alignfull">
        <?php
        $lang_nb = 0;
        if ($lang == 'fr-FR') {
            $lang_nb = 29;
        } else if ($lang == 'en-GB') {
            $lang_nb = 28;
        } else if ($lang == 'es') {
            $lang_nb = 30;
        } else {
            $lang_nb = 29;
        }
        echo do_shortcode('[slick-slider design="design-2" image_fit="true" image_size="large" category="' . $lang_nb . '" variableWidth="true"]');
        ?>
    </div>

    <h1><?= get_bloginfo('title'); ?></h1>
    <h2><?= get_bloginfo('description'); ?></h2>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='post'>
                <?php the_content(__('(En lire plus...)')); ?>
            </div>

        <?php endwhile;
    else :
        ?>

        <p><?php _e('Désolé, aucun ' . $wp_query->query["category_name"] . ' ne représente votre recherche'); ?></p>
    <?php endif; ?>

    <section id="services" class="home home-services">

        <header>
            <h2>
                <!-- <i class="far fa-calendar-alt"></i> -->
                <?php pll_e("Services"); ?>
            </h2>
        </header>
        <section class="services">

            <?php $evenements_query = new WP_Query(array(
                'post_type' => 'services', 'posts_per_page' => '5',
            ));
            if ($evenements_query->have_posts()) : ?>
                <?php while ($evenements_query->have_posts()) : $evenements_query->the_post(); ?>
                    <article class="service">
                        <div class="service-titre-resume">
                            <div class="service-thumbnail">
                                <a href="/nos-services#<?= $post->post_name ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            </div>
                            <div class="service-content">
                                <a href="/nos-services#<?= $post->post_name ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <?php the_excerpt(); ?>
                                <a class="see-more" href="/nos-services#<?= $post->post_name ?>">
              ª                      <?php pll_e("En savoir plus"); ?>
                                </a>
                            </div>
                        </div>
                    </article>

                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </section>
    </section>
    <?php $evenements_query = new WP_Query(array(
        'post_type' => 'temoignages', 'posts_per_page' => '-1',
    ));
    if ($evenements_query->have_posts()) : ?>
        <section class="home home-temoignages alignfull">
            <header>
                <h2>
                    <!-- <i class="far fa-calendar-alt"></i> -->
                    <?php pll_e("Témoignages"); ?>
                </h2>
            </header>
            <section id="temoignages">

                <?php while ($evenements_query->have_posts()) : $evenements_query->the_post(); ?>
                    <article class="testimonial">
                        <div class="description">
                            <?php the_content(); ?>
                        </div>
                        <h3 class="title"><?php the_title(); ?></h3>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </section>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>