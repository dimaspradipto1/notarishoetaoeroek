<?php

namespace App\DataTables;

use App\Models\LacakBalikNamaSertifikat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LacakBalikNamaSertifikatDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        if(auth()->user()->roles == 'ADMIN'){
            $query = LacakBalikNamaSertifikat::with(['user', 'baliknamasertifikat']);
        }

        if(auth()->user()->roles == 'USER'){
            $query = LacakBalikNamaSertifikat::where('users_id', auth()->user()->id)->orderBy('created_at', 'desc');
        }

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('created_at', function($lacakBalikNamaSertifikat){
                return $lacakBalikNamaSertifikat->created_at->format('d-m-Y');
            })
            ->addColumn('balik_nama_sertifikats_id', function($lacakBalikNamaSertifikat){
                return $lacakBalikNamaSertifikat->baliknamasertifikat->nama_pemilik;
            })
            ->addColumn('keterangan', function($lacakBalikNamaSertifikat){
                return $lacakBalikNamaSertifikat->keterangan;
            })
            ->addColumn('action', function($lacakBalikNamaSertifikat){
                if(auth()->user()->roles == 'ADMIN'){

                    return '
                        <a href="'.route('lacak-balik-nama-sertifikat.edit', $lacakBalikNamaSertifikat->id).'" class="btn btn-sm btn-warning text-white px-3 mb-3"><i class="fa-solid fa-pencil"></i> Edit</a>
    
                        <form action="'.route('lacak-balik-nama-sertifikat.destroy', $lacakBalikNamaSertifikat->id).'" method="POST" class="d-inline">
                        '.method_field('delete').'
                        '.csrf_field().'
                        <button type="submit" class="btn btn-sm btn-danger px-3 mb-3" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini? \')"><i class="fa-solid fa-trash"></i> Delete</button>
                        ';
                    }
            })
            ->rawColumns(['action', 'balik_nama_sertifikats_id', 'created_at', 'keterangan'])
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LacakBalikNamaSertifikat $model): QueryBuilder
    {
        return $model->newQuery()->with(['baliknamasertifikat', 'user']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('lacakbaliknamasertifikat-table')
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
            Column::make('balik_nama_sertifikats_id')->title('Nama Pemohon'),
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
        return 'LacakBalikNamaSertifikat_' . date('YmdHis');
    }
}
