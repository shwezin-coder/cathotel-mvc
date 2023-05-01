<?php 
namespace App\Controllers\Admin;

use App\Models\Room;
use Core\Auth;
use Core\SweetAlert;
use Core\UniqueFileStorage;

class RoomController{
    private $dbc;
    private $directory = '../public/storage/rooms/';
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        $auth = Auth::auth();
        if($auth == true)
        {
            $find['deleted_at'] = 0;
            $condition['deleted_at'] = '=';
            $Rooms = new Room($this->dbc);
            $Rooms = $Rooms->find($find,$condition);
            return view('admin.rooms',compact('Rooms'));
        }

    }
    public function save()
    {
        $UniqueFileStorage = new UniqueFileStorage($this->directory);
        $uploadFile = $UniqueFileStorage->saveFile($_FILES['image'],'rooms');
        if(!empty($uploadFile))
        {
            $record['image'] = $uploadFile;
            $record['room_type'] = $_POST['room_type'];
            $record['noofrooms'] = $_POST['noofrooms'];
            $record['price'] = $_POST['price'];
            $record['specification'] = $_POST['specification'];
            $record['deleted_at'] = 0;
            $Room = new Room($this->dbc);
            $Room = $Room->setValues($record);
            if($Room->save() == true)
            {
                return SweetAlert::redirect_Message('Success','Room created successfully','success','rooms');
            }
            return SweetAlert::redirect_Message('Oops','Something Wrong','error','rooms');
        }
    }
    public function updateImage()
    {
        $Room = new Room($this->dbc);
        $UniqueFileStorage = new UniqueFileStorage($this->directory);
        $uploadFile = $UniqueFileStorage->saveFile($_FILES['image'],'rooms');
        if(!empty($uploadFile))
        {
            unlink($this->directory. $_POST['old_image']);
            $record['image'] = $uploadFile;
            $Room->findBy('id',$_POST['iroom_id'],'=');
            $Room->setValues($record);
            if($Room->update() == true)
            {
                return SweetAlert::redirect_Message('Success','Update Image Successfully','success','rooms');
            }
            return SweetAlert::redirect_Message('Oops','Something Wrong','error','rooms');
        }
    }
    public function update()
    {
        $Room = new Room($this->dbc);
        $Room->findBy('id',$_POST['uroom_id'],'=');
        $Room->setValues($_POST);
        if($Room->update() == true)
        {
           return SweetAlert::redirect_Message('Success','Updated Successfully','success','rooms');
        }
    }
    public function delete()
    {
        $Room = new Room($this->dbc);
        $Room->findBy('id',$_POST['droom_id'],'=');
        $updated_data['deleted_at'] = 1; 
        $Room->setValues($updated_data);
        if($Room->update() == true)
        {
            return SweetAlert::redirect_Message('Success','Deleted Successfully','success','rooms');
        }
    }

}
