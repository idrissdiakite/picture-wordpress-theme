<?php get_header();?>
<?php $lg = pll_current_language(); ?>

<section class="bg-primary zindex">
    <div class="topArticle container">
        <p id="category"><?php the_category( ', ' ); ?></p>
        <?php while (have_posts()): the_post();?>
        <h1><?php the_title();?></h1>
        <p class="releaseDate">
            <?php if ($lg=='fr') : ?>Article publié le <?php the_time(get_option('date_format'))?>
            <?php else: ?>Article published on <?php the_time('F j, Y')?><?php endif; ?>
        </p>
        <?php the_post_thumbnail();?>
    </div>
</section>

<section class="bg-light">
    <div class="fullArticle container">
        <div class="sharing">
            <p>Partager cet article</p>
            <ul>
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//localhost%3A8000/"><i
                            class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href=""><i class="fas fa-comments"></i></a>
                </li>
            </ul>
        </div>
        <div class="article">
            <?php the_content();?>
            <?php endwhile;?>
        </div>
    </div>
    <hr class="container" />

    <section class="relatedPosts">
        <div class="container">
            <div class="nav">
                <h1><?php if ($lg=='fr') : ?>Dans le même thème<?php else: ?>In the same category<?php endif; ?></h1>
                <span class="priv_arrow"><i class="fas fa-chevron-left"></i></span>
                <span class="next_arrow"><i class="fas fa-chevron-right"></i></span>
            </div>

            <div class="posts">
                <?php
            $categories = array_map(function ($term) {
                return $term->term_id;
            }, get_the_terms(get_post(), 'category'));
            
            $query = new WP_Query([
                'post__not_in' => [get_the_ID()],
                'post_type' => 'post',
                'posts_per_page' => 5,
                'tax_query' => [
                    [
                        'taxonomy' => 'category',
                        'terms' => $categories,
                    ]
                ]
            ]);
            while($query->have_posts()): $query->the_post();
            ?>
                <div>
                    <a href="<?php the_permalink();?>">
                        <?php the_post_thumbnail();?>
                        <h3><?php the_title();?></h3>
                    </a>
                    <p><?php the_time(get_option('date_format'))?></p>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</section>

<?php get_footer();?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js">
</script>
<script>
$(document).ready(function() {
    $('.posts').slick({
        slidesToShow: 3,
        slideToScroll: 1,
        speed: 300,
        autoplay: false,
        infinite: false,
        adaptiveHeight: true,
        prevArrow: '<span class="priv_arrow"><i class="fas fa-chevron-left"></i></span>',
        nextArrow: '<span class="next_arrow"><i class="fas fa-chevron-right"></i></span>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
        ]
    });
});
</script>