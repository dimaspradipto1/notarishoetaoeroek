<?php

namespace App\DataTables;

use App\Models\Pbb;
use App\Models\PbbGallery;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Storage;

class PbbGalleryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

       if(auth()->user()->roles == 'ADMIN'){
        $query = PbbGallery::join('pbbs', 'pbbs.id', '=' , 'pbb_galleries.pbbs_id')
            ->join('users', 'users.id', '=' , 'pbbs.users_id')
            ->select('pbb_galleries.*', 'pbbs.nama_pemilik', 'users.name');
        }

        if(auth()->user()->roles == 'USER'){
            $query = PbbGallery::join('pbbs', 'pbbs.id', '=' , 'pbb_galleries.pbbs_id')
            ->select('pbb_galleries.*', 'pbbs.nama_pemilik')
            ->where('pbbs.users_id', auth()->user()->id);
        }

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('users_id', function($pbb){
                return $pbb->user->name;
            })
            ->addCOlumn('url', function($pbb){
                return '<img src="'.Storage::url($pbb->url).'" width="200px">';
            })
            ->addColumn('action', function ($pbb){
                return '
                    <form action="'.route('pbb_gallery.destroy', $pbb->id).'" method="POST" class="btn btn-sm btn-danger text-white">
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
    public function query(PbbGallery $model, Pbb $pbb): QueryBuilder
    {
        return $model->newQuery()->with(['pbb', 'user']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pbbgallery-table')
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
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PbbGallery_' . date('YmdHis');
    }
}
