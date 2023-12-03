//variables
const contentTabButtonsWrapper = document.querySelector('.insurance__head-buttons');
const contentTabButtons = document.querySelectorAll('.insurance__head-buttons_item');
const contentTabContent = document.querySelectorAll('.insurance-content');

//functions
const changeTabHandler = e => {
    //active title with click
    contentTabButtons.forEach(item => item.classList.remove('active'));
    e.target.classList.add('active');
    //active content with click
    contentTabContent.forEach(item => item.classList.remove('active'));
    const mainContent = document.getElementById(e.target.dataset.id);
    mainContent.classList.add('active')
}

//events
contentTabButtonsWrapper.addEventListener('click', changeTabHandler);