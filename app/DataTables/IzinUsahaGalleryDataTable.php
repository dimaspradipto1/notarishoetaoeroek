<?php

namespace App\DataTables;

use App\Models\IzinUsahaGallery;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class IzinUsahaGalleryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        if(auth()->user()->roles == 'ADMIN'){
            $query = IzinUsahaGallery::join('izin_usahas', 'izin_usahas.id', '=' , 'izin_usaha_galleries.izin_usahas_id')
            ->join('users', 'users.id', '=' , 'izin_usahas.users_id')
            ->select('izin_usaha_galleries.*', 'izin_usahas.nama_pemilik', 'users.name');
        }

        if(auth()->user()->roles == 'USER'){
            $query = IzinUsahaGallery::join('izin_usahas', 'izin_usahas.id', '=' , 'izin_usaha_galleries.izin_usahas_id')
            ->select('izin_usaha_galleries.*', 'izin_usahas.nama_pemilik')
            ->where('izin_usahas.users_id', auth()->user()->id);
        }

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('users_id', function($izinUsahaGallery){
                return $izinUsahaGallery->user->name;
            })
            ->addColumn('url', function($izinUsahaGallery){
                return '
                    <img src="'.Storage::url($izinUsahaGallery->url).'" width="200px">
                ';
            })
            ->addColumn('action', function($izinUsahaGallery){
                return '
                    <form action="'.route('izin_usaha_gallery.destroy', $izinUsahaGallery->id).'" method="POST" class="d-inline">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakiin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                ';
            })
            ->RawColumns(['action', 'url'])
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(IzinUsahaGallery $model): QueryBuilder
    {
        return $model->newQuery()->with('user', 'izinUsaha');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('izinusahagallery-table')
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
        return 'IzinUsahaGallery_' . date('YmdHis');
    }
}
