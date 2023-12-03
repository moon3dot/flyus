<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

{
$step=get_post_meta( get_the_ID(), 'fly_trip_step_meta', true ); 

?>
<section class="landing-page__levels">
            <div class="container">
                <div class="landing-popularity__title">
                    <div class="main-title">
                        <?php if(!empty(get_post_meta( get_the_ID(), 'fly_trip_step_main_title_meta', true ))){ ?>
                        <h2 class="main-title__heading"><?php echo get_post_meta( get_the_ID(), 'fly_trip_step_main_title_meta', true ) ?></h2>
                        <?php } ?>
                        <svg class="main-title__icon" width="13" height="17" viewBox="0 0 13 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.11712 0.262512L4.12041 1.04394L5.56702 2.65957L5.23202 6.98181L0.183716 4.83096L0.199615 5.99013L4.97121 10.1167C4.84971 14.6839 6.20202 16.2018 6.20202 16.2018C6.20202 16.2018 7.54401 14.6948 7.39101 10.1367L12.163 6.06968L12.169 4.88457L7.12601 6.96899L6.77602 2.6444L8.23002 1.058L8.22601 0.276573L6.23202 0.72131L4.11712 0.262512Z"
                                fill="#094899"></path>
                        </svg>
                    </div>
                </div>
                <div class="landing-page__levels-wrapper">
                <?php if(!empty($step)){ 
                        foreach (  $step as $item ) { ?>
                    <article class="landing-page__levels-items">
                        <div class="landing-page__levels-box">
                            <div class="reason-box">
                                <div class="reason-box__container">
                                    <img src="<?php echo $item['fly_trip_step_svg_meta'] ?>" class="reason-box__icon" width="52" height="57" />
                                </div>

                            </div>
                            <div class="landing-page__levels-box-square">
                                <span></span>
                            </div>
                            <div class="landing-page__levels-box-square2"></div>
                            <div class="landing-page__levels-box-title">
                                <h3><?php echo $item['fly_trip_step_title_meta'] ?></h3>
                                <span>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_207_3016)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.5378 5.08743C10.6541 5.20401 10.6541 5.39302 10.5378 5.50959L6.76871 9.28757C6.65243 9.40413 6.4639 9.40415 6.34759 9.28761L4.46227 7.39862C4.34594 7.28207 4.3459 7.09307 4.46218 6.97646C4.57846 6.85986 4.76702 6.85982 4.88335 6.97638L6.55809 8.65437L10.1166 5.08743C10.2329 4.97086 10.4215 4.97086 10.5378 5.08743Z"
                                                fill="#838B96" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.66244 1.66244C2.87535 0.44952 4.78107 0 7.5 0C10.2189 0 12.1246 0.44952 13.3376 1.66244C14.5505 2.87535 15 4.78107 15 7.5C15 10.2189 14.5505 12.1246 13.3376 13.3376C12.1246 14.5505 10.2189 15 7.5 15C4.78107 15 2.87535 14.5505 1.66244 13.3376C0.44952 12.1246 0 10.2189 0 7.5C0 4.78107 0.44952 2.87535 1.66244 1.66244ZM2.07568 2.07568C1.03606 3.1153 0.584416 4.81348 0.584416 7.5C0.584416 10.1865 1.03606 11.8847 2.07568 12.9243C3.1153 13.9639 4.81348 14.4156 7.5 14.4156C10.1865 14.4156 11.8847 13.9639 12.9243 12.9243C13.9639 11.8847 14.4156 10.1865 14.4156 7.5C14.4156 4.81348 13.9639 3.1153 12.9243 2.07568C11.8847 1.03606 10.1865 0.584416 7.5 0.584416C4.81348 0.584416 3.1153 1.03606 2.07568 2.07568Z"
                                                fill="#838B96" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_207_3016">
                                                <rect width="15" height="15" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </span>
                            </div>
                        </div>
                    </article>
                   <?php } } ?>
                    <div class="landing-page__levels-flag">
                        <svg width="17" height="24" viewBox="0 0 17 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_207_2838)">
                                <path
                                    d="M1.44526 12.8759H8.05839V15.7226C8.05839 16.1168 8.40876 16.4672 8.80292 16.4672H16.073C16.3358 16.4672 16.5547 16.3358 16.7299 16.1168C16.9051 15.8978 16.8613 15.635 16.7299 15.3723L13.8394 10.0292L16.7299 4.68613C16.8613 4.46715 16.8613 4.16058 16.7299 3.94161C16.5985 3.72263 16.3358 3.59124 16.073 3.59124H9.54745V0.744526C9.54745 0.350365 9.19708 0 8.80292 0H0.744525C0.350365 0 0 0.350365 0 0.744526V12.1314V24H1.48905V12.8759H1.44526Z"
                                    fill="#094899" />
                            </g>
                            <defs>
                                <clipPath id="clip0_207_2838">
                                    <rect width="17" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </div>
                </div>
            </div>
        </section>
<?php } ?>
