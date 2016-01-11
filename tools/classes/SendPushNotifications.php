<?php 
    //$APPLICATION_ID = "U11Nd69tf4McFif64gqo7weUE53fwPay4oUEwo44";
     $APPLICATION_ID = "IMZBljzXtiyHXcmbTZd824Nv8CzZI4x5ABEppIr1";

    // $REST_API_KEY = "d9uBF4xvZEcbpcTRwzbQIkQzbAVG9yGEbEaVyKgN";

    $REST_API_KEY = "CjRdDpb3Z5ePPKpJiIh53kW81Oo2GtYYsNFFTtvA";


    if(isset($_POST['message'])){
        $MESSAGE = $_POST['message'];
        $url = 'https://api.parse.com/1/push';
        $data = array(
            'where' => '{}',
            
            'expiry' => 1451606400,
            'data' => array(
                'alert' => $MESSAGE,
            ),
        );
        $_data = json_encode($data);
        $headers = array(
            'X-Parse-Application-Id: ' . $APPLICATION_ID,
            'X-Parse-REST-API-Key: ' . $REST_API_KEY,
            'Content-Type: application/json',
            'Content-Length: ' . strlen($_data),
        );

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_exec($curl);
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Notications</title>
</head>
<body>

    <?php 
/*
    if (isset($response)) {
        echo '<h2>Response from Parse API</h2>';
        echo '<pre>' . htmlspecialchars($response) . '</pre>';
        echo '<hr>';
    } elseif ($_POST) {
        echo '<h2>Error!</h2>';
        echo '<pre>';
        var_dump($APPLICATION_ID, $REST_API_KEY, $MESSAGE);
        echo '</pre>';
    } 
*/
        ?>

    <h2>Send Message to Parse API</h2>
    <form id="parse" action="SendPushNotifications.php" method="post" accept-encoding="UTF-8">
        <p>
            <label for="app">APPLICATION_ID</label>
            <input type="text" name="app" id="app" value="<?php echo htmlspecialchars($APPLICATION_ID); ?>">
        </p>
        <p>
            <label for="api">REST_API_KEY</label>
            <input type="text" name="api" id="api" value="<?php echo htmlspecialchars($REST_API_KEY); ?>">
        </p>
        <p>
            <label for="api">MESSAGE</label>
            <textarea name="message" id="message"></textarea>
        </p>
        <p>
            <input type="submit" value="send">
        </p>
    </form>
</body>
</html>