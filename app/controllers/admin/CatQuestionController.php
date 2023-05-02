<?php 
namespace App\Controllers\Admin;

use App\Models\CatQuestion;
use Core\Auth;
use Core\SweetAlert;

class CatQuestionController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        $auth = Auth::auth();
        if($auth == true)
        {
            $CatQuestions = new CatQuestion($this->dbc);
            $CatQuestions = $CatQuestions->findAll();
            return view('admin.cat_questions',compact('CatQuestions'));
        }

    }
    public function save()
    {
        $CatQuestions = new CatQuestion($this->dbc);
        $CatQuestions = $CatQuestions->setValues($_POST);
        if($CatQuestions->save() == true)
        {
            return SweetAlert::redirect_Message('success','Saved Successfully','success','cat-questions');
        }
    }
    public function update()
    {
        $CatQuestions = new CatQuestion($this->dbc);
        $CatQuestions = $CatQuestions->findBy('id',$_POST['question_id'],'=');
        $CatQuestions = $CatQuestions->setValues($_POST);
        if($CatQuestions->update() == true)
        {
            return SweetAlert::redirect_Message('success','Updated Successfully','success','cat-questions');
        }
    }
    public function delete()
    {
        $CatQuestions = new CatQuestion($this->dbc);
        $CatQuestions->setValues(['id' => $_POST['dquestion_id']]);
        if($CatQuestions->delete() == true)
        {
            return SweetAlert::redirect_Message('success','Deleted Successfully','success','cat-questions');
        } 
    }
}