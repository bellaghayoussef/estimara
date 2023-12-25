<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\shop;
use Illuminate\Http\Request;
use Exception;

class ShopsController extends Controller
{

    /**
     * Display a listing of the shops.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $shops = shop::paginate(25);

        return view('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new shop.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('shops.create');
    }

    /**
     * Store a new shop in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            shop::create($data);

            return redirect()->route('shops.shop.index')
                ->with('success_message', trans('shops.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('shops.unexpected_error')]);
        }
    }

    /**
     * Display the specified shop.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $shop = shop::findOrFail($id);

        return view('shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified shop.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $shop = shop::findOrFail($id);
        

        return view('shops.edit', compact('shop'));
    }

    /**
     * Update the specified shop in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $shop = shop::findOrFail($id);
            $shop->update($data);

            return redirect()->route('shops.shop.index')
                ->with('success_message', trans('shops.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('shops.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified shop from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $shop = shop::findOrFail($id);
            $shop->delete();

            return redirect()->route('shops.shop.index')
                ->with('success_message', trans('shops.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('shops.unexpected_error')]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'string|min:1|max:255|nullable',
            'reserved' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
