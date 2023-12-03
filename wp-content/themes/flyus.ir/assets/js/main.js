//variables
const responsiveBtn = document.getElementById("responsive__toggle");
const menuItems = document.querySelectorAll('.navbar__list-item .navbar__list-link');
const menuSubItems = document.querySelectorAll('.navbar__list-submenu-link');
const responsiveNav = document.getElementById("responsive-menu");
const closeResponsiveMenuBtn = document.getElementById("close-responsive__nav");
const responsiveNavItems = document.querySelectorAll(
  ".responsive-nav__list-item"
);
const headerMenusItem = document.querySelectorAll(".navbar__list-item");
const overlayLayer = document.getElementById("overlay");
const contactPhone = document.getElementById("ideall__number");
const accordionItems = document.querySelectorAll(".accordion-button");
const responsiveAsideButton = document.getElementById("aside__button");
const sidebar = document.querySelector(".sidebar");
const closeAsideBtn = document.getElementById("sidebar-close");
const orderingButton = document.getElementById("ordering-box__order");
const orderingItems = document.querySelector(".ordering-box__list");
const closeOrderingListBtn = document.getElementById(
  "ordering-box__list-close"
);
const contentTabButtonsWrapper = document.querySelector(
  ".insurance__head-buttons"
);
const contentTabButtons = document.querySelectorAll(
  ".insurance__head-buttons_item"
);
const contentTabContent = document.querySelectorAll(".insurance-content");
const ticketBoxButtons = document.querySelectorAll(".ticket__body-head_title");
const flightItems = document.querySelector(".flights__header");
const flightsHeaderItem = document.querySelectorAll(".flights__header-item");
const indexScrollButton = document.getElementById("index_search");
const indexServicesSec = document.getElementById("services");
const indexFlightSection = document.getElementById("flights") || null;
const searchNavigation = document.getElementById("responsive-navigation");
const toursStarsButton = document.querySelectorAll(".tour-cat__sidebar-list--stars");
const landingScrollBtn = document.getElementById('landing-ctr__icon');
const flightsDirectionBtn = document.getElementById('flights-direction');
const startCities = document.getElementById('domestic-cities-start');
const startCitiesInput = document.getElementById('domestic-cities-start-input');
const passengerInput = document.getElementById("passengers-input");
const endCities = document.getElementById('domestic-cities-end');
const endCitiesInput = document.getElementById('domestic-cities-end-input');
const passengersSelection = document.getElementById("passengers-selection");
const formOverlay = document.getElementById("form-overlay");
const insuranceForm = document.getElementById("insurance-form");
const travelTimeInput = document.getElementById("travel-time-input");
const travelTimeList = document.getElementById("travel-time-list");
const travelTimeItems = document.querySelectorAll(".travel-time__item");
const insurancePassengersInput = document.getElementById("insurance-passengers-input");
const insuranceSingleDestination = document.getElementById("single-destination");
const insuranceMultiDestination = document.getElementById("multi-destination");
const addInsuranceDestination = document.getElementById("add-insurance--destination");
let accordionItem = null;
const pathname = window.location.pathname;
//functions

//insert icon
const insertIconHandler = (e) => {
  if (e.children.length > 1) {
    e.firstElementChild.insertAdjacentHTML(
      "beforeend",
      `<svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M11 1L6 6L1 1" stroke="#585858" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      `
    );
  }
};

//toggle menu with button in responsive
const toggleResponsiveMenuHandler = () => {
  responsiveBtn.classList.toggle("active");
  responsiveNav.classList.toggle("active");
  overlayLayer.classList.toggle("active");
};

//open and close submenu in responsive nav
const toggleSubMenuHandler = (e) => {
  let mainItem = null;
  if (e.target.tagName !== "DIV") {
    mainItem = e.target.parentElement.parentElement;
  } else {
    mainItem = e.target.parentElement;
  }
  mainItem.classList.toggle("active");
};

// close responsive nav with x button
const closeResponsiveMenuHandler = () => {
  responsiveNav.classList.remove("active");
  overlayLayer.classList.remove("active");
  responsiveBtn.classList.remove("active");
};

