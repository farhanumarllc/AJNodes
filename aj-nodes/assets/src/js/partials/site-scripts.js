/**
 * Sticky Header
 * Adds a class to header on scroll
 */
import magnificPopup from '../vendors/jquery-magnificpopup';
import organicTabs from '../vendors/organic-tab';
import '../vendors/slick.min';
import '../vendors/gsap.min';
import '../vendors/ScrollTrigger.min';
jQuery( document ).on( 'scroll', function() {
	if ( jQuery( document ).scrollTop() > 0 ) {
		jQuery( 'header, body' ).addClass( 'shrink' );
	} else {
		jQuery( 'header, body' ).removeClass( 'shrink' );
	}
} );

jQuery( function() {
	jQuery( '.single-benefit' ).hover(
		function() {
			const dataId = jQuery( this ).attr( 'id' );
			jQuery( '.benefit-image' ).removeClass( 'active-project' );
			jQuery( '.benefit-image[data-id="' + dataId + '"]' ).addClass( 'active-project' );

			jQuery( '.single-benefit' ).not( this ).find( '.single-benefit-head' ).removeClass( 'active' ).siblings( '.benefit-content' ).slideUp();
			jQuery( this ).find( '.single-benefit-head' ).toggleClass( 'active' ).siblings( '.benefit-content' ).slideToggle( 300 );

			jQuery( this ).addClass( 'active-benefit' );
		},
		function() {
			const dataId = jQuery( this ).attr( 'id' );
			if ( ! jQuery( '.single-benefit.active-benefit' ).length ) {
				jQuery( '.benefit-image[data-id="' + dataId + '"]' ).removeClass( 'active-project' );
			}

			if ( jQuery( this ).find( '.single-benefit-head' ).hasClass( 'active' ) ) {
				jQuery( this ).find( '.single-benefit-head' ).removeClass( 'active' ).siblings( '.benefit-content' ).slideUp( 300 );
			}

			jQuery( this ).removeClass( 'active-benefit' );
		}
	);

	jQuery( '#staff-tabs' ).organicTabs( {
		speed: 200,
	} );

	jQuery( '.choices-parent-list' ).hover( function() {
		const dataId = jQuery( this ).attr( 'id' );
		jQuery( '.choices-sub-list' ).removeClass( 'active-list' );
		jQuery( '.choices-parent-list' ).removeClass( 'active-parent' );
		jQuery( '.choices-list-item' ).removeClass( 'active-item' );

		jQuery( '.choices-sub-list[data-id="' + dataId + '"]' ).addClass( 'active-list' );
		jQuery( this ).addClass( 'active-parent' );
		jQuery( this ).find( '.choices-list-item' ).addClass( 'active-item' );
	}, function() {
		jQuery( '.choices-sub-list' ).removeClass( 'active-list' );
		jQuery( this ).removeClass( 'active-parent' );
		jQuery( this ).find( '.choices-list-item' ).removeClass( 'active-item' );
	} );

	if ( jQuery( window ).width() > 747 ) {
		jQuery( '.text-columns, .hero-home' ).each( function() {
			jQuery( this ).closest( 'section' ).addClass( 'overflow-x-hidden' );
		} );
	}

	/**
	 * menu-btn
	 */

	if ( jQuery( '.menu-toggle' ).length > 0 ) {
		const menuBtn = document.querySelector( '.menu-toggle' );
		const navContainer = document.querySelector( '.nav-overlay' );
		const navLinks = document.querySelectorAll(
			'.header-nav ul li, .headerBtn'
		);
		const menuBtnInner = document.querySelector( '.menu-btn' );

		menuBtn.addEventListener( 'click', () => {
			navContainer.classList.toggle( 'nav-open' );
			menuBtn.classList.toggle( 'menu-open' );
			menuBtnInner.classList.toggle( 'active' );
			navLinks.forEach( ( link ) => {
				link.classList.toggle( 'nav-link-open' );
			} );
		} );
	}
	jQuery.noConflict();

	gsap.registerPlugin( ScrollTrigger );

	if ( jQuery( '.hero-home-image' ).length > 0 ) {
		gsap.to( '.hero-home-image', {
			scale: 1.6,
			y: '-50%',
			scrollTrigger: {
				trigger: '.hero-home-image',
				start: 'top 60%',
				end: 'bottom top',
				scrub: 1,
			},
		} );
	}

	jQuery.noConflict();

	if ( jQuery( '.recent-posts-slider' ).length > 0 ) {
		const swiper = new Swiper( '.recent-posts-slider', {
			slidesPerView: 3,
			spaceBetween: 30,
			freeMode: true,
		} );
	}

	jQuery.noConflict();

	if ( jQuery( '.workSlider' ).length > 0 ) {
	 new Swiper( '.workSlider', {
			slidesPerView: 'auto',
			spaceBetween: 40,
			mousewheel: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
		} );

		function setEqualDimensions() {
			let maxHeight = 0;
			let maxWidth = 0;

			// Reset height and width
			jQuery( '.work-slide' ).css( {
				height: 'auto',
				width: 'auto',
			} );

			// Calculate max height and width
			jQuery( '.work-slide' ).each( function() {
				const height = jQuery( this ).outerHeight(); // Use outerHeight to include padding and border
				const width = jQuery( this ).outerWidth(); // Use outerWidth to include padding and border

				if ( height > maxHeight ) {
					maxHeight = height;
				}
				if ( width > maxWidth ) {
					maxWidth = width;
				}
			} );

			// Apply max height and width
			jQuery( '.work-slide' ).css( {
				height: maxHeight,
				width: maxWidth,
			} );
		}
		jQuery( window ).resize( function() {
			setEqualDimensions();
		} );
		setEqualDimensions();
	}

	jQuery.noConflict();

	if ( jQuery( '.featured-content-head' ).length > 0 ) {
		gsap.to( '.featured-content-head ', {
			scrollTrigger: {
				trigger: '.featured-content',
				start: 'top 80%',
				end: 'bottom top',
				scrub: true,
			},
			'--rotate': '360deg',
			duration: 1,
		} );
	}

	jQuery.noConflict();

	if ( jQuery( '.with-icon' ).length > 0 ) {
		gsap.to( '.with-icon .heading-2', {
			scrollTrigger: {
				trigger: '.scrolling-head',
				start: 'top 80%',
				end: 'bottom top',
				scrub: true,
			},
			'--rotate': '360deg',
			duration: 1,
		} );
	}

	jQuery.noConflict();

	/**
	 * Add span tag to multi-level accordion menu for mobile menus
	 */

	jQuery( 'li' ).each( function() {
		if ( jQuery( this ).hasClass( 'menu-item-has-children' ) ) {
			jQuery( this )
				.find( 'a:first' )
				.after( '<span class="submenu-icon"></span>' );
		}
	} );

	/**
	 * Slide Up/Down internal sub-menu when mobile menu arrow clicked
	 */

	jQuery( document ).on( 'click', '.header-nav .menu-item span', function() {
		const link = jQuery( this ).parents( 'li' );

		link.siblings( '.active' ).removeClass( 'active' ).find( 'ul' ).slideUp();

		if ( link.hasClass( 'active' ) ) {
			link.removeClass( 'active' );
			link.parents( 'ul' ).removeClass( 'disabled-menu' );
			link.find( 'ul' ).slideUp();
		} else {
			link.addClass( 'active' );
			link.parents( 'ul' ).addClass( 'disabled-menu' );
			link.find( 'ul' ).slideDown();
		}
	} );

	jQuery.noConflict();

	if ( jQuery( '.single-faq-head' ).length > 0 ) {
		jQuery( '.single-faq-head' ).on( 'click', function() {
			if ( jQuery( this ).hasClass( 'active' ) ) {
				jQuery( this ).removeClass( 'active' );
				jQuery( this ).siblings( '.faq-content' ).slideUp( 300 );
			} else {
				jQuery( '.single-faq-head' ).removeClass( 'active' );
				jQuery( this ).addClass( 'active' );
				jQuery( '.faq-content' ).slideUp();
				jQuery( this ).siblings( '.faq-content' ).slideDown( 300 );
			}
		} );
	}

	jQuery.noConflict();

	function splitLinesWithTag( container, opentag, closingtag, tag = 'span' ) {
		const spans = container.getElementsByTagName( 'span' );
		const spanText = Array.from( spans ).map( ( span ) => span.textContent ).filter( Boolean );

		const element = container.children;
		let top = 0;
		let tmp = '';

		container.innerHTML = container.innerHTML.replace( /\S+/g, '<n>$&</n>' );

		for ( let i = 0; i < element.length; i++ ) {
			const currentElement = element[ i ];
			if ( currentElement.tagName.toLowerCase() === 'br' ) {
				tmp += '<br>';
			} else {
				const rect = currentElement.getBoundingClientRect().top;
				if ( top < rect ) {
					tmp += closingtag + opentag;
				}
				top = rect;
				tmp += currentElement.textContent + ' ';
			}
		}

		let append = tmp += closingtag;

		for ( const rep of spanText ) {
			append = append.replace( rep, `<${ tag }>${ rep }</${ tag }>` );
		}

		// Wrap each letter inside the .no-overflow spans
		container.innerHTML = append.replace( /<span class="no-overflow">([^<]+)<\/span>/g, function( match, p1 ) {
			return '<span class="no-overflow">' + p1.split( '' ).map( ( char ) => `<${ tag }>${ char }</${ tag }>` ).join( '' ) + '</span>';
		} );
	}

	const h1Container = document.querySelectorAll( 'h1 split, h2 split, h3 split, h4 split, .expand_txt' )[ 0 ];
	splitLinesWithTag( h1Container, '<span class="no-overflow">', '</span>' );

	jQuery.noConflict();

	jQuery( '.ajn-button.arrow-btn' ).on( 'mousemove', function( e ) {
		const $button = jQuery( this );

		// Calculate the cursor's position relative to the button
		const offset = $button.offset();
		const buttonWidth = $button.outerWidth();
		const buttonHeight = $button.outerHeight();
		const relativeX = e.pageX - offset.left;
		const relativeY = e.pageY - offset.top;

		// Calculate the translation values based on cursor position
		const translateX = ( relativeX - buttonWidth / 2 ) / 2; // Increased movement range
		const translateY = ( relativeY - buttonHeight / 2 ) / 2; // Increased movement range

		// Apply the translation to the button using translate3d for smoother performance
		$button.css( 'transform', 'translate3d(' + translateX + 'px, ' + translateY + 'px, 0)' );
	} );

	// Reset the button position when the cursor leaves the button
	jQuery( '.ajn-button.arrow-btn' ).on( 'mouseleave', function() {
		jQuery( this ).css( 'transform', 'translate3d(0, 0, 0)' );
	} );

	jQuery.noConflict();

	( function( jQuery ) {
		jQuery.fn.resizeText = function() {
			const el = this;
			if ( el.length > 1 ) {
				return el.each( function() {
					jQuery( this ).resizeText();
				} );
			}

			const wrapLetters = function() {
				el.each( function() {
					const text = jQuery( this ).text();
					const letters = text.split( '' );
					const spans = letters.map( ( letter ) => `<span>${ letter }</span>` ).join( '' );
					jQuery( this ).html( spans );
				} );
			};

			const resizeText = function() {
				let fontsize = parseInt( el.css( 'font-size' ) );
				let width = el.width();
				const parentWidth = el.parent().width();

				if ( width < parentWidth ) {
					while ( width < parentWidth ) {
						el.css( 'font-size', ++fontsize );
						width = el.width();
					}
					el.css( 'font-size', --fontsize );
				} else {
					while ( width > parentWidth ) {
						el.css( 'font-size', --fontsize );
						width = el.width();
					}
				}
			};

			const revealText = function( entries, observer ) {
				entries.forEach( ( entry ) => {
					if ( entry.isIntersecting ) {
						el.find( 'span' ).each( function( index ) {
							jQuery( this ).css( 'transition-delay', `${ index * 0.3 }s` );
							jQuery( this ).addClass( 'visible' );
						} );
						observer.unobserve( entry.target ); // Stop observing once revealed
					}
				} );
			};

			wrapLetters();
			resizeText();

			const observer = new IntersectionObserver( revealText, {
				threshold: 1, // Trigger when at least 10% of the element is in view
			} );

			observer.observe( el[ 0 ] );

			jQuery( window ).on( 'resize', resizeText );
		};

		jQuery( document ).ready( function() {
			jQuery( '.expand_txt' ).resizeText();
		} );
	}( jQuery ) );

	jQuery.noConflict();

	( function( $ ) {
		$.fn.revealOnScroll = function() {
			const cards = this.find( '.project-card' );

			function isInViewport( element ) {
				const elementTop = $( element ).offset().top;
				const elementBottom = elementTop + $( element ).outerHeight();
				const viewportTop = $( window ).scrollTop();
				const viewportBottom = viewportTop + $( window ).height();
				return elementBottom > viewportTop && elementTop < viewportBottom;
			}

			const revealCards = function() {
				cards.each( function( index ) {
					if ( isInViewport( this ) ) {
						$( this ).addClass( 'visible' );
					}
				} );
			};

			// Set transition delays for each card
			cards.each( function( index ) {
				$( this ).css( 'transition-delay', `${ index * 0.05 }s` );
			} );

			// Trigger reveal on scroll and on page load
			$( window ).on( 'scroll resize', revealCards );
			revealCards();
		};

		$( document ).ready( function() {
			$( '.project-cards' ).revealOnScroll();
		} );
	}( jQuery ) );

	jQuery.noConflict();

	// Function to check if an element is in the viewport
	function isInViewport( element ) {
		const elementTop = jQuery( element ).offset().top;
		const elementBottom = elementTop + jQuery( element ).outerHeight();
		const viewportTop = jQuery( window ).scrollTop();
		const viewportBottom = viewportTop + jQuery( window ).height();
		return elementBottom > viewportTop && elementTop < viewportBottom;
	}

	// Function to handle the class addition when in the viewport
	function checkVisibility() {
		jQuery( '.why-us-row, .midpage-cta' ).each( function() {
			if ( isInViewport( this ) ) {
				jQuery( this ).find( '.why-us-image, .mpcta-image' ).addClass( 'show-image' );
			}
		} );
	}

	// Initial check on page load
	checkVisibility();

	// Check on scroll and resize events
	jQuery( window ).on( 'scroll resize', function() {
		checkVisibility();
	} );

	jQuery.noConflict();

	jQuery( '.seo-slider-1' ).slick( {
		asNavFor: '.seo-slider-2, .seo-slider-3, .seo-slider-4',
		autoplay: true,
 		arrows: false,
	} );
	jQuery( '.seo-slider-2' ).slick( {
		asNavFor: '.seo-slider-1, .seo-slider-3, .seo-slider-4',
		autoplay: true,
 		arrows: false,
		focusOnSelect: true, slidesToShow: 1,
	} );
	jQuery( '.seo-slider-3' ).slick( {
		asNavFor: '.seo-slider-1, .seo-slider-2, .seo-slider-4',
		autoplay: true,
 		arrows: false,
		focusOnSelect: true, slidesToShow: 1,
	} );
	jQuery( '.seo-slider-4' ).slick( {
		asNavFor: '.seo-slider-1, .seo-slider-2, .seo-slider-3',
		autoplay: true,
 		arrows: false,
	} );

	jQuery.noConflict();

	jQuery( '.text-slider' ).slick( {
		autoplay: true,
 		arrows: false,
		dots: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
	} );

	jQuery.noConflict();
} );

