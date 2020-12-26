<div class="container"><br>

<?php

  if (isset($_SESSION[login])) {

/*--------------insert--------------*/

$newcontent = $_POST[newcontent];
$image = $_FILES[img];
$id_user = $_POST[id_user];

		if (!empty($image)) 
		{
		    $path = 'assets/image/' . $image["name"]; 
		    $newimage = $image["name"];
		    if (move_uploaded_file($image["tmp_name"], $path))
		    {
		    	$qn = mysqli_query($con, "INSERT into post_tb (id, content, image, id_user) VALUES (NULL, '$newcontent', '$newimage', '$id_user')");
					
					if ($qn) {
					header("location:./");
				}	        
		    }

		}	



?>

<div class="row">
  <b>New Post</b>
  <form action="#" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="input-field col s12">
        <textarea id="textarea" name="newcontent" class="materialize-textarea" required></textarea>
        <label for="textarea">Content</label>
      </div>
    </div>
    <div class="file-field input-field">
      <div class="btn">
        <span>Image</span>
        <input type="file" name="img" required>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="You must add image">
      </div>
      <input type="hidden" name="id_user" value="<?php echo $_SESSION[id_user]; ?>">
    </div>
    <button type="submit" name="new" class="btn tosca right">POST</button>
  </form>
</div>
<hr><br>
<?php

}else{

}
?>

<?php
/*---------------read------------------*/

$q = mysqli_query($con, "SELECT post_tb.id as id_post, post_tb.id_user, content, image, users_tb.id, photo, name, email 
						FROM post_tb
						JOIN users_tb ON users_tb.id = post_tb.id_user");

while ($p = mysqli_fetch_array($q)) {
	
?>

	<div class="row">
		<div class="col s1">
			<img src="assets/photo/<?php echo $p[photo]; ?>" class="circle responsive-img">
		</div>
		<div class="col s8" style="text-transform: capitalize;">
			<p><b><?php echo $p[name]; ?></b></p>
		</div>
	</div>
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-image">
          <img src="assets/image/<?php echo $p[image]; ?>">

          <?php
          	if ($_SESSION[id_user] == $p[id_user]) {
			?> 
          <a class="btn-floating halfway-fab waves-effect waves-light teal dropdown-trigger " href="#" data-target="dropdown<?php echo $p[id_post]; ?>"><i class="material-icons">more_vert</i></a>

		  <!-- Dropdown Structure -->
		  <ul id='dropdown<?php echo $p[id_post]; ?>' class='dropdown-content'>
		    <li>
		      <a class="modal-trigger" href="#edit<?php echo $p[id_post]; ?>">Edit</a>      
		    </li>
		    <li>
		      <a href="?pages=delete&id=<?php echo $p[id_post]; ?>">Delete</a>      
		    </li>
		  </ul>

			<?php         	
          	}else{

          	}
          ?>

        </div>
        <div class="card-content">
          <p><?php echo $p[content]; ?></p>
        </div>
      </div>
    </div>
  </div>

      
<?php
}
?>
</div>

<?php

/*-------------------update----------------*/

$content = $_POST[content];
$id = $_POST[id];

if (isset($_POST[edit])) {
	
	$q = mysqli_query($con, "UPDATE post_tb set content = '$content' WHERE id = '$id' ");
	
	if ($q) {
		header("location:./");
	}

}

$qq = mysqli_query($con, "SELECT * FROM post_tb");

while ($pp = mysqli_fetch_array($qq)) { 
?>     
<div id="edit<?php echo $pp[id]; ?>" class="modal">
 <div class="modal-content">
  <form action="#" method="post">
     <div class="row">
     </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="textarea2" name="content" class="materialize-textarea"><?php echo $pp[content]; ?></textarea>
        <label for="textarea2">Edit Content</label>
      </div>
    </div>
      <input type="hidden" name="id" value="<?php echo $pp[id]; ?>">
    <div class="modal-footer">
      <button type="submit" name="edit" class="btn tosca right"><i class="material-icons">check</i></button>
    </div>
    </form>
  </div>
</div>

<?php 
}
?>