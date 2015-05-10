<?php namespace App\Services\Modules\Users;
use Illuminate\Support\Facades\Validator;

class Registrar {
    public static function testMongo () {
        $mongo = new \MongoClient();

        $db = $mongo->selectDB("test");

        $usersCollection = $db->selectCollection("users");

        $cursor = $usersCollection->find();

        while($cursor->hasNext()) {
            $user = $cursor->getNext();
        }
    }

    public function register($userDocument) {

        $mongo = new \MongoClient();

        $db = $mongo->selectDB("player_life");

        $usersCollection = $db->selectCollection("users");

        var_dump($userDocument);

        return $usersCollection->insert($userDocument);

    }

}
