<div class="row justify-content-center">
	<div class="col-xl-10 col-lg-11">
		<div class="page-header clearfix">
			<h1><?php echo $section["name"]; ?></h1>
		</div>
		<hr>
		<div class="content-list-body">
			<?php foreach( $content as $p ) { ?>
				<div class="card-list">
					<div class="card-list-body row">
						<div class="col-md-6">
							<?php echo $p["content"]; ?>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" rows="8"><?php echo $p["revisions"][0]["content"] ?? ""; ?></textarea>
							</div>
							<nav class="clearfix">
								<div class="form-group float-left">
									<button class="btn btn-outline-success btn-sm">Commit</button>
								</div>
								<div class="form-group float-right">
									<button class="btn btn-outline-danger btn-sm" data-toggle="collapse" data-target="#<?php echo sprintf( "p_%s_issues", $p["id"] ); ?>">2 issues</button>
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
											<div class="card-header p-2">
												<img alt="Image" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $revision["email"] ) ) ) . "?s=60"; ?>" class="avatar mr-1" />
												<?php echo $revision["created_at"]; ?>
											</div>
											<div id="<?php echo sprintf( "revision_%s", $revision["id"] ); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#<?php echo sprintf( "p_%s_revisions_accordian", $p["id"] ); ?>">
												<div class="card-body text-small p-2">
													<?php echo $revision["content"]; ?>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>