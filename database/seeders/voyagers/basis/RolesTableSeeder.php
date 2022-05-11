<?php

namespace Database\Seeders\voyagers\basis;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    private const TABLE_NAME = 'roles';

    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Administrator'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Внутренний сотрудник'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user_external']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Внешний пользователь'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'student']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Студент'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'manager']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Координатор'),
            ])->save();
        }

        $dataType = DataType::firstOrNew(['slug' => self::TABLE_NAME]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => self::TABLE_NAME,
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Role',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $dataType->id,
            'field' => 'id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => 'Id',
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $dataType->id,
            'field' => 'name',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Name',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $dataType->id,
            'field' => 'created_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => 'Дата создания',
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $dataType->id,
            'field' => 'updated_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => 'Дата обновления',
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $dataType->id,
            'field' => 'display_name',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => 'Display Name',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ])->save();
        }

        Permission::generateFor(self::TABLE_NAME);
    }
}
