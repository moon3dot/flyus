
jQuery(function ($)
{
	
try 
{

	var $input = $('input[name=billing_cards_number]')
    .tagify({backspace : "edit",  pattern: /^.{16}$/, keepInvalidTags : true })
        .on('add', function(e, tagName){
            console.log('JQEURY EVENT: ', 'added', tagName);
        })
        .on("invalid", function(e, tagName) {
            console.log('JQEURY EVENT: ',"invalid", e, ' ', tagName);
        });
		
}
catch(err) 
{
  console.log(err.message);
}	
		
});