<?php 
$section=get_post_meta( get_the_ID(), 'fly_trip_section_meta', true ); 
?>
<section class="landing__infos">
            <div class="container">
            <?php if(!empty($section[0]['fly_trip_section_subtitle_meta'])) { ?>
                <h3 class="landing__infos-title"><?php echo $section[0]['fly_trip_section_subtitle_meta'] ?> </h3>
            <?php } ?>
                        
            <?php if(!empty($section[0]['fly_trip_section_des_down_meta'])) { ?>
                <p class="landing__infos-desc"><?php echo $section[0]['fly_trip_section_des_down_meta'] ?> </p>
            <?php } ?> 
  
            </div>
</section>