<?php
/*
Template Name: Blog Template
*/
?>

<?php get_header(); ?>


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Company
                        <strong>blog</strong>
                    </h2>
                    <hr>
                </div>
                
                 <?php
    global $post;
    $the_query = new WP_Query(array('post_type=>post', 'cat' => 4, 'posts_per_page' => 6, 'order' => 'ASC'));

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $image_link_raw = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            // print_r($image_link_row);
            $url = $image_link_raw['0'];
           
            if ($url != '') { ?>
             <div class="col-lg-12 test text-center">
                            <img class="img-responsive img-border img-left" src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="width:100%" />
                         
                        <?php } ?>
                       
                        <h2>
                            <strong><?php the_title(); ?></strong>
                        </h2>
                        <div class="meta">
    <time class="published updated" datetime="<?php echo get_the_time('c'); ?>"><?php the_time( get_option( 'date_format' ) );//echo get_the_date(); ?></time>
   </div>    
                       <?php echo '<p>' . the_content() . '</p>';
                        ?>
                
            </div>    

            <?php
            //
            // Post Content here
        //
                    } // end while
    } // end if
    ?>
               
                <div class="col-lg-12 text-center">
                    <img class="img-responsive img-border img-full" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slide-2.jpg" alt="">
                    <h2>Post Title
                        <br>
                        <small>October 13, 2013</small>
                    </h2>
                    <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <a href="#" class="btn btn-default btn-lg">Read More</a>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">
                    <img class="img-responsive img-border img-full" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slide-3.jpg" alt="">
                    <h2>Post Title
                        <br>
                        <small>October 13, 2013</small>
                    </h2>
                    <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <a href="#" class="btn btn-default btn-lg">Read More</a>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">
                    <ul class="pager">
                        <li class="previous"><a href="#">&larr; Older</a>
                        </li>
                        <li class="next"><a href="#">Newer &rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

   <?php get_footer(); ?>