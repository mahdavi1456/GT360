<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'user_id',
        'name',
        'type',
        'size',
        'ext',
    ];

    public function list()
    {
        $items = Media::orderBy('created_at', 'desc')->paginate(20);
        if ($items->isEmpty()) {
            ?>
            <div class="alert alert-danger text-center m-0">موردی جهت نمایش موجود نیست.</div>
            <?php
        } else {
            ?>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>فایل</th>
                        <th>آدرس</th>
                        <th>کاربر</th>
                        <th>EXT</th>
                        <th>تاریخ</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $key => $item) {
                        ?>
                        <tr>
                            <td><?php echo fa_number($key + 1); ?></td>
                            <td><a target="_blank" href="<?php echo $item->url; ?>"><?php echo $item->name; ?></a></td>
                            <td><?php echo $item->url; ?></td>
                            <td><?php echo $item->user_id; ?></td>
                            <td><?php echo $item->ext; ?></td>
                            <td><?php echo fa_number(\Hekmatinasser\Verta\Verta::instance($item->created_at)->format(' Y/m/d ')); ?></td>
                            <td>
                                <button type="button" data-id="<?php echo $item->id; ?>" data-toggle="tooltip" data-placement="top" title="حذف" class="btn btn-danger btn-sm delete-confirm"><i class="fa fa-close"></i></button>
                            </td>
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
