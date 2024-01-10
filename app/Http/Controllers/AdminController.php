<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Subject;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        // Get the search query from the request
        $search = $request->input('search');

        // If a search query is provided, filter users based on the query
        if ($search) {
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Get the roles
        $moderatorRole = Role::findByName('moderator');
        $userRole = Role::findByName('user');

        // Get the filtered users
        $users = $users->get();
        $subjects = Subject::all();
        $ages = Age::all();

        return view('admin', compact('ages','subjects','users', 'moderatorRole', 'userRole'));
    }

    public function assign(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->hasRole('moderator')) {
            $user->removeRole('moderator');
            $action = 'removed';
        } else {
            $user->assignRole('moderator');
            $action = 'added';
        }

        return redirect()->route('admin.index')->with('success', "Moderator role $action for $user->name.");
    }
    public function storeSubject(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
        ]);

        Subject::create([
            'subject' => $request->input('subject'),
        ]);

        return redirect()->route('admin.index')->with('success', 'Subject added successfully.');
    }
    public function deleteSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.index')->with('success', 'Subject deleted successfully.');
    }

}
