<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Contracts\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    protected string $view;
    protected string $model;
    protected bool $btn_ajax = true;

    public function __construct()
    {
        view()->share('btn_ajax', $this->btn_ajax);
    }

    public function index()
    {
        if (request()->ajax()) {
            $rows = $this->query();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view("dashboard.{$this->getModule()}.rows", ['rows' => $rows->paginate(request()->get('limit', 1))])->render(),
            ]);
        }
        return view("dashboard.{$this->view}.index");
    }
    public function show($id)
    {
        $row = $this->query($id)->first();
        return view("dashboard.{$this->view}.show", compact('row'));
    }
    public function create()
    {
        // if (request()->ajax()) {
        //     $this->btn_ajax = false;
        //     return view("dashboard.{$this->view}.create", $this->append());
        // }
        // return view("dashboard.{$this->view}.includes.create", $this->append());

        if (!request()->ajax()) $this->btn_ajax = false;
        $view = $this->btn_ajax ? "forms" : "pages";
        return view("dashboard.includes.$view.create", $this->append());
    }

    public function edit($id)
    {
        // $row = $this->query($id)->first();
        // return view("dashboard.{$this->view}.update", compact('row'), $this->append());
        $row = $this->query($id)->first();
        if (! request()->ajax()) $this->btn_ajax = false;
        $folder = $this->btn_ajax ? "forms" : "pages";
        return view("dashboard.includes.$folder.update", compact('row'), $this->append());
    }

    public function destroy($id)
    {
        $this->query($id)->delete();
        return redirect()->route("dashboard.{$this->view}.index");
    }

    public function multiDelete(Request $request)
    {
        $count = $this->query()->whereIn('id', $request->get('ids'))->delete();
        return response()->json(['message' => "تم حذف $count من السجلات"], 200);
    }

    protected function query(?int $id = null): Builder
    {
        return $this->model::filter()->when($id, fn ($query) => $query->where('id', $id));
    }

    public function getModule(bool $singular = false): string
    {
        return $singular ? str($this->view)->singular() : $this->view;
    }

    protected function append(): array
    {
        return [
            //
        ];
    }
}
