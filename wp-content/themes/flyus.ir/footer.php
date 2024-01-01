<!-- footer  -->
<?php $footer_setting = fly_footer_get_option('fly_footer_item_options'); ?>
<footer class="footer">
    <form action="" class="footer__newsletter">
        <div class="footer__newsletter-title">
            <img src="<?php echo THEME_IMAGE . '/email-mac (1) 1.png' ?>" alt="newsletter"
                class="footer__newsletter-title-img" />
            <p class="footer__newsletter-title-item">عضویت در خبرنامه</p>
        </div>
        <input type="email" placeholder="ایمیل خود را وارد کمید" id="newsletter"
            class="footer__newsletter-form--input" />
        <button type="submit" class="footer__newsletter-submit">عضویت</button>
    </form>
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <?php $menu_name = wp_get_nav_menu_name('footerCol1');
                    $array_menu = wp_get_nav_menu_items($menu_name);
                    if($array_menu){ ?>
                <div class="col-6 col-sm-4 col-lg-20">
                    <nav class="footer__menu">
                    <?php if(!empty($footer_setting[0]['fly_footer_title1_option'])){ ?>
                        <div class="main-title color-white">
                            <h2 class="main-title__heading"><?php echo $footer_setting[0]['fly_footer_title1_option'];  ?></h2>
                            <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z">
                                </path>
                            </svg>
                        </div>
                        <?php } ?>
                        <ul class="footer__menu-list">
                            <?php
                        if(!empty($array_menu)) {
                            foreach ($array_menu as $menu_item) {
                                echo ' <li class="footer__menu-list-item"><a class="footer__menu-list-link" href="' . $menu_item->url . '">' . $menu_item->title . '</a> </li>';
                            }
                        }
                        ?>
                        </ul>
                    </nav>
                </div>
                <?php } ?>
                <?php 
                $menu_name1 = wp_get_nav_menu_name('footerCol2');
                $array_menu1 = wp_get_nav_menu_items($menu_name1);
                if($array_menu1){ ?>
                <div class="col-6 col-sm-4 col-lg-20">
                    <nav class="footer__menu">
                    <?php if(!empty($footer_setting[0]['fly_footer_title2_option'])){ ?>
                        <div class="main-title color-white">
                            <h2 class="main-title__heading"><?php echo $footer_setting[0]['fly_footer_title2_option']; ?></h2>
                            <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z">
                                </path>
                            </svg>
                        </div>
                        <?php } ?>
                        <ul class="footer__menu-list">
                        <?php
                        if(!empty($array_menu1)) {
                            foreach ($array_menu1 as $menu_item1) {
                                echo '<li class="footer__menu-list-item"><a class="footer__menu-list-link" href="' . $menu_item1->url . '">' . $menu_item1->title . '</a> </li>';
                            }
                        }
                        ?>
                            
                        </ul>
                    </nav>
                </div>
                <?php } ?>
                <?php 
                 $menu_name2 = wp_get_nav_menu_name('footerCol3');
                 $array_menu2 = wp_get_nav_menu_items($menu_name2);
                 if( $array_menu2) { ?>
                <div class="col-6 col-sm-4 col-lg-20">
                    <nav class="footer__menu">
                    <?php if(!empty($footer_setting[0]['fly_footer_title3_option'])){ ?>
                        <div class="main-title color-white">
                            <h2 class="main-title__heading"><?php echo $footer_setting[0]['fly_footer_title3_option'];  ?></h2>
                            <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z">
                                </path>
                            </svg>
                        </div>
                        <?php } ?>
                        <ul class="footer__menu-list">
                        <?php
                        if(!empty($array_menu2)) {
                            foreach ($array_menu2 as $menu_item2) {
                                echo '<li class="footer__menu-list-item"><a class="footer__menu-list-link" href="' . $menu_item2->url . '">' . $menu_item2->title . '</a> </li>';
                            }
                        }
                        ?>
                            
                        </ul>
                    </nav>
                </div>
                <?php } 
                 $menu_name3 = wp_get_nav_menu_name('footerCol4');
                 $array_menu3 = wp_get_nav_menu_items($menu_name3);
                 if( $array_menu3) { 
                ?>
                <div class="col-6 col-sm-4 col-lg-20">
                    <nav class="footer__menu">
                    <?php if(!empty($footer_setting[0]['fly_footer_title4_option'])){ ?>
                        <div class="main-title color-white">
                            <h2 class="main-title__heading"><?php echo $footer_setting[0]['fly_footer_title4_option']; ?></h2>
                            <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z">
                                </path>
                            </svg>
                        </div>
                        <?php } ?>
                        <ul class="footer__menu-list">
                        <?php
                        if(!empty($array_menu3)) {
                            foreach ($array_menu3 as $menu_item3) {
                                echo '<li class="footer__menu-list-item"><a class="footer__menu-list-link" href="' . $menu_item3->url . '">' . $menu_item3->title . '</a> </li>';
                            }
                        }
                        ?>
                       
                        </ul>
                    </nav>
                </div>
                <?php } 
                 $menu_name4 = wp_get_nav_menu_name('footerCol5');
                 $array_menu4 = wp_get_nav_menu_items($menu_name4);
                 if( $array_menu4) { 
                ?>
                <div class="col-6 col-sm-4 col-lg-20">
                    <nav class="footer__menu">
                    <?php if(!empty($footer_setting[0]['fly_footer_title5_option'])){ ?>
                        <div class="main-title color-white">
                            <h2 class="main-title__heading"><?php echo $footer_setting[0]['fly_footer_title5_option'];  ?></h2>
                            <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z">
                                </path>
                            </svg>
                        </div>
                        <?php } ?>

                        <ul class="footer__menu-list">
                        <?php
                        if(!empty($array_menu4)) {
                            foreach ($array_menu4 as $menu_item4) {
                                echo '<li class="footer__menu-list-item"><a class="footer__menu-list-link" href="' . $menu_item4->url . '">' . $menu_item4->title . '</a> </li>';
                            }
                        }
                        ?>  
                        </ul>
                    </nav>
                </div>
                <?php } ?>
            </div>
            <div class="footer__license">
                <div>
                <img referrerpolicy='origin' width="60" height="60" id='rgvjapfusizpjzpesizpoeuk' style='cursor:pointer'
                                    onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=359798&p=xlaodshwpfvljyoepfvlmcsi", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                                    alt='logo-samandehi'
                                    src='https://logo.samandehi.ir/logo.aspx?id=359798&p=qftiujynbsiyyndtbsiyaqgw' />
                </div>
                <div>
                <a referrerpolicy="origin" target="_blank"
                                    href="https://trustseal.enamad.ir/?id=361499&amp;Code=hz4TK9ulsP4LofMpCCk1"><img
                                        referrerpolicy="origin"
                                        src="https://Trustseal.eNamad.ir/logo.aspx?id=361499&amp;Code=hz4TK9ulsP4LofMpCCk1"
                                        alt="" style="cursor:pointer" id="hz4TK9ulsP4LofMpCCk1"></a>
                </div>
                <div>
                    <a href="https://caa.gov.ir/">
                        <img src="<?php echo THEME_IMAGE . '/license/Combined-Shape.svg' ?>" />
                    </a>
                </div>
                <div>
                    <a href="https://caa.gov.ir/paxrights">
                        <img src="<?php echo THEME_IMAGE . '/license/CAO.svg' ?>" />
                    </a>
                </div>
            </div>

            <button class="hotel-box__body__left-buttons">مشنور حقوق گردشگر</button>
            
            <div class="footer__copy-right">
                <p><?php if(isset($footer_setting[0]['fly_footer_copy_option'])){echo $footer_setting[0]['fly_footer_copy_option']; } ?></p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>