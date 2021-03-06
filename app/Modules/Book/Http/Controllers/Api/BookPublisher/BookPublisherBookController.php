<?php

namespace App\Modules\Book\Http\Controllers\Api\BookPublisher;

use App\Http\Controllers\ApiController;
use App\Modules\Book\Models\BookPublisher;

class BookPublisherBookController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(BookPublisher $record)
    {
        return $this->showAll($record->books);
    }
}