const closeResponsiveMenuOverlay = (e) => {
  if (e.target.id === "overlay") {
    responsiveNav.classList.remove("active");
    overlayLayer.classList.remove("active");
    responsiveBtn.classList.remove("active");
  }
};

///Accordion
// close all tabs
const closeAccordionTab = () => {
  accordionItems.forEach((element) => element.classList.remove("active"));
}

//toggle accordion
const toggleAccordionHandler = (e) => {
  //check clicked area
  if (e.target.tagName === "SPAN") {
    accordionItem = e.target.parentElement.parentElement;
  } else if (e.target.tagName !== "DIV") {
    accordionItem = e.target.parentElement;
  } else {
    accordionItem = e.target;
  }

  //open and close accordion
  if (accordionItem.parentElement.classList.contains("active")) {
    accordionItem.parentElement.classList.remove("active");
  } else {
    closeAccordionTab();
    accordionItem.parentElement.classList.add("active");
  }
};

///Aside
//open side bar
const openAsideHandler = () => {
  responsiveAsideButton.classList.add("active");
  sidebar.classList.add("active");
};

//open filter base ordering
const openOrderingHandler = () => orderingItems.classList.add("active");

//close sidebar
const closeAsideHandler = () => sidebar.classList.remove("active");

//close ordering
const closeOrderingHandler = () => orderingItems.classList.remove("active");

//active ordering item
const activeOrderingItem = (e) =>
  e.target.tagName === "LI" && e.target.classList.toggle("active");

//scroll to flight section index page
const scrollToFlights = () => {
  let yPost = indexServicesSec.offsetTop
  if (window.scrollY > yPost) indexFlightSection.scrollIntoView({ behavior: "smooth" })
}



const toggleSearchButton = () => {
  if (indexServicesSec) {
    let yPost = indexServicesSec.offsetTop
    if (window.scrollY > yPost) {
      setTimeout(() => {
        indexScrollButton.classList.add("active");
        searchNavigation.classList.add("active");
      }, 300);
    } else {
      setTimeout(() => {
        indexScrollButton.classList.remove("active");
        searchNavigation.classList.remove("active");

      }, 300);
    }
  }
}

//change active menu

//todo
const changeActiveMenuHandler = item => {
  if (pathname.includes("blog") && item.dataset.id === "blog") {
    item.classList.add("active")
  }
}

const activeSubMenuHandler = e => {
  menuSubItems.forEach(item => item.classList.remove('active'));
  e.currentTarget.classList.add('active');
}

///Content Tab
const changeTabHandler = (e) => {
  //active title with click
  contentTabButtons.forEach((item) => item.classList.remove("active"));
  e.target.classList.add("active");
  //active content with click
  contentTabContent.forEach((item) => item.classList.remove("active"));
  const mainContent = document.getElementById(e.target.dataset.id);
  mainContent.classList.add("active");
  const transition = document.querySelector('.insurance__body-wrapper');
  transition.classList.remove('insurance__body-wrapper')
  transition.classList.add('insurance__body-wrapper-active')
};

///Ticket box
const collapseHandler = (e) => {
  const ticketContent = e.target.parentElement.parentElement.nextElementSibling;

  ticketContent.classList.toggle("active");
  ticketBoxButtons.forEach((item) => item.classList.remove("active"));

  if (!ticketContent.classList.contains("active")) {
    ticketBoxButtons.forEach((item) => item.classList.remove("active"));
  } else {
    e.target.classList.add("active");
  }
};

//call on touch number
const callContactHandler = () => {
  window.open("tel:43900880-021");
};

//flights change active tab
const changeFlightsActiveTab = (e) => {
  let mainTitle = null;
  if (e.target.tagName === "BUTTON") mainTitle = e.target;
  if (e.target.tagName === "IMG") mainTitle = e.target.parentElement;
  if (e.target.tagName === "P") mainTitle = e.target.parentElement;
  if (mainTitle) {
    flightsHeaderItem.forEach((item) => item.classList.remove("active"));
    mainTitle.classList.add("active");
  }
};

