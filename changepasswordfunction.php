<?php
include_once 'includes/dbh.inc.php';

if(isset($_POST['changepasswordButton'])){

      if(empty($_POST['oldPassword'])){echo "please enter current password.";}else {
                $oldPasswordVar = $_POST['oldPassword'];

                if($adminPassword !== $oldPasswordVar){echo "Password does not match.";}else {

                          if(empty($_POST['newPassword'])){echo "please enter new password.";}else {

                              $newPasswordVar = $_POST['newPassword'];

                                if(empty($_POST['confirmPassword'])){echo "please confirm new password.";}else {

                                    $confirmPassword = $_POST['confirmPassword'];

                                    if($newPasswordVar !== $confirmPassword){echo "New password does not match.";

                                    }else {
                                      $username = $_SESSION['myAdmin'];
                                      $changePasswordQuery = "UPDATE users SET user_pwd = '$newPasswordVar' WHERE user_uid = '$username'";
                                      if ($conn->query($sql) === TRUE) {
                                            echo "Record updated successfully";
                                        } else {
                                            echo "Error updating record: " . $conn->error;
                                        }

                                        $conn->close();
                                    }

                                }

                            }

                    }

            }


}
