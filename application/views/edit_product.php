<div class="row justify-content-center mt-5">
	<div class="col-lg-3 mb-3">
		<ul class="nav nav-tabs flex-lg-column">
			<li class="nav-item">
				<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab">General</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="specs-tab" data-toggle="tab" href="#specs" role="tab">Specifications</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="advanced-tab" data-toggle="tab" href="#advanced" role="tab">Advanced</a>
			</li>
		</ul>
	</div>
	<div class="col-xl-8 col-lg-9">
		<div class="card">
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane fade show active" role="tabpanel" id="general">
						<form class="auto-submit" action="/products/save" method="post">
							<div class="media mb-4">
								<img alt="Image" width="80" src="/uploads/<?php echo $product["cover_image"] ?>" class="rounded" />
								<div class="media-body ml-3">
									<strong>Cover photo</strong><br>
									<div class="input-group mt-2">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="cover_image" name="cover_image">
											<label class="custom-file-label" for="cover_image">Choose file</label>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group row align-items-center">
								<label class="col-3">Title</label>
								<input class="form-control col" type="text" name="name" value="<?php echo $product["name"]; ?>" />
							</div>
							<div class="form-group row align-items-https://goo.gl/maps/Dx2ztuHkeXQ2center">
								<label class="col-3">Author(s)</label>
								<input class="form-control col" type="text" name="author" value="<?php echo $product["author"]; ?>" />
							</div>
							<div class="form-group row align-items-center">
								<label class="col-3">Publisher</label>
								<input class="form-control col" type="text" name="publisher" value="<?php echo $product["publisher"]; ?>" />
							</div>
							<div class="form-group row align-items-center">
								<label class="col-3">Publisher website</label>
								<input class="form-control col" type="text" name="publisher_website" value="<?php echo $product["publisher_website"]; ?>" />
							</div>
							<div class="form-group row">
								<label class="col-3">Description</label>
								<textarea class="form-control col" rows="3" name="description"><?php echo $product["description"]; ?></textarea>
							</div>
							<div class="form-group row align-items-center">
								<label class="col-3">Audience</label>
								<select class="form-control col" name="audience">
									<?php foreach( $audience_options as $item ) {
										if( $product["audience"] == $item ) {									
											echo "<option selected>$item</option>";
										} else {
											echo "<option>$item</option>";
										}
									} ?>
								</select>
							</div>
							<div class="form-group row align-items-center">
								<label class="col-3">Page count</label>
								<input class="form-control col" type="number" name="page_count" value="<?php echo $product["page_count"]; ?>" />
							</div>
							<hr>
							<h6>Product type</h6>
							<div class="row">
								<?php foreach( $product_types as $type ) { ?>
									<div class="col">
										<div class="custom-control custom-radio">
											<input type="radio" id="type-<?php echo $type; ?>" name="type" class="custom-control-input" value="<?php echo $type; ?>" <?php if( $product["type"] == $type ) { echo "checked"; } ?> />
											<label class="custom-control-label" for="type-<?php echo $type; ?>"><?php echo ucfirst( $type ); ?></label>
										</div>
									</div>
								<?php } ?>
							</div>
							<hr>
							<div class="row justify-content-end">
								<button type="submit" class="btn btn-primary mr-2">Save</button>
							</div>
							<input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
						</form>
					</div>
					<div class="tab-pane fade" role="tabpanel" id="specs">
						<form action="/products/save_specs" method="post" class="auto-submit">
							<h6>Format</h6>
							<div class="row">
								<div class="col">
									<div class="form-group row align-items-center">
										<label class="col-3">Open</label>
										<input class="form-control col" type="text" name="format_open" placeholder="e.g. 10.4 x 20.5 cm" value="<?php echo $product["format_open"]; ?>" />
									</div>
								</div>
								<div class="col">
									<div class="form-group row align-items-center">
										<label class="col-3">Closed</label>
										<input class="form-control col" type="text" name="format_closed" placeholder="e.g. 10.4 x 41 cm" value="<?php echo $product["format_closed"]; ?>" />
									</div>
								</div>
							</div>
							<hr>
							<h6>Cover</h6>
							<div class="row">
								<div class="col">
									<div class="form-group row align-items-center">
										<label class="col-3">Colors</label>
										<input class="form-control col" type="text" name="cover_colors" value="<?php echo $product["cover_colors"]; ?>" />
									</div>
								</div>
								<div class="col">
									<div class="form-group row align-items-center">
										<label class="col-3">Paper</label>
										<input class="form-control col" type="text" name="cover_paper" value="<?php echo $product["cover_paper"]; ?>" />
									</div>
								</div>
							</div>
							<hr>
							<h6>Interior</h6>
							<div class="row">
								<div class="col">
									<div class="form-group row align-items-center">
										<label class="col-3">Colors</label>
										<input class="form-control col" type="text" name="interior_colors" value="<?php echo $product["interior_colors"]; ?>" />
									</div>
								</div>
								<div class="col">
									<div class="form-group row align-items-center">
										<label class="col-3">Paper</label>
										<input class="form-control col" type="text" name="interior_paper" value="<?php echo $product["interior_paper"]; ?>" />
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group row align-items-center">
								<label class="col-3">Binding</label>
								<select class="form-control col" name="binding">
									<?php foreach( $product_binding as $item ) {
										if( $product["binding"] == $item ) {									
											echo "<option selected>$item</option>";
										} else {
											echo "<option>$item</option>";
										}
									} ?>
								</select>
							</div>
							<div class="form-group row align-items-center">
								<label class="col-3">Finishing</label>
								<input class="form-control col" type="text" name="finishing" value="<?php echo $product["finishing"]; ?>" />
							</div>
							<hr>
							<div class="row justify-content-end">
								<button type="submit" class="btn btn-primary mr-2">Save</button>
							</div>
							<input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
						</form>
					</div>
					<div class="tab-pane fade" role="tabpanel" id="advanced">
						<form action="/products/save_xliff" method="post" class="auto-submit">
							<h6>InDesign Translation File (.xliff)</h6>
							<?php if( $product["xliff_file"] ) { ?>
							<a href="/uploads/<?php echo $product["xliff_file"]; ?>">Download original XLIFF file</a>
							<?php } else { ?>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="xliff_file" name="xliff_file">
										<label class="custom-file-label" for="xliff_file">Choose file</label>
									</div>
								</div>
								<div class="row justify-content-end">
									<button type="submit" class="btn btn-primary mr-2">Upload</button>
								</div>
								<input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
							<?php } ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>