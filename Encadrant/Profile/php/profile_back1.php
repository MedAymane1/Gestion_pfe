<?php
session_start();
$code = $_SESSION["code_enc"];

include_once "../../../db_conn.php";

// 
if( isset($_POST["change"]) ) {
    // Check that fname is valide
    if( empty($_POST["fname"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div><strong>First name cannot be empty</strong></div>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
              </div>';
        exit(-1);
    }

    // Check that lname is valide
    if( empty($_POST["lname"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div><strong>Last name cannot be empty</strong></div>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
              </div>';
        exit(-1);
    }

    // Check that username is valide
    if( empty($_POST["userName"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div><strong>User name cannot be empty</strong></div>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
              </div>';
        exit(-1);
    }
    else {
        try {
            $userName = $_POST["userName"];
    
            $query = "SELECT COUNT(*) AS users
                      FROM compte
                      WHERE username='$userName'
                      AND id_compte<>(SELECT id_compte
                                      FROM encadrant
                                      WHERE code_enc=$code)" ;
            
            $res = $conn->query($query);
            $data = $res->fetch();
            if ( $data["users"] === 1 ) {
                echo '<div class="alert alert-danger alert-dismissable">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>
                                        This userName is already used. Try another one
                                    </strong>
                                </div>
                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                </button>
                            </div>
                          </div>';
                exit(-1);
            }
        }
        catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Check that email is valide
    if( empty($_POST["email"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div><strong>Email cannot be empty</strong></div>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
              </div>';
        exit(-1);
    }
    else {
        if ( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div><strong>Please enter a valide email</strong></div>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                  </div>';
            exit(-1);
        }
    }

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];

    // Update the infos without updating the profile image
    if( empty($_FILES["image"]["name"]) ) {
        try {
            $query1 = "UPDATE compte NATURAL JOIN encadrant
                       SET nom_enc='$lname', 
                           prenom_enc='$fname', 
                           email_enc='$email', 
                           username='$userName'
                       WHERE code_enc=$code";
            $conn->exec($query1);
            echo "done";
        }
        catch (Exception $e) {
            die("Error: " . $e.getMessage());
        }
    }
    // Update the infos and profile image
    else {
        // Check that image is valide
        $img_name = $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png' ,'webp');

            if(in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("$code-", true) . '.' . $img_ex_lc;
                $img_path = '../../../Uploads/Images/Supervisors_images/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_path);
                try {
                    $query2 = "UPDATE compte NATURAL JOIN encadrant
                               SET nom_enc='$lname', 
                                   prenom_enc='$fname', 
                                   email_enc='$email', 
                                   username='$userName', 
                                   img_enc='$new_img_name' 
                               WHERE code_enc=$code";
                    $conn->exec($query2);
                    echo "done";
                }
                catch (Exception $e) {
                    die("Error: " . $e.getMessage());
                }

            }
            else {
                echo '<div class="alert alert-danger alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div><strong>Cannot upload this type of images</strong></div>
                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close">
                            </button>
                        </div>
                      </div>';
                exit(-1);
            }
        }
        else {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div><strong>Failed to upload this image</strong></div>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                  </div>';
            exit(-1);
        }
    }
}

?>
