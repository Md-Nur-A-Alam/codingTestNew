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
                
                <form id="addBrandForm">
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
            
            // AJAX Submit
            fetch("{{ route('brands.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ name: name })
            })
            .then(async response => {
                if (!response.ok) {
                    if (response.status === 422) {
                        const errorData = await response.json();
                        throw new Error(errorData.errors.name[0]);
                    }
                    throw new Error('An error occurred while adding the brand.');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Brand has been added successfully');
                    document.getElementById('add_brand_modal').close();
                    window.location.href = "{{ route('brands.index') }}";
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorElement.textContent = error.message;
            });
        });
    </script>
@endsection
