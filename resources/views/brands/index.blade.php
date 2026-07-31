@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-[#EE2726] pl-3">Brand List</h2>
                <button class="btn bg-[#EE2726] text-white border-none hover:bg-red-700 hover:border-none px-5" onclick="add_brand_modal.showModal()">+ Add Brand</button>
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
                                <button onclick="openEditModal({{ $brand->id }}, '{{ addslashes($brand->name) }}')" class="btn btn-sm border-2 border-[#f59e0b]/50 hover:bg-yellow-600 text-black px-2" title="Edit">📝</button>
                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this brand?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm border-2 border-[#ef4444]/50 hover:bg-red-700 text-black px-2" title="Delete">🗑️</button>
                                </form>
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

<!-- Add Brand Modal -->
<dialog id="add_brand_modal" class="modal backdrop-blur-lg bg-black/10">
    <div class="modal-box p-0 rounded-none max-w-2xl border border-white/40 shadow-2xl bg-white/80 backdrop-blur-xl">
        <!-- Modal Header -->
        <div class="border-b border-black px-4 py-3 relative">
            <h3 class="font-bold text-lg text-[#EE2726]">Add Brand</h3>
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-2 text-gray-500 hover:text-black hover:bg-gray-200">✕</button>
            </form>
        </div>

        <!-- Modal Body -->
        <div class="p-4 px-6">
            <p class="text-sm text-black mb-2">Fields marked with <span class="text-red-500 font-bold">*</span> are mandatory</p>

            <hr class="border-t border-dashed border-gray-500 mb-6">

            <form id="addBrandForm" action="{{ route('brands.store') }}" method="POST">
                @csrf
                <div class="flex items-center mb-1">
                    <label class="text-sm font-medium text-black w-32">Brand Name <span class="text-red-500 font-bold">*</span></label>
                    <input type="text" name="name" class="input input-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#EE2726] focus:ring-1 focus:ring-[#EE2726] bg-white text-black" />
                </div>
                <div class="flex pl-32 mb-4 min-h-[1.25rem]">
                    <span id="errorMessage" class="text-red-500 text-sm font-medium"></span>
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

<!-- Edit Brand Modal -->
<dialog id="edit_brand_modal" class="modal backdrop-blur-lg bg-black/10">
    <div class="modal-box p-0 rounded-none max-w-2xl border border-white/40 shadow-2xl bg-white/80 backdrop-blur-xl">
        <!-- Modal Header -->
        <div class="border-b border-black px-4 py-3 relative">
            <h3 class="font-bold text-lg text-[#f59e0b]">Edit Brand</h3>
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-2 text-gray-500 hover:text-black hover:bg-gray-200">✕</button>
            </form>
        </div>

        <!-- Modal Body -->
        <div class="p-4 px-6">
            <p class="text-sm text-black mb-2">Fields marked with <span class="text-red-500 font-bold">*</span> are mandatory</p>

            <hr class="border-t border-dashed border-gray-500 mb-6">

            <form id="editBrandForm" method="POST">
                @csrf
                @method('PUT')
                <div class="flex items-center mb-1">
                    <label class="text-sm font-medium text-black w-32">Brand Name <span class="text-red-500 font-bold">*</span></label>
                    <input type="text" id="edit_name" name="name" class="input input-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#f59e0b] focus:ring-1 focus:ring-[#f59e0b] bg-white text-black" />
                </div>
                <div class="flex pl-32 mb-4 min-h-[1.25rem]">
                    <span id="editErrorMessage" class="text-red-500 text-sm font-medium"></span>
                </div>

                <div class="flex pl-32">
                    <button type="submit" class="btn bg-[#f59e0b] hover:bg-yellow-600 text-white border-none rounded-md px-8 min-h-0 h-9 font-normal">Update</button>
                </div>
            </form>
        </div>

        <!-- Click outside to close -->
        <form method="dialog" class="modal-backdrop">
            <button class="cursor-default">close</button>
        </form>
    </div>
</dialog>

<script>
    const brands = @json($brands);

    document.getElementById('addBrandForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const nameInput = document.querySelector('input[name="name"]');
        const name = nameInput.value.trim();
        const errorElement = document.getElementById('errorMessage');
        errorElement.textContent = '';

        // Validation
        if (!name) {
            errorElement.textContent = 'Brand name is mandatory';
            return;
        }
        if (name.length > 50) {
            errorElement.textContent = 'the input should less then 50 char.';
            return;
        }
        if (!/^[a-zA-Z0-9_-]+$/.test(name)) {
            errorElement.textContent = 'Brand name can only allow alphanumeric characters, "_", "-"';
            return;
        }
        const isDuplicate = brands.some(b => b.name.toLowerCase() === name.toLowerCase());
        if (isDuplicate) {
            errorElement.textContent = 'Duplicate brand name will not be allowed';
            return;
        }

        // If validation passes, submit the native form
        e.target.submit();
    });

    function openEditModal(id, name) {
        const modal = document.getElementById('edit_brand_modal');
        const form = document.getElementById('editBrandForm');
        const nameInput = document.getElementById('edit_name');
        const errorElement = document.getElementById('editErrorMessage');

        // Reset error
        errorElement.textContent = '';

        // Set values
        nameInput.value = name;
        form.action = `/brands/${id}`;
        nameInput.dataset.original = name; // store original name to ignore duplicate check for itself

        modal.showModal();
    }

    document.getElementById('editBrandForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const nameInput = document.getElementById('edit_name');
        const name = nameInput.value.trim();
        const originalName = nameInput.dataset.original;
        const errorElement = document.getElementById('editErrorMessage');
        errorElement.textContent = '';

        // Validation
        if (!name) {
            errorElement.textContent = 'Brand name is mandatory';
            return;
        }
        if (name.length > 50) {
            errorElement.textContent = 'the input should less then 50 char.';
            return;
        }
        if (!/^[a-zA-Z0-9_-]+$/.test(name)) {
            errorElement.textContent = 'Brand name can only allow alphanumeric characters, "_", "-"';
            return;
        }

        // Only check for duplicate if the name actually changed
        if (name.toLowerCase() !== originalName.toLowerCase()) {
            const isDuplicate = brands.some(b => b.name.toLowerCase() === name.toLowerCase());
            if (isDuplicate) {
                errorElement.textContent = 'Duplicate brand name will not be allowed';
                return;
            }
        }

        // If validation passes, submit the native form
        e.target.submit();
    });
</script>
@endsection