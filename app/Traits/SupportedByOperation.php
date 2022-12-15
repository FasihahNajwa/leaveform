<?php

// namespace App\Http\Controllers\Admin\Operations;

namespace App\Traits;


use App\Models\ApplicationLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Prologue\Alerts\Facades\Alert;

trait SupportedByOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupSupportedByRoutes($segment, $routeName, $controller)
    {

        Route::get($segment . '/{id}/supportedby', [
            'as'        => $routeName.'.supportedby',
            'uses'      => $controller.'@supportedby',
            'operation' => 'supportedby',
        ]);
        Route::post($segment . '/{id}/supportedby', [
            'as'        => $routeName.'.supportedby',
            'uses'      => $controller.'@doSupportedBy',
            'operation' => 'supportedby',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupSupportedByDefaults()
    {
        $this->crud->allowAccess('supportedby');

        // $this->crud->operation('supportedby', function () {
        //     $this->crud->loadDefaultOperationSettingsFromConfig();
        // });

        $this->crud->operation('list', function () {
            $this->crud->addButton('line', 'supportedby', 'view', 'crud::buttons.supportedby', 'beginning');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
    public function supportedby($id)
    {

        $this->crud->setOperation('supportedby');

        // $this->crud->hasAccessOrFail('supportedby');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->getTitle() ?? 'Supportedby '.$this->crud->entity_name;
        $this->data['entry'] = $this->crud->getCurrentEntry($id);


        $this->crud->set('show.contentClass', 'col-md-12 bold-labels');
        $this->crud->addColumns([

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
                'type'      => 'select',
                'entity'    => 'user',
                'attribute' => 'name',
                'model'     => User::class,
            ],
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
            [
                'label' => __('Status'),
                'name'  => 'status',
                'type'  => 'text',
            ],
            [
                'label' => __('Supporting Document'),
                'name'  => 'supporting_document',
                'type'  => 'upload',
                'upload' => true,
                'disk'  => 'public',
                // 'crop' => true, // set to true to allow cropping, false to disable
                // 'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
            ],
            [
                'label' => __('Approved By'),
                'name'  => 'approved_by',
                'type'  => 'text',
            ],
            [
                'label' => __('Approved Date'),
                'name'  => 'approved_date',
                'type'  => 'date',
                'locale' => ['format' => 'DD/MM/YYYY'],
                'type'  => 'hidden',
            ],

            // [
            //     'label' => __('Supported By'),
            //     'name'  => 'supported_by',
            //     'type'  => 'text',
            //     // 'type'  => 'hidden',
            // ],
            // [
            //     'label' => __('Supported Date'),
            //     'name'  => 'supported_date',
            //     'type'  => 'date',
            //     'locale' => ['format' => 'DD/MM/YYYY'],
            //     // 'type'  => 'hidden',
            // ],

        ]);

        // load the view
        // return view("crud::operations.supportedby", $this->data);
        // return view("crud::operations.supportedbyform", $this->data);

        return view('vendor.backpack.crud.supportedbyform', $this->data);
    }

    public function doSupportedBy(Request $request, $id)
    {
        $data = $request->all();
        $applicationleave = ApplicationLeave::findOrFail($id);

        // $applicationleave-> //calculation

        $applicationleave->update([
            'status'           => $request->supportedby_status,
            'supported_by'     => user()->name,
            'supported_date'   => now(),
            'remarks_support'  => $request->remarks_support,
        ]);

        Alert::success('Permohonan borang cuti telah berjaya dikemaskini.')->flash();

        return redirect(backpack_url('h-o-d-application-leave'));
    }
}