//active tours starts filter
const activeToursStarsHandler = (e) => {

  e.currentTarget.classList.toggle("active");
}

//scroll to popularity section in landing
const scrollToBottomHandler = (e) => {
  const landingPopularitySection = document.getElementById('landing-popularity');
  landingPopularitySection.scrollIntoView({
    block: 'start',
    behavior: 'smooth',
    inline: 'start'
  });
}

//change flight direction 
const changeFlightDirectionHandler = e => {
  const flightBtns = document.querySelectorAll('.domestic-flights__button');
  if (e.target.tagName === 'BUTTON') {
    flightBtns.forEach((item) => item.classList.remove('active'));
    e.target.classList.add('active');
  }
}

//show start cities list
const showStartCitiesListHandler = () => {
  startCities.classList.toggle("active");
  const formOverlay = document.getElementById("form-overlay");

  if (startCities.classList.contains("active")) {
    formOverlay.classList.add("active");
  } else {
    formOverlay.classList.remove("active");
    formOverlay.classList.remove("active");
  }

  const cities = document.querySelectorAll('.flight-city__start');
  const startInputElm = document.getElementById('domestic-cities-start-input');
  cities.forEach((city) => {
    city.addEventListener('click', (e) => {
      console.log(e.currentTarget.lastElementChild.innerText)
      console.log(`selected city =>> `, e.currentTarget.dataset.value)
      startInputElm.value = e.currentTarget.lastElementChild.innerText
      startCities.classList.remove("active");
      formOverlay.classList.remove("active");
    })
  })
}

//single destination insurance
const toggleInsuranceDestFrom = (e) => {
  const destination = e.target.value;
  const startInput = document.getElementById("insurance-form__start-cities");
  // const endInput = document.getElementById("insurance-form__icon-cities");
  // const domestiCitiesEndInput = document.getElementById("domestic-cities-end-input");

  if (destination === "single-destination") {
    startInput.classList.remove("disable");
  } else {
    startInput.classList.remove("disable");
  }

}

//change destination
const toggleDestinationHandler = (e) => {
  if(e.currentTarget){
    console.log(`clicked =>> `, insuranceMultiDestination.checked)
    if(!insuranceMultiDestination.checked){
      insuranceMultiDestination.checked = true
    }
    
  }
}







//show start end list
const showEndCitiesListHandler = () => {
  endCities.classList.toggle("active");
  const formOverlay = document.getElementById("form-overlay");


  if (endCities.classList.contains("active")) {
    formOverlay.classList.add("active");
  } else {
    formOverlay.classList.remove("active");
    formOverlay.classList.remove("active");
  }

  const cities = document.querySelectorAll('.flight-city__end');
  const startInputElm = document.getElementById('domestic-cities-end-input');
  cities.forEach((city) => {
    city.addEventListener('click', (e) => {
      console.log(e.currentTarget.lastElementChild.innerText)
      console.log(`selected city =>> `, e.currentTarget.dataset.value)
      startInputElm.value = e.currentTarget.lastElementChild.innerText
      endCities.classList.remove("active");
      formOverlay.classList.remove("active");
    })
  })
}

