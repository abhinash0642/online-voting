<?php
include '../database/security.php';
?>


<?php
/*******************************************************************
 * Reject  a applicant if the deatils is found wrong
******************************************************************8 */

if (isset($_POST['rejectbtn'])) {
    $id = $_POST['approvalvoterid'];
    $reason = $_POST['rejectmsg'];

    $command = " SELECT * FROM applicants WHERE id='$id' ";
    $query_run = mysqli_query($con, $command);
    $row = mysqli_fetch_assoc($query_run);
    extract($row);        // changed the associative array into variables
    if ($query_run) {
        //sending mail to the rejected voter
        $to_email = '$email';
        $subject = "VOTER ID UPDATE";
        $body = "Hey $votername,  Your Voter Id is not approved     $reason";
        $headers = "From: iamdeepakkumar32@gmail.com";
        if(mail($to_email, $subject, $body, $headers)) {
            // Delete the applicant record from the applicants table
            $command = " DELETE  FROM applicants WHERE id='$id' ";
            $query_run = mysqli_query($con, $command);
            if ($query_run) {
                header('Location: applicants.php');   //redirecting to the applicant page
            } else {
?>
                <script>
                    alert('Applicant record has not  been deleted');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('ERROR: Mail Sending Failed');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('An Error has occured while fetching the Applicant details');
        </script>
<?php
    }
}
?>