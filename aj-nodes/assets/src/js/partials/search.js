jQuery( document ).ready( function() {
	let searchValue = '';
	let paged = 1;
	let timer;
	let TotalNoPages;
	let isAjaxRequest = false;
	jQuery( document ).on( 'keyup', '#ajax-search-value', function() {
		window.clearTimeout( timer );
		searchValue = jQuery( this ).val();
		timer = setTimeout( () => {
			if ( searchValue === jQuery( this ).val() && '' !== jQuery( this ).val() ) {
				console.log( searchValue );
				paged = 1;
				sendAjaxRequest();
			}
		}, 500 );
	} );
	function ajaxLoadMore() {
		jQuery( '#ajax-loadmore-click' ).on( 'click', function( e ) {
			e.preventDefault();

			paged++;
			TotalNoPages = this.getAttribute( 'href' );
			isAjaxRequest = true;
		 sendAjaxRequest();
		} );
	}
	ajaxLoadMore();
	function sendAjaxRequest() {
		jQuery( '.loader-container' ).show();
		jQuery.ajax( {
			url: localVars.ajax_url,
			type: 'POST',
			data: {
				action: 'search',
				nonce: localVars.nonce,
				searchValue,
				paged,

			},
			success( response ) {
				if ( response ) {
					jQuery( '.loader-container' ).hide();

					console.log( response.args );
					if ( isAjaxRequest ) {
						jQuery( '.ajax-search-container' ).append( response.html );
						isAjaxRequest = false;
						console.log( 'asdasd' );
					} else {
						jQuery( '.ajax-search-container' ).html( response.html );
						jQuery( '.ajax-search-pagination' ).html( response.pagination );
						paged = 1;
						ajaxLoadMore();
					}
					if ( paged >= TotalNoPages ) {
						jQuery( '#ajax-loadmore-click' ).hide();
					}
				}
				// ajaxLoadMore();
			},
			error() {
				const htmlTag = jQuery( "<div class='center-align'>An error occurred while processing your request.😢</div>" );
				jQuery( '.ajax-search-container' ).html( htmlTag );
				jQuery( '.loader-container' ).hide();
			},
		} );
	}
} );
