<?php
include_once "header.php";
include_once 'config/core.php';
// get ID of the user to be edited
$id = @$_GET['id'];

// include  object files
include_once 'objects/user.php';

if($id){

$update=true;
$title = 'Update User';
$action = 'user.php?id='.$id;

// prepare user object
$user = new User($db);
 
// set ID property of user to be edited
$user->id = $id;
 
// read the details of user to be edited
$data = $user->readOne();

// if the form was submitted
if($_POST){

	 // set user property values
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->gender = $_POST['gender'];
    $user->birth_date = $_POST['birth_date'];
 
    // update the user
    if($user->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "User was updated.";
        echo "</div>";
    }
 
    // if unable to update the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to update user.";
        echo "</div>";
    }

}

}else{
	$update=false;
	$title = 'Create User';
	$action = 'user.php';

// if the form was submitted
if($_POST){
 
    // instantiate user object
    include_once 'objects/user.php';
    $user = new User($db);
 
    // set user property values
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->birth_date = $_POST['birth_date'];
    $user->gender = $_POST['gender'];
 	$user_id = $user->create();
    // create the user
    if($user_id){

    	//Upload file
    	
    	if(isset($_FILES['user_files'])){
			$errors= '';
			$file_name = $_FILES['user_files']['name'];
			$file_size =$_FILES['user_files']['size'];
			$file_tmp =$_FILES['user_files']['tmp_name'];
			$file_type=$_FILES['user_files']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['user_files']['name'])));

			$expensions= array("zip");

			if(in_array($file_ext,$expensions)=== false){
			 $errors ="File extension not allowed, please choose a zip file.";
			}

			if($file_size > 2097152){
			 $errors .='File size must not be more then 2 MB';
			}

			if($errors==true){
			 move_uploaded_file($file_tmp,"uploads/".$file_name);
			 
			//Now unzip the file and process it
			$zip = new \ZipArchive();

	        $uploaded_file_path = "uploads/".$file_name;

	        if ($zip->open($uploaded_file_path) === TRUE) {

            if ($zip->numFiles>0){

                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $filename = $zip->getNameIndex($i);
                    $files_array[$i]['file_name'] = $filename;
                    $files_array[$i]['user_id'] = $user_id;
                }

            }

            $user_files = $user->insert_files($files_array);
            
            //Extract the files to users directory
            if ($user_files){
                $zip->extractTo('uploads/'.$user_id);
            }

            $zip->close();

			}
   		}else{
   			echo "<div class=\"alert alert-danger alert-dismissable\">";
	            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
	            echo $errors;
        	echo "</div>";
   		}

        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "User was created.";
        echo "</div>";
    }
 
    // if unable to create the user, tell the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to create user.";
        echo "</div>";
    }
}


}
}
?>


<div class="pull-right">
                <a class="btn btn-success" href="<?php echo $base_url;?>">List User</a>
                </div>
            </div>
        </div>
        <!-- Create User -->
                
        <div class="modal-content">
                <div class="modal-dialog">
                    <h4 class="modal-title" id="myModalLabel"><?php echo $title;?></h4>
              		<form method="post" action="<?php echo $action;?>" enctype="multipart/form-data">
                        
						<div class="form-group">
						    <label class="control-label" for="title">First Name:</label>
						        <input type="text" name="first_name" value="<?php echo isset($user->first_name) ? $user->first_name : '' ?>" placeholder="First Name">
						    <div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
						    <label class="control-label" for="title">Last Name:</label>
						        <input type="text" name="last_name" value="<?php echo isset($user->last_name) ? $user->last_name : '' ?>" placeholder="Last Name">
						    <div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
						    <label class="control-label" for="title">Birth Date:</label>
						    	<input type="text" name="birth_date" value="<?php echo isset($user->birth_date) ? $user->birth_date : '' ?>" id="datepicker">
						    <div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
						    <label class="control-label" for="title">Gender:</label>
						        <input type="radio" name="gender" value="male" <?php echo isset($user->gender) && $user->gender=='male' ? 'checked' : '' ?>> Male
						        <input type="radio" name="gender" value="female" <?php echo isset($user->gender) && $user->gender=='female' ? 'checked' : '' ?>>Female
						    <div class="help-block with-errors"></div>
						</div>

                    <?php if (!$update) { ?> 
                        <div class="form-group">
                            <label class="control-label" for="title">Zip File:</label>
                            <input type="file" name="user_files">
                            <div class="help-block with-errors"></div>
                        </div>
                    <?php } ?>

                        <div class="form-group">
                        	<input type="submit" value="<?php echo $title;?>" class="btn btn-success">
                        </div>
                    </form>
              
                </div>
         </div>
<?php include_once "footer.php" ?>