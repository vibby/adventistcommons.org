<div class="row justify-content-center">
	<div class="col-xl-10 col-lg-11">
		<div class="page-header">
			<h1>Publications</h1>
		</div>
		<hr>
		<div class="content-list">
			<div class="content-list-body row">
				<?php foreach( $publications as $publication ) { ?>
					<div class="col-md-6">
						<div class="card card-project">
							<div class="row no-gutters">
								<div class="col" style="flex: 0 0 120px">
									<img src="/uploads/<?php echo $publication["cover_image"]; ?>" width="120" class="rounded-left">
								</div>
								<div class="col">
									<div class="card-body">
										<div class="card-title">
											<a href="/publications/<?php echo $publication["id"]; ?>">
												<h5 data-filter-by="text"><?php echo $publication["name"]; ?></h5>
											</a>
										</div>
										<div class="card-meta d-flex justify-content-between">
											<div class="">
												<span class="text-small">Author: <?php echo $publication["author"]; ?></span><br>
												<span class="text-small">Languages: <?php echo $publication["languages"]; ?></span><br>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<!--end of content list body-->
		</div>
	</div>
</div>