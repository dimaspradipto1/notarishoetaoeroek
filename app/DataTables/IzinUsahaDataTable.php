<?php

namespace App\DataTables;

use App\Models\IzinUsaha;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class IzinUsahaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        if(auth()->user()->roles == 'ADMIN'){
            $query = IzinUsaha::join('users', 'users.id', '=' , 'izin_usahas.users_id')
            ->select('izin_usahas.*', 'users.name');
        }

        if(auth()->user()->roles == 'USER'){
            $query = IzinUsaha::join('users', 'users.id', '=' , 'izin_usahas.users_id')
            ->select('izin_usahas.*', 'users.name')
            ->where('users_id', auth()->user()->id);
        }

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', '')
            ->addColumn('created_at', function($izinusaha){
                return $izinusaha->created_at->format('d/m/Y');
            })
            ->addColumn('status', function($izinusaha){
                if($izinusaha->status == 'PENDING'){
                    return '<span class="badge rounded-pill bg-warning px-3 py-2">PENDING</span>';
                }elseif($izinusaha->status == 'APPROVED'){
                    return '<span class="badge rounded-pill bg-success  px-3 py-2">APPROVED</span>';
                }elseif($izinusaha->status == 'REJECTED'){
                    return '<span class="badge rounded-pill bg-danger px-3 py-2">REJECTED</span>';
                }
            })
            ->addColumn('keterangan', function($izinusaha){
                return $izinusaha->keterangan;
            })
            ->addColumn('action', function($izinusaha){
                if(auth()->user()->roles == 'USER')
                {
                    return '
                        <a href="'.route('izin_usaha.izin_usaha_gallery.create', $izinusaha->id).'" class="btn btn-sm btn-secondary px-3"><i class="fa-solid fa-file-image"></i> Upload Berkas</a>

                        <a href="'.route('izin_usaha.izin_usaha_gallery.index', $izinusaha->id).'" class="btn btn-sm btn-secondary"><i class="fa-solid fa-eye"></i>  Lihat Berkas</a>
                    ';
                }

                if(auth()->user()->roles == 'ADMIN')
                {
                return '
                    <a href="'.route('izin_usaha.izin_usaha_gallery.index', $izinusaha->id).'" class="btn btn-sm btn-secondary px-3"><i class="fa-solid fa-folder-open"></i> Berkas</a>
                    
                    <a href="'.route('izin_usaha.edit', $izinusaha->id).'" class="btn btn-sm btn-warning text-white px-3">Edit</a>

                    <form action="'.route('izin_usaha.destroy', $izinusaha->id).'" method="POST" class="d-inline"> 
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                ';
                }
            })
            ->rawColumns(['status', 'action', 'keterangan'])
            ->setRowId('DT_RowIndex');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(IzinUsaha $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('izinusaha-table')
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
            Column::make('created_at')->title('Tanggal Dibuat'),
            Column::make('nama_pemilik')->title('Nama Pemilik'),
            Column::make('nik_pemilik')->title('NIK Pemilik'),
            Column::make('no_hp')->title('No HP'),
            Column::make('nama_kuasa')->title('Nama Kuasa'),
            Column::make('nik_kuasa')->title('NIK Kuasa'),
            Column::make('no_hp_kuasa')->title('No HP Kuasa'),
            Column::make('status')->title('Status'),
            Column::make('keterangan')->title('Keterangan'),
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
        return 'IzinUsaha_' . date('YmdHis');
    }
}
