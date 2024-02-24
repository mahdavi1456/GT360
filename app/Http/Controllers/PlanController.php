<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Project;
use App\Models\PlanItem;
use App\Models\PlanType;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ert('cd');
        return  view('admin.plan.list', ['plans' => Plan::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = PlanType::latest()->get();
        return view('admin.plan.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'desc'=>'required'
        // ]);
        $data = $request->except('_token', 'q');
        Plan::create($data);
        alert()->success('موفق', 'پکیج با موفقیت ایجاد شد');
        return to_route('plan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        $types = PlanType::latest()->get();
        return view('admin.plan.edit', compact('plan','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        $data = $request->except('_token', 'q');
        $plan->update($data);
        alert()->success('موفق', 'پکیج با موفقیت ویرایش شد');
        return to_route('plan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        alert()->success('موفق', 'پکیج با موفقیت حذف شد');
        return to_route('plan.index');
    }
    // items section items section items section
    // items section items section items section
    public function ListItems(Plan $plan) {
        ert('cd');
        $items=$plan->items;
        $action='create';
        $item=null;
        if (request()->has('item')) {
            $action='update';
            $item=PlanItem::findOrFail(request('item'));
        }
        return view('admin.plan_items.list',compact('plan','items','action','item'));

    }

    public function stroeItem(Request $request) {
        $data=$request->except('_token','q','action','item_id');
        $action=$request->action;
        if ($action=='create') {
            $item=PlanItem::create($data);
            alert()->success('موفق', 'ایتم با موفقیت ایجاد شد');
        }elseif($action=='update'){
            //dd($request->item_id);
            $item= PlanItem::findOrFail($request->item_id);
            $item->update($data);
            alert()->success('موفق', 'ایتم با موفقیت ویرایش شد');
        }
        return to_route('plan.ListItems',$item->plan_id);

    }

    public function itemDelete( $planItem) {
        $planItem=PlanItem::findOrFail($planItem);
        $plan=$planItem->plan_id;
        $planItem->delete();
        alert()->success('موفق', 'آیتم با موفقیت حذف شد');
        return to_route('plan.ListItems',$plan);
    }
    public function buyPlan() {
        $planTypes=Plan::select('plan_type')->distinct()->get();
        $planTypes=$planTypes->pluck('plan_type');
        $projects=Project::where('account_id',auth()->user()->account_id)->get();
    return view('admin.plan.buyPlan',compact('planTypes',"projects"));
    }

    public function planDefineType() {
     //   dd('dd');
        ert('cd');
        $types=PlanType::latest()->get();
        $action='create';
        $type=null;
        if (request()->has('type_id')) {
            $action='update';
            $type=PlanType::findOrFail(request('type_id'));
        }
        return view('admin.plan_types.list',compact('types','type','action'));
    }
    public function stroeType(Request $request) {
        $data=$request->except('_token','q','action','type_id');
        $action=$request->action;
        if ($action=='create') {
            $type=PlanType::create($data);
            alert()->success('موفق', 'نوع با موفقیت ایجاد شد');
        }elseif($action=='update'){
            //dd($request->TypePlanType_id);
            $type= PlanType::findOrFail($request->type_id);
            $type->update($data);
            alert()->success('موفق', 'نوع با موفقیت ویرایش شد');
        }
        return to_route('planDefineType');

    }
    public function typeDelete( $type) {
        $type=PlanType::findOrFail($type);
        $type->delete();
        alert()->success('موفق', 'آیتم با موفقیت حذف شد');
        return to_route('planDefineType');
    }


}
