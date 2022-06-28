<?php
session_start();

include_once "../../db_conn.php";

// 
if( isset($_POST["change"]) ) {
    if( empty($_POST["fname"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>First name cannot be empty</strong>
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

    if( empty($_POST["lname"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Last name cannot be empty</strong>
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

    if( empty($_POST["userName"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>User name cannot be empty</strong>
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
    else {
        try {
            $userName = $_POST["userName"];
            $code = $_SESSION["code_enc"];
    
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

    if( empty($_POST["email"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Email cannot be empty</strong>
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
    else {
        if ( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
            echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Please enter a valide email</strong>
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
    // all field's values are valide. Update the infos
    try {
        $code = $_SESSION["code_enc"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $userName = $_POST["userName"];
        $email = $_POST["email"];

        $query1 = "UPDATE compte NATURAL JOIN encadrant
                   SET nom_enc='$lname', 
                       prenom_enc='$fname', 
                       email_enc='$email', 
                       username='$userName'
                   WHERE code_enc=$code";
        // $response = 
        $conn->exec($query1);
        echo "updated";
    }
    catch (Exception $e) {
        die("Error: " . $e.getMessage());
    }
}

?>

<!-- 
    echo '<div class="alert alert-success alert-dismissable">
            <div class="d-flex justify-content-between">
                <div>
                    <strong>Profile updated successfully</strong>
                </div>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
          </div>';
 -->