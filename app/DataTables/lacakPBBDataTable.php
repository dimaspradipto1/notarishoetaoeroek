<?php

namespace App\DataTables;

use App\Models\lacakPBB;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class lacakPBBDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        if(auth()->user()->roles == 'ADMIN'){
            $query = lacakPBB::with(['user', 'pbb']);
        }

        if(auth()->user()->roles == 'USER'){
            $query = lacakPBB::where('users_id', auth()->user()->id)->orderBy('created_at', 'desc');
        }

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('created_at', function($lacakPBB){
                return $lacakPBB->created_at->format('d-m-Y');
            })
            ->addColumn('keterangan', function($lacakPBB){
                return $lacakPBB->keterangan;
            })
            ->addColumn('pbbs_id', function($lacakPBB){
                return $lacakPBB->pbb->nama_pemilik;
            })
            ->addColumn('action', function($pbb){
                if(auth()->user()->roles == 'ADMIN'){

                
                return '
                    <a href="'.route('lacak-pbb.edit', $pbb->id).'" class="btn btn-sm btn-warning text-white px-3 mb-3"><i class="fa-solid fa-pencil"></i> Edit</a>

                    <form action="'.route('lacak-pbb.destroy', $pbb->id).'" method="POST" class="d-inline">
                    '.method_field('delete').'
                    '.csrf_field().'
                    <button type="submit" class="btn btn-sm btn-danger px-3 mb-3" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini? \')"><i class="fa-solid fa-trash"></i> Delete</button>
                    ';
                }
            })
            ->rawColumns(['action', 'pbbs_id', 'created_at', 'keterangan'])
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(lacakPBB $model): QueryBuilder
    {
        return $model->newQuery()->with(['user', 'pbb']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('lacakpbb-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        $columns = [
            Column::make('DT_RowIndex')->title('No'),
            Column::make('created_at')->title('Tanggal'),
            Column::make('pbbs_id')->title('Nama Pemohon'),
            Column::make('keterangan')->title('Keterangan'),
        ];

        if(auth()->user()->roles == 'ADMIN')
            $columns[] = Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->title('Action')
                ->addClass('text-center');

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'lacakPBB_' . date('YmdHis');
    }
}
