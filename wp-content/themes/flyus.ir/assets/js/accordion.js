//variables
const accordionItems = document.querySelectorAll('.accordion-button');

//accordion handler

// close all tabs 
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

//event listeners
accordionItems.forEach(item => item.addEventListener('click', toggleAccordionHandler));