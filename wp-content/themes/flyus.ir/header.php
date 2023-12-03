<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
       wp_head();
    ?>
  </head>

  <body>
 
    <!-- header  -->
  <?php  $header_setting = fly_header_get_option('fly_header_item_options'); ?>

  <header class="header">
    <div class="header-list">
      <a href="<?php echo home_url() ?>" class="logo">
        <img src="<?php echo THEME_IMAGE . '/Logo.png' ?>" alt="FlyUs.ir" class="logo__img" />
      </a>
      <?php
 $menu = wp_get_nav_menu_name('main-menu');
 $menu_items = wp_get_nav_menu_items($menu);

		$menu_list  = '<nav class="navbar" id="nav">' ."\n";
		$menu_list .= '<ul class="navbar__list">' ."\n";

		$count = 0;
		$submenu = false;
		if($menu_items){
		foreach( $menu_items as $menu_item ) {
			
			$link = $menu_item->url;
			$title = $menu_item->title;
			
			if ( !$menu_item->menu_item_parent ) {
				$parent_id = $menu_item->ID;
				
				$menu_list .= '<li class="navbar__list-item">' ."\n";
				$menu_list .= '<a href="'.$link.'" class="navbar__list-link">'.$title.'</a>' ."\n";
			}

			if ( $parent_id == $menu_item->menu_item_parent ) {

				if ( !$submenu ) {
					$submenu = true;
					$menu_list .= '<ul class="navbar__list-submenu">' ."\n";
				}

				$menu_list .= '<li class="navbar__list-submenu-list">' ."\n";
				$menu_list .= '<a href="'.$link.'" class="navbar__list-submenu-link">'.$title.'</a>' ."\n";
				$menu_list .= '</li>' ."\n";
					

				if ( !empty($menu_items[ $count + 1 ]->menu_item_parent) != $parent_id && $submenu ){
					$menu_list .= '</ul>' ."\n";
					$submenu = false;
				}
        

			}

			if ( !empty($menu_items[ $count + 1 ]->menu_item_parent) && $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
				$menu_list .= '</li>' ."\n";      
				$submenu = false;
			} 

			$count++;
		}
  }
		
		$menu_list .= '</ul>' ."\n";
		$menu_list .= '</nav>' ."\n";

	
	echo $menu_list;

?>
      <nav class="responsive-nav" id="responsive-menu">

        <div class="responsive-nav__header">
          <div class="responsive-nav__header-close" id="close-responsive__nav">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

          </div>
        </div>
        <div class="responsive-nav__sec">
          <p class="responsive-nav__account-title">
            حساب کاربری
          </p>
          <div class="responsive-nav__account-btns">
            <a href="<?php if(!empty($header_setting[0]['fly_header_btn3_link_option'])) echo $header_setting[0]['fly_header_btn3_link_option'];  ?>" class="responsive-nav__account-login"><?php echo $header_setting[0]['fly_header_btn3_title_option'];  ?></a>
            <a href="<?php if(!empty($header_setting[0]['fly_header_btn4_link_option'])) echo $header_setting[0]['fly_header_btn4_link_option'];  ?>" class="responsive-nav__account-register"><?php echo $header_setting[0]['fly_header_btn4_title_option'];  ?></a>
          </div>
        </div>
        <div class="responsive-nav__sec">
          <p class="responsive-nav__account-title responsive-nav__account-title--header">
            خدمات
          </p>
          <?php
 $menu = wp_get_nav_menu_name('main-menu');
 $menu_items = wp_get_nav_menu_items($menu);

		$menu_list .= '<ul class="responsive-nav__list">' ."\n";

		$count = 0;
		$submenu = false;
		if($menu_items){
		foreach( $menu_items as $menu_item ) {
			
			$link = $menu_item->url;
			$title = $menu_item->title;
			
			if ( !$menu_item->menu_item_parent ) {
				$parent_id = $menu_item->ID;
				
				$menu_list .= '<li class="responsive-nav__list-item">' ."\n";
				$menu_list .= '<a href="'.$link.'" class="responsive-nav__list-link">'.$title.'</a>' ."\n";
			}
      

			if ( $parent_id == $menu_item->menu_item_parent ) {

				if ( !$submenu ) {
					$submenu = true;
					$menu_list .= '<ul class="responsive-nav__submenu">' ."\n";
				}

				$menu_list .= '<li class="responsive-nav__submenu-item">' ."\n";
				$menu_list .= '<a href="'.$link.'" class="responsive-nav__submenu-link">'.$title.'</a>' ."\n";
				$menu_list .= '</li>' ."\n";
					

				if ( !empty($menu_items[ $count + 1 ]->menu_item_parent) != $parent_id && $submenu ){
					$menu_list .= '</ul>' ."\n";
					$submenu = false;
				}
        

			}

			if ( !empty($menu_items[ $count + 1 ]->menu_item_parent) && $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
				$menu_list .= '</li>' ."\n";      
				$submenu = false;
			} 

			$count++;
		}
  }
		
		$menu_list .= '</ul>' ."\n";

	
	echo $menu_list;

