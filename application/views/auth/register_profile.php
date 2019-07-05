<h1 class="h2"><?php echo sprintf( "Almost done, %s!", $user->first_name ); ?></h1>
<p class="lead">We need a bit more information about you</p>
<hr>
<form action="/user/register_profile_save" method="post" class="text-left auto-submit">
	<div class="form-group">
		<input class="form-control" type="text" placeholder="Location" name="location" value="<?php echo $user->location; ?>">
	</div>
	<div class="form-group">
		<textarea class="form-control" type="text" placeholder="Bio" name="bio"><?php echo $user->bio; ?></textarea>
	</div>
	<div class="form-group">
		<label>What is your mother language?</label>
		<select class="language-select" name="mother_language_id" data-selected-id="<?php echo $user->mother_language_id; ?>" data-placeholder="Select a language...">
			<option value="">None</option>
		</select>
	</div>
	<div class="form-group">
		<label>What other languages are you fluent in?</label>
		<select class="language-select" multiple name="languages[]" data-selected-ids="<?php echo implode( $user->languages, "|" ); ?>" data-placeholder="Select languages...">
			<option value="">None</option>
		</select>
	</div>
	<div class="form-group text-left">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="1" name="pro_translator" id="pro_translator" <?php echo $user->pro_translator ? "checked" : ""; ?>>
				<label class="form-check-label" for="pro_translator">I'm a professional translator</label>
		</div>
	</div>
	<div class="form-group">
		<label>Other skills</label>
		<select class="selectize" multiple name="skills[]" data-placeholder="Select skills...">
			<?php foreach( $skills as $skill ) {
				$selected = in_array( $skill, $selected_skills ) ? "selected" : "";
				echo "<option $selected>" . $skill . "</option>";
			} ?>
		</select>
	</div>
	<button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
		Continue
	</button>
</form>
