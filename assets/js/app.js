//Modified from:
//https://webdesign.tutsplus.com/tutorials/how-to-add-deep-linking-to-the-bootstrap-4-tabs-component--cms-31180
var url = location.href.replace( /\/$/, "" );
if ( location.hash && $( ".tab-content").length > 0 ) {
	var hash = url.split( "#" );
	$( 'a[href="#' + hash[1]+'"]' ).tab( "show" );
	url = location.href.replace( /\/#/, "#" );
	history.replaceState( null, null, url );
	setTimeout( function() {
		$(window).scrollTop(0);
	}, 400);
} else if ( location.hash ) {
	setTimeout( function() {
		$( location.hash )[0].scrollIntoView();
		window.scrollBy(0, -100); 
	}, 100);
}

$( 'a[data-toggle="tab"]' ).on("click", function() {
	var newUrl;
	var hash = $(this).attr( "href" );
	if( hash == "#home" ) {
		newUrl = url.split("#")[0];
	} else {
		newUrl = url.split("#")[0] + hash;
	}
	history.replaceState( null, null, newUrl );
});

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
	$response_target = $form;
	if( $form.find( ".modal-body" ).length > 0 ) {
		$response_target = $form.find( ".modal-body" );
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
				handleFormResponse( $response_target, response.error );
				return;
			}
			if( response.redirect ) {
				$btn.text( btn_text ).prop( "disabled", true );
				if( location.href.split(location.host)[1] == response.redirect ) {
					location.reload();
				} else {
					window.location.href = response.redirect;
					setTimeout(function() {
						location.reload(); //Be sure page reloads with # in response.redirect
					}, 500);
				}
			} else {
				handleFormResponse( $response_target, response.success, "success" );
			}
		},
		error: function() {
			handleFormResponse( $response_target, "An error has occured" );
			$btn.text( btn_text ).prop( "disabled", false );
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
			ids = $(this).attr( "data-selected-ids" );
			selected_ids = ( ids ? ids.split( "|" ) : [] );
			selected_ids.push( $(this).attr( "data-selected-id" ) );
			$item = $(this);
			$.each( languages, function( key, item ) {
				var is_selected = ( selected_ids.indexOf( item.id ) !== -1 ? "selected" : "" );
				$item.append( "<option value='" + item.id + "' " + is_selected + ">" + item.name + "</option>" );
			});
			$item.selectize();
		});
	});
}

$( ".selectize" ).selectize();

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

$( ".approve-paragraph" ).click( function(e) {
	$parent = $(this).parents( ".editor-item" );
	$btn = $(this);
	btn_text = $btn.text();
	$btn.text( "..." ).prop( "disabled", true );
	e.preventDefault();
	var data = {
		"project_id": $parent.attr( "data-project-id" ),
		"content_id": $parent.attr( "data-content-id" ),
	}
	$.post( "/editor/approve", data, function( response ) {
		if( response.error ) {
			handleFormResponse( $parent.find( ".response" ), response.error );
			return;
		}
		$btn.text( btn_text ).addClass( "hidden" );
		$parent.find( "textarea" ).prop( "disabled", true );
		$parent.find( ".textarea-wrapper" ).prepend( '<small class="status-locked"><i class="material-icons text-small align-middle">lock</i> approved by ' + response.reviewer_name + '</small>' );
		$parent.find( ".revision-request" ).remove();
	})
	.fail(function() {
		handleFormResponse( $parent.find( ".response" ), "An error has occured" );
		$btn.text( btn_text ).prop( "disabled", false );
	});
});

$( ".resolve-error" ).click( function(e) {
	$parent = $(this).parents( ".editor-item" );
	$alert = $(this).parents( ".alert" );
	$btn = $(this);
	btn_text = $btn.text();
	$btn.text( "..." ).prop( "disabled", true );
	e.preventDefault();
	var data = {
		"log_id": $alert.attr( "data-log-id" ),
	}
	$.post( "/editor/resolve", data, function( response ) {
		if( response.error ) {
			$btn.text( btn_text ).prop( "disabled", false );
			return;
		}
		$alert.slideUp();
	})
	.fail(function() {
		$btn.text( btn_text ).prop( "disabled", false );
	});
});

$( ".request-revision" ).click( function() {
	$parent = $(this).parents( ".editor-item" );
	$( "#suggest-revision-form" ).find( "input[name='project_id']" ).val( $parent.attr( "data-project-id" ) );
	$( "#suggest-revision-form" ).find( "input[name='content_id']" ).val( $parent.attr( "data-content-id" ) );
	$( "#suggest-revision-form" ).find( "textarea[name='comment']" ).val( "" );
	$( "#suggest-revision-form" ).modal( "show" );
});

$( ".user-search .search" ).keyup( function() {
	$widget = $(this).parents( ".user-search" );
	query = $(this).val().trim();
	if( query.length == 0 ) {
		return false;
	}
	$.getJSON( "/user/search/" + query, function( users ) {
		$widget.find( ".user-list" ).empty();
		$.each( users, function( key, user ) {
			html = '<div class="custom-control custom-checkbox"><span class="d-flex align-items-center"><img src="' + user.avatar + '" class="avatar mr-2" /><span class="h6 mb-0" data-filter-by="text">' + user.first_name + ' ' + user.last_name + '</span><div class="dropdown ml-auto"><button class="btn btn-primary btn-sm text-light dropdown-toggle" type="button" data-toggle="dropdown">Add</button><div class="dropdown-menu"><a class="dropdown-item select-member" data-id="' + user.id + '" data-type="translator">Translator</a><a class="dropdown-item select-member" data-id="' + user.id + '" data-type="reviewer">Reviewer</a></div></div></span></div>';
			$widget.find( ".user-list" ).append( html );
		});
	});
});

$( document ).on( "click", ".select-member", function() {
	$modal = $(this).parents( ".modal-body" );
	var data = {
		"type": $(this).data( "type" ),
		"user_id": $(this).data( "id" ),
		"project_id": $(this).parents( ".modal" ).data( "project-id" ),
	}
	$.post( "/projects/add_member", data, function( response ) {
		console.log(response);
		if( response.error ) {
			handleFormResponse( $modal, response.error );
			return;
		}
		location.reload();
	})
	.fail(function() {
		handleFormResponse( $modal, "An error has occured" );
	});
});

$( ".confirm-dialog" ).click( function() {
	$message = $(this).data( "confirm-message" );
	return confirm( $message );
});