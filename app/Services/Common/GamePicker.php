<?php

namespace App\Services\Common;


class GamePicker {
    public function fetchAllGames() {
        $content = file_get_contents(__DIR__ . '/../../../resources/constants/games.json');
        $games = json_decode($content);

        return $games;
    }
}