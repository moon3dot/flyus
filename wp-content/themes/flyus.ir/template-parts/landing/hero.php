<?php 
$banner=get_post_meta( get_the_ID(), 'fly_trip_banner_meta', true ); 
$description=get_post_meta( get_the_ID(), 'fly_trip_description_meta', true );
$user=get_post_meta( get_the_ID(), 'fly_trip_description_user_meta', true );
?>
<section class="landing-hero">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="landing-hero__title">
                            <div class="main-title">
                            <?php if(!empty($banner[0]['fly_trip_banner_title_meta'])) { ?>
                                <h1 class="main-title__heading"> <?php echo $banner[0]['fly_trip_banner_title_meta'] ?> </h1>
                             <?php } ?>
                                
                                
                               
                                <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                        fill="#094899" />
                                </svg>
                            </div>
                        </div>
                        <ul class="landing-hero__list">
                       <?php if(!empty($description)){ 
                        foreach (  $description as $item ) { ?>
                            <div class="landing-hero__list-wrapper">
                                <span class="landing-hero__list-item--circle"></span>
                                <li class="landing-hero__list-item">
                                <?php echo $item['fly_trip_description_title_meta'] ?>
                                </li>
                            </div>
                            <?php } } ?>
                        </ul>
                        <div class="landing-hero__buttons">
                        <?php if(!empty($banner[0]['fly_trip_banner_podcast_meta'])) { ?>
                            <a href="<?php echo $banner[0]['fly_trip_banner_podcast_meta'] ?>" class="landing-hero__button-item fill">پادکست مقاله</a>
                        <?php } ?>
                        <?php if(!empty($banner[0]['fly_trip_banner_video_meta'])) { ?>
                            <a href="<?php echo $banner[0]['fly_trip_banner_video_meta'] ?>" class="landing-hero__button-item outline">ویدئو مقاله</a>
                        <?php } ?>
                        <?php if(!empty($banner[0]['fly_trip_banner_podcast_meta'])) { ?>
                         <a href="<?php echo $banner[0]['fly_trip_banner_podcast_meta'] ?>" class="landing-hero__button-item outline">دانلود پادکست مقاله</a>
                         <?php } ?>
                        </div>
                        <div class="landing-hero__subtitle">
                            <div class="main-title">
                                <h2 class="main-title__heading"><?php echo $banner[0]['fly_trip_banner_user_title_meta'] ?></h2>
                                <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                        fill="#094899" />
                                </svg>
                            </div>
                        </div>
                        <ul class="landing-hero__list-audience">
                        <?php if(!empty($user)){ 
                        foreach (  $user as $item ) { ?>
                            <li class="landing-hero__list-audience-item">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="20" height="20" transform="translate(20 20) rotate(-180)" fill="white"
                                        fill-opacity="0.6" />
                                    <path
                                        d="M12.5 1.66659L7.49998 1.66659C3.33331 1.66658 1.66665 3.33325 1.66665 7.49992L1.66665 12.4999C1.66665 16.6666 3.33331 18.3333 7.49998 18.3333L12.5 18.3333C16.6666 18.3333 18.3333 16.6666 18.3333 12.4999L18.3333 7.49992C18.3333 3.33325 16.6666 1.66659 12.5 1.66659Z"
                                        stroke="#A3ABB5" stroke-width="0.7" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12.9417 8.78322L9.99998 11.7166L7.05832 8.78322" stroke="#A3ABB5"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>
                                <?php echo $item['fly_trip_description_user_title_meta'] ?>
                                </span>

                            </li>
                          <?php } } ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="landing-banner">
                            <img src="<?php the_post_thumbnail_url() ?>" alt="" class="landing-banner__img">
                        </div>
                    </div>
                </div>
                <div class="landing-ctr">
                    <div class="landing-ctr__icon">
                        <img src="<?php echo THEME_IMAGE . '/landing/mouse.svg' ?>" alt="" class="landing-ctr__icon-item">
                    </div>
                </div>
            </div>
            <div class="list-shadow__left shadow shadow-left"></div>
            <div class="list-shadow__right shadow shadow-right"></div>
        </section>
