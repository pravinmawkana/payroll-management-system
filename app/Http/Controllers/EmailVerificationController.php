<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verifyEmail($email)
    {
        echo $email . "<br/>";
        // Extract the domain from the email address
        $domain = substr(strrchr($email, "@"), 1);
        echo $domain . "<br/>";
        // Get the MX records for the domain
        $mx_records = dns_get_record($domain, DNS_MX);
        echo " mx records print" . "<br />";
        echo "<pre>";
        var_dump($mx_records);
        echo "</pre>";
        if (!$mx_records) {
            echo "<br/> No MX records found<br>";
            return false;
        }

        // Get the host name of the first MX record
        $mx_host = $mx_records[0]['target'];

        echo "<br/> selected Mx record " . $mx_host . "<br/>";
        // Set the cURL options
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'telnet://' . $mx_host . ':25');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        // Send the EHLO command
        $request = "EHLO $domain\r\n";
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request);
        $response = curl_exec($ch);
        echo "ehlo response <br/>";
        var_dump($response);
        // Send the MAIL FROM command
        $request = "MAIL FROM:<$email>\r\n";
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request);
        $response = curl_exec($ch);
        echo "<br/> email to resonse";
        var_dump($response);
        // Send the RCPT TO command
        $request = "RCPT TO:<$email>\r\n";
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request);
        $response = curl_exec($ch);
        echo "<br/> RCPT response";
        var_dump($response);
        // Close the cURL handle
        curl_close($ch);

        // If the response contains the string "250", the email address is valid
        return strpos($response, "250") !== false;
    }

    public function verifyEmail2($email)
    {
        // Extract the domain from the email address
        $domain = substr(strrchr($email, "@"), 1);
        echo $domain . "<br/>";
        //check port 80 response
        echo "checking 80 response";
        $this->checkHTTPResponse($domain, 80);
        // Get the MX records for the domain
        $mx_records = dns_get_record($domain, DNS_MX);

        if (!$mx_records) {
            echo "no mx records found <br/>";
            return false;
        }
        echo "MX record found <br/>";

        // Sort the MX records by priority
        usort($mx_records, function ($a, $b) {
            return $a["pri"] - $b["pri"];
        });

        // Try to connect to the mail server
        $mx_host = $mx_records[0]['target'];
        echo "MX_HOST : " . $mx_host . "<br/>";

        $this->checkHTTPResponse($mx_host, 25);
        // $mx_socket = fsockopen($mx_host, 25, $errno, $errstr, 30);
        // $mx_socket = fsockopen($mx_host, 587, $errno, $errstr, 30);

        // echo "errorno" . $errno . ' errmsg : ' . $errstr;
        // if (!$mx_socket) {
        //     echo "no MX_socket response <br/>";
        //     return false;
        // }
        return;
        $mx_socket = fsockopen($mx_host, 25, $errno, $errstr, 30);

        if (!$mx_socket) {
            echo "Error: Failed to connect to the mail server: $errstr ($errno)";
            return false;
        }

        // Connection successful, continue with sending email commands

        echo "MX_socket response :<br/>";
        var_dump($mx_socket);

        // Send the HELO command
        fwrite($mx_socket, "HELO yourdomain.com\r\n");
        $response = fgets($mx_socket);
        if (substr($response, 0, 3) != "250") {
            return false;
        }

        // Send the MAIL FROM command
        fwrite($mx_socket, "MAIL FROM: <you@yourdomain.com>\r\n");
        $response = fgets($mx_socket);
        if (substr($response, 0, 3) != "250") {
            return false;
        }

        // Send the RCPT TO command
        fwrite($mx_socket, "RCPT TO: <$email>\r\n");
        $response = fgets($mx_socket);
        if (substr($response, 0, 3) != "250") {
            return false;
        }

        // Close the connection to the mail server
        fclose($mx_socket);

        return true;
    }
    public function checkHTTPResponse($host, $port)
    {
        // $host = 'example.com';
        // $port = 80;

        $socket = fsockopen($host, $port, $errno, $errstr, 10);

        if (!$socket) {
            echo "Error: $errno - $errstr";
        } else {
            // Send a message to the server
            $message = "GET / HTTP/1.1\r\n";
            $message .= "Host: $host\r\n";
            $message .= "Connection: close\r\n\r\n";

            fwrite($socket, $message);

            // Read the response from the server
            $response = '';
            while (!feof($socket)) {
                $response .= fgets($socket, 1024);
            }

            // Close the connection
            fclose($socket);

            // Output the response from the server
            echo $response;
        }

    }
    public function verifyEmail1($email)
    {
        // dd($email);
        // Extract the domain from the email address
        $domain = substr(strrchr($email, "@"), 1);
        echo $domain . "<br/>";
        // Get the MX records for the domain
        $mx_records = dns_get_record($domain, DNS_MX);

        if (!$mx_records) {
            echo "no mx records found <br/>";
            return false;
        }
        echo "MX record found <br/>";

        $mxRecords = dns_get_record($domain, DNS_MX);

        foreach ($mxRecords as $mx) {
            echo 'MX Record: ' . $mx['target'] . ' (priority ' . $mx['pri'] . ') <br/>' . PHP_EOL;
        }
        // Try to connect to the mail server
        $mx_host = $mx_records[0]['target'];
        echo "MX_HOST : " . $mx_host . "<br/>";

        // $mxRecords = dns_get_record($domain, DNS_MX);
        $lowestPriority = PHP_INT_MAX;
        $selectedRecord = null;

        foreach ($mxRecords as $mxRecord) {
            if ($mxRecord['type'] === 'MX' && isset($mxRecord['target'], $mxRecord['pri'])) {
                $priority = $mxRecord['pri'];
                if ($priority < $lowestPriority) {
                    $lowestPriority = $priority;
                    $selectedRecord = $mxRecord['target'];
                }
            }
        }
        echo "Selected Record for mx_socket " . $selectedRecord . "<br/>";
        // $selectedRecord now contains the hostname of the selected MX record


        $mx_socket = fsockopen($selectedRecord, 25, $errno, $errstr, 10);


        if (!$mx_socket) {
            echo " no MX_socket response <br/>";
            return false;
        }
        echo "MX_socket response :<br/>";
        var_dump($mx_socket);
        // return;
        // Send the HELO command
        fwrite($mx_socket, "HELO yourdomain.com\r\n");
        $response = fgets($mx_socket);
        if (substr($response, 0, 3) != "250") {
            return false;
        }

        // Send the MAIL FROM command
        fwrite($mx_socket, "MAIL FROM: <you@yourdomain.com>\r\n");
        $response = fgets($mx_socket);
        if (substr($response, 0, 3) != "250") {
            return false;
        }

        // Send the RCPT TO command
        fwrite($mx_socket, "RCPT TO: <$email>\r\n");
        $response = fgets($mx_socket);
        if (substr($response, 0, 3) != "250") {
            return false;
        }

        // Close the connection to the mail server
        fclose($mx_socket);

        return true;
    }

}
