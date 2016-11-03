jQuery(document).ready(function($) {

	// nav menu
	$('[data-responsive-toggle]').click(function() {
		$('#' + $(this).attr('data-responsive-toggle')).toggle();
	});

	// projects/people filtering
	var select = $('[data-select]'),
		speed = 400;

	select.on('change', function() {

		var _this = this,
			value = this.value,
			selector = 'data-' + this.getAttribute('data-select'),
			target = $('[' + selector + ']');

		// clear others
		select.filter(function() { return this.getAttribute('data-select') != _this.getAttribute('data-select'); }).val('');

		if ( !value ) return target.show();

		target.filter(function() {

			var $this = $(this),
				test = $this.attr(selector);

			if (!test) $this.fadeOut(speed);

			if ( test === value || test.split('|').indexOf(value) > -1 ) {

				setTimeout(function() {
					$this.fadeIn(speed);
				}, speed);

			} else {

				$this.fadeOut(speed);
			}
		});

		setTimeout(peopleSameHeight, speed);
	});

	// people same height
	function peopleSameHeight() {
		$('[data-people-container]').each(function() {
			var height = 0;
			$(this).find('.person').height('auto').each(function() {
				var $this = $(this);
				if ($this.is(':visible') && $this.height() > height) {
					height = $this.height();
				}
			}).height(height);
		});
	}
	peopleSameHeight();
	$(document).ready(peopleSameHeight);
	$(window).on('load resize', peopleSameHeight);
});