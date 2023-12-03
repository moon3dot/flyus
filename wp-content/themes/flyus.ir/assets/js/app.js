//variables
const responsiveBtn = document.getElementById('responsive__toggle');
const responsiveNav = document.getElementById('responsive-menu');
const closeResponsiveMenuBtn = document.getElementById('close-responsive__nav');
const responsiveNavItems = document.querySelectorAll('.responsive-nav__list-item');
const contactPhone = document.getElementById("ideall__number");
const overlayLayer = document.getElementById('overlay');
let accordionItem = null;


//functions


///Responsive Menu
//toggle menu with button in responsive
const toggleResponsiveMenuHandler = () => {
  responsiveBtn.classList.toggle('active')
  responsiveNav.classList.toggle('active');
  overlayLayer.classList.toggle('active');
}

//open and close submenu in responsive nav
const toggleSubMenuHandler = e => {
  let mainItem = null;
  if (e.target.tagName !== "DIV") {
    mainItem = e.target.parentElement.parentElement;
  } else {
    mainItem = e.target.parentElement;
  }
  mainItem.classList.toggle('active');
}

// close responsive nav with x button 
const closeResponsiveMenuHandler = () => {
  responsiveNav.classList.remove('active');
  overlayLayer.classList.remove('active');
  responsiveBtn.classList.remove('active');
}

const closeResponsiveMenuOverlay = e => {
  if (e.target.id === 'overlay') {
    responsiveNav.classList.remove('active');
    overlayLayer.classList.remove('active');
    responsiveBtn.classList.remove('active');
  }
}

///ACCORDION
const closeAccordionTab = () => accordionItems.forEach(element => element.classList.remove('active'));

//toggle accordion
const toggleAccordionHandler = e => {
  //check clicked area
  if (e.target.tagName === 'SPAN') {
    accordionItem = e.target.parentElement.parentElement
  } else if (e.target.tagName !== 'DIV') {
    accordionItem = e.target.parentElement
  } else {
    accordionItem = e.target
  }

  //open and close accordion
  if(accordionItem.parentElement.classList.contains('active')){
    console.log('contain')
    accordionItem.parentElement.classList.remove('active')
  }else{
    closeAccordionTab();
    accordionItem.parentElement.classList.add('active')
  }

}



//call on touch number
const callContactHandler = () => {
  window.open("tel:43900880-021");
}



responsiveBtn.addEventListener('click', toggleResponsiveMenuHandler);
closeResponsiveMenuBtn.addEventListener('click', closeResponsiveMenuHandler);
document.addEventListener('click', closeResponsiveMenuOverlay);
responsiveNavItems.forEach(item => item.addEventListener('click', toggleSubMenuHandler));
contactPhone?.addEventListener('click', callContactHandler);
accordionItems?.forEach(item => item.addEventListener('click', toggleAccordionHandler));
responsiveAsideButton?.addEventListener('click', openAsideHandler);
closeAsideBtn?.addEventListener('click', closeAsideHandler);
orderingButton?.addEventListener('click', openOrderingHandler);
closeOrderingListBtn?.addEventListener('click', closeOrderingHandler);
orderingItems?.addEventListener('click', activeOrderingItem);
