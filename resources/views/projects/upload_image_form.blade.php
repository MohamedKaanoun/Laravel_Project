<x-layout>
  <form method="POST" action="{{ route('enregistrer_image') }}" enctype="multipart/form-data" class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
    @csrf
    <div class="mb-4">
      <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Télécharger une Image</label>
      <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="text-center">
      <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Envoyer</button>
    </div>
  </form>

  <div class="max-w-xl mx-auto mt-4 text-center">
    <a href="{{ route('afficher_images') }}" class="text-blue-500 hover:text-blue-700">Consulter les images</a>
  </div>
</x-layout>
