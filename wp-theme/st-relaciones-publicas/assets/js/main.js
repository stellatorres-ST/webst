(function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		initMobileMenu();
		initCurrencySwitcher();
		initDashboardFilters();
	} );

	function initDashboardFilters() {
		var wrap = document.querySelector( '[data-dash-filtros]' );
		var grid = document.querySelector( '[data-dash-cursos]' );
		if ( ! wrap || ! grid ) {
			return;
		}

		wrap.addEventListener( 'click', function ( e ) {
			var btn = e.target.closest( 'button[data-filter]' );
			if ( ! btn ) {
				return;
			}
			wrap.querySelectorAll( 'button' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
			btn.classList.add( 'active' );

			var filter = btn.getAttribute( 'data-filter' );
			grid.querySelectorAll( '[data-status]' ).forEach( function ( card ) {
				var show = 'todos' === filter || card.getAttribute( 'data-status' ) === filter;
				card.style.display = show ? '' : 'none';
			} );
		} );
	}

	function initMobileMenu() {
		var toggle = document.querySelector( '.menu-toggle' );
		var nav = document.querySelector( '.mobile-nav' );
		if ( ! toggle || ! nav ) {
			return;
		}
		toggle.addEventListener( 'click', function () {
			nav.classList.toggle( 'is-open' );
			var expanded = nav.classList.contains( 'is-open' );
			toggle.setAttribute( 'aria-expanded', expanded ? 'true' : 'false' );
		} );
	}

	function initCurrencySwitcher() {
		var switchers = document.querySelectorAll( '.currency-switcher' );
		if ( ! switchers.length || typeof strrppData === 'undefined' ) {
			return;
		}

		switchers.forEach( function ( switcher ) {
			var nonce = switcher.getAttribute( 'data-nonce' );

			switcher.addEventListener( 'click', function ( e ) {
				var btn = e.target.closest( 'button[data-currency]' );
				if ( ! btn ) {
					return;
				}
				var currency = btn.getAttribute( 'data-currency' );
				setCurrency( currency, nonce );
			} );
		} );
	}

	function setCurrency( currency, nonce ) {
		var formData = new FormData();
		formData.append( 'action', 'strrpp_set_currency' );
		formData.append( 'currency', currency );
		formData.append( 'nonce', nonce );

		fetch( ( window.ajaxurl || '/wp-admin/admin-ajax.php' ), {
			method: 'POST',
			credentials: 'same-origin',
			body: formData,
		} )
			.then( function ( res ) { return res.json(); } )
			.then( function ( res ) {
				if ( res && res.success ) {
					window.location.reload();
				}
			} );
	}
})();
