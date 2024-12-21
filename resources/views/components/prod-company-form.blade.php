@props(['action', 'method', 'movie', 'prodCompany'])

<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)

    <!-- Company Name -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            value="{{ old('name', $prodCompany->name ?? '') }}"
            maxlength="25" 
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required>
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Company Value -->
    <div class="mb-4">
        <label for="company_value" class="block text-sm font-medium text-gray-700">Company Value (Millions)</label>
        <input 
            type="number"
            name="company_value" 
            id="company_value" 
            value="{{ old('company_value', $prodCompany->company_value ?? '') }}"
            min="1"
            max="20000"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required>
        @error('company_value')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <x-primary-button>
            Update
    </x-primary-button>
</form>
