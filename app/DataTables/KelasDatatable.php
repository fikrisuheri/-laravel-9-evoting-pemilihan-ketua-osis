<?php

namespace App\DataTables;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KelasDatatable extends DataTable
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
                'route' => route('backend.kelas.delete',$id),
                'type' => 'delete',
            ],
            [
                'title' => 'Edit',
                'icon' => 'bi bi-pen',
                'route' => route('backend.kelas.edit',$id),
                'type' => '',
            ],
        ];
    }

    public function query(Kelas $model): QueryBuilder
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
            Column::make('name')->title(__('field.kelas_name')),
            Column::make('action')->title(__('field.action'))->orderable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
