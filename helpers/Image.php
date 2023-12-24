<?php

namespace helpers;

class Image
{
    public $name;
    public $tmp_name;
    public $new_name;

    public function __construct($image)
    {
        $this->name = $image['name'];
        $this->tmp_name = $image['tmp_name'];

        $ext = pathinfo($this->name, PATHINFO_EXTENSION);
        $this->new_name = uniqid() . '.' . $ext;
    }
    public function upload($folder)
    {
        move_uploaded_file($this->tmp_name, $folder . '/' . $this->new_name);
    }
}
