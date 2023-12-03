const ticketBoxButtons = document.querySelectorAll('.ticket__body-head_title');

const collapseHandler = e => {

    const ticketContent = e.target.parentElement.parentElement.nextElementSibling

    ticketContent.classList.toggle('active');
    ticketBoxButtons.forEach(item => item.classList.remove('active'));

    if (!ticketContent.classList.contains('active')) {
        ticketBoxButtons.forEach(item => item.classList.remove('active'));
    } else {
        e.target.classList.add('active');
    }

}


ticketBoxButtons.forEach(item => item.addEventListener('click', collapseHandler))