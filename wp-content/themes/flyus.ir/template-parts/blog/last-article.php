<section class="last-article">
        <div class="container">
          <div class="main-title">
            <h2 class="main-title__heading">جدیدترین مطالب</h2>
            <svg
              class="main-title__icon"
              width="13"
              height="17"
              viewBox="0 0 13 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                fill="#094899"
              ></path>
            </svg>
          </div>
          <div class="row" id="all-post">

          <?php
                    $args_all = array(
                        'post_type' => 'post',
                        'posts_per_page' => 8,
					            	'post_status' => 'publish',
                    );
                    $query_all = new WP_Query($args_all);
                    if ($query_all->have_posts()) :
                        while ($query_all->have_posts()):
                            $query_all->the_post(); ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <article class="article-box">
                <div class="article-box__banner">
                  <img src="<?php the_post_thumbnail_url() ?>" alt="article" />
                  <a href="<?php $cat = get_the_category(); echo get_category_link($cat[0]->cat_ID); ?>" class="article-box__cat">
                  <?php echo $cat[0]->name; ?>
                  </a>
                </div>
                <div class="article-box__content">
                  <h3 class="article-box__content-title">
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                  </h3>
                  <p class="article-box__desc">
                  <?php echo strip_tags(get_the_excerpt()); ?>
                  </p>
                  <div class="article-box__author">
                  <?php $author_id = get_post_field('post_author', get_the_ID()); ?>
                    به قلم : <a href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author() ?></a>
                  </div>
                  <a href="<?php the_permalink() ?>" class="article-box__button"> بیشتر بدانید </a>
                </div>
              </article>
            </div>
            
                        <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata();
                    ?>
            </div>
           
          </div>
          <div class="last-article__button">
            <button data-page="1" id="more_posts" class="last-article__button-load">ادامه مطالب</button>
          </div>
        </div>
        <div class="last-article__left-shadow left shadow-left shadow"></div>
        <div class="last-article__right-shadow right shadow-right shadow"></div>
      </section>
