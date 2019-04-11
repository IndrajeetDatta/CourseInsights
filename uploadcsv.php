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
    $courseID = $_SESSION['course_id'];

    $chaptersUpdated = false;
    $videosUpdated = false;
    $problemsUpdated = false;
    $discussionsUpdated = false;
    $htmlsUpdated = false;

    if(isset($_POST["upload"]))
    {
      
       if($_FILES['csv_chapters']['name'] && $_FILES['csv_videos']['name'] && $_FILES['csv_problems']['name'] && $_FILES['csv_discussions']['name'] && $_FILES['csv_htmls']['name'])
       {
         $filename1 = explode(".", $_FILES['csv_chapters']['name']);
         $filename2 = explode(".", $_FILES['csv_videos']['name']);
         $filename3 = explode(".", $_FILES['csv_problems']['name']);
         $filename4 = explode(".", $_FILES['csv_discussions']['name']);
         $filename5 = explode(".", $_FILES['csv_htmls']['name']);

         if(end($filename1) == "csv" && end($filename2) == "csv" && end($filename3) == "csv" && end($filename3) == "csv" && end($filename4) == "csv")
          {

            $handle1 = fopen($_FILES['csv_chapters']['tmp_name'], "r");
            $flag1 = true;

            while($data1 = fgetcsv($handle1))
            {
              if($flag1) { $flag1 = false; continue; }

                  $chapter_name = $data1[0];
                  $chapter_indx = $data1[1];
     
           
              $sql_chapters = "INSERT INTO chapters(chapter_name, indx, course_id) "."VALUES ('$chapter_name','$chapter_indx', '$courseID');";

               if($mysqli->query($sql_chapters))
               {
                  // echo "Chapters table is updated!";
                  $chaptersUpdated = true;
               }
     
        }
         fclose($handle1);

         $handle2 = fopen($_FILES['csv_videos']['tmp_name'], "r");
            $flag2 = true;
            while($data2 = fgetcsv($handle2))
            {
              if($flag2) { $flag2 = false; continue; }

              $video_name = $data2[0];
              $video_length = $data2[1];
              $video_indx = $data2[2];

              $sql_videos = "INSERT INTO videos(video_name, video_length, indx, course_id) "."VALUES ('$video_name', '$video_length', '$video_indx', '$courseID');";
               if($mysqli->query($sql_videos))
               {
                  // echo "Videos table is updated!";
                  $videosUpdated = true;
               }
            
        }
         fclose($handle2);

         $handle3 = fopen($_FILES['csv_problems']['tmp_name'], "r");
            $flag3 = true;
            while($data3 = fgetcsv($handle3))
            {
              if($flag3) { $flag3 = false; continue; }
              $problem_name = $data3[0];
              $problem_type = $data3[1];
              $problem_indx = $data3[2];

              $sql_problems = "INSERT INTO problems(problem_name, problem_type, indx, course_id) "."VALUES ('$problem_name', '$problem_type', '$problem_indx', '$courseID');";
               if($mysqli->query($sql_problems))
               {
                  // echo "Problems table is updated!";
                  $problemsUpdated = true;
               }

        }
         fclose($handle3);

         $handle4 = fopen($_FILES['csv_discussions']['tmp_name'], "r");
            $flag4 = true;

            while($data4 = fgetcsv($handle4))
            {
              if($flag4) { $flag4 = false; continue; }
              $discussion_name = $data4[0];
              $discussion_indx = $data4[1];

              $sql_discussions = "INSERT INTO discussions(discussion_name, indx, course_id) "."VALUES ('$discussion_name', '$discussion_indx', '$courseID');";

               if($mysqli->query($sql_discussions))
               {
                  // echo "Discussions table is updated!";
                  $discussionsUpdated = true;
               }

        }
         fclose($handle4);

         $handle5 = fopen($_FILES['csv_htmls']['tmp_name'], "r");
            $flag5 = true;

            while($data5 = fgetcsv($handle5))
            {
              if($flag5) { $flag5 = false; continue; }

                $html_name = $data5[0];
                $html_length = $data5[1];
                $html_type = $data5[2];
                $has_pdf = $data5[3];
                $pdf_pages = $data5[4];
                $html_indx = $data5[5];

              $sql_htmls = "INSERT INTO htmls(html_name, html_length, html_type, has_pdf, pdf_pages, indx, course_id) "."VALUES ('$html_name', '$html_length', '$html_type', '$has_pdf', '$pdf_pages', '$html_indx', '$courseID');";

               if($mysqli->query($sql_htmls))
               {
                  // echo "Htmls table is updated!";
                  $htmlsUpdated = true;
               }
            
        }
         fclose($handle5);
      }
     
    } 
      if($chaptersUpdated == true && $videosUpdated == true && $problemsUpdated == true && $discussionsUpdated == true && $htmlsUpdated == true)
      {
        $updateQuery = "UPDATE courses SET isUpdated='1' WHERE course_id='$courseID';";
        $mysqli->query($updateQuery);       
      }    
      header("location: courseDash.php"); 
  }
  // if(isset($_GET["updation"]))
  // {
  //    $message = '<label class="text-success">Product Updation Done</label>';
  // }



?>