<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-11">
			<div class="page-header clearfix">
				<h1><?php echo $section["name"]; ?></h1>
			</div>
			<hr>
			<div class="content-list-body">
				<?php foreach( $content as $p ) { ?>
					<div class="card-list editor-item" data-content-id="<?php echo $p["id"]; ?>" data-project-id="<?php echo $project["id"]; ?>">
						<div class="card-list-body row">
							<div class="col-md-6">
								<?php echo $p["content"]; ?><br><br>
							</div>
							<div class="col-md-6 textarea-wrapper">
								<div class="form-group">
									<textarea class="form-control" rows="<?php echo $p["textarea_height"]; ?>"><?php echo $p["revisions"][0]["content"] ?? ""; ?></textarea>
								</div>
								<nav class="clearfix">
									<div class="form-group float-left">
										<button class="btn btn-outline-success btn-sm commit-paragraph">Commit</button>
									</div>
									<div class="form-group float-right">
										<!--<button class="btn btn-outline-danger btn-sm" data-toggle="collapse" data-target="#<?php echo sprintf( "p_%s_issues", $p["id"] ); ?>">2 issues</button>-->
										<button class="btn btn-outline-secondary btn-sm" data-toggle="collapse" data-target="#<?php echo sprintf( "p_%s_revisions", $p["id"] ); ?>"><?php echo $p["total_revisions"] == 1 ? "1 revision" : sprintf( "%s revisions", $p["total_revisions"] ); ?></button>
										<div class="dropdown float-right ml-1">
											<button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
												<i class="material-icons align-top text-small">settings</i>
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#">Auto Translate</a>
											</div>
										</div>
									</div>
								</nav>
								<div id="<?php echo sprintf( "p_%s_issues", $p["id"] ); ?>" class="collapse">
									<div class="alert alert-danger">There is an issue you need to fix</div>
								</div>
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