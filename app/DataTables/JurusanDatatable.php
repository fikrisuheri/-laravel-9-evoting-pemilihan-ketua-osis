<?php

namespace App\DataTables;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JurusanDatatable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
            return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $data['action'] = $this->actions($query);
                return view('datatable.actions', compact('data','query'))->render();
            })
            ->addIndexColumn()     
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function actions($id)
    {
        return  [
            [
                'title' => 'Hapus',
                'icon' => 'bi bi-trash',
                'route' => route('backend.jurusan.delete',$id),
                'type' => 'delete',
            ],
            [
                'title' => 'Edit',
                'icon' => 'bi bi-pen',
                'route' => route('backend.jurusan.edit',$id),
                'type' => '',
            ],
        ];
    }

    public function query(Jurusan $model): QueryBuilder
    {
        return $model->newQuery()->OrderBy('id','desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('category-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
    }


    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('name')->title(__('field.jurusan_name')),
            Column::make('action')->title(__('field.action'))->orderable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
