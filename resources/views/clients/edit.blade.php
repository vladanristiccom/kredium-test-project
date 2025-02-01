<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex mb-4" style="justify-content: space-between">
                        <div>
                            <h2 class="text-2xl font-semibold">{{ __("Edit Client") }}</h2>
                        </div>
                        <div>
                            <a href="{{ route('home-loan.edit', $client->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 mr-2">
                                Manage Home Loan
                            </a>

                            <a href="{{ route('cash_loan.edit', $client->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Manage Cash Loan
                            </a>
                        </div>

                    </div>

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-500 text-white rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">{{ __("First Name") }}</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $client->first_name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">{{ __("Last Name") }}</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $client->last_name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __("Email") }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $client->email) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">{{ __("Phone") }}</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $client->phone) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
                        </div>

                            <div class="col-span-6 p-4">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    {{ __("Update Client") }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
