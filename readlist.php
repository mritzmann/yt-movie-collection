<?php   
   function readlist($showlist){
       //load php files
       include 'sql_con.php';
       include 'ajax-call.php';
       echo 
           "<table id='movies'>
            <caption>Neue Filme</caption>
            <thead>
            <tr>
                <th>Titel</th>
                <th>Genre</th>
                <th>Rating</th>
                <th>DE Cine</th>
                <th>DE BD</th>
                <th>EN Cine</th>
                <th>EN BD</th>
                <th>Youtube Trailer</th>
                <th>In eigene Liste hinzufügen</th>
            </tr>
            </thead>
            <tbody>";
        $i = 0;
        //load data from database and write it as html
        foreach($conn->query("SELECT * FROM tbl_movie WHERE `list`='$showlist'") as $row) {
          echo "<tr>";
          echo "<td>".$row['title']."</td>";
          echo "<td>".$row['genre']."</td>";
          echo "<td>".$row['rating']."</td>";
          echo "<td>".$row['de_cine']."</td>";
          echo "<td>".$row['de_hd']."</td>";
          echo "<td>".$row['en_cine']."</td>";
          echo "<td>".$row['en_hd']."</td>";
          //preparing variables
          $movie = $row['title'];
          $adding_yt = "trailer";
          $movieid = $row['id'];
          $yt_search = $movie." ".$adding_yt;
          echo "<td>"."<a href='https://www.youtube.com/results?search_query=$yt_search'>Click here</a>"."</td>";
          echo "<td>".ajaxcall($movieid, $i)."</td>";
          echo "</tr>";
          $i++;
        }
        // Close MySQL Connection
        $conn = null;
        echo 
            "</tbody>    
            </table>
                <!-- Responsive Table
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='js/responsive_table.js'></script>";
        ;}
?>