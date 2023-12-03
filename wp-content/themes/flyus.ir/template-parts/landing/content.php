<?php 
$visa=get_post_meta( get_the_ID(), 'fly_trip_section_visa_meta', true ); 
?>
<section class="content">
            <div class="container">
            <?php $counter=1;if(!empty($visa)) {
        foreach ($visa as $item) { 
        if($counter%2==0)
         { ?>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h3 class="content__title"><?php echo $item['fly_trip_section_visa_title_meta'] ?> </h3>
                        <p class="content__desc">
                        <?php echo $item['fly_trip_section_visa_des_meta'] ?>
                        </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="<?php echo $item['fly_trip_section_visa_img_meta'] ?>" alt="visa" class="content__banner">
                    </div>
                </div>
                <?php } else {  ?>
                <div class="row col-revers">
                    <div class="col-12 col-md-6">
                        <img src="<?php echo $item['fly_trip_section_visa_img_meta'] ?>" alt="visa" class="content__banner">
                    </div>
                    <div class="col-12 col-md-6">
                        <h3 class="content__title"><?php echo $item['fly_trip_section_visa_title_meta'] ?></h3>
                        <p class="content__desc">
                        <?php echo $item['fly_trip_section_visa_des_meta'] ?>
                        </p>
                    </div>
                </div>
                <?php } $counter++; } } ?>  

            </div>
            <div class="content-shadow__left shadow shadow-left"></div>
            <div class="content-shadow__right shadow shadow-right"></div>
        </section>
