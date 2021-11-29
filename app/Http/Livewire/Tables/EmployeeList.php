<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\AdminComponent;
use App\Models\Employee;

class EmployeeList extends AdminComponent
{
    public function render()
    {
        $employees = Employee::query()
            ->when($this->search, function ($query) {
                $query
                    ->where('username', $this->search)
                    ->orWhere('name', $this->search)
                    ->orWhere('email', $this->search);
            })
            ->where('contractors', 0)
            ->paginate();

        return view('livewire.tables.employee-list', [
            'employees' => $employees
        ]);
    }
}
