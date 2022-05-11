<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBreadController as BaseVoyagerBreadController;

class VoyagerBreadController extends BaseVoyagerBreadController
{
    public function orderRow($position, $table, $sort, $direction)
    {
        $count = \DB::table($table)->where(['deleted_at' => null])->count();
        if ($count > 1) {
            if (($sort==='DESC' and $direction==="UP" and $position!=$count) or
                ($sort==='ASC' and $direction==="DOWN" and $position!=$count)) {
                $id = \DB::table($table)->where(['position' => $position, 'deleted_at' => null])->pluck('id')->first();
                \DB::table($table)->where(['position' => $position + 1, 'deleted_at' => null])->update(['position' => $position]);
                \DB::table($table)->where(['id' => $id, 'deleted_at' => null])->update(['position' => $position + 1]);
            } else if (($sort==='DESC' and $direction==="DOWN" and $position!=1) or
                       ($sort==='ASC' and $direction==="UP" and $position!=1)) {
                $id = \DB::table($table)->where(['position' => $position, 'deleted_at' => null])->pluck('id')->first();
                \DB::table($table)->where(['position' => $position - 1, 'deleted_at' => null])->update(['position' => $position]);
                \DB::table($table)->where(['id' => $id, 'deleted_at' => null])->update(['position' => $position - 1]);
            } else if (($sort==='DESC' and $direction==="FIRST" and $position!=$count) or
                       ($sort==='ASC' and $direction==="LAST" and $position!=$count)) {
                $id = \DB::table($table)->where(['position' => $position, 'deleted_at' => null])->pluck('id')->first();
                \DB::table($table)->where('position', '>', $position)->where(['deleted_at' => null])->update(['position' => \DB::raw('position-1')]);
                \DB::table($table)->where(['id' => $id, 'deleted_at' => null])->update(['position' => $count]);
            } else if (($sort==='DESC' and $direction==="LAST" and $position!=1) or
                       ($sort==='ASC' and $direction==="FIRST" and $position!=1)) {
                $id = \DB::table($table)->where(['position' => $position, 'deleted_at' => null])->pluck('id')->first();
                \DB::table($table)->where('position', '<', $position)->where(['deleted_at' => null])->update(['position' => \DB::raw('position+1')]);
                \DB::table($table)->where(['id' => $id, 'deleted_at' => null])->update(['position' => 1]);
            }
        }

        return redirect()->route("voyager.$table.index");
    }
}
