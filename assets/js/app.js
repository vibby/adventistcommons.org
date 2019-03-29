$( "time" ).timeago();

function handleFormResponse( $form, message, type = "danger" ) {
	$form.append( '<div class="alert alert-' + type + ' mt-2 form-response">' + message + '</div>' );
	setTimeout(function() {
		$( $form.find( ".form-response" ) ).slideUp();
	}, 6000);
}

$( "form.auto-submit" ).submit( function(e) {
	$form = $(this);
	$btn = $form.find( "button[type='submit']" );
	if( $form.find( ".modal-body" ).length > 0 ) {
		$form = $form.find( ".modal-body" );
	}
	btn_text = $btn.text();
	$btn.text( "..." ).prop( "disabled", true );
	e.preventDefault();
	action = $(this).attr( "action" );
	
	$.ajax({
		url: action, 
		type: "POST",             
		data: new FormData( $form[0] ),
		contentType: false,
		cache: false,
		processData: false,
		success: function( response ) {
			$btn.text( btn_text ).prop( "disabled", false );
			if( response.error ) {
				handleFormResponse( $form, response.error );
				return;
			}
			if( response.redirect ) {
				window.location.href = response.redirect;
			} else {
				handleFormResponse( $form, response.success, "success" );
			}
		},
		error: function() {
			handleFormResponse( $form, "An error has occured" );
			$btn.text( btn_text ).prop( "disabled", false );
		}
	});
});

$( "#add-product-form" ).submit( function(e) {
	$form = $(this);
	$modal = $form.find( ".modal-body" );
	$btn = $form.find( "button[type='submit']" );
	btn_text = $btn.text();
	$btn.text( "..." ).prop( "disabled", true );
	e.preventDefault();
	$.ajax({
		url: $form.attr( "action" ), 
		type: "POST",             
		data: new FormData( $form[0] ),
		contentType: false,
		cache: false,
		processData: false,
		success: function( response ) {
			$btn.text( btn_text ).prop( "disabled", false );
			if( response.error ) {
				handleFormResponse( $modal, response.error );
				return;
			}
			window.location.href = response.redirect;
		},
		error: function() {
			$btn.text( btn_text ).prop( "disabled", false );
			handleFormResponse( $modal, "An error has occured" );
		}
	});
});

$( ".custom-file input" ).change( function (e) {
	var files = [];
	for ( var i = 0; i < $(this)[0].files.length; i++ ) {
		files.push( $(this)[0].files[i].name );
	}
	$(this).next( ".custom-file-label" ).html(files.join( ", " ) );
});

if( $( ".language-select" ).length > 0 ) {
	$.getJSON( "/projects/get_languages", function( languages ) {
		$( ".language-select" ).each( function( index ) {
			$item = $(this);
			$.each( languages, function( key, item ) {
				$item.append( "<option value='" + item.id + "'>" + item.name + "</option>" );
			});
			$item.selectize();
		});
	});
}

$( ".commit-paragraph" ).click( function(e) {
	$parent = $(this).parents( ".editor-item" );
	$btn = $(this);
	btn_text = $btn.text();
	$btn.text( "..." ).prop( "disabled", true );
	e.preventDefault();
	var data = {
		"content": $parent.find( "textarea" ).val(),
		"project_id": $parent.attr( "data-project-id" ),
		"content_id": $parent.attr( "data-content-id" ),
	}
	$.post( "/editor/commit", data, function( response ) {
		$btn.text( btn_text ).prop( "disabled", false );
		if( response.error ) {
			handleFormResponse( $parent.find( ".response" ), response.error );
			return;
		}
		handleFormResponse( $parent.find( ".response" ), response.success, "success" );
	})
	.fail(function() {
		handleFormResponse( $parent.find( ".response" ), "An error has occured" );
		$btn.text( btn_text ).prop( "disabled", false );
	});
});

$( ".revision-header" ).click( function() {
	$(this).next().slideToggle();
});