<?php get_header(); ?>
    <main class="main tour-list">

        <section class="tour-detail__hero">
            <div class="container">
				<?php $gallery = get_post_meta( get_the_ID(), 'fly_tour_gallery_meta', true ); ?>
                <div class="tour-detail__hero-wrapper">
					<?php if ( ! empty( $gallery[0]['fly_tour_gallery_img_meta'] ) ) { ?>

                        <div class="tour-detail__hero-item tour-detail__hero-item--right">
                            <img src="<?php echo $gallery[0]['fly_tour_gallery_img_meta'] ?>" alt="travel"
                                 class="tour-detail__hero-item--banner tour-detail__hero-item--banner_main">
                        </div>
					<?php } ?>
                    <div class="tour-detail__hero-item tour-detail__hero-item_wrapper">
						<?php if ( ! empty( $gallery[0]['fly_tour_gallery_one_meta'] ) ) { ?>
                            <div class="tour-detail__hero-sub-item">
                                <img src="<?php echo $gallery[0]['fly_tour_gallery_one_meta'] ?>" alt="travel"
                                     class="tour-detail__hero-item--banner">
                            </div>
						<?php } ?>
						<?php if ( ! empty( $gallery[0]['fly_tour_gallery_two_meta'] ) ) { ?>
                            <div class="tour-detail__hero-sub-item">
                                <img src="<?php echo $gallery[0]['fly_tour_gallery_two_meta'] ?>" alt="travel"
                                     class="tour-detail__hero-item--banner">
                            </div>
						<?php } ?>
						<?php if ( ! empty( $gallery[0]['fly_tour_gallery_three_meta'] ) ) { ?>
                            <div class="tour-detail__hero-sub-item">
                                <img src="<?php echo $gallery[0]['fly_tour_gallery_three_meta'] ?>" alt="travel"
                                     class="tour-detail__hero-item--banner">
                            </div>
						<?php } ?>
						<?php if ( ! empty( $gallery[0]['fly_tour_gallery_four_meta'] ) ) { ?>
                            <div class="tour-detail__hero-sub-item">
                                <img src="<?php echo $gallery[0]['fly_tour_gallery_four_meta'] ?>" alt="travel"
                                     class="tour-detail__hero-item--banner">
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="tour-list__content">
            <div class="container">
                <div class="row">
					<?php $hotel = get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true ); ?>
                    <div class="col-12 col-lg-9">

                        <section class="tour-list__info">
                            <div class="tour-list__info-title">
								<?php if ( ! empty( $hotel[0]['fly_tour_hotel_name_meta'] ) ) { ?>
                                    <h2> نام هتل: <?php echo $hotel[0]['fly_tour_hotel_name_meta'] ?></h2>

								<?php } ?>

								<?php if ( ! empty( $hotel[0]['fly_tour_detail_meta'] ) ) { ?>
                                    <h2> <?php echo $hotel[0]['fly_tour_detail_meta'] ?></h2>
								<?php } ?>
                                <h2>مشاهده هتل روی نقشه</h2>
                                <h2>تصویر هتل</h2>
                            </div>


                            <div class="tour-list__info-desc">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="tour-list__info-desc_list">
											<?php the_content(); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section class="reason">
                            <div class="line-bg">
                                <div class="main-title">
                                    <h2 class="main-title__heading"><?php echo get_post_meta( get_the_ID(), 'fly_tour_services_main_title_meta', true ); ?></h2>
                                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                                fill="#094899"></path>
                                    </svg>
                                </div>

                                <div class="box-container">
									<?php $services = get_post_meta( get_the_ID(), 'fly_tour_services_meta', true );
									$count          = 1;
									if ( ! empty( $services ) ) {
										foreach ( $services as $item ) { ?>
                                            <article class="reason-box">
                                                <div class="reason-box__container">
                                                    <img class="reason-box__icon" width="52" height="57"
                                                         src="<?php echo $item['fly_tour_services_svg_meta'] ?>"/>
                                                    <h3 class="reason-box__container-title">  <?php echo $item['fly_tour_services_title_meta'] ?></h3>
                                                </div>
                                            </article>
											<?php if ( fmod( $count, 4 ) == 0 && count( $services ) > 4 && $count != 8 ) {
												echo '<div class="line-bg" style="width: 100%;margin-bottom: 0;margin-top: -4rem;"></div>';
											}
											$count ++;
											?>

										<?php }
									} ?>

                                </div>
                            </div>


                        </section>

                        <section class="reason">
                            <div class="line-bg">
                                <div class="main-title">
                                    <h2 class="main-title__heading"><?php echo get_post_meta( get_the_ID(), 'fly_tour_location_main_title_meta', true ); ?></h2>
                                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                                fill="#094899"></path>
                                    </svg>
                                </div>

                                <div class="box-container">
									<?php $location = get_post_meta( get_the_ID(), 'fly_tour_location_meta', true );
									$count          = 1;
									if ( ! empty( $location ) ) {
										foreach ( $location as $item ) { ?>
                                            <article class="reason-box">
                                                <div class="reason-box__container">
                                                    <img class="reason-box__icon" width="52" height="57"
                                                         src="<?php echo $item['fly_tour_location_svg_meta'] ?>"/>
                                                    <h3 class="reason-box__container-title">  <?php echo $item['fly_tour_location_title_meta'] ?></h3>
                                                </div>
                                            </article>
											<?php if ( fmod( $count, 4 ) == 0 && count( $location ) > 4 && $count != 8 ) {
												echo '<div class="line-bg" style="width: 100%;margin-bottom: 0;margin-top: -4rem;"></div>';
											}
											$count ++;
											?>

										<?php }
									} ?>


                                </div>
                            </div>


                        </section>

                        <section class="content">
							<?php $paragragh = get_post_meta( get_the_ID(), 'fly_tour_paragraph_meta', true );

							if ( ! empty( $paragragh ) ) {
								foreach ( $paragragh as $item ) { ?>
                                    <h3 class="content__title"> <?php echo $item['fly_tour_paragraph_title_meta'] ?></h3>
                                    <p class="content__text">
										<?php echo $item['fly_tour_paragraph_desc_meta'] ?>
                                    </p>
								<?php }
							} ?>
                        </section>

                        <section class="tour">

                            <div class="main-title">
                                <h2 class="main-title__heading">
									<?php echo get_post_meta( get_the_ID(), 'fly_tour_list_main_title_meta', true ); ?>
                                </h2>
                                <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                          fill="#094899"></path>
                                </svg>
                            </div>
                            <div class="tour-slider">
                                <div class="swiper tourSlider mainSlider tourDetailSlider swiper-initialized swiper-horizontal swiper-rtl">
                                    <div class="swiper-wrapper" id="swiper-wrapper-d57e4adafd069c9c" aria-live="polite">
										<?php
										$cats = wp_get_object_terms( get_the_ID(), 'tourcat' );

										if ( $cats ) :
											$args = array(
												'post_type'      => 'tours',
												'posts_per_page' => 6,
												'post__not_in'   => array( $post->ID ),
												'post_status'    => 'publish',
												'tax_query'      => array(
													array(
														'taxonomy' => 'tourcat',
														'field'    => 'term_id',
														'terms'    => $cats[0]->term_id
													),
												),
											);

											$query_cat = new WP_Query( $args );

											if ( $query_cat->have_posts() ) :
												while ( $query_cat->have_posts() ) :
													$query_cat->the_post();
													$ticket_q = get_post_meta( get_the_ID(), 'fly_tour_ticket_meta', true );
													?>

                                                    <div class="swiper-slide swiper-slide-active" role="group"
                                                         aria-label="1 / 11" style="width: 247.5px; margin-left: 40px;">
                                                        <div class="tour-list__slider">
                                                            <div class="tour-list__slider">
                                                                <div class="tour-list__slider-banner">
                                                                    <img src="<?php the_post_thumbnail_url() ?>"
                                                                         alt="tours" class="list__slider-banner">
                                                                </div>
                                                                <div class="tour-list__slider-content">
                                                                    <div class="tour-list__slider-content-wrapper">
                                                                        <div class="tour-list__slider-content-end">
                                                                            <p>مقصد</p>
																			<?php if ( ! empty( $ticket_q[0]['fly_tour_destination_meta'] ) ) { ?>
                                                                                <span><?php echo $ticket_q[0]['fly_tour_destination_meta'] ?></span> <?php } ?>
                                                                        </div>
                                                                        <div class="tour-list__slider-content--devide"></div>
                                                                        <div class="tour-list__slider-content-icon">
                                                                            <svg width="15" height="11"
                                                                                 viewBox="0 0 15 11" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                                      fill="#094899"></path>
                                                                            </svg>

                                                                        </div>
                                                                        <div class="tour-list__slider-content--devide"></div>
                                                                        <div class="tour-list__slider-content-start">
                                                                            <p>مبدا</p>
																			<?php if ( ! empty( $ticket_q[0]['fly_tour_origin_meta'] ) ) { ?>
                                                                                <span><?php echo $ticket_q[0]['fly_tour_origin_meta'] ?></span> <?php } ?>
                                                                        </div>
                                                                        <svg width="10" height="62" viewBox="0 0 10 62"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                                                  fill="#094899"></path>
                                                                            <path d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                                                  fill="#094899"></path>
                                                                            <path d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                                                  fill="#094899"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="tour-list__slider-footer">
                                                                    <div class="tour-list__slider-footer-price">
                                                                        <p>شروع قیمت :</p>
																		<?php if ( ! empty( $ticket_q[0]['fly_tour_ticket_start_price_meta'] ) ) { ?>
                                                                            <span><?php echo $ticket_q[0]['fly_tour_ticket_start_price_meta'] ?></span> <?php } ?>
                                                                    </div>
                                                                    <div class="tour-list__slider-footer-button">
                                                                        <a href="<?php the_permalink() ?>">برای مشاهده
                                                                            جزئیات بیشتر کلیک کنید </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
												<?php endwhile;
											endif;
										endif;
										wp_reset_postdata();
										?>


                                    </div>
                                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                         aria-controls="swiper-wrapper-d57e4adafd069c9c" aria-disabled="false"></div>
                                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                                         aria-label="Previous slide" aria-controls="swiper-wrapper-d57e4adafd069c9c"
                                         aria-disabled="true"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>

                            <div class="tour-shadow__left shadow left shadow-left"></div>
                            <div class="tour-shadow__right shadow right shadow-right"></div>
                        </section>

                    </div>
					<?php $ticket = get_post_meta( get_the_ID(), 'fly_tour_ticket_meta', true ); ?>
                    <div class="col-12 col-lg-3">
                        <aside class="tour-list__aside">
                            <div class="tour-list__aside-buttons">
                                <div class="tour-list__aside-buttons--item">
                                    <a class="tour-list__aside-buttons--consultation" href="#">درخواست مشاوره</a>
                                </div>
                                <div class="tour-list__aside-buttons--item">
                                    <a class="tour-list__aside-buttons--reservation" href="#">
                                        <span class="tour-list__aside-buttons--reservation-text">رزرو فوری تلفنی</span>
                                        <span class="tour-list__aside-buttons--reservation-item">۰۲۶-۳۶۱۴۷</span>
                                    </a>

                                </div>
								<?php if ( ! empty( $ticket[0]['fly_tour_ticket_price_meta'] ) && ! empty( $ticket[0]['fly_tour_ticket_start_price_meta'] ) ) { ?>

                                    <div class="tour-list__aside-buttons--item">
                                        <a class="tour-list__aside-buttons--price"
                                           href="#"><?php echo $ticket[0]['fly_tour_ticket_price_meta'] . ' ' . $ticket[0]['fly_tour_ticket_start_price_meta']; ?></a>
                                    </div>
								<?php } ?>

                                <div class="tour-list__aside-buttons--item">
                                    <a class="tour-list__aside-buttons--destination" href="#">
										<?php if ( ! empty( $ticket[0]['fly_tour_origin_meta'] ) ) { ?><span
                                                class="tour-list__aside-buttons--reservation-start">
                                            مبدا: <?php echo $ticket[0]['fly_tour_origin_meta'] ?></span> <?php } ?>
										<?php if ( ! empty( $ticket[0]['fly_tour_destination_meta'] ) ) { ?><span
                                                class="tour-list__aside-buttons--reservation-end">
                                            مقصد: <?php echo $ticket[0]['fly_tour_destination_meta'] ?></span> <?php } ?>
                                    </a>

                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>

    </main>

<?php get_footer(); ?>