<?php
function logActivity($description)
{
    $db      = \Config\Database::connect();
    $log = array(
        'description' => $description,
        'date' => date('Y-m-d H:i:s')
    );

    if (is_login()) {
        $log['userid'] = get_user_id();
    } else {
        $log['userid'] = 'NLI';
    }

    $builder = $db->table('activitylog');
    $builder->insert($log);
}
