<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        
        return response()->json([
            'message' => 'Get All Resource',
            'data' => $karyawan
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:karyawan',
            'status' => 'required|in:active,inactive,terminated',
            'hired_on' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $karyawan = Karyawan::create($request->all());

        return response()->json([
            'message' => 'Resource is added successfully',
            'data' => $karyawan
        ], 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Get Detail Resource',
            'data' => $karyawan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'gender' => 'in:L,P',
            'phone' => 'string',
            'address' => 'string',
            'email' => 'email|unique:karyawan,email,' . $id,
            'status' => 'in:active,inactive,terminated',
            'hired_on' => 'date'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $karyawan->update($request->all());

        return response()->json([
            'message' => 'Resource is updated successfully',
            'data' => $karyawan
        ], 200);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }

        $karyawan->delete();

        return response()->json([
            'message' => 'Resource is deleted successfully'
        ], 200);
    }

    public function search($name)
    {
        $karyawan = Karyawan::where('name', 'LIKE', "%{$name}%")->get();

        if ($karyawan->isEmpty()) {
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Get searched resource',
            'data' => $karyawan
        ], 200);
    }

    public function active()
    {
        $karyawan = Karyawan::where('status', 'active')->get();
        $total = $karyawan->count();

        return response()->json([
            'message' => 'Get active resource',
            'total' => $total,
            'data' => $karyawan
        ], 200);
    }

    public function inactive()
    {
        $karyawan = Karyawan::where('status', 'inactive')->get();
        $total = $karyawan->count();

        return response()->json([
            'message' => 'Get inactive resource',
            'total' => $total,
            'data' => $karyawan
        ], 200);
    }

    public function terminated()
    {
        $karyawan = Karyawan::where('status', 'terminated')->get();
        $total = $karyawan->count();

        return response()->json([
            'message' => 'Get terminated resource',
            'total' => $total,
            'data' => $karyawan
        ], 200);
    }
}
