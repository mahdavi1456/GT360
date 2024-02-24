<?php

namespace App\Http\Controllers;

use App\Models\PlanItem;
use App\Models\Project;
use App\Models\ReserveOrder;
use App\Models\Transaction;
use App\Servieses\IPG;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function start(Request $request)
    {
        $id = $request->id;
        $reserveOrder = ReserveOrder::find($id);
        $Price = $reserveOrder->rs_price;

        $ipg = new IPG();
        $ipg->start($id, "reserve", $Price);
    }

    public function verify(Request $request)
    {
        $ipg = new IPG();
        $result = $ipg->verify();
        $model = $result['model'];

        if ($result['status'] == 'success') {

            //package verification
            if ($model->record_type == 'package') {
                $planItem = PlanItem::findOrFail($model->record_id);
                $project = Project::findOrFail($model->project_id);
                $projectExpire = Carbon::parse($project->expire);
                if (Carbon::now()->gte($projectExpire)) {
                    $expire = Carbon::now()->addDays($planItem->to);
                } else {
                    $expire = $projectExpire->addDays($planItem->to);
                }
                $project->update([
                    'item_id' => $planItem->id,
                    'expire' => $expire
                ]);
                alert()->success('موفق', 'پرداخت شما با نوفقیت انجام شد');
                return to_route('project.index');
            }
            //end package verification



        } elseif ($result['status'] == 'failed') {
            alert()->error('خطا', 'پرداخت شما با خطا همراه بود');
            return to_route('transaction.report');
        }elseif ($result['status'] == 'verified') {
            alert()->warning('خطا', 'این پرداخت قبلا تایید شده است');
            return to_route('transaction.report');
        }
        dd($result, 'out');
    }

    public function paymentStart(Request $request, $recordType)
    {

        if ($recordType == 'package') {
            $item = PlanItem::findOrFail($request->item_id);
            $price = $item->price;
            if ($item->off_price > 0) {
                $price = $item->off_price;
            }
            $ipg = new IPG();
            $url = $ipg->start($request->item_id, "package", $price, $request->project_id);
            return redirect()->to($url);
        }
    }
    public function reports() {
        $transactions=Transaction::where('account_id',auth()->user()->account_id)->latest()->with('project')->paginate(30);

        return view('admin.transaction.reports',compact('transactions'));
    }
}
