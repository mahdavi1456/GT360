<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReservePart;

class ReservePlan extends Model
{
    use HasFactory;

    protected $table = "reserve_plans";
    protected $guarded = [];

    public function getValue($name, $details, $rp_date)
    {
        $rp = ReservePlan::where('name', $name)->where('details', $details)->where('rp_date', $rp_date)->first();
        if ($rp) {
            return $rp->rp_count;
        } else {
            return null;
        }
    }

    public function reserveList($year, $month, $day)
    {
        $reserveParts = ReservePart::all();
        $reservePlanModel = new ReservePlan;
        if ($reserveParts) {
            ?>
            <table class="table table-bordered table-striped text-center table-hover">
                <thead class="table-warning">
                    <tr>
                        <th>روز</th>
                        <th>نام روز</th>
                        <?php
                        foreach ($reserveParts as $key => $reservePart) { ?>
                            <th>
                                <?php echo $reservePart->name; ?>
                                <small>(<?php echo $reservePart->details; ?>)</small>
                            </th>
                            <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= 31; $i++) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $i; ?></td>
                            <?php
                            foreach ($reserveParts as $key => $reservePart) {
                                $rpDate = $year . '/' . $month . '/' . $i;
                                ?>
                                <td>
                                    <button class="btn btn-success load-reserve-info-form" data-id="<?php echo $reservePart->id; ?>" data-rp_date="<?php echo $rpDate; ?>">انتخاب</button>
                                </td>
                                <?php
                            } ?>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
    }

    public function InfoForm($id, $roDate, $rpName, $rpDetails, $rsPrice)
    {
        ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title m-0">تکمیل مشخصات</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>تاریخ</label>
                        <input readonly type="text" name="ro_date" class="form-control" value="<?php echo $roDate; ?>">
                    </div>
                    <div class="col-3 form-group">
                        <label>سانس</label>
                        <input readonly type="text" name="rp_name" class="form-control" value="<?php echo $rpName; ?>">
                    </div>
                    <div class="col-3 form-group">
                        <label>توضیحات</label>
                        <input readonly type="text" name="rp_details" class="form-control" value="<?php echo $rpDetails; ?>">
                    </div>
                    <div class="col-3 form-group">
                        <label>مبلغ هر نفر</label>
                        <input readonly type="text" name="rs_price" class="form-control" value="<?php echo $rsPrice; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 form-group">
                        <label>تعداد <span class="text-danger">*</span></label>
                        <input type="text" name="ro_count" id="ro-count" class="form-control" placeholder="تعداد...">
                    </div>
                    <div class="col-4 form-group">
                        <label>نام و نام خانوادگی <span class="text-danger">*</span></label>
                        <input type="text" name="ro_name" id="ro-name" class="form-control" placeholder="نام و نام خانوادگی...">
                    </div>
                    <div class="col-4 form-group">
                        <label>موبایل <span class="text-danger">*</span></label>
                        <input type="text" name="ro_mobile" id="ro-mobile" class="form-control" placeholder="موبایل...">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-warning" data-id="<?php echo $id; ?>">مرحله قبل</button>
                        <button type="button" id="load-confirm-mobile-form" class="btn btn-success" data-id="<?php echo $id; ?>">مرحله بعد</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function confirmMobileForm($id, $mobile)
    {
        ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title m-0">احراز شماره موبایل</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 form-group">
                        <label>شماره موبایل</label>
                        <input readonly type="text" name="ro_mobile" id="mobile" class="form-control" placeholder="شماره موبایل..." value="<?php echo $mobile; ?>">
                    </div>
                    <div class="col-5 form-group">
                        <label>کد تایید</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="کد تایید..." value="">
                    </div>
                    <div class="col-2 form-group">
                        <label class="d-block">60 ثانیه</label>
                        <button type="button" class="btn btn-info btn-sm">ارسال مجدد</button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <button type="button" class="btn btn-warning">مرحله قبل</button>
                        <button type="button" id="check-confirm-customer" class="btn btn-success">تایید</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}
