<?php 
namespace App\Controllers\Admin;

use App\Controllers\Admin\Repository\ManageRepository;
use App\Models\Room;
use Core\Auth;
use Core\DatabaseConnection;
use Core\SweetAlert;
use Core\UniqueFileStorage;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class RoomController implements ManageRepository{
    private $dbc;
    private $directory = '../public/storage/rooms/';
    private $Room;
    private $logger;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        $this->Room = new Room($this->dbc);
        $this->logger = new Logger('logging');
        $this->logger->pushHandler(new StreamHandler('../log/log',Level::Warning));
    }
    public function index()
    {
        $auth = Auth::auth();
        if($auth == true)
        {
            $find['deleted_at'] = 0;
            $condition['deleted_at'] = '=';
            $Rooms = $this->Room->find($find,$condition);
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
            $Room = $this->Room->setValues($record);
            if($Room->save() == true)
            {
                $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has updated '. $record['room_type']);
                return SweetAlert::redirect_Message('Success','Room created successfully','success','rooms');
            }
            return SweetAlert::redirect_Message('Oops','Something Wrong','error','rooms');
        }
    }
    public function updateImage()
    {
        $UniqueFileStorage = new UniqueFileStorage($this->directory);
        $uploadFile = $UniqueFileStorage->saveFile($_FILES['image'],'rooms');
        if(!empty($uploadFile))
        {
            unlink($this->directory. $_POST['old_image']);
            $record['image'] = $uploadFile;
            $this->Room->findBy('id',$_POST['iroom_id'],'=');
            $this->Room->setValues($record);
            if($this->Room->update() == true)
            {
                return SweetAlert::redirect_Message('Success','Update Image Successfully','success','rooms');
            }
            return SweetAlert::redirect_Message('Oops','Something Wrong','error','rooms');
        }
    }
    public function update()
    {
        $this->Room->findBy('id',$_POST['uroom_id'],'=');
        $this->Room->setValues($_POST);
        if($this->Room->update() == true)
        {
            $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has updated '. $_POST['room_type']);
           return SweetAlert::redirect_Message('Success','Updated Successfully','success','rooms');
        }
    }
    public function delete()
    {
        $this->Room->findBy('id',$_POST['droom_id'],'=');
        $updated_data['deleted_at'] = 1; 
        $this->Room->setValues($updated_data);
        if($this->Room->update() == true)
        {
            $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has deleted Room ID '. $_POST['droom_id']);
            return SweetAlert::redirect_Message('Success','Deleted Successfully','success','rooms');
        }
    }
    
}
