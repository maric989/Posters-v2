<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class ImageUploader extends Model
{
    public $name;

    private $image;

    private $destinationPath;

    public function __construct($file)
    {
        $this->name = Carbon::now().'.'.$file->getClientOriginalExtension();
        $this->image = $file;
        $this->setDestinationPath();
    }

    public function store()
    {
        return $this->image->move($this->getDestinationPath(),$this->name);
    }

    private function setDestinationPath()
    {
        return $this->destinationPath = public_path('/images');
    }

    public function getDestinationPath()
    {
        return $this->destinationPath;
    }

    private function getImage()
    {
        $path = $this->getDestinationPath().'/'.$this->name;
        $image = File::get($path);
        return $image;
    }

    public function resizeImage($width,$height)
    {
        return Image::make($this->getImage())->resize($width,$height)->save($this->destinationPath.'/testtest.jpg');

    }

    public function addTextOnImage($text)
    {
        return Image::make($this->getImage())->text($text,120,100)->save($this->destinationPath.'/testtest2222.jpg');
    }

}
