<!-- resources/views/pages/user/listFichier.blade.php -->

<x-layout>
  <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Contenu du Fichier</h2>
    <div>
      @if(is_array($contenu) && count($contenu) > 0)
        <table class="w-full table-auto border-collapse border border-gray-200">
          <thead>
            <tr class="bg-gray-100">
              <th class="px-4 py-2 border border-gray-200">Nom</th>
              <th class="px-4 py-2 border border-gray-200">Prénom</th>
              <th class="px-4 py-2 border border-gray-200">CNE</th>
              <th class="px-4 py-2 border border-gray-200">Note du Module 1</th>
              <th class="px-4 py-2 border border-gray-200">Note du Module 2</th>
              <th class="px-4 py-2 border border-gray-200">Note du Module 3</th>
              <th class="px-4 py-2 border border-gray-200">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($contenu as $index => $item)
              <tr class="relative">
                <td class="px-4 py-2 border border-gray-200">{{ $item['nom'] }}</td>
                <td class="px-4 py-2 border border-gray-200">{{ $item['prenom'] }}</td>
                <td class="px-4 py-2 border border-gray-200">{{ $item['cne'] }}</td>
                <td class="px-4 py-2 border border-gray-200">{{ $item['note_module_1'] }}</td>
                <td class="px-4 py-2 border border-gray-200">{{ $item['note_module_2'] }}</td>
                <td class="px-4 py-2 border border-gray-200">{{ $item['note_module_3'] }}</td>
                <td class="px-4 py-2 border border-gray-200">
                  <div class="flex justify-end space-x-2">
                    <button onclick="modifier({{ $index }})" class="bg-blue-500 text-white px-2 py-1 rounded">Modifier</button>
                    <form action="{{ route('supprimer', $index) }}" method="POST" style="display:inline;">
                      @csrf
                      <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <p class="text-gray-500">Aucun fichier trouvé.</p>
      @endif
    </div>
  </div>

  <!-- Modal pour modifier les données -->
  <div id="modifierModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <form id="modifierForm" method="POST" action="">
          @csrf
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Modifier les données</h3>
                <div class="mt-2">
                  <div class="mb-4">
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom" id="nom" class="mt-1 p-2 w-full border rounded-md" required>
                  </div>
                  <div class="mb-4">
                    <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="mt-1 p-2 w-full border rounded-md" required>
                  </div>
                  <div class="mb-4">
                    <label for="cne" class="block text-sm font-medium text-gray-700">CNE</label>
                    <input type="text" name="cne" id="cne" class="mt-1 p-2 w-full border rounded-md" required>
                  </div>
                  <div class="mb-4">
                    <label for="note_module_1" class="block text-sm font-medium text-gray-700">Note Module 1</label>
                    <input type="number" name="note_module_1" id="note_module_1" class="mt-1 p-2 w-full border rounded-md" required>
                  </div>
                  <div class="mb-4">
                    <label for="note_module_2" class="block text-sm font-medium text-gray-700">Note Module 2</label>
                    <input type="number" name="note_module_2" id="note_module_2" class="mt-1 p-2 w-full border rounded-md" required>
                  </div>
                  <div class="mb-4">
                    <label for="note_module_3" class="block text-sm font-medium text-gray-700">Note Module 3</label>
                    <input type="number" name="note_module_3" id="note_module_3" class="mt-1 p-2 w-full border rounded-md" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">Enregistrer</button>
            <button type="button" onclick="fermerModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function modifier(index) {
      // Récupérer les données de la ligne
      var row = document.querySelectorAll('tbody tr')[index];
      var nom = row.children[0].innerText;
      var prenom = row.children[1].innerText;
      var cne = row.children[2].innerText;
      var note_module_1 = row.children[3].innerText;
      var note_module_2 = row.children[4].innerText;
      var note_module_3 = row.children[5].innerText;

      // Remplir le formulaire modal avec les données
      document.getElementById('nom').value = nom;
      document.getElementById('prenom').value = prenom;
      document.getElementById('cne').value = cne;
      document.getElementById('note_module_1').value = note_module_1;
      document.getElementById('note_module_2').value = note_module_2;
      document.getElementById('note_module_3').value = note_module_3;

      // Définir l'action du formulaire
      document.getElementById('modifierForm').action = "{{ url('/modifier') }}/" + index;

      // Afficher le modal
      document.getElementById('modifierModal').classList.remove('hidden');
    }

    function fermerModal() {
      // Cacher le modal
      document.getElementById('modifierModal').classList.add('hidden');
    }
  </script>
</x-layout>