jQuery( document ).ready( function() {
	if ( jQuery( window ).width() > 747 ) {
		const $floatingItems = jQuery( '.floating-item' );
		const repulsionDistance = 300; // Distance at which items start to move away
		const moveDistance = 30; // How far items will move away from the cursor
		const transitionDuration = 0.3; // Duration for smooth transitions in seconds

		function updatePositions( mouseX, mouseY ) {
			$floatingItems.each( function() {
				const $item = jQuery( this );
				const offset = $item.offset();
				const itemX = offset.left + $item.width() / 2;
				const itemY = offset.top + $item.height() / 2;

				// Calculate distance between the cursor and the center of the item
				const dx = mouseX - itemX;
				const dy = mouseY - itemY;
				const distance = Math.sqrt( dx * dx + dy * dy );

				// Get the current rotation from the item's transform property
				const transform = $item.css( 'transform' );
				const matrix = transform === 'none' ? [ 1, 0, 0, 1, 0, 0 ] : transform.match( /matrix\(([^)]+)\)/ )[ 1 ].split( ',' ).map( parseFloat );
				const currentRotation = Math.atan2( matrix[ 1 ], matrix[ 0 ] ) * ( 180 / Math.PI ); // Convert radian to degree

				if ( distance < repulsionDistance ) {
				// Calculate repulsion vector
					const repulsionX = ( dx / distance ) * moveDistance;
					const repulsionY = ( dy / distance ) * moveDistance;

					// Apply repulsion to item's position
					const newLeft = repulsionX;
					const newTop = repulsionY;

					// Apply both translation and rotation with easing
					$item.css( {
						transition: `transform ${ transitionDuration }s ease-out`,
						transform: `translate(${ newLeft }px, ${ newTop }px) rotate(${ currentRotation }deg)`,
					} );
				} else {
				// Reset position if cursor is far away
					$item.css( {
						transition: `transform ${ transitionDuration }s ease-out`,
						transform: `rotate(${ currentRotation }deg)`,
					} );
				}
			} );
		}

		let mouseX = 0,
			mouseY = 0;

		jQuery( document ).mousemove( function( event ) {
			mouseX = event.pageX;
			mouseY = event.pageY;
		} );

		function animate() {
			updatePositions( mouseX, mouseY );
			requestAnimationFrame( animate );
		}

		animate();
	}
} );

