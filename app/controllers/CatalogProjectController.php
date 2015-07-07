<?php

class CatalogProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $items = Catalog::orderBy('created_at', 'desc')->get();
        return View::make('admin.pages.catalog.index')->with(['items' => $items]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.pages.catalog.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

        $catalog = new Catalog;
        $catalog->title = $inputs['title'];
        $catalog->description = $inputs['description'];
        $catalog->user_id = Auth::user()->id;
        $catalog->save();

        $project = new Project;
        $project->role = $inputs['role'];
        $project->customer = $inputs['customer'];
        $project->location = $inputs['location'];
        $project->start = $inputs['start-month'] . '-' . $inputs['start-year'];
        $project->end = (isset($inputs['not-ended']) && $inputs['not-ended']) ? 'present' : $inputs['end-month'] . '-' . $inputs['end-year'];
        $project->catalog_id = $catalog->id;
        $project->user_id = Auth::user()->id;
        $project->save();

        $pictures = $inputs['pictures'];
        Log::info(user_photo_path() . $catalog->id . '/');
        if (!File::isDirectory(user_photo_path() . $catalog->id . '/')) {
            File::makeDirectory(user_photo_path() . $catalog->id . '/', 0777, true, true);
        }
        if (Input::hasFile('pictures[]')) {
            foreach($pictures as $picture) {
                if ($picture != null) {
                    $image = Image::make($picture->getRealPath());
                    $fileName = str_replace(' ', '_', $picture->getClientOriginalName());
                    $image->resize(1024, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                        ->save(user_photo_path() . $catalog->id . '/' . $fileName)
                        ->resize(750, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '750-' . $fileName)
                        ->resize(500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '500-' . $fileName)
                        ->resize(250, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '250-' . $fileName);

                    $pic = new Pictures;
                    $pic->url = $fileName;
                    $pic->user_id = Auth::user()->id;
                    $pic->catalog_id = $catalog->id;
                    $pic->type = 'catalog';
                    $pic->save();
                }
            }
        }
        return Redirect::route('admin.catalog.index')->with('success', Lang::get('messages.catalog_created'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = Catalog::find($id);

        return View::make('admin.pages.catalog.edit')->with(array('item' => $item));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $inputs = Input::all();

        $catalog = Catalog::find($id);
        $catalog->title = $inputs['title'];
        $catalog->description = $inputs['description'];
        $catalog->user_id = Auth::user()->id;
        $catalog->save();

        $project = $catalog->project;
        if (empty($project)) {
            $project = new Project;
        } else {
            $project = Project::find($catalog->project->id);
        }
        $project->role = $inputs['role'];
        $project->customer = $inputs['customer'];
        $project->location = $inputs['location'];
        $project->start = $inputs['start-month'] . '-' . $inputs['start-year'];
        $project->end = (isset($inputs['not-ended']) && $inputs['not-ended']) ? 'present' : $inputs['end-month'] . '-' . $inputs['end-year'];
        $project->main_pic = $inputs['main_pic'];

        $project->user_id = Auth::user()->id;
        $project->save();

        $pictures = $inputs['pictures'];
        if (!File::isDirectory(user_photo_path() . $catalog->id . '/')) {
            File::makeDirectory(user_photo_path() . $catalog->id . '/', 0777, true, true);
        }
        if (isset($pictures) && count($pictures) > 0) {
            foreach($pictures as $picture) {
                if ($picture != null) {
                    $fileName = str_replace(' ', '_', $picture->getClientOriginalName());
                    $image = Image::make($picture->getRealPath());
                    $image->resize(1024, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                        ->save(user_photo_path() . $catalog->id . '/' . $fileName)
                        ->resize(750, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '750-' . $fileName)
                        ->resize(500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '500-' . $fileName)
                        ->resize(250, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '250-' . $fileName)
                        ->resize(75, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '75-' . $fileName);
                    $pic = new Pictures;
                    $pic->url = $fileName;
                    $pic->user_id = Auth::user()->id;
                    $pic->catalog_id = $catalog->id;
                    $pic->type = 'catalog';
                    $pic->save();
                }
            }
        }
        return Redirect::route('admin.catalog.index')->with('success', Lang::get('messages.catalog_updated'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$catalog = Catalog::find($id);
        $project = Project::find($catalog->project->id);

        $catalog->delete();
        $project->delete();

        return Redirect::route('admin.catalog.index')->with('success', Lang::get('messages.catalog_delete'));
	}

    public function delete($id) {
        $picture = Pictures::find($id);
        $picture->delete();

        return Redirect::route('admin.catalog.index')->with('success', Lang::get('messages.catalog_delete_picture'));
    }


}
