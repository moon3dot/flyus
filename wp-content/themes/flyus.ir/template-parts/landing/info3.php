<?php $video=get_post_meta( get_the_ID(), 'fly_trip_section_video_meta', true ); ?>
<section class="landing__infos">
            <div class="container">
            <?php if(!empty($video[0]['fly_trip_section_video_desc_meta'])) { ?>
                <p class="landing__infos-desc"> <?php echo $video[0]['fly_trip_section_video_desc_meta'] ?> </p>
            <?php } ?>
             
            </div>
</section>

