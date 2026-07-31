@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-[#EE2726] pl-3">Model List</h2>
                    <button class="btn bg-[#EE2726] text-white border-none hover:bg-red-700 hover:border-none px-5" onclick="add_model_modal.showModal()">+ Add Model</button>
                </div>

                <div class="overflow-x-auto rounded-box border border-gray-200 shadow-sm">
                    <table class="table table-zebra w-full border-collapse">
                        <thead class="bg-[#EE2726] text-white text-base">
                            <tr>
                                <th class="w-16 border border-gray-200">SL</th>
                                <th class="border border-gray-200">Brand Name</th>
                                <th class="border border-gray-200">Model Name</th>
                                <th class="text-center w-48 border border-gray-200">Entry Date</th>
                                <th class="text-center w-32 border border-gray-200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($models_display as $index => $model)
                                <tr class="even:bg-gray-100 hover:bg-[#FEE5E5] transition-colors duration-200">
                                    <th class="border border-gray-200">{{ $index + 1 }}</th>
                                    <td class="border border-gray-200 font-medium">{{ $model->brand_name }}</td>
                                    <td class="border border-gray-200 font-medium">{{ $model->model_name }}</td>
                                    <td class="text-center border border-gray-200">
                                        {{ \Carbon\Carbon::parse($model->entry_date)->format('M d, Y') }}
                                    </td>
                                    <td class="text-center border border-gray-200">
                                        <button onclick="openEditModal({{ $model->id }}, {{ $model->brand_id }}, '{{ addslashes($model->model_name) }}')" class="btn btn-sm border-2 border-[#f59e0b]/50 hover:bg-yellow-600 text-black px-2" title="Edit">📝</button>
                                        <form action="{{ route('models.destroy', $model->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this model?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm border-2 border-[#ef4444]/50 hover:bg-red-700 text-black px-2" title="Delete">🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">No models found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Add Model Modal -->
    <dialog id="add_model_modal" class="modal backdrop-blur-lg bg-black/10">
        <div class="modal-box p-0 rounded-none max-w-2xl border border-white/40 shadow-2xl bg-white/80 backdrop-blur-xl">
            <!-- Modal Header -->
            <div class="border-b border-black px-4 py-3 relative">
                <h3 class="font-bold text-lg text-[#EE2726]">Add Model</h3>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-2 text-gray-500 hover:text-black hover:bg-gray-200">✕</button>
                </form>
            </div>
            
            <!-- Modal Body -->
            <div class="p-4 px-6">
                <p class="text-sm text-black mb-2">Fields marked with <span class="text-red-500 font-bold">*</span> are mandatory</p>
                
                <hr class="border-t border-dashed border-gray-500 mb-6">
                
                <form id="addModelForm" method="POST" action="{{ route('models.store') }}">
                    @csrf
                    <div class="flex items-center mb-1">
                        <label class="text-sm font-medium text-black w-32">Brand Name <span class="text-red-500 font-bold">*</span></label>
                        <select name="brand_id" required class="select select-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#EE2726] focus:ring-1 focus:ring-[#EE2726] bg-white text-black font-normal">
                            <option value="" disabled selected>Select a brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex pl-32 mb-2 min-h-[1.25rem]">
                        <span id="addBrandErrorMessage" class="text-red-500 text-sm font-medium"></span>
                    </div>
                    
                    <div class="flex items-center mb-1">
                        <label class="text-sm font-medium text-black w-32">Model Name <span class="text-red-500 font-bold">*</span></label>
                        <input type="text" name="name" required class="input input-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#EE2726] focus:ring-1 focus:ring-[#EE2726] bg-white text-black" />
                    </div>
                    <div class="flex pl-32 mb-4 min-h-[1.25rem]">
                        <span id="addNameErrorMessage" class="text-red-500 text-sm font-medium"></span>
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

    <!-- Edit Model Modal -->
    <dialog id="edit_model_modal" class="modal backdrop-blur-lg bg-black/10">
        <div class="modal-box p-0 rounded-none max-w-2xl border border-white/40 shadow-2xl bg-white/80 backdrop-blur-xl">
            <!-- Modal Header -->
            <div class="border-b border-black px-4 py-3 relative">
                <h3 class="font-bold text-lg text-[#f59e0b]">Edit Model</h3>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-2 text-gray-500 hover:text-black hover:bg-gray-200">✕</button>
                </form>
            </div>
            
            <!-- Modal Body -->
            <div class="p-4 px-6">
                <p class="text-sm text-black mb-2">Fields marked with <span class="text-red-500 font-bold">*</span> are mandatory</p>
                
                <hr class="border-t border-dashed border-gray-500 mb-6">
                
                <form id="editModelForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex items-center mb-1">
                        <label class="text-sm font-medium text-black w-32">Brand Name <span class="text-red-500 font-bold">*</span></label>
                        <select id="edit_brand_id" name="brand_id" required class="select select-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#f59e0b] focus:ring-1 focus:ring-[#f59e0b] bg-white text-black font-normal">
                            <option value="" disabled>Select a brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex pl-32 mb-2 min-h-[1.25rem]">
                        <span id="editBrandErrorMessage" class="text-red-500 text-sm font-medium"></span>
                    </div>

                    <div class="flex items-center mb-1">
                        <label class="text-sm font-medium text-black w-32">Model Name <span class="text-red-500 font-bold">*</span></label>
                        <input type="text" id="edit_name" name="name" required class="input input-sm rounded-none border border-solid border-gray-600 w-full max-w-sm focus:outline-none focus:border-[#f59e0b] focus:ring-1 focus:ring-[#f59e0b] bg-white text-black" />
                    </div>
                    <div class="flex pl-32 mb-4 min-h-[1.25rem]">
                        <span id="editNameErrorMessage" class="text-red-500 text-sm font-medium"></span>
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
        const models_display = @json($models_display);

        function openEditModal(id, brand_id, name) {
            const modal = document.getElementById('edit_model_modal');
            const form = document.getElementById('editModelForm');
            const nameInput = document.getElementById('edit_name');
            const brandSelect = document.getElementById('edit_brand_id');

            // Set values
            nameInput.value = name;
            brandSelect.value = brand_id;
            form.action = `/models/${id}`;
            nameInput.dataset.original = name; 

            modal.showModal();
        }

        function validateForm(formId, isEdit = false) {
            const form = document.getElementById(formId);
            const nameInput = form.querySelector('input[name="name"]');
            const name = nameInput.value.trim();
            const brandSelect = form.querySelector('select[name="brand_id"]');
            const brand_id = brandSelect.value;
            
            const nameError = form.querySelector(isEdit ? '#editNameErrorMessage' : '#addNameErrorMessage');
            const brandError = form.querySelector(isEdit ? '#editBrandErrorMessage' : '#addBrandErrorMessage');
            
            nameError.textContent = '';
            brandError.textContent = '';
            
            let isValid = true;
            
            if (!brand_id) {
                brandError.textContent = 'Please select a brand.';
                isValid = false;
            }

            if (!name) {
                nameError.textContent = 'Model name is mandatory.';
                isValid = false;
            } else if (name.length > 50) {
                nameError.textContent = 'The input should be less than 50 characters.';
                isValid = false;
            } else if (!/^[a-zA-Z0-9_\- ]+$/.test(name)) {
                nameError.textContent = 'Model name can only allow alphanumeric characters, spaces, "_", "-"';
                isValid = false;
            }

            if (isValid) {
                const isDuplicate = models_display.some(m => m.brand_id == brand_id && m.model_name.toLowerCase() === name.toLowerCase());
                if (isDuplicate && (!isEdit || name.toLowerCase() !== nameInput.dataset.original.toLowerCase())) {
                    nameError.textContent = 'Duplicate model name for this brand will not be allowed.';
                    isValid = false;
                }
            }

            return isValid;
        }

        document.getElementById('addModelForm').addEventListener('submit', function(e) {
            if (!validateForm('addModelForm', false)) {
                e.preventDefault();
            }
        });

        document.getElementById('editModelForm').addEventListener('submit', function(e) {
            if (!validateForm('editModelForm', true)) {
                e.preventDefault();
            }
        });
    </script>
@endsection
