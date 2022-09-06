<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LeaveTypeCreateRequest;
use App\Http\Requests\LeaveTypeUpdateRequest;
use App\Http\Controllers\CrudController;


/**
 * Class LeaveTypeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LeaveTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        $this->crud->setModel(\App\Models\LeaveType::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/leave-type');
        $this->crud->setEntityNameStrings(__('leave type'), __('leave types'));
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumns($this->columnConfigs());
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(LeaveTypeCreateRequest::class);

        $this->crud->addFields($this->fieldConfigs());
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(LeaveTypeUpdateRequest::class);

        $this->crud->addFields($this->fieldConfigs());
    }

    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->columnConfigs());
    }

    protected function columnConfigs()
    {
        return [
            [
                'label' => __('Name'),
                'name'  => 'name',
                'type'  => 'text',
            ],
        ];
    }

    protected function fieldConfigs()
    {
        return [
            [
                'label' => __('Name'),
                'name'  => 'name',
                'type'  => 'text',
            ],
        ];
    }
}
