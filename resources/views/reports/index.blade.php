<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold">Loan Report</h2>

                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-2 text-left">Product Type</th>
                            <th class="px-4 py-2 text-left">Product Value</th>
                            <th class="px-4 py-2 text-left">Creation Date</th>
                        </tr>
                        </thead>
                        @foreach($loans as $loan)
                        <tr class="bg-white-200">
                            <td class="border border-gray-300 px-4 py-2">{{ $loan['product_type'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ number_format($loan['product_value'], 2) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $loan['created_at']->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="flex justify-start mt-4">
                        <a href="{{ route('report.export') }}"
                           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Download Daily Report
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
