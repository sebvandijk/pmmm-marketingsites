<?php
function mailchimpSubscribe()
{
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];

    // TODO: DEZE AANPASSEN
    $api_key = 'xxxx';
    $list_id = 'xxxx';

    $dc = substr($api_key, strpos($api_key, '-') + 1); // datacenter, it is the part of your api key - us5, us8 etc
    $args = array(
        'method' => 'PUT',
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode('user:' . $api_key)
        ),
        'body' => json_encode(array(
            'email_address' => $email,
            'merge_fields' => array(
                'FNAME' => $firstname,
            ),
            'status' => 'subscribed'
        ))
    );
    $response = wp_remote_post('https://' . substr($api_key, strpos($api_key, '-') + 1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($email)), $args);

    $body = json_decode($response['body']);

    if ($response['response']['code'] == 200 && $body->status == $status) {
        $return['message'] = 'Succes!';
    } else {
//		$return['tag'] = $tag;
        $return['message'] = $response['response']['code'] . $body->title . $body->detail;
        $return['response'] = $response['response'];
        $return['all_data'] = $body;
    }

    wp_send_json($return);
}

add_action('wp_ajax_mailchimpSubscribe', 'mailchimpSubscribe');
add_action('wp_ajax_nopriv_mailchimpSubscribe', 'mailchimpSubscribe');
