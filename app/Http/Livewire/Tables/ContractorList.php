<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\AdminComponent;
use App\Models\Employee;

class ContractorList extends AdminComponent
{
    public function render()
    {
        $contractors = Employee::query()
            ->when($this->search, function ($query) {
                $query
                    ->where('username', $this->search)
                    ->orWhere('name', $this->search)
                    ->orWhere('email', $this->search);
            })
            ->where('contractors', 1)
            ->paginate();

        return view('livewire.tables.contractor-list', [
            'contractors' => $contractors
        ]);
    }
}
