<?php
$s1 = $_GET['s1'];
$s2 = $_GET['s2'];
$port = $_GET['port'];
$password = $_GET['password'];

$str = <<<BEGIN
        {
                "configs" : [
                    {
                        "remarks" : "",
                        "server" : "$s1",
                        "server_port" : "$port",
                        "password" : "$password",
                        "method" : "aes-256-cfb",
                        "obfs" : "plain",
                        "obfsparam" : "",
                        "remarks_base64" : "",
                        "tcp_over_udp" : false,
                        "udp_over_tcp" : false,
                        "protocol" : "origin",
                        "obfs_udp" : false,
                        "enable" : true,
                        "id" : "0E-25-50-5D-4F-C9-27-22-E7-1E-09-77-15-81-93-17"
                    },
                    {
                        "remarks" : "",
                        "server" : "$s2",
                        "server_port" : "$port",
                        "password" : "$password",
                        "method" : "aes-256-cfb",
                        "obfs" : "plain",
                        "obfsparam" : "",
                        "remarks_base64" : "",
                        "tcp_over_udp" : false,
                        "udp_over_tcp" : false,
                        "protocol" : "origin",
                        "obfs_udp" : false,
                        "enable" : true,
                        "id" : "0D-D0-62-25-64-AB-E1-6E-70-58-D7-6A-2A-B8-2E-B3"
                    }
                ],
                "index" : 0,
                "random" : false,
                "global" : false,
                "enabled" : true,
                "shareOverLan" : false,
                "isDefault" : false,
                "localPort" : 1080,
                "pacUrl" : "http://127.0.0.1:1080/pac",
                "useOnlinePac" : false,
                "reconnectTimes" : 3,
                "randomAlgorithm" : 0,
                "TTL" : 0,
                "proxyEnable" : false,
                "proxyType" : 0,
                "proxyHost" : null,
                "proxyPort" : 0,
                "proxyAuthUser" : null,
                "proxyAuthPass" : null,
                "autoban" : false
            }
BEGIN;



        $filename = 'gui-config.json';
        header("Content-type: text/plain");
        header("Accept-Ranges: bytes");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0" );
        header("Pragma: no-cache" );
        header("Expires: 0" ); 
        exit($str);