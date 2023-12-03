<?php $ticket_setting = fly_insurance_get_option( 'fly_insurance_ticket_options' );

?>
<section class="content">
    <div class="container">
        <h3 class="content__title"><?php if ( isset( $ticket_setting[0]['fly_insurance_ticket_title_option'] ) ) {
				echo $ticket_setting[0]['fly_insurance_ticket_title_option'];
			} ?></h3>
        <p class="content__text">
			<?php if ( isset( $ticket_setting[0]['fly_insurance_ticket_desc_option'] ) ) {
				echo $ticket_setting[0]['fly_insurance_ticket_desc_option'];
			} ?>
        </p>
    </div>
</section>