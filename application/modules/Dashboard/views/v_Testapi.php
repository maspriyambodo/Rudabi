<!DOCTYPE html>
<!--
Product:        System of kementerian agama Republik Indonesia
License Type:   Government
Access Type:    Multi-User
License:        https://maspriyambodo.com
maspriyambodo@gmail.com

Thank you,
maspriyambodo
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $a = json_decode(read_file('http://10.1.99.90/rudabi_api/datapi/siihat/alat2020?KEY=BOBA'));
        print_r($a);
        ?>
    </body>
</html>
