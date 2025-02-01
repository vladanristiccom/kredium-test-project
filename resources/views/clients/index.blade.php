<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Clients") }}
                    <a href="{{ route('clients.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        {{ __("Create New Client") }}
                    </a>
                    <table class="min-w-full border-collapse table-auto">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 text-left border-b">First Name</th>
                            <th class="px-4 py-2 text-left border-b">Last Name</th>
                            <th class="px-4 py-2 text-left border-b">Email</th>
                            <th class="px-4 py-2 text-left border-b">Phone</th>
                            <th class="px-4 py-2 text-left border-b">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $client->first_name }}</td>
                                <td class="px-4 py-2 border-b">{{ $client->last_name }}</td>
                                <td class="px-4 py-2 border-b">{{ $client->email }}</td>
                                <td class="px-4 py-2 border-b">{{ $client->phone }}</td>
                                <td class="px-4 py-2 border-b">
                                    <a href="{{ route('clients.edit', $client->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                        {{ __("Edit") }}
                                    </a>

                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                            {{ __("Delete") }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
