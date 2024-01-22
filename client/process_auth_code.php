<?php

require_once 'bootstrap.php';

if (empty($_GET['state']) || (isset($_SESSION['oauth2state']) && $_GET['state'] !== $_SESSION['oauth2state'])) {

    if (isset($_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
    }

    exit('Invalid state');

} else {

    try {

        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => urldecode($_GET['code']),
        ]);

        ?>
        <!DOCTYPE html>
            <html>
            <title>W3.CSS</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <body>
            <div class="w3-container">
        <h1>Access token information</h1>
        <table class="w3-table w3-striped">
            <tr>
                <th>Access token</th>
                <td><?php echo $accessToken->getToken(); ?></td>
            </tr>
            <tr>
                <th>Refresh Token</th>
                <td><?php echo $accessToken->getRefreshToken(); ?></td>
            </tr>
            <tr>
                <th>Expired in</th>
                <td><?php echo $accessToken->getExpires(); ?></td>
            </tr>
            <tr>
                <th>Already expired?</th>
                <td><?php echo ($accessToken->hasExpired() ? 'expired' : 'not expired') ?></td>
            </tr>
        </table>

        <?php
        ?>

        <h1>A resource only accessible via OAuth</h1>
        <section class="w3-container">
<?php
        $request = $provider->getAuthenticatedRequest(
            'GET',
            getenv('RESOURCE_SERVER_URL'),
            $accessToken
        );
        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->send($request);

        echo $response->getBody();
    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        exit($e->getMessage());
    }
    ?>
    </section>
    </div>
    </body>
</html>
<?php
}