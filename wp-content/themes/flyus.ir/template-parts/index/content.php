<?php $ticket_setting = fly_home_get_option('fly_home_ticket_options'); ?>
<section class="content">
        <div class="container">
          <h3 class="content__title"><?php if(isset($ticket_setting[0]['fly_home_ticket_title_option'])){echo $ticket_setting[0]['fly_home_ticket_title_option'];} ?></h3>
          <p class="content__text">
          <?php if(isset($ticket_setting[0]['fly_home_ticket_desc_option'])){echo $ticket_setting[0]['fly_home_ticket_desc_option'];} ?>
          </p>
        </div>
</section>