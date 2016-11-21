$(document).ready(function() {
     
        
 // fancybox config      
	$('.fancybox').fancybox({
        
        	openEffect  : 'elastic',
		closeEffect : 'elastic',
                    helpers : {
                        title: {
                                type: 'inside',
                                position: 'top'
                        }
                    }
        
        });
        
        	$('.modal').fancybox({
        
        	openEffect  : 'none',
		closeEffect : 'none',
                modal : 'true'
        
        });
        
        
// ks-app addons        
        
  $('.hasoverlay').append('<span class="fa fa-search-plus overlay-icon"></span>')      
  $('.required').parent().before('<span class="required"> *</span>')           
        
        
        
        
        
        
        
        
        
        
        
});