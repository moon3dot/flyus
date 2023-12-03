<?php get_header(); ?>
    <!-- main  -->
    <main class="main">
      <div class="container">
        <div class="main-title">
          <h1 class="main-title__heading">
            به دنبال چه اطلاعاتی از <?php single_cat_title(); ?> میگردید ؟
          </h1>
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
        <div class="row justify-center">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="col-12 col-md-4">
            <article class="services-box">
              <div class="services-box__header">
                <div class="services-box__icon">
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_5_6626)">
                      <mask
                        id="mask0_5_6626"
                        style="mask-type: luminance"
                        maskUnits="userSpaceOnUse"
                        x="0"
                        y="0"
                        width="24"
                        height="24"
                      >
                        <path d="M24 0H0V24H24V0Z" fill="white"></path>
                      </mask>
                      <g mask="url(#mask0_5_6626)">
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M3.75 14.3425C3.75 17.7809 8.64755 20.3367 10.8954 21.3282C11.6053 21.6406 12.3947 21.6406 13.1046 21.3282C15.3524 20.3367 20.25 17.7809 20.25 14.3425V7.04445C20.25 5.9038 19.5232 4.88624 18.4305 4.50052L14.231 2.63336C12.7846 2.12221 11.2034 2.12221 9.757 2.63336L5.5646 4.50052C4.47681 4.88624 3.75 5.9038 3.75 7.04445V14.3425Z"
                          fill="url(#paint0_linear_5_6626)"
                        ></path>
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M11.0962 19.8646C9.25705 19.0271 5.25 16.8683 5.25 13.964V7.79965C5.25 6.83625 5.84465 5.97675 6.7347 5.6509L10.1648 4.07381C11.3482 3.64206 12.6419 3.64206 13.8253 4.07381L17.2614 5.6509C18.1553 5.97675 18.75 6.83625 18.75 7.79965V13.964C18.75 16.8683 14.743 19.0271 12.9038 19.8646C12.3229 20.1284 11.6771 20.1284 11.0962 19.8646ZM11.2719 18.401C9.7904 17.7175 6.5625 15.9558 6.5625 13.5856V8.5549C6.5625 7.76865 7.04155 7.0672 7.7585 6.80135L10.5217 5.51425C11.475 5.1619 12.5171 5.1619 13.4704 5.51425L16.2383 6.80135C16.9585 7.0672 17.4375 7.76865 17.4375 8.5549V13.5856C17.4375 15.9558 14.2096 17.7175 12.7281 18.401C12.2602 18.6163 11.7398 18.6163 11.2719 18.401Z"
                          fill="url(#paint1_linear_5_6626)"
                        ></path>
                      </g>
                      <path
                        d="M12.2713 11.9C12.8113 11.9 13.2246 11.7667 13.5113 11.5C13.8046 11.2267 13.9513 10.87 13.9513 10.43C13.9513 9.97 13.8113 9.62333 13.5313 9.39C13.2579 9.15 12.8379 9.03 12.2713 9.03H11.1513V11.9H12.2713ZM12.2713 8.48C13.0913 8.48 13.7013 8.65 14.1013 8.99C14.5013 9.32333 14.7013 9.80333 14.7013 10.43C14.7013 10.73 14.6479 11.0067 14.5413 11.26C14.4346 11.5067 14.2779 11.72 14.0713 11.9C13.8646 12.08 13.6079 12.2233 13.3013 12.33C13.0013 12.43 12.6579 12.48 12.2713 12.48H11.1513V15H10.4213V8.48H12.2713Z"
                        fill="white"
                      ></path>
                    </g>
                    <defs>
                      <linearGradient
                        id="paint0_linear_5_6626"
                        x1="12"
                        y1="2.25"
                        x2="12"
                        y2="19.6875"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop offset="0.484375" stop-color="#7599C6"></stop>
                      </linearGradient>
                      <linearGradient
                        id="paint1_linear_5_6626"
                        x1="16.0439"
                        y1="11.4373"
                        x2="9.56345"
                        y2="20.8844"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="white"></stop>
                        <stop offset="1" stop-color="white"></stop>
                      </linearGradient>
                      <clipPath id="clip0_5_6626">
                        <rect width="24" height="24" fill="white"></rect>
                      </clipPath>
                    </defs>
                  </svg>
                </div>
                <h3 class="services-box__title"><?php the_title(); ?></h3>
              </div>
              <div class="services-box__body">
                <p>
                  <?php the_excerpt(); ?>
                </p>
              </div>
              <div class="services-box__footer">
                <div class="services-box__footer-icon">
                  <span></span>
                </div>
                <a href="<?php the_permalink(); ?>" class="services-box__footer-link">
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
                    ></path>
                  </svg>
                </a>
              </div>
            </article>
          </div>
          <?php endwhile;  endif; ?>
        </div>
      </div>
      <div class="cities__shadow-left left shadow-left shadow"></div>
      <div class="cities__shadow-right right shadow-right shadow"></div>
    </main>
<?php get_footer(); ?>
