<?php 
$history=get_post_meta( get_the_ID(), 'fly_trip_history_meta', true ); 
?>
<section class="landing-page__history">
            <div class="container">
                <div class="row">
                    <div class="landing-page__history-wrapper">
                        <div class="landing-page__history-box">
                            <article class="boxes-box">
                                <div class="boxes-box__container">
                                <?php if(!empty($history[0]['fly_trip_history_title_meta'])) { ?>
                                    <p class="boxes-box__text"> <?php echo $history[0]['fly_trip_history_title_meta'] ?> </p>
                                <?php } ?>     
                                    
                                <?php if(!empty($history[0]['fly_trip_history_des_meta'])) { ?>
                                    <p class="boxes-box__text"> <?php echo $history[0]['fly_trip_history_des_meta'] ?> </p>
                                <?php } ?>   
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
</section>