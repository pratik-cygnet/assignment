<div class="pull-right">
					<a href="<?php echo $base_url."user.php";?>" class="btn btn-success">Create User</a>
		        </div>
<?php
// display the users if there are any
if($total_rows>0){
 
    echo "<table class='table table-bordered'>";
        echo "<tr>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Date of Birth</th>";
            echo "<th>Gender</th>";
            echo "<th>Action</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>$first_name</td>";
                echo "<td>$last_name</td>";
                echo "<td>".date("m-d-Y",strtotime($birth_date))."</td>";
                echo "<td>$gender</td>";
                echo "<td>";

                    // edit user button
                    echo "<a href='user.php?id={$id}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</a>";
 					echo "&nbsp;";	
                    // delete user button
                    echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</a>";
 
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
 
    // paging buttons
    include_once 'paging.php';
}
 
// tell the user there are no users
else{
    echo "<div class='alert alert-danger'>No Users found.</div>";
}
?>