<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $tabele = "terms";
    protected $guarded = [];

    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class);
    }

    public function children()
    {
        return  $this->hasMany(Term::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_terms');
    }

    public function element($name, $id, $default = "")
    {
        $terms = Term::all();
        ?>
        <select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="form-control">
            <option value="">انتخاب کنید...</option>
            <?php
            foreach ($terms as $term) {
                ?>
                <option value="<?php echo $term->id; ?>" <?php echo ($default == $term->id) ? "selected" : ""; ?>>
                    <?php echo $term->name; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <?php
    }

    public function form($action, $taxonomyId, $id)
    {
        $terms = Term::all();
        if ($id == 0) {
            $parent_id = "";
            $name = "";
            $slug = "";
            $description = "";
        } else {
            $term = Term::find($id);
            $parent_id = $term->parenet_id;
            $name = $term->name;
            $slug = $term->slug;
            $description = $term->description;
        }
        ?>
        <div class="row">
	        <input type="hidden" name="taxonomy_id" id="taxonomy-id" value="<?php echo $taxonomyId; ?>">
	        <div class="col-md-4">
		        <div class="form-group">
			        <label>والد</label>
			        <select name="parent_id" id="parent-id" class="form-control select2">
				        <option value="">بدون والد</option>
                        <?php
                        foreach ($terms as $term) { ?>
					        <option value="<?php echo $term->id; ?>" <?php echo ($parent_id == $term->id) ? "selected" : ""; ?>><?php echo $term->name; ?></option>
                            <?php
                        }
                        ?>
			        </select>
		        </div>
	        </div>
	        <div class="col-md-4">
		        <div class="form-group">
			        <label class="required">عنوان</label>
			        <input type="text" required name="name" id="name" class="form-control" value="<?php echo $name; ?>" placeholder="عنوان...">
		        </div>
	        </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>نامک</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="<?php echo $slug; ?>" placeholder="نامک...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <textarea name="description" id="description" class="form-control" placeholder="توضیحات..."><?php echo $description; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php
                    if ($action == "create") { ?>
                        <button type="button" id="store-term" data-action="create" data-taxonomy-id="<?php echo $taxonomyId; ?>" data-id="0" class="btn btn-success w-100">ذخیره</button>
                        <?php
                    } else { ?>
                        <button type="button" id="store-term" data-action="update" data-taxonomy-id="<?php echo $taxonomyId; ?>" data-id="<?php echo $id; ?>" class="btn btn-warning w-100">ویرایش</button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    public function list($taxonomyId, $id)
    {
        if ($id == 0) {
            $this->form("create", $taxonomyId, $id);
        } else {
            $this->form("update", $taxonomyId, $id);
        }
        $terms = Term::where("taxonomy_id", $taxonomyId)->get();
        if ($terms->isEmpty()) { ?>
            <div class="d-flex justify-content-center">
                <span class="not-found">ترم یافت نشد.</span>
            </div>
            <?php
        } else { ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>+</th>
                        <th>شماره</th>
                        <th>عنوان</th>
                        <th>توضیحات</th>
                        <th>عملیات</th>
                    </tr>
		        </thead>
		        <tbody class="term_row_position">
                    <?php
                    foreach ($terms as $key => $term) { ?>
			            <tr id="<?php echo $term->id; ?>" draggable="true" ondragend="dragEnd(event)" ondragstart="start()" ondragover="dragover()" style="cursor: pointer;">
				            <td>
					            <input type="hidden" name="id" value="<?php echo $term->id; ?>">
                                <?php
                                if (count($term->childrenRecursive) > 0) { ?>
						            <button type="button" class="btn btn-success btn-sm term-row-btn d-flex justify-content-center align-items-center" data-id="<?php echo $term->id; ?>"><i class="fa fa-plus"></i></button>
                                    <?php
                                }
                                ?>
				            </td>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $term->name; ?></td>
                            <td><?php echo $term->description; ?></td>
				            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-warning btn-sm ml-2 load-term" data-toggle="tooltip" data-placement="top" title="ویرایش" data-taxonomy-id="<?php echo $taxonomyId; ?>" data-id="<?php echo $term->id; ?>"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm delete-confirm" data-toggle="tooltip" data-placement="top" title="حذف" data-taxonomy-id="<?php echo $taxonomyId; ?>" data-id="<?php echo $term->id; ?>"><i class="fa fa-close"></i></button>
                                </div>
                            </td>
			            </tr>
                        <tr>
                            <td colspan="6" class="p-0" id="term-row-result<?php echo $term->id; ?>"></td>
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
