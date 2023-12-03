<?php 
?>
<?php $box_setting = fly_visa_get_option('fly_visa_boxes_options');?>
<section class="content">
        <div class="container">
        <?php $counter=1;if(!empty($box_setting)) {
        foreach ($box_setting as $item) { 
        if($counter%2==0)
         { ?>

<div class="row col-revers">
            <div class="col-12 col-md-6">
              <img
                src="<?php if(isset($item['fly_visa_boxes_img_options'])){echo $item['fly_visa_boxes_img_options'];} ?>"
                alt="visa"
                class="content__banner"
              />
            </div>
            <div class="col-12 col-md-6">
              <h3 class="content__title"><?php if(isset($item['fly_visa_boxes_title_option'])){echo $item['fly_visa_boxes_title_option'];} ?></h3>
              <p class="content__desc">
              <?php if(isset($item['fly_visa_boxes_desc_option'])){echo $item['fly_visa_boxes_desc_option'];} ?>
              </p>
            </div>
          </div>

<?php }
else
{
  ?>
   <div class="row">
            <div class="col-12 col-md-6">
              <h3 class="content__title"><?php if(isset($item['fly_visa_boxes_title_option'])){echo $item['fly_visa_boxes_title_option'];} ?></h3>
              <p class="content__desc">
              <?php if(isset($item['fly_visa_boxes_desc_option'])){echo $item['fly_visa_boxes_desc_option'];} ?>
              </p>
            </div>
            <div class="col-12 col-md-6">
              <img
                src="<?php if(isset($item['fly_visa_boxes_img_options'])){echo $item['fly_visa_boxes_img_options'];} ?>"
                alt="visa"
                class="content__banner"
              />
            </div>
  </div>
          

        <?php } $counter++; } } ?>

         
        <?php $visa_text_setting = fly_visa_get_option('fly_visa_type_options');?>

          <div class="row">
            <div class="content__desc">
            <?php if(isset($visa_text_setting[0]['fly_visa_type_desc_option'])){echo $visa_text_setting[0]['fly_visa_type_desc_option'];} ?>
            </div>
          </div>
          <?php $time_down_setting = fly_visa_get_option('fly_visa_time_down_options');?>

          <div class="content__info-box box-style">
            <p class="list__desc-title"><?php if(isset($time_down_setting[0]['fly_visa_time_down_title_option'])){echo $time_down_setting[0]['fly_visa_time_down_title_option'];} ?></p>
            <span class="list__desc-text">
            <?php if(isset($time_down_setting[0]['fly_visa_time_down_desc_option'])){echo $time_down_setting[0]['fly_visa_time_down_desc_option'];} ?>
            </span>
          </div>
        </div>
        <div class="content-shadow__left shadow shadow-left"></div>
        <div class="content-shadow__right shadow shadow-right"></div>
</section>
