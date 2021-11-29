<?php

namespace App\Http\Livewire\Tables;

use App\Exports\NeedApprovalExport;
use App\Http\Livewire\AdminComponent;
use App\Models\Contractor;
use Maatwebsite\Excel\Facades\Excel;

class ApprovalList extends AdminComponent
{
    public function export()
    {
        return Excel::download(new NeedApprovalExport, 'need_to_be_approved.xls');
    }

    public function render()
    {
        $approvals = Contractor::query()
            ->when($this->search, function ($query) {
                $query
                    ->where('username', $this->search)
                    ->orWhere('nama', $this->search);
            })
            ->where('status_approval', 1)
            ->orderBy('username', 'desc')
            ->paginate();

        return view('livewire.tables.approval-list', [
            'approvals' => $approvals
        ]);
    }
}
