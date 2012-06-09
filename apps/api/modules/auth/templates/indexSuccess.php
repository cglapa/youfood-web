<?php

$return = array('status' => $status);
if($status == 'nok')
    $return['moreinfo'] = $moreinfo;

echo json_encode($return);
?>