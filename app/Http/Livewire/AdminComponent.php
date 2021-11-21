<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class AdminComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 9;
    public $page = 1;
    public $pageName = 'page';
    public $menu = 'INBOX';

    protected $queryString = [
        'page' => ['except' => 1],
    ];

    public function updatedMenu()
    {
        $this->resetPage();
    }
}
