// jQuery(document).on('ready', function() {
//    $('.billing_cards_number').selectWoo();
//    $('.billing_cards_number').on('change', function ()
//    {
//        alert(this.value); //or alert($(this).val());
//    });
//});

jQuery(document).ready(function($) {
try 
{
  $('.card_select').selectWoo();
}
catch(err) 
{
  console.log(err.message);
}
});
 
