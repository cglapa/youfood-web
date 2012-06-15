<?php 

$return = array('status' => $status);
if($status == 'nok')
    $return['moreinfo'] = $moreInfo;

echo json_encode($return);
?>