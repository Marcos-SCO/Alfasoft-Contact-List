<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderby('updated_at', 'desc')
            ->paginate(8);

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:6',
            'contact' => 'required|numeric|digits:9|unique:contacts',
            'email' => 'required|email|unique:contacts',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contract added successfully!');
    }

    public function show(Contact $contact)
    {

        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {

        $validated = $request->validate([
            'name' => 'required|min:6',
            'contact' => ['required', 'numeric', 'digits:9', Rule::unique('contacts')->ignore($contact->id)],
            'email' => ['required', 'email', Rule::unique('contacts')->ignore($contact->id)],
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contract updated successfully!');;
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contract was removed successfully!');
    }
}
