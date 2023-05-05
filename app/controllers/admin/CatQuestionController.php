<?php 
namespace App\Controllers\Admin;

use App\Controllers\Admin\Repository\ManageRepository;
use App\Models\CatQuestion;
use Core\Auth;
use Core\SweetAlert;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class CatQuestionController implements ManageRepository{
    private $dbc;
    private $CatQuestions;
    private $logger;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        $this->CatQuestions = new CatQuestion($this->dbc);
        $this->logger = new Logger('logging');
        $this->logger->pushHandler(new StreamHandler('../log/log',Level::Warning));
    }
    public function index()
    {
        $auth = Auth::auth();
        if($auth == true)
        {
    
            $CatQuestions = $this->CatQuestions->findAll();
            return view('admin.cat_questions',compact('CatQuestions'));
        }

    }
    public function save()
    {

        $CatQuestions = $this->CatQuestions->setValues($_POST);
        if($CatQuestions->save() == true)
        {
            $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has added '. $_POST['question_text']);
            return SweetAlert::redirect_Message('success','Saved Successfully','success','cat-questions');
        }
    }
    public function update()
    {

        $CatQuestions = $this->CatQuestions->findBy('id',$_POST['question_id'],'=');
        $CatQuestions = $CatQuestions->setValues($_POST);
        if($CatQuestions->update() == true)
        {
            $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has updated '. $_POST['question_text']);
            return SweetAlert::redirect_Message('success','Updated Successfully','success','cat-questions');
        }
    }
    public function delete()
    {

        $this->CatQuestions->setValues(['id' => $_POST['dquestion_id']]);
        $finding['id'] = $_POST['dquestion_id'];
        $condition['id'] = '=';
        if($this->CatQuestions->delete($finding,$condition) == true)
        {
            $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has added '. $_POST['dquestion_id']);
            return SweetAlert::redirect_Message('success','Deleted Successfully','success','cat-questions');
        } 
    }
}