<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateProjectController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "project_code" => 'required|string|unique:projects',
            "project_title" => 'required|string|unique:projects',
            "start_date" => 'required|date',
            "end_date" => 'required|date|after:start_date',
            "client_id" => 'required|exists:clients,id',
            "partner_id" => 'required|exists:partners,id',
            "country" => 'required|string',
            "state" => 'required|string',
            "city" => 'required|string',
            "address" => 'required|string',
            "created_by" => 'required|exists:users,id',
            "status" => 'required|in:Active,Archive',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $project = Project::create(array_merge(
            $validator->validated(),
        ));
        return response()->json([
            'message' => 'Project successfully created',
            'project' => $project
        ], 201);

    }
}
