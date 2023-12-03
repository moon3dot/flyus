<section class="landing__infos">
            <div class="container">
            <?php if(!empty(get_post_meta( get_the_ID(), 'fly_trip_step_main_des_meta', true ))){ ?>
                <p class="landing__infos-desc"><?php echo get_post_meta( get_the_ID(), 'fly_trip_step_main_des_meta', true ) ?></p>
            <?php } ?>
            </div>
</section>