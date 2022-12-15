<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminEmergencyContactCreateRequest;
use App\Http\Requests\AdminEmergencyContactUpdateRequest;
use App\Http\Controllers\CrudController;
use App\Models\User;


/**
 * Class AdminEmergencyContactCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AdminEmergencyContactCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        $this->crud->setModel(\App\Models\EmergencyContact::class); //change ikut class dia
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/admin-emergency-contact');
        $this->crud->setEntityNameStrings(__('admin emergency contact'), __('admin emergency contacts'));
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
        $this->crud->setValidation(AdminEmergencyContactCreateRequest::class);

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
        $this->crud->setValidation(AdminEmergencyContactUpdateRequest::class);

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
                'label' => __('Name'),
                'name'  => 'name',
                'type'  => 'text',
            ],
            [
                'label' => __('Address'),
                'name'  => 'address',
                'type'  => 'text',
            ],
            [
                'label' => __('Relation'),
                'name'  => 'relation',
                'type'  => 'text',
            ],
            [
                'label' => __('Phone No'),
                'name'  => 'phone_no',
                'type'  => 'text',
            ],
            [
                'label' => __('Home No'),
                'name'  => 'home_no',
                'type'  => 'text',
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
                'label' => __('Name'),
                'name'  => 'name',
                'type'  => 'text',
            ],
            [
                'label' => __('Address'),
                'name'  => 'address',
                'type'  => 'text',
            ],
            [
                'label' => __('Relation'),
                'name'  => 'relation',
                'type'  => 'text',
            ],
            [
                'label' => __('Phone No'),
                'name'  => 'phone_no',
                'type'  => 'text',
            ],
            [
                'label' => __('Home No'),
                'name'  => 'home_no',
                'type'  => 'text',
            ],
            
        ];
    }
}
