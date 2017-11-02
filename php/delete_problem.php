<?php

$target_dir = "//opt/lampp/htdocs/test/zip_file";
// IF THE DIRECTORY CREATED NEED PERMISSION, DELETE THE FILE USING THIS FUNCTION

function deleteDirectory($dir) {
    system('rm -rf ' . escapeshellarg($dir), $retval);
    return $retval == 0; // UNIX commands return zero on success
}
deleteDirectory($target_dir);
echo "Deleted yeay";

?>