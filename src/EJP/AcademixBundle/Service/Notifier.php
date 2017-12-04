<?php
/**
 * Created by PhpStorm.
 * User: SaddeM
 * Date: 26/11/2017
 * Time: 16:50
 */

namespace EJP\AcademixBundle\Service;


class Notifier
{
    public static function sanctionNotifier($apiKey,$registrationId,$cause){

        define( 'API_ACCESS_KEY', $apiKey );
        $registrationIds = $registrationId;
#prep the bundle
        $msg = array
        (
            'body' 	=> $cause,
            'title'	=> 'New sanction',
            'icon'	=> 'default',/*Default Icon*/
            'sound' => 'default'/*Default sound*/
        );
        $fields = array
        (
            'to'		=> $registrationIds,
            'notification'	=> $msg
        );


        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
#Echo Result Of FireBase Server
        return $result;

    }

}