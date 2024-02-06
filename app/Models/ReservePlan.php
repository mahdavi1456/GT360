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
                                    <button class="btn btn-success" data-id="<?php echo $reservePart->id; ?>">انتخاب</button>
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

}
