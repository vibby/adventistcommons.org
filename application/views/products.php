<div class="row justify-content-center">
	<div class="col-xl-10 col-lg-11">
		<div class="page-header d-flex justify-content-between align-items-center">
			<h1>Products</h1>
			<?php if( $this->ion_auth->is_admin() ) { ?>
				<button class="btn btn-primary d-flex" data-toggle="modal" data-target="#add-product-form">Add Product</button>
			<?php } ?>
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
												<span class="text-small">Pages: <?php echo $product["page_count"]; ?></span><br>
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
		</div>
	</div>
</div>

<form class="modal fade" action="/products/save" id="add-product-form" tabindex="-1" role="dialog" enctype="multipart/form-data">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Product</h5>
				<button type="button" class="close btn btn-round" data-dismiss="modal">
					<i class="material-icons">close</i>
				</button>
			</div>
			<div class="modal-body">
				<h6>General Details</h6>
				<div class="form-group row align-items-center">
					<label class="col-3">Title</label>
					<input class="form-control col" type="text" name="name" />
				</div>
				<div class="form-group row align-items-center">
					<label class="col-3">Author(s)</label>
					<input class="form-control col" type="text" name="author" />
				</div>
				<div class="form-group row">
					<label class="col-3">Description</label>
					<textarea class="form-control col" rows="3" name="description"></textarea>
				</div>
				<hr>
				<h6>Specifications</h6>
				<div class="form-group row align-items-center">
					<label class="col-3">Page count</label>
					<input class="form-control col" type="number" name="page_count" />
				</div>
				<div class="form-group row align-items-center">
					<label class="col-3">Dimensions (cm)</label>
					<input class="form-control col" type="text" name="dimensions" />
				</div>
				<div class="form-group row align-items-center">
					<label class="col-3">Colors</label>
					<input class="form-control col" type="text" name="colors" />
				</div>
				<hr>
				<h6>Product type</h6>
				<div class="row">
					<div class="col">
						<div class="custom-control custom-radio">
							<input type="radio" id="type-book" name="type" class="custom-control-input" value="book" checked>
							<label class="custom-control-label" for="type-book">Book</label>
						</div>
					</div>
					<div class="col">
						<div class="custom-control custom-radio">
							<input type="radio" id="type-booklet" name="type" class="custom-control-input" value="booklet">
							<label class="custom-control-label" for="type-booklet">Booklet</label>
						</div>
					</div>
					<div class="col">
						<div class="custom-control custom-radio">
							<input type="radio" id="type-pamphlet" name="type" class="custom-control-input" value="pamphlet">
							<label class="custom-control-label" for="type-pamphlet">Pamphlet</label>
						</div>
					</div>
				</div>
				<hr>
				<h6>Cover Image</h6>
				<div class="input-group mb-3">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="cover_image" name="cover_image">
						<label class="custom-file-label" for="cover_image">Choose file</label>
					</div>
				</div>
				<hr>
				<h6>InDesign Translation File (.xliff)</h6>
				<div class="input-group mb-3">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="xliff_file" name="xliff_file">
						<label class="custom-file-label" for="xliff_file">Choose file</label>
					</div>
				</div>
				<hr>
			</div>
			<div class="modal-footer">
				<button role="button" class="btn btn-primary" type="submit">
					Create Product
				</button>
			</div>
		</div>
	</div>
</form>