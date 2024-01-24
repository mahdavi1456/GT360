<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    use HasFactory;

    protected $tabele = "settings";
    protected $guarded = [];

    public function terms()
    {
        return $this->hasMany(Term::class);
    }

    public function element($name, $id, $default = "")
    {
        $taxonomies = Taxonomy::all();
        ?>
        <select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="form-control">
            <option value="">انتخاب کنید...</option>
            <?php
            foreach ($taxonomies as $taxonomy) {
                ?>
                <option value="<?php echo $taxonomy->id; ?>" <?php echo ($default == $taxonomy->id) ? "selected" : ""; ?>>
                    <?php echo $taxonomy->name; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <?php
    }
    public function parents(){
        return $this->hasMany(Term::class)->where('parent_id',0);
    }
}
