<?php
session_start();
$id = $_SESSION["id_compte"];

include_once "../../../db_conn.php";

if( isset($_POST["changePass"]) ) {

    if( isset($_POST["oldP"]) ) {
        if( !empty($_POST["oldP"]) ) {
            try {
                $oldP = $_POST["oldP"];
                $query = "SELECT passwd FROM compte WHERE id_compte=$id";
                $res = $conn->query($query);
                $data = $res->fetch();
                if ( !password_verify($oldP, $data["passwd"]) ) {
                    echo '<div class="alert alert-danger alert-dismissable">
                            <div class="d-flex justify-content-between">
                                <div><strong>Old password is incorrect</strong></div>
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
        else {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div><strong>Old password is required</strong></div>
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

    if( isset($_POST["newP"]) ) {
        if( empty($_POST["newP"]) ) {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div><strong>New password is required</strong></div>
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

    if( isset($_POST["cNewP"]) ) {
        if( empty($_POST["cNewP"]) ) {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div><strong>Please confirm your new password !!</strong></div>
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

    if( strcmp($_POST["newP"], $_POST["cNewP"]) === 0 ) {
        try {
            $newP = $_POST["newP"];
            $newP_hash = password_hash($newP, PASSWORD_DEFAULT);
            $query1 = "UPDATE compte SET passwd='$newP_hash' WHERE id_compte=$id";
            $conn->exec($query1);
            echo "done";
        }
        catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
    else {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div><strong>The confirmation password does not match</strong></div>
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
?>