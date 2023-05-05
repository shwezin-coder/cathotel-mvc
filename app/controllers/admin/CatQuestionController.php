<?php 
namespace App\Controllers\Admin;

use App\Controllers\Admin\Repository\ManageRepository;
use App\Models\CatQuestion;
use Core\Auth;
use Core\SweetAlert;

class CatQuestionController implements ManageRepository{
    private $dbc;
    private $CatQuestions;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        $this->CatQuestions = new CatQuestion($this->dbc);
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
            return SweetAlert::redirect_Message('success','Saved Successfully','success','cat-questions');
        }
    }
    public function update()
    {

        $CatQuestions = $this->CatQuestions->findBy('id',$_POST['question_id'],'=');
        $CatQuestions = $CatQuestions->setValues($_POST);
        if($CatQuestions->update() == true)
        {
            return SweetAlert::redirect_Message('success','Updated Successfully','success','cat-questions');
        }
    }
    public function delete()
    {

        $this->CatQuestions->setValues(['id' => $_POST['dquestion_id']]);
        if($this->CatQuestions->delete() == true)
        {
            return SweetAlert::redirect_Message('success','Deleted Successfully','success','cat-questions');
        } 
    }
}