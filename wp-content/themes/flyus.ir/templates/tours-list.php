<?php /* Template Name: Tour-list */ ?>
<?php get_header(); ?>
    <!-- body  -->
<?php
    $argsTour = array(
        'post_type' => 'tours',
        'post_status'=> 'publish',
    ) ;

    $queryTour = new WP_Query( $argsTour );

    if ( $queryTour->have_posts() ) 
    {
        while ( $queryTour->have_posts() ) {

            $queryTour->the_post();
        }
    } ;
    $ticket=get_post_meta( get_the_ID(), 'fly_tour_ticket_meta', true ); 
    $hotel=get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true );
?>


    <main class="main tour-list">
        <section class="list">
            <div class="container">
                <img src="<?php echo THEME_IMAGE . '/visa/SVG back.png' ?>" alt="visa page" class="list__banner">
                <div class="tours-search">
                    <form class="tours-search__wrapper">
                        <svg class="tours-search__icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_54_35966)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.2798 0C17.4993 0 22.5584 5.05904 22.5584 11.2786C22.5584 14.213 21.4323 16.8893 19.5895 18.8979L23.2155 22.5163C23.5549 22.8557 23.5561 23.4047 23.2167 23.744C23.0476 23.9155 22.8241 24 22.6017 24C22.3805 24 22.1581 23.9155 21.9878 23.7464L18.318 20.0868C16.3875 21.6328 13.9398 22.5584 11.2798 22.5584C5.0602 22.5584 0 17.4982 0 11.2786C0 5.05904 5.0602 0 11.2798 0ZM11.2798 1.73731C6.01804 1.73731 1.73731 6.01688 1.73731 11.2786C1.73731 16.5403 6.01804 20.8211 11.2798 20.8211C16.5403 20.8211 20.8211 16.5403 20.8211 11.2786C20.8211 6.01688 16.5403 1.73731 11.2798 1.73731Z"
                                    fill="#094899"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_54_35966">
                                    <rect width="24" height="24" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>

                        <input type="text" class="tours-search__searchbox" placeholder="تور خود را سرچ کنید ...">
                        <button type="submit" class="tours-search__button">جستجو</button>
                    </form>
                </div>
            </div>
            <div class="list-shadow__left shadow shadow-left"></div>
            <div class="list-shadow__right shadow shadow-right"></div>
        </section>

        <section class="tour">
            <div class="container">
                <div class="main-title">
                    <h2 class="main-title__heading">
                        لیست تورهای داخلی
                    </h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>
                <div class="tour-slider">
                    <div
                        class="swiper tourSlider mainSlider swiper-initialized swiper-horizontal swiper-rtl swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-d57e4adafd069c9c" aria-live="polite">
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <?php if(!empty($hotel[0]['fly_tour_hotel_name_meta'])) { ?>
                                                        <span>
                                                         <?php echo $hotel[0]['fly_tour_hotel_name_meta'] ?>
                                                         </span>
                                                     <?php }  ?>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                            aria-controls="swiper-wrapper-d57e4adafd069c9c" aria-disabled="false"></div>
                        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                            aria-label="Previous slide" aria-controls="swiper-wrapper-d57e4adafd069c9c"
                            aria-disabled="true"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
            <div class="tour-shadow__left shadow left shadow-left"></div>
            <div class="tour-shadow__right shadow right shadow-right"></div>
        </section>

        <section class="tour">
            <div class="container">
                <div class="main-title">
                    <h2 class="main-title__heading">
                        لیست تورهای خارجی
                    </h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>
                <div class="tour-slider">
                    <div
                        class="swiper tourSlider mainSlider swiper-initialized swiper-horizontal swiper-rtl swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-d57e4adafd069c9c" aria-live="polite">
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8"
                                style="width: 240px; margin-left: 50px;">
                                <div class="tour-list__slider">
                                    <div class="tour-list__slider">
                                        <div class="tour-list__slider-banner">
                                            <img src="<?php echo THEME_IMAGE . '/tours/1.jpg' ?>" alt="tours" class="list__slider-banner">
                                        </div>
                                        <div class="tour-list__slider-content">
                                            <div class="tour-list__slider-content-wrapper">
                                                <div class="tour-list__slider-content-end">
                                                    <p>مقصد</p>
                                                    <span>کیش</span>
                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-icon">
                                                    <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                            fill="#094899" />
                                                    </svg>

                                                </div>
                                                <div class="tour-list__slider-content--devide"></div>
                                                <div class="tour-list__slider-content-start">
                                                    <p>مبدا</p>
                                                    <span>تهران</span>
                                                </div>
                                                <svg width="10" height="62" viewBox="0 0 10 62" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                        fill="#094899"></path>
                                                    <path
                                                        d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                        fill="#094899"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tour-list__slider-footer">
                                            <div class="tour-list__slider-footer-price">
                                                <p>شروع قیمت :</p>
                                                <span>۳۴۹ دلار</span>
                                            </div>
                                            <div class="tour-list__slider-footer-button">
                                                <a href="#">برای مشاهده جزئیات بیشتر کلیک کنید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                            aria-controls="swiper-wrapper-d57e4adafd069c9c" aria-disabled="false"></div>
                        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                            aria-label="Previous slide" aria-controls="swiper-wrapper-d57e4adafd069c9c"
                            aria-disabled="true"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
            <div class="tour-shadow__left shadow left shadow-left"></div>
            <div class="tour-shadow__right shadow right shadow-right"></div>
        </section>

        <section class="tour-list__other">
            <div class="container">

                <div class="main-title">
                    <h2 class="main-title__heading">
                        سایر تورهای فلاس آس
                    </h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>

                <p class="tour-list-desc">
                    برای افرادی که به تازگی پا به عرصه ی گردشگری گذاشته‌اند، سفر با تور بهترین گزینه است. چرا که
                    راهنمایان تور به خاطر تجربه‌های زیادی که دارند، اطلاعات خیلی دقیقی از مقصد گردشگری دارند و استفاده
                    از دانش آن‌ها می تواند ناشناخته‌هایی از مقصد رویایی‌تان را به شما نشان دهد و صد در صد دانستن برخی
                    اطلاعات بهتر از این است که شما فقط آن منطقه را ببینید. تور خارجی و داخلی علی‌بابا خاطره یک سفر
                    رویایی را برای شما به ارمغان خواهند آورد.
                </p>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <article class="services-box">
                            <div class="services-box__header">
                                <div class="services-box__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_5_6611)">
                                            <mask id="mask0_5_6611" style="mask-type: luminance"
                                                maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                <path d="M24 0H0V24H24V0Z" fill="white"></path>
                                            </mask>
                                            <g mask="url(#mask0_5_6611)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.75 14.3425C3.75 17.7809 8.64755 20.3367 10.8954 21.3282C11.6053 21.6406 12.3947 21.6406 13.1046 21.3282C15.3524 20.3367 20.25 17.7809 20.25 14.3425V7.04445C20.25 5.9038 19.5232 4.88624 18.4305 4.50052L14.231 2.63336C12.7846 2.12221 11.2034 2.12221 9.757 2.63336L5.5646 4.50052C4.47681 4.88624 3.75 5.9038 3.75 7.04445V14.3425Z"
                                                    fill="url(#paint0_linear_5_6611)"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.0962 19.8646C9.25705 19.0271 5.25 16.8683 5.25 13.964V7.79965C5.25 6.83625 5.84465 5.97675 6.7347 5.6509L10.1648 4.07381C11.3482 3.64206 12.6419 3.64206 13.8253 4.07381L17.2614 5.6509C18.1553 5.97675 18.75 6.83625 18.75 7.79965V13.964C18.75 16.8683 14.743 19.0271 12.9038 19.8646C12.3229 20.1284 11.6771 20.1284 11.0962 19.8646ZM11.2719 18.401C9.7904 17.7175 6.5625 15.9558 6.5625 13.5856V8.5549C6.5625 7.76865 7.04155 7.0672 7.7585 6.80135L10.5217 5.51425C11.475 5.1619 12.5171 5.1619 13.4704 5.51425L16.2383 6.80135C16.9585 7.0672 17.4375 7.76865 17.4375 8.5549V13.5856C17.4375 15.9558 14.2096 17.7175 12.7281 18.401C12.2602 18.6163 11.7398 18.6163 11.2719 18.401Z"
                                                    fill="url(#paint1_linear_5_6611)"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14.9721 9.23434C15.2173 9.47024 15.2297 9.86549 14.9999 10.1171L11.8049 13.6147C11.6899 13.7407 11.5292 13.8121 11.361 13.8121C11.1928 13.8121 11.0321 13.7407 10.917 13.6147L9.00006 11.5162C8.77016 11.2645 8.78261 10.8693 9.02781 10.6334C9.27301 10.3974 9.65811 10.4102 9.88796 10.6618L11.361 12.2744L14.1119 9.26284C14.3418 9.01119 14.7269 8.99844 14.9721 9.23434Z"
                                                    fill="white"></path>
                                            </g>
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_5_6611" x1="12" y1="2.25" x2="12"
                                                y2="19.6875" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#7599C6"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_5_6611" x1="16.0439" y1="11.4373"
                                                x2="9.56345" y2="20.8844" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white"></stop>
                                                <stop offset="1" stop-color="white"></stop>
                                            </linearGradient>
                                            <clipPath id="clip0_5_6611">
                                                <rect width="24" height="24" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="services-box__title">بیمه مسافرتی</h3>
                            </div>
                            <div class="services-box__body">
                                <p>
                                    همسفران ایده آل پرواز می‌توانند در سفرهای خود از بیمه
                                    مسافرتی سامان استفاده کنند
                                </p>
                            </div>
                            <div class="services-box__footer">
                                <div class="services-box__footer-icon">
                                    <span></span>
                                </div>
                                <a href="#" class="services-box__footer-link">
                                    بیشتر
                                    <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.8817 16.6129L7.96061 11.6918C7.76963 11.5008 7.76061 11.1826 7.94048 10.981L12.5741 5.78847"
                                            stroke="#094899" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4">
                        <article class="services-box">
                            <div class="services-box__header">
                                <div class="services-box__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                            fill="url(#paint0_linear_5_6620)"></path>
                                        <path
                                            d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                            fill="url(#paint1_linear_5_6620)"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                            fill="url(#paint2_linear_5_6620)"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                            fill="url(#paint3_linear_5_6620)"></path>
                                        <path
                                            d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                            fill="url(#paint4_linear_5_6620)"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25"
                                                x2="10.8303" y2="21.7498" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFD36D"></stop>
                                                <stop offset="1" stop-color="#FFB300"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157"
                                                x2="8.34655" y2="21.0601" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.432292" stop-color="#7599C6"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551"
                                                x2="17.5261" y2="17.832" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white"></stop>
                                                <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826"
                                                x2="12.4314" y2="13.7985" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white" stop-opacity="0.62"></stop>
                                                <stop offset="1" stop-color="white"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25"
                                                x2="4.33755" y2="21.7498" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#7599C6"></stop>
                                                <stop offset="1" stop-color="white"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="services-box__title">ویزای سفر</h3>
                            </div>
                            <div class="services-box__body">
                                <p>
                                    ما اینجا درباره این صحبت می‌کنیم که ویزا دقیقا چیست و چرا
                                    برای سفر به کشورهای خارجی باید آن را درخواست کرد؟
                                </p>
                            </div>
                            <div class="services-box__footer">
                                <div class="services-box__footer-icon">
                                    <span></span>
                                </div>
                                <a href="#" class="services-box__footer-link">
                                    بیشتر
                                    <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.8817 16.6129L7.96061 11.6918C7.76963 11.5008 7.76061 11.1826 7.94048 10.981L12.5741 5.78847"
                                            stroke="#094899" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4">
                        <article class="services-box">
                            <div class="services-box__header">
                                <div class="services-box__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_5_6626)">
                                            <mask id="mask0_5_6626" style="mask-type: luminance"
                                                maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                <path d="M24 0H0V24H24V0Z" fill="white"></path>
                                            </mask>
                                            <g mask="url(#mask0_5_6626)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.75 14.3425C3.75 17.7809 8.64755 20.3367 10.8954 21.3282C11.6053 21.6406 12.3947 21.6406 13.1046 21.3282C15.3524 20.3367 20.25 17.7809 20.25 14.3425V7.04445C20.25 5.9038 19.5232 4.88624 18.4305 4.50052L14.231 2.63336C12.7846 2.12221 11.2034 2.12221 9.757 2.63336L5.5646 4.50052C4.47681 4.88624 3.75 5.9038 3.75 7.04445V14.3425Z"
                                                    fill="url(#paint0_linear_5_6626)"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.0962 19.8646C9.25705 19.0271 5.25 16.8683 5.25 13.964V7.79965C5.25 6.83625 5.84465 5.97675 6.7347 5.6509L10.1648 4.07381C11.3482 3.64206 12.6419 3.64206 13.8253 4.07381L17.2614 5.6509C18.1553 5.97675 18.75 6.83625 18.75 7.79965V13.964C18.75 16.8683 14.743 19.0271 12.9038 19.8646C12.3229 20.1284 11.6771 20.1284 11.0962 19.8646ZM11.2719 18.401C9.7904 17.7175 6.5625 15.9558 6.5625 13.5856V8.5549C6.5625 7.76865 7.04155 7.0672 7.7585 6.80135L10.5217 5.51425C11.475 5.1619 12.5171 5.1619 13.4704 5.51425L16.2383 6.80135C16.9585 7.0672 17.4375 7.76865 17.4375 8.5549V13.5856C17.4375 15.9558 14.2096 17.7175 12.7281 18.401C12.2602 18.6163 11.7398 18.6163 11.2719 18.401Z"
                                                    fill="url(#paint1_linear_5_6626)"></path>
                                            </g>
                                            <path
                                                d="M12.2713 11.9C12.8113 11.9 13.2246 11.7667 13.5113 11.5C13.8046 11.2267 13.9513 10.87 13.9513 10.43C13.9513 9.97 13.8113 9.62333 13.5313 9.39C13.2579 9.15 12.8379 9.03 12.2713 9.03H11.1513V11.9H12.2713ZM12.2713 8.48C13.0913 8.48 13.7013 8.65 14.1013 8.99C14.5013 9.32333 14.7013 9.80333 14.7013 10.43C14.7013 10.73 14.6479 11.0067 14.5413 11.26C14.4346 11.5067 14.2779 11.72 14.0713 11.9C13.8646 12.08 13.6079 12.2233 13.3013 12.33C13.0013 12.43 12.6579 12.48 12.2713 12.48H11.1513V15H10.4213V8.48H12.2713Z"
                                                fill="white"></path>
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_5_6626" x1="12" y1="2.25" x2="12"
                                                y2="19.6875" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.484375" stop-color="#7599C6"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_5_6626" x1="16.0439" y1="11.4373"
                                                x2="9.56345" y2="20.8844" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white"></stop>
                                                <stop offset="1" stop-color="white"></stop>
                                            </linearGradient>
                                            <clipPath id="clip0_5_6626">
                                                <rect width="24" height="24" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="services-box__title">گواهی نامه و پلاک ترانزیت</h3>
                            </div>
                            <div class="services-box__body">
                                <p>
                                    خیلی بد است که راننده حرفه‌ای باشید اما در سفرهای خارج از
                                    کشور نتوانید رانندگی کنید.
                                </p>
                            </div>
                            <div class="services-box__footer">
                                <div class="services-box__footer-icon">
                                    <span></span>
                                </div>
                                <a href="#" class="services-box__footer-link">
                                    بیشتر
                                    <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.8817 16.6129L7.96061 11.6918C7.76963 11.5008 7.76061 11.1826 7.94048 10.981L12.5741 5.78847"
                                            stroke="#094899" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4">
                        <article class="services-box">
                            <div class="services-box__header">
                                <div class="services-box__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_5_6626)">
                                            <mask id="mask0_5_6626" style="mask-type: luminance"
                                                maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                <path d="M24 0H0V24H24V0Z" fill="white"></path>
                                            </mask>
                                            <g mask="url(#mask0_5_6626)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.75 14.3425C3.75 17.7809 8.64755 20.3367 10.8954 21.3282C11.6053 21.6406 12.3947 21.6406 13.1046 21.3282C15.3524 20.3367 20.25 17.7809 20.25 14.3425V7.04445C20.25 5.9038 19.5232 4.88624 18.4305 4.50052L14.231 2.63336C12.7846 2.12221 11.2034 2.12221 9.757 2.63336L5.5646 4.50052C4.47681 4.88624 3.75 5.9038 3.75 7.04445V14.3425Z"
                                                    fill="url(#paint0_linear_5_6626)"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.0962 19.8646C9.25705 19.0271 5.25 16.8683 5.25 13.964V7.79965C5.25 6.83625 5.84465 5.97675 6.7347 5.6509L10.1648 4.07381C11.3482 3.64206 12.6419 3.64206 13.8253 4.07381L17.2614 5.6509C18.1553 5.97675 18.75 6.83625 18.75 7.79965V13.964C18.75 16.8683 14.743 19.0271 12.9038 19.8646C12.3229 20.1284 11.6771 20.1284 11.0962 19.8646ZM11.2719 18.401C9.7904 17.7175 6.5625 15.9558 6.5625 13.5856V8.5549C6.5625 7.76865 7.04155 7.0672 7.7585 6.80135L10.5217 5.51425C11.475 5.1619 12.5171 5.1619 13.4704 5.51425L16.2383 6.80135C16.9585 7.0672 17.4375 7.76865 17.4375 8.5549V13.5856C17.4375 15.9558 14.2096 17.7175 12.7281 18.401C12.2602 18.6163 11.7398 18.6163 11.2719 18.401Z"
                                                    fill="url(#paint1_linear_5_6626)"></path>
                                            </g>
                                            <path
                                                d="M12.2713 11.9C12.8113 11.9 13.2246 11.7667 13.5113 11.5C13.8046 11.2267 13.9513 10.87 13.9513 10.43C13.9513 9.97 13.8113 9.62333 13.5313 9.39C13.2579 9.15 12.8379 9.03 12.2713 9.03H11.1513V11.9H12.2713ZM12.2713 8.48C13.0913 8.48 13.7013 8.65 14.1013 8.99C14.5013 9.32333 14.7013 9.80333 14.7013 10.43C14.7013 10.73 14.6479 11.0067 14.5413 11.26C14.4346 11.5067 14.2779 11.72 14.0713 11.9C13.8646 12.08 13.6079 12.2233 13.3013 12.33C13.0013 12.43 12.6579 12.48 12.2713 12.48H11.1513V15H10.4213V8.48H12.2713Z"
                                                fill="white"></path>
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_5_6626" x1="12" y1="2.25" x2="12"
                                                y2="19.6875" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.484375" stop-color="#7599C6"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_5_6626" x1="16.0439" y1="11.4373"
                                                x2="9.56345" y2="20.8844" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white"></stop>
                                                <stop offset="1" stop-color="white"></stop>
                                            </linearGradient>
                                            <clipPath id="clip0_5_6626">
                                                <rect width="24" height="24" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="services-box__title">گواهی نامه و پلاک ترانزیت</h3>
                            </div>
                            <div class="services-box__body">
                                <p>
                                    خیلی بد است که راننده حرفه‌ای باشید اما در سفرهای خارج از
                                    کشور نتوانید رانندگی کنید.
                                </p>
                            </div>
                            <div class="services-box__footer">
                                <div class="services-box__footer-icon">
                                    <span></span>
                                </div>
                                <a href="#" class="services-box__footer-link">
                                    بیشتر
                                    <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.8817 16.6129L7.96061 11.6918C7.76963 11.5008 7.76061 11.1826 7.94048 10.981L12.5741 5.78847"
                                            stroke="#094899" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4">
                        <article class="services-box">
                            <div class="services-box__header">
                                <div class="services-box__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_5_6626)">
                                            <mask id="mask0_5_6626" style="mask-type: luminance"
                                                maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                <path d="M24 0H0V24H24V0Z" fill="white"></path>
                                            </mask>
                                            <g mask="url(#mask0_5_6626)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.75 14.3425C3.75 17.7809 8.64755 20.3367 10.8954 21.3282C11.6053 21.6406 12.3947 21.6406 13.1046 21.3282C15.3524 20.3367 20.25 17.7809 20.25 14.3425V7.04445C20.25 5.9038 19.5232 4.88624 18.4305 4.50052L14.231 2.63336C12.7846 2.12221 11.2034 2.12221 9.757 2.63336L5.5646 4.50052C4.47681 4.88624 3.75 5.9038 3.75 7.04445V14.3425Z"
                                                    fill="url(#paint0_linear_5_6626)"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.0962 19.8646C9.25705 19.0271 5.25 16.8683 5.25 13.964V7.79965C5.25 6.83625 5.84465 5.97675 6.7347 5.6509L10.1648 4.07381C11.3482 3.64206 12.6419 3.64206 13.8253 4.07381L17.2614 5.6509C18.1553 5.97675 18.75 6.83625 18.75 7.79965V13.964C18.75 16.8683 14.743 19.0271 12.9038 19.8646C12.3229 20.1284 11.6771 20.1284 11.0962 19.8646ZM11.2719 18.401C9.7904 17.7175 6.5625 15.9558 6.5625 13.5856V8.5549C6.5625 7.76865 7.04155 7.0672 7.7585 6.80135L10.5217 5.51425C11.475 5.1619 12.5171 5.1619 13.4704 5.51425L16.2383 6.80135C16.9585 7.0672 17.4375 7.76865 17.4375 8.5549V13.5856C17.4375 15.9558 14.2096 17.7175 12.7281 18.401C12.2602 18.6163 11.7398 18.6163 11.2719 18.401Z"
                                                    fill="url(#paint1_linear_5_6626)"></path>
                                            </g>
                                            <path
                                                d="M12.2713 11.9C12.8113 11.9 13.2246 11.7667 13.5113 11.5C13.8046 11.2267 13.9513 10.87 13.9513 10.43C13.9513 9.97 13.8113 9.62333 13.5313 9.39C13.2579 9.15 12.8379 9.03 12.2713 9.03H11.1513V11.9H12.2713ZM12.2713 8.48C13.0913 8.48 13.7013 8.65 14.1013 8.99C14.5013 9.32333 14.7013 9.80333 14.7013 10.43C14.7013 10.73 14.6479 11.0067 14.5413 11.26C14.4346 11.5067 14.2779 11.72 14.0713 11.9C13.8646 12.08 13.6079 12.2233 13.3013 12.33C13.0013 12.43 12.6579 12.48 12.2713 12.48H11.1513V15H10.4213V8.48H12.2713Z"
                                                fill="white"></path>
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_5_6626" x1="12" y1="2.25" x2="12"
                                                y2="19.6875" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.484375" stop-color="#7599C6"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_5_6626" x1="16.0439" y1="11.4373"
                                                x2="9.56345" y2="20.8844" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white"></stop>
                                                <stop offset="1" stop-color="white"></stop>
                                            </linearGradient>
                                            <clipPath id="clip0_5_6626">
                                                <rect width="24" height="24" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="services-box__title">گواهی نامه و پلاک ترانزیت</h3>
                            </div>
                            <div class="services-box__body">
                                <p>
                                    خیلی بد است که راننده حرفه‌ای باشید اما در سفرهای خارج از
                                    کشور نتوانید رانندگی کنید.
                                </p>
                            </div>
                            <div class="services-box__footer">
                                <div class="services-box__footer-icon">
                                    <span></span>
                                </div>
                                <a href="#" class="services-box__footer-link">
                                    بیشتر
                                    <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.8817 16.6129L7.96061 11.6918C7.76963 11.5008 7.76061 11.1826 7.94048 10.981L12.5741 5.78847"
                                            stroke="#094899" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4">
                        <article class="services-box">
                            <div class="services-box__header">
                                <div class="services-box__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_5_6626)">
                                            <mask id="mask0_5_6626" style="mask-type: luminance"
                                                maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                                <path d="M24 0H0V24H24V0Z" fill="white"></path>
                                            </mask>
                                            <g mask="url(#mask0_5_6626)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.75 14.3425C3.75 17.7809 8.64755 20.3367 10.8954 21.3282C11.6053 21.6406 12.3947 21.6406 13.1046 21.3282C15.3524 20.3367 20.25 17.7809 20.25 14.3425V7.04445C20.25 5.9038 19.5232 4.88624 18.4305 4.50052L14.231 2.63336C12.7846 2.12221 11.2034 2.12221 9.757 2.63336L5.5646 4.50052C4.47681 4.88624 3.75 5.9038 3.75 7.04445V14.3425Z"
                                                    fill="url(#paint0_linear_5_6626)"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.0962 19.8646C9.25705 19.0271 5.25 16.8683 5.25 13.964V7.79965C5.25 6.83625 5.84465 5.97675 6.7347 5.6509L10.1648 4.07381C11.3482 3.64206 12.6419 3.64206 13.8253 4.07381L17.2614 5.6509C18.1553 5.97675 18.75 6.83625 18.75 7.79965V13.964C18.75 16.8683 14.743 19.0271 12.9038 19.8646C12.3229 20.1284 11.6771 20.1284 11.0962 19.8646ZM11.2719 18.401C9.7904 17.7175 6.5625 15.9558 6.5625 13.5856V8.5549C6.5625 7.76865 7.04155 7.0672 7.7585 6.80135L10.5217 5.51425C11.475 5.1619 12.5171 5.1619 13.4704 5.51425L16.2383 6.80135C16.9585 7.0672 17.4375 7.76865 17.4375 8.5549V13.5856C17.4375 15.9558 14.2096 17.7175 12.7281 18.401C12.2602 18.6163 11.7398 18.6163 11.2719 18.401Z"
                                                    fill="url(#paint1_linear_5_6626)"></path>
                                            </g>
                                            <path
                                                d="M12.2713 11.9C12.8113 11.9 13.2246 11.7667 13.5113 11.5C13.8046 11.2267 13.9513 10.87 13.9513 10.43C13.9513 9.97 13.8113 9.62333 13.5313 9.39C13.2579 9.15 12.8379 9.03 12.2713 9.03H11.1513V11.9H12.2713ZM12.2713 8.48C13.0913 8.48 13.7013 8.65 14.1013 8.99C14.5013 9.32333 14.7013 9.80333 14.7013 10.43C14.7013 10.73 14.6479 11.0067 14.5413 11.26C14.4346 11.5067 14.2779 11.72 14.0713 11.9C13.8646 12.08 13.6079 12.2233 13.3013 12.33C13.0013 12.43 12.6579 12.48 12.2713 12.48H11.1513V15H10.4213V8.48H12.2713Z"
                                                fill="white"></path>
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_5_6626" x1="12" y1="2.25" x2="12"
                                                y2="19.6875" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.484375" stop-color="#7599C6"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_5_6626" x1="16.0439" y1="11.4373"
                                                x2="9.56345" y2="20.8844" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white"></stop>
                                                <stop offset="1" stop-color="white"></stop>
                                            </linearGradient>
                                            <clipPath id="clip0_5_6626">
                                                <rect width="24" height="24" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="services-box__title">گواهی نامه و پلاک ترانزیت</h3>
                            </div>
                            <div class="services-box__body">
                                <p>
                                    خیلی بد است که راننده حرفه‌ای باشید اما در سفرهای خارج از
                                    کشور نتوانید رانندگی کنید.
                                </p>
                            </div>
                            <div class="services-box__footer">
                                <div class="services-box__footer-icon">
                                    <span></span>
                                </div>
                                <a href="#" class="services-box__footer-link">
                                    بیشتر
                                    <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.8817 16.6129L7.96061 11.6918C7.76963 11.5008 7.76061 11.1826 7.94048 10.981L12.5741 5.78847"
                                            stroke="#094899" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
            <div class="services-shadow__left left shadow shadow-left"></div>
        </section>

        <section class="tour-list__guaranti">
            <div class="container">
                <div class="main-title">
                    <h2 class="main-title__heading">
                        گارانتی بهترین قیمت
                    </h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>

                <p class="tour-list-desc">
                    برای افرادی که به تازگی پا به عرصه ی گردشگری گذاشته‌اند، سفر با تور بهترین گزینه است. چرا که
                    راهنمایان تور به خاطر تجربه‌های زیادی که دارند، اطلاعات خیلی دقیقی از مقصد گردشگری دارند و استفاده
                    از دانش آن‌ها می تواند ناشناخته‌هایی از مقصد رویایی‌تان را به شما نشان دهد و صد در صد دانستن برخی
                    اطلاعات بهتر از این است که شما فقط آن منطقه را ببینید. تور خارجی و داخلی علی‌بابا خاطره یک سفر
                    رویایی را برای شما به ارمغان خواهند آورد.
                </p>
            </div>
        </section>

    </main>

<?php get_footer(); ?>