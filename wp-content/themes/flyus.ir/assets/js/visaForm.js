//variables
const reqVisFrom = document.getElementById('visa-form');

//functions
const reqVisaFromHandler = e => {
    e.preventDefault();
    console.log(`request for visa`);
}


// event 
reqVisFrom.addEventListener('submit', reqVisaFromHandler);