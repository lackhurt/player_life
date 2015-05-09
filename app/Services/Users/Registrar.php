<?php namespace App\Services\Users;
class Registrar {
    public function testMongo () {
        $mongo = new \MongoClient();

        $db = $mongo->selectDB("test");

        $usersCollection = $db->selectCollection("users");

        $cursor = $usersCollection->find();

        while($cursor->hasNext()) {
            $user = $cursor->getNext();
        }

    }
}
