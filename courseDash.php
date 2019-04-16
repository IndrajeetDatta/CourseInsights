<?php
	session_start();
	require 'db.php';

    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $title = $_SESSION['title'];
    $institution = $_SESSION['institution'];
    $bio = $_SESSION['bio'];

	$courseID = $_POST['courseID'];
	$_SESSION['course_id'] = $courseID;
	$result = $mysqli->query("SELECT * FROM courses WHERE course_id='$courseID'");
	$course = $result->fetch_assoc();
	$isCourseUpdated = $course['isUpdated'];
	$courseName = $course['course_name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title> Course Dashboard </title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	  <?php include 'css/css.html'; ?>

</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Course Insights</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      
     
    </ul>
    
  </div>

  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"> <?php echo $first_name.' '.$last_name ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"> Logout </a>
            </li>
        </ul>
    </div>
</nav>
<h1 style="color: black"> <?php echo $courseName ?> </h1>
	<?php 
		if($isCourseUpdated == 0)
		{
			echo ' 
			<div class="jumbotron">
			<h3 align="center"> You have not updated your course. Please update your course to see the visualization </h3>
   			<div class="form">	
   			 <form method="post" action="uploadcsv.php" enctype="multipart/form-data">
            <h3 align="center"> Chapters Table </h3>
            <input type="file" name="csv_chapters"/>
            <br /><br>
            <h3 align="center"> Videos Table </h3>
            <input type="file" name="csv_videos" />
            <br /><br>
            <h3 align="center"> Problems Table </h3>
            <input type="file" name="csv_problems" />
            <br /><br>
            <h3 align="center"> Discussions Table </h3>
            <input type="file" name="csv_discussions" />
            <br /><br>
            <h3 align="center"> HTMLs Table </h3>
            <input type="file" name="csv_htmls" />
            <br />
            <div>
              <input type="submit" name="upload" class="button button-block" value="Upload" />
              </form>
            </div>
    	</div>';
     
		}
		else if($isCourseUpdated == 1)
		{
			    
			$result_chapters = $mysqli->query("SELECT * FROM chapters WHERE course_id = '$courseID'");
			$result_videos = $mysqli->query("SELECT * FROM videos WHERE course_id = '$courseID'");
			$result_problems = $mysqli->query("SELECT * FROM problems WHERE course_id = '$courseID'");
			$result_discussions = $mysqli->query("SELECT * FROM discussions WHERE course_id = '$courseID'");
			$result_htmls = $mysqli->query("SELECT * FROM htmls WHERE course_id = '$courseID'");

			$chapters_count = mysqli_num_rows($result_chapters);
			$videos_count = mysqli_num_rows($result_videos);
			$problems_count = mysqli_num_rows($result_problems);
			$discussions_count = mysqli_num_rows($result_discussions);
			$htmls_count = mysqli_num_rows($result_htmls);
			
			$result_chapters_indx = $mysqli->query("SELECT indx FROM chapters WHERE course_id ='$courseID'");

			$result_array_chapters_indx = array();
			while($row = mysqli_fetch_array($result_chapters_indx))
			{
    			$result_array_chapters_indx[] = $row['indx'];
			}
			$result_array_videos_count = array();
			$result_array_problems_count = array();
			$result_array_discussions_count = array();
			$result_array_htmls_count = array();

			for($n = 0; $n < $chapters_count; $n++)
			{

				$x1 = $result_array_chapters_indx[$n];
				// echo $x1;
				// echo " ";
				$x2 = $result_array_chapters_indx[$n+1];
				// echo $x2;
				// echo " | ";

				$tmp_videos = $mysqli->query("SELECT * FROM videos WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'");
				$tmp_problems = $mysqli->query("SELECT * FROM problems WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'");				
				$tmp_discussions = $mysqli->query("SELECT * FROM discussions WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'");
				$tmp_htmls = $mysqli->query("SELECT * FROM htmls WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'");
				// echo "SELECT * FROM videos WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'";
				$tmp_videos_count = mysqli_num_rows($tmp_videos);
				$tmp_problems_count = mysqli_num_rows($tmp_problems);
				$tmp_discussions_count = mysqli_num_rows($tmp_discussions);
				$tmp_htmls_count = mysqli_num_rows($tmp_htmls);
				
				array_push($result_array_videos_count, $tmp_videos_count);
				array_push($result_array_problems_count, $tmp_problems_count);
				array_push($result_array_discussions_count, $tmp_discussions_count);
				array_push($result_array_htmls_count, $tmp_htmls_count);
			}
			
			$array_multi_video_names = array();
			$array_multi_video_lengths = array();

			$array_multi_html_names = array();
			$array_multi_pdf_pages = array();

			for($n = 0; $n < $chapters_count; $n++)
			{

				$x1 = $result_array_chapters_indx[$n];
			
				$x2 = $result_array_chapters_indx[$n+1];
			
				$tmparray_video_names = array();
				$tmparray_video_lengths = array();

				$tmparray_html_names = array();
				$tmparray_pdf_pages = array();

				$queryObj_video_names = $mysqli->query("SELECT video_name FROM videos WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'");

				$queryObj_video_lengths = $mysqli->query("SELECT video_length FROM videos WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'");
				
				$queryObj_html_names = $mysqli->query("SELECT html_name FROM htmls WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'");
			
				$queryObj_pdf_pages = $mysqli->query("SELECT pdf_pages FROM htmls WHERE course_id = '$courseID' AND indx >= '$x1' AND indx < '$x2'");
				 
				 while($obj_video_name = $queryObj_video_names->fetch_object())
				 {
				 	array_push($tmparray_video_names, $obj_video_name->video_name);
				 } 
				
				while($obj_video_length = $queryObj_video_lengths->fetch_object())
				 {
				 	array_push($tmparray_video_lengths, $obj_video_length->video_length);
				 } 

				 while($obj_html_name = $queryObj_html_names->fetch_object())
				 {
				 	array_push($tmparray_html_names, $obj_html_name->html_name);
				 } 

				 while($obj_pdf_pages = $queryObj_pdf_pages->fetch_object())
				 {
				 	array_push($tmparray_pdf_pages, $obj_pdf_pages->pdf_pages);
				 }
				array_push($array_multi_video_names, $tmparray_video_names);
				array_push($array_multi_video_lengths, $tmparray_video_lengths);
				array_push($array_multi_html_names, $tmparray_html_names);
				array_push($array_multi_pdf_pages, $tmparray_pdf_pages);
			}
			// echo "Size of Video Lengths Array: ".sizeof($array_multi_video_lengths);
			// echo "Size of PDF Pages Array: ".sizeof($array_multi_pdf_pages);
			// echo "Videos: ";
			// for($n = 0; $n < sizeof($result_array_videos_count); $n++)
			// {
			// 	echo $result_array_videos_count[$n];
			// 	echo "|";
			// }
			// echo "Problems: ";
			// for($n = 0; $n < sizeof($result_array_problems_count); $n++)
			// {
			// 	echo $result_array_problems_count[$n];
			// 	echo "|";
			// }
			// echo "Discussions: ";
			// for($n = 0; $n < sizeof($result_array_discussions_count); $n++)
			// {
			// 	echo $result_array_discussions_count[$n];
			// 	echo "|";
			// }
			// echo "HTMLs: ";
			// for($n = 0; $n < sizeof($result_array_htmls_count); $n++)
			// {
			// 	echo $result_array_htmls_count[$n];
			// 	echo "|";
			// }
			echo ' 
			<div class="jumbotron">
			<div class="form2">
			<ul class="tab-group">
        	<li class="tab"><a href="#visualizations">Visualizations</a></li>
       	 	<li class="tab active"><a href="#tables">Tables</a></li>
      		</ul>
      
      		<div class="tab-content">

         <div id="tables">   
         <h3 align="center"> Chapters </h3>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" style="color:white">
     		<tr>
      		<th>Chapter Name</th>
      		<th> Videos </th>
      		<th> Problems </th>
      		<th> Discussions </th>
      		<th> HTMLs </th>

     		</tr>'; 
     		$n = 0;
            while($row = mysqli_fetch_array($result_chapters))
     		{
      			echo '
      				<tr>
       					<td>'.$row["chapter_name"].'</td>
       					<td>'.$result_array_videos_count[$n].'</td>
       					<td>'.$result_array_problems_count[$n].'</td>
       					<td>'.$result_array_discussions_count[$n].'</td>
       					<td>'.$result_array_htmls_count[$n].'</td>
      				</tr>
      					';
      				$n++;
     		}
     		echo '
     		</table>
     		</div>

     		<h3 align="center"> Videos </h3>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" style="color:white">
     		<tr>
      		<th>Video Name</th>
      		<th>Video Length</th>
      		<th>indx</th>
     		</tr>'; 
            while($row = mysqli_fetch_array($result_videos))
     		{
      			echo '
      				<tr>
       					<td>'.$row["video_name"].'</td>
       					<td>'.$row["video_length"].'</td>
       					<td>'.$row["indx"].'</td>
      				</tr>
      					';
     		}
     		echo '
     		</table>
   			</div>

     		<h3 align="center"> Problems </h3>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" style="color:white">
     		<tr>
      		<th>Problems Name</th>
      		<th>Problem Type</th>
      		<th>indx</th>
     		</tr>'; 
            while($row = mysqli_fetch_array($result_problems))
     		{
      			echo '
      				<tr>
       					<td>'.$row["problem_name"].'</td>
       					<td>'.$row["problem_type"].'</td>
       					<td>'.$row["indx"].'</td>
      				</tr>
      					';
     		}
     		echo '
     		</table>
   			</div>

     		<h3 align="center"> Discussions </h3>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" style="color:white">
     		<tr>
      		<th>Discussions Name</th>
      		<th>indx</th>
     		</tr>'; 
            while($row = mysqli_fetch_array($result_discussions))
     		{
      			echo '
      				<tr>
       					<td>'.$row["discussion_name"].'</td>
       					<td>'.$row["indx"].'</td>
      				</tr>
      					';
     		}
     		echo '
     		</table>
     		</div>
   			
     		<h3 align="center"> HTMLs </h3>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" style="color:white">
     		<tr>
      		<th>HTML Name</th>
      		<th>HTML Length</th>
      		<th>HTML Type</th>
      		<th>PDF Pages</th>
      		<th>indx</th>
     		</tr>'; 
            while($row = mysqli_fetch_array($result_htmls))
     		{
      			echo '
      				<tr>
       					<td>'.$row["html_name"].'</td>
       					<td>'.$row["html_length"].'</td>
       					<td>'.$row["html_type"].'</td>
       					<td>'.$row["pdf_pages"].'</td>
       					<td>'.$row["indx"].'</td>
      				</tr>
      					';
     		}
     		echo '
     		</table>
   			</div>
     		
        </div>
          
        <div id="visualizations">
      		';
      		echo '<h3 style="text-align:center"> Course Components </h3>
      		<div id="piechart_3d" style = "width: 600px; height: 200px; margin: 0 auto"></div>
      		<br>';
        	$n=0;
        	while($n < $chapters_count)
        	{
        		echo '<div>
        		<h3 style="text-align:center"> Chapter '; echo $n+1; echo' </h3>
        		<div id="piechart_3d'; echo $n; echo '" style = "width: 700px; height: 200px; margin: 0 auto"></div>';
        		

        		if($result_array_videos_count[$n] > 0)
        		{
        			echo'
         			<div id = "container'; echo $n; echo '" style = "width: 700px; height: 200px; margin: 0 auto"> </div>';
         		}
         		if($result_array_htmls_count[$n] > 0)
         		{
         		echo'
         		<div id = "container-pdf'; echo $n; echo '" style = "width: 700px; height: 200px; margin: 0 auto"> </div>';
         		}
         		echo'
         		</div>
         		<br>
         		<br>';		
        		$n++;
        	}

        	echo '	
        </div> <!-- id="visualization" -->	
			';

			
		}
		?>
		

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
	</script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Components', 'Number'],
          ['Videos',      <?php echo $videos_count ?>],
          ['Problems',  <?php echo $problems_count ?>],
          ['Discussions', <?php echo $discussions_count ?>],
          ['HTMLs',    <?php echo $htmls_count ?>]
        ]);

        var options = {
          title: 'Course Components',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
 <?php 
 for($n=0; $n<$chapters_count; $n++)
 {
 	echo '
 	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
	</script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          [\'Components\', \'Number\'],
          [\'Videos\','.$result_array_videos_count[$n].'],
          [\'Problems\','.$result_array_problems_count[$n].'],
          [\'Discussions\','.$result_array_discussions_count[$n].'],
          [\'HTMLs\','.$result_array_htmls_count[$n].']
        ]);

        var options = {
          title: \'Chapter '; echo $n + 1; echo' Components\',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById(\'piechart_3d'.$n.'\'));
        chart.draw(data, options);
      }
    </script>
 	';
 }

for($n = 0; $n <= $chapters_count; $n++)
{

 echo '
  <script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               [\'Chapter\', \'Length (secs)\'],';
               $m=0;
               while($m < sizeof($array_multi_video_lengths[$n]) - 1)
               	{
               		echo '
               		[\''; echo $array_multi_video_names[$n][$m]; echo'\', '.$array_multi_video_lengths[$n][$m].'],';
               		$m++;
            	}
            	echo '[\''; echo $array_multi_video_names[$n][$m]; echo'\', '.$array_multi_video_lengths[$n][$m].']';
        	echo ']);

            var options = {title: \'Video Lengths (in seconds) in Chapter '; echo $n+1; echo ' \'}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById(\'container'; echo $n; echo'\'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
      ';

       echo '
  <script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               [\'Chapter\', \'PDF Pages\'],';
               $m=0;
               while($m < sizeof($array_multi_html_names[$n]) - 1)
               	{
               		echo '
               		[\''; echo $array_multi_html_names[$n][$m]; echo'\', '.$array_multi_pdf_pages[$n][$m].'],';
               		$m++;
            	}
            	echo '[\''; echo $array_multi_html_names[$n][$m]; echo'\', '.$array_multi_pdf_pages[$n][$m].']';
        	echo ']);

            var options = {title: \'PDF Pages per HTML Component in Chapter '; echo $n+1; echo ' \'}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById(\'container-pdf'; echo $n; echo'\'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
      ';
  }
 ?>
 	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>