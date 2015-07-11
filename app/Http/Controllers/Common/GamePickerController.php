<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\lib\Rest\Rest;
use App\Services\Common\GamePicker;

class GamePickerController extends Controller {

    private $gamePickerService;

    public function __construct(GamePicker $gamePicker) {
        $this->gamePickerService = $gamePicker;
    }

    public function getFetchAllGames() {
        return Rest::resolve($this->gamePickerService->fetchAllGames());
    }
}