<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Attachment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class MediaController extends Controller
{
    public function index()
    {
        $mediaModel = new Media;
        return view('admin.media.list', compact('mediaModel'));
    }

    public function mediaDelete(Request $request)
    {
        $id = $request->id;
        $item = Media::find($id);
        if (File::exists(public_path($item->url))) {
            unlink(public_path($item->url));
        }
        $item->delete();

        $mediaModel = new Media;
        return $mediaModel->list();
    }

    public function mediaUpload(Request $request)
    {
        if ($request->file) {
            $type = $request->type;
            $data = array();
            $location = "";
            if($type == "media") {
                $location = "media";
            } else {
                $location = "files/" . $type;
            }
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $file->move($location, $filename);
            $filepath = url($location . '/' . $filename);
            $data['fileurl'] = $filepath;
            $data['filepath'] = $location . '/' . $filename;
            $data['success'] = 1;
            $data['message'] = 'فایل آپلود شد.';
            $data['name'] =  $file->getClientOriginalName();
            $data['extension'] = $extension;
            if ($type == 'media') {
                Media::create([
                    'user_id' => Auth::user()->id,
                    'url' => $location . '/' . $filename,
                    'name' => $file->getClientOriginalName(),
                    'type' => 'media',
                    'ext' => $extension
                ]);
                $mediaModel = new Media;
                return $mediaModel->list();
            } else {
                $mediaModel = new Media;
                return $mediaModel->list();
            }
        } else {
            $data['success'] = 2;
            $data['message'] = 'لطفا فایل مورد نظر را انتخاب کنید.';
            return response()->json(['data' => $data]);
        }
    }

    public function mediaList(Request $request)
    {
        $mediaModel = new Media;
        return $mediaModel->list();
    }

    public function ckeditor(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $imagePath = "files/ckeditor/{$year}/{$month}/";
            $request->file('upload')->move($imagePath, $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset($imagePath . $fileName);
            $msg = 'تصویر با موفقیت بارگذاری شد.';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function dropzone(Request $request)
    {
        $location = 'files/product/gallery';
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move($location, $filename);
        $filepath = $location . '/' . $filename;
        $media = Media::create([
            'user_id' => Auth::user()->id,
            'url' => $filepath,
            'name' => $file->getClientOriginalName(),
            'type' => 'attachment',
            //'size' => $file->getSize(),
            'ext' => $extension,
        ]);
        return response()->json(['photo_id' => $media->id]);
    }

}
