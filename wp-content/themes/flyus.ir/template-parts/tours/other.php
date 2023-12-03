<?php $servic_setting = fly_tour_get_option('fly_tour_services_options');?>
<section class="tour-list__other">
            <div class="container">

                <div class="main-title">
                    <h2 class="main-title__heading">
                    <?php echo fly_tour_get_option('fly_tour_services_main_title_options'); ?>
                    </h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>

                <p class="tour-list-desc">
                <?php if(!empty(fly_tour_get_option('fly_tour_services_main_desc_options'))) echo fly_tour_get_option('fly_tour_services_main_desc_options'); ?>
                </p>

                <div class="row">
                <?php if(!empty($servic_setting)) {
        foreach ($servic_setting as $item) { ?>
            <div class="col-12 col-md-4">
              <article class="services-box">
                <div class="services-box__header">
                  <div class="services-box__icon">
                    <img width="24" height="24" src="<?php if(isset($item['fly_tour_services_svg_option'])){echo $item['fly_tour_services_svg_option'];}  ?>">
                  </div>
                  <h3 class="services-box__title"><?php if(isset($item['fly_tour_services_title_option'])) {echo $item['fly_tour_services_title_option'];}  ?></h3>
                </div>
                <div class="services-box__body">
                  <p>
                  <?php if(isset($item['fly_tour_services_desc_option'])){echo $item['fly_tour_services_desc_option'];} ?>
                  </p>
                </div>
                <div class="services-box__footer">
                  <div class="services-box__footer-icon">
                    <span></span>
                  </div>
                  <a href="<?php if(isset($item['fly_tour_services_link_option'])){echo $item['fly_tour_services_link_option'] ;}?>" class="services-box__footer-link">
                    بیشتر
                    <svg
                      width="22"
                      height="24"
                      viewBox="0 0 22 24"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M12.8817 16.6129L7.96061 11.6918C7.76963 11.5008 7.76061 11.1826 7.94048 10.981L12.5741 5.78847"
                        stroke="#094899"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </a>
                </div>
              </article>
            </div>
            <?php } 
               } ?>
                </div>

            </div>
            <div class="services-shadow__left left shadow shadow-left"></div>
        </section>
