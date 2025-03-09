<?php
include 'header.php';
?>
<style>
.headerwrapper {
    height: 100%;
}
.main-body{
    width:100%;
    padding:4rem 20rem;
}
.containerec{
    width:100%;
    background:white;
    border-radius:.5rem;
    box-shadow:0 2px 3px 2px grey;
    padding:2rem 5rem;

}
.containerec h1{
font-size:2.7rem;
padding:1rem 0;
color:#ff5276;
}
table{
    outline-width: 0;
  position: relative;
  width: 100%;
  margin-bottom: 1rem;
  border: 1px solid var(--maintext);
  border-collapse: collapse;
  white-space: nowrap;
  overflow: hidden;
}
thead {
  display: table-header-group;
  background: lightskyblue;
}
th{
    font-size:1.6rem;
}
thead th,
tbody td {
  border: 1px solid var(--maintext);
  text-align: center;
  vertical-align: center;
  display: table-cell;
  padding: 1rem 1rem;
  white-space: nowrap;
}
tbody {
  display: table-row-group;
  font-size: 1.7rem;
  font-weight: 300;
}
thead tr,
tbody tr {
  display: table-row;
}
.btnbtn{
    outline: none;
  border: none;
  border-radius: 2rem;
  padding: 0.8rem 2rem;
  font-size: 1.3rem;
  color: white;
  cursor: pointer;
  background: rgb(245, 55, 93);
}
</style>
</div>
<div class="main-body">

    <div class="containerec">
        <h1>
            Upcoming Elections
        </h1>
        <div>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Polling Date</th>
                    <th>Vote</th>
                </tr>
                </thead>
                <tbody>
                    <?php
        $sql = " SELECT * FROM elections where `status`='active' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                ?>
                    <tr>
                        <td><?php echo $row['electionname'] ?></td>
                        <td><?php echo $row['electiontype'] ?></td>
                        <td><?php echo $row['pollingdate'] ?></td>
                        <td>
                            <a href="login.php">
                                <button class="btnbtn" type="submit" name="polling">Cast Vote
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php
            }
        } 
        else 
        {
            ?>
                    <tr>
                        <td colspan="4">No Upcoming Elections</td>
                    </tr>
                    <?php
        }
        ?>

            </table>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>