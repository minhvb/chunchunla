<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EatRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EatCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EatCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Eat::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/eat');
        CRUD::setEntityNameStrings('eat', 'eats');
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
        CRUD::column('milk_type')->label('Loại Sữa');
        CRUD::column('fed_by')->type('enum')->label('Người cho ăn');
        CRUD::column('amount')
            ->type('number')
            ->label('Lượng ăn');
        CRUD::column('date')
            ->type('date')
            ->label('Ngày');
        CRUD::column('start')
            ->type('time')
            ->label('Giờ bắt đầu cho ăn');
        CRUD::column('end')
            ->type('time')
            ->label('Giờ kết thúc cho ăn');

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
        CRUD::setValidation(EatRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field('milk_type')->type('enum')->label('Loại Sữa');
        CRUD::field('fed_by')->type('enum')->label('Người cho ăn');
        CRUD::field('amount')
            ->type('number')
            ->label('Lượng ăn');
        CRUD::field('date')
            ->type('date')
            ->label('Ngày');
        CRUD::field('start')
            ->type('time')
            ->label('Giờ bắt đầu cho ăn');
        CRUD::field('end')
            ->type('time')
            ->label('Giờ kết thúc cho ăn');

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
