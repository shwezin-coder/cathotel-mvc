<?php 
namespace App\Controllers\Admin;

use App\Models\FeatureImage;
use Core\Auth;
use Core\SweetAlert;
use Core\UniqueFileStorage;

class FeatureImageController{
    private $dbc;
    private $directory = '../public/storage/featureimages/';
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        $auth = Auth::auth();
        if($auth == true)
        {
            $find['room_id'] = $_GET['id'];
            $condition['room_id'] = '=';
            $FeatureImages = new FeatureImage($this->dbc);
            $FeatureImages = $FeatureImages->find($find,$condition);
            return view('admin.featureimages',compact('FeatureImages'));
        }

    }
    public function save()
    {
        $room_id = $_POST['room_id'];
        $UniqueFileStorage = new UniqueFileStorage($this->directory);
        $uploadFile = $UniqueFileStorage->saveFile($_FILES['image'],"featureimages?id=$room_id");
        if(!empty($uploadFile))
        {
            $record['image'] = $uploadFile;
            $record['room_id'] = $_POST['room_id'];
            $FeatureImage = new FeatureImage($this->dbc);
            $FeatureImage = $FeatureImage->setValues($record);
            if($FeatureImage->save() == true)
            {
                return SweetAlert::redirect_Message('Success','Feature image created successfully','success',"featureimages?id=$room_id");
            }
            return SweetAlert::redirect_Message('Oops','Something Wrong','error',"featureimages?id=$room_id");
        }
    }
    public function update()
    {
        $room_id = $_GET['id'];
        $FeatureImage = new FeatureImage($this->dbc);
        $UniqueFileStorage = new UniqueFileStorage($this->directory);
        $uploadFile = $UniqueFileStorage->saveFile($_FILES['image'],"featureimages?id=$room_id");
        if(!empty($uploadFile))
        {
            unlink($this->directory. $_POST['old_image']);
            $record['image'] = $uploadFile;
            $FeatureImage->findBy('id',$_POST['ufeatureimage_id'],'=');
            $FeatureImage->setValues($record);
            if($FeatureImage->update() == true)
            {
                return SweetAlert::redirect_Message('Success','Update Image Successfully','success',"featureimages?id=$room_id");
            }
            return SweetAlert::redirect_Message('Oops','Something Wrong','error',"featureimages?id=$room_id");
        }
    }
    public function delete()
    {
        $room_id = $_GET['id'];
        unlink($this->directory.$_POST['dimage']);
        $FeatureImage = new FeatureImage($this->dbc);
        $FeatureImage->setValues(['id' => $_POST['dfeatureimage_id']]);
        if($FeatureImage->delete() == true)
        {
            return SweetAlert::redirect_Message("Success","Delete Successfully","success","featureimages?id=$room_id");
        }
        return SweetAlert::redirect_Message("Error","Delete Successfully","error","featureimages?id=$room_id");
    }

}
