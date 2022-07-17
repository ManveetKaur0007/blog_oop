<?php
require_once('header.php');


if(!isset($_SESSION['USERNAME'])) {
	header("Location: index1.php");
}

if(isset($_POST['submit'])) {
	$_POST['cat'] = addslashes ($_Post['cat']);
	$_POST['subject'] = addslashes ($_Post['subject']);
	$_POST['body'] = addslashes ($_Post['body']);
	$entry = new Entry(0, $_apost['cat'], 0, $_POST['subject'], $_POST['body']);
	$entry->create();
	header("Location: index1.php");
} 		
else {
	?>
	<h1>Add New Entry</h1>
	<?php
	$categories = Category::all();
	if(count($categories) == 0) {
		echo "No Categories!";
	
	} else {
		?>
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
	<table>
		<tr>
			<td>Category</td>
			<td>
				<select name="cat">
					<?php
					foreach($categories as $category) {
						echo "<option value='" . $category->getId() . 
						"'>" . $category->getCat() . "</option>";
					}
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Subject</td>
			<td><input type="text" name="subject"></td>
		</tr>

		<tr>
			<td>Body</td>
			<td><textarea name="body" rows="10" cols="50"></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Post Entry"></td>
		</tr>
	</table>
</form>

		<?php
	}
}
require_once('footer.php');
?>