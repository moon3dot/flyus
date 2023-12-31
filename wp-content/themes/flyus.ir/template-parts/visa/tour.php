<section class="tour">
        <div class="container">
          <div class="main-title">
            <h2 class="main-title__heading">
            <?php echo fly_visa_get_option('fly_visa_main_title_options'); ?>  
            </h2>
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

          <div class="tour-slider">
            <div class="swiper tourSlider mainSlider">
              <div class="swiper-wrapper">
              <?php 
$args =  array(
    'post_type' => 'visa',
    'posts_per_page'      => 8,
    'post_status' => 'publish',      
);    
$query = new WP_Query($args);
?>
 <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();  
 $img=get_post_meta( get_the_ID(), 'fly_visa_second_img_meta',true);
 ?>
                <div class="swiper-slide">
                  <div class="slider">
                    <div class="slider__destanition visa-slider__destanition">
                      <div class="slider__destanition-body">
                        <p class="slider__destanition-body--item pink">
                          فرایند آنلاین
                        </p>
                        <div class="slider__destanition-body--icon visa-slider">
                          <svg
                            width="17"
                            height="16"
                            viewBox="0 0 17 16"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <g clip-path="url(#clip0_38_13601)">
                              <path
                                d="M0.0695953 12.023C0.106713 12.0746 0.156665 12.1168 0.215091 12.1459C0.273517 12.1751 0.338644 12.1904 0.404788 12.1904H3.6429C3.72382 12.1904 3.80288 12.1676 3.86988 12.1249C3.93688 12.0822 3.98875 12.0216 4.01881 11.9509L4.72635 10.2857H6.72408L4.87814 15.4985C4.85782 15.5558 4.85226 15.6167 4.86189 15.6764C4.87154 15.7361 4.89612 15.7928 4.93361 15.8418C4.9711 15.8907 5.02042 15.9306 5.07751 15.9581C5.13459 15.9857 5.19781 16 5.26196 16C5.29501 16 5.32795 15.9962 5.35997 15.9885L8.59809 15.2266C8.6555 15.2132 8.70908 15.188 8.75505 15.153C8.80102 15.118 8.83825 15.0739 8.86411 15.0238L11.3164 10.2857H13.6063C14.3311 10.2879 15.0399 10.0845 15.6402 9.70198C16.2404 9.31947 16.7043 8.7756 16.9712 8.1413C17.0096 8.05051 17.0096 7.94936 16.9712 7.85856C16.7042 7.22425 16.2402 6.68038 15.6399 6.29787C15.0396 5.91537 14.3308 5.71197 13.6058 5.7142H11.3164L8.86411 0.976065C8.83825 0.925997 8.80102 0.881886 8.75505 0.846851C8.70908 0.811815 8.6555 0.786711 8.59809 0.773313L5.35997 0.0114021C5.28964 -0.00517796 5.21584 -0.0036515 5.14634 0.0158217C5.07683 0.0352949 5.01416 0.0719985 4.9649 0.122089C4.91565 0.172179 4.8816 0.233814 4.86633 0.300539C4.85107 0.367264 4.85515 0.436624 4.87814 0.501357L6.72408 5.7142H4.72635L4.01882 4.049C3.98877 3.97829 3.93689 3.91767 3.86989 3.87497C3.80288 3.83226 3.72382 3.80943 3.6429 3.80942H0.404788C0.338653 3.80943 0.273527 3.82468 0.215104 3.85385C0.156681 3.88302 0.106741 3.92522 0.069652 3.97676C0.0325628 4.02829 0.00945345 4.08759 0.00234517 4.14948C-0.0047631 4.21136 0.00434609 4.27394 0.0288761 4.33175L1.58785 7.99993L0.0288761 11.6681C0.00438966 11.7259 -0.00470118 11.7885 0.00239632 11.8503C0.00949382 11.9122 0.0325641 11.9715 0.0695953 12.023ZM2.39975 8.1413C2.4381 8.05051 2.4381 7.94936 2.39975 7.85856L1.00245 4.57133H3.36896L4.07649 6.23653C4.10655 6.30724 4.15842 6.36786 4.22544 6.41056C4.29244 6.45327 4.3715 6.4761 4.45243 6.47611H7.28578C7.34993 6.47617 7.41318 6.46186 7.4703 6.43436C7.52742 6.40686 7.57677 6.36696 7.61427 6.31797C7.65176 6.26897 7.67634 6.21228 7.68596 6.15258C7.69558 6.09288 7.68996 6.03188 7.66958 5.97462L5.87898 0.918769L8.21862 1.46937L10.6994 6.26179C10.7326 6.32607 10.7844 6.38025 10.8487 6.41815C10.913 6.45605 10.9875 6.47614 11.0634 6.47611H13.6058C14.1409 6.47438 14.6654 6.61699 15.1169 6.88705C15.5686 7.15711 15.9286 7.54331 16.1543 7.99993C15.9286 8.45651 15.5687 8.84268 15.1171 9.11274C14.6656 9.3828 14.1412 9.52543 13.6063 9.52376H11.0634C10.9875 9.52373 10.913 9.54381 10.8488 9.5817C10.7844 9.61959 10.7326 9.67377 10.6994 9.73804L8.21862 14.5305L5.87898 15.0811L7.66958 10.0253C7.68997 9.96802 7.69559 9.90702 7.68598 9.84731C7.67636 9.78761 7.65178 9.73091 7.61429 9.68191C7.57678 9.63291 7.52744 9.59301 7.47031 9.56551C7.41319 9.53801 7.34993 9.5237 7.28578 9.52376H4.45243C4.37151 9.52377 4.29245 9.5466 4.22545 9.5893C4.15844 9.63201 4.10656 9.69263 4.07652 9.76334L3.36896 11.4285H1.00245L2.39975 8.1413Z"
                                fill="#094899"
                              />
                            </g>
                            <defs>
                              <clipPath id="clip0_38_13601">
                                <rect width="17" height="16" fill="white" />
                              </clipPath>
                            </defs>
                          </svg>
                        </div>
                        <p class="slider__destanition-body--item"><?php the_title(); ?></p>
                      </div>
                      <div class="slider__destanition-icon">
                        <svg
                          width="10"
                          height="62"
                          viewBox="0 0 10 62"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                            fill="#094899"
                          />
                          <path
                            d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                            fill="#094899"
                          />
                          <path
                            d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                            fill="#094899"
                          />
                          <path
                            d="M2.14287 37.4229C1.19049 36.9042 1.19049 35.6073 2.14287 35.0885L5.35716 33.3377C6.30955 32.8189 7.50002 33.4673 7.50002 34.5049V38.0067C7.50002 39.0442 6.30955 39.6927 5.35716 39.1739L2.14287 37.4229Z"
                            fill="#094899"
                          />
                          <path
                            d="M2.14287 47.9357C1.19049 47.4169 1.19049 46.12 2.14287 45.6013L5.35716 43.8504C6.30955 43.3317 7.50002 43.9801 7.50002 45.0177V48.5194C7.50002 49.557 6.30955 50.2054 5.35716 49.6867L2.14287 47.9357Z"
                            fill="#094899"
                          />
                          <path
                            d="M2.14287 58.4485C1.19049 57.9297 1.19049 56.6328 2.14287 56.114L5.35716 54.3632C6.30955 53.8444 7.50002 54.4929 7.50002 55.5304V59.0322C7.50002 60.0698 6.30955 60.7182 5.35716 60.1994L2.14287 58.4485Z"
                            fill="#094899"
                          />
                        </svg>
                      </div>
                    </div>
                    <div class="slider__body">
                      <div class="slider__body-banner">
                        <div class="slider__body-img">
                          <img
                            src="<?php echo (!empty($img)) ? $img : THEME_IMAGE . '/tehran 1.png' ?>"
                            alt=""
                            class="slider__body-start"
                          />
                        </div>
                        <div class="slider__body-banner--devide">
                          <div class="slider__body-banner--devide-icon">
                            <svg
                              width="45"
                              height="45"
                              viewBox="0 0 45 43"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <g clip-path="url(#clip0_38_13624)">
                                <path
                                  d="M13.259 29.761C18.2569 34.5869 26.3601 34.5868 31.3579 29.761C36.3558 24.9352 36.3559 17.111 31.3579 12.2852C26.3601 7.45935 18.2569 7.45934 13.259 12.2852C8.26114 17.111 8.2611 24.9352 13.259 29.761Z"
                                  stroke="#838B96"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                />
                                <path
                                  d="M24.2278 8.89563L24.2097 23.2084L28.3452 19.25"
                                  stroke="#838B96"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                />
                                <path
                                  d="M20.3902 33.1341L20.3993 18.8301L16.2727 22.7797"
                                  stroke="#838B96"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                />
                              </g>
                              <defs>
                                <clipPath id="clip0_38_13624">
                                  <rect
                                    width="30.2537"
                                    height="30.2537"
                                    fill="white"
                                    transform="matrix(0.719382 0.694615 -0.719382 0.694615 22.3088 0)"
                                  />
                                </clipPath>
                              </defs>
                            </svg>
                          </div>
                        </div>
                        <div class="slider__body-img">
                          <img
                            src="<?php the_post_thumbnail_url(); ?>"
                            alt=""
                            class="slider__body-end"
                          />
                        </div>
                      </div>
                      <span class="slider__body-desc">
                        اکنون بهترین قیمت را پیدا کنید !
                      </span>
                      <a href="<?php the_permalink(); ?>" class="slider__body-link">مشاهده شرایط</a>
                    </div>
                  </div>
                </div>
 <?php endwhile;endif; ?>
    
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
          <?php $time_top_setting = fly_visa_get_option('fly_visa_time_top_options');?>

          <div class="tour__info-box box-style">
            <p class="list__desc-title">
            <?php if(isset($time_top_setting[0]['fly_visa_time_top_title_option'])){echo $time_top_setting[0]['fly_visa_time_top_title_option'];} ?>
            </p>
            <span class="list__desc-text">
            <?php if(isset($time_top_setting[0]['fly_visa_time_top_desc_option'])){echo $time_top_setting[0]['fly_visa_time_top_desc_option'];} ?>
            </span>
          </div>
        </div>
        <div class="tour-shadow__left shadow left shadow-left"></div>
        <div class="tour-shadow__right shadow right shadow-right"></div>
      </section>