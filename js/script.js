jQuery(document).ready(function($) {

	// nav menu
	$('[data-responsive-toggle]').click(function() {
		$('#' + $(this).attr('data-responsive-toggle')).toggle();
	});

	// projects filtering
	var select = $('#people-select'),
		people = $('[data-people]'),
		speed = 400;

	select.on('change', function() {

		var value = this.value;

		if ( !value ) {

			people.show();

		} else {

			people.filter(function() {

				var $this = $(this);

				if ( $this.attr('data-people') === value ) {

					setTimeout(function() {
						$this.fadeIn(speed);
					}, speed);

				} else {

					$this.fadeOut(speed);
				}
			});
		}
	});

	// people same height
	function peopleSameHeight() {
		$('[data-people-container]').each(function() {
			var height = 0;
			$(this).find('.person').height('auto').each(function() {
				if ($(this).height() > height) {
					height = $(this).height();
				}
			}).height(height);
		});
	}
	$(window).on('load resize', peopleSameHeight);
});