<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SleepRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SleepCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SleepCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Sleep::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sleep');
        CRUD::setEntityNameStrings('sleep', 'sleeps');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::column('date')
            ->label('Ngày');
        CRUD::column('start')
            ->label('Giờ bắt đầu ngủ');
        CRUD::column('end')
            ->type('time')
            ->label('Giờ thức dậy');

        CRUD::column('take_to_sleep_by')->type('enum')->label('Người cho ngủ');
        CRUD::column('use_white_noise')->label('Có dùng tiếng ồn trắng không?')->type('check');
        CRUD::column('change_diaper')->label('Đã thay bỉm chưa?')->type('check');
        CRUD::column('burping')->label('Đã vỗ ợ hơi chưa?')->type('check');
        CRUD::column('place')->label('Vị trí ngủ');
        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SleepRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field('date')
            ->label('Ngày');
        CRUD::field('start')
            ->label('Giờ bắt đầu ngủ');
        CRUD::field('end')
            ->type('time')
            ->label('Giờ thức dậy');

        CRUD::field('take_to_sleep_by')->type('enum')->label('Người cho ngủ');
        CRUD::field('use_white_noise')->label('Có dùng tiếng ồn trắng không?');
        CRUD::field('change_diaper')->label('Đã thay bỉm chưa?');
        CRUD::field('burping')->label('Đã vỗ ợ hơi chưa?');
        CRUD::field('place')->label('Vị trí ngủ');
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
