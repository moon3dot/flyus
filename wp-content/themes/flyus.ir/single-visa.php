<?php get_header(); ?>
  <!-- body  -->
  <main class="main">
      <!-- visa list  -->
      <section class="list">
        <div class="container">
        <?php $banner=get_post_meta( get_the_ID(), 'fly_visa_banner_meta', true ); ?>
        <!-- مغادیر برای پست -->
        <?php
       $visaName = $banner[0]['fly_visa_banner_title_meta'];
       $visaIMG = $banner[0]['fly_visa_banner_flag_meta'];
       
        ?>



            <?php if(!empty($banner[0]['fly_visa_banner_img_meta'])) { ?>
                <img  alt="visa page" class="list__banner" src="<?php echo $banner[0]['fly_visa_banner_img_meta'] ?>">
            <?php } else { ?>
              <img src="<?php echo THEME_IMAGE . '/visa/SVG back.png' ?>" alt="visa page" class="list__banner" />
            <?php } ?>
          
          <div class="list-content">
            <div class="list-content__wrapper">
              <div class="list__title">
              <?php if(!empty($banner[0]['fly_visa_banner_flag_meta'])) { ?>
                <img src="<?php echo $banner[0]['fly_visa_banner_flag_meta'] ?>" width="48" height="48" />
              <?php } ?>
              <?php if(!empty($banner[0]['fly_visa_banner_title_meta'])) { ?>
                <h1 class="list__heading">
                <?php echo $banner[0]['fly_visa_banner_title_meta'] ?>
                </h1>
              <?php } ?>
              </div>
              <div class="list__desc">
              <?php if(!empty($banner[0]['fly_visa_banner_subtitle_meta'])) { ?>

                <p class="list__desc-title">
                <?php echo $banner[0]['fly_visa_banner_subtitle_meta'] ?>
                </p>
                <?php } ?>
                <?php if(!empty($banner[0]['fly_visa_banner_desc_meta'])) { ?>
                <span class="list__desc-text">
                <?php echo $banner[0]['fly_visa_banner_desc_meta'] ?>

                </span>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="list-shadow__left shadow shadow-left"></div>
        <div class="list-shadow__right shadow shadow-right"></div>
      </section>

    
      <!-- services  -->
      <section class="services">
        <div class="container line-bg">
          <div class="main-title">
            <h2 class="main-title__heading"><?php echo get_post_meta( get_the_ID(), 'fly_visa_services_main_title_meta', true ); ?></h2>
            <svg
              class="main-title__icon"
              width="13"
              height="17"
              viewBox="0 0 13 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                fill="#094899"
              ></path>
            </svg>
          </div>
          <div class="box-container">
          <?php $services=get_post_meta( get_the_ID(), 'fly_visa_services_meta', true );
              if(!empty($services)){ 
                foreach (  $services as $item ) { ?>
            <article class="reason-box">
              <div class="reason-box__container">
                <img class="reason-box__icon"  width="57" height="57" src="<?php echo $item['fly_visa_services_svg_meta'] ?>" />
                <h3 class="reason-box__container-title">
                <?php echo $item['fly_visa_services_title_meta'] ?>
                </h3>
              </div>
            </article>
            <?php } } ?>

          </div>
        </div>
      </section>

      <!-- visa details  -->

      <section class="visa__detail">
        <div class="container">
          <div class="main-title">
            <h2 class="main-title__heading"><?php echo get_post_meta( get_the_ID(), 'fly_visa_price_main_title_meta', true ); ?></h2>
            <svg
              class="main-title__icon"
              width="13"
              height="17"
              viewBox="0 0 13 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                fill="#094899"
              ></path>
            </svg>
          </div>
          <!-- tables  -->
         
          <div class="visa__detail-wrapper">
            <div class="visa__detail-content">
              <div class="table__container">
              <?php $price=get_post_meta( get_the_ID(), 'fly_visa_price_meta', true );
               if(!empty($price)){  ?>
                <table class="table-price">
                  <thead class="visa-table__header">
                    <tr>
                      <th></th>
                      <th>ده روزه</th>
                      <th>یک ماهه</th>
                      <th>دو ماهه</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach (  $price as $item ) { ?>

                    <tr>
                      <td><?php echo $item['fly_visa_price_type_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_ten_day_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_one_month_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_tow_month_meta'] ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <?php } ?>
              </div>

              <div class="main-title mt-48">
                <h2 class="main-title__heading"><?php echo get_post_meta( get_the_ID(), 'fly_visa_price_under_18_main_title_meta', true ); ?></h2>
                <svg
                  class="main-title__icon"
                  width="13"
                  height="17"
                  viewBox="0 0 13 17"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                    fill="#094899"
                  ></path>
                </svg>
              </div>
              <div class="table__container">
              <?php $price_under_18=get_post_meta( get_the_ID(), 'fly_visa_price_under_18_meta', true );
               if(!empty($price_under_18)){  ?>
                <table class="table-price">
                  <thead class="visa-table__header">
                    <tr>
                      <th></th>
                      <th>ده روزه</th>
                      <th>یک ماهه</th>
                      <th>دو ماهه</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach (  $price_under_18 as $item ) { ?>

                    <tr>
                      <td><?php echo $item['fly_visa_price_under_18_type_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_under_18_ten_day_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_under_18_one_month_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_under_18_tow_month_meta'] ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <?php } ?>
              </div>

              <div class="main-title mt-48">
                <h2 class="main-title__heading">
                <?php echo get_post_meta( get_the_ID(), 'fly_visa_price_renewal_main_title_meta', true ); ?>
                </h2>
                <svg
                  class="main-title__icon"
                  width="13"
                  height="17"
                  viewBox="0 0 13 17"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                    fill="#094899"
                  ></path>
                </svg>
              </div>
              <div class="table__container">
              <?php $price_renewal=get_post_meta( get_the_ID(), 'fly_visa_price_renewal_meta', true );
               if(!empty($price_renewal)){  ?>
                <table class="table-price">
                  <thead class="visa-table__header">
                    <tr>
                      <th></th>
                      <th>ده روزه</th>
                      <th>یک ماهه</th>
                      <th>دو ماهه</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach (  $price_renewal as $item ) { ?>

                    <tr>
                      <td><?php echo $item['fly_visa_price_renewal_type_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_renewal_ten_day_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_renewal_one_month_meta'] ?></td>
                      <td><?php echo $item['fly_visa_price_renewal_tow_month_meta'] ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <?php } ?>
              </div>

              <div class="main-title mt-48">
                <h2 class="main-title__heading">
                <?php echo get_post_meta( get_the_ID(), 'fly_visa_documents_main_title_meta', true ); ?>
                </h2>
                <svg
                  class="main-title__icon"
                  width="13"
                  height="17"
                  viewBox="0 0 13 17"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                    fill="#094899"
                  ></path>
                </svg>
              </div>
              <div class="table__container">
              <?php $documents=get_post_meta( get_the_ID(), 'fly_visa_documents_meta', true );
               if(!empty($documents)){  ?>
                <table class="table-price">
                  <thead>
                    <tr>
                      <th>مدارک</th>
                      <th>توضیحات</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach (  $documents as $item ) { ?>
                    <tr>
                    <td><?php echo $item['fly_visa_documents_type_meta'] ?></td>
                    <td><?php echo $item['fly_visa_documents_desc_meta'] ?></td>
                    </tr>
                    <?php } ?>
              
                  </tbody>
                </table>
                <?php } ?>
              </div>

              <div class="list__desc">
              
              <p class="list__desc-title">
              زیر عنوان دبی                </p>
                                              <span class="list__desc-text">
              توضیحات 
              </span>
                            </div>


            </div>

            <!-- sidebar  -->
            <aside class="sidebar">
              <form action="/flyus/visa-form" class="visa__form" id="visa-form"  method='post'>
                <input type="hidden" name="visaName" value="<?php  echo $visaName ?> "/>
                <input type="hidden" name="visaIMG" value="<?php  echo $visaIMG ?> "/>
               <!-- نوع ویزا -->
                <?php $price=get_post_meta( get_the_ID(), 'fly_visa_price_meta', true ); ?>
                <select class="visa__type">
                <?php foreach (  $price as $item ) { ?>
                  <option><?php echo $item['fly_visa_price_type_meta'] ?></option>
                  <?php } ?>
                </select>
                <select name="" id="" class="visa__age">
                  <option value="">کودک</option>
                  <option value="">نوجوان</option>
                  <option selected value="">بزرگسال</option>
                  <option value="">پیر</option>
                </select>
                <div class="visa__form--devide"></div>
                <span class="visa__form-text"> برای 1 نفر </span>
                <button type="submit" class="visa__from-submit">
                  درخواست ویزا
                </button>
              </form>
              <div class="counseling">
                <div class="counseling__content">
                  <p class="counseling__title">با مشاوره تلفنی سریعتر بخرید!</p>
                  <span class="counseling__time">
                    شنبه تا پنج شنبه ساعت 9 الی 18
                  </span>
                  <span class="counseling__desc">
                    پشتیبانی آنلاین 24 ساعته
                  </span>
                </div>
                <button class="counseling__button">مشاوره رایگان!</button>
              </div>
            </aside>
          </div>
        </div>
        <div class="visa-shadow--1 shadow shadow-left"></div>
        <div class="visa-shadow--2 shadow shadow-right"></div>
      </section>

      <!-- FAQ -->
      <?php $faqes= get_post_meta( get_the_ID(), 'fly_visa_faq_meta', true );?>
      <section class="faq">
        <div class="container">
          <div class="main-title">
            <h2 class="main-title__heading"><?php echo get_post_meta( get_the_ID(), 'fly_visa_faq_main_title_meta',true); ?></h2>
            <svg
              class="main-title__icon"
              width="13"
              height="17"
              viewBox="0 0 13 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                fill="#094899"
              />
            </svg>
          </div>

          <div class="row">
            <div class="col-12 col-md-7 col-lg-6">
              <div class="faq__accordion">
              <?php $counter=0; if(!empty($faqes)) {
        foreach ($faqes as $item) { ?>
                <div class="accordion-item <?php if($counter==0)echo 'active'?>">
                  <div class="accordion-button">
                    <h4 class="accordion-button__title">
                    <?php echo $item['fly_visa_faq_question_meta'] ?>
                    </h4>
                    <button class="accordion-button__icon">
                      <span></span>
                    </button>
                  </div>
                  <p class="accordion-content">
                  <?php echo $item['fly_visa_faq_answer_meta'] ?>
                  </p>
                </div>
                <?php $counter++ ;
                }
              }?>
              </div>
            </div>
            <div class="col-12 col-md-5 col-lg-6">
              <div class="faq-banner">
                <img
                  src="<?php echo (!empty(get_post_meta( get_the_ID(), 'fly_visa_faq_main_img_meta',true))) ? get_post_meta( get_the_ID(), 'fly_visa_faq_main_img_meta',true) : THEME_IMAGE . '/b2b-faq 1.png' ?>"
                  alt="FAQ"
                  class="faq-banner__item"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
<?php get_footer(); ?>