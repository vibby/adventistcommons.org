function handleFormResponse( $form, message, type = "danger" ) {
	$form.append( '<div class="alert alert-' + type + ' mt-2 form-response">' + message + '</div>' );
	setTimeout(function() {
		$( $form.find( ".form-response" ) ).slideUp();
	}, 6000);
}

$( "form.auto-submit" ).submit( function(e) {
	$form = $(this);
	e.preventDefault();
	action = $(this).attr( "action" );
	var $ajax = $.post( action, $( this ).serialize(), function( response ) {
		if( response.error ) {
			handleFormResponse( $form, response.error );
			return;
		}
		handleFormResponse( $form, response.success, "success" );
	})
	.fail(function() {
		handleFormResponse( $form, "An error has occured" );
	});
});