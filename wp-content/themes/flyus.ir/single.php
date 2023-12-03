<?php get_header();
set_post_view(get_the_ID());?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>

       <!-- main  -->
       <main class="main">
      <section class="summary">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
              <div class="summary__banner">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
              </div>
            </div>
            <?php $attach=get_post_meta( get_the_ID(), 'fly_post_attach_meta', true ); ?>
            <div class="col-12 col-md-8 col-lg-9">
              <div class="summary__content">
                <h1 class="summary__title">
                  <?php the_title(); ?>
                </h1>
                <?php if(!empty($attach[0]['fly_post_attach_excerpt_meta'])) { ?>
                  <p class="summary__desc"> <?php echo $attach[0]['fly_post_attach_excerpt_meta'] ?></p>
                   
                <?php }  ?>
                
                <div class="summary__details">
                  <div class="summary__details-article">
                  <?php $avatar = get_avatar_url(get_the_author_meta('ID')); ?>
                    <img
                      src="<?php echo $avatar; ?>"
                      alt=""
                      class="summary__details-article_img"
                    />
                    <div class="summary__details-article_desc">
                    <?php $author_id = get_the_author_meta('ID');?>
                      <a href="<?php echo get_the_author_meta('url', $author_id); ?>" class="summary__details-article--author">
                        به قلم : <?php the_author(); ?>  
                      </a>
                      <span class="summary__details-article--time">
                        زمان مطالعه : ۱۲ دقیقه
                      </span>
                    </div>
                  </div>
                  <div class="summary__details-buttons">
                                 
                    <?php if(!empty($attach[0]['fly_post_attach_podcast_meta'])) { ?>
                    <a href="<?php echo $attach[0]['fly_post_attach_podcast_meta'] ?>" class="summary__details-buttons--item podcast">پادکست مقاله</a>
                    <?php }  ?>
                    <?php if(!empty($attach[0]['fly_post_attach_podcast_meta'])) { ?>
                    <a href="<?php echo $attach[0]['fly_post_attach_podcast_meta'] ?>" class="summary__details-buttons--item video">ویدیو مقاله</a>
                    <?php }  ?>
                    <?php if(!empty($attach[0]['fly_post_attach_podcast_meta'])) { ?>
                    <a href="<?php echo $attach[0]['fly_post_attach_podcast_meta'] ?>" class="summary__details-buttons--item pdf">دانلود فایل PDF</a>
                    <?php }  ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="article-content">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-8">
              <article id="article">
              <?php $content=get_post_meta( get_the_ID(), 'fly_post_content_meta', true );
              if(!empty($content)){ 
                foreach (  $content as $item ) { ?>


                <?php if(!empty($item['fly_post_content_title_meta'])) { ?>
                <div class="main-title">
                  <h2 class="main-title__heading"><?php echo $item['fly_post_content_title_meta'] ?></h2>
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
                <?php }  ?>
                <?php if(!empty($item['fly_post_content_desc_meta'])) { ?>
                <p class="article-paragraph">
                <?php echo $item['fly_post_content_desc_meta'] ?>
                </p>
                <?php }  ?>
                <?php if(!empty($item['fly_post_content_audio_meta'])) { ?>
                <audio class="article__audio" controls>
                  <source
                    src="<?php echo $item['fly_post_content_audio_meta'] ?>"
                    type="audio/ogg"
                  />
                  Your browser does not support the audio element.
                </audio>
                <?php }  ?>
                <?php if(!empty($item['fly_post_content_img_meta'])) { ?>
                <div class="article__img">
                  <img
                    src="<?php echo $item['fly_post_content_img_meta'] ?>"
                    alt=""
                    class="article__image"
                  />
                </div>
                <?php }  ?>
                <?php if(!empty($item['fly_post_content_desc1_meta'])) { ?>
                <p class="article-paragraph">
                <?php echo $item['fly_post_content_desc1_meta'] ?>
                </p>
                <?php }  ?>
                <?php if(!empty($item['fly_post_content_img1_meta'])) { ?>
                <div class="article__img">
                  <img
                    src="<?php echo $item['fly_post_content_img1_meta'] ?>"
                    alt=""
                    class="article__image"
                  />
                </div>
                <?php }  ?>
                <?php } } ?>
              </article>
            </div>
            <div class="col-12 col-md-4">
              <aside class="content-sidebar">
                <h2 class="content-sidebar__header">پربازدیدترین‌ها</h2>
                <?php
        $args_view = array(
          'post_type' => 'post',
          'posts_per_page' => 6,
          'post__not_in' => array($post->ID),
          'meta_key' => 'views',
          'orderby' => 'meta_value_num'

        );
        $query_view = new WP_Query($args_view);
        if ($query_view->have_posts()) :
          while ($query_view->have_posts()) :
            $query_view->the_post(); ?>
                <article class="content-sidebar__box">
                  <a href="<?php the_permalink() ?>" class="content-sidebar__box-banner">
                    <img
                      src="<?php the_post_thumbnail_url(); ?>"
                      alt=""
                    />
                  </a>
                  <div class="content-sidebar__box-content">
                    <h3 class="content-sidebar__box-title">
                      <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
                    </h3>
                    <p class="content-sidebar__box-desc">
                    <?php the_excerpt(); ?>
                    </p>
                  </div>
                </article>
               
          <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
              </aside>
            </div>
          </div>
        </div>
        <div class="article-attach__shadow-left left shadow shadow-left"></div>
        <div class="article-attach__shadow-right right shadow shadow-right"></div>
      </section>
    </main>
    <?php endwhile;  endif; ?>
    <?php get_footer(); ?>