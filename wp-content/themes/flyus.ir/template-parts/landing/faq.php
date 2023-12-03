<?php $faqes=get_post_meta( get_the_ID(), 'fly_trip_faq_meta', true ); ?>
<section class="faq">
            <div class="container">
                <div class="main-title">
                    <h2 class="main-title__heading"> <?php echo get_post_meta( get_the_ID(), 'fly_trip_faq_main_title_meta',true); ?></h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>

                <div class="row">
                    <div class="col-12 col-md-7 col-lg-6">
                        <div class="faq__accordion">
                        <?php $counter=0; if(!empty($faqes)) {
        foreach ($faqes as $item) { ?>
                            <div class="accordion-item <?php if($counter==0)echo 'active'?>">
                                <div class="accordion-button">
                                    <h4 class="accordion-button__title">
                                    <?php echo $item['fly_trip_faq_question_meta'] ?>                                    </h4>
                                    <button class="accordion-button__icon">
                                        <span></span>
                                    </button>
                                </div>
                                <p class="accordion-content">
                                <?php echo $item['fly_trip_faq_answer_meta'] ?>
                                </p>
                            </div>
                        <?php $counter++ ; } } ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-6">
                        <div class="faq-banner">
                        <img src="<?php echo (!empty(get_post_meta( get_the_ID(), 'fly_trip_faq_main_img_meta',true))) ? get_post_meta( get_the_ID(), 'fly_trip_faq_main_img_meta',true) : THEME_IMAGE . '/b2b-faq 1.png' ?>" alt="FAQ" class="faq-banner__item" />
                        </div>
                    </div>
                </div>
            </div>
        </section>