<?php
  session_start();
  require('connect.php');

  function deleteDirectory($dir) {
    system('rm -rf ' . escapeshellarg($dir), $retval);
    return $retval == 0; // UNIX commands return zero on success
  }

  $taskTitle = $_GET['test'];

  $query = "SELECT * FROM `finished_images` WHERE tasktitle='$taskTitle'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);

  $CSVanswer = array();
  $index = 0;

  while($row = $result->fetch_assoc()) {
    $CSVanswer[$index] = $row['IMAGE_NAME'] . "," . $row['ANSWER'];
    $index += 1;
  }

  $file = fopen("../temp/" . $taskTitle . ".csv","w");
  fputcsv($file, array('IMAGE NAME', 'ANSWER'));

  foreach ($CSVanswer as $line)
    {
    fputcsv($file,explode(',',$line));
    }

  fclose($file);

  $directory = '../temp/' . $taskTitle . '.csv';
  
  if (file_exists($directory)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'.basename($directory).'"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($directory));
      readfile($directory);
      $target_dir = "/opt/lampp/htdocs/DIPWebsite/dashboard/develop/temp/" . $taskTitle . ".csv";
      deleteDirectory($target_dir);
      exit;
  }
?>