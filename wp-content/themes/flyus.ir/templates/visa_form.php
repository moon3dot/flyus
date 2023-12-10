<?php /* Template Name: Visa-form */ ?>

<?php get_header(); ?>

<body>
    <!-- body  -->
    <main class="main">

        <!-- visa infos -->
        <section class="visa-payment__info">
            <div class="container">
                <div class="visa-payment__info-wrapper">
                    <div class="row mb-0">
                        <div class="col-12 col-md-9">
                            <div class="visa-payment__info-title">
                                <img src="../../img/visa/dubai.png" alt="Dubai">
                                <h1> ویزا توریستی دبی(امارات متحده عربی)</h1>
                            </div>
                            <div class="visa-payment__info-desc">
                                <div class="visa-payment__info-desc-item">
                                    <p>حداکثر اقامت</p>
                                    <span>10 روز</span>
                                </div>
                                <div class="visa-payment__info-desc-item">
                                    <p>حداکثر اقامت</p>
                                    <span>10 روز</span>
                                </div>
                                <div class="visa-payment__info-desc-item">
                                    <p>حداکثر اقامت</p>
                                    <span>10 روز</span>
                                </div>
                                <div class="visa-payment__info-desc-item">
                                    <p>حداکثر اقامت</p>
                                    <span>10 روز</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="visa-payment__info-left">
                                <p class="visa-payment__info-number">
                                    1 مسافر
                                </p>
                                <div class="visa-payment__info-link">
                                    <a href="#">
                                        تغییر ویزا
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- visa info form  -->
        <section class="visa-payment__info-form">
            <div class="container">
                <div class="visa-payment__info-wrapper form">
                    <div class="visa-payment__info-form--title">
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 0H4C1.79 0 0 1.78 0 3.97V14.03C0 16.22 1.79 18 4 18H16C18.21 18 20 16.22 20 14.03V3.97C20 1.78 18.21 0 16 0ZM6.5 4.17C7.77 4.17 8.81 5.21 8.81 6.48C8.81 7.75 7.77 8.79 6.5 8.79C5.23 8.79 4.19 7.75 4.19 6.48C4.19 5.21 5.23 4.17 6.5 4.17ZM10.37 13.66C10.28 13.76 10.14 13.82 10 13.82H3C2.86 13.82 2.72 13.76 2.63 13.66C2.54 13.56 2.49 13.42 2.5 13.28C2.67 11.6 4.01 10.27 5.69 10.11C6.22 10.06 6.77 10.06 7.3 10.11C8.98 10.27 10.33 11.6 10.49 13.28C10.51 13.42 10.46 13.56 10.37 13.66ZM17 13.75H15C14.59 13.75 14.25 13.41 14.25 13C14.25 12.59 14.59 12.25 15 12.25H17C17.41 12.25 17.75 12.59 17.75 13C17.75 13.41 17.41 13.75 17 13.75ZM17 9.75H13C12.59 9.75 12.25 9.41 12.25 9C12.25 8.59 12.59 8.25 13 8.25H17C17.41 8.25 17.75 8.59 17.75 9C17.75 9.41 17.41 9.75 17 9.75ZM17 5.75H12C11.59 5.75 11.25 5.41 11.25 5C11.25 4.59 11.59 4.25 12 4.25H17C17.41 4.25 17.75 4.59 17.75 5C17.75 5.41 17.41 5.75 17 5.75Z"
                                fill="#094899" />
                        </svg>
                        <h3>
                            اطلاعات اولیه
                        </h3>
                    </div>
                    <div class="visa-payment__info-form--brief">
                        <span>لطفا اطلاعات اولیه را برای ثبت درخواست وارد نمایید.</span>
                    </div>

                    <!-- <form>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="visa-payment__info-form--input">
                                    <label for="name">نام (لاتین)</label>
                                    <input type="text" name="" id="name">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="visa-payment__info-form--input">
                                    <label for="lastname">نام خانوادگی (لاتین)</label>
                                    <input type="text" name="" id="lastname">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="visa-payment__info-form--input">
                                    <label for="number">شماره موبایل</label>
                                    <input type="text" name="" id="number">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="visa-payment__info-form--input">
                                    <label for="email">ایمیل</label>
                                    <input type="text" name="" id="email">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="visa-payment__info-form--input">
                                    <label for="visa-date">انقضای پاسپورت</label>
                                    <input type="text" name="" id="visa-date">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="visa-payment__info-form--input">
                                    <label for="visa-detail">شماره پاسپورت</label>
                                    <input type="text" name="" id="visa-detail">
                                </div>
                            </div>
                        </div>


                        <div class="visa-payment__info-form--document">
                            <h3>
                                آپلود مدارک
                            </h3>
                            <span>
                                لطفا اسکن صفحه اول گذرنامه خود را آپلود کنید
                            </span>

                            <div class="visa-payment__info-form-uploader">
                                <input  type="file" id="upload" hidden />
                                <label for="upload">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.4651 32H11.5349C3.45302 32 0 28.547 0 20.4651V11.5349C0 3.45302 3.45302 0 11.5349 0H18.9767C19.587 0 20.093 0.506047 20.093 1.11628C20.093 1.72651 19.587 2.23256 18.9767 2.23256H11.5349C4.67349 2.23256 2.23256 4.67349 2.23256 11.5349V20.4651C2.23256 27.3265 4.67349 29.7674 11.5349 29.7674H20.4651C27.3265 29.7674 29.7674 27.3265 29.7674 20.4651V13.0233C29.7674 12.413 30.2735 11.907 30.8837 11.907C31.494 11.907 32 12.413 32 13.0233V20.4651C32 28.547 28.547 32 20.4651 32Z"
                                            fill="#094899" />
                                        <path
                                            d="M30.8967 14H25.0011C19.9603 14 18 12.0397 18 6.99893V1.10326C18 0.661087 18.2653 0.24839 18.678 0.0862592C19.0907 -0.0906107 19.5623 0.0125636 19.8866 0.322086L31.6779 12.1134C31.9874 12.4229 32.0906 12.9093 31.9137 13.322C31.7369 13.7347 31.3389 14 30.8967 14ZM20.2109 3.77105V6.99893C20.2109 10.8016 21.1984 11.7892 25.0011 11.7892H28.229L20.2109 3.77105Z"
                                            fill="#094899" />
                                        <path
                                            d="M17.8 19H8.2C7.544 19 7 18.32 7 17.5C7 16.68 7.544 16 8.2 16H17.8C18.456 16 19 16.68 19 17.5C19 18.32 18.456 19 17.8 19Z"
                                            fill="#094899" />
                                        <path
                                            d="M14.7727 25H8.22727C7.55636 25 7 24.32 7 23.5C7 22.68 7.55636 22 8.22727 22H14.7727C15.4436 22 16 22.68 16 23.5C16 24.32 15.4436 25 14.7727 25Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>آپلود مدارک</span>

                                </label>
                            </div>

                            <p class="visa-payment__info-form--document-condition">
                                حجم مجاز: 10mg
                            </p>
                            <p class="visa-payment__info-form--document-condition">
                                حجم مجاز: 10MB پسوندهای مجاز: png / jpg / jpeg / pdf
                            </p>

                            <ul class="visa-payment__info-form--document-desc">
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15C11.64 15 15 11.64 15 7.5C15 3.36 11.64 0 7.5 0ZM10.1475 8.2725L7.8975 10.5225C7.785 10.635 7.6425 10.6875 7.5 10.6875C7.3575 10.6875 7.215 10.635 7.1025 10.5225L4.8525 8.2725C4.635 8.055 4.635 7.695 4.8525 7.4775C5.07 7.26 5.43 7.26 5.6475 7.4775L6.9375 8.7675V4.875C6.9375 4.5675 7.1925 4.3125 7.5 4.3125C7.8075 4.3125 8.0625 4.5675 8.0625 4.875V8.7675L9.3525 7.4775C9.57 7.26 9.93 7.26 10.1475 7.4775C10.365 7.695 10.365 8.055 10.1475 8.2725Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>ثبت درخواست به منزله صدور ويزا نمی‌باشد.</span>
                                </li>
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15C11.64 15 15 11.64 15 7.5C15 3.36 11.64 0 7.5 0ZM10.1475 8.2725L7.8975 10.5225C7.785 10.635 7.6425 10.6875 7.5 10.6875C7.3575 10.6875 7.215 10.635 7.1025 10.5225L4.8525 8.2725C4.635 8.055 4.635 7.695 4.8525 7.4775C5.07 7.26 5.43 7.26 5.6475 7.4775L6.9375 8.7675V4.875C6.9375 4.5675 7.1925 4.3125 7.5 4.3125C7.8075 4.3125 8.0625 4.5675 8.0625 4.875V8.7675L9.3525 7.4775C9.57 7.26 9.93 7.26 10.1475 7.4775C10.365 7.695 10.365 8.055 10.1475 8.2725Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>پردازش ویزا ۳ تا ۷ روز کاری طول می‌کشد.</span>
                                </li>
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15C11.64 15 15 11.64 15 7.5C15 3.36 11.64 0 7.5 0ZM10.1475 8.2725L7.8975 10.5225C7.785 10.635 7.6425 10.6875 7.5 10.6875C7.3575 10.6875 7.215 10.635 7.1025 10.5225L4.8525 8.2725C4.635 8.055 4.635 7.695 4.8525 7.4775C5.07 7.26 5.43 7.26 5.6475 7.4775L6.9375 8.7675V4.875C6.9375 4.5675 7.1925 4.3125 7.5 4.3125C7.8075 4.3125 8.0625 4.5675 8.0625 4.875V8.7675L9.3525 7.4775C9.57 7.26 9.93 7.26 10.1475 7.4775C10.365 7.695 10.365 8.055 10.1475 8.2725Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>بعد از صدور ویزا،‌ باید یک چک ضمانت در وجه علی‌بابا که مسئول انجام امور دریافت
                                        ویزا می‌باشد، بپردازید.</span>
                                </li>
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0C3.36 0 0 3.36 0 7.5C0 11.64 3.36 15 7.5 15C11.64 15 15 11.64 15 7.5C15 3.36 11.64 0 7.5 0ZM10.1475 8.2725L7.8975 10.5225C7.785 10.635 7.6425 10.6875 7.5 10.6875C7.3575 10.6875 7.215 10.635 7.1025 10.5225L4.8525 8.2725C4.635 8.055 4.635 7.695 4.8525 7.4775C5.07 7.26 5.43 7.26 5.6475 7.4775L6.9375 8.7675V4.875C6.9375 4.5675 7.1925 4.3125 7.5 4.3125C7.8075 4.3125 8.0625 4.5675 8.0625 4.875V8.7675L9.3525 7.4775C9.57 7.26 9.93 7.26 10.1475 7.4775C10.365 7.695 10.365 8.055 10.1475 8.2725Z"
                                            fill="#094899" />
                                    </svg>
                                    <span>کشور امارات به افرادی زیر ۱۸ سالی که قصد دارند به تنهایی مسافرت کنند، ویزا
                                        نمی‌دهد.</span>
                                </li>
                            </ul>

                        </div>

                        <div class="visa-payment__info-form--submit">
                            <button type="submit">
                                ثبت درخواست
                            </button>
                        </div>

                    </form> -->
                  
                </div>
            </div>
            <div class="visa-payment__info-form right shadow shadow-right"></div>
            <div class="visa-payment__info-form left shadow shadow-left"></div>
        </section>


    </main>
</body>

<?php get_footer(); ?>

