<?php $video=get_post_meta( get_the_ID(), 'fly_trip_section_video_meta', true ); ?>
<section class="landing-page__video">
            <div class="container">
                <div class="row row-reverse">
                    <div class="col-12 col-md-6">
                        <div class="landing-page__video-wrapper">
                        <?php if(!empty($video[0]['fly_trip_section_video_video_meta']) && !empty($video[0]['fly_trip_section_video_poster_meta'])) { ?>
                            <video src="<?php echo $video[0]['fly_trip_section_video_video_meta'] ?>" class="landing-page__video-item" controls
                                poster="<?php echo $video[0]['fly_trip_section_video_poster_meta'] ?>"></video>
                        <?php } ?>
                           
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="landing-page__video-desc">
                        <?php if(!empty($video[0]['fly_trip_section_video_des_video_meta'])) { ?>
                                <p><?php echo $video[0]['fly_trip_section_video_des_video_meta'] ?> </p>
                        <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
</section>
