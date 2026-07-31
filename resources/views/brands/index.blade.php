@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-[#EE2726] pl-3">Brand List</h2>
                </div>

                <div class="overflow-x-auto rounded-box border border-gray-200 shadow-sm">
                    <table class="table table-zebra w-full border-collapse">
                        <thead class="bg-[#EE2726] text-white text-base">
                            <tr>
                                <th class="w-16 border border-gray-200">SL</th>
                                <th class="border border-gray-200">Name</th>
                                <th class="text-center w-48 border border-gray-200">Entry Date</th>
                                <th class="text-center w-32 border border-gray-200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($brands as $index => $brand)
                                <tr class="even:bg-gray-100 hover:bg-[#FEE5E5] transition-colors duration-200">
                                    <th class="border border-gray-200">{{ $index + 1 }}</th>
                                    <td class="border border-gray-200 font-medium">{{ $brand->name }}</td>
                                    <td class="text-center border border-gray-200">
                                        {{ \Carbon\Carbon::parse($brand->entry_date)->format('M d, Y') }}
                                    </td>
                                    <td class="text-center border border-gray-200">
                                        <button class="btn btn-sm btn-ghost hover:bg-blue-100 text-blue-600 px-2" title="Edit">📝</button>
                                        <button class="btn btn-sm btn-ghost hover:bg-red-100 text-red-600 px-2" title="Delete">🗑️</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-gray-500">No brands found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
