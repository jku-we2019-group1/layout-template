<?php


namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;

class DataController extends Controller
{
    private $_path = '../storage/json';

    public function getCompetences($userid)
    {
        return $this->readJson('userdata' . $userid);
    }

    function getUser($userid)
    {
        return $this->readJson('user' . $userid);
    }

    private function readJson($name)
    {
        return $this->readFile($name, 'json');
    }

    private function readFile($name, $fileEnding = 'json')
    {
        $filename = $this->_path . '/' . $name . '.' . $fileEnding;

        if (!file_exists($filename)) {
            return false;
        }
        $content = file_get_contents($filename);
        if (!$content) {
            return false;
        }
        return $content;
    }

}
