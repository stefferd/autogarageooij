<?php

class FrontController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
        $page = Page::find(1);
        $menuItems = Page::all();
		return View::make('front.pages.index', compact('page', 'portfolioItems', 'menuItems'));
	}

    public function test() {
        $page = Page::find(1);
        return View::make('front.pages.index')->with(['page' => $page]);
    }

    private function getMovie($type = 'short') {
        $shortMovie = '/assets/mov/short.mp4';
        $longMovie = '/assets/mov/long.mp4';

        if ($type == 'long') {
            return $longMovie;
        }
        return $shortMovie;
    }

    public function page($pageName) {
        $pageName = str_replace('-', ' ', $pageName);
        $page = Page::where('path', 'LIKE', $pageName)->first();
        $menuItems = Page::all();
        return View::make('front.pages.page', compact('page', 'menuItems'));
    }

    public function subscribe() {
        $rules = array(
            'email' => 'required|email|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);
        if (!$validator->fails()) {
            $subscriber = new Subscribers;
            $subscriber->name = Input::get('name');
            $subscriber->email = Input::get('email');
            $subscriber->save();
        }
        return Redirect::route('front.inventory')->with('success','You have been subscribed to our newsletter.');
    }

    public function contact() {
        $rules = array(
            'name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'message' => 'required|min:10'
        );

        $pageName = 'contact';
        $page = Page::where('title', 'LIKE', $pageName)->first();

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return View::make('front.pages.page')->withErrors($validator)->With(Input::all())->with(['page' => $page]);
        } else {
            $settingsEmail = Settings::where('key', '=', 'contact_email')->first();
            $settingsEmailName = Settings::where('key', '=', 'contact_name')->first();
            $data = array(
                'subject' => 'Contact form dexperts.nl',
                'to' => $settingsEmail->value,
                'to_name' => $settingsEmailName->value,
                'from_message' => Input::get('message'),
                'from_name' => Input::get('name'),
                'from' => Input::get('email')
            );
            Mail::queue('emails.front.contact', $data, function($message) use ($data)
            {
                $message->to($data['to'], $data['to_name'])->from($data['from'], $data['from_name'])->subject($data['subject']);
            });
            return View::make('front.pages.page')->with(['page' => $page, 'message' => 'Uw gegevens zijn verzonden, ik zal zo snel mogelijk contact met u opnemen.']);
        }
    }

    public function inventory() {
        Session::flush();
        $items = Catalog::orderBy('created_at', 'desc')->get();
        $page = Page::where('type', '=', 3)->firstOrFail();
        return View::make('front.pages.inventory', compact('items', 'page'));
    }

    public function filter($filter = null, $value = null) {
        if ($filter != null) {
            $value = str_replace('-', ' ', $value);
            if ($filter === 'brand') {
                Session::forget('filter.brand');
                Session::push('filter.brand', $value);
            } else if ($filter === 'transmission') {
                Session::forget('filter.transmission');
                Session::push('filter.transmission', $value);
            }
        } else {
            if (Input::get('brand')) {
                Session::forget('filter.brand');
                Session::push('filter.brand', Input::get('brand'));
            }
            if (Input::get('transmission')) {
                Session::forget('filter.transmission');
                Session::push('filter.transmission', Input::get('transmission'));
            }
        }

        if (Session::has('filter')) {
            if (Session::has('filter.brand') && Session::has('filter.transmission')) {
                $entries = Catalog::whereHas('car', function($query) {
                    $query->where('transmission', 'like', Session::get('filter.transmission'))
                        ->where('brand', 'like', Session::get('filter.brand'));
                })->orderBy('created_at', 'desc')->get();
            } else {
                if (Session::has('filter.brand')) {
                    $entries = Catalog::whereHas('car', function($query) {
                        $query->where('brand', 'like', Session::get('filter.brand'));
                    })->orderBy('created_at', 'desc')->get();
                } else {
                    $entries = Catalog::whereHas('car', function($query) {
                        $query->where('transmission', 'like', Session::get('filter.transmission'));
                    })->orderBy('created_at', 'desc')->get();
                }
            }
        } else {
            $entries = Catalog::with('car')->orderBy('created_at', 'desc')->get();
        }

        $page = Page::where('type', '=', 3)->firstOrFail();
        if (Session::has('filter.transmission')) {
            $brandsForFilter = DB::table('cars')->distinct('brand')->where('transmission', Session::get('filter.transmission.0'))->lists('brand');
        } else {
            $brandsForFilter = DB::table('cars')->distinct('brand')->lists('brand');
        }

        $menuItems = Page::all();

        return View::make('front.pages.inventory-filtered')->with(['entries' => $entries, 'page' => $page, 'filters' => Session::get('filter'), 'brandsForFilter' => $brandsForFilter, 'menuItems' => $menuItems]);
    }

    public function details($id) {
        $entry = Catalog::find($id);
        $menuItems = Page::all();
        $page = Page::where('type', '=', 3)->firstOrFail();
        return View::make('front.pages.details')->with(['entry' => $entry, 'page' => $page, 'menuItems' => $menuItems]);
    }

    public function detailsContact($id) {
        $rules = array(
            'name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'message' => 'required|min:10'
        );
        $page = Page::where('type', '=', 3)->first();
        $entry = Catalog::find($id);

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return View::make('front.pages.details')->withErrors($validator)->with(Input::all())->with(['entry' => $entry, 'page' => $page]);
        } else {
            $settingsEmail = Settings::where('key', '=', 'contact_email')->first();
            $settingsEmailName = Settings::where('key', '=', 'contact_name')->first();
            $data = array(
                'subject' => 'Inventory contact Classiccarseurope.eu',
                'to' => $settingsEmail->value,
                'to_name' => $settingsEmailName->value,
                'from_message' => Input::get('message'),
                'from_name' => Input::get('name'),
                'from' => Input::get('email'),
                'phone' => Input::get('phone')
            );
            Mail::queue('emails.front.contact', $data, function($message) use ($data)
            {
                $message->to($data['to'], $data['to_name'])->from($data['from'], $data['from_name'])->subject($data['subject']);
            });
            return View::make('front.pages.details')->with(['entry' => $entry, 'page' => $page, 'message' => 'Mail send successfully']);
        }
    }


}
