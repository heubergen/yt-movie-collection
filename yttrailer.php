<!DOCTYPE html>
<html>
<body>
<?php
$movie = $_GET['name'];
$adding_yt = "trailer";
$yt_search = $movie." ".$adding_yt;
$yt_source = file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&order=relevance&q='.urlencode($yt_search).'&key=AIzaSyDyV_C_n9gYHT0y2Bulb2C3Fym2KM90o00');
$yt_decode = json_decode($yt_source, true);
if ($yt_decode['pageInfo']['totalResults']>0) {
    if (strlen($yt_decode['items'][0]['id']['videoId'])>5) {
        $yt_videoid = trim($yt_decode['items'][0]['id']['videoId']);
        //echo $yt_videoid;
    }
}
?>
<!-- Overlay -->
<div class="overlay" id="overlay" style="display:none;"></div>

<!-- Popup -->
<div class="popup" id="popup"
     style="display:none;">
  <div class="popup-inner">
    <input type="button" name="Close" class="s3-btn-close" onclick="popupClose();" value="&times;">
    <?php
    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.urlencode($yt_videoid). '" frameborder="0" allowfullscreen></iframe>';
    ?>
  </div>
</div>
<?php
echo "$yt_search";
 ?>
</body>
</html>
