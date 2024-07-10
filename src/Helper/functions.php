<?php

namespace Dp\Webshop\Helper;

function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function hashPassword(string $password): false|null|string {
	return password_hash($password, PASSWORD_ARGON2I);
}
function redirect(string $url, array $params = [], $status_code = 302) : void {
    $query = $params ? '?' . http_build_query($params) : '';
    header("Location: $url$query", $status_code);
    exit;
}
 function categorizeCartItems(array $session_cart, array $db_cart, string $user_uuid): array{
    $doubleEntries = [];
    $newEntries = [];

    foreach($session_cart as $item_session){
        $item_session['user_uuid'] = $user_uuid;
        $is_double = false;
        foreach($db_cart as $item_cart){
            if($item_session['articlenum'] === $item_cart['articlenum']){
                $item_session['anzahl'] += $item_cart['anzahl'];
                $doubleEntries[] = $item_session;
                $is_double = true;
            }
        }
        if(! $is_double){
            $newEntries[] = $item_session;
        }
    }
    return ['doubleEntries' => $doubleEntries, 'newEntries' => $newEntries];

}
