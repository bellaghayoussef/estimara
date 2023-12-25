<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use Illuminate\Http\Request;
use Exception;

class DemandesController extends Controller
{

    /**
     * Display a listing of the demandes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $demandes = Demande::paginate(25);

        return view('demandes.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new demande.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('demandes.create');
    }

    /**
     * Store a new demande in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Demande::create($data);

            return redirect()->route('demandes.demande.index')
                ->with('success_message', trans('demandes.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('demandes.unexpected_error')]);
        }
    }

    /**
     * Display the specified demande.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $demande = Demande::findOrFail($id);

        return view('demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified demande.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $demande = Demande::findOrFail($id);
        

        return view('demandes.edit', compact('demande'));
    }

    /**
     * Update the specified demande in the storage.
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
            
            $demande = Demande::findOrFail($id);
            $demande->update($data);

            return redirect()->route('demandes.demande.index')
                ->with('success_message', trans('demandes.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('demandes.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified demande from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $demande = Demande::findOrFail($id);
            $demande->delete();

            return redirect()->route('demandes.demande.index')
                ->with('success_message', trans('demandes.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('demandes.unexpected_error')]);
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
            'email' => 'nullable',
            'phone' => 'string|min:1|nullable',
            'company' => 'string|min:1|nullable',
            'type' => 'string|min:1|nullable',
            'discription' => 'string|min:1|nullable',
            'file' => ['file','nullable'],
            'shop1' => 'string|min:1|nullable',
            'shop2' => 'string|min:1|nullable',
            'shop3' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);
        if ($request->has('custom_delete_file')) {
            $data['file'] = null;
        }
        if ($request->hasFile('file')) {
            $data['file'] = $this->moveFile($request->file('file'));
        }

        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
        
        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }

}
