<section class="guide-iran">
            <div class="container">
                <div class="main-title">
                    <h2 class="main-title__heading">راهنمای سفر های داخل ایران</h2>
                    <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z" fill="#094899"></path>
                    </svg>
                  </div>
                  <div class="row flex">
                    <?php 
                    $args = array(
                        'post_type' => 'trip',
                        'posts_per_page' => 8,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tripcat',
                                'field' => 'slug', //can be set to ID
                                'terms' => 'trip-iran' //if field is ID you can reference by cat/term number
                            )
                        )
                    );
                    $query = new WP_Query( $args );
                    if ($query->have_posts()) :
                        while ($query->have_posts()):
                            $query->the_post(); ?>
                  
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 ">
                        <article class="travel-guide__box">
                            <div class="travel-guide__box-wrapper">
                                <img src="<?php the_post_thumbnail_url() ?>" alt="" class="travel-guide__box-thumbnail">
                                <div class="travel-guide__box-text">
                                    <div class="travel-guide__box-icon">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.79818 0.0645103C4.64176 0.184485 4.59611 0.355162 4.59611 0.820258V1.28788H3.25632H1.91652L1.77162 1.41229L1.62671 1.5367L1.60915 2.34073L1.59165 3.14475H0.946746C0.302878 3.14475 0.301691 3.14496 0.150949 3.29552L0 3.44629V11.9838V20.5214L0.124611 20.6661L0.249274 20.8108L6.54109 20.8259L12.833 20.841L13.1166 21.2644C13.8378 22.3406 15.0471 23.2528 16.3072 23.6713C17.0739 23.9259 17.5151 23.9975 18.3328 24C20.0778 24.0053 21.5538 23.4204 22.7889 22.234C23.7434 21.3171 24.3214 20.2996 24.6201 19.0099C24.7888 18.2812 24.8098 17.1507 24.6678 16.4382C24.1756 13.9684 22.3673 12.0533 19.9337 11.4242C19.5049 11.3133 19.2286 11.2783 18.6131 11.2568C17.6984 11.2248 17.1122 11.3052 16.3132 11.5725L15.8023 11.7435V8.8093C15.8023 5.68134 15.7963 5.60062 15.5519 5.46997C15.4946 5.43933 15.2835 5.41426 15.0828 5.41426H14.7179V4.6448C14.7179 4.22158 14.7034 3.83773 14.6858 3.79182C14.6204 3.62166 14.3821 3.55739 13.8167 3.55739H13.2719V3.22609C13.2719 2.94488 13.2517 2.87076 13.1382 2.73609C13.033 2.61116 12.9643 2.57774 12.8154 2.57903C12.4777 2.58197 12.3424 2.7723 12.3424 3.24451V3.55739H11.7445C11.1526 3.55739 11.1451 3.55889 10.9957 3.70816L10.8447 3.85893V4.6366V5.41426H10.5349H10.225V4.43028V3.44629L10.0741 3.29552C9.92336 3.14496 9.92217 3.14475 9.2783 3.14475H8.6334L8.61589 2.34073L8.59834 1.5367L8.45343 1.41229L8.30852 1.28788H6.91709H5.52566V0.801844C5.52566 0.354183 5.51507 0.303222 5.39196 0.157096C5.28671 0.0321698 5.21803 -0.00125393 5.0692 3.55702e-05C4.96519 0.000912427 4.84326 0.0299519 4.79818 0.0645103ZM7.69461 2.65474V3.14475H5.11252H2.53044V2.65474V2.16474H5.11252H7.69461V2.65474ZM9.2955 11.9907V19.9082H8.36595H7.4364V18.2021V16.496L7.28545 16.3452L7.1345 16.1944H5.11252H3.09055L2.9396 16.3452L2.78865 16.496V18.2021V19.9082H1.8591H0.92955V11.9907V4.07319H5.11252H9.2955V11.9907ZM13.84 4.95005V5.41426H12.8071H11.7743V4.95005V4.48583H12.8071H13.84V4.95005ZM2.03752 5.54089C1.86592 5.71224 1.8624 6.02146 2.03024 6.17899L2.14979 6.29112H5.11975H8.08972L8.20204 6.17177C8.36047 6.00331 8.35366 5.70677 8.18753 5.54089L8.0608 5.41426H5.11252H2.16425L2.03752 5.54089ZM14.8728 9.30147V12.2602L14.5242 12.5194C14.3325 12.6619 14.1314 12.8276 14.0773 12.8875C13.9817 12.9933 13.9385 12.9965 12.5696 12.9965C11.1614 12.9965 11.1602 12.9966 11.0181 13.1187C10.8217 13.2875 10.8209 13.5635 11.0162 13.7587L11.1567 13.8991L12.1369 13.9161C12.6759 13.9253 13.117 13.942 13.117 13.953C13.117 13.964 13.0299 14.1082 12.9233 14.2735C12.8168 14.4388 12.6734 14.6949 12.6046 14.8426L12.4796 15.1113H11.8003C11.1405 15.1113 11.1174 15.115 10.9983 15.2416C10.8223 15.4288 10.831 15.7052 11.0181 15.8659C11.1463 15.9761 11.209 15.9881 11.6551 15.9881H12.1498L12.1127 16.2331C12.0922 16.3679 12.0478 16.6754 12.0139 16.9166L11.9523 17.355L11.5348 17.3698C11.167 17.3829 11.1029 17.4 10.9965 17.5131C10.8223 17.6983 10.8319 17.9755 11.0181 18.1354C11.1419 18.2417 11.2135 18.2576 11.5696 18.2576C12.0317 18.2576 11.9721 18.192 12.0856 18.825C12.1186 19.0094 12.199 19.3285 12.2643 19.5342L12.383 19.9082H11.304H10.225V13.1254V6.3427H12.5489H14.8728V9.30147ZM2.14313 8.00125C1.98066 8.08997 1.91074 8.20566 1.91074 8.38573C1.91074 8.62304 1.95489 8.70882 2.12103 8.79465C2.24404 8.8582 2.71625 8.87011 5.11252 8.87011C8.11647 8.87011 8.19439 8.86433 8.28224 8.63568C8.32345 8.52834 8.32345 8.28344 8.28224 8.1761C8.19429 7.94719 8.11781 7.94157 5.1022 7.94322C3.13506 7.94431 2.21429 7.96236 2.14313 8.00125ZM11.0181 8.6313C10.8217 8.80001 10.8209 9.07602 11.0162 9.27125L11.1568 9.4117L12.3563 9.42764C13.0161 9.43641 13.6341 9.42908 13.7296 9.41134C14.1286 9.33717 14.2849 8.91586 14.0137 8.64502L13.8775 8.50905H12.5189C11.164 8.50905 11.16 8.50936 11.0181 8.6313ZM2.02301 10.64C1.86457 10.8085 1.87139 11.105 2.03752 11.2709L2.16425 11.3975H5.11252H8.0608L8.18753 11.2709C8.35913 11.0995 8.36264 10.7903 8.19481 10.6328L8.07526 10.5207H5.10529H2.13533L2.02301 10.64ZM11.0181 10.8492C10.8217 11.0179 10.8209 11.2939 11.0162 11.4892L11.1568 11.6296L12.3047 11.6463C12.9361 11.6556 13.5543 11.6479 13.6786 11.6293C14.1183 11.5637 14.2994 11.1611 14.0232 10.8635L13.8965 10.727H12.5285C11.1635 10.727 11.16 10.7273 11.0181 10.8492ZM18.9352 12.1748C20.9545 12.3997 22.7145 13.7128 23.4449 15.5395C23.7699 16.3521 23.8248 16.6515 23.825 17.6129C23.8251 18.3942 23.8106 18.5438 23.6916 18.9859C23.4264 19.9707 22.9695 20.757 22.238 21.4877C21.2313 22.4932 20.0442 23.022 18.6386 23.0911C16.2554 23.2083 14.0754 21.7794 13.2406 19.5531C12.9856 18.8731 12.8986 18.3782 12.8994 17.6129C12.9011 16.0154 13.4687 14.7257 14.6642 13.6034C15.5075 12.8116 16.5861 12.3089 17.7258 12.1765C18.2669 12.1137 18.3851 12.1135 18.9352 12.1748ZM2.03752 13.1747C1.85925 13.3527 1.8623 13.6552 2.04403 13.8257L2.17726 13.9507H5.11252H8.04778L8.18102 13.8257C8.36275 13.6552 8.36579 13.3527 8.18753 13.1747L8.0608 13.0481H5.11252H2.16425L2.03752 13.1747ZM17.4315 13.9822C16.1774 14.1648 15.1228 15.1121 14.7918 16.3537C14.6764 16.7864 14.6768 17.5118 14.7926 17.9482C15.0257 18.826 15.6781 19.6216 16.4737 19.9981C17.0348 20.2637 17.3174 20.329 17.9005 20.3278C18.5708 20.3264 19.2642 20.1181 19.7013 19.7866C19.7993 19.7123 19.8462 19.7495 20.6087 20.5046C21.3154 21.2044 21.4331 21.3008 21.5809 21.3008C21.8114 21.3008 22.051 21.0615 22.051 20.8313C22.051 20.6837 21.9545 20.5661 21.2537 19.8603C20.4978 19.0987 20.4606 19.0518 20.5349 18.954C20.6912 18.7484 20.9093 18.268 20.9936 17.944C21.1062 17.5106 21.1063 16.7801 20.9937 16.3492C20.6863 15.1725 19.6521 14.2138 18.4618 14.002C18.0012 13.9201 17.8754 13.9177 17.4315 13.9822ZM18.4363 14.9343C19.5604 15.1897 20.3439 16.3599 20.1494 17.4929C20.0614 18.0056 19.865 18.3852 19.4984 18.7514C18.5868 19.6619 17.2059 19.6613 16.2892 18.7499C15.3814 17.8473 15.3814 16.4516 16.2892 15.5466C16.888 14.9498 17.6046 14.7454 18.4363 14.9343ZM4.59611 18.5155V19.9082H4.15715H3.7182V18.5155V17.1229H4.15715H4.59611V18.5155ZM6.50685 18.5155V19.9082H6.01625H5.52566V18.5155V17.1229H6.01625H6.50685V18.5155Z" fill="white"/>
                                            </svg>
                                                                                       
                                    </div>
                                    <div class="travel-guide__box-devider">
                                        <svg width="7" height="46" viewBox="0 0 7 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.5 4.36602C0.833333 3.98111 0.833333 3.01886 1.5 2.63396L3.75 1.33493C4.41667 0.950028 5.25 1.43115 5.25 2.20095V4.79903C5.25 5.56883 4.41667 6.04995 3.75 5.66505L1.5 4.36602Z" fill="#094899"/>
                                            <path d="M1.5 12.1658C0.833333 11.7809 0.833333 10.8187 1.5 10.4338L3.75 9.13473C4.41667 8.74983 5.25 9.23096 5.25 10.0008V12.5988C5.25 13.3686 4.41667 13.8498 3.75 13.4649L1.5 12.1658Z" fill="#094899"/>
                                            <path d="M1.5 19.9656C0.833333 19.5807 0.833333 18.6185 1.5 18.2336L3.75 16.9345C4.41667 16.5496 5.25 17.0308 5.25 17.8006V20.3986C5.25 21.1684 4.41667 21.6496 3.75 21.2647L1.5 19.9656Z" fill="#094899"/>
                                            <path d="M1.5 27.7653C0.833333 27.3804 0.833333 26.4182 1.5 26.0333L3.75 24.7343C4.41667 24.3494 5.25 24.8305 5.25 25.6003V28.1984C5.25 28.9682 4.41667 29.4493 3.75 29.0644L1.5 27.7653Z" fill="#094899"/>
                                            <path d="M1.5 35.5652C0.833333 35.1803 0.833333 34.2181 1.5 33.8332L3.75 32.5342C4.41667 32.1493 5.25 32.6304 5.25 33.4002V35.9983C5.25 36.7681 4.41667 37.2492 3.75 36.8643L1.5 35.5652Z" fill="#094899"/>
                                            <path d="M1.5 43.365C0.833333 42.9801 0.833333 42.0179 1.5 41.633L3.75 40.334C4.41667 39.9491 5.25 40.4302 5.25 41.2V43.7981C5.25 44.5679 4.41667 45.049 3.75 44.6641L1.5 43.365Z" fill="#094899"/>
                                            </svg>
                                            
                                    </div>
                                    <div class="travel-guide__box-desc">
                                        <h2 class="travel-guide__box-desc_title"> <?php the_title() ?>  </h2>
                                        <a href="<?php the_permalink() ?>" class="travel-guide__box-desc_link">کلیک کنید</a>
                                            <svg class="travel-guide__box-desc_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                              </svg>
                                              
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php endwhile; 
                     endif;
                    wp_reset_postdata();
                    ?>
                  </div>
            </div>
</section>