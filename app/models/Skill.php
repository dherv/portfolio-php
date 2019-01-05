<?php 

namespace App\Models;

use App\Core\App;

class Skill {
    public $name;
    public $level;

    public static function create($parameters) {
        App::get('database')->insert('skills', $parameters);
    }

    public static function destroy($id) {
        App::get('database')->delete('skills', $id);
    }
}