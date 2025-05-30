<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{

	protected function validator(array $data, $id = null)
	{
		Validator::extend('ascii_only', function ($attribute, $value, $parameters) {
			return !preg_match('/[^x00-x7F\-]/i', $value);
		});

		// Create Rules
		if ($id == null) {
			return Validator::make($data, [
				'title'      =>      'required',
				'slug'       =>      'required|ascii_only|alpha_dash',
				'content'    =>      'required',
			]);

			// Update Rules
		} else {
			return Validator::make($data, [
				'title'      =>      'required',
				'slug'       =>      'required|ascii_only|alpha_dash',
				'content'    =>      'required',
			]);
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Pages::all();
		return view('admin.pages')->withData($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.add-page');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$validator = $this->validator($input);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

		Pages::create($input);

		return redirect('panel/admin/pages')->withSuccessMessage(__('admin.success_add'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($page)
	{
		$response = Pages::whereLang(session('locale'))
			->where('slug', '=', $page)
			->first();

		if (! $response) {
			$response = Pages::whereLang(env('DEFAULT_LOCALE'))
				->where('slug', '=', $page)
				->first();
		}

		if (! $response) {
			abort(404);
		}

		if (
			$response->access == 'creators' && auth()->guest()
			|| $response->access == 'creators' && auth()->check() && auth()->user()->verified_id != 'yes'
		) {
			abort(404);
		}

		if ($response->access == 'members' && auth()->guest()) {
			abort(404);
		}

		return view('pages.show')->withResponse($response);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Pages::findOrFail($id);
		return view('admin.edit-page')->withData($data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$page = Pages::findOrFail($id);
		$input = $request->all();

		$validator = $this->validator($input, $id);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

		$page->fill($input)->save();

		return redirect('panel/admin/pages')->withSuccessMessage(__('admin.success_update'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = Pages::findOrFail($id);
		$page->delete();

		return redirect('panel/admin/pages');
	}


}
