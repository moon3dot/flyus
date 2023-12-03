<section class="blog blog-slider">
        <div class="container">
          <div class="main-title">
            <h2 class="main-title__heading">با قلم ما آشنا شوید</h2>
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
              />
            </svg>
          </div>

          <div class="blog-slider">
            <div class="tour-slider">
              <div class="swiper blogSlider mainSlider">
                <div class="swiper-wrapper">
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
                  <div class="swiper-slide">
                    <article class="blog-box">
                      <div class="blog-box__header">
                        <img
                          src="<?php the_post_thumbnail_url() ?>"
                          alt="article"
                          class="blog-box__thumbnail"
                        />
                        <a href="<?php $cat = get_the_category(); echo get_category_link($cat[0]->cat_ID); ?>" class="blog-box__cat"> <?php echo $cat[0]->name; ?>  </a>
                      </div>
                      <div class="blog-box__body">
                        <div class="blg-box__detail">
                          <div class="blog-box__detail-items">
                            <div class="blg-box__detail-date">
                              <svg
                                width="10"
                                height="10"
                                viewBox="0 0 10 10"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  d="M7.0025 0H2.9975C2.83479 0 2.67835 0.00623731 2.52816 0.0249493C0.844806 0.168408 0 1.16014 0 2.98768V5.48261C0 7.97755 1.00125 8.47029 2.9975 8.47029H3.24781C3.38548 8.47029 3.56696 8.56386 3.64831 8.66989L4.39925 9.66786C4.73091 10.1107 5.26909 10.1107 5.60075 9.66786L6.35169 8.66989C6.44556 8.54514 6.59575 8.47029 6.75219 8.47029H7.0025C8.83605 8.47029 9.83104 7.63449 9.97497 5.95041C9.99374 5.80072 10 5.64478 10 5.48261V2.98768C10 0.997973 8.99875 0 7.0025 0ZM2.81602 4.98986C2.46558 4.98986 2.19024 4.70918 2.19024 4.36613C2.19024 4.02308 2.47184 3.7424 2.81602 3.7424C3.1602 3.7424 3.4418 4.02308 3.4418 4.36613C3.4418 4.70918 3.1602 4.98986 2.81602 4.98986ZM5 4.98986C4.64956 4.98986 4.37422 4.70918 4.37422 4.36613C4.37422 4.02308 4.65582 3.7424 5 3.7424C5.34418 3.7424 5.62578 4.02308 5.62578 4.36613C5.62578 4.70918 5.35044 4.98986 5 4.98986ZM7.19024 4.98986C6.8398 4.98986 6.56446 4.70918 6.56446 4.36613C6.56446 4.02308 6.84606 3.7424 7.19024 3.7424C7.53442 3.7424 7.81602 4.02308 7.81602 4.36613C7.81602 4.70918 7.53442 4.98986 7.19024 4.98986Z"
                                  fill="#094899"
                                />
                              </svg>
                              <span><?php the_time('j F Y') ?></span>
                            </div>
                            <div class="blg-box__detail-view">
                              <svg
                                width="10"
                                height="10"
                                viewBox="0 0 10 10"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  d="M7.09854 0H2.90645C1.08554 0 0 1.085 0 2.905V7.09C0 8.915 1.08554 10 2.90645 10H7.09353C8.91444 10 9.99998 8.915 9.99998 7.095V2.905C10.005 1.085 8.91945 0 7.09854 0ZM3.55677 7.45C3.55677 7.59 3.44672 7.7 3.30665 7.7H1.91095C1.77088 7.7 1.66083 7.59 1.66083 7.45V5.14C1.66083 4.825 1.91595 4.57 2.23111 4.57H3.30665C3.44672 4.57 3.55677 4.68 3.55677 4.82V7.45ZM5.94796 7.45C5.94796 7.59 5.83791 7.7 5.69784 7.7H4.30214C4.16207 7.7 4.05202 7.59 4.05202 7.45V2.87C4.05202 2.555 4.30715 2.3 4.6223 2.3H5.38268C5.69784 2.3 5.95297 2.555 5.95297 2.87V7.45H5.94796ZM8.34416 7.45C8.34416 7.59 8.2341 7.7 8.09403 7.7H6.69834C6.55827 7.7 6.44821 7.59 6.44821 7.45V5.675C6.44821 5.535 6.55827 5.425 6.69834 5.425H7.77387C8.08903 5.425 8.34416 5.68 8.34416 5.995V7.45Z"
                                  fill="#094899"
                                />
                              </svg>
                              <span><?php echo get_post_view(get_the_ID()) ?></span>
                            </div>
                          </div>
                          <div class="blg-box__detail-author">
                          <?php $author_id = get_post_field('post_author', get_the_ID()); 
                          $avatar = get_avatar_url($author_id); ?>
                            <img
                              src="<?php echo $avatar; ?>"
                              alt=""
                              class="blg-box__detail-author-img"
                            />
                            <p class="blg-box__detail-author-name">
                              به قلم :  <?php the_author() ?>
                            </p>
                          </div>
                        </div>
                        <h3 class="blog-box__title"><?php the_title() ?></h3>
                        <span class="blog-box__desc">
                        <?php echo strip_tags(get_the_excerpt()); ?>
                        </span>
                      </div>
                      <div class="blog-box__footer">
                        <a href="<?php the_permalink() ?>" class="blog-box__button">
                          بیشتر بخوانید
                          <svg
                            class="blog-box__button-icon"
                            width="6"
                            height="9"
                            viewBox="0 0 6 9"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M4.52002 1.00003L1.00002 4.53003L4.52002 8.06006"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            />
                          </svg>
                        </a>
                      </div>
                    </article>
                  </div>
                  <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
          </div>
        </div>
      </section>