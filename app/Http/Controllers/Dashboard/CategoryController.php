<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\CategoryRequest;
use Exception;

class CategoryController extends DashboardController
{
    protected string $view = 'categories';
    protected string $model = 'App\\Models\\Category';
    protected bool $btn_ajax = true;

    public function store(CategoryRequest $request, CategoryService $service)
    {
        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء الصنف بنجاح'], 200);
    }

    public function update(CategoryRequest $request, CategoryService $service, $category)
    {
        $row = $service->handel($request->validated(), $category);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل الصنف بنجاح'], 200);
    }

    protected function append(): array
    {
        return [
            'categories' => Category::select('id', 'name')->whereNotIn('id', $this->getCats(request()->get('category')))->pluck('name', 'id')
        ];
    }

    protected function getCats(?int $id = null)
    {
        if (is_null($id)) return [];
        $ids[] = $id;
        $row = Category::with('child')->where('id', $id)->first();
        $this->getUniqeIds($ids, $row->subs);

        return $ids;
    }

    protected function getUniqeIds(array &$ids, $subs)
    {
        foreach ($subs as $sub) {
            $ids[] = $sub->id;
            $this->getUniqeIds($ids, $sub->subs);
        }
    }
}
