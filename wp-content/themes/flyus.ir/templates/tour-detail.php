<?php /* Template Name: Tour-detail */ ?>
<?php get_header(); ?>

    <!-- body  -->
    <?php 
$cat = get_queried_object(); 
$args =  array(
    'post_type' => 'gallery',
    'posts_per_page'      => 1,
    'post_status' => 'publish',      
    'tax_query' => array(
   array(
            'taxonomy' => 'tourcat',
            'field' => 'term_id',
            'terms'    => $cat->term_id
        ),
    ),
);    
$count = 1; 
$query_cat = new WP_Query($args);
?>
    <main class="main tour-list">

    <section class="tour-cat__hero">
            <div class="container">
            <?php if ($query_cat->have_posts()) : while ($query_cat->have_posts()) : $query_cat->the_post(); 
            $files =  'fly_gallery_img_meta';
            ?>
                <div class="tour-cat__wrapper">
                
                    <div class="tour-cat__row-top">
                    <?php foreach ( (array) $files as $attachment_id => $attachment_url ) { ?>
                        <div><img src="<?php echo $attachment_url ?>" alt="" class="tour-cat__row-image"></div> 
                    <?php $count++; if($count>7){break;} } ?>
                    </div>
                    <div class="tour-cat__row-bottom">
                    <?php $count=1; foreach ( (array) $files as $attachment_id => $attachment_url ) {
                        if($count>7){ ?>
                        <div><img src="<?php echo $attachment_url ?>" alt="" class="tour-cat__row-image"></div> 
                    <?php  }$count++; } ?>
                    </div>
                </div>
                <?php endwhile;endif; ?>
                <div class="tour-cat__title-wrapper">
                    <h1 class="tour-cat__title">
                        لیست کامل   <?php single_cat_title(); ?>
                    </h1>
                </div>
            </div>
        </section>
        
        <div class="tour-list__content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9">

                        <!-- review  -->
                        <section class="tour-detail-infos">
                            <div class="tour-detail-wrapper">
                                <span class="tour-detail__badge">بررسی کلی</span>
                                <div class="tour-detail__items">
                                    <div class="tour-detail__item primary">
                                        <span>
                                            نام هتل: Hotel Mercur Bomonti
                                        </span>
                                    </div>
                                    <div class="tour-detail__item primary">
                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1631_19)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0 6.5C0 6.22386 0.144627 6 0.323033 6H15.677C15.8554 6 16 6.22386 16 6.5C16 6.77614 15.8554 7 15.677 7H0.323033C0.144627 7 0 6.77614 0 6.5Z"
                                                    fill="#094899" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4 10.3235C4 10.1448 4.13928 10 4.31109 10H4.31878C4.49059 10 4.62987 10.1448 4.62987 10.3235C4.62987 10.5022 4.49059 10.647 4.31878 10.647H4.31109C4.13928 10.647 4 10.5022 4 10.3235ZM7.68891 10.3235C7.68891 10.1448 7.82819 10 8 10H8.00769C8.1795 10 8.31878 10.1448 8.31878 10.3235C8.31878 10.5022 8.1795 10.647 8.00769 10.647H8C7.82819 10.647 7.68891 10.5022 7.68891 10.3235ZM11.3701 10.3235C11.3701 10.1448 11.5094 10 11.6812 10H11.6889C11.8607 10 12 10.1448 12 10.3235C12 10.5022 11.8607 10.647 11.6889 10.647H11.6812C11.5094 10.647 11.3701 10.5022 11.3701 10.3235ZM4 13.6765C4 13.4978 4.13928 13.353 4.31109 13.353H4.31878C4.49059 13.353 4.62987 13.4978 4.62987 13.6765C4.62987 13.8552 4.49059 14 4.31878 14H4.31109C4.13928 14 4 13.8552 4 13.6765ZM7.68891 13.6765C7.68891 13.4978 7.82819 13.353 8 13.353H8.00769C8.1795 13.353 8.31878 13.4978 8.31878 13.6765C8.31878 13.8552 8.1795 14 8.00769 14H8C7.82819 14 7.68891 13.8552 7.68891 13.6765ZM11.3701 13.6765C11.3701 13.4978 11.5094 13.353 11.6812 13.353H11.6889C11.8607 13.353 12 13.4978 12 13.6765C12 13.8552 11.8607 14 11.6889 14H11.6812C11.5094 14 11.3701 13.8552 11.3701 13.6765Z"
                                                    fill="#094899" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.19539 2.15019C1.97504 1.38001 3.08058 1 4.39121 1H11.6166C12.9309 1 14.0368 1.37986 14.8148 2.15051C15.5951 2.92353 16.004 4.04865 16 5.45027C16 5.45009 16 5.45046 16 5.45027V13.5418C16 14.9434 15.589 16.0703 14.808 16.8451C14.0293 17.6177 12.9236 18 11.6087 18H4.39121C3.07866 18 1.97243 17.6104 1.19316 16.8256C0.412291 16.0391 0 14.8963 0 13.4747V5.44981C0 4.04767 0.413271 2.92281 1.19539 2.15019ZM1.63634 2.63222C1.00935 3.25159 0.639999 4.18537 0.639999 5.44981V13.4747C0.639999 14.7617 1.01033 15.7152 1.63858 16.348C2.26841 16.9824 3.19779 17.3349 4.39121 17.3349H11.6087C12.8078 17.3349 13.7376 16.9877 14.3661 16.3641C14.9923 15.7428 15.36 14.8068 15.36 13.5418V5.44981V5.44879C15.3637 4.18409 14.9979 3.25077 14.3732 2.6319C13.7459 2.01056 12.8162 1.66507 11.6166 1.66507H4.39121C3.19587 1.66507 2.26581 2.01041 1.63634 2.63222Z"
                                                    fill="#094899" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.5 0C11.7761 0 12 0.124649 12 0.278412V2.72159C12 2.87535 11.7761 3 11.5 3C11.2239 3 11 2.87535 11 2.72159V0.278412C11 0.124649 11.2239 0 11.5 0Z"
                                                    fill="#094899" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.5 0C4.77614 0 5 0.124649 5 0.278412V2.72159C5 2.87535 4.77614 3 4.5 3C4.22386 3 4 2.87535 4 2.72159V0.278412C4 0.124649 4.22386 0 4.5 0Z"
                                                    fill="#094899" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1631_19">
                                                    <rect width="16" height="18" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        <span>
                                            مدت اقامت : ۵ شب
                                        </span>
                                    </div>
                                    <div class="tour-detail__item primary">
                                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1630_16)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.3622 8.27539C10.3622 6.96318 9.30873 5.8999 8.00871 5.8999C6.70964 5.8999 5.65625 6.96318 5.65625 8.27539C5.65625 9.58661 6.70964 10.6499 8.00871 10.6499C9.30873 10.6499 10.3622 9.58661 10.3622 8.27539Z"
                                                    stroke="#094899" stroke-width="0.8" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.99952 18.05C5.27197 18.05 0.941162 13.2607 0.941162 8.16866C0.941162 4.18229 4.10079 0.949951 7.99952 0.949951C11.8982 0.949951 15.0588 4.18229 15.0588 8.16866C15.0588 13.2607 10.728 18.05 7.99952 18.05Z"
                                                    stroke="#094899" stroke-width="0.8" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1630_16">
                                                    <rect width="16" height="19" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        <span>
                                            مشاهده هتل روی نقشه
                                        </span>
                                    </div>
                                    <div class="tour-detail__item secondary">
                                        <span>
                                            ستاره هتل : 4ستاره
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <section class="tour">

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
                                    class="swiper tourSlider mainSlider tourDetailSlider swiper-initialized swiper-horizontal swiper-rtl">
                                    <div class="swiper-wrapper" id="swiper-wrapper-d57e4adafd069c9c" aria-live="polite">
                                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="3 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="4 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="5 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="6 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="7 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="8 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="9 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="10 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                        <div class="swiper-slide" role="group" aria-label="11 / 11"
                                            style="width: 247.5px; margin-left: 40px;">
                                            <div class="tour-list__slider">
                                                <div class="tour-list__slider">
                                                    <div class="tour-list__slider-banner">
                                                        <img src="../../img/tours/1.jpg" alt="tours"
                                                            class="list__slider-banner">
                                                    </div>
                                                    <div class="tour-list__slider-content">
                                                        <div class="tour-list__slider-content-wrapper">
                                                            <div class="tour-list__slider-content-end">
                                                                <p>مقصد</p>
                                                                <span>کیش</span>
                                                            </div>
                                                            <div class="tour-list__slider-content--devide"></div>
                                                            <div class="tour-list__slider-content-icon">
                                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                        fill="#094899"></path>
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
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>

                            <div class="tour-shadow__left shadow left shadow-left"></div>
                            <div class="tour-shadow__right shadow right shadow-right"></div>
                        </section>

                    </div>
                    <div class="col-12 col-lg-3">
                        <aside class="tour-list__aside">
                            <div class="tour-list__aside-buttons">
                                <div class="tour-list__aside-buttons--item">
                                    <a class="tour-list__aside-buttons--consultation" href="#">درخواست مشاوره</a>
                                </div>
                                <div class="tour-list__aside-buttons--item">
                                    <a class="tour-list__aside-buttons--reservation" href="#">
                                        <span class="tour-list__aside-buttons--reservation-text">رزرو فوری تلفنی</span>
                                        <span class="tour-list__aside-buttons--reservation-item">۰۲۶-۳۶۱۴۷</span>
                                    </a>

                                </div>
                                <div class="tour-list__aside-buttons--item">
                                    <a class="tour-list__aside-buttons--price" href="#">قیمت برای هر شب</a>

                                </div>
                                <div class="tour-list__aside-buttons--item">
                                    <a class="tour-list__aside-buttons--destination" href="#">
                                        <span class="tour-list__aside-buttons--reservation-start">مبدا: استانبول</span>
                                        <span class="tour-list__aside-buttons--reservation-end">مقصد: تهران</span>
                                    </a>

                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>

    </main>



<?php get_footer(); ?>