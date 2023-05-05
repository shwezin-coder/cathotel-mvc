<?php
declare(strict_types=1);

use App\Models\Room;
use PHPUnit\Framework\TestCase;
use App\Models\User;
use Core\DatabaseConnection;

final class QueryTest extends TestCase
{
    public function testFindAll(): void
    {
        DatabaseConnection::connect('localhost','adorable_cat','root','');
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $User = new User($dbc);
        $result = $User->findAll();
        $this->assertEquals(8,count($result));
    }
    public function testFind() : void
    {
        DatabaseConnection::connect('localhost','adorable_cat','root','');
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $Room1 = new Room($dbc);
        $finding['id'] = 3;
        $condition['id'] = '=';
        $Room1 = $Room1->find($finding,$condition);
        foreach($Room1 as $Roomdata)
        {
            $name = $Roomdata->room_type;
        }
        $this->assertEquals('Delex Room2',$name);
    }
    public function testFindBy() : void
    {
        DatabaseConnection::connect('localhost','adorable_cat','root','');
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $Room2 = new Room($dbc);
        $Room2 = $Room2->findBy('id',3,'=');
        foreach($Room2 as $key => $value)
        {
            $name = '';
            if($key == 'room_type')
            {
                $name = $value;
                break;
            }
            
        }
        $this->assertEquals('Delex Room2',$name);
    }
    public function testcount()
    {
        DatabaseConnection::connect('localhost','adorable_cat','root','');
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $User = new User($dbc);
        $totalusers = $User->count('id',['deleted_at' => 0],['deleted_at' => '=']);
        $this->assertEquals(5,$totalusers);
    }
    public function testsum()
    {
        DatabaseConnection::connect('localhost','adorable_cat','root','');
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $Room = new Room($dbc);
        $totalrooms = $Room->sum('noofrooms',['deleted_at' => 0],['deleted_at' => '=']);
        $this->assertEquals(137,$totalrooms);
    }
    public function testsave()
    {
        DatabaseConnection::connect('localhost','adorable_cat','root','');
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $User = new User($dbc);
        $totalrooms = $User->setValues(['name'=>'testing','role' => 1, 'email' => 'testing@gmail.com', 'password' => password_hash('Testing123',PASSWORD_DEFAULT),'phone_number' => '09422715702','deleted_at' => 0]);
        $check = $User->save();
        $this->assertEquals(true,$check);
    }
    public function testupdate()
    {
        DatabaseConnection::connect('localhost','adorable_cat','root','');
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $User = new User($dbc);
        $User->findBy('id',21,'=');
        $totalrooms = $User->setValues(['name'=>'testing1']);
        $check = $User->update();
        $this->assertEquals(true,$check);
    }
    public function testdelete()
    {
        DatabaseConnection::connect('localhost','adorable_cat','root','');
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $User = new User($dbc);
        $finding['deleted_at'] = 0; 
        $condition['deleted_at'] = '!=';
        $check = $User->delete($finding,$condition);
        $this->assertEquals(true,$check);
    }
}
