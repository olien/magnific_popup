$(document).ready(function() {
	// localization
	var curLang = $('html').attr('lang');

	if (typeof(curLang) === 'undefined' || curLang === '') {
		curLang = 'de';
	}

	switch (curLang) {
		case 'de':
			$.extend(true, $.magnificPopup.defaults, {
				tClose: 'Schließen',
				tLoading: 'Wird geladen...',
				gallery: {
					tPrev: 'Zurück',
					tNext: 'Weiter',
					tCounter: '%curr% von %total%'
				},
				image: {
					tError: 'Das <a href="%url%">Bild</a> konnte nicht geladen werden.'
				},
				ajax: {
					tError: 'Der <a href="%url%">Inhalt</a> konnte nicht geladen werden.'
				}
			});

			break;
		default:
			// english already included
	}

	// single image
	$('a.magnific-popup-image').magnificPopup({
		type: 'image',
		fixedContentPos: false,
		removalDelay: 300,
		mainClass: 'mfp-with-fade',
		closeOnContentClick: true,
		image: {
			cursor: ''
		}
	});

	// gallery images
	$('div.magnific-popup-gallery').each(function() {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			fixedContentPos: false,
			removalDelay: 300,
			mainClass: 'mfp-with-fade',
			image: {
				cursor: ''
			},
			gallery: {
				enabled: true
			}
		});
	});
});

