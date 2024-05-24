<x-layout>
  <div class="max-w-xl mx-auto mt-4">
    <h2 class="text-center text-2xl font-bold mb-6">Liste des Images</h2>
    <div class="grid grid-cols-1 gap-4">
      @foreach($images as $image)
        <div class="border p-4 rounded-md shadow-md">
          <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image" class="mt-2 rounded-md">
        </div>
      @endforeach
    </div>
  </div>
</x-layout>
