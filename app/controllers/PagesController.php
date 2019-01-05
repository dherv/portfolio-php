<?php

namespace App\Controller;

use App\Core\App;
use App\Models\Skill;

class PagesController {

    public function home() {
        $message = 'Hello';

        return view('index', compact('message'));
    }

    public function skills() {
        $message = 'Skills';

        $skills = ['frontend', 'backend', 'devops'];
        
        return view('skills', compact('skills'));
    }

    public function type() {
        $message = 'Type';

        $skills = App::get('database')->selectAll('skills', "\App\Models\Skill");
        
        $type = htmlspecialchars($_GET['type']);
        
        return view('skill-type', compact('skills', 'type', 'message'));
    }

    public function contact() {
        return view('contact');
    }

    public function store() {
        // TODO: check if strip_tags htmlspecialchars should be used in POST or just in html
        Skill::create([
            'name' => strip_tags(htmlspecialchars($_POST['name'])),
            'level' => strip_tags(htmlspecialchars($_POST['level']))
        ]);
        return redirect('type?type=frontend');
    }

    public function destroy() {
        Skill::destroy([
            'id' => $_POST['delete']
        ]);
        return redirect("type");
    }
}