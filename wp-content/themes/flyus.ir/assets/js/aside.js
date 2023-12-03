//variables
const responsiveAsideButton = document.getElementById('aside__button');
const sidebar = document.querySelector('.sidebar');
const closeAsideBtn = document.getElementById('sidebar-close');
const orderingButton = document.getElementById('ordering-box__order');
const orderingItems = document.querySelector('.ordering-box__list');
const closeOrderingListBtn = document.getElementById('ordering-box__list-close');

//functions

//open side bar
const openAsideHandler = () => {
    responsiveAsideButton.classList.add('active');
    sidebar.classList.add('active');
}

//open filter base ordering
const openOrderingHandler = () => orderingItems.classList.add('active');

//close sidebar
const closeAsideHandler = () =>  sidebar.classList.remove('active');

//close ordering
const closeOrderingHandler = () => orderingItems.classList.remove('active');

//active ordering item
const activeOrderingItem = e => e.target.tagName === 'LI' && e.target.classList.toggle('active')



//events
responsiveAsideButton.addEventListener('click', openAsideHandler);
closeAsideBtn.addEventListener('click', closeAsideHandler);
orderingButton.addEventListener('click', openOrderingHandler);
closeOrderingListBtn.addEventListener('click', closeOrderingHandler);
orderingItems.addEventListener('click', activeOrderingItem);