//show passenger
const togglePassengerContainer = () => {
  passengersSelection.classList.toggle("active");

  if (passengersSelection.classList.contains("active")) {
    formOverlay.classList.add("active");
  } else {
    formOverlay.classList.remove("active");
  }

  const passengersInput = document.getElementById("passengers-input");

  let adultNumber = 0
  let childNumber = 0
  let babyNumber = 0
  let sum = adultNumber + childNumber + babyNumber;


  const addAdult = document.getElementById("adult-add");
  const minusAdult = document.getElementById("adult-minus");
  const resultAdult = document.getElementById("adult-result");

  const addChild = document.getElementById("child-add");
  const minusChild = document.getElementById("child-minus");
  const resultChild = document.getElementById("child-result");

  const addBaby = document.getElementById("baby-add");
  const minusBaby = document.getElementById("baby-minus");
  const resultBaby = document.getElementById("baby-result");

  //add adult
  addAdult.addEventListener("click", () => {


    if (adultNumber >= 9 || sum >= 9) {
      addAdult.classList.add("deactive");
      addChild.classList.add("deactive");
      addBaby.classList.add("deactive");

      return false
    }


    adultNumber++;
    sum++;

    if (adultNumber > 0) {
      minusAdult.classList.remove("deactive");
    }

    if (adultNumber > 0 && childNumber < 2) {
      addChild.classList.remove("deactive");
    }

    if (adultNumber > 0 && babyNumber === 0) {
      addBaby.classList.remove("deactive");
    }

    if (sum === 9 || adultNumber === 9) {
      console.log(`end`)
      addBaby.classList.add("deactive");
      addChild.classList.add("deactive");
      addAdult.classList.add("deactive");
    }

    resultAdult.innerHTML = adultNumber;
    passengersInput.value = sum;

  })

  //minus adult
  minusAdult.addEventListener("click", () => {


    if (adultNumber <= 0) {
      minusAdult.classList.add("deactive");
      minusAdult.classList.add("deactive");
      minusBaby.classList.add("deactive");

      return false
    }

    if (adultNumber <= 9 || sum >= 9) {
      addAdult.classList.remove("deactive");
    }

    adultNumber--;
    sum--;

    if ((adultNumber <= 9 || sum >= 9) && childNumber < 2) {
      addChild.classList.remove("deactive");
    }

    if ((adultNumber <= 9 || sum >= 9) && babyNumber < 1) {
      addBaby.classList.remove("deactive");
    }


    if (adultNumber === 0) {
      addBaby.classList.add("deactive")
      minusAdult.classList.add("deactive");
      addChild.classList.add("deactive");
    }



    resultAdult.innerHTML = adultNumber;
    passengersInput.value = sum;
  })




  //add child
  addChild.addEventListener("click", () => {

    if (childNumber >= 2 || sum >= 9) {
      addChild.classList.add("deactive");
      return false
    }

    if (adultNumber === 0) {
      return false;
    }

    childNumber++;
    sum++;

    if (childNumber >= 2) {
      addChild.classList.add("deactive");
    }

    if (childNumber >= 0) {
      minusChild.classList.remove("deactive");
    }

    resultChild.innerHTML = childNumber;
    passengersInput.value = sum;

  })

  //minus child
  minusChild.addEventListener("click", () => {
    if (childNumber <= 0) {
      minusChild.classList.add("deactive");
      return false;
    }

    childNumber--;
    sum--;

    if (childNumber <= 2 && sum <= 9) {
      addChild.classList.remove("deactive");
    }

    if (childNumber <= 0) {
      minusChild.classList.add("deactive");
    }

    if (childNumber < 2 && adultNumber < 9) {
      addAdult.classList.remove("deactive");
    }

    if (childNumber < 2 && babyNumber < 1) {
      addBaby.classList.remove("deactive");
    }

    resultChild.innerHTML = childNumber;
    passengersInput.value = sum;

  })


  //add baby
  addBaby.addEventListener("click", () => {

    if (sum >= 9) {
      addBaby.classList.add("deactive");
      addChild.classList.add("deactive");
      return false
    }

    if (adultNumber === 0) {
      addBaby.classList.add("deactive");
      return false

    }

    if (adultNumber === 0) {
      addBaby.classList.add("deactive");
      minusBaby.classList.add("deactive");
    }


    if (babyNumber >= 1) {
      addBaby.classList.add("deactive");
      minusBaby.classList.remove("deactive");
      return false
    }



    babyNumber++;
    sum++;

    if (babyNumber === 1) {
      addBaby.classList.add("deactive");
      minusBaby.classList.remove("deactive");
    }


    resultBaby.innerHTML = babyNumber;
    passengersInput.value = sum;
  })

  //minus baby
  minusBaby.addEventListener("click", () => {

    if (babyNumber <= 0) {
      minusBaby.classList.add("deactive");
      return false
    }



    babyNumber--;
    sum--;

    if (babyNumber === 0) {
      addBaby.classList.remove("deactive");
      minusBaby.classList.add("deactive");
    }

    if (babyNumber === 0 && sum <= 9) {
      addAdult.classList.remove("deactive");
    }

    resultBaby.innerHTML = babyNumber;
    passengersInput.value = sum;

  })

}

