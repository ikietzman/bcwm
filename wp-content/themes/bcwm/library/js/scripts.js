/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-compvared )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, var's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tabvar or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

/* positions the grey slogan box below the team image on the homepage */
function positionSlogan2() {
	if (document.getElementById('slogan-2')) {
		if (window.innerWidth >= 768) {
			var slogan2 = document.getElementById('slogan-2');
			slogan2.style.top = -(slogan2.clientHeight / 2) + 'px';
		}
	}
}
/*
 * Put all your regular jQuery in here.
*/

positionSlogan2();


function pubListHeight() {
	if (document.getElementById('page-content-left')) {
		if (window.innerWidth >= 768) {
			var menu = document.getElementById('page-content-left');
			var right = document.getElementById('page-content-right');
			menu.style.height = right.clientHeight + 'px' ;

		}
	}
}
function ticker() {
	var tickerItems = document.getElementsByClassName('ticker-item');
	// console.log(tickerItems);
	// console.log(tickerItems.length);
	var i = 0;
	setInterval(function() {
		// console.log(i);


			for (var item in tickerItems) {
				tickerItems[item].className = 'ticker-item invisible';
			}
			setTimeout(function() {
				tickerItems[i].className = 'ticker-item visible';
			}, 2000);


		if (i < tickerItems.length - 1) {
			i++;
		}
		else {
			i = 0;
		}

	}, 6000)
}
pubListHeight();
function homeParallax() {
	var line1 = document.getElementById('home-line-1');
	var line2 = document.getElementById('home-line-2');
	var line3 = document.getElementById('home-line-3');
	var logo = document.getElementById('inner-header');
	line1.style.left = (logo.offsetLeft - 28) + 'px';
	if (window.pageYOffset <= 200 && window.pageYOffset / 200 < 1) {
		line1.style.top = -((window.pageYOffset / 200 * 50) - logo.offsetHeight ) + 'px';
	}
	else {
		line1.style.top = 51 + 'px'
	}
	window.addEventListener('scroll', function() {
		if (window.pageYOffset <= 200)  {
			line1.style.top = -((window.pageYOffset / 200 * 50) - logo.offsetHeight ) + 'px';
		}
	});
	var bottomHeading = document.querySelector('.bottom-heading')
	line2.style.top = (bottomHeading.offsetTop - (bottomHeading.offsetHeight)) + 'px';
	var linkBoxes = document.querySelector('.link-box-container');
	var commentarySection = document.querySelector('.recent-blog');
	var section2 = document.querySelector('.home-section-2');
	var section2margin = window.getComputedStyle(section2)['margin-top'];
	section2margin = section2margin.slice(0, section2margin.indexOf('px'))
	var adjustment = line3.naturalHeight - line3.offsetHeight;
	line3.style.top =  (commentarySection.offsetTop - linkBoxes.offsetTop) / 2  + adjustment + 'px'
}
function icmParallax() {
	var line = document.getElementById('icm-line');
	var heading = document.querySelector('.page-content-inner h2');
	console.log(heading.offsetTop);
	if (window.pageYOffset <= 200 && window.pageYOffset / 200 < 1) {
		line.style.top = 50 - ((window.pageYOffset / 200 * 50) ) + heading.offsetTop + 'px';
	}
	else {
		line.style.top = 33 + 'px'
	}
	//line.style.top = heading.offsetTop - heading.clientTop /2 + 'px'
	window.addEventListener('scroll', function() {
		if (window.pageYOffset <= 200)  {
			line.style.top = 50 - ((window.pageYOffset / 200 * 50) ) + heading.offsetTop + 'px';
		}
	});
}
function whatWeDoPositioning() {
	var leftMargin = document.querySelector('.page-header').offsetLeft;
	console.log(leftMargin);
	var line = document.getElementById('what-we-do-line');
	line.style.width = leftMargin * .75 + 'px';
	line.style.left = -leftMargin + 'px';
}
function getDistanceFromTop(element) {
    var yPos = 0;

    while(element) {
        yPos += (element.offsetTop);
        element = element.offsetParent;
    }

    return yPos;
}

