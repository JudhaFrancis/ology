<?php

namespace App\Models\Event;

use CodeIgniter\Model;

class EventModel extends Model
{
    public function __construct()
    {
        helper('Core\Helpers\File');
    }
    protected $table      = 'event';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Domain\Event\Event';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['event_type', 'category_fk_id'];
    protected $useTimestamps = false;
    protected $allowCallbacks = true;

}
