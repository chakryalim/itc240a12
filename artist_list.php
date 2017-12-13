<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php get_header()?>
<h1><?=$pageID?></h1>
<?php
$sql = "select * from Artists";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        //echo 'Fist Name: <b>' . $row['FirstName'] . '</b> ';
        //echo 'Last Name: <b>' . $row['LastName'] . '</b> ';
        //echo 'Year of Birth: <b>' . $row['Birth'] . '</b> ';
        //echo 'Year of Death: <b>' . $row['Death'] . '</b> ';
        
        echo '<a href="artist_view.php?id=' . $row['ArtistID'] . '">' . $row['FirstName'] .' '. $row['LastName'] .'</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>No artist found in database</p>';
}

echo '<img src="' . $config->virtual_path . '/upload/artist' . dbOut($row['ArtistID']) . '_thumb.jpg" />';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer();?>