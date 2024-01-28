<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $tabele = "components";
    protected $guarded = [];

    public function element($name, $id, $default = "")
    {
        $components = Component::all();
        ?>
        <select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="form-control">
            <option value="">انتخاب کنید...</option>
            <?php
            foreach ($components as $component) {
                ?>
                <option
                    value="<?php echo $component->id; ?>" <?php echo ($default == $component->id) ? "selected" : ""; ?>>
                    <?php echo $component->name; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <?php
    }

    public function getStatusValueAttribute()
    {
        switch ($this->status) {
            case 'active':
                return "فعال";
                break;
            case 'deactive':
                return "غیرفعال";
                break;
            default:
                return $this->status;
                break;
        }
    }
}
