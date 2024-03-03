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

    public function reserveList($year, $month, $day, $date)
    {
        $projectId = Project::checkOpenProject(auth()->user()->account_id)->project_id;
        $reserveParts = ReservePart::where(['project_id' => $projectId])->latest()->get();
        $reservePlanModel = new ReservePlan;
        if ($reserveParts) {
?>
            <table class="table table-bordered table-striped text-center table-hover">
                <thead class="table-warning">
                    <tr>
                        <th>روز</th>
                        <th>نام روز</th>
                        <th>تاریخ</th>
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

                    for ($i = 1; $i <= $date->daysInMonth; $i++) {
                        $date->day = $i;
                        if (verta()->gt($date)) {
                            if (verta()->startDay() != $date->startDay()) {
                                continue;
                            }
                        }
                        if (request('day')) {
                            if ($i != request('day')) {
                                continue;
                            }
                        }

                    ?>
                        <tr>
                            <td><?php echo $date->format("%d"); ?></td>
                            <td><?= $date->format('%A'); ?></td>
                            <td><?= fa_number($date->format('Y/m/d')) ?></td>
                            <?php
                            foreach ($reserveParts as $key => $reservePart) {
                                $rpDate = $year . '/' . $month . '/' . $i;
                                $hasPlan = $reservePart->hasPlan($date);
                                //   dump($hasPlan);
                                if ($hasPlan['plan']) {
                                    if ($hasPlan['left_count'] > 0) {


                            ?>

                                        <td>
                                            <button class="btn btn-success load-reserve-info-form" data-id="<?php echo $reservePart->id; ?>" data-rp_date="<?php echo $rpDate; ?>">انتخاب</button>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <button class="btn btn-success load-reserve-info-form" disabled>ظرفیت تکمیل</button>
                                        </td>
                                    <?php }
                                } else {
                                    ?>
                                    <td>
                                        <button class="btn btn-success load-reserve-info-form" disabled>غیر فعال</button>
                                    </td>

                            <?php }
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

    public function InfoForm($rp_id, $roDate, $rpName, $rpDetails, $rsPrice, $leftCount)
    {
        ?>
        <div class="main-content">
            <input type="hidden" id="rp_id" value="<?= $rp_id ?>">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">تکمیل مشخصات</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>تاریخ</label>
                            <input readonly type="text" id="ro_date" name="ro_date" class="form-control" value="<?php echo $roDate; ?>">

                        </div>
                        <div class="col-md-3 form-group">
                            <label>سانس</label>
                            <input readonly type="text" id="rp_name" name="rp_name" class="form-control" value="<?php echo $rpName; ?>">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>توضیحات</label>
                            <input readonly type="text" id="rp_details" name="rp_details" class="form-control" value="<?php echo $rpDetails; ?>">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>مبلغ هر نفر</label>
                            <input readonly type="text" id="rs_price" name="rs_price" class="form-control" value="<?php echo $rsPrice; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 form-group">
                            <label>تعداد <span class="text-danger">*</span></label>
                            <input type="number" max="<?= $leftCount ?>" name="ro_count" id="ro-count" class="form-control just-numbers" placeholder="تعداد...">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>مبلغ کل <span class="text-danger">*</span></label>
                            <input type="text" readonly id="ro-total" class="form-control" placeholder="تعداد...">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>نام و نام خانوادگی <span class="text-danger">*</span></label>
                            <input type="text" name="ro_name" id="ro-name" class="form-control" placeholder="نام و نام خانوادگی...">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>موبایل <span class="text-danger">*</span></label>
                            <input type="text" name="ro_mobile" id="ro-mobile" class="form-control" placeholder="موبایل...">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="" id="back-to-infoForm" class="btn btn-warning">انصراف</a>
                            <!-- <button type="button" class="btn btn-warning" data-id="">مرحله قبل</button> -->
                            <button type="button" id="load-confirm-mobile-form" class="btn btn-success" data-id="">مرحله بعد</button>
                        </div>
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
                    <input type="hidden" name="tit" id="ro_id" value="<?= $id ?>">
                    <div class="col-5 form-group">
                        <label>کد تایید</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="کد تایید..." value="">
                    </div>
                    <div class="col-2 form-group">
                        <label class="d-block"><span id="countdown">20</span> ثانیه</label>
                        <button type="button" id="countdownBTN" disabled class="btn btn-info btn-sm">ارسال مجدد</button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <a href="" id="back-to-infoForm" class="btn btn-warning"> انصراف</a>
                        <!-- <button type="button" id="back-to-infoForm" class="btn btn-warning">مرحله قبل</button> -->
                        <button type="button" id="check-confirm-customer" class="btn btn-success">تایید</button>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
