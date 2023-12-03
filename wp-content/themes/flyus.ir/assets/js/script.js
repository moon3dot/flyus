jQuery( document ).ready(function() {
    jQuery("ul.navbar__list-submenu").prev().removeAttr( "href" );
    jQuery("ul.responsive-nav__submenu").prev().removeAttr( "href" );
});
jQuery(document).on('click', '#more_posts', function (event) { 
    event.preventDefault();
    
    let $this = jQuery(this);
    
    $this.text('بارگذاری ...');
    
    let $page = parseInt($this.data('page'));
    
    jQuery.ajax({
    
        url: data.ajax_url,
        type: 'post',
        dataType: 'json',
        data: {
            action: 'load_more_content',
            page: $page
        },
        success: function (response) {
            
            if (parseInt(response.count) > 0) {
    
                jQuery('#all-post').append(response.content);
    
                $this.data('page', parseInt($page + 1));
                
            }
            if(response.content==""){
                $this.attr("disabled","disabled");

            }
            $this.text('ادامه مطلب');
    
        },
        error: function () {
           
        }
    
    });
    
});