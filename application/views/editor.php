<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-11">
			<div class="page-header clearfix">
				<h1><?php echo $section["name"]; ?></h1>
			</div>
			<hr>
			<div class="content-list-body">
				<?php foreach( $content as $p ) { ?>
					<div class="card-list editor-item" id="p<?php echo $p["id"]; ?>" data-content-id="<?php echo $p["id"]; ?>" data-project-id="<?php echo $project["id"]; ?>">
						<div class="card-list-body row">
							<div class="col-md-6">
								<?php echo $p["content"]; ?><br><br>
							</div>
							<div class="col-md-6 textarea-wrapper">
								<div class="locked-status <?php if( $p["total_approvals"] == 0 ) { echo "hidden"; } ?>">
									<small class="status-locked"><i class="material-icons text-small align-middle">lock</i> locked for translators </small>
									<span class="float-right badge badge-secondary"><span class="approval_count"><?php echo $p["total_approvals"]; ?></span>/<?php echo $num_required_approvals; ?></span>
								</div>
								<?php foreach( $p["errors"] as $error ) { ?>
									<div class="alert alert-warning revision-request" data-log-id="<?php echo $error["id"]; ?>">
										<?php echo $error["comment"]; ?>
										<?php if( $can_review ) { ?><button class="btn btn-outline-secondary btn-sm float-right resolve-error">Resolve</button><?php } ?>
									</div>
								<?php } ?>
								<div class="form-group">
									<textarea class="form-control" <?php if( ! $can_commit || $p["total_approvals"] > 0 && ! $can_always_commit ){ echo "disabled"; } ?> rows="<?php echo $p["textarea_height"]; ?>"><?php echo $p["latest_revision"]; ?></textarea>
								</div>
								<nav class="clearfix">
									<div class="form-group float-left">
										<?php if( $can_always_commit || ( $can_commit && $p["total_approvals"] == 0 ) ) { ?>
											<button class="btn btn-outline-success btn-sm commit-paragraph">Commit</button>
										<?php } ?>
										<?php if( $can_review ) { ?>
											<div class="dropdown d-inline-block">		
												<button class="btn btn-outline-<?php echo $p["user_has_approved"] ? "success" : "secondary"; ?> btn-sm dropdown-toggle review-toggle" type="button" data-toggle="dropdown"><?php echo $p["user_has_approved"] ? "Approved" : "Review"; ?></button>
												<div class="dropdown-menu">
													<?php if( ! $p["is_approved"] && ! $p["user_has_approved"] ) { ?>
														<a class="dropdown-item approve-paragraph">Approve</a>
													<?php } ?>
													<a class="dropdown-item request-revision">Request Revision</a>
												</div>
											</div>
										<?php } ?>
										
									</div>
									<div class="form-group float-right">
										<button class="btn btn-outline-secondary btn-sm" data-toggle="collapse" data-target="#<?php echo sprintf( "p_%s_revisions", $p["id"] ); ?>"><?php echo $p["total_revisions"] == 1 ? "1 revision" : sprintf( "%s revisions", $p["total_revisions"] ); ?></button>
										<?php if( $can_auto_translate ) { ?>
											<button class="btn btn-sm btn-outline-primary auto-translate <?php echo strlen( $p["latest_revision"] ) == 0 ? "" : "hidden"; ?>">Auto Translate</button>
										<?php } ?>
									</div>
								</nav>
								<div id="<?php echo sprintf( "p_%s_revisions", $p["id"] ); ?>" class="collapse">
									<div class="accordion" id="<?php echo sprintf( "p_%s_revisions_accordian", $p["id"] ); ?>">
										<?php foreach( $p["revisions"] as $revision ) { ?>
											<div class="card mb-0">
												<div class="card-header p-2 revision-header">
													<img alt="Image" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $revision["email"] ) ) ) . "?s=60&d=mp"; ?>" class="avatar mr-1" />
													<?php echo $revision["first_name"] . " " . $revision["last_name"]; ?>
													<time class="text-small float-right" datetime="<?php echo $revision["created_at"]; ?>"><?php echo $revision["created_at_formatted"]; ?></time>
												</div>
												<div class="revision-content collapse">
													<div class="card-body text-small p-2">
														<?php echo $revision["diff"]; ?>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="response"></div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php if( $can_review ) { ?>
<form class="modal fade auto-submit" action="/editor/suggest_revision" id="suggest-revision-form" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Suggest Revision</h5>
				<button type="button" class="close btn btn-round" data-dismiss="modal">
					<i class="material-icons">close</i>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<textarea class="form-control col" name="comment" placeholder="What needs revising?"></textarea>
				</div>
				<input type="hidden" name="content_id">
				<input type="hidden" name="project_id">
			</div>
			<div class="modal-footer">
				<button role="button" class="btn btn-primary" type="submit">
					Submit
				</button>
			</div>
		</div>
	</div>
</form>
<?php } ?>