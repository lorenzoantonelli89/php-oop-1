<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Movies {

    public $title;
    public $description;

    public function __construct($title, $description = null)
    {
        $this -> title = $title;

        if($description == null){
            $this -> description = 'La descrizione non è presente';
        }else {
            $this -> description = $description;
        }
    }

    public function getString(){
        return 'Movie:' . $this->title . '-->' . $this->description;
    }

    function randString($length, $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz')
    {
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count - 1)];
        }
        return $str;
    }

}

class JumbotronControllers extends Controller
{
    public function home(){

        $rndStr = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, error? Recusandae corrupti vero qui et magni sequi reprehenderit fugit deserunt veritatis blanditiis animi excepturi repellendus, culpa, velit dignissimos est at.';
        $movie1 = new Movies('Batman');
        $movie2 = new Movies('Iron Man', $rndStr);

        $movie1Str = $movie1 -> getString();
        $movie2Str = $movie2->getString(); 
        dd($movie1, $movie2, $movie1Str, $movie2Str);
    }
    
}
