<?php $banner_setting = fly_insurance_get_option('fly_insurance_banner_options'); ?>
<section class="intro">
            <h1 class="intro__heading">
                <span class="intro__heading-frist">
                <?php if(isset($banner_setting[0]['fly_insurance_banner_title_option'])){echo $banner_setting[0]['fly_insurance_banner_title_option']; } ?>
                </span>
                <span class="intro__heading-second">
                <?php if(isset($banner_setting[0]['fly_insurance_banner_subtitle_option'])){echo $banner_setting[0]['fly_insurance_banner_subtitle_option'];} ?>                    <svg class="intro__heading-second--icon" width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_6_10273)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.6453 6.10492C12.7849 6.24481 12.7849 6.47162 12.6453 6.61151L8.12242 11.1451C7.98292 11.2849 7.75665 11.2849 7.61715 11.1451L5.35472 8.87835C5.21513 8.73848 5.21509 8.51168 5.35462 8.37173C5.49415 8.23185 5.72042 8.23178 5.86001 8.37165L7.86967 10.3853L12.1399 6.10492C12.2795 5.96503 12.5058 5.96503 12.6453 6.10492Z"
                                fill="#DF005E" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.99492 1.99492C3.45042 0.539424 5.73728 0 9 0C12.2627 0 14.5495 0.539424 16.0051 1.99492C17.4606 3.45042 18 5.73728 18 9C18 12.2627 17.4606 14.5495 16.0051 16.0051C14.5495 17.4606 12.2627 18 9 18C5.73728 18 3.45042 17.4606 1.99492 16.0051C0.539424 14.5495 0 12.2627 0 9C0 5.73728 0.539424 3.45042 1.99492 1.99492ZM2.49082 2.49082C1.24327 3.73835 0.701299 5.77618 0.701299 9C0.701299 12.2238 1.24327 14.2616 2.49082 15.5092C3.73835 16.7567 5.77618 17.2987 9 17.2987C12.2238 17.2987 14.2616 16.7567 15.5092 15.5092C16.7567 14.2616 17.2987 12.2238 17.2987 9C17.2987 5.77618 16.7567 3.73835 15.5092 2.49082C14.2616 1.24327 12.2238 0.701299 9 0.701299C5.77618 0.701299 3.73835 1.24327 2.49082 2.49082Z"
                                fill="#DF005E" />
                        </g>
                        <defs>
                            <clipPath id="clip0_6_10273">
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </span>
            </h1>

            <div class="container">
                <div class="intro__banner">
                    <img src="<?php if(isset($banner_setting[0]['fly_insurance_banner_img_option'])){echo $banner_setting[0]['fly_insurance_banner_img_option'];} ?>" alt="fly with us"
                        class="intro__banner-img">
                </div>
            </div>

            <svg class="intro__cloud-left cloud_left" width="80" height="32" viewBox="0 0 80 32" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M79.6532 31.0083H0C0 31.0083 9.85581 23.6885 20.9196 24.5478C20.9196 24.5478 24.138 11.1993 35.2018 14.2107C35.2018 14.2107 38.6208 0 48.4766 0C58.3324 0 61.7514 11.6298 61.7514 17.228C61.7514 17.228 64.7692 21.9668 67.787 21.9668C70.8048 21.9668 76.4348 19.8089 79.6532 31.0083Z"
                    fill="url(#paint0_linear_5_6560)" />
                <defs>
                    <linearGradient id="paint0_linear_5_6560" x1="-0.00191883" y1="15.5049" x2="79.6544" y2="15.5049"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#EBF0F5" />
                        <stop offset="1" stop-color="#B7CCE7" />
                    </linearGradient>
                </defs>
            </svg>
            <svg class="intro__cloud-right cloud_right" width="97" height="23" viewBox="0 0 97 23" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 23H97C97 23 84.9988 17.5674 71.5246 18.2068C71.5246 18.2068 67.6065 8.30465 54.1324 10.5416C54.1324 10.5416 49.9664 0 37.9652 0C25.964 0 21.798 8.624 21.798 12.7778C21.798 12.7778 18.1237 16.2928 14.4504 16.2928C10.7771 16.2892 3.91813 14.6953 0 23Z"
                    fill="url(#paint0_linear_5_6558)" />
                <defs>
                    <linearGradient id="paint0_linear_5_6558" x1="-0.000999269" y1="11.4989" x2="96.997" y2="11.4989"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#EBF0F5" />
                        <stop offset="1" stop-color="#B7CCE7" />
                    </linearGradient>
                </defs>
            </svg>

            <div class="intro__shadow-left shadow left shadow-left"></div>
            <div class="intro-shadow-right shadow right shadow-right"></div>

        </section>
               