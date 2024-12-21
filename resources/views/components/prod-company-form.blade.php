@props(['action', 'method', 'prodCompany'])

<form method="POST" action="{{ $action }}">
    @csrf
    @method($method)
    
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $prodCompany->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
    
    <div class="mb-4">
        <label for="company_value" class="block text-sm font-medium text-gray-700">Company Value</label>
        <input type="number" name="company_value" id="company_value" value="{{ old('company_value', $prodCompany->company_value) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
    
    <div class="flex items-center justify-end">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save Changes
        </button>
    </div>
</form>
