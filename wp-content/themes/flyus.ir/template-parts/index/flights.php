<section class="flights" id="flights">
      <div class="container">
        <div class="flights-wrapper">
          <div class="flights__header">
            <!-- add active class for active title  -->
            <button class="flights__header-item active">
              <img src="<?php echo THEME_IMAGE . '/icons/plane 1.svg' ?>" alt="flights item" class="flights__header-item_icon">

              <p class="flights__header-item--title">پرواز داخلی</p>
            </button>
            <!-- add active class for active title  -->
            <button class="flights__header-item">
              <img src="<?php echo THEME_IMAGE . '/icons/ticket-active 1.svg' ?>" alt="flights item" class="flights__header-item_icon">

              <p class="flights__header-item--title">پرواز خارجی</p>
            </button>
            <!-- add active class for active title  -->
            <button class="flights__header-item">
              <img src="<?php echo THEME_IMAGE . '/icons/compass 1.svg' ?>" alt="flights item" class="flights__header-item_icon">

              <p class="flights__header-item--title">تور</p>
            </button>
            <!-- add active class for active title  -->
            <button class="flights__header-item">
              <img src="<?php echo THEME_IMAGE . '/icons/hotel-active (1) 1.svg' ?>" alt="flights item" class="flights__header-item_icon">

              <p class="flights__header-item--title">هتل</p>
            </button>
          </div>
          <div class="flights__body">
            <div class="domestic-flights">
              <div class="domestic-flights__buttons">
                <div class="domestic-flights__buttons-wrapper" id="flights-direction">
                  <button class="domestic-flights__button active" type="button">یک طرفه</button>
                  <button class="domestic-flights__button" type="button">رفت و برگشت</button>
                </div>
              </div>
            </div>
            <form class="domestic-infos row">
              <!-- cities  -->
              <div class="col-12 col-md-6 col-lg-5">
                <div class="domestic-city_wrapper">

                  <div class="domestic-city">
                    <input type="text" placeholder="مبدا (شهر)" id="domestic-cities-start-input" autocomplete="off" />
                    <div class="domestic-cities-list domestic-cities-list-start" id="domestic-cities-start">
                      <p>پرتردد</p>
                      <ul>
                        <li class="flight-city__start" data-value="city1">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__start" data-value="city2">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                        <li class="flight-city__start" data-value="city3">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__start" data-value="city4">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                        <li class="flight-city__start" data-value="city5">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__start" data-value="city6">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                        <li class="flight-city__start" data-value="city7">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__start" data-value="city8">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                        <li class="flight-city__start" data-value="city9">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__start" data-value="city10">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="domestic-city__icon">
                    <svg width="20" height="27" viewBox="0 0 20 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12.0183 1.34839L12.0002 15.6611L16.1358 11.7028" stroke="#838B96" stroke-linecap="round"
                        stroke-linejoin="round" />
                      <path d="M8.18062 25.5868L8.18973 11.2829L4.06313 15.2324" stroke="#838B96" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>


                  </div>

                  <div class="domestic-city">
                    <input type="text" placeholder="مقصد(شهر)" id="domestic-cities-end-input" autocomplete="off">
                    <div class="domestic-cities-list domestic-cities-list-end" id="domestic-cities-end">
                      <p>پرتردد</p>
                      <ul>
                        <li class="flight-city__end" data-value="city1">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__end" data-value="city2">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                        <li class="flight-city__end" data-value="city3">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__end" data-value="city4">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                        <li class="flight-city__end" data-value="city5">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__end" data-value="city6">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                        <li class="flight-city__end" data-value="city7">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__end" data-value="city8">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                        <li class="flight-city__end" data-value="city9">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>تهران</span>

                        </li>
                        <li class="flight-city__end" data-value="city10">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                          </svg>
                          <span>انزلی</span>

                        </li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>
              <!-- date  -->
              <div class="col-12 col-md-6 col-lg-3">date picker</div>
              <!-- passengers -->
              <div class="col-12 col-md-6 col-lg-2">
                <div class="passengers-wrapper">
                  <fieldset class="passengers-title">مسافران</fieldset>
                  <input type="text" id="passengers-input" class="passengers-input" autocomplete="off">
                  <!-- passengers selection  -->
                  <div class="passengers-selection" id="passengers-selection">

                    <div class="passengers-selection-row">
                      <div class="passengers-selection-row__detail">
                        <p>بزرگسال</p>
                        <span>12سال به بالا</span>
                      </div>
                      <div class="passengers-selection-row btns">
                        <button class="passengers-selection-add" id="adult-add" type="button">
                          +
                        </button>
                        <p class="passengers-selection-number" id="adult-result">0</p>
                        <button class="passengers-selection-minus" id="adult-minus" type="button">
                          -
                        </button>
                      </div>
                    </div>


                    <div class="passengers-selection-row">
                      <div class="passengers-selection-row__detail">
                        <p>کودک</p>
                        <span>2 تا 12 سال</span>
                      </div>
                      <div class="passengers-selection-row btns">
                        <button class="passengers-selection-add deactive" id="child-add" type="button">
                          +
                        </button>
                        <p class="passengers-selection-number" id="child-result">0</p>
                        <button class="passengers-selection-minus deactive" id="child-minus" type="button">
                          -
                        </button>
                      </div>
                    </div>


                    <div class="passengers-selection-row">
                      <div class="passengers-selection-row__detail">
                        <p>نوزاد</p>
                        <span>10روز تا 2 سال</span>
                      </div>
                      <div class="passengers-selection-row btns">
                        <button class="passengers-selection-add deactive" id="baby-add" type="button">
                          +
                        </button>
                        <p class="passengers-selection-number" id="baby-result">0</p>
                        <button class="passengers-selection-minus deactive" id="baby-minus" type="button">
                          -
                        </button>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
              <!-- button search  -->
              <div class="col-12 col-md-6 col-lg-2">
                <div class="flights__body-button">
                  <button class="domestic-infos__search" type="submit">
                    جستجو
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- overlay  -->
    </section>
    <div class="form-overlay" id="form-overlay"></div>