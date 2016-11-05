<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="favicon-32x32.png" href="favicon-32x32.png" sizes="32x32" />
  <title>Empty form</title>
</head>

  <h1>
    <!-- Google Images Credit-->
  	<img src="http://i30.photobucket.com/albums/c331/edwardtu/GreenBayPackers_zps1772cf1b.png" alt="Packers"
  		style="width: 100%;height:100px;">
  </h1>

  <body style="background-color:lightyellow">
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #006600;
}

li {
    float: left;
}

li a {
    display: block;
    color: lightyellow;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: grey;
}
</style>
</head>
<body>

  <ul>
    <li><a class="active" href="index.htm">Home</a></li>
    <li><a href="Schedule.html">Green Bay Schedule</a></li>
    <li><a href="Game_outcomes.html">Game Outcomes</a></li>
    <li><a href="Project2.html">Empty Form</a></li>
    <li><a href="About.html">About</a></li>
    <li><a href="Resume.html">Resume</a></li>
    <li><a href="Project3.html">Project3</a></li>
  </ul>
</body>

<style>
input[type=text], select {
    width: 100%;
    font: fantasy;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #000000;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    font: fantasy;
    background-color: white;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: lightyellow;
}

div {
    border-radius: 5px;
    font: fantasy;
    background-color: #006600;
    padding: 20px;
}
</style>

<!DOCTYPE HTML>
<html>
<head>
<style>
</style>
</head>
<body>

  <?php
  /* Email Form
   * This is a simple email form that is used to demonstrate PHP validation.  This
   * particular file also demonstrates using PHP to display HTML elements
   */
  $labels = array("to" => "TO:", "from" => "FROM:", "CC" => "CC:",
   "subject" => "SUBJECT:", "body" => "BODY:", "Type_email" => "TYPE OF EMAIL:");
  ?>

  <?php
// define variables and set to empty values
$nameErr = $emailErr = $subErr = $msgErr = $typeErr = $invalidErr = $responseErr = "";
$name = $email = $type = $body = $subject= $response = $success_message = $headers = $Dropdown = "";

$dropdown_vals = array('Comment', 'Urgent', 'Question');
$selected_key = $_POST['Dropwdown'];
$selected_val = $dropdown_vals[$_POST['Dropdown']];

$name_value = isset($_POST['name'])?$_POST['name']:'tdt62@nau.edu';
$email_value = isset($_POST['from'])?$_POST['from']:'';
$subject_value = isset($_POST['subject'])?$_POST['subject']:'';
$body_value = isset($_POST['body'])?$_POST['body']:'';
$cc_value = isset($_POST['CC'])?$_POST['CC']:'';
//$Dropdown = isset($_POST['Dropdown'])?$_POST['Dropdown']:'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //if name is empty or contains special chars / numbers echo Err
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }else if(preg_match('/[\'^£$%&*()}@#~?><>,|=_+¬-]/', $name)) {

  } else {
    $name = test_input($_POST["name"]);
    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name) or preg_match('/[0-9]/', $name)) {
      $nameErr = "Invalid characters in name";
    } else {
      $nameErr = "";
    }
  }
  //is SUB is empty echo errr
  if (empty($_POST["subject"])) {
    $subErr = "Subject is required";
  } else {
    $subErr = "";
    $subject = test_input($_POST["subject"]);
  }
  //if body is empty echo err
  if (empty($_POST["body"])) {
    $msgErr = "Text is required";
  } else {
    $msgErr = "";
    $body = test_input($_POST["body"]);
  }
  if (empty($_POST["from"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["from"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    } else {
      $emailErr = "";
    }
  } if(empty($msgErr) && empty($subErr) && empty($emailErr)) {
    //echo "Hello";
    $headers = "From: $email_value" . "\r\n" . "CC: $email_value" . "\r\n" . "CC: $cc_value";
    $body_value = $selected_val . ":\r\n\n" . $body_value;
    mail($name_value, $subject_value, $body_value, $headers);
    //mail($cc_value, $subject_value, $body_value, $email_value);
    $body_value = $cc_value = $subject_value = $email_value = "";
    $success_message = "Email Sent";

    if(isset($success_message)) {
      echo $success_message;
      }
    }
}


//tests input from strings
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

  <html>
      <head>
          <title>Form</title>
          <style type ="text/css">
          <!--
              form {margin: 1.5em 0 0 0; padding: 0;}
              .field {padding-top: .5em; font-family: fantasy; text-align:left;}
              .error {color: #FF0000;}
              label {font-weight: bold; float: left;
                     margin-right: 1em; text-align: left;}
              #submit {margin-left: 35%; padding-top: 1em;}
          -->
          </style>
      </head>

      <body>
          <h3 style = "font-family: fantasy;">Please fill out the form and click submit to send an email.</h3>
          <p><span class="error"> * = required field.</span></p>
          <form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <?php


                /* Loop that displays the form fields */
                foreach ($labels as $field => $label) {
                    /* echo the label */
                    echo "<div class='field';text-align: left;>
                                    <label for='$field'>$label</label>\n";

                    /* echo the appropriate field */
                    if ($field === "to" or $field === "from" or $field === "subject" or $field === "BODY" or "CC" or "Type_email")
                    {
                        //creates form and validates
                        if($field === "to") {
                          echo "<input type='text' name='$field' id='$field' value='$name_value'
                                size='90' maxlength='80' />\n";
                          echo  "<span class='error'>*
                                $emailErr";
                            }

                        if($field === "from") {
                          echo "<input type='text' name='$field' id='$field' value='$email_value'
                                size='90' maxlength='80' />\n";
                          echo  "<span class='error'>*
                                $emailErr";
                          }
                          if($field === "CC") {
                            echo "<input type='text' name='$field' id='$field' value='$cc_value'
                                  size='90' maxlength='80' />\n";
                            echo  "<span class='error'>*
                                  $emailErr";
                              }

                        if($field === "subject") {
                          echo "<input type='text' name='$field' id='$field' value='$subject_value'
                                size='90' maxlength='80' />\n";
                          echo  "<span class='error'>*
                                $subErr";
                            }

                        if($field === "body") {
                          echo "<input type='text' name='$field' id='$field' value='$body_value'
                                size='90' maxlength='80' />\n";
                          echo  "<span class='error'>*
                                $msgErr";
                            }
                        if($field === "Type_email") {
                          echo  "<select name = 'Dropdown'>
                                  <option value='0'>--Select an Option--</option>
                                  <option value='1'>Comment</option>
                                  <option value='2'>Urgent</option>
                                  <option value='3'>Question</option>
                                </select>\n";
                        }

                    /* echo the end of the field div */
                    echo "</div>\n";
                }
              }

                /* Display the submit button */
                echo "<div id='submit;text-align:center;'>\n
                        <input type='submit' name='submit' value='Submit'>\n
                      </div>\n</form>\n</body>\n</html>";
              ?>

          <!-- Wait, where are the ending <form>, <body>, and <html> tags?  Oh, they’re
             Imbedded in the PHP code just above.  That’s Ok, then. -->

    </body>
    </html>
    <br>
    <br>
</body>
</body>
</html>
