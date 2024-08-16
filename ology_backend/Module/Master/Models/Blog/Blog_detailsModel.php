<?php

namespace App\Models\Blog;

use CodeIgniter\Model;

class Blog_detailsModel extends Model
{
    public function __construct()
    {
        helper('Core\Helpers\File');
    }
    protected $table      = 'blog_details';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Domain\Blog\Blog_details';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['main_title','sub_title','main_heading','sub_heading', 'main_title_text', 'sub_title_text', 'main_heading_text', 'sub_heading_text', 'describtion'];
    protected $useTimestamps = false;
    protected $allowCallbacks = true;


}
