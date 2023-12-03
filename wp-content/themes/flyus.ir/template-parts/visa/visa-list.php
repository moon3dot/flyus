<?php $banner_setting = fly_visa_get_option('fly_visa_banner_options'); ?>
<section class="list">
      <div class="container">
        <img src="<?php if(isset($banner_setting[0]['fly_visa_banner_img_option'])){echo $banner_setting[0]['fly_visa_banner_img_option']; } ?>" alt="visa page" class="list__banner" />
        <div class="list-content">
          <div class="list-content__wrapper">
            <h1 class="list__heading"><?php if(isset($banner_setting[0]['fly_visa_banner_title_option'])){echo $banner_setting[0]['fly_visa_banner_title_option']; } ?></h1>
            <div class="list-search__form">
              <form id="search" action="<?php home_url( '/' ) ?>" method="get" class="list-search__form-form">
                <input type="text" id="s" name="s"  value="<?php get_search_query() ?>" class="list-search__form-form--textfield" placeholder="جستجو...">
                <input type="hidden" name="post_type" value="visa" />
                <button type="submit" class="list-search__form-form--submit">جستجو</button>
              </form>
            </div>
            <div class="list__desc box-style">
              <p class="list__desc-title">
              <?php if(isset($banner_setting[0]['fly_visa_banner_subtitle_option'])){echo $banner_setting[0]['fly_visa_banner_subtitle_option'];} ?>
              </p>
              <span class="list__desc-text">
              <?php if(isset($banner_setting[0]['fly_visa_banner_desc_option'])){echo $banner_setting[0]['fly_visa_banner_desc_option'];} ?>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="list-shadow__left shadow shadow-left"></div>
      <div class="list-shadow__right shadow shadow-right"></div>
</section>
        
