<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

use App\Models\Tyre;
use App\Models\Media;
use App\Models\Category;


class TyreController extends Controller
{
    public function index()
    {
        $tyres = Tyre::all();
        return view("admin.tyre.index", compact('tyres'));
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.tyre.create", compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:tyres,slug',
            'price' => 'required',

        ]);

        try {
            $tyre = new Tyre;
            $tyre->title = $validated['title'];
            $tyre->slug = Str::slug($validated['slug']);
            $tyre->price = $validated['price'];
            $tyre->pattern = $request['pattern'];
            $tyre->brand = $request['brand'];
            $tyre->size = $request['size'];
            $tyre->type = $request['type'];
            $tyre->discount = $request['discount'];
            $tyre->description = $request['description'];
            $tyre->category_id = $request['category_id'];
            $tyre->save();

            if ($request->hasfile('files')) {
                $uploadedFiles = $request->file('files');
                foreach ($uploadedFiles as $file) {
                    $filetype = $file->getClientOriginalExtension();
                    $filename = time() . uniqid() . '.' . $filetype;
                    $file->move('uploads/tyre/', $filename);
                    Media::create([
                        'tyre_id' => $tyre->id,
                        'image' => $filename,
                    ]);
                }
            }

            return redirect('/admin/tyres')->with("success", "Tyre created successfully.");
        } catch (Exception $ex) {
            return redirect()->back()->with("error", "Something went wrong while creating new tyre.");
        }
    }

    public function edit($id)
    {
        $tyre = Tyre::find($id);
        if ($tyre) {
            $categories = Category::all();
            return view("admin.tyre.edit", compact('tyre', 'categories'));
        } else {
            return redirect()->back()->with("error", "Tyre not found.");
        }
    }

    public function update(Request $request, $id)
    {
        $tyre = Tyre::find($id);

        if (!$tyre) {
            return redirect()->back()->with('error', 'Tyre not found.');
        }

        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:tyres,slug,' . $id,
            'price' => 'required',
        ]);

        try {
            $tyre->title = $validated['title'];
            $tyre->slug = Str::slug($validated['slug']);
            $tyre->price = $validated['price'];
            $tyre->pattern = $request['pattern'];
            $tyre->brand = $request['brand'];
            $tyre->size = $request['size'];
            $tyre->type = $request['type'];
            $tyre->discount = $request['discount'];
            $tyre->description = $request['description'];
            $tyre->category_id = $request['category_id'];
            $tyre->update();

            if ($request->hasfile('files')) {
                $uploadedFiles = $request->file('files');
                foreach ($uploadedFiles as $file) {
                    $filetype = $file->getClientOriginalExtension();
                    $filename = time() . uniqid() . '.' . $filetype;
                    $file->move('uploads/tyre/', $filename);
                    Media::create([
                        'tyre_id' => $tyre->id,
                        'image' => $filename,
                    ]);
                }
            }

            return redirect('/admin/tyres')->with('success', 'Tyre updated successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong while updating the tyre.');
        }
    }

    public function delete($id)
    {
        $tyre = Tyre::find($id);

        if (!$tyre) {
            return redirect()->back()->with('error', 'Tyre not found.');
        }

        try {
            $medias = $tyre->medias;
            if ($medias) {
                foreach ($medias as $media) {
                    $media->delete();
                }
            }

            $tyre->delete();

            return redirect('/admin/tyres')->with('success', 'Tyre deleted successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong while deleting the tyre.');
        }
    }
}
