<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ApplicationLeaveCreateRequest;
use App\Http\Requests\ApplicationLeaveUpdateRequest;
use App\Http\Controllers\CrudController;
use App\Models\LeaveType;
use App\Models\User;

/**
 * Class ApplicationLeaveCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ApplicationLeaveCrudController extends CrudController
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
        $this->crud->setModel(\App\Models\ApplicationLeave::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/application-leave');
        $this->crud->setEntityNameStrings(__('application leave'), __('application leaves'));
        $this->crud->addClause('where','user_id', user()->id);
        // $this->crud->addClause('where', 'status','!=', 'Permohonan Baru');
        // $this->crud->denyAccess('create');
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

        // $this->crud->set('show.setFromDb', false); //image
        // $this->crud->addColumns($this->getFieldsData(TRUE)); //image
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ApplicationLeaveCreateRequest::class);

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
        $this->crud->setValidation(ApplicationLeaveUpdateRequest::class);

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
                'label'     => __('Leave Type'),
                'name'      => 'leave_type_id',
                'type'      => 'select',
                'entity'    => 'leaveType',
                'attribute' => 'name',
                'model'     => LeaveType::class,
            ],
            // [
            //     'label'     => __('User'),
            //     'name'      => 'user_id',
            //     'type'      => 'select',
            //     'entity'    => 'user',
            //     'attribute' => 'name',
            //     'model'     => User::class,
            // ],
            // [
            //     'label'     => __('Head Department'),
            //     'name'      => 'head_department_id',
            //     'type'      => 'select',
            //     'entity'    => 'headDepartment',
            //     'attribute' => 'name',
            //     'model'     => "App\Models\HeadDepartment",
            // ],
            [
                'label' => __('Start Date'),
                'name'  => 'start_date',
                'type'  => 'date',
            ],
            [
                'label' => __('End Date'),
                'name'  => 'end_date',
                'type'  => 'text',
            ],
            [
                'label' => __('Count'),
                'name'  => 'count',
                'type'  => 'text',
            ],
            [
                'label' => __('Reason'),
                'name'  => 'reason',
                'type'  => 'textarea',
            ],
            // [
            //     'label' => __('Status'),
            //     'name'  => 'status',
            //     'type'  => 'text',
            // ],
            // [
            //     'label' => __('Supporting Document'),
            //     'name'  => 'supporting_document',
            //     'type'  => 'image',
            //     'crop' => true, // set to true to allow cropping, false to disable
            //     'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
            // ],
            [
                'label' => __('Supporting Document'),
                'name'  => 'supporting_document',
                'type'  => 'upload',
                'upload' => true,
                'disk'  => 'public', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
                // optional:
                // 'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
                'wrapper' => ['class' => 'form-group col-sm-4'],
            ],
            [
                'label' => __('Status'),
                'name'  => 'status',
                'type'  => 'text',
            ],
            [
                'label' => __('Remarks Approval'),
                'name'  => 'remarks_approval',
                'type'  => 'text',
            ],
            [
                'label' => __('Remarks Support'),
                'name'  => 'remarks_support',
                'type'  => 'text',
            ],
        ];
    }

    protected function fieldConfigs()
    {
        return [
            [
                'label'     => __('Leave Type'),
                'name'      => 'leave_type_id',
                'type'      => 'select',
                'entity'    => 'leaveType',
                'attribute' => 'name',
                'model'     => LeaveType::class,
            ],
            [
                'label'     => __('User'),
                'name'      => 'user_id',
                'type'      => 'hidden',
                'entity'    => 'user',
                'attribute' => 'name',
                'default'   => user()->id,
                'model'     => User::class,
            ],
            // [
            //     'label'     => __('Head Department'),
            //     'name'      => 'headDepartment',
            //     'type'      => 'select',
            //     'entity'    => 'headDepartment',
            //     'attribute' => 'name',
            //     'model'     => "App\Models\HeadDepartment",
            // ],
            [
                'label' => __('Start Date'),
                'name'  => 'start_date',
                'locale' => ['format' => 'DD/MM/YYYY'],
                'type'  => 'date',

            ],
            [
                'label' => __('End Date'),
                'name'  => 'end_date',
                'locale' => ['format' => 'DD/MM/YYYY'],
                'type'  => 'date',
            ],
            [
                'label' => __('Count'),
                'name'  => 'count',
                'type'  => 'number',
            ],
            [
                'label' => __('Reason'),
                'name'  => 'reason',
                'type'  => 'textarea',
            ],
            // [
            //     'label' => __('Status'),
            //     'name'  => 'status',
            //     'type'  => 'text',
            // ],
            // [
            //     'label' => __('Supporting Document'),
            //     'name'  => 'supporting_document',
            //     'type'  => 'image',
            //     'crop' => true, // set to true to allow cropping, false to disable
            //     'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
            // ],
            [
                'label' => __('Supporting Document'),
                'name'  => 'supporting_document',
                'type'  => 'upload',
                'upload' => true,
                'disk'  => 'public', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
                // optional:
                // 'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
                'wrapper' => ['class' => 'form-group col-sm-4'],
            ],
        ];
    }
}
