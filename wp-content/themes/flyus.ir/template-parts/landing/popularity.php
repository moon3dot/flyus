<?php 
$popular=get_post_meta( get_the_ID(), 'fly_trip_popular_meta', true ); 

?>
<section class="landing-popularity">
            <div class="container line-bg">
                <div class="landing-popularity__title">
                    <div class="main-title">
                        <h2 class="main-title__heading">
                        <?php echo get_post_meta( get_the_ID(), 'fly_trip_popular_main_title_meta', true ); ?>
                        </h2>
                        <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                fill="#094899" />
                        </svg>
                    </div>
                </div>
                <div class="box-container">

                <?php if(!empty($popular)){ 
                        foreach (  $popular as $item ) { ?>
                    <article class="reason-box">
                        <div class="reason-box__container">
                            <img src="<?php echo $item['fly_trip_popular_svg_meta'] ?>" class="reason-box__icon" width="52" height="57" />
                            <h3 class="reason-box__container-title"><?php echo $item['fly_trip_popular_title_meta'] ?></h3>
                        </div>
                    </article>

                <?php } } ?>

                   
                </div>
                <div class="landing-popularity__desc">
                    <?php if(!empty(get_post_meta( get_the_ID(), 'fly_trip_popular_main_des_meta', true ))) { ?>
                    <p>
                    <?php echo get_post_meta( get_the_ID(), 'fly_trip_popular_main_des_meta', true ); ?>
                    </p>
                    <?php } ?>
                </div>
            </div>
        </section>