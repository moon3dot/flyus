<?php
add_action('wp_ajax_load_more_content','fu_load_more_content');
add_action('wp_ajax_nopriv_load_more_content','fu_load_more_content');

add_action('wp_ajax_data_fetch','data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');

function fu_load_more_content(){

    $page  = intval($_POST['page']);

    if($page){

        $posts_per_page  = 8;
        $offset = ($page) * $posts_per_page;
        $load_more_args = array(
            'post_type' => 'post',
            'offset'  => $offset,
            'posts_per_page' => $posts_per_page,
			'post_status' => 'publish',

        );
        $load_more_query = new WP_Query($load_more_args);
        $output_html = '';
        if($load_more_query->have_posts()):
            while($load_more_query->have_posts()):$load_more_query->the_post();
            $cat = get_the_category();
            $author_id = get_post_field('post_author', get_the_ID()); 
    
                    $output_html .= '<div class="col-12 col-sm-6 col-md-4 col-lg-3"><article class="article-box"><div class="article-box__banner">';
                    $output_html .='<img src="'. get_the_post_thumbnail_url() .'" alt="article"/><a href="'. get_category_link($cat[0]->cat_ID) .'" class="article-box__cat" >'.  $cat[0]->name .'</a></div><div class="article-box__content"><h3 class="article-box__content-title">';
                    $output_html.=' <a href="'. get_permalink() .'" >'. get_the_title() .'</a></h3><p class="article-box__desc">'.  strip_tags(get_the_excerpt()) .'</p>';
                    $output_html .= '<div class="article-box__author"> به قلم :<a href="'.  get_author_posts_url($author_id) .'">' . get_the_author() .'</a></div>';
                    $output_html.='<a href="'. get_permalink() .'" class="article-box__button"> بیشتر بدانید </a>';
                    $output_html.='</div></article></div></div>';
    
            endwhile;
            

        endif;
        $count =  $load_more_query->found_posts;
        wp_reset_postdata();
        $result = array();
        $result['count'] = $count;
        $result['content'] = $output_html;
        wp_die(json_encode($result));
    }

    wp_die(json_encode(array('count'=>0,'error'=>1)));


}