function whoWeAreParallax() {
	var line = document.getElementById('who-we-are-line-1');
	var line2 = document.getElementById('who-we-are-line-2');
	var heading = document.querySelector('.page-content');
	if (window.pageYOffset <= 400 && window.pageYOffset / 400 < 1) {
		console.log(window.pageYOffset);
		line.style.top = 0 - ((window.pageYOffset / 400 * 110) ) + 'px';
	}
	else {
		line.style.top = -110 + 'px'
	}
	//line.style.top = heading.offsetTop - heading.clientTop /2 + 'px'
	window.addEventListener('scroll', function() {
		if (window.pageYOffset <= 400)  {
			line.style.top = 0 - ((window.pageYOffset / 400 * 110) ) + 'px';
		}
	});
	var footerDist = getDistanceFromTop(document.querySelector('footer'));
	var bioDist = getDistanceFromTop(document.querySelector('.bio3bio5'));
	console.log(bioDist);
	line2.style.bottom = footerDist - bioDist - 8 + 'px'

}
function bioPositioning() {
	var img = document.querySelector('.bio-right img');
	var line1 = document.getElementById('bio-line-1');
	var line2 = document.getElementById('bio-line-2');
	var heading = document.querySelector('.page-header')
	console.log(img.offsetTop);
	console.log(img.offsetLeft);
	console.log(img.clientHeight);
	line1.style.top = img.offsetTop - 40 + 'px';
	line1.style.left = img.offsetLeft - 30 + 'px';
	console.log(img.clientHeight);
	console.log(img.offsetTop);
	console.log(heading.offsetTop)
	// line2.style.top = img.clientHeight - img.offsetTop -40 +  'px';
	// line2.style.left = img.clientWidth + img.offsetLeft + 'px';
	line2.style.top = img.clientHeight - img.offsetTop - heading.offsetTop + 40 + 'px';
	line2.style.left = img.offsetLeft + img.clientWidth - 55 + 'px'
}
function ourHistoryParallax() {
	var line = document.getElementById('our-history-line');
	console.log(line);

	var heading = document.querySelector('.page-content');
	console.log(getDistanceFromTop(heading));
	let topDist = getDistanceFromTop(heading);
	topDist = topDist - 150;
	console.log(window.pageYOffset);
	console.log(topDist);
	if (window.pageYOffset <= topDist && window.pageYOffset / topDist < 1) {
		line.style.top =  -((window.pageYOffset / topDist * 200) ) + 'px';
	}
	else {
		line.style.top = -200 + 'px'
	}
	window.addEventListener('scroll', function() {
		if (window.pageYOffset <= topDist)  {
			line.style.top =  -((window.pageYOffset / topDist * 200)) + 'px';
		}
	});
}
jQuery(document).ready(function($) {

  /*
   * var's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();
	if (location.pathname == '/bcwm_dev/') {
		homeParallax();
	}
	if (location.pathname == '/bcwm_dev/institutional-capital-management/' || location.pathname == '/bcwm_dev/personal-wealth-management/') {
		icmParallax();
	}
	if (window.location.pathname.indexOf('what-we-do') > 0 && window.innerWidth >= 768) {
		whatWeDoPositioning();
	}
	if (window.location.pathname == '/bcwm_dev/about/who-we-are/' && window.innerWidth >= 768) {
		whoWeAreParallax();
	}
	if (window.location.pathname.indexOf('who-we-are') > 0 && window.location.pathname !== '/bcwm_dev/about/who-we-are/' && window.innerWidth >= 768) {
		$(window).on("load", function() {
			bioPositioning();
		})
	}
	if (window.location.pathname.indexOf('our-history') > 0 && window.innerWidth >= 768) {
		ourHistoryParallax();
	}


	$('.menu-button').on('click', function() {
		$('header nav').toggleClass('open');
	})
	$('.publication-category h2').on('click', function() {
		console.log($(this).next('div'));
		$(this).next('div').toggleClass('open');
		pubListHeight();
	});
	$('.publications-nav li').on('click', function() {
		var item = $(this).attr('id');
		$('.publications-nav li').removeClass('active');
		$(this).addClass('active');
		$('.publication-category').removeClass('open');
		$('#publication-category-'+item).addClass('open');
	});
	$(window).resize(function() {
		if (document.getElementById('slogan-2')) {
			positionSlogan2();
		}
		pubListHeight();
		if (location.pathname == '/bcwm_dev/' ) {
			homeParallax();
		}
		if (location.pathname == '/bcwm_dev/institutional-capital-management/' ) {
			icmParallax();
		}
		if (window.location.pathname.indexOf('what-we-do') > 0) {
			whatWeDoPositioning();
		}
		if (window.location.pathname == '/bcwm_dev/about/who-we-are/') {
			whoWeAreParallax();
		}
		if (window.location.pathname.indexOf('who-we-are') > 0 && window.location.pathname !== '/bcwm_dev/about/who-we-are/' && window.innerWidth >= 768) {
			$(window).on("load", function() {
				bioPositioning();
			})
		}
		if (window.location.pathname.indexOf('our-history') > 0 && window.innerWidth >= 768) {
			ourHistoryParallax();
		}
	})
	if (window.location.pathname.indexOf('personal-wealth-management') > 0) {
		ticker();
	}

	if (document.querySelector('#breadcrumbs span[rel="v:child"] a')) {
		console.log(document.querySelector('#breadcrumbs span[rel="v:child"] a'));
		document.querySelector('#breadcrumbs span[rel="v:child"] a').removeAttribute('href')
	}
	/* Correct Publication Category Open on Page Load */
	if (window.location.pathname.indexOf('publications-list') > 0) {
		console.log(window.innerWidth);
		if (window.innerWidth >= 7) {
			var hash = location.hash;
			var id = hash.slice(hash.indexOf('#') + 1, hash.indexOf('-'))
			console.log(id);
			var el = document.getElementById(id)
			console.log(el);
			$('.publications-nav li').removeClass('active');
			el.className = 'active';
			$('.publication-category').removeClass('open');
			$('#publication-category-'+id).addClass('open');
		}
	}
	if (window.innerWidth >= 768) {
		/* Homepage Team Image Parallax */
		if (location.pathname == '/bcwm_dev/') {
			var img = document.getElementById('team-image')
			var bodyHeight = document.querySelector('body').clientHeight;
			window.addEventListener('scroll', function() {
				var dist = window.pageYOffset / bodyHeight;
				if (window.pageYOffset <= img.offsetTop)  {
					img.style.top = -(window.pageYOffset / img.offsetTop * 50) + 'px';
				}
				else {
					img.style.top = -50 + 'px'
				}
			});
		}
	}


}); /* end of as page load scripts */
