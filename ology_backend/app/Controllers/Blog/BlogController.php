<?php

namespace Core\Controllers\Blog;

use App\Domain\Blog\Blog;

use Core\Controllers\BaseController;
use Core\Controllers\DMLController;
use App\Infrastructure\Persistence\Blog\SQLBlogRepository;

use Core\Models\Utility\UtilityModel;   

class BlogController extends BaseController
{
    use DMLController;
    private $Blog_Repo;

    public function __construct()
    {
        helper('Core\Helpers\View');
        $this->initializeFunction();
        $this->Blog_Repo         = new SQLBlogRepository();
    }

    public function blog()
    {
        $Data = $this->Blog_Repo->findAll();
        return view('include/header') 
                . view('pages/blog', ['Data' => $Data]) 
                . view('include/footer');
    }

    public function blog_details($id)
    {
        $Data = $this->Blog_Repo->findById($id);
    
        return view('include/header') 
                . view('pages/blog_details', ['reqData' => $Data,]) 
                . view('include/footer');
    }

}
