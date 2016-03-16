<!DOCTYPE html>
<html>
<body>
<?php
$yt_search = 'Godzilla trailer 2014';
$yt_source = file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&order=relevance&q='.urlencode($yt_search).'&key=AIzaSyDyV_C_n9gYHT0y2Bulb2C3Fym2KM90o00');
$yt_decode = json_decode($yt_source, true);
if ($yt_decode['pageInfo']['totalResults']>0) {
    if (strlen($yt_decode['items'][0]['id']['videoId'])>5) {
        $yt_videoid = trim($yt_decode['items'][0]['id']['videoId']);
        //echo $yt_videoid;
    }
}
echo "<br>";
echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.urlencode($yt_videoid). '" frameborder="0" allowfullscreen></iframe>';
echo "<br>";
echo "<p id='demo'></p>";
?>
</body>
</html>
