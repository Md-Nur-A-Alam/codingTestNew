@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-[#EE2726] pl-3">Item List</h2>
                    <button class="btn bg-[#EE2726] text-white border-none hover:bg-red-700 hover:border-none px-5" onclick="add_item_modal.showModal()">+ Add Item</button>
                </div>

                <div class="overflow-x-auto rounded-box border border-gray-200 shadow-sm">
                    <table class="table table-zebra w-full border-collapse">
                        <thead class="bg-[#EE2726] text-white text-base">
                            <tr>
                                <th class="w-16 border border-gray-200">SL</th>
                                <th class="border border-gray-200">Brand Name</th>
                                <th class="border border-gray-200">Model Name</th>
                                <th class="border border-gray-200">Item Name</th>
                                <th class="text-center w-48 border border-gray-200">Entry Date</th>
                                <th class="text-center w-32 border border-gray-200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items_display as $index => $item)
                                <tr class="even:bg-gray-100 hover:bg-[#FEE5E5] transition-colors duration-200">
                                    <th class="border border-gray-200">{{ $index + 1 }}</th>
                                    <td class="border border-gray-200 font-medium">{{ $item->brand_name }}</td>
                                    <td class="border border-gray-200 font-medium">{{ $model->model_name ?? $item->model_name }}</td>
                                    <td class="border border-gray-200 font-medium">{{ $item->item_name }}</td>
                                    <td class="text-center border border-gray-200">
                                        {{ \Carbon\Carbon::parse($item->entry_date)->format('M d, Y') }}
                                    </td>
                                    <td class="text-center border border-gray-200">
                                        <button class="btn btn-sm btn-ghost hover:bg-blue-100 text-blue-600 px-2" title="Edit">📝</button>
                                        <button class="btn btn-sm btn-ghost hover:bg-red-100 text-red-600 px-2" title="Delete">🗑️</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">No items found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Add Item Modal -->
    <dialog id="add_item_modal" class="modal backdrop-blur-lg bg-black/10">
        <div class="modal-box p-0 rounded-none max-w-2xl border border-white/40 shadow-2xl bg-white/80 backdrop-blur-xl">
            <!-- Modal Header -->
            <div class="border-b border-black px-4 py-3 relative">
                <h3 class="font-bold text-lg text-[#EE2726]">Add Item</h3>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-2 text-gray-500 hover:text-black hover:bg-gray-200">✕</button>
                </form>
            </div>
            
            <!-- Modal Body -->
            <div class="p-4 px-6">
                <p class="text-sm text-black mb-2">Fields marked with <span class="text-red-500 font-bold">*</span> are mandatory</p>
                
                <hr class="border-t border-dashed border-gray-500 mb-6">
                
                <form method="POST" action="#">
                    @csrf
                    <div class="flex items-center mb-6">
                        <label class="text-sm font-medium text-black w-32">Brand Name <span class="text-red-500 font-bold">*</span></label>
                        <select name="brand_id" required class="select select-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#EE2726] focus:ring-1 focus:ring-[#EE2726] bg-white text-black font-normal">
                            <option value="" disabled selected>Select a brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="flex items-center mb-6">
                        <label class="text-sm font-medium text-black w-32">Model Name <span class="text-red-500 font-bold">*</span></label>
                        <select name="model_id" required class="select select-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#EE2726] focus:ring-1 focus:ring-[#EE2726] bg-white text-black font-normal">
                            <option value="" disabled selected>Select a model</option>
                            @foreach($modelsList as $modelOption)
                                <option value="{{ $modelOption->id }}">{{ $modelOption->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="flex items-center mb-6">
                        <label class="text-sm font-medium text-black w-32">Item Name <span class="text-red-500 font-bold">*</span></label>
                        <input type="text" name="name" required class="input input-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#EE2726] focus:ring-1 focus:ring-[#EE2726] bg-white text-black" />
                    </div>
                    
                    <div class="flex pl-32">
                        <button type="submit" class="btn bg-[#EE2726] hover:bg-red-700 text-white border-none rounded-md px-8 min-h-0 h-9 font-normal">Add</button>
                    </div>
                </form>
            </div>

            <!-- Click outside to close -->
            <form method="dialog" class="modal-backdrop">
                <button class="cursor-default">close</button>
            </form>
        </div>
    </dialog>
@endsection
