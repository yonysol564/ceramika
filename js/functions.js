var locations;
jQuery(window).load(function(){
	//Add class to body on load
	jQuery('body').addClass('pageLoaded');
	//catalogue - items enter
	var elTime = 0;
	jQuery('.gallery-items, .product-lnk, .magzin-con').each(function(){
		var self = jQuery(this);
		setTimeout(function(){
			self.addClass('active');
		},elTime);
		elTime += 200;
	});


});
//Top button
jQuery('.back-topbut').click(function(){
	jQuery('html, body').animate({scrollTop:0}, 'slow');
});
//MULTI swiper
jQuery('.swiper-container').length && (function(){
	var swiper = [];
	jQuery('.swiper-container').each(function(index){
		var self			= jQuery(this);
		var itemNum			= parseInt(self.attr('data-items'));
		var autoplay		= self.attr('data-autoplay') ? 3000 : false;
		var itemArrows		= self.attr('data-arrows') || false;
		var itemPagination	= self.attr('data-pagination') || false;
		//כמה להציג בקפיצה ב 767
		var breakpoints_767	= parseInt(self.attr('data-breakpoints-767'));
		//כמה להציג בקפיצה ב 599
		var breakpoints_599	= parseInt(self.attr('data-breakpoints-599'));
		var centeredSlides	= self.attr('data-center-slides') || false;
		var effect	= self.attr('data-effect') || 'slide';
		var breakpoints = {};
		if(breakpoints_767){
			breakpoints['767'] = {
							slidesPerView	: breakpoints_767,
							centeredSlides	: false,
							loop			: false
						}
		}
		if(breakpoints_599){
			breakpoints['599'] = {
							slidesPerView 	: breakpoints_599,
							centeredSlides	: centeredSlides,
							loop			: centeredSlides
						}
		}
		swiper[index] = self.swiper({
			autoplay			: autoplay,
			speed				: 900,
			slidesPerView		: itemNum,
			calculateHeight		: true,
			updateOnImagesReady	: true,
			grabCursor			: false,
			keyboardControl		: true,
			pagination			: itemPagination ? jQuery('.pagination',this) : null,
			paginationClickable	: true,
			nextButton			: itemArrows ? jQuery(this).parent().find('.next') : null,
			prevButton			: itemArrows ? jQuery(this).parent().find('.prev') : null,
			breakpoints			: breakpoints,
			effect 				: effect
		});
	});
}());
//show top button
var showHideTop = false;
if(jQuery(window).scrollTop() > 90 && !showHideTop){
	jQuery('.back-topbut').addClass('active');
	showHideTop = true;
}
jQuery(window).scroll(function(){
	if(jQuery(window).scrollTop() > 90 && !showHideTop){
		jQuery('.back-topbut').addClass('active');
		showHideTop = true;
	}
	if(jQuery(window).scrollTop() < 90 && showHideTop){
		jQuery('.back-topbut').removeClass('active');
		showHideTop = false;
	}
});
jQuery("body").on("click","a.facebook_button", function(){
	var current_image_src = jQuery(".fancybox-inner img").attr("src");
	console.log(current_image_src);
	jQuery("meta#tax_image").attr("content",current_image_src);
});
jQuery("body").on("click","a.pinterest_button", function(){
	src = jQuery(".fancybox-inner img").attr("src");
	console.log(src);
});
//fancybox catalog gallery
jQuery('.fancyboxCatalogGallery').length && (function(){
	jQuery('.fancyboxCatalogGallery').fancybox({
		maxWidth	: '80%',
		maxHeight	: '70%',
		padding		: 0,
		scrolling: 'no',
		overlayOpacity : 0.5,
		helpers: {
			overlay: {
			  locked: true
			}
		},
		beforeShow:function(){
			// jQuery("body").css({'overflow-y':'hidden'});
			var src;
			src = jQuery('.fancybox-image').attr('src');
			var current_url = window.location.href;

			jQuery('.fancybox-inner').after('\
				<a href="javascript:window.open(\'https://www.facebook.com/sharer/sharer.php?u='+src+'\', \'\', \'resizable=yes,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=900,left=200,height=300,top=100\');" class="fancyboxShareIconsWrap facebook_button" title="שיתוף בפייסבוק">\
					<img src="'+ domainurl +'/images/icon01.png" alt="facebook" class="fancyboxShareIcons" />\
				</a>\
				<a href="javascript:window.open(\'http://pinterest.com/pin/create/button/?url='+ src +'&media='+ src +'\', \'\', \'resizable=yes,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=750,left=200,height=530,top=100\');" class="fancyboxShareIconsWrap pinterest_button" title="שיתוף בפינטרסט">\
					<img src="'+ domainurl +'/images/icon03.png" alt="pinterest" class="fancyboxShareIcons" />\
				</a>\
				<a href="mailto:name@email.com" target="_blank" class="fancyboxShareIconsWrap" title="שלח לחבר">\
					<img src="'+ domainurl +'/images/icon04.png" alt="mail" class="fancyboxShareIcons" />\
				</a>\
			');
		},
		afterShow: function() {
			//jQuery("body").css({'overflow-y':'hidden'});
            jQuery('.fancybox-wrap').swipe({
                swipe : function(event, direction) {
                    if (direction === 'left' || direction === 'up') {
                        jQuery.fancybox.prev( direction );
                    } else {
                        jQuery.fancybox.next( direction );
                    }
                }
            });

        },
	});
}());
//מובייל - תפריט ראשי
jQuery('.menu_icon').click(function(){
	jQuery('html').toggleClass('mobileMenuIsOpen');
});
//לשונית יצירת קשר - פתיחה
jQuery('.floatingContactButton, .closePopContact, .blackOpacity, .openPopContact').click(function(){
	jQuery('html').toggleClass('popContactIsOpen');
});

jQuery(document).ready(function(){

	if(jQuery("#contact_map").length) {
    	init_google_map();
  	}

});



function init_google_map(){
  map = new google.maps.Map(document.getElementById('contact_map'), {
      zoom: 16,
      draggable: false,
      center: new google.maps.LatLng(locations[1],locations[2])
    });
    var infowindow = new google.maps.InfoWindow();
    var marker;
    marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[1], locations[2]),
    map: map,
    animation: google.maps.Animation.DROP
  });
}
