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
                // fancybox modals
        	$('.fmodal').fancybox({

        	openEffect  : 'none',
		closeEffect : 'none',
                modal : 'true'

        });





// ks-app addons
  $('.hasoverlay').append('<span class="fa fa-search-plus overlay-icon"></span>');






});