<?php
/*
Plugin Name: LoL Stat Tracker
Description: Un plugin pour récupérer les Stats
*/

require 'LolStatsTracker.php';

add_shortcode("lol_stats_tracker", "plugin_init");

function plugin_init(){
    ?>
    <h1>LoL Stats Tracker</h1>
    <form  method="post" action="">
        <input id="pseudo" type="text" name="pseudo">
        <select name="region">
            <option value="euw">EUW</option>
        </select>
        <input type="submit" value="bla">
    </form>
    <?php
    if(isset($_POST['pseudo']) && isset($_POST['region']) && $_POST['pseudo'] != ""){
        handle_post();
    }
}

function handle_post(){
    $ignoreErrorsContext = stream_context_create(['http' => ['ignore_errors' => true]]);
    $tracker = new LolStatsTracker($_POST['pseudo'], $_POST['region']);
    $tracker->setGame($tracker->getCurrentGame());
    if ($tracker->getGame() == 0) {
        include 'error.view.php';
    } else {
        include 'result.view.php';  
    }
}