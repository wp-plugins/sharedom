(function( $ ) {
	'use strict';

    $(document).ready(function() {
        console.log('buttons.js loaded!');

        var currentURL = $(location).attr('href');
        var facebookShareURL 	=	'http://facebook.com/sharer/sharer.php?u=' + currentURL;
        var twitterShareURL 	=	'http://twitter.com/share?url=' + currentURL;
        var googleplusShareURL 	=	'https://plus.google.com/share?url=' + currentURL;

        $('.sharedom-facebook').attr('href', facebookShareURL);
        $('.sharedom-twitter').attr('href', twitterShareURL);
        $('.sharedom-googleplus').attr('href', googleplusShareURL);

        $('.sharedom-btn').click(function(event) {
            event.preventDefault();
            window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
        });
    });

})( jQuery );