?>
          <!--<ul class="responsive-nav__list">
            <li class="responsive-nav__list-item">
              <a href="" class="responsive-nav__list-link">بلیط</a>
            </li>
            <li class="responsive-nav__list-item">
              <a href="" class="responsive-nav__list-link">اقامت</a>
            </li>
            <li class="responsive-nav__list-item">
              <div href="" class="responsive-nav__list-link">
                <span>تور</span>
                <svg id="arrow-down-bold" class="responsive-nav__list-item--icon" viewBox="0 0 8 5" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L4.00001 4L7 1" stroke="#585858" stroke-width="0.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </div>
              <ul class="responsive-nav__submenu">
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور استانبول</a>
                </li>
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور ارمنستان</a>
                </li>
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور تایلند</a>
                </li>
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور اسپانسیا</a>
                </li>
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور فرانسه</a>
                </li>
              </ul>
            </li>
            <li class="responsive-nav__list-item">
              <div href="" class="responsive-nav__list-link">
                <span>تور</span>
                <svg id="arrow-down-bold" class="responsive-nav__list-item--icon" viewBox="0 0 8 5" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L4.00001 4L7 1" stroke="#585858" stroke-width="0.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </div>
              <ul class="responsive-nav__submenu">
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور استانبول</a>
                </li>
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور ارمنستان</a>
                </li>
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور تایلند</a>
                </li>
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور اسپانسیا</a>
                </li>
                <li class="responsive-nav__submenu-item">
                  <a href="#" class="responsive-nav__submenu-link">تور فرانسه</a>
                </li>
              </ul>
            </li>
            <li class="responsive-nav__list-item">
              <a href="" class="responsive-nav__list-link">بیشتر</a>
            </li>
            <li class="responsive-nav__list-item">
              <a href="" class="responsive-nav__list-link">راهنمای سفر</a>
            </li>
          </ul>-->
        </div>
        <div class="responsive-nav__sec">
          <p class="responsive-nav__account-title responsive-nav__account-title--header">
            ارتباط با ما
          </p>
          <ul class="responsive-nav__list">
            <li class="responsive-nav__list-item">
              <a href="<?php if(!empty($header_setting[0]['fly_header_contact_link_option'])) echo $header_setting[0]['fly_header_contact_link_option'];  ?>" class="responsive-nav__list-link"><?php echo $header_setting[0]['fly_header_contact_title_option'];  ?></a>
            </li>
            <li class="responsive-nav__list-item">
              <a href="<?php if(!empty($header_setting[0]['fly_header_about_link_option'])) echo $header_setting[0]['fly_header_about_link_option'];  ?>" class="responsive-nav__list-link"><?php echo $header_setting[0]['fly_header_about_title_option'];  ?></a>
            </li>
          </ul>
        </div>

      </nav>
      <div id="overlay" class="overlay"></div>
    </div>
    <div class="header-btns">
      <a href="<?php if(!empty($header_setting[0]['fly_header_btn1_link_option'])) echo $header_setting[0]['fly_header_btn1_link_option'];  ?>" class="header-btns__buy"> <?php echo $header_setting[0]['fly_header_btn1_title_option'];  ?> </a>
      <a href="<?php if(!empty($header_setting[0]['fly_header_btn2_link_option'])) echo $header_setting[0]['fly_header_btn2_link_option'];  ?>" class="header-btns__login"> <?php echo $header_setting[0]['fly_header_btn2_title_option'];  ?> </a>
    </div>

    <div class="responsive-button" id="responsive__toggle"></div>

    <div class="reponsive-navigation">
      <ul class="responsive-navigation__list">
        <li class="responsive-navigation__list-item">
          <a href="#" class="responsive-navigation__list-link">
            <svg class="responsive-navigation__list-icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_45_18238)">
                <path d="M7.41174 13.667H12.9412" stroke="#95A0AD" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M1.17651 11.5558C1.17651 6.55577 1.76475 6.88911 4.82357 4.22244C6.23534 3.11133 8.35299 1.11133 10.1177 1.11133C12 1.11133 14.1177 3.11133 15.5295 4.11133C18.5883 6.88911 19.1765 6.44466 19.1765 11.4447C19.1765 18.778 17.2942 18.778 10.1177 18.778C2.94122 18.778 1.17651 18.8891 1.17651 11.5558Z"
                  stroke="#95A0AD" stroke-linecap="round" stroke-linejoin="round" />
              </g>
              <defs>
                <clipPath id="clip0_45_18238">
                  <rect width="20" height="20" fill="white" />
                </clipPath>
              </defs>
            </svg>

            <span class="responsive-navigation__list-text">خانه</span>
          </a>
        </li>
        <li class="responsive-navigation__list-item">
          <a href="#" class="responsive-navigation__list-link">
            <svg class="responsive-navigation__list-icon" width="20" height="18" viewBox="0 0 20 18" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_45_18256)">
                <path d="M11.2188 1.09473V3.59379" stroke="#95A0AD" stroke-width="0.8" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path d="M11.2188 14.2178V16.3073" stroke="#95A0AD" stroke-width="0.8" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path d="M11.2188 11.3945V6.41699" stroke="#95A0AD" stroke-width="0.8" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M18.8824 10.9298C16.3499 10.9298 16.3499 7.06933 18.8824 7.06933C18.8824 2.59644 18.8824 1 9.94118 1C1 1 1 2.59644 1 7.06933C3.53246 7.06933 3.53246 10.9298 1 10.9298C1 15.4036 1 17 9.94118 17C18.8824 17 18.8824 15.4036 18.8824 10.9298Z"
                  stroke="#95A0AD" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round" />
              </g>
              <defs>
                <clipPath id="clip0_45_18256">
                  <rect width="20" height="18" fill="white" />
                </clipPath>
              </defs>
            </svg>

            <span class="responsive-navigation__list-text">خرید بلیط</span>
          </a>
        </li>
        <li class="responsive-navigation__list-item responsive-navigation__list-search" id="responsive-navigation">
          <button class="responsive-navigation__list-link" id="index_search">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_45_18265)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M11.2798 0C17.4993 0 22.5584 5.05904 22.5584 11.2786C22.5584 14.213 21.4323 16.8893 19.5895 18.8979L23.2155 22.5163C23.5549 22.8557 23.5561 23.4047 23.2167 23.744C23.0476 23.9155 22.8241 24 22.6017 24C22.3805 24 22.1581 23.9155 21.9878 23.7464L18.318 20.0868C16.3875 21.6328 13.9398 22.5584 11.2798 22.5584C5.0602 22.5584 0 17.4982 0 11.2786C0 5.05904 5.0602 0 11.2798 0ZM11.2798 1.73731C6.01804 1.73731 1.73731 6.01688 1.73731 11.2786C1.73731 16.5403 6.01804 20.8211 11.2798 20.8211C16.5403 20.8211 20.8211 16.5403 20.8211 11.2786C20.8211 6.01688 16.5403 1.73731 11.2798 1.73731Z"
                  fill="white" />
              </g>
              <defs>
                <clipPath id="clip0_45_18265">
                  <rect width="24" height="24" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </button>
        </li>
        <li class="responsive-navigation__list-item">
          <a href="#" class="responsive-navigation__list-link">
            <svg class="responsive-navigation__list-icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_45_18248)">
                <path d="M5.84204 8.37891V14.4897" stroke="#95A0AD" stroke-width="0.8" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path d="M10 5.4541V14.49" stroke="#95A0AD" stroke-width="0.8" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path d="M14.0885 11.6074V14.4894" stroke="#95A0AD" stroke-width="0.8" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M1.11108 10.0002C1.11108 3.33403 3.33378 1.11133 9.99997 1.11133C16.6662 1.11133 18.8889 3.33403 18.8889 10.0002C18.8889 16.6664 16.6662 18.8891 9.99997 18.8891C3.33378 18.8891 1.11108 16.6664 1.11108 10.0002Z"
                  stroke="#95A0AD" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round" />
              </g>
              <defs>
                <clipPath id="clip0_45_18248">
                  <rect width="20" height="20" fill="white" />
                </clipPath>
              </defs>
            </svg>

            <span class="responsive-navigation__list-text">مقالات</span>
          </a>
        </li>
        <li class="responsive-navigation__list-item">
          <a href="#" class="responsive-navigation__list-link">
            <svg class="responsive-navigation__list-icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_45_18245)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M9.54179 10.4584C9.54179 10.4584 -2.07315 8.05564 1.9631 5.72565C5.36917 3.75957 17.1075 0.379292 18.7475 1.25269C19.6209 2.89262 16.2406 14.631 14.2745 18.0371C11.9445 22.0733 9.54179 10.4584 9.54179 10.4584Z"
                  stroke="#95A0AD" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9.54431 10.4557L18.75 1.25" stroke="#95A0AD" stroke-linecap="round" stroke-linejoin="round" />
              </g>
              <defs>
                <clipPath id="clip0_45_18245">
                  <rect width="20" height="20" fill="white" />
                </clipPath>
              </defs>
            </svg>

            <span class="responsive-navigation__list-text">ارتباط با ما</span>
          </a>
        </li>
      </ul>
    </div>


  </header>

 
       