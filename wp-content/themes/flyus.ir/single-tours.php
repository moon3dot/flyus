<?php get_header(); ?>
    <main class="main tour-list">

        <div class="container">
            <div class="row">
                <div class="col-8 tour-detail__hero">
                <!-- img -->
            <div class="container">
				<?php $gallery = get_post_meta( get_the_ID(), 'fly_tour_gallery_meta', true ); ?>
                <div class="tour-detail__hero-wrapper">
					<?php if ( ! empty( $gallery[0]['fly_tour_gallery_img_meta'] ) ) { ?>

                        <div class="tour-detail__hero-item tour-detail__hero-item--right">
                            <img src="<?php echo $gallery[0]['fly_tour_gallery_img_meta'] ?>" alt="travel"
                                 class="tour-detail__hero-item--banner tour-detail__hero-item--banner_main">
                        </div>
					<?php } ?>
                    <div class="tour-detail__hero-item tour-detail__hero-item_wrapper">
						<?php if ( ! empty( $gallery[0]['fly_tour_gallery_one_meta'] ) ) { ?>
                            <div class="tour-detail__hero-sub-item">
                                <img src="<?php echo $gallery[0]['fly_tour_gallery_one_meta'] ?>" alt="travel"
                                     class="tour-detail__hero-item--banner">
                            </div>
						<?php } ?>
						<?php if ( ! empty( $gallery[0]['fly_tour_gallery_two_meta'] ) ) { ?>
                            <div class="tour-detail__hero-sub-item">
                                <img src="<?php echo $gallery[0]['fly_tour_gallery_two_meta'] ?>" alt="travel"
                                     class="tour-detail__hero-item--banner">
                            </div>
						<?php } ?>
						<?php if ( ! empty( $gallery[0]['fly_tour_gallery_three_meta'] ) ) { ?>
                            <div class="tour-detail__hero-sub-item">
                                <img src="<?php echo $gallery[0]['fly_tour_gallery_three_meta'] ?>" alt="travel"
                                     class="tour-detail__hero-item--banner">
                            </div>
						<?php } ?>
						<?php if ( ! empty( $gallery[0]['fly_tour_gallery_four_meta'] ) ) { ?>
                            <div class="tour-detail__hero-sub-item">
                                <img src="<?php echo $gallery[0]['fly_tour_gallery_four_meta'] ?>" alt="travel"
                                     class="tour-detail__hero-item--banner">
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        
                </div>
            </div>
        </div>
            <!-- dital -->
        <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                <?php $hotel = get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true ); ?>
                <div class="col-12 col-lg-9" style="flex-grow:1;">
                <div class="tour-detail-wrapper">
                    <span class="tour-detail__badge">بررسی کلی</span>
                    <div class="tour-detail__items">
                        <div class="tour-detail__item primary" style="">
                        <?php if ( ! empty( $hotel[0]['fly_tour_hotel_name_meta'] ) ) { ?>
                            <span>
                                نام هتل: <?php echo $hotel[0]['fly_tour_hotel_name_meta'] ?>
                            </span>
                            <?php } ?>
                        </div>
                        <div class="tour-detail__item primary-btn">
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
                            <?php if ( ! empty( $hotel[0]['fly_tour_detail_meta'] ) ) { ?>
                            <span>
                                مدت اقامت :<?php echo $hotel[0]['fly_tour_detail_meta'] ?>
                            </span>
                            <?php } ?>
                        </div>
                        <div class="tour-detail__item primary-map">
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
                            <?php if ( ! empty( $hotel[0]['fly_tour_hotel_map_meta'] ) ) { 
                                $Url_googlemap = $hotel[0]['fly_tour_hotel_map_meta'] 
                                ?>
                                
                                <a href="<?php  echo $Url_googlemap ?>">
                                مشاهده هتل روی نقشه
                            </a>
                            <?php } ?>
                        </div>
                        <div class="tour-detail__item secondary">
                        <?php if ( ! empty( $hotel[0]['fly_tour_hotel_star_meta'] ) ) { ?>
                            <span>
                                ستاره هتل : <?php echo $hotel[0]['fly_tour_hotel_star_meta'] ?> ستاره
                            </span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
                            <!-- مخشصات پرواز -->
            <div class="col-12 col-lg-">
                <div class="main-title">
                    <h2 class="main-title__heading">مشخصات پرواز </h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>
                <div class="ticket__header-box">
                <?php $hotel = get_post_meta( get_the_ID(), 'fly_info_tuor_meta', true ); ?>
                    <div class="row">
                        <div class="col-12 col-sm-9">
                            <div class="flight-timing" style="
    display: flex;
    justify-content: center;
">
                                <!-- تایم کلی پرواز -->
                                <?php if ( ! empty( $hotel[0]['fly_tour_time_flight_one_meta'] ) ) { ?>
                                <span class="flight-timing__item flight-timing__item-all"><?php echo $hotel[0]['fly_tour_time_flight_one_meta'] ?></span>
                                <?php  } ?>
                                
                            </div>
                            <div class="flight-schematic">
                                <!-- اسم شرکت هواپیمایی رفت -->
                                <?php if( ! empty( $hotel[0]['fly_tours_name_airline_company_one_meta'])) { ?>
                                <span> <?php echo $hotel[0]['fly_tours_name_airline_company_one_meta'] ?></span>
                                <?php } ?>
                                <!-- لگوی شرکت هواپیمایی رفت -->
                                <?php if( ! empty( $hotel[0]['fly_tour_logo__airline_company_one_meta'])) { ?>
                                    <img style="white:40px; height: 40px;" src="<?php echo $hotel[0]['fly_tour_logo__airline_company_one_meta'] ?>"> 
                                <?php } ?>
                                <span class="bullet"></span>
                                <div class="flight-schematic__data">
                                <?php if(! empty( $hotel[0]['Origin_flight_and_time_one_meta'])) { ?>    
                                <span class="font-size-xs text-light font-weight-bolder no-wrap-txt">
                                    <?php echo $hotel[0]['Origin_flight_and_time_one_meta'] ?> 
                                    </span>
                                    <?php } ?>

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.9427 3.47988C13.9121 3.43473 13.871 3.3978 13.8229 3.37234C13.7748 3.34679 13.7211 3.3334 13.6666 3.3334L11 3.3334C10.9333 3.3334 10.8682 3.35335 10.813 3.39071C10.7579 3.42808 10.7151 3.4811 10.6904 3.54296L10.1077 5.00001L8.46252 5.00001L9.98271 0.438813C9.99944 0.388675 10.004 0.335388 9.99609 0.28315C9.98814 0.230913 9.9679 0.181301 9.93703 0.138425C9.90616 0.0956379 9.86554 0.0607249 9.81852 0.0366627C9.77151 0.0125128 9.71945 5.79457e-07 9.66662 5.74839e-07C9.6394 5.72459e-07 9.61228 0.00332603 9.58591 0.0100637L6.91922 0.676726C6.87194 0.68845 6.82782 0.7105 6.78996 0.741125C6.7521 0.771751 6.72144 0.810337 6.70015 0.854175L4.68064 5.00001L2.79484 5.00001C2.19791 4.99809 1.6142 5.17606 1.11983 5.51077C0.625538 5.84546 0.243512 6.32135 0.0237118 6.87636C-0.00787578 6.9558 -0.00787579 7.04431 0.0237118 7.12376C0.243599 7.67878 0.625712 8.15467 1.12009 8.48936C1.61446 8.82405 2.19817 9.00203 2.79519 9.00007L4.68064 9.00007L6.70015 13.1459C6.72144 13.1898 6.7521 13.2283 6.78996 13.259C6.82782 13.2897 6.87194 13.3116 6.91922 13.3234L9.5859 13.99C9.64383 14.0045 9.7046 14.0032 9.76184 13.9862C9.81908 13.9691 9.87069 13.937 9.91126 13.8932C9.95182 13.8493 9.97986 13.7954 9.99243 13.737C10.005 13.6786 10.0016 13.618 9.98271 13.5613L8.46252 9.00007L10.1077 9.00007L10.6904 10.4571C10.7151 10.519 10.7579 10.572 10.813 10.6094C10.8682 10.6468 10.9333 10.6667 11 10.6668L13.6666 10.6668C13.7211 10.6667 13.7747 10.6534 13.8229 10.6279C13.871 10.6024 13.9121 10.5654 13.9426 10.5203C13.9732 10.4752 13.9922 10.4234 13.9981 10.3692C14.0039 10.3151 13.9964 10.2603 13.9762 10.2097L12.6924 7.00006L13.9762 3.79041C13.9964 3.73984 14.0039 3.68506 13.998 3.63099C13.9922 3.57683 13.9732 3.52494 13.9427 3.47988ZM12.0237 6.87636C11.9922 6.9558 11.9922 7.04431 12.0237 7.12376L13.1745 10.0001L11.2256 10.0001L10.6429 8.54304C10.6181 8.48117 10.5754 8.42812 10.5202 8.39076C10.4651 8.35339 10.3999 8.33341 10.3333 8.3334L7.99995 8.3334C7.94712 8.33335 7.89503 8.34587 7.84799 8.36993C7.80095 8.394 7.7603 8.42891 7.72943 8.47178C7.69855 8.51465 7.67831 8.56426 7.67039 8.61649C7.66246 8.66873 7.66709 8.7221 7.68387 8.77221L9.15848 13.1961L7.23173 12.7143L5.18875 8.52093C5.16136 8.46469 5.11875 8.41728 5.06581 8.38412C5.01279 8.35096 4.95145 8.33338 4.88898 8.3334L2.79519 8.3334C2.35454 8.33492 1.92264 8.21013 1.55076 7.97383C1.1788 7.73753 0.88235 7.3996 0.696499 7.00006C0.88235 6.60055 1.17871 6.26265 1.55059 6.02635C1.92246 5.79005 2.35428 5.66525 2.79484 5.66671L4.88898 5.66671C4.95145 5.66674 5.01279 5.64917 5.06573 5.61601C5.11875 5.58286 5.16136 5.53545 5.18875 5.47921L7.23173 1.28581L9.15849 0.804038L7.68387 5.22786C7.66708 5.27798 7.66245 5.33136 7.67037 5.3836C7.67829 5.43584 7.69853 5.48545 7.72941 5.52833C7.7603 5.5712 7.80093 5.60612 7.84798 5.63018C7.89502 5.65424 7.94712 5.66676 7.99995 5.66671L10.3333 5.66671C10.3999 5.6667 10.465 5.64673 10.5202 5.60936C10.5754 5.57199 10.6181 5.51895 10.6429 5.45708L11.2256 4.00006L13.1745 4.00006L12.0237 6.87636Z"
                                            fill="#094899"></path>
                                    </svg>

                                    <span class="font-size-xs text-light font-weight-bolder no-wrap-txt">
                                        <span>
                                        </span>
                                        <?php if( ! empty( $hotel[0]['Destination_flight_and_time_one_meta'])) { ?>
                                        <span><?php echo $hotel[0]['Destination_flight_and_time_one_meta'] ?></span>
                                        <?php } ?>
                                    </span>
                                </div>
                                <svg class="flight-schematic__location" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokewidth="{1.5}" stroke="currentColor" classname="w-6 h-6">
                                    <path strokelinecap="round" strokelinejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path strokelinecap="round" strokelinejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3" style="display: flex; align-items: flex-end; margin-bottom: 38px;">
                            <div class="ticket__header-box__buttons" style="flex-grow: 1;">
                            <?php if( ! empty( $hotel[0]['Economy_one_meta'])) { ?>
                            <span> <?php echo $hotel[0]['Economy_one_meta'] ?></span> 
                            <?php } ?>
                            <?php if( ! empty( $hotel[0]['amount_of_load_one_meta'])) { ?>
                                <button class="ticket__header-box__button system" style="font-size:8px;"> میزان بار :<?php echo $hotel[0]['amount_of_load_one_meta']?> </button>
                                <?php } ?> 
                                <?php if( ! empty( $hotel[0]['Stopping_is_possible_one_meta'])) { ?>
                                <button class="ticket__header-box__button load"> <?php echo $hotel[0]['Stopping_is_possible_one_meta']?> : توقف</button>
                                <?php } ?>
                            </div>
                            <div class="ticket__header-box__desc">
                                <div class="ticket__header-box__desc--item">
                                    
                                </div>
                                <div class="ticket__header-box__desc--item">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-sm-9">
                            <div class="flight-timing">
                                <!-- تایم برگشت به مبدا -->
                                <?php if( ! empty( $hotel[0]['fly_tour_time_flight_two_meta'])) { ?>
                                <span class="flight-timing__item flight-timing__item-all"><?php echo $hotel[0]['fly_tour_time_flight_two_meta']?></span>
                                    <?php } ?>
                            </div>
                            <div class="flight-schematic">
                                <!-- نام شرکت پرواز برگشت -->
                                <?php if( ! empty( $hotel[0]['fly_tour_name_airline_company_two_meta'])) { ?>
                            <span><?php echo $hotel[0]['fly_tour_name_airline_company_two_meta']?></span>    
                            <?php  } ?>
                            <?php if( ! empty( $hotel[0]['fly_tour_logo__airline_company_two_meta'])) { ?>
                            <img src="<?php echo $hotel[0]['fly_tour_logo__airline_company_two_meta'] ?>" style="width:50px; height:50px;"> 
                            <?php } ?>
                                <svg class="flight-schematic__location" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokewidth="{1.5}" stroke="currentColor" classname="w-6 h-6">
                                    <path strokelinecap="round" strokelinejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path strokelinecap="round" strokelinejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                                    </path>
                                </svg>
                                <div class="flight-schematic__data">
                                    <?php if( ! empty( $hotel[0]['Origin_flight_and_time_two_meta'])) { ?>
                                    <span class="font-size-xs text-light font-weight-bolder no-wrap-txt">
                                        <?php echo $hotel[0]['Origin_flight_and_time_two_meta'] ?>  
                                    </span>
                                        <?php  } ?>
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.9427 3.47988C13.9121 3.43473 13.871 3.3978 13.8229 3.37234C13.7748 3.34679 13.7211 3.3334 13.6666 3.3334L11 3.3334C10.9333 3.3334 10.8682 3.35335 10.813 3.39071C10.7579 3.42808 10.7151 3.4811 10.6904 3.54296L10.1077 5.00001L8.46252 5.00001L9.98271 0.438813C9.99944 0.388675 10.004 0.335388 9.99609 0.28315C9.98814 0.230913 9.9679 0.181301 9.93703 0.138425C9.90616 0.0956379 9.86554 0.0607249 9.81852 0.0366627C9.77151 0.0125128 9.71945 5.79457e-07 9.66662 5.74839e-07C9.6394 5.72459e-07 9.61228 0.00332603 9.58591 0.0100637L6.91922 0.676726C6.87194 0.68845 6.82782 0.7105 6.78996 0.741125C6.7521 0.771751 6.72144 0.810337 6.70015 0.854175L4.68064 5.00001L2.79484 5.00001C2.19791 4.99809 1.6142 5.17606 1.11983 5.51077C0.625538 5.84546 0.243512 6.32135 0.0237118 6.87636C-0.00787578 6.9558 -0.00787579 7.04431 0.0237118 7.12376C0.243599 7.67878 0.625712 8.15467 1.12009 8.48936C1.61446 8.82405 2.19817 9.00203 2.79519 9.00007L4.68064 9.00007L6.70015 13.1459C6.72144 13.1898 6.7521 13.2283 6.78996 13.259C6.82782 13.2897 6.87194 13.3116 6.91922 13.3234L9.5859 13.99C9.64383 14.0045 9.7046 14.0032 9.76184 13.9862C9.81908 13.9691 9.87069 13.937 9.91126 13.8932C9.95182 13.8493 9.97986 13.7954 9.99243 13.737C10.005 13.6786 10.0016 13.618 9.98271 13.5613L8.46252 9.00007L10.1077 9.00007L10.6904 10.4571C10.7151 10.519 10.7579 10.572 10.813 10.6094C10.8682 10.6468 10.9333 10.6667 11 10.6668L13.6666 10.6668C13.7211 10.6667 13.7747 10.6534 13.8229 10.6279C13.871 10.6024 13.9121 10.5654 13.9426 10.5203C13.9732 10.4752 13.9922 10.4234 13.9981 10.3692C14.0039 10.3151 13.9964 10.2603 13.9762 10.2097L12.6924 7.00006L13.9762 3.79041C13.9964 3.73984 14.0039 3.68506 13.998 3.63099C13.9922 3.57683 13.9732 3.52494 13.9427 3.47988ZM12.0237 6.87636C11.9922 6.9558 11.9922 7.04431 12.0237 7.12376L13.1745 10.0001L11.2256 10.0001L10.6429 8.54304C10.6181 8.48117 10.5754 8.42812 10.5202 8.39076C10.4651 8.35339 10.3999 8.33341 10.3333 8.3334L7.99995 8.3334C7.94712 8.33335 7.89503 8.34587 7.84799 8.36993C7.80095 8.394 7.7603 8.42891 7.72943 8.47178C7.69855 8.51465 7.67831 8.56426 7.67039 8.61649C7.66246 8.66873 7.66709 8.7221 7.68387 8.77221L9.15848 13.1961L7.23173 12.7143L5.18875 8.52093C5.16136 8.46469 5.11875 8.41728 5.06581 8.38412C5.01279 8.35096 4.95145 8.33338 4.88898 8.3334L2.79519 8.3334C2.35454 8.33492 1.92264 8.21013 1.55076 7.97383C1.1788 7.73753 0.88235 7.3996 0.696499 7.00006C0.88235 6.60055 1.17871 6.26265 1.55059 6.02635C1.92246 5.79005 2.35428 5.66525 2.79484 5.66671L4.88898 5.66671C4.95145 5.66674 5.01279 5.64917 5.06573 5.61601C5.11875 5.58286 5.16136 5.53545 5.18875 5.47921L7.23173 1.28581L9.15849 0.804038L7.68387 5.22786C7.66708 5.27798 7.66245 5.33136 7.67037 5.3836C7.67829 5.43584 7.69853 5.48545 7.72941 5.52833C7.7603 5.5712 7.80093 5.60612 7.84798 5.63018C7.89502 5.65424 7.94712 5.66676 7.99995 5.66671L10.3333 5.66671C10.3999 5.6667 10.465 5.64673 10.5202 5.60936C10.5754 5.57199 10.6181 5.51895 10.6429 5.45708L11.2256 4.00006L13.1745 4.00006L12.0237 6.87636Z"
                                            fill="#094899"></path>
                                    </svg>

                                    <span class="font-size-xs text-light font-weight-bolder no-wrap-txt">
                                        <span>
                                        </span>
                                        <?php if( ! empty( $hotel[0]['Destination_flight_and_time_two_meta'])) { ?>
                                        <span><?php echo $hotel[0]['Destination_flight_and_time_two_meta'] ?></span>
                                        <?php  }?>
                                    </span>
                                </div>
                                <span class="bullet"></span>


                            </div>
                        </div>
                        <div class="col-12 col-sm-3" style="display: flex; align-items: flex-end; margin-bottom: 38px;">
                            <div class="ticket__header-box__buttons" style="flex-grow: 1;">
                            <?php if(! empty($hotel[0]['Economy_two_meta'])) { ?>    
                            <span> <?php echo $hotel[0]['Economy_two_meta']?> </span>
                            <?php } ?>
                            <?php if( ! empty( $hotel[0]['amount_of_load_two_meta'])) { ?>
                                <button class="ticket__header-box__button system" style ="font-size: 8px;" > میزان بار: <?php echo $hotel[0]['amount_of_load_two_meta']?> </button>
                                <?php  } ?>
                                <?php if(! empty( $hotel[0]['Stopping_is_possible_two_meta'])) { ?>
                                <button class="ticket__header-box__button load">توقف: <?php echo $hotel[0]['Stopping_is_possible_two_meta'] ?> </button>
                                <?php } ?>
                            </div>
                            <div class="ticket__header-box__desc">
                                <div class="ticket__header-box__desc--item">
                                    
                                   
                                </div>
                                <div class="ticket__header-box__desc--item">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                       <!-- مشاهده جدوال  هزینه ها -->
        <div class="col-12 col-lg-12">
                <div class="main-title">
                    <h2 class="main-title__heading">مشاهده جدول هزینه ها  </h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>
                <?php $hotel = get_post_meta( get_the_ID(), 'fly_paments_tuor_meta', true ); ?>
                <div class="table__container">
                <table class="table-price">
                    <thead>
                        <tr>
                        <th></th>
                        <th >یک تخته</th>
                        <th>دو تخته</th>
                        <th>کودک با تخت</th>
                        <th>کودک بدون تخت</th>
                        <th>کودک زیر 2 سال</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>هزینه ها</td>
                        <?php if(! empty($hotel[0]['Cost_of_1_bed_meta'])) {?>
                        <td><?php echo $hotel[0]['Cost_of_1_bed_meta'] ?></td>
                        <?php } ?>
                        <?php if(! empty($hotel[0]['Cost_of_2_bed_meta'])) {?>
                        <td><?php echo $hotel[0]['Cost_of_2_bed_meta'] ?></td>
                        <?php } ?>
                        <?php if(! empty($hotel[0]['cost_of_child_bed_meta'])) {?>
                        <td><?php echo $hotel[0]['cost_of_child_bed_meta'] ?></td>
                        <?php } ?>
                        <?php if(! empty($hotel[0]['Cost_without_baby_board_meta'])) {?>
                        <td><?php echo $hotel[0]['Cost_without_baby_board_meta'] ?></td>
                        <?php } ?>
                        <?php if(! empty($hotel[0]['child_under_2_years_old_meta'])) {?>
                        <td><?php echo $hotel[0]['child_under_2_years_old_meta'] ?></td>
                        <?php } ?>
                        
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- خدمات تور-->
            <div class="col-12 col-lg-12">
                <div class="main-title">
                    <h2 class="main-title__heading">خدمات تور </h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                        d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                            fill="#094899"></path>
                    </svg>
                </div>
                <?php $hotel = get_post_meta( get_the_ID(), 'fly_tours-Services_meta', true ); ?>
                <div class="table__container">
                <table class="table-price">
                    <thead>
                        <tr>
                        <th >وعده غذایی</th>
                        <th>ترنسفر فرودگاهی</th>
                        <th>بیمه مسافرتی</th>
                        <th>تور لیدر</th>
                        <th>ویزا</th>
                        <th>گشت شهری</th>
                        <th>سیم کارت</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(! empty($hotel[0]['Meal_tour_services_meta'])) {?>
                                <td>
                                    <?php echo $hotel[0]['Meal_tour_services_meta'] ?>
                                </td>
                                <?php } ?>
                                
                                <?php if(! empty($hotel[0]['airport_transfer_tour_services_meta'])) {?>
                                    <td>
                                        <?php echo $hotel[0]['airport_transfer_tour_services_meta'] ?>
                                    </td>
                                    <?php } ?>
                                    
                                    <?php if(! empty($hotel[0]['airport_transfer_tour_services_meta'])) {?>
                                        <td>
                                            <?php echo $hotel[0]['airport_transfer_tour_services_meta'] ?>
                                        </td>
                                        <?php } ?>
                                        <?php if(! empty($hotel[0]['tour_leader_tour_services_meta'])) {?>
                                            <td>
                                                <?php echo $hotel[0]['tour_leader_tour_services_meta'] ?>
                                            </td>
                                            <?php } ?>
                                            
                                            <?php if(! empty($hotel[0]['visa_tour_services_meta'])) {?>
                                                <td>
                                                    <?php echo $hotel[0]['visa_tour_services_meta'] ?>
                                                </td>
                                                <?php } ?>
                                            <?php if(! empty($hotel[0]['city_tour_tour_services_meta'])) {?>
                                                <td>
                                                    <?php echo $hotel[0]['city_tour_tour_services_meta'] ?>
                                                </td>
                                                <?php } ?>
                                        
                                            <?php if(! empty($hotel[0]['SIM_card_tour_services_meta'])) {?>
                                                <td>
                                                    <?php echo $hotel[0]['SIM_card_tour_services_meta'] ?>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- خدمات تور -->
                               <div class="col-12 col-lg-12">
                                   <div class="main-title">
                                       <h2 class="main-title__heading">توضیحات تور </h2>
                                       <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
                                           <path
                                               d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                               fill="#094899"></path>
                                       </svg>
                                   </div>
                                   <?php $hotel = get_post_meta( get_the_ID(), 'fly_pament_tuor_meta', true ); ?>
                                   <div class="table__container">
                                   <table class="table-price">
                                       <thead>
                                           <tr>
                                           <th >مدارک</th>
                                           <th>توضیحات</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                           <td>ساعت ورود</td>
                                           <?php if(! empty($hotel[0]['entrance_time_tour_description_meta'])) {?>
                                           <td><?php echo $hotel[0]['entrance_time_tour_description_meta'] ?></td>
                                           <?php } ?>
                                        </tr>
                                       </tbody>
                                       <thead>
                                           <tr>
                                           <td >ساعت خروج</th>
                                           <?php if(! empty($hotel[0]['leaving_hour_tour_description_meta'])) {?>
                                           <td><?php echo $hotel[0]['leaving_hour_tour_description_meta'] ?> </th>
                                           <?php } ?>
                                        </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                           <td>پاسپورت</td>
                                           <?php if(! empty($hotel[0]['passport_tour_description_meta'])) {?>
                                           <td><?php echo $hotel[0]['passport_tour_description_meta'] ?></td>
                                           <?php } ?>
                                        </tr>
                                       </tbody>
                                       <thead>
                                           <tr>
                                           <td >قوانین کنسلی</th>
                                           <?php if(! empty($hotel[0]['cancellation_rules_tour_description_meta'])) {?>
                                           <td><?php echo $hotel[0]['cancellation_rules_tour_description_meta'] ?></th>
                                           <?php } ?>
                                        </tr>
                                       </thead>
                                       
                                   </table>
                                   </div>
                                   </div>
                               </div>
             </div>            
                </div>
            </div>

            <div class="col-12 col-lg-3">
            <aside class="tour-list__aside">
                <div class="tour-list__aside-buttons">
                    <div class="tour-list__aside-buttons--item">
                        <a class="tour-list__aside-buttons--consultation" href="#">اطلاعات تماس</a>
                    </div>
                    <div class="tour-list__aside-buttons--item">
                        <a class="tour-list__aside-buttons--reservation" href="#">
                        <?php $hotel = get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true ); ?>
                            <span class="tour-list__aside-buttons--reservation-text">تماس جهت مشاوره و خرید</span>
                            <?php  if(!empty ($hotel[0]['fly_tour_hotel_phonenumber_meta'])) {?>
                            <span class="tour-list__aside-buttons--reservation-item">
                                    <?php echo $hotel[0]['fly_tour_hotel_phonenumber_meta'] ?>  
                                </span>
                                <?php } ?>
                        </a>

                    </div>
                    <div class="tour-list__aside-buttons--item">
                        <h3 style="text-align: right;">قیمت هر نفر:</h3>
                        <?php $hotel = get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true ); ?>
                        <a class="tour-list__aside-buttons--consultation" href="#">
                        <?php if(!empty($hotel[0]['fly_tour_hotel_price_meta'])) { ?>
                                                   <p><?php echo $hotel[0]['fly_tour_hotel_price_meta'] ?> تومان</p>
                                                    <?php }  ?>
                        </a>
                    </div>
                    <div class="tour-list__aside-buttons--item">
                        <?php $hotel = get_post_meta( get_the_ID(), 'fly_info_tuor_meta', true ); ?>
                        <a class="tour-list__aside-buttons--destination" href="#">
                        <?php if(!empty($hotel[0]['fly_tours_airline_origin_flight'])) { ?>
                                                   
                                                   <span class="tour-list__aside-buttons--reservation-start">مبدا: <?php echo $hotel[0]['fly_tours_airline_origin_flight'] ?></span> 
                                                   <?php }  ?>
                            
                            
                            <?php if(!empty($hotel[0]['fly_tours_airline_Destination_flight'])) { ?>
                                                   
                                                   <span class="tour-list__aside-buttons--reservation-end">مقصد: <?php echo $hotel[0]['fly_tours_airline_Destination_flight'] ?></span> 
                                                   <?php }  ?>
                        </a>

                    </div>
                </div>
            </aside>
        </div>

        </div>
        </div>
 
                                <!-- gotenberg text & post metabox -->
        <div class="tour-list__content">
            <div class="container">
                <div class="row">
					<?php $hotel = get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true ); ?>
                    <div class="col-12 col-lg-9">

                        <section class="content">
							<?php $paragragh = get_post_meta( get_the_ID(), 'fly_tour_paragraph_meta', true );

							if ( ! empty( $paragragh ) ) {
								foreach ( $paragragh as $item ) { ?>
                                    <h3 class="content__title"> <?php echo $item['fly_tour_paragraph_title_meta'] ?></h3>
                                    <p class="content__text">
										<?php echo $item['fly_tour_paragraph_desc_meta'] ?>
                                    </p>
								<?php }
							} ?>
                        </section>

                        <section class="tour">

                            <div class="main-title">
                                <h2 class="main-title__heading">
									<?php echo get_post_meta( get_the_ID(), 'fly_tour_list_main_title_meta', true ); ?>
                                </h2>
                                <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                          fill="#094899"></path>
                                </svg>
                            </div>
                            <div class="tour-slider">
                                <div class="swiper tourSlider mainSlider tourDetailSlider swiper-initialized swiper-horizontal swiper-rtl">
                                    <div class="swiper-wrapper" id="swiper-wrapper-d57e4adafd069c9c" aria-live="polite">
										<?php
										$cats = wp_get_object_terms( get_the_ID(), 'tourcat' );

										if ( $cats ) :
											$args = array(
												'post_type'      => 'tours',
												'posts_per_page' => 6,
												'post__not_in'   => array( $post->ID ),
												'post_status'    => 'publish',
												'tax_query'      => array(
													array(
														'taxonomy' => 'tourcat',
														'field'    => 'term_id',
														'terms'    => $cats[0]->term_id
													),
												),
											);

											$query_cat = new WP_Query( $args );

											if ( $query_cat->have_posts() ) :
												while ( $query_cat->have_posts() ) :
													$query_cat->the_post();
													$ticket_q = get_post_meta( get_the_ID(), 'fly_tour_ticket_meta', true );
													?>

                                                    <div class="swiper-slide swiper-slide-active" role="group"
                                                         aria-label="1 / 11" style="width: 247.5px; margin-left: 40px;">
                                                        <div class="tour-list__slider">
                                                            <div class="tour-list__slider">
                                                                <div class="tour-list__slider-banner">
                                                                    <img src="<?php the_post_thumbnail_url() ?>"
                                                                         alt="tours" class="list__slider-banner">
                                                                </div>
                                                                <div class="tour-list__slider-content">
                                                                    <div class="tour-list__slider-content-wrapper">
                                                                        <div class="tour-list__slider-content-end">
                                                                            <p>مقصد</p>
																			<?php if ( ! empty( $ticket_q[0]['fly_tour_destination_meta'] ) ) { ?>
                                                                                <span><?php echo $ticket_q[0]['fly_tour_destination_meta'] ?></span> <?php } ?>
                                                                        </div>
                                                                        <div class="tour-list__slider-content--devide"></div>
                                                                        <div class="tour-list__slider-content-icon">
                                                                            <svg width="15" height="11"
                                                                                 viewBox="0 0 15 11" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M-1.578e-07 7.38996L0.735379 7.38693L2.2558 6.05926L6.32333 6.36671L4.29923 11L5.39009 10.9854L9.27349 6.60608C13.5716 6.71759 15 5.47646 15 5.47646C15 5.47646 13.5818 4.24478 9.29232 4.38521L5.46495 0.00550437L4.34968 7.63544e-07L6.31127 4.62842L2.24152 4.94965L0.74861 3.61518L0.013232 3.61885L0.431761 5.44892L-1.578e-07 7.38996Z"
                                                                                      fill="#094899"></path>
                                                                            </svg>

                                                                        </div>
                                                                        <div class="tour-list__slider-content--devide"></div>
                                                                        <div class="tour-list__slider-content-start">
                                                                            <p>مبدا</p>
																			<?php if ( ! empty( $ticket_q[0]['fly_tour_origin_meta'] ) ) { ?>
                                                                                <span><?php echo $ticket_q[0]['fly_tour_origin_meta'] ?></span> <?php } ?>
                                                                        </div>
                                                                        <svg width="10" height="62" viewBox="0 0 10 62"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M2.14287 5.88464C1.19049 5.36585 1.19049 4.0689 2.14287 3.55012L5.35716 1.79926C6.30955 1.28047 7.50002 1.92894 7.50002 2.9665V6.46826C7.50002 7.50582 6.30955 8.15428 5.35716 7.63551L2.14287 5.88464Z"
                                                                                  fill="#094899"></path>
                                                                            <path d="M2.14287 16.3974C1.19049 15.8786 1.19049 14.5817 2.14287 14.0629L5.35716 12.312C6.30955 11.7933 7.50002 12.4417 7.50002 13.4793V16.981C7.50002 18.0185 6.30955 18.6671 5.35716 18.1483L2.14287 16.3974Z"
                                                                                  fill="#094899"></path>
                                                                            <path d="M2.14287 26.9101C1.19049 26.3914 1.19049 25.0945 2.14287 24.5757L5.35716 22.8248C6.30955 22.306 7.50002 22.9545 7.50002 23.9921V27.4938C7.50002 28.5313 6.30955 29.1799 5.35716 28.6611L2.14287 26.9101Z"
                                                                                  fill="#094899"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="tour-list__slider-footer">
                                                                    <div class="tour-list__slider-footer-price">
                                                                        <p>شروع قیمت :</p>
																		<?php if ( ! empty( $ticket_q[0]['fly_tour_ticket_start_price_meta'] ) ) { ?>
                                                                            <span><?php echo $ticket_q[0]['fly_tour_ticket_start_price_meta'] ?></span> <?php } ?>
                                                                    </div>
                                                                    <div class="tour-list__slider-footer-button">
                                                                        <a href="<?php the_permalink() ?>">برای مشاهده
                                                                            جزئیات بیشتر کلیک کنید </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
												<?php endwhile;
											endif;
										endif;
										wp_reset_postdata();
										?>


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
					<?php $ticket = get_post_meta( get_the_ID(), 'fly_tour_ticket_meta', true ); ?>
                    
                </div>
            </div>
        </div>

    </main>

<?php get_footer(); ?>