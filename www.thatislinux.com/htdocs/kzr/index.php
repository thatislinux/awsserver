<?php
/* PUT data comes in on the stdin stream */
  $putdata = fopen("php://input", "r");
 
  $r = $_REQUEST["recording"];
  /* Open a file for writing */
  $fp = fopen("/tmp/$r", "w");
  /* Read the data 1 KB at a time and write to the file */
  while ($data = fread($putdata, 1024))
    fwrite($fp, $data);
 
  /* Close the streams */
  fclose($fp);
  fclose($putdata);
?>
