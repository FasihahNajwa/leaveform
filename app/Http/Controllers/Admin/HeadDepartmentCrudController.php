<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HeadDepartmentCreateRequest;
use App\Http\Requests\HeadDepartmentUpdateRequest;
use App\Http\Controllers\CrudController;
use App\Models\Department;

/**
 * Class HeadDepartmentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HeadDepartmentCrudController extends CrudController
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
        $this->crud->setModel(\App\Models\HeadDepartment::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/head-department');
        $this->crud->setEntityNameStrings(__('head department'), __('head departments'));
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
        $this->crud->setValidation(HeadDepartmentCreateRequest::class);

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
        $this->crud->setValidation(HeadDepartmentUpdateRequest::class);

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
                'label'     => __('Department'),
                'name'      => 'department_id',
                'type'      => 'select',
                'entity'    => 'department',
                'attribute' => 'name',
                'model'     => Department::class,
            ],
            [
                'label'     => __('User'),
                'name'      => 'user_id',
                'type'      => 'select',
                'entity'    => 'user',
                'attribute' => 'name',
                'model'     => "App\Models\User",
            ],
        ];


    }

    protected function fieldConfigs()
    {
        return [
            [
                'label'     => __('Department'),
                'name'      => 'department_id',
                'type'      => 'select',
                'entity'    => 'department',
                'attribute' => 'name',
                'model'     => Department::class,
            ],
            [
                'label'     => __('User'),
                'name'      => 'user_id',
                'type'      => 'select',
                'entity'    => 'user',
                'attribute' => 'name',
                'model'     => "App\Models\User",
            ],
        ];
    }
}
