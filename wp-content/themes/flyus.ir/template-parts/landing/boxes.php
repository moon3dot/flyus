<?php 
$boxes=get_post_meta( get_the_ID(), 'fly_trip_boxes_meta', true ); 
?>
<section class="boxes">
            <div class="container">
                <div class="row">
                <?php if(!empty($boxes)){ 
                        foreach (  $boxes as $item ) { ?>
                    <div class="col-12 col-md-6">
                        <h4 class="boxes__title"> <?php echo $item['fly_trip_boxes_title_meta'] ?></h4>
                        <article class="boxes-box">
                            <div class="boxes-box__container">
                                <p class="boxes-box__text">
                                <?php echo $item['fly_trip_boxes_des_meta'] ?>
                                </p>
                            </div>
                        </article>
                    </div>
                <?php } } ?>
                   
                </div>
            </div>
            <div class="boxes-shadow-right shadow shadow-right"></div>
            <div class="boxes-shadow-left shadow shadow-left"></div>
</section>