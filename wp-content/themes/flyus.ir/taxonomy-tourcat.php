<!-- new style 1 -->
<?php get_header(); ?>
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

    <div class="mian">
        <section class="tour-cat__hero">
            <div class="container">
            <?php if ($query_cat->have_posts()) : while ($query_cat->have_posts()) : $query_cat->the_post(); 
            $files = get_post_meta( get_the_ID(), 'fly_gallery_img_meta', 1 );
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
        
    
        <div class="tour-cat__body">
            <div class="container">
                <div class="row mb-none">
                    <div class="col-12 col-lg-3">
                        <aside class="tour-cat__sidebar">
                            <div class="tour-cat__sidebar-title">
                                <h3>فیلتر ها</h3>
                            </div>

                            <div class="tour-cat__sidebar-stars">
                            <h3 id="tour-cat__sidebar-stars">ستاره هتل</h3>
                            <ul
                    class="tour-cat__sidebar-list"
                    id="tour-cat__sidebar-list">
                    <li class="tour-cat__sidebar-list--stars">
                      <span>5 ستاره</span>
                    </li>
                    <li class="tour-cat__sidebar-list--stars middle">
                      <span>4 ستاره</span>
                    </li>
                    <li class="tour-cat__sidebar-list--stars">
                      <span>کمتر از 4 ستاره</span>
                    </li>
                  </ul>
                            </div>
                            <div class="tour-cat__sidebar-search">
                  
                                <form class="tour-cat__sidebar-search-form">
                                <h3 id="aside-tour-cat-search-title">جستجوی نام هتل</h3>
                    <div
                      class="tour-cat__sidebar-searchbar"
                      id="tour-cat__sidebar-searchbar"
                    >
                    <div class="tour-cat__sidebar-searchbar-wrapper">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          class="w-6 h-6"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                          />
                        </svg>
                                    <input id="keyword" onkeyup="fetch()" type="text" placeholder="نام هتل را وارد کنید...">
                                </form>
                            </div>
                        </aside>
                    </div>


                    <div class="col-12 col-lg-9">
                        <main class="tour-cat-main">
                            <div id="datafetch" class="tour-cat-main__wrapper">
                            <?php 
                            $args_tour =  array(
                                'post_type' => 'tours',
                                'post_status' => 'publish',
                                  
                            );    
                            $query_tour = new WP_Query($args_tour);
                            if ($query_tour->have_posts()) :
									while ($query_tour->have_posts()) : $query_tour->the_post(); 
                                    // $ticket=get_post_meta( get_the_ID(), 'fly_tour_ticket_meta', true ); 
                                    $hotel=get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true );
                                    ?>


                <article class="hotel hotel-box">
                    <div class="row mb-none col-reverse-md">
                      <div class="col-12 col-md-4">
                        <div class="hotel-box__banner">
                          <div class="swiper tourboxSwiper">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                  <div class="swiper-parent-flex">
                                  <div class="swiper-button-next"></div>
                                  <div class="swiper-button-prev"></div>
                                  </div>
                              <img src="<?php the_post_thumbnail_url() ?>" alt="hotel" class="image-swiper-flex">
                            </div>
                        </div>
                        
                            
                            

                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-8">
                        <div class="hotel-box__header">
                          <div class="ticket__header-box">
                            <div class="row mb-none">
                              <div class="col-12 col-sm-9">
                                <div class="flight-timing">
                                
                                <?php if(!empty($hotel[0]['Destination_flight_and_time_one_meta'])) { ?><span class="flight-timing__item flight-timing__item-start"><?php echo $hotel[0]['fly_tour_departure_time_meta'] ?></span> <?php }  ?>
                                <?php if(!empty($ticket[0]['fly_tour_duration_of_movement_time_meta'])) { ?> <span class="flight-timing__item flight-timing__item-all"><?php echo $ticket[0]['fly_tour_duration_of_movement_time_meta'] ?></span> <?php }  ?>
                                <?php if(!empty($ticket[0]['fly_tour_departure_time_meta'])) { ?> <span class="flight-timing__item flight-timing__item-end"><?php echo $ticket[0]['fly_tour_departure_time_meta'] ?></span> <?php }  ?>

                                </div>
                                <div class="flight-schematic">
                                  <span class="bullet"></span>
                                  <div class="flight-schematic__data">
                                    <span class="font-size-xs text-light font-weight-bolder no-wrap-txt">
                                         <?php if(!empty($ticket[0]['fly_tour_departure_time_meta'])) { $date=$ticket[0]['fly_tour_departure_time_meta'];  }  ?>     
                                    ???
                                        </span>

                                    <svg
                                      width="14"
                                      height="14"
                                      viewBox="0 0 14 14"
                                      fill="none"
                                      xmlns="http://www.w3.org/2000/svg"
                                    >
                                      <path
                                        d="M13.9427 3.47988C13.9121 3.43473 13.871 3.3978 13.8229 3.37234C13.7748 3.34679 13.7211 3.3334 13.6666 3.3334L11 3.3334C10.9333 3.3334 10.8682 3.35335 10.813 3.39071C10.7579 3.42808 10.7151 3.4811 10.6904 3.54296L10.1077 5.00001L8.46252 5.00001L9.98271 0.438813C9.99944 0.388675 10.004 0.335388 9.99609 0.28315C9.98814 0.230913 9.9679 0.181301 9.93703 0.138425C9.90616 0.0956379 9.86554 0.0607249 9.81852 0.0366627C9.77151 0.0125128 9.71945 5.79457e-07 9.66662 5.74839e-07C9.6394 5.72459e-07 9.61228 0.00332603 9.58591 0.0100637L6.91922 0.676726C6.87194 0.68845 6.82782 0.7105 6.78996 0.741125C6.7521 0.771751 6.72144 0.810337 6.70015 0.854175L4.68064 5.00001L2.79484 5.00001C2.19791 4.99809 1.6142 5.17606 1.11983 5.51077C0.625538 5.84546 0.243512 6.32135 0.0237118 6.87636C-0.00787578 6.9558 -0.00787579 7.04431 0.0237118 7.12376C0.243599 7.67878 0.625712 8.15467 1.12009 8.48936C1.61446 8.82405 2.19817 9.00203 2.79519 9.00007L4.68064 9.00007L6.70015 13.1459C6.72144 13.1898 6.7521 13.2283 6.78996 13.259C6.82782 13.2897 6.87194 13.3116 6.91922 13.3234L9.5859 13.99C9.64383 14.0045 9.7046 14.0032 9.76184 13.9862C9.81908 13.9691 9.87069 13.937 9.91126 13.8932C9.95182 13.8493 9.97986 13.7954 9.99243 13.737C10.005 13.6786 10.0016 13.618 9.98271 13.5613L8.46252 9.00007L10.1077 9.00007L10.6904 10.4571C10.7151 10.519 10.7579 10.572 10.813 10.6094C10.8682 10.6468 10.9333 10.6667 11 10.6668L13.6666 10.6668C13.7211 10.6667 13.7747 10.6534 13.8229 10.6279C13.871 10.6024 13.9121 10.5654 13.9426 10.5203C13.9732 10.4752 13.9922 10.4234 13.9981 10.3692C14.0039 10.3151 13.9964 10.2603 13.9762 10.2097L12.6924 7.00006L13.9762 3.79041C13.9964 3.73984 14.0039 3.68506 13.998 3.63099C13.9922 3.57683 13.9732 3.52494 13.9427 3.47988ZM12.0237 6.87636C11.9922 6.9558 11.9922 7.04431 12.0237 7.12376L13.1745 10.0001L11.2256 10.0001L10.6429 8.54304C10.6181 8.48117 10.5754 8.42812 10.5202 8.39076C10.4651 8.35339 10.3999 8.33341 10.3333 8.3334L7.99995 8.3334C7.94712 8.33335 7.89503 8.34587 7.84799 8.36993C7.80095 8.394 7.7603 8.42891 7.72943 8.47178C7.69855 8.51465 7.67831 8.56426 7.67039 8.61649C7.66246 8.66873 7.66709 8.7221 7.68387 8.77221L9.15848 13.1961L7.23173 12.7143L5.18875 8.52093C5.16136 8.46469 5.11875 8.41728 5.06581 8.38412C5.01279 8.35096 4.95145 8.33338 4.88898 8.3334L2.79519 8.3334C2.35454 8.33492 1.92264 8.21013 1.55076 7.97383C1.1788 7.73753 0.88235 7.3996 0.696499 7.00006C0.88235 6.60055 1.17871 6.26265 1.55059 6.02635C1.92246 5.79005 2.35428 5.66525 2.79484 5.66671L4.88898 5.66671C4.95145 5.66674 5.01279 5.64917 5.06573 5.61601C5.11875 5.58286 5.16136 5.53545 5.18875 5.47921L7.23173 1.28581L9.15849 0.804038L7.68387 5.22786C7.66708 5.27798 7.66245 5.33136 7.67037 5.3836C7.67829 5.43584 7.69853 5.48545 7.72941 5.52833C7.7603 5.5712 7.80093 5.60612 7.84798 5.63018C7.89502 5.65424 7.94712 5.66676 7.99995 5.66671L10.3333 5.66671C10.3999 5.6667 10.465 5.64673 10.5202 5.60936C10.5754 5.57199 10.6181 5.51895 10.6429 5.45708L11.2256 4.00006L13.1745 4.00006L12.0237 6.87636Z"
                                        fill="#094899"
                                      ></path>
                                    </svg>

                                    <spanclass="font-size-xs text-light font-weight-bolder no-wrap-txt>
                                        <span>                                                                    
                                            <?php if(!empty($ticket[0]['fly_tour_number_stop_meta'])) { echo $ticket[0]['fly_tour_number_stop_meta'];  }  ?>   </span>
                                              <span>
                                              <span>???</span>
                                             <span>???</span>
                                        </span>
                                  </div>
                                  <svg
                                    class="flight-schematic__location"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    strokewidth="{1.5}"
                                    stroke="currentColor"
                                    classname="w-6 h-6"
                                  >
                                    <path
                                      strokelinecap="round"
                                      strokelinejoin="round"
                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                                    ></path>
                                    <path
                                      strokelinecap="round"
                                      strokelinejoin="round"
                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                                    ></path>
                                  </svg>
                                </div>
                              </div>
                              <div class="col-12 col-sm-3">
                                <div class="ticket__header-box-desc">
                                  <p>توقف: دارد</p>
                                  <p>میزان بار: 20 کیلوگرم</p>
                                  <!--  -->
                                    

                                  <!--  -->
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="hotel-box__body">
                          <div class="row mb-none">
                            <div class="col-12 col-sm-5">
                              <div class="hotel-box__body__right-title">
                              <?php if(!empty($hotel[0]['fly_tour_hotel_name_meta'])) { ?>
                                <span>
                                <?php echo $hotel[0]['fly_tour_hotel_name_meta'] ?>
                            </span>
                            <?php }  ?>
                              </div>
                              <div class="hotel-box__body__right-title">
                                <div class="hotel-box__body__right-stars">
                                  <svg
                                    width="14"
                                    height="13"
                                    viewBox="0 0 14 13"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                  >
                                    <path
                                      d="M3.26455 7.625L0.616112 5.49219C0.100487 5.07031 0.381737 4.22656 1.03799 4.20312L4.4833 4.10937C4.76455 4.10937 5.02236 3.92187 5.13955 3.64062L6.24111 0.734375C6.47549 0.125 7.34267 0.125 7.57705 0.734375L8.67861 3.64062C8.77236 3.92187 9.03017 4.08594 9.33486 4.10937L12.7802 4.20312C13.4599 4.22656 13.7411 5.07031 13.202 5.49219L10.5536 7.60156C10.3427 7.78906 10.2255 8.07031 10.2958 8.35156L11.1864 11.7734C11.3505 12.4062 10.6474 12.9219 10.1083 12.5703L7.34267 10.7188C7.1083 10.5547 6.80361 10.5547 6.56924 10.7188L3.7333 12.5469C3.1708 12.8984 2.46767 12.4062 2.65517 11.75L3.5458 8.32812C3.59267 8.09375 3.49892 7.78906 3.26455 7.625Z"
                                      fill="url(#paint0_linear_1762_1193)"
                                    />
                                    <defs>
                                      <linearGradient
                                        id="paint0_linear_1762_1193"
                                        x1="0.351011"
                                        y1="6.48652"
                                        x2="13.5375"
                                        y2="6.48652"
                                        gradientUnits="userSpaceOnUse"
                                      >
                                        <stop stop-color="#F9CB36" />
                                        <stop
                                          offset="0.5012"
                                          stop-color="#FFEAAF"
                                        />
                                        <stop
                                          offset="0.5617"
                                          stop-color="#FFE9A8"
                                        />
                                        <stop
                                          offset="0.8404"
                                          stop-color="#FFE38B"
                                        />
                                        <stop offset="1" stop-color="#FFE180" />
                                      </linearGradient>
                                    </defs>
                                  </svg>
                                  <svg
                                    width="14"
                                    height="13"
                                    viewBox="0 0 14 13"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                  >
                                    <path
                                      d="M3.26455 7.625L0.616112 5.49219C0.100487 5.07031 0.381737 4.22656 1.03799 4.20312L4.4833 4.10937C4.76455 4.10937 5.02236 3.92187 5.13955 3.64062L6.24111 0.734375C6.47549 0.125 7.34267 0.125 7.57705 0.734375L8.67861 3.64062C8.77236 3.92187 9.03017 4.08594 9.33486 4.10937L12.7802 4.20312C13.4599 4.22656 13.7411 5.07031 13.202 5.49219L10.5536 7.60156C10.3427 7.78906 10.2255 8.07031 10.2958 8.35156L11.1864 11.7734C11.3505 12.4062 10.6474 12.9219 10.1083 12.5703L7.34267 10.7188C7.1083 10.5547 6.80361 10.5547 6.56924 10.7188L3.7333 12.5469C3.1708 12.8984 2.46767 12.4062 2.65517 11.75L3.5458 8.32812C3.59267 8.09375 3.49892 7.78906 3.26455 7.625Z"
                                      fill="url(#paint0_linear_1762_1193)"
                                    />
                                    <defs>
                                      <linearGradient
                                        id="paint0_linear_1762_1193"
                                        x1="0.351011"
                                        y1="6.48652"
                                        x2="13.5375"
                                        y2="6.48652"
                                        gradientUnits="userSpaceOnUse"
                                      >
                                        <stop stop-color="#F9CB36" />
                                        <stop
                                          offset="0.5012"
                                          stop-color="#FFEAAF"
                                        />
                                        <stop
                                          offset="0.5617"
                                          stop-color="#FFE9A8"
                                        />
                                        <stop
                                          offset="0.8404"
                                          stop-color="#FFE38B"
                                        />
                                        <stop offset="1" stop-color="#FFE180" />
                                      </linearGradient>
                                    </defs>
                                  </svg>
                                  <svg
                                    width="14"
                                    height="13"
                                    viewBox="0 0 14 13"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                  >
                                    <path
                                      d="M3.26455 7.625L0.616112 5.49219C0.100487 5.07031 0.381737 4.22656 1.03799 4.20312L4.4833 4.10937C4.76455 4.10937 5.02236 3.92187 5.13955 3.64062L6.24111 0.734375C6.47549 0.125 7.34267 0.125 7.57705 0.734375L8.67861 3.64062C8.77236 3.92187 9.03017 4.08594 9.33486 4.10937L12.7802 4.20312C13.4599 4.22656 13.7411 5.07031 13.202 5.49219L10.5536 7.60156C10.3427 7.78906 10.2255 8.07031 10.2958 8.35156L11.1864 11.7734C11.3505 12.4062 10.6474 12.9219 10.1083 12.5703L7.34267 10.7188C7.1083 10.5547 6.80361 10.5547 6.56924 10.7188L3.7333 12.5469C3.1708 12.8984 2.46767 12.4062 2.65517 11.75L3.5458 8.32812C3.59267 8.09375 3.49892 7.78906 3.26455 7.625Z"
                                      fill="url(#paint0_linear_1762_1193)"
                                    />
                                    <defs>
                                      <linearGradient
                                        id="paint0_linear_1762_1193"
                                        x1="0.351011"
                                        y1="6.48652"
                                        x2="13.5375"
                                        y2="6.48652"
                                        gradientUnits="userSpaceOnUse"
                                      >
                                        <stop stop-color="#F9CB36" />
                                        <stop
                                          offset="0.5012"
                                          stop-color="#FFEAAF"
                                        />
                                        <stop
                                          offset="0.5617"
                                          stop-color="#FFE9A8"
                                        />
                                        <stop
                                          offset="0.8404"
                                          stop-color="#FFE38B"
                                        />
                                        <stop offset="1" stop-color="#FFE180" />
                                      </linearGradient>
                                    </defs>
                                  </svg>
                                  <svg
                                    width="14"
                                    height="13"
                                    viewBox="0 0 14 13"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                  >
                                    <path
                                      d="M3.26455 7.625L0.616112 5.49219C0.100487 5.07031 0.381737 4.22656 1.03799 4.20312L4.4833 4.10937C4.76455 4.10937 5.02236 3.92187 5.13955 3.64062L6.24111 0.734375C6.47549 0.125 7.34267 0.125 7.57705 0.734375L8.67861 3.64062C8.77236 3.92187 9.03017 4.08594 9.33486 4.10937L12.7802 4.20312C13.4599 4.22656 13.7411 5.07031 13.202 5.49219L10.5536 7.60156C10.3427 7.78906 10.2255 8.07031 10.2958 8.35156L11.1864 11.7734C11.3505 12.4062 10.6474 12.9219 10.1083 12.5703L7.34267 10.7188C7.1083 10.5547 6.80361 10.5547 6.56924 10.7188L3.7333 12.5469C3.1708 12.8984 2.46767 12.4062 2.65517 11.75L3.5458 8.32812C3.59267 8.09375 3.49892 7.78906 3.26455 7.625Z"
                                      fill="url(#paint0_linear_1762_1193)"
                                    />
                                    <defs>
                                      <linearGradient
                                        id="paint0_linear_1762_1193"
                                        x1="0.351011"
                                        y1="6.48652"
                                        x2="13.5375"
                                        y2="6.48652"
                                        gradientUnits="userSpaceOnUse"
                                      >
                                        <stop stop-color="#F9CB36" />
                                        <stop
                                          offset="0.5012"
                                          stop-color="#FFEAAF"
                                        />
                                        <stop
                                          offset="0.5617"
                                          stop-color="#FFE9A8"
                                        />
                                        <stop
                                          offset="0.8404"
                                          stop-color="#FFE38B"
                                        />
                                        <stop offset="1" stop-color="#FFE180" />
                                      </linearGradient>
                                    </defs>
                                  </svg>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-sm-7">
                              <div class="hotel-box__body__left-title">
                              <?php if(!empty($ticket[0]['fly_tour_ticket_price_meta'])) { ?>
                                                   <p><?php echo $ticket[0]['fly_tour_ticket_price_meta'] ?></p>
                                                    <?php }  ?>
                                                    <?php if(!empty($ticket[0]['fly_tour_ticket_start_price_meta'])) { ?>
                                                   <span><?php echo $ticket[0]['fly_tour_ticket_start_price_meta'] ?></span>
                                                    <?php }  ?>   
                              </div>
                            </div>
                          </div>
                          <div class="hotel-box__body__left-buttons">
                            <a href="#" class="hotel-box__body__left-view">
                              <span>مشاهده اتاق ها</span>
                              <svg
                                width="7"
                                height="11"
                                viewBox="0 0 7 11"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  d="M6 10L1 5.50002L6 1"
                                  stroke="#E9237D"
                                  stroke-width="1.5"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                />
                              </svg>
                            </a>
                            <a class="hotel-box__body__left-reserve" href="<?php the_permalink() ?>">
                             
                             <p class="hotel-box__body__left-reserve-text">
                                <span class="phone-reserve">رزرو تلفنی </span>
                                <svg
                                width="21"
                                  height="15"
                                  viewBox="0 0 21 15"
                                  fill="none"
                                  xmlns="http://www.w3.org/2000/svg"
                                  class="airplain-logo"
                                >
                                  <path
                                    d="M-2.15182e-07 10.0772L1.02953 10.0731L3.15812 8.26262L8.85266 8.68188L6.01892 15L7.54613 14.9801L12.9829 9.00829C19.0002 9.16035 21 7.46789 21 7.46789C21 7.46789 19.0145 5.78834 13.0092 5.97983L7.65093 0.00750508L6.08955 6.87491e-07L8.83577 6.31148L3.13813 6.74952L1.04805 4.92978L0.0185249 4.9348L0.604465 7.43035L-2.15182e-07 10.0772Z"
                                    fill="#094899"
                                  />
                                </svg>
                              </p>
                             
                              <div class="number-section">
                              <?php $hotel = get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true ); ?>
                              <p class="hotel-box__body__left-reserve-number">
                              <?php  if(!empty ($hotel[0]['fly_tour_hotel_phonenumber_meta'])) {?>
                            <span class="tour-list__aside-buttons--reservation-item">
                                    <?php echo $hotel[0]['fly_tour_hotel_phonenumber_meta'] ?>  
                                </span>
                                <?php } ?>  
                              </p>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>

                    <?php endwhile; ?>
					<?php endif; ?>
                            
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

function fetch(){
        event.preventDefault();
        const stars = [];
        setTimeout(function() {
            var checkedValue =document.getElementsByClassName('tour-cat__sidebar-list--stars active');
            const arr = Array.from(checkedValue);
            arr.forEach(async (star) => {
            stars.push(star.dataset.value);
            });

        jQuery.ajax({

url: data.ajax_url,
type: 'post',
data: {
    action: 'data_fetch',
    stars: stars,
    cat:<?php echo $cat->term_id ?>,
    text: jQuery('#keyword').val() ,
},
success: function (response) {
    console.log(response)
    jQuery('#datafetch').html(response);

},
error: function () {
}

});

        
}, 1000);

}

jQuery(".tour-cat__sidebar-list--stars").on('click', function (event) { fetch() });

</script>

<?php get_footer(); ?>
   