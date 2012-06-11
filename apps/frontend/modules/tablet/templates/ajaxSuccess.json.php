<?php if($tablet_requests->count() > 0): ?>
<?php $nb = $tablet_requests->count(); $i = 0 ?>
{
    "tablet_request":
    [
    <?php foreach($tablet_requests as $tablet_request): ++$i; ?>
        {
                "android_id": <?php echo json_encode($tablet_request->getAndroidId()) ?>,
                "last_check": <?php echo json_encode($tablet_request->getLastCheck()) ?>,
                "is_new": "<?php echo json_encode($tablet_request->getIsNew()) ?>"
        
            }<?php echo $nb == $i ? '' : ',' ?>
            
    <?php endforeach; ?>
]
}
<?php endif; ?>