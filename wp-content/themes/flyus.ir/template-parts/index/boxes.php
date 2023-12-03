<?php $box_setting = fly_home_get_option('fly_home_boxes_options');?>
<section class="boxes">
        <div class="container">
          <div class="row">
          <?php if(!empty($box_setting)) {
        foreach ($box_setting as $item) { ?>
            <div class="col-12 col-md-6">
              <h4 class="boxes__title"><?php if(isset($item['fly_home_boxes_title_option'])){echo $item['fly_home_boxes_title_option'];} ?></h4>
              <article class="boxes-box">
                <div class="boxes-box__container">
                  <p class="boxes-box__text">
                  <?php if(isset($item['fly_home_boxes_desc_option'])){echo $item['fly_home_boxes_desc_option'];} ?>
                  </p>
                </div>
              </article>
            </div>
          <?php }
          }?>
          </div>
        </div>
        <div class="boxes-shadow-right shadow shadow-right"></div>
        <div class="boxes-shadow-left shadow shadow-left"></div>
</section>
