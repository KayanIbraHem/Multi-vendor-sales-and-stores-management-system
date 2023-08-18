<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ApiController extends Controller
{
    public function __construct(public $resource, public $model)
    {
    }

    public function index()
    {
        $rows = $this->query()->paginate(10);
        return response()->json([
            'success' => true,
            'rows'  => $this->resource::collection($rows),
        ]);
    }
    public function destroy($id)
    {
        $row = $this->query()->find($id);
        if (!$row) {
            return response()->json([
                'success' => false,
                'message' => 'not found'
            ]);
        }
        $row->delete();
        return response()->json([
            'success' => true,
            'message' => 'deleted'
        ]);
    }

    protected function query()
    {
        return $this->model::filter();
    }
}
