<section class="guide-search">
            <div class="container">
                <form id="search" action="<?php home_url( '/' ) ?>" method="get" class="guide-search__form">
                    <div class="guide-search__wrapper">
                        <svg class="guide-search__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1166_9354)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.2798 0C17.4993 0 22.5584 5.05904 22.5584 11.2786C22.5584 14.213 21.4323 16.8893 19.5895 18.8979L23.2155 22.5163C23.5549 22.8557 23.5561 23.4047 23.2167 23.744C23.0476 23.9155 22.8241 24 22.6017 24C22.3805 24 22.1581 23.9155 21.9878 23.7464L18.318 20.0868C16.3875 21.6328 13.9398 22.5584 11.2798 22.5584C5.0602 22.5584 0 17.4982 0 11.2786C0 5.05904 5.0602 0 11.2798 0ZM11.2798 1.73731C6.01804 1.73731 1.73731 6.01688 1.73731 11.2786C1.73731 16.5403 6.01804 20.8211 11.2798 20.8211C16.5403 20.8211 20.8211 16.5403 20.8211 11.2786C20.8211 6.01688 16.5403 1.73731 11.2798 1.73731Z"
                                    fill="#094899" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1166_9354">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <input type="text"  id="s" name="s"  value="<?php get_search_query() ?>" class="guide-search__input" placeholder="کشور یا شهر خود را انتخاب کنید">
                        <input type="hidden" name="post_type" value="trip" />
                        <button type="submit" class="guide-search__btn">جستجو</button>
                    </div>
                </form>
            </div>
</section>