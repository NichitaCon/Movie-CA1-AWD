@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $movie->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('name')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image_id" class="block text-sm font-medium text-gray-700">Movie Image</label>
        <input 
            type="file"
            name="image_id"
            id="image_id"
            {{ isset($movie) ? '' : 'required'}}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($movie->image_id)
        <div class="mb-4">
            <img src="{{ asset($movie->image_id)}}" alt="Movie image" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($movie) ? 'Update Movie' : 'Add Movie'}}
        </x-primary-button>
    </div>
</form>