<?php
include_once 'APIFunkcije.php';
include_once dirname(__DIR__) . '/klase/modeli/ytVideo.php';

DEFINE('YTAPIKEY', 'AIzaSyDQRZwSJviqTeyMUmWXQv8_orH2hMi1XeQ');
DEFINE('Z10CHANNELID', 'UCdkbbtR6T0wZET5_WCI6ADg');
DEFINE('Z10TVCHANNELID', 'UCfahEFFOgfwQLtjABLI1ekA');
DEFINE('YTAPISEARCHMAXRESULTS', 20);

function getVideos($channelId, $maxResults, $pageToken, $publishedAfter) {
    $url = "https://youtube.googleapis.com/youtube/v3/search";
    $queryParams = array(
        "part" => "snippet",
        "channelId" => $channelId,
        "maxResults" => strval($maxResults),
        "pageToken" => $pageToken,
        "order" => "date",
        "publishedAfter" => $publishedAfter,
        "type" => "video",
        "key" => YTAPIKEY
    );

    return getRequest($url, $queryParams);
}

function getVideosFromAPI($channelId, $publishedAfter) {
    $ytVideos = array();
    $pageToken = '';

    do {
        $hasNextPage = false;
        $apiResponse = getVideos($channelId, YTAPISEARCHMAXRESULTS, $pageToken, $publishedAfter);

        foreach ($apiResponse->items as $searchResult) {
            $ytVideo = new YTVideo($searchResult->id->videoId, $searchResult->snippet->publishedAt, $searchResult->snippet->channelId);
            array_push($ytVideos, $ytVideo);
        }

        if (property_exists($apiResponse, 'nextPageToken')){
            $hasNextPage = true;
            $pageToken = $apiResponse->nextPageToken;
        }
    } while($hasNextPage);

    return $ytVideos;
}