//close all dropDowns
const closeFormVisHandler = () => {
  startCities.classList.remove("active");
  passengersSelection.classList.remove("active");
  travelTimeList?.classList.remove("active");
  formOverlay.classList.remove("active");

}


//insurance form
const submitInsuranceForm = e => {
  e.preventDefault();
  alert("submit form")
}

//date active
const toggleTimeListHandler = () => {
  travelTimeList.classList.toggle("active");
  const travelTimeInput = document.getElementById("travel-time-input")

  if (travelTimeList.classList.contains("active")) {
    formOverlay.classList.add("active");
  }

  travelTimeItems.forEach((item) => item.addEventListener("click", (e) => {
    travelTimeInput.value = e.target.innerText;
    travelTimeList.classList.remove("active");
    formOverlay.classList.remove("active")
  }))


}

//insurance passenger container
const toggleInsurancePassengerHandler = () => {

  const insurancePassengerSelection = document.getElementById("passengers-selection");
  const formOverlay = document.getElementById("form-overlay");

  let sum = 0
  const group1Add = document.getElementById("12-add");
  const group1Result = document.getElementById("12-result");
  const group1Minus = document.getElementById("12-minus");
  let group1Num = 0;

  group1Add.addEventListener("click", () => {
    group1Num++;
    sum++
    group1Result.innerHTML = group1Num;
    insurancePassengersInput.value = sum;
    if (group1Num >= 1) {
      group1Minus.classList.remove("deactive");
    }
  })

  group1Minus.addEventListener("click", () => {
    if (group1Num <= 0) {
      group1Minus.classList.add("deactive");
    } else {
      group1Num--;
      sum--;
      group1Result.innerHTML = group1Num;
      insurancePassengersInput.value = sum;
    }

  })


  const group2Add = document.getElementById("13-add");
  const group2Result = document.getElementById("13-result");
  const group2Minus = document.getElementById("13-minus");
  let group2Num = 0;

  group2Add.addEventListener("click", () => {
    group2Num++;
    sum++
    group2Result.innerHTML = group2Num;
    insurancePassengersInput.value = sum;
    if (group2Num >= 1) {
      group2Minus.classList.remove("deactive");
    }

  })

  group2Minus.addEventListener("click", () => {
    if (group2Num <= 0) {
      group2Minus.classList.add("deactive");
    } else {
      group2Num--;
      sum--;
      group2Result.innerHTML = group2Num;
      insurancePassengersInput.value = sum;
    }

  })

  const group3Add = document.getElementById("66-add");
  const group3Result = document.getElementById("66-result");
  const group3Minus = document.getElementById("66-minus");
  let group3Num = 0;

  group3Add.addEventListener("click", () => {
    group3Num++;
    sum++
    group3Result.innerHTML = group3Num;
    insurancePassengersInput.value = sum;

    if (group3Num >= 1) {
      group3Minus.classList.remove("deactive");
    }

  })

  group3Minus.addEventListener("click", () => {
    if (group3Num <= 0) {
      group3Minus.classList.add("deactive");
    } else {
      group3Num--;
      sum--;
      group3Result.innerHTML = group3Num;
      insurancePassengersInput.value = sum;
    }

  })



  const group4Add = document.getElementById("71-add");
  const group4Result = document.getElementById("71-result");
  const group4Minus = document.getElementById("71-minus");
  let group4Num = 0;

  group4Add.addEventListener("click", () => {
    group4Num++;
    sum++
    group4Result.innerHTML = group4Num;
    insurancePassengersInput.value = sum;

    if (group4Num >= 1) {
      group4Minus.classList.remove("deactive");
    }

  })

  group4Minus.addEventListener("click", () => {
    if (group4Num <= 0) {
      group4Minus.classList.add("deactive");
    } else {
      group4Num--;
      sum--;
      group4Result.innerHTML = group4Num;
      insurancePassengersInput.value = sum;
    }

  })

  const group5Add = document.getElementById("76-add");
  const group5Result = document.getElementById("76-result");
  const group5Minus = document.getElementById("76-minus");
  let group5Num = 0;

  group5Add.addEventListener("click", () => {
    group5Num++;
    sum++
    group5Result.innerHTML = group5Num;
    insurancePassengersInput.value = sum;

    if (group5Num >= 1) {
      group5Minus.classList.remove("deactive");
    }

  })

  group5Minus.addEventListener("click", () => {
    if (group5Num <= 0) {
      group5Minus.classList.add("deactive");
    } else {
      group5Num--;
      sum--;
      group5Result.innerHTML = group5Num;
      insurancePassengersInput.value = sum;
    }

  })

  const group6Add = document.getElementById("81-add");
  const group6Result = document.getElementById("81-result");
  const group6Minus = document.getElementById("81-minus");
  let group6Num = 0;

  group6Add.addEventListener("click", () => {
    group6Num++;
    sum++
    group6Result.innerHTML = group6Num;
    insurancePassengersInput.value = sum;

    if (group6Num >= 1) {
      group6Minus.classList.remove("deactive");

    }

  })

  group6Minus.addEventListener("click", () => {
    if (group6Num <= 0) {
      group6Minus.classList.add("deactive");
    } else {
      group6Num--;
      sum--;
      group6Result.innerHTML = group6Num;
      insurancePassengersInput.value = sum;
    }

  })

  //toggle show container
  insurancePassengerSelection.classList.toggle("active");
  formOverlay.classList.toggle("active");



}



