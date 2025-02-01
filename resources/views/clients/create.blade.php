<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <h2 class="text-2xl font-bold mb-4">Create New Client</h2>

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-500 text-white rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf

                        <!-- First Name -->
                        <div class="mb-4">
                            <label class="block font-medium">First Name</label>
                            <input type="text" name="first_name" class="w-full p-2 rounded bg-white text-black border border-gray-400" required>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label class="block font-medium">Last Name</label>
                            <input type="text" name="last_name" class="w-full p-2 rounded bg-white text-black border border-gray-400" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block font-medium">Email</label>
                            <input type="email" name="email" class="w-full p-2 rounded bg-white text-black border border-gray-400">
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label class="block font-medium">Phone</label>
                            <input type="text" name="phone" class="w-full p-2 rounded bg-white text-black border border-gray-400">
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Create Client
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
