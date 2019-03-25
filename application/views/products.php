<div class="row justify-content-center">
	<div class="col-xl-10 col-lg-11">
		<div class="page-header">
			<h1>Catalog</h1>
		</div>
		<hr>
		<div class="content-list">
			<div class="content-list-body row">
				<?php foreach( $products as $product ) { ?>
					<div class="col-md-6">
						<div class="card card-project">
							<div class="row no-gutters">
								<div class="col" style="flex: 0 0 120px">
									<img src="/uploads/<?php echo $product["cover_image"]; ?>" width="120" class="rounded-left">
								</div>
								<div class="col">
									<div class="card-body">
										<div class="card-title">
											<a href="/products/<?php echo $product["id"]; ?>">
												<h5 data-filter-by="text"><?php echo $product["name"]; ?></h5>
											</a>
										</div>
										<div class="card-meta d-flex justify-content-between">
											<div class="">
												<span class="text-small">Author: <?php echo $product["author"]; ?></span><br>
												<span class="text-small">Languages: <?php echo $product["languages"]; ?></span><br>
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