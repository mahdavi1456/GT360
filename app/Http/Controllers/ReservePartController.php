<?php

namespace App\Http\Controllers;

use App\Models\ReservePart;
use Illuminate\Http\Request;

class ReservePartController extends Controller
{

    public function index()
    {
        ert('cd');
        $reserveParts = ReservePart::all();
        $reserve = null;
        $action = 'create';
        if (request('update')) {
            $reserve = ReservePart::find(request('update'));
            $action = 'update';
        }
        return view('admin.reserve.part.index', compact('reserveParts', 'reserve', 'action'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->action == 'create') {
            ReservePart::create([
                'name' => $request->name,
                'details' => $request->details,
                'price' => $request->price,
                'off_price' => $request->off_price,
                'status' => $request->status
            ]);
            alert()->success('موفق','سانس با موفقیت ثبت شد');
        } elseif ($request->action == "update") {
            $data=$request->except('action','update','q', '_token');
            $reserve = ReservePart::findOrFail($request->update);
            $reserve->update($data);
            alert()->success('موفق','سانس با موفقیت ویرایش شد');
        }


     return to_route('reserve-part.index');
    }

    public function show(ReservePart $reserveParts)
    {
        //
    }

    public function edit(ReservePart $reserveParts)
    {
        //
    }

    public function update(Request $request, ReservePart $reserveParts)
    {
        //
    }

    public function destroy(ReservePart $reservePart)
    {
        $reservePart->delete();
        alert()->success('موفق','حذف سانس با موفقیت انجام شد');
        return back();
    }
}
