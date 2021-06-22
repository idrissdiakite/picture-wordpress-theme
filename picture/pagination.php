<?php
/* Template Name: Pagination Page Custom */
?>

<?php get_header();?>
<?php $lg = pll_current_language(); ?>

<section class="titleArchive bg-primary">
    <div class="container">
        <p><?php if ($lg=='fr') : ?>Actualités<?php else: ?>News<?php endif; ?></p>
        <h1><?php single_term_title();?></h1>
    </div>
</section>

<section class="bg-lightBis">
    <div class="archives container">
        <div class="research">
            <h2><?php if ($lg=='fr') : ?>Affinez votre recherche<?php else: ?>Refine your search<?php endif; ?></h2>

            <?php wp_list_categories(array(
                'show_count' => 0,
                'title_li' => '',
                'exclude' => '1')); ?>
        </div>

        <div class="articles">
            <ul>
                <?php while (have_posts()): the_post();?>
                <li>
                    <a href="<?php the_permalink();?>">
                        <?php the_post_thumbnail();?>
                        <h3><?php the_title();?></h3>
                    </a>
                    <p><?php if ($lg=='fr') : ?>Article publié le <?php the_time(get_option('date_format'))?>
                        <?php else: ?>Article published on <?php the_time('F j, Y')?><?php endif; ?>
                    </p>
                </li>
                <?php endwhile;?>
            </ul>
        </div>
    </div>
    <div class="pagination">
        <?php if ($lg=='fr') { ?>
        <?php the_posts_pagination( array( 'mid_size' => 1,
                                            'next_text' => __( 'Plus anciens', 'textdomain' ),
                                            'prev_text' => __( 'Plus récents', 'textdomain' ), )); ?>
        <?php } elseif ($lg=='en') { ?>
        <?php the_posts_pagination( array( 'mid_size' => 1,
                                            'next_text' => __( 'Older', 'textdomain' ),
                                            'prev_text' => __( 'Newer', 'textdomain' ), )); ?>
        <?php } ?>
    </div>
</section>

<?php get_footer();?>