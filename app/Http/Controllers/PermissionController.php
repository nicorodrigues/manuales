<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function togglePermission(Request $request)
    {
        $id = $request->id;
        $permission = \App\UserManual::find($id);

        if ($permission->forbidden === 0) {
            $permission->forbidden = 1;
        } else {
            $permission->forbidden = 0;
        }

        $permission->save();

        return response()->json(['status' => 'ok']);
    }
}
