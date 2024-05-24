<x-layout>
  <form method="POST" action="{{ route('enregistrer') }}" class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
    @csrf
    <div class="mb-4">
      <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
      <input type="text" name="nom" placeholder="Nom" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
      <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
      <input type="text" name="prenom" placeholder="Prénom" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
      <label for="cne" class="block text-sm font-medium text-gray-700 mb-1">CNE</label>
      <input type="text" name="cne" placeholder="CNE" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
      <label for="note_module_1" class="block text-sm font-medium text-gray-700 mb-1">Note du Module 1</label>
      <input type="number" name="note_module_1" placeholder="Note du Module 1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
      <label for="note_module_2" class="block text-sm font-medium text-gray-700 mb-1">Note du Module 2</label>
      <input type="number" name="note_module_2" placeholder="Note du Module 2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
      <label for="note_module_3" class="block text-sm font-medium text-gray-700 mb-1">Note du Module 3</label>
      <input type="number" name="note_module_3" placeholder="Note du Module 3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">
    <div class="text-center">
      <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Envoyer</button>
    </div>
  </form>

  <div class="max-w-xl mx-auto mt-4 text-center">
    <a href="{{ route('afficher') }}" class="text-blue-500 hover:text-blue-700">Consulter la liste</a>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          document.getElementById('latitude').value = position.coords.latitude;
          document.getElementById('longitude').value = position.coords.longitude;
        }, function(error) {
          console.error("Error getting geolocation: ", error);
        });
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    });
  </script>
</x-layout>
