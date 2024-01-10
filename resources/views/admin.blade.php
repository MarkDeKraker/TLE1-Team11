@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <div class="overflow-x-auto">
        <table class="w-2/3 mx-auto border border-orange-500">
            <caption class="border border-orange-500 p-2 bg-orange-200">
                <form method="GET" action="{{ route('admin.index') }}" >
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" id="search" name="search" placeholder="Zoeken op naam of E-mail"
                           class="p-2 border border-orange-500 rounded-md w-2/3">
                    <button type="submit" class="bg-orange-500 text-white rounded-md px-4 py-2 mt-2">Search</button>
                </form>

            </caption>
            <thead class="bg-orange-200">
                <tr>
                    <th class="p-3 border-b border-orange-500 text-center">Gebruikersnaam</th>
                    <th class="p-3 border-b border-orange-500 text-center">E-mail</th>
                    <th class="p-3 border-b border-orange-500 text-center">Rollen</th>
                    <th class="p-3 border-b border-orange-500 text-center">Moderator rol aan/uit zetten</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)

                    <tr>
                        <td class="p-3 border-b border-orange-500 text-center">{{ $user->name }}</td>
                        <td class="p-3 border-b border-orange-500 text-center">{{ $user->email }}</td>
                        <td class="p-3 border-b border-orange-500 text-center">
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        @if($user->id !== 1)
                            <td class="p-3 border-b border-t border-orange-500 text-center">
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
<br>
    <br>
    <!-- Subjects Section -->
    <!-- Subjects Section -->
    <div>
        <br>
        <!-- Display Subjects -->
        <table class="w-2/3 mx-auto border border-orange-500">
            <thead>
            <tr>
                <th class="p-3 border-b bg-orange-200 border-orange-500 text-left">Lijst met onderwerpen</th>
                <th class="p-3 border-b bg-orange-200 text-left border-orange-500">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td class="p-3 border-b border-orange-500 text-left">{{ $subject->subject }}</td>
                    <td class="p-3 border-b  border-orange-500 text-left">
                        <span>
                            <a href="#" class="bg-red-600 text-white w-8 rounded-2xl mr-3 p-2 hover:bg-red-700" onclick="confirmDelete('{{ $subject->id }}')"> <i class="fa-solid fa-trash text-amber-50"></i> Delete</a>
                            <form id="delete-form-{{ $subject->id }}" action="{{ route('admin.delete-subject', $subject->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Add Subject Form -->
        <form method="POST" action="{{ route('admin.store-subject') }}" class="w-2/3 mx-auto mt-4 bg-orange-200 p-4 border border-orange-500 rounded-md">
            @csrf
            <label for="subject" class="block text-orange-500">Nieuw onderwerp aanmaken</label>
            <input type="text" id="subject" name="subject" placeholder="Naam van het onderwerp..." class="p-2 border border-orange-500 rounded-md w-full">
            <button type="submit" class="bg-orange-500 text-white rounded-md px-4 py-2 mt-2">Onderwerp toevoegen</button>
        </form>

    </div>


    <script>
        function confirmDelete(subjectId) {
            var confirmation = confirm('Are you sure you want to delete this subject?');

            if (confirmation) {
                document.getElementById('delete-form-' + subjectId).submit();
            }
        }
    </script>

@endsection
