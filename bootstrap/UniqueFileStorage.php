<?php 
namespace Core;
use Core\SweetAlert;
class UniqueFileStorage{
    private $directory;
    private $maxFileSize;
    private $allowedTypes;
    public function __construct($directory,$maxFileSize=5000000,$allowedTypes=['jpeg','jpg','png'])
    {
        $this->directory = $directory;
        $this->maxFileSize = $maxFileSize;
        $this->allowedTypes = $allowedTypes;
    }
    private function validateFileSize($file)
    {
        if ($file['size'] > $this->maxFileSize) {
            return false;
        }
        return true;
    }
    private function validateFileTypes($file)
    {
         // Check file type
         $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
         if (!in_array($fileType, $this->allowedTypes)) {
             return false;
         }
         return true;
    }
    private function validateImage($file)
    {
        if (getimagesize($file['tmp_name']) === false) {
            return false;
        }
        return true;
    }
    public function saveFile($file,$url)
    {
        if($this->validateFileSize($file) == false)
        {
            return SweetAlert::redirect_Message('Oops','File size must be less than 5 MB.','error',$url);
        }
        elseif($this->validateFileTypes($file) == false)
        {
            return SweetAlert::redirect_Message('Oops','File type must be one of jpg, jpeg and png','error',$url);
        }
        elseif($this->validateImage($file) == false)
        {
            return SweetAlert::redirect_Message('Oops','Image is invalid','error',$url);
        }
        $name = uniqid() . '-' . $file['name'];
        $target = $this->directory . '/' . $name;
        if(!move_uploaded_file($file['tmp_name'], $target))
        {
            return SweetAlert::redirect_Message('Oops','Something wrong in uploading image.','error',$url);
        }
        return $name;
    }
}