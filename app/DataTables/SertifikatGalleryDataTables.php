<?php

namespace App\DataTables;

use App\Models\SertifikatGallery;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SertifikatGalleryDataTables extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        if(auth()->user()->roles == 'USER'){
            $query = SertifikatGallery::join('sertifikats', 'sertifikats.id', '=' , 'sertifikat_galleries.sertifikats_id')
            ->select('sertifikat_galleries.*', 'sertifikats.nama_pemilik')
            ->where('sertifikats.users_id', auth()->user()->id);
        }

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('users_id', function($sertifikat){
                return $sertifikat->user->name;
            })
            ->addColumn('url', function($sertifikat){
                return '<img src="'.Storage::url($sertifikat->url).'" width="200px">';
            })
            ->addColumn('action', function($sertifikat){
                return '
                    <form action="'.route('sertifikat_gallery.destroy', $sertifikat->id).'" method="POST" class="btn btn-sm btn-danger text-white">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                ';
            })
            ->rawColumns(['action', 'url'])
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SertifikatGallery $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sertifikatgallerydatatables-table')
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
        return [
            
            Column::make('DT_RowIndex')->title('No'),
            Column::make('users_id')->title('Nama Pemohon'),
            Column::make('url')->title('Gambar'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(300)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SertifikatGalleryDataTables_' . date('YmdHis');
    }
}