jQuery( document ).ready( function() {
	function isElementInViewport( el ) {
		const rect = el.getBoundingClientRect();
		return (
			rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= ( window.innerHeight || document.documentElement.clientHeight ) &&
                    rect.right <= ( window.innerWidth || document.documentElement.clientWidth )
		);
	}

	function animateTeamMembers() {
		const memberCount = jQuery( '.team-member' ).length;
		const radius = Math.min( jQuery( '.team-container' ).width(), jQuery( '.team-container' ).height() ) / 2 - 100;
		const minRadius = 150; // Minimum distance from center
		const maxRadius = radius;
		const angles = [];

		// Generate random angles ensuring they are evenly spread
		for ( let i = 0; i < memberCount; i++ ) {
			angles.push( Math.random() * 2 * Math.PI );
		}
		angles.sort( ( a, b ) => a - b ); // Sort angles to evenly distribute

		jQuery( '.team-member' ).each( function( index ) {
			const angle = angles[ index ];
			const distance = Math.random() * ( maxRadius - minRadius ) + minRadius;
			const x = distance * Math.cos( angle );
			const y = distance * Math.sin( angle );

			jQuery( this ).css( {
				transform: `translate(${ x }px, ${ y }px) scale(1)`,
			} );
		} );
	}

	function checkAnimation() {
		const teamSection = jQuery( '.team-section' )[ 0 ];
		if ( isElementInViewport( teamSection ) ) {
			animateTeamMembers();
			jQuery( window ).off( 'scroll', checkAnimation );
		}
	}

	jQuery( window ).on( 'scroll', checkAnimation );
	checkAnimation(); // Initial check in case the section is already in the viewport
} );

