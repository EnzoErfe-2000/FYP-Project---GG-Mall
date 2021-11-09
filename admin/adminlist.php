<?php
include_once '../admin/include/adminheader.php';

if(!isset($_SESSION["loggedin"]))
{
  echo'
    <script>
        alert("Please login first");
        location.href = "login.php";
    </script>
  ';
}

$email_err = $username_err = $password_err = $confirm_password_err = "";
$email = $username = $password = $confirm_password = "";
$status="true";

if(isset($_POST['submit']))
{
  $status="false";

  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $confirm_password=$_POST['confirm_password'];

  $sql = "SELECT * FROM admin WHERE admin_emailAddress = '$email'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result) > 0)
  {
    $email_err = "Please try another email.";
  }
  else if(empty($email))
  {
    $email_err = "Please enter email address.";
  }
  else if(!preg_match("/^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/", ($_POST["email"])))
  {
    $email_err = "Invalid email format";
  }

  if(empty($username))
  {
    $username_err = "Please enter an username.";
  }

  if(empty($password))
  {
    $password_err = "Please enter your password.";
  }

  if(empty($confirm_password))
  {
    $confirm_password_err = "Please enter your confirm password.";
  }
  else if($password != $confirm_password)
  {
    $confirm_password_err = "Password not match.";
  }

  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);

  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
  {
      $password_err = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
  }

  if($email_err == "" && $username_err == "" && $password_err == "" && $confirm_password_err == "")
  {
    $status="true";
    $sql="INSERT INTO admin(admin_name,admin_emailAddress,admin_password,admin_status) VALUES ('$username','$email','$password','admin')";
    mysqli_query($conn, $sql);  
  }

}

?>
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Admin List</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Contact No</th>
                <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Contact No</th>
                <th>Action</th>
            </tr>
          </tfoot>
            <?php 
                $sql = "SELECT * FROM admin";
                if($result = mysqli_query($conn, $sql))
                {
                while($row=mysqli_fetch_assoc($result))
                {
                    echo'
                    <tbody>
                        <tr>
                        <td>'.$row['admin_id'].'</td>
                        <td>'.$row['admin_name'].'</td>
                        <td>'.$row['admin_emailAddress'].'</td>
                        <td>'.$row['admin_contactNo'].'</td>
                        <td><a href="admin_edit.php?admin_id='.$row['admin_id'].'">Edit</a></td>
                        </tr>
                    </tbody>
                    ';
                }
                } 
            ?>
            </table>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-primary" onclick="return openmodal()" style="margin-bottom:20px; margin-left:20px;">
        Add Admin
      </button>
      <div class="modal" role="dialog" id="modaladdadmin" style="background-color:rgba(0,0,0,0.50);">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="h3 text-center" style="margin-top:20px; ">Add Admin</h3>
            </div>
            <div class="modal-body">
              <form 
                  action="#" 
                  method="post"
                  style="text-align: left">
                  
                  <div class="form-group required">
                    <label for="input-username" class="control-label">Username</label><br>
                    <input type="text" placeholder="Your name" name="username" class="simple-input" value="<?php echo $username; ?>" id="input-username" required />
                    <span class="invalid-feedback d-block" ><?php echo $username_err; ?></span>
                  </div>

                  <div class="form-group required">
                    <label for="input-email" class="control-label">Email</label><br>
                    <input type="email" placeholder="Your email" name="email" class="simple-input" value="<?php echo $email; ?>" id="input-email" required />
                    <span class="invalid-feedback d-block" ><?php echo $email_err; ?></span>
                  </div>
                  
                  <div class="form-group required">
                    <label for="input-password" class="control-label">Password</label><br>
                    <input type="password" placeholder="Enter password" name="password" class="simple-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" onkeyup="validatepassword(this.value);" value="<?php echo $password; ?>" id="input-password" required/>
                    <span class="invalid-feedback d-block" id="msg"><?php echo $password_err; ?></span>
                  </div>

                  <div class="form-group required">
                    <label for="input-cfmpassword" class="control-label">Confirm Password</label><br>
                    <input type="password" placeholder="Repeat password" name="confirm_password" class="simple-input" value="<?php echo $confirm_password; ?>" id="input-cfmpassword" required />
                    <span class="invalid-feedback d-block" ><?php echo $confirm_password_err; ?></span>
                  </div>

                  <div class="empty-space col-xs-b10 col-sm-b20"></div>
                  <div class="col-sm-5">
                        <button class="btn btn-primary" type="submit" name="submit" id="submit" class="submit" style="border:none" onclick="validate">
                            <span class="button-wrapper">
                                <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                <span class="text">submit</span>
                            </span>
                        </button>
                    </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="return closemodal()">Close</button>
            </div>
          </div>
        </div>
      </div>
      <p id="status" style="display:none;"><?php echo $status?></p>
      <script>
        function closemodal()
        {
          $('#modaladdadmin').fadeOut();
          return false;
        }
        function openmodal()
        {
          $('#modaladdadmin').fadeIn();
          return false;
        }
        if(document.getElementById("status").innerHTML == "false") {
            $('#modaladdadmin').fadeIn();
        }
      </script>

    <script>
        function validatepassword(password) {
            // Do not show anything when the length of password is zero.
            if (password.length === 0) {
                document.getElementById("msg").innerHTML = "";
                return;
            }
            // Create an array and push all possible values that you want in password
            var matchedCase = new Array();
            matchedCase.push("[$@$!%*#?&]"); // Special Charector
            matchedCase.push("[A-Z]"); // Uppercase Alpabates
            matchedCase.push("[0-9]"); // Numbers
            matchedCase.push("[a-z]"); // Lowercase Alphabates

            // Check the conditions
            var ctr = 0;
            for (var i = 0; i < matchedCase.length; i++) {
                if (new RegExp(matchedCase[i]).test(password)) {
                    ctr++;
                }
            }
            // Display it
            var color = "";
            var strength = "";
            switch (ctr) {
                case 0:
                case 1:
                case 2:
                    strength = "Very Weak";
                    color = "red";
                    break;
                case 3:
                    strength = "Medium";
                    color = "orange";
                    break;
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
            }
            document.getElementById("msg").innerHTML = strength;
            document.getElementById("msg").style.color = color;
        }

    </script>
<?php
include_once 'include/adminfooter.php';	
?>