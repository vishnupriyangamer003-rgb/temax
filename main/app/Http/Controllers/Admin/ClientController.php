<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Support\Uploader;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::ordered()->get();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.form', ['client' => null]);
    }

    public function store(Request $request)
    {
        $this->save($request, new Client());

        return redirect()->route('admin.clients.index')->with('success', 'Client / Brand created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.form', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $this->save($request, $client);

        return redirect()->route('admin.clients.index')->with('success', 'Client / Brand updated successfully.');
    }

    public function destroy(Client $client)
    {
        if ($client->logo && !str_starts_with($client->logo, 'assets/')) {
            Uploader::delete($client->logo);
        }

        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client / Brand deleted successfully.');
    }

    private function save(Request $request, Client $client)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'url'        => 'nullable|url|max:255',
            'logo_file'  => ($client->exists ? 'nullable' : 'required_without:logo') . '|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'sort_order' => 'nullable|integer|min:0|max:9999',
            'is_active'  => 'nullable|boolean',
        ]);

        $client->fill([
            'name'       => $request->input('name'),
            'url'        => $request->input('url'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'is_active'  => $request->boolean('is_active'),
        ]);

        if ($request->hasFile('logo_file')) {
            if ($client->logo && !str_starts_with($client->logo, 'assets/')) {
                Uploader::delete($client->logo);
            }
            $client->logo = Uploader::upload($request->file('logo_file'), 'clients');
        } elseif (!$client->exists && $request->filled('logo')) {
            $client->logo = $request->input('logo');
        }

        $client->save();
    }
}
