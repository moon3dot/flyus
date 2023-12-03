<?php $introduce_setting = fly_home_get_option('fly_home_introduce_options'); ?>
<section class="introduce">
        <div class="container">
          <div class="main-title">
            <h2 class="main-title__heading"><?php if(isset($introduce_setting[0]['fly_home_introduce_main_title_option'])){echo $introduce_setting[0]['fly_home_introduce_main_title_option'];} ?></h2>
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
          <div class="introduce-container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <p class="introduce__text">
                <?php if(isset($introduce_setting[0]['fly_home_introduce_desc_option'])){echo $introduce_setting[0]['fly_home_introduce_desc_option'];} ?>
                </p>
              </div>
              <div class="col-12 col-lg-4">
                <div class="introduce__video">
                  <video controls poster="<?php if(isset($introduce_setting[0]['fly_home_introduce_img_option'])){echo $introduce_setting[0]['fly_home_introduce_img_option'];} ?>">
                    <source src="<?php if(isset($introduce_setting[0]['fly_home_introduce_video_option'])){echo $introduce_setting[0]['fly_home_introduce_video_option'];} ?>" type="video/mp4" />
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>