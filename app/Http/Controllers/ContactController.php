<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $contacts = Contact::query();
        $contacts = $contacts->where('user_id', $request->user()->id);

        if ($keyword = request('search')) {
            $contacts->where('name', 'LIKE', "%{$keyword}%")->orWhere('email', 'LIKE', "%{$keyword}%");
        }

        $contacts = $contacts->paginate(10);
        return view('home', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request, Contact $contact)
    {
        $validData = $request->validate([
            'avatar' => ['required'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'gender' => ['required', 'string'],
        ]);

        $validData['avatar'] = Storage::disk('public')->putFile('avatars', $validData['avatar']);
        $validData['user_id'] = $request->user()->id;
        $contact->create($validData);

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Contact $contact)
    {
        return view('edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validDate = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'gender' => ['required', 'string'],
        ]);

        if ($request->avatar) {
            $imgValidated = $request->validate([
                'avatar' => 'file|max:512'
            ]);
            $imgValidated['avatar'] = Storage::disk('public')->putFile('avatars', $request->avatar);
            $validDate = array_merge($validDate, $imgValidated);
        }

        Contact::find($id)->update($validDate);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect('/');
    }
}
