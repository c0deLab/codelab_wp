jQuery(document).ready(function($) {

	// nav menu
	$('[data-responsive-toggle]').click(function() {
		console.log($('#' + $(this).attr('data-responsive-toggle')));
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
});