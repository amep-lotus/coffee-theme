<?php
/*
  Template Name: Home Template
 */
?>

<?php get_header(); ?>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <?php
                        global $post;
                        $the_query = new WP_Query(array('post_type=>post', 'cat' => 3, 'posts_per_page' => 6, 'order' => 'ASC'));
                        $_count = 0;
                        if ($the_query->have_posts()) {
                            $first = true;
                            $_ol = '';
                            while ($the_query->have_posts()) {
                                $the_query->the_post();

                                $image_link_raw = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                // print_r($image_link_row);
                                $url = $image_link_raw['0'];
                                //echo $post->ID . '|' . $url;
                                $class = '';
                                if ($first) {
                                    $first = false;
                                    $class = 'active';
                                }
                                if ($url != '') {
                                    ?>
                                    <div class="item <?php echo $class; ?>">
                                        <img class="img-responsive img-border img-left" src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="width:100%" />
                                    </div>
                                <?php } ?>

                                <?php
                        $_ol .= '<li data-target="#carousel-example-generic" data-slide-to="'.$_count.'" class="'.$class.'"></li>';
                                $_count++;
                                //
                                // Post Content here
                            //
                    } // end while
                        } // end if
                        ?>        

                    </div>
                    <ol class="carousel-indicators hidden-xs">
                        <?php
                        echo $_ol;
                        ?>
                    </ol>


                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>
                <h2 class="brand-before">
                    <small>Welcome to</small>
                </h2>
                <h1 class="brand-name">Business Casual</h1>
                <hr class="tagline-divider">
                <h2>
                    <small>By
                        <strong>Start Bootstrap</strong>
                    </small>
                </h2>
            </div>
        </div>
    </div>



    <?php
    global $post;
    $the_query = new WP_Query(array('post_type=>post', 'cat' => 3, 'posts_per_page' => 2, 'order' => 'ASC'));

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $image_link_raw = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
            // print_r($image_link_row);
            $url = $image_link_raw['0'];
            ?>
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">
                            <strong><?php the_title(); ?></strong>
                        </h2><hr>
                        <?php if ($url != '') { ?>
                            <img class="img-responsive img-border img-left" src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                            <?php
                        }
                        echo '<p>' . the_content() . '</p>';
                        ?>
                    </div>
                </div>
            </div>    

            <?php
            //
            // Post Content here
        //
                    } // end while
    } // end if
    wp_reset_query();
    ?>


</div>
<!-- /.container -->

<?php get_footer(); ?>
