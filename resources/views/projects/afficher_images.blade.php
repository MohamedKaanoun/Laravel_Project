<x-layout>
  <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Liste des Images</h1>
    <div class="grid grid-cols-3 gap-4">
      @foreach ($images as $image)
        <div class="relative w-full h-48">
          <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image" class="w-full h-full object-cover rounded-lg">
          <!-- Debugging URL -->
        </div>
      @endforeach
    </div>
    <div class="mt-4 text-center">
      <a href="{{ route('insertImage') }}" class="text-blue-500 hover:text-blue-700">Retour</a>
    </div>
  </div>
</x-layout>