jQuery( document ).ready( function() {
	function isInViewport( element ) {
		const elementTop = element.offset().top;
		const elementBottom = elementTop + element.outerHeight();
		const viewportTop = jQuery( window ).scrollTop();
		const viewportBottom = viewportTop + jQuery( window ).height();
		return elementBottom > viewportTop && elementTop < viewportBottom;
	}

	function animateTeamMembers() {
		jQuery( '.team-member' ).each( function( index ) {
			jQuery( this ).css( {
				transform: 'scale(1)',
				opacity: '1',
				transition: `transform 0.5s ease-in-out ${ index * 0.1 }s, opacity 0.5s ease-in-out ${ index * 0.1 }s`,
			} );
		} );
	}

	function initAnimations() {
		jQuery( '.team-member' ).css( {
			transform: 'scale(0)',
			opacity: '0',
			transition: 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out',
		} );

		if ( isInViewport( jQuery( '.team-section' ) ) ) {
			animateTeamMembers();
		}
	}

	jQuery( window ).on( 'scroll', function() {
		if ( isInViewport( jQuery( '.team-section' ) ) ) {
			animateTeamMembers();
		}
	} );

	if ( isInViewport( jQuery( '.team-section' ) ) ) {
		animateTeamMembers();
	}

	function swapTwoTeamMembers() {
		const members = jQuery( '.team-member' );
		const totalMembers = members.length;
		const randomIndex1 = Math.floor( Math.random() * totalMembers );
		let randomIndex2 = Math.floor( Math.random() * totalMembers );

		while ( randomIndex1 === randomIndex2 ) {
			randomIndex2 = Math.floor( Math.random() * totalMembers );
		}

		const member1 = members.eq( randomIndex1 );
		const member2 = members.eq( randomIndex2 );

		// Fade out both members before swapping
		member1.add( member2 ).css( {
			transform: 'scale(0)',
			opacity: '0',
			transition: 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out',
		} );

		setTimeout( function() {
			// Swap members
			const member1Clone = member1.clone( true );
			member1.replaceWith( member2.clone( true ) );
			member2.replaceWith( member1Clone );

			// Ensure both members are hidden initially
			jQuery( '.team-member' ).css( {
				transform: 'scale(0)',
				opacity: '0',
			} );

			setTimeout( function() {
				// Fade in swapped members
				jQuery( '.team-member' ).css( {
					transform: 'scale(1)',
					opacity: '1',
					transition: 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out',
				} );
			}, 50 ); // Short delay to apply the reset
		}, 500 ); // Time for the fade-out transition

		setTimeout( swapTwoTeamMembers, 5000 ); // Schedule the next swap
	}

	setTimeout( swapTwoTeamMembers, 5000 ); // Initial delay before starting

	initAnimations(); // Initialize animations on page load
} );