//events
responsiveBtn.addEventListener("click", toggleResponsiveMenuHandler);
closeResponsiveMenuBtn.addEventListener("click", closeResponsiveMenuHandler);
document.addEventListener("click", closeResponsiveMenuOverlay);
responsiveNavItems.forEach((item) =>
  item.addEventListener("click", toggleSubMenuHandler)
);
headerMenusItem.forEach(insertIconHandler);

contactPhone?.addEventListener("click", callContactHandler);
accordionItems?.forEach((item) =>
  item.addEventListener("click", toggleAccordionHandler)
);
responsiveAsideButton?.addEventListener("click", openAsideHandler);
closeAsideBtn?.addEventListener("click", closeAsideHandler);
orderingButton?.addEventListener("click", openOrderingHandler);
closeOrderingListBtn?.addEventListener("click", closeOrderingHandler);
orderingItems?.addEventListener("click", activeOrderingItem);
contentTabButtonsWrapper?.addEventListener("click", changeTabHandler);
ticketBoxButtons?.forEach((item) =>
  item.addEventListener("click", collapseHandler)
);
flightItems?.addEventListener("click", changeFlightsActiveTab);
menuItems && menuItems.forEach(changeActiveMenuHandler);
menuSubItems && menuSubItems.forEach(item => item.addEventListener('click', activeSubMenuHandler));
indexScrollButton && indexScrollButton.addEventListener("click", scrollToFlights);
window.addEventListener("scroll", toggleSearchButton);
toursStarsButton?.forEach(element => {
  element.addEventListener("click", activeToursStarsHandler);
});
landingScrollBtn?.addEventListener('click', scrollToBottomHandler);
flightsDirectionBtn?.addEventListener('click', changeFlightDirectionHandler);
startCitiesInput?.addEventListener("click", showStartCitiesListHandler);
endCitiesInput?.addEventListener("click", showEndCitiesListHandler);

passengerInput?.addEventListener("click", togglePassengerContainer);
formOverlay?.addEventListener("click", closeFormVisHandler);
insuranceForm?.addEventListener("submit", submitInsuranceForm);
travelTimeInput?.addEventListener("click", toggleTimeListHandler);
insurancePassengersInput?.addEventListener("click", toggleInsurancePassengerHandler);
insuranceSingleDestination?.addEventListener("change", toggleInsuranceDestFrom);
insuranceMultiDestination?.addEventListener("change", toggleInsuranceDestFrom);
addInsuranceDestination?.addEventListener("click", toggleDestinationHandler);