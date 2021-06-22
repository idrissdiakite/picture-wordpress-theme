<?php get_header();?>
<?php $lg = pll_current_language(); ?>

<!-- featured -->
<section class="bg-primary">
    <div class="container">
        <article class="featured">
            <div>
                <span><?php the_category( ', ' );?></span>
                <h1>
                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                </h1>
                <p>
                    <?php the_excerpt();?>
                </p>
                <a href="<?php the_permalink();?>">
                    <button class="btn">
                        <?php if ($lg=='fr') : ?>Lire l’article<?php else: ?>Read more<?php endif; ?>
                    </button>
                </a>
            </div>
            <?php the_post_thumbnail();?>
        </article>
    </div>
</section>

<!-- archives -->

<section class="bg-light">
    <div class="archives container">
        <div class="research">
            <h3>
                <?php if ($lg=='fr') : ?>Affinez votre recherche<?php else: ?>Refine your search<?php endif; ?>
            </h3>

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