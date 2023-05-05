<?php 
namespace App\Controllers\Admin\Repository;

Interface ManageRepository{
    public function index();
    public function save();
    public function update();
    public function delete();
}
