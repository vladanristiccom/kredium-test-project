<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">{{ __("Manage Client Cash Loan") }}</h2>

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

                    <form action="{{ route('cash_loan.update', $client->id ) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input hidden name="cash_loan_id" value="{{ $cashLoan?->id }}">

                        <div class="mb-4">
                            <label for="loan_amount" class="block text-sm font-medium text-gray-700">{{ __("Loan Amount") }}</label>
                            <input type="number" step="0.01" id="loan_amount" name="loan_amount" value="{{ old('loan_amount', $cashLoan?->loan_amount) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                {{ __("Update Cash Loan") }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
