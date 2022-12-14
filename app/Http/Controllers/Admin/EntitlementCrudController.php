<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EntitlementCreateRequest;
use App\Http\Requests\EntitlementUpdateRequest;
use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LeaveType;

/**
 * Class EntitlementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EntitlementCrudController extends CrudController
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
        $this->crud->setModel(\App\Models\Entitlement::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/entitlement');
        $this->crud->setEntityNameStrings(__('entitlement'), __('entitlements'));
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
        $this->crud->setValidation(EntitlementCreateRequest::class);

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
        $this->crud->setValidation(EntitlementUpdateRequest::class);

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
                'label'     => __('User'),
                'name'      => 'user_id',
                'type'      => 'select',
                'entity'    => 'user',
                'attribute' => 'name',
                'model'     => User::class,
            ],
            [
                'label'     => __('Leave Type'),
                'name'      => 'leave_type_id',
                'type'      => 'select',
                'entity'    => 'leaveType',
                'attribute' => 'name',
                'model'     => LeaveType::class,
            ],
            [
                'label' => __('Applicable Leave'),
                'name'  => 'applicable_leave',
                'type'  => 'number',
            ],
            [
                'label' => __('Remaining Leave'),
                'name'  => 'remaining_leave',
                'type'  => 'number',
            ],
            [
                'label' => __('Total Applied Leave'),
                'name'  => 'total_applied_leave',
                'type'  => 'number',
            ],
        ];
    }

    protected function fieldConfigs()
    {
        return [
            [
                'label'     => __('User'),
                'name'      => 'user_id',
                'type'      => 'select',
                'entity'    => 'user',
                'attribute' => 'name',
                'model'     => User::class,
            ],
            [
                'label'     => __('Leave Type'),
                'name'      => 'leave_type_id',
                'type'      => 'select',
                'entity'    => 'leaveType',
                'attribute' => 'name',
                'model'     => LeaveType::class,
            ],
            [
                'label' => __('Applicable Leave'),
                'name'  => 'applicable_leave',
                'type'  => 'number',
            ],
            [
                'label' => __('Remaining Leave'),
                'name'  => 'remaining_leave',
                'type'  => 'number',
            ],
            [
                'label' => __('Total Applied Leave'),
                'name'  => 'total_applied_leave',
                'type'  => 'number',
            ],
        ];
    }

    public function store (Request $request){

        $count= new Entitlement();
        $count->remaining_leave = $request->get('remaining_leave');
        $count->total_applied_leave= $request->get('total_applied_leave');
        $count->remaining_leave = $request->get('remaining_leave') - $request->get('total_applied_leave');
        $count->save();
        return redirect('/entitlement')->with('success', 'data added');

    }

//         // Entitlement::create([
//         //     'remaining_leave' => $request->get('remaining_leave'),
//         //     'total_applied_leave' => $request->get('total_applied_leave'),
//         //     'remaining_leave' => $request->input('remaining_leave') - $request->input('total_applied_leave')
//         // ]);
//         // return redirect(backpack_url('entitlement'))->with('success', 'Kelayakan cuti telah berjaya dikemaskini.');
//     }
}
