<?php
// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'Success';
            $statusMsg = 'Student data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'Error';
            $statusMsg = 'Error in updating grade. Try again.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
        }
      }
?>