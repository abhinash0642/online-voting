<?php

$sql = "SELECT `partyname` , COUNT(partyname) as seats FROM `tempdatastorage` GROUP BY partyname";
$query =  mysqli_query($con,$sql);
if(mysqli_num_rows($query) > 0){
    $partynames = array();
    $seatcount = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $partynames[]= $row["partyname"];
        $seatcount[] = $row["seats"];
    }
}
else{
    $partynames[] = 0;
    $seatcount[] = 0;
    echo "Chart Not Available ";
}
?>
<?php // echo print_r($partynames) ?>
<div class="chartsection">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>




<script>
//converting php array into js through json_encode
    const partylabel = <?php echo json_encode($partynames); ?>;

    const seats = <?php echo json_encode($seatcount); ?>;
    //setup Block
    const data = {
        labels:partylabel,
        datasets: [{
            label: 'Seats Won By Party',
            data:seats,
            backgroundColor: [
                '#0072FF',
                '#F80759',
                '#38EF7D',
                '#4E54C8',
                '#FDC830',
                '#EDAEF9',
                '#3DB2FF',
                '#E53935',
                '#9B2335'
            ],
            hoverOffset: 4
        }]
    };
    //config Block
    const config = {
        type: 'doughnut',
        data
      
    };

    ///Render Block
const mychart = new Chart(
    document.getElementById('myChart').getContext('2d'),
    config
);
    // const ctx = document.getElementById('myChart');
    // const myChart = new Chart(ctx, {

    // });
</script>