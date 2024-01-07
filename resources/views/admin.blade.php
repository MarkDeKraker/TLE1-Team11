@extends('layouts.app')

@section('content')
    <h1>Admin: User Management</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('admin.index') }}" class="mb-4">
        <label for="search" class="sr-only">Search</label>
        <input type="text" id="search" name="search" placeholder="Search by name or email"
               class="p-2 border border-gray-300 rounded-md w-half">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md ml-2">Search</button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="p-3 border-b text-center">Name</th>
                    <th class="p-3 border-b text-center">Email</th>
                    <th class="p-3 border-b text-center">Roles</th>
                    <th class="p-3 border-b text-center">Toggle Moderator</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)

                    <tr>
                        <td class="p-3 border-b text-center">{{ $user->name }}</td>
                        <td class="p-3 border-b text-center">{{ $user->email }}</td>
                        <td class="p-3 border-b text-center">
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        @if($user->id !== 1)
                        <td class="p-3 border-b text-center">
                            <form method="POST" action="{{ route('admin.assign', $user->id) }}">
                                @csrf
                                <button type="submit"  class="p-1 m-1  bg-orange-500 hover:bg-orange-300 rounded-2xl text-white cursor-pointer
                                        transition-all duration-300 ease-in-out">
                                    {{ $user->hasRole('moderator') ? 'Remove Moderator' : 'Assign Moderator' }}
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
