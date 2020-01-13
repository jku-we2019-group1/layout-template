<?php


namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;

class DataController extends Controller
{
    private $_path = '../storage/json';

    public function getCompetences($userid)
    {
        return $this->readFile('user_' . $userid . '_competencies');
    }

    public function getUser($value, $key = 'id')
    {
        if (!$data = $this->readJson('Users')) {
            return null;
        }
        foreach ($data as $item) {
            if ($item[$key] == $value) {
                return $item;
            }
        }
        return null;
    }


    private function readJson($name, $assoc = true)
    {
        return json_decode($this->readFile($name, 'json'), $assoc);
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
