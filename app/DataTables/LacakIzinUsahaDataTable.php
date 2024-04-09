<?php

namespace App\DataTables;

use App\Models\LacakIzinUsaha;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LacakIzinUsahaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('created_at', function($lacakIzinUsaha){
                return $lacakIzinUsaha->created_at->format('d-m-Y');
            })
            ->addColumn('keterangan', function($lacakIzinUsaha){
                return $lacakIzinUsaha->keterangan;
            })
            ->addColumn('izin_usahas_id', function($lacakIzinUsaha){
                return $lacakIzinUsaha->lacakizinusaha->nama_pemilik;
            })
            ->addColumn('action', function($lacakIzinUsaha){
                if(auth()->user()->roles == 'ADMIN'){

                return '
                    <a href="'.route('lacak-izin-usaha.edit', $lacakIzinUsaha->id).'" class="btn btn-sm btn-warning text-white px-3 mb-3"><i class="fa-solid fa-pencil"></i> Edit</a>

                    <form action="'.route('lacak-izin-usaha.destroy', $lacakIzinUsaha->id).'" method="POST" class="d-inline">
                    '.method_field('delete').'
                    '.csrf_field().'
                    <button type="submit" class="btn btn-sm btn-danger px-3 mb-3" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini? \')"><i class="fa-solid fa-trash"></i> Delete</button>
                    ';
                }
            })
            ->rawColumns(['action', 'izin_usahas_id', 'created_at', 'keterangan'])
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LacakIzinUsaha $model): QueryBuilder
    {
        return $model->newQuery()->with(['user', 'lacakizinusaha']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('lacakizinusaha-table')
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
            Column::make('izin_usahas_id')->title('Nama Pemohon'),
            Column::make('keterangan')->title('Keterangan'),
        ];

        if(auth()->user()->roles == 'ADMIN'){
            $columns[] = Column::make('action')->title('Action')->orderable(false)->searchable(false);
        }

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'LacakIzinUsaha_' . date('YmdHis');
    }
}
