<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'employee.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('employee-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        // Button::make('create'),
                        // Button::make('export'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload'),
                        Button::make('excel'),
                        Button::make('csv')
                    );

    
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'employee_id' => [
                'searchable' => true,
                'title' => "Employee id",
                'orderable' => true,
            ],
            'employee_name' => [
                'searchable' => true,
                'title' => "Employee Name",
                'orderable' => true,
            ],
            'phone_number' => [
                'searchable' => true,
                'title' => "Employee PhoneNumber",
                'orderable' => true,
            ],
            'employee_email' => [
                'searchable' => true,
                'title' => "Employee Email",
                'orderable' => true,
            ],
            'gender' => [
                'searchable' => true,
                'title' => "Gender",
                'orderable' => true,
            ],
            'date_of_birth' => [
                'searchable' => true,
                'title' => "Date of Birth",
                'orderable' => true,
            ],
            'department' => [
                'searchable' => true,
                'title' => "Department",
                'orderable' => true,
            ],
            'employee_address' => [
                'searchable' => true,
                'title' => "Address",
                'orderable' => true,
            ],
            'empolyee_image' => [
                'searchable' => true,
                'title' => "Image",
                'data' => 'empolyee_image',
                'orderable' => true,
            ],
            
       
               
              'action'
          
              
        
           
             
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            // Column::make('id'),
            // Column::make('add your columns'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Employee_' . date('YmdHis');
    }
}
