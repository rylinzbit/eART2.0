<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title>Artist Account</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/artist_account_styles.css">
</head>
<body>
	<div class="container">
		<div class="row">
		<div id="logoff">
			<form action="artistAccountController/log_off" method="POST">
				<button class="btn btn-default button prof_but" type="submit">Log Off</button>
			</form>
		</div>
			<div id ="left_col"class="col-md-4">
<!-- - - - - --><div id="profile_pic"> <!-- - - - BEGINNING OF PROFILE PIC TABLE - - - -->
					<p>Welcome back <?= $this->session->userdata('currentUser')['first_name'] ?>!</p>
<?php
		if($profile_info['profile_pic_id'] == null){
?>
					<img class="profile_pic" src="/assets/img/profile_pics/default_profile.jpg" alt="default photo">
<?php
		}
		else{
?>
					<img class="profile_pic" src="/assets/img/profile_pics/<?= $profile_info['profile_pic_id'] ?>" alt="profile picture">
<?php
		}
					echo form_open_multipart('artistAccountController/upload_profile_pic');
?>
	 					<span class="btn btn-default btn-file button prof_but">Choose Image File<input type="file" name="userfile"></span>
						<button class="btn btn-default button prof_but" type="submit">Upload Profile Photo</button>
					</form>
<!-- - - - - --></div> <!-- - - - END OF PROFILE PIC TABLE - - - -->
				<form id="text_edits" action="ArtistAccountController/update_bio_about" method="POST">
<!-- - - - - - - --><div id="bio"> <!-- - - - START OF BIO DIV - - - -->
					<label class="info_label">Bio:</label>
<?php 
		if($profile_info['bio'] !== null){
?>
				<textarea id="bio_edit" class=" form-control box_info" rows="7" name="bio"><?=$profile_info['bio']?></textarea>
<?php
		}else{
?>
					<textarea id="bio_edit" class=" form-control box_info rows="7"" name="bio"></textarea>
<?php
		}
?>
<!-- - - - - - - --></div> <!-- - - - END OF BIO DIV - - - -->
<!-- - - - - - - --><div id="about"> <!-- - - - START OF ABOUT ART DIV - - - -->
					<label class="info_label">Influences in your Art:</label>
<?php
		if($profile_info['about_art'] !== null){
?>
				<textarea class="form-control box_info" rows="9" name="about_art"><?= $profile_info['about_art'] ?></textarea>
<?php
		}else{
?>
					<textarea id="bio_edit" class="form-control box_info" rows="9" name="bio"></textarea>
<?php
		}
?>
					</textarea>
<!-- - - - - - - --></div> <!-- - - - END OF ABOUT ART DIV - - - -->
					<button class="btn btn-default button prof_but" type="submit">Save</button>
				</form>
<!-- - - --></div> <!-- - - - END OF LEFT_COL - - - -->
			<div class="col-md-7">
				<div class="row">	
<!-- - - - - - - --> <div id="upload_new_file" class="col-md-12"> <!-- - - - BEGINNING OF UPLOAD NEW ARTWORK TABLE - - - -->
						<p>Upload New Artwork</p>
<?php
		echo form_open_multipart('artistAccountController/upload_new_artwork');
			if($this->session->flashdata("upload_errors")){
				$errors = $this->session->flashdata("upload_errors");
				foreach ($errors as $error) {
?>
						<p class="error"><?= $error ?></p>
<?php
				}
			}
		if($this->session->flashdata("image_errors")){
			$img_errors = $this->session->flashdata("image_errors");
			foreach ($img_errors as $img_error) {
?>
						<p class="error"><?= $img_error ?></p>
<?php
			}
		}
			
?>
						<p class="success"><?= $this->session->flashdata("upload_success") ?></p>
						<label class="col-md-3">Title:</label><input class="form-control input" type="text" name="title" placeholder="Title">
						<label class="col-md-3">Image:</label><span class="btn btn-default btn-file button">Choose Image File<input type="file" name="userfile"></span>
						<label class="col-md-3">Terms:</label><select class="form-control input" name="terms">
								<option value="Term A">Term A</option>
								<option value="Term B">Term B</option>
								<option value="Term C">Term C</option>
								<option value="Term D">Term D</option>
								<option value="Term E">Term E</option>
						</select>
						<label class="col-md-3">Price:</label><input class="form-control input" type="number" step="any" name="price" placeholder="PRICE">
						<label class="col-md-3">Description:</label><textarea class="form-control input" rows="5" name="description"></textarea>
						<button class="btn btn-default button" type="submit">Upload New Artwork</button>
					</form>
				</div> <!-- - - END OF ROW - - -->
			</div>
		</div> <!-- - - END OF ROW - - -->
			<div class="row">
<!-- - - - --> <div id="edit_delete" class="col-md-7"> <!-- - - - BEGINNING OF EDIT/DELETE TABLE - - - -->
					<p>EDIT / DELETE table</p>
<?php
		if($this->session->flashdata('edit')){
?>
					<p><?= $this->session->flashdata('edit') ?></p>
<?php 
		}
?>
<?php
		if($artwork){
			for($i = 0; $i < count($artwork); $i++){
				$piece = $artwork[$i];
?>
					<div class="thumbnail_box">
					<img class="thumbnails" src="assets/img/<?= $piece['image_name'] ?>">
					<p>
						<form action="artistAccountController/edit_page" method="POST">
							<input type="hidden" name="artwork_id" value="<?= $piece['id'] ?>">
							<button class="btn btn-default ed_button" type="submit">Edit</button>					
						</form>
						<form action="artistAccountController/delete_art" method="POST">
							<input type="hidden" name="artwork_id" value="<?= $piece['id'] ?>">
							<button class="btn btn-default ed_button" type="submit">Delete</button>
						</form>
					</p>
					</div>
<?php
			}	
		}
?>
				</div>			
			</div>
		</div>
	</div>
</body>
</html>