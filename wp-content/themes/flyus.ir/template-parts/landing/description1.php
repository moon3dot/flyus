<?php 
$section=get_post_meta( get_the_ID(), 'fly_trip_section_meta', true ); 
?>
<section class="landing__description">
            <div class="container">
                <div class="row">
                    <div class="landing-popularity__title">
                        <div class="main-title">
                        <?php if(!empty($section[0]['fly_trip_section_title_meta'])) { ?>
                            <h2 class="main-title__heading"> <?php echo $section[0]['fly_trip_section_title_meta'] ?> </h2>
                        <?php } ?>
                           
                            <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                    fill="#094899"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <?php if(!empty($section[0]['fly_trip_section_des_top_meta'])) { ?>
                        <p class="landing__description-paragraph-item"><?php echo $section[0]['fly_trip_section_des_top_meta'] ?> </p>
                        <?php } ?>
                        
                          
                        
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="landing__description-banner">
                        <?php if(!empty($section[0]['fly_trip_section_img_meta'])) { ?>
                            <img src="<?php echo $section[0]['fly_trip_section_img_meta'] ?> " alt="..." class="landing__description-img">
                        <?php } ?>
                     
                        </div>
                    </div>
                </div>
            </div>
        </section>