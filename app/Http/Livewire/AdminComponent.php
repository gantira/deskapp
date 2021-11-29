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
    public $search = '';

    protected $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => ''],
    ];

    public function updatedMenu()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
