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
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <aside class="tour-cat__sidebar">
                            <div class="tour-cat__sidebar-title">
                                <h3>فیلتر ها</h3>
                            </div>
                            <div class="tour-cat__sidebar-search">
                                <form class="tour-cat__sidebar-search-form">
                                    <h3>جستجوی هتل</h3>
                                    <input id="keyword" onkeyup="fetch()" type="text" placeholder="نام هتل را وارد کنید...">
                                </form>
                            </div>
                            <div class="tour-cat__sidebar-stars">
                                <ul class="tour-cat__sidebar-list">
                                    <li class="tour-cat__sidebar-list--stars" data-value="1">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.75 5.59336H9.72422L7.875 0L6.02578 5.59336H0L4.92891 9.03516L3.00937 14.6285L7.875 11.1621L12.7406 14.6285L10.8176 9.03516L15.75 5.59336ZM11.6227 13.1238L7.875 10.452L4.12734 13.1238L5.625 8.81719L1.82812 6.19102H6.43359L7.875 1.85625L9.31641 6.19102H13.9219L10.125 8.81367L11.6227 13.1238Z"
                                                fill="transparent" />
                                        </svg>
                                        <span>1 ستاره</span>

                                    </li>
                                    <li class="tour-cat__sidebar-list--stars" data-value="2">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.75 5.59336H9.72422L7.875 0L6.02578 5.59336H0L4.92891 9.03516L3.00937 14.6285L7.875 11.1621L12.7406 14.6285L10.8176 9.03516L15.75 5.59336ZM11.6227 13.1238L7.875 10.452L4.12734 13.1238L5.625 8.81719L1.82812 6.19102H6.43359L7.875 1.85625L9.31641 6.19102H13.9219L10.125 8.81367L11.6227 13.1238Z"
                                                fill="transparent" />
                                        </svg>
                                        <span>2 ستاره</span>
                                    </li>
                                    <li class="tour-cat__sidebar-list--stars" data-value="3">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.75 5.59336H9.72422L7.875 0L6.02578 5.59336H0L4.92891 9.03516L3.00937 14.6285L7.875 11.1621L12.7406 14.6285L10.8176 9.03516L15.75 5.59336ZM11.6227 13.1238L7.875 10.452L4.12734 13.1238L5.625 8.81719L1.82812 6.19102H6.43359L7.875 1.85625L9.31641 6.19102H13.9219L10.125 8.81367L11.6227 13.1238Z"
                                                fill="transparent" />
                                        </svg>
                                        <span>3 ستاره</span>
                                    </li>
                                    <li class="tour-cat__sidebar-list--stars" data-value="4">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.75 5.59336H9.72422L7.875 0L6.02578 5.59336H0L4.92891 9.03516L3.00937 14.6285L7.875 11.1621L12.7406 14.6285L10.8176 9.03516L15.75 5.59336ZM11.6227 13.1238L7.875 10.452L4.12734 13.1238L5.625 8.81719L1.82812 6.19102H6.43359L7.875 1.85625L9.31641 6.19102H13.9219L10.125 8.81367L11.6227 13.1238Z"
                                                fill="transparent" />
                                        </svg>
                                        <span>4 ستاره</span>
                                    </li>
                                    <li class="tour-cat__sidebar-list--stars" data-value="5">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.75 5.59336H9.72422L7.875 0L6.02578 5.59336H0L4.92891 9.03516L3.00937 14.6285L7.875 11.1621L12.7406 14.6285L10.8176 9.03516L15.75 5.59336ZM11.6227 13.1238L7.875 10.452L4.12734 13.1238L5.625 8.81719L1.82812 6.19102H6.43359L7.875 1.85625L9.31641 6.19102H13.9219L10.125 8.81367L11.6227 13.1238Z"
                                                fill="transparent" />
                                        </svg>
                                        <span>5 ستاره</span>
                                        
                                    </li>
                                </ul>
                            </div>
                        <?php
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                             }    
                             $_SESSION['1211'] = 'myVaria.;kasdasdasdasble';
                            echo  $_SESSION['1211'];
                        ?>
                        </aside>
                    </div>
                    <div class="col-12 col-lg-9">
                        <main class="tour-cat-main">
                            <div id="datafetch" class="tour-cat-main__wrapper">
                            <?php 
                            $args_tour =  array(
                                'post_type' => 'tours',
                                'post_status' => 'publish',
                                'tax_query' => array(
                                  array(
                                           'taxonomy' => 'tourcat',
                                           'field' => 'term_id',
                                           'terms'    => $cat->term_id
                                       ),
                                   ),
                                  
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
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="hotel">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="hotel-box__header" style="display: flex;justify-content: center;">
                                                <div class="ticket__header-box" style="width: 100%;">
                                                    <div class="row" style="height: 58px;">
                                                        <div class=""style="width: 100%;">
                                                            <!-- پیدار کردن متا باکس  -->
                                                            <?php $infoFly=get_post_meta( get_the_ID(), 'fly_info_tuor_meta', true ); ?>
                                                            <!-- مدت زمان پرواز -->
                                                            <div class="col-12 col-sm-6" style=" display: flex; width: 41rem; justify-content: center;">
                                  
                                                             <?php if(!empty($infoFly[0]['fly_tour_time_flight_one_meta'])) { ?> 
                                                               <span class="flight-timing__item flight-timing__item-start" style=" display: flex; justify-content: center; ">
                                                               <?php echo $infoFly[0]['fly_tour_time_flight_one_meta'] ?>
                                                               </span>
                                                                <?php }  ?>
                                                                
                                                            </div>
                                                            <div class="flight-schematic">
                                                                <span class="bullet"></span>
                                                                <div class="flight-schematic__data">
                                                                  <!-- مبدا و ساعت پرواز -->
                                                                    
                                                             <?php if(!empty($infoFly[0]['Origin_flight_and_time_one_meta'])) { ?> 
                                                               <span class="flight-timing__item flight-timing__item-start">
                                                               <?php echo $infoFly[0]['Origin_flight_and_time_one_meta'] ?>
                                                               </span>
                                                                <?php }  ?>

                                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.9427 3.47988C13.9121 3.43473 13.871 3.3978 13.8229 3.37234C13.7748 3.34679 13.7211 3.3334 13.6666 3.3334L11 3.3334C10.9333 3.3334 10.8682 3.35335 10.813 3.39071C10.7579 3.42808 10.7151 3.4811 10.6904 3.54296L10.1077 5.00001L8.46252 5.00001L9.98271 0.438813C9.99944 0.388675 10.004 0.335388 9.99609 0.28315C9.98814 0.230913 9.9679 0.181301 9.93703 0.138425C9.90616 0.0956379 9.86554 0.0607249 9.81852 0.0366627C9.77151 0.0125128 9.71945 5.79457e-07 9.66662 5.74839e-07C9.6394 5.72459e-07 9.61228 0.00332603 9.58591 0.0100637L6.91922 0.676726C6.87194 0.68845 6.82782 0.7105 6.78996 0.741125C6.7521 0.771751 6.72144 0.810337 6.70015 0.854175L4.68064 5.00001L2.79484 5.00001C2.19791 4.99809 1.6142 5.17606 1.11983 5.51077C0.625538 5.84546 0.243512 6.32135 0.0237118 6.87636C-0.00787578 6.9558 -0.00787579 7.04431 0.0237118 7.12376C0.243599 7.67878 0.625712 8.15467 1.12009 8.48936C1.61446 8.82405 2.19817 9.00203 2.79519 9.00007L4.68064 9.00007L6.70015 13.1459C6.72144 13.1898 6.7521 13.2283 6.78996 13.259C6.82782 13.2897 6.87194 13.3116 6.91922 13.3234L9.5859 13.99C9.64383 14.0045 9.7046 14.0032 9.76184 13.9862C9.81908 13.9691 9.87069 13.937 9.91126 13.8932C9.95182 13.8493 9.97986 13.7954 9.99243 13.737C10.005 13.6786 10.0016 13.618 9.98271 13.5613L8.46252 9.00007L10.1077 9.00007L10.6904 10.4571C10.7151 10.519 10.7579 10.572 10.813 10.6094C10.8682 10.6468 10.9333 10.6667 11 10.6668L13.6666 10.6668C13.7211 10.6667 13.7747 10.6534 13.8229 10.6279C13.871 10.6024 13.9121 10.5654 13.9426 10.5203C13.9732 10.4752 13.9922 10.4234 13.9981 10.3692C14.0039 10.3151 13.9964 10.2603 13.9762 10.2097L12.6924 7.00006L13.9762 3.79041C13.9964 3.73984 14.0039 3.68506 13.998 3.63099C13.9922 3.57683 13.9732 3.52494 13.9427 3.47988ZM12.0237 6.87636C11.9922 6.9558 11.9922 7.04431 12.0237 7.12376L13.1745 10.0001L11.2256 10.0001L10.6429 8.54304C10.6181 8.48117 10.5754 8.42812 10.5202 8.39076C10.4651 8.35339 10.3999 8.33341 10.3333 8.3334L7.99995 8.3334C7.94712 8.33335 7.89503 8.34587 7.84799 8.36993C7.80095 8.394 7.7603 8.42891 7.72943 8.47178C7.69855 8.51465 7.67831 8.56426 7.67039 8.61649C7.66246 8.66873 7.66709 8.7221 7.68387 8.77221L9.15848 13.1961L7.23173 12.7143L5.18875 8.52093C5.16136 8.46469 5.11875 8.41728 5.06581 8.38412C5.01279 8.35096 4.95145 8.33338 4.88898 8.3334L2.79519 8.3334C2.35454 8.33492 1.92264 8.21013 1.55076 7.97383C1.1788 7.73753 0.88235 7.3996 0.696499 7.00006C0.88235 6.60055 1.17871 6.26265 1.55059 6.02635C1.92246 5.79005 2.35428 5.66525 2.79484 5.66671L4.88898 5.66671C4.95145 5.66674 5.01279 5.64917 5.06573 5.61601C5.11875 5.58286 5.16136 5.53545 5.18875 5.47921L7.23173 1.28581L9.15849 0.804038L7.68387 5.22786C7.66708 5.27798 7.66245 5.33136 7.67037 5.3836C7.67829 5.43584 7.69853 5.48545 7.72941 5.52833C7.7603 5.5712 7.80093 5.60612 7.84798 5.63018C7.89502 5.65424 7.94712 5.66676 7.99995 5.66671L10.3333 5.66671C10.3999 5.6667 10.465 5.64673 10.5202 5.60936C10.5754 5.57199 10.6181 5.51895 10.6429 5.45708L11.2256 4.00006L13.1745 4.00006L12.0237 6.87636Z" fill="#094899"></path>
                                                                    </svg>
        
                                                                    <span class="font-size-xs text-light font-weight-bolder no-wrap-txt">
                                                                        <!-- مقصد و ساعت پرواز -->
                                                             <?php if(!empty($infoFly[0]['Destination_flight_and_time_one_meta'])) { ?> 
                                                               <span class="flight-timing__item flight-timing__item-start">
                                                               <?php echo $infoFly[0]['Destination_flight_and_time_one_meta'] ?>
                                                               </span>
                                                                <?php }  ?>
                                                                </div>
                                                                <svg class="flight-schematic__location" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokewidth="{1.5}" stroke="currentColor" classname="w-6 h-6">
                                                                    <path strokelinecap="round" strokelinejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                    <path strokelinecap="round" strokelinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <!-- میزان بار -->
                                                            <!-- <p>sda</p> -->
                                                            <!-- توقف -->
                                                            <!-- <p>sda</p> -->
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="ticket__header-box__buttons">
                                                            </div>
  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <?php if(!empty($hotel[0]['fly_tour_hotel_price_meta'])) { ?>
                                            <span style=" text-align: center; display: flex; justify-content: end; margin-left: 7rem; margin-top: 1rem; font-size: 1.5rem;">
                                              تومان:
                                              <?php echo $hotel[0]['fly_tour_hotel_price_meta'] ?>
                                          </span>
                                            <?php }  ?>
                
                                         <div class="hotel-box__body">
                                            <div class="row mb-none" style=" display: flex; flex-direction: row; justify-content:end;">
                                                <div class="col-12 col-sm-6">
                                                    <div class="hotel-box__body__right-title">
                                                        <p>نام هتل :</p>
                                                        <?php if(!empty($hotel[0]['fly_tour_hotel_name_meta'])) { ?>
                                                          <span><?php echo $hotel[0]['fly_tour_hotel_name_meta'] ?></span>
                                                                                                  
                                                          <?php }  ?>
                
                                                    </div>
                                                    <div class="hotel-box__body__right-title">
                                                        <p>تعداد ستاره: </p>
                                                        <div class="hotel-box__body__right-stars">
                                                        <?php
                                                        if(!empty($hotel[0]['fly_tour_hotel_star_meta'])) {
                                                        for ($i = 1; $i <= $hotel[0]['fly_tour_hotel_star_meta']; $i++) {
                                                            echo '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.875 6.27744H9.84922L8 0.684082L6.15078 6.27744H0.125L5.05391 9.71924L3.13437 15.3126L8 11.8462L12.8656 15.3126L10.9426 9.71924L15.875 6.27744ZM11.7477 13.8079L8 11.136L4.25234 13.8079L5.75 9.50127L1.95312 6.8751H6.55859L8 2.54033L9.44141 6.8751H14.0469L10.25 9.49775L11.7477 13.8079Z" fill="#FEDB1F"/>
                                                            </svg>';
                                                        }
                                                    }
                                                        ?>
                                                       
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6" style="    margin-right: -181px; display: flex; width: 41rem; margin-top:3rem; justify-content: end;" >
                                                    <div class="hotel-box__body__left-title">
                                                    <?php if(!empty($ticket[0]['fly_tour_ticket_price_meta'])) { ?>
                                                   <p><?php echo $ticket[0]['fly_tour_ticket_price_meta'] ?></p>
                                                    <?php }  ?>
                                                    <?php if(!empty($ticket[0]['fly_tour_ticket_start_price_meta'])) { ?>
                                                   <span><?php echo $ticket[0]['fly_tour_ticket_start_price_meta'] ?></span>
                                                    <?php }  ?>
                                                       
                                                    </div>
                                                    <div class="hotel-box__body__left-buttons">
                                                        <a href="<?php the_permalink() ?>" class="hotel-box__body__left-view">
                                                            <span>مشاهده اتاق ها</span>
                                                            <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 10L1 5.50002L6 1" stroke="#E9237D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>     
                                                        </a>
                                                        <a class="tour-list__aside-buttons--reservation" href="#">
                                                            <span class="tour-list__aside-buttons--reservation-text">رزرو تلفنی تلفنی</span>
                                                            <?php $hotel = get_post_meta( get_the_ID(), 'fly_tour_hotel_meta', true ); ?>
                                                            <?php  if(!empty ($hotel[0]['fly_tour_hotel_main_phonenumber_meta'])) {?>
                                                                <div class="tour-list__aside-buttons--reservation-item">
                                                                <?php echo $hotel[0]['fly_tour_hotel_main_phonenumber_meta'] ?>

                                                                    <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M6 10L1 5.50002L6 1" stroke="#094899" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>
                                                                </div>
                                                                <?php } ?>
                                                            
                                                      
                                                        </a>
                                                    </div>
                                                </div>
                                          
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
   
