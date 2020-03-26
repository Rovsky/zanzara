<?php

require "../../vendor/autoload.php";

use Amp\Http\Client\HttpClientBuilder;
use Amp\Http\Client\Request;
use Amp\Parallel\Sync\Channel;

return function (Channel $channel): Generator {

    $bot_key = yield $channel->receive(); //can receive data

    $method = "getUpdates";

    $params = [
        "offset" => 550495495,
        "limit" => 100000,
        "timeout" => 10000
    ];

    $client = HttpClientBuilder::buildDefault();

    $query = http_build_query($params);

    $url = "https://api.telegram.org/bot" . $bot_key . "/" . $method . "?" . $query;

    $request = new Request("$url", "POST");

    $response = yield $client->request($request);

    $channel->send(yield $response->getBody()->buffer());

    return "finito figlio";


};