function data_fetch()
{
    $cat = $_POST['cat']; 
    $stars = $_POST['stars'];
    $text = $_POST['text'];
    $args = array(
        'post_type' => 'tours',
        'tax_query' => array(
            array(
                'taxonomy' => 'tourcat',
                'field' => 'term_id',
                'terms'    => $cat
            ),
        ),
        'meta_query' => array(
            'relation' => 'or',
            array(
                'key' => 'hotel_name', 
                'value' => $text,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'hotel_star', 
                'value' => $stars,
                'compare' => 'IN'
            )
            ),
        );
        $query = new WP_Query( $args );
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); 
            $ticket=get_post_meta( get_the_ID(), 'fly_tour_ticket_meta', true ); 
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
                    <div class="hotel-box__header">
                        <div class="ticket__header-box">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="flight-timing">
                                    <?php if(!empty($ticket[0]['fly_tour_departure_time_meta'])) { ?><span class="flight-timing__item flight-timing__item-start"><?php echo $ticket[0]['fly_tour_departure_time_meta'] ?></span> <?php }  ?>

                                    <?php if(!empty($ticket[0]['fly_tour_duration_of_movement_time_meta'])) { ?> <span class="flight-timing__item flight-timing__item-all"><?php echo $ticket[0]['fly_tour_duration_of_movement_time_meta'] ?></span> <?php }  ?>

                                    <?php if(!empty($ticket[0]['fly_tour_departure_time_meta'])) { ?> <span class="flight-timing__item flight-timing__item-end"><?php echo $ticket[0]['fly_tour_departure_time_meta'] ?></span> <?php }  ?>

                                        
                                    </div>
                                    <div class="flight-schematic">
                                        <span class="bullet"></span>
                                        <div class="flight-schematic__data">
                                            <span class="font-size-xs text-light font-weight-bolder no-wrap-txt">
                                            <?php //if(!empty($ticket[0]['fly_tour_departure_time_meta'])) { $date=$ticket[0]['fly_tour_departure_time_meta'];  }  ?>   
                                            1d 5h 5m
                                            </span>

                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.9427 3.47988C13.9121 3.43473 13.871 3.3978 13.8229 3.37234C13.7748 3.34679 13.7211 3.3334 13.6666 3.3334L11 3.3334C10.9333 3.3334 10.8682 3.35335 10.813 3.39071C10.7579 3.42808 10.7151 3.4811 10.6904 3.54296L10.1077 5.00001L8.46252 5.00001L9.98271 0.438813C9.99944 0.388675 10.004 0.335388 9.99609 0.28315C9.98814 0.230913 9.9679 0.181301 9.93703 0.138425C9.90616 0.0956379 9.86554 0.0607249 9.81852 0.0366627C9.77151 0.0125128 9.71945 5.79457e-07 9.66662 5.74839e-07C9.6394 5.72459e-07 9.61228 0.00332603 9.58591 0.0100637L6.91922 0.676726C6.87194 0.68845 6.82782 0.7105 6.78996 0.741125C6.7521 0.771751 6.72144 0.810337 6.70015 0.854175L4.68064 5.00001L2.79484 5.00001C2.19791 4.99809 1.6142 5.17606 1.11983 5.51077C0.625538 5.84546 0.243512 6.32135 0.0237118 6.87636C-0.00787578 6.9558 -0.00787579 7.04431 0.0237118 7.12376C0.243599 7.67878 0.625712 8.15467 1.12009 8.48936C1.61446 8.82405 2.19817 9.00203 2.79519 9.00007L4.68064 9.00007L6.70015 13.1459C6.72144 13.1898 6.7521 13.2283 6.78996 13.259C6.82782 13.2897 6.87194 13.3116 6.91922 13.3234L9.5859 13.99C9.64383 14.0045 9.7046 14.0032 9.76184 13.9862C9.81908 13.9691 9.87069 13.937 9.91126 13.8932C9.95182 13.8493 9.97986 13.7954 9.99243 13.737C10.005 13.6786 10.0016 13.618 9.98271 13.5613L8.46252 9.00007L10.1077 9.00007L10.6904 10.4571C10.7151 10.519 10.7579 10.572 10.813 10.6094C10.8682 10.6468 10.9333 10.6667 11 10.6668L13.6666 10.6668C13.7211 10.6667 13.7747 10.6534 13.8229 10.6279C13.871 10.6024 13.9121 10.5654 13.9426 10.5203C13.9732 10.4752 13.9922 10.4234 13.9981 10.3692C14.0039 10.3151 13.9964 10.2603 13.9762 10.2097L12.6924 7.00006L13.9762 3.79041C13.9964 3.73984 14.0039 3.68506 13.998 3.63099C13.9922 3.57683 13.9732 3.52494 13.9427 3.47988ZM12.0237 6.87636C11.9922 6.9558 11.9922 7.04431 12.0237 7.12376L13.1745 10.0001L11.2256 10.0001L10.6429 8.54304C10.6181 8.48117 10.5754 8.42812 10.5202 8.39076C10.4651 8.35339 10.3999 8.33341 10.3333 8.3334L7.99995 8.3334C7.94712 8.33335 7.89503 8.34587 7.84799 8.36993C7.80095 8.394 7.7603 8.42891 7.72943 8.47178C7.69855 8.51465 7.67831 8.56426 7.67039 8.61649C7.66246 8.66873 7.66709 8.7221 7.68387 8.77221L9.15848 13.1961L7.23173 12.7143L5.18875 8.52093C5.16136 8.46469 5.11875 8.41728 5.06581 8.38412C5.01279 8.35096 4.95145 8.33338 4.88898 8.3334L2.79519 8.3334C2.35454 8.33492 1.92264 8.21013 1.55076 7.97383C1.1788 7.73753 0.88235 7.3996 0.696499 7.00006C0.88235 6.60055 1.17871 6.26265 1.55059 6.02635C1.92246 5.79005 2.35428 5.66525 2.79484 5.66671L4.88898 5.66671C4.95145 5.66674 5.01279 5.64917 5.06573 5.61601C5.11875 5.58286 5.16136 5.53545 5.18875 5.47921L7.23173 1.28581L9.15849 0.804038L7.68387 5.22786C7.66708 5.27798 7.66245 5.33136 7.67037 5.3836C7.67829 5.43584 7.69853 5.48545 7.72941 5.52833C7.7603 5.5712 7.80093 5.60612 7.84798 5.63018C7.89502 5.65424 7.94712 5.66676 7.99995 5.66671L10.3333 5.66671C10.3999 5.6667 10.465 5.64673 10.5202 5.60936C10.5754 5.57199 10.6181 5.51895 10.6429 5.45708L11.2256 4.00006L13.1745 4.00006L12.0237 6.87636Z" fill="#094899"></path>
                                            </svg>

                                            <span class="font-size-xs text-light font-weight-bolder no-wrap-txt">
                                                <span>                                                                    
                                         <?php if(!empty($ticket[0]['fly_tour_number_stop_meta'])) { echo $ticket[0]['fly_tour_number_stop_meta'];  }  ?>   </span>
                                                <span>Stop</span>
                                            </span>
                                        </div>
                                        <svg class="flight-schematic__location" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokewidth="{1.5}" stroke="currentColor" classname="w-6 h-6">
                                            <path strokelinecap="round" strokelinejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path strokelinecap="round" strokelinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="ticket__header-box__buttons">
                                    <?php if(!empty($ticket[0]['fly_tour_type_meta'])) { ?><button class="ticket__header-box__button system"> <?php echo $ticket[0]['fly_tour_type_meta'] ?></button> <?php }  ?>
                                    <?php if(!empty($ticket[0]['fly_tour_number_chair_meta'])) { ?><button class="ticket__header-box__button chair">  <?php echo $ticket[0]['fly_tour_number_chair_meta'] ?> صندلی</button> <?php }  ?>
                                    <?php if(!empty($ticket[0]['fly_tour_kg_meta'])) { ?><button class="ticket__header-box__button load">  <?php echo $ticket[0]['fly_tour_kg_meta'] ?> کیلو بار  </button> <?php }  ?>  
                                    </div>
                                    <div class="ticket__header-box__desc">
                                    <?php if(!empty($ticket[0]['fly_tour_economy1_meta'])) { ?>
                                        <div class="ticket__header-box__desc--item">
                                            <p><?php echo $ticket[0]['fly_tour_economy1_meta'] ?></p>
                                            <span> کلاس نرخی </span>
                                        </div>
                                        <?php } ?>
                                        <?php if(!empty($ticket[0]['fly_tour_economy2_meta'])) { ?>
                                        <div class="ticket__header-box__desc--item">
                                            <p><?php echo $ticket[0]['fly_tour_economy2_meta'] ?></p>
                                            <span> کلاس نرخی </span>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <div class="hotel-box__body">
                    <div class="row mb-none">
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
                        <div class="col-12 col-sm-6">
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
                 
                                        <div class="tour-list__aside-buttons--reservation-item">۰۲۶-۳۶۱۴۷

                                            <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10L1 5.50002L6 1" stroke="#094899" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                        </div>
                                    
                              
                                </a>
                            </div>
                        </div>
                  
                    </div>
                 </div>
                </div>
            </div>
        </article>

        <?php endwhile;  wp_reset_postdata(); ?>
        <?php endif; 
         die();
}