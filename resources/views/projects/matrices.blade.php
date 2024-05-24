<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Matrix Operations</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
<body class="bg-gray-100 text-gray-900">
<div class="container mx-auto p-8">
    <div class="content bg-white shadow-md rounded-lg p-6">
        <div class="forms grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="form_container bg-gray-50 p-4 rounded-md shadow-sm">
                <form id="form1">
                    <label class="block text-gray-700 font-bold mb-2">Matrix 1:</label>
                    <input type="number" id="matrixRowsNum" name="rows1" placeholder="Rows" class="w-full px-3 py-2 mb-3 border rounded-lg focus:outline-none focus:border-indigo-500"><br>
                    <input type="number" name="cols1" id="matrixColsNum" placeholder="Columns" class="w-full px-3 py-2 mb-3 border rounded-lg focus:outline-none focus:border-indigo-500"><br>
                    <button type="button" id="btn1" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Generate Matrix</button>
                </form>
                <textarea id="result1" readonly class="w-full mt-3 p-2 border rounded-lg"></textarea>
            </div>
            <div class="form_container bg-gray-50 p-4 rounded-md shadow-sm">
                <form id="form2">
                    <label class="block text-gray-700 font-bold mb-2">Matrix 2:</label>
                    <input type="number" id="matrixRowsNum" name="rows1" placeholder="Rows" class="w-full px-3 py-2 mb-3 border rounded-lg focus:outline-none focus:border-indigo-500"><br>
                    <input type="number" name="cols1" id="matrixColsNum" placeholder="Columns" class="w-full px-3 py-2 mb-3 border rounded-lg focus:outline-none focus:border-indigo-500"><br>
                    <button type="button" id="btn2" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Generate Matrix</button>
                </form>
                <textarea id="result2" readonly class="w-full mt-3 p-2 border rounded-lg"></textarea>
            </div>

        </div>

        <div class="result_container grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
            <div class="bg-gray-50 p-4 rounded-md shadow-sm">
                <button type="button" id="sumBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Sum Matrices</button>
                <textarea id="sumResult" readonly class="w-full mt-3 p-2 border rounded-lg"></textarea>
            </div>

            <div class="bg-gray-50 p-4 rounded-md shadow-sm">
                <button type="button" id="multiplicationBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Multiply Matrices</button>
                <textarea id="multiplyResult" readonly class="w-full mt-3 p-2 border rounded-lg"></textarea>
            </div>
        </div>  
    </div>
</div>

<script>
const bouton1 = document.getElementById("btn1");
const bouton2 = document.getElementById("btn2");
const boutonMultiplication = document.getElementById("multiplicationBtn");
const boutonSomme = document.getElementById("sumBtn");
var matrice1 = [];
var matrice2 = [];

bouton1.addEventListener("click", () => {
  genererMatrice("form1", matrice1);
});
bouton2.addEventListener("click", () => {
  genererMatrice("form2", matrice2);
});
boutonMultiplication.addEventListener("click", () => {
  multiplierMatrices();
});
boutonSomme.addEventListener("click", () => {
  sommerMatrices();
});

function genererMatrice(formId, matrice) {
  var formulaire = document.getElementById(formId);
  var lignesInput = formulaire.querySelector("#matrixRowsNum");
  var colonnesInput = formulaire.querySelector("#matrixColsNum");
  var lignes = parseInt(lignesInput.value);
  var colonnes = parseInt(colonnesInput.value);
  for (var i = 0; i < lignes; i++) {
    matrice[i] = [];
    for (var j = 0; j < colonnes; j++) {
      matrice[i][j] = Math.floor(Math.random() * 10); // Nombre aléatoire entre 0 et 9
    }
  }
  var textarea = formulaire.nextElementSibling;
  textarea.value = matrice.map((ligne) => ligne.join(" ")).join("\n");
}

function sommerMatrices() {
  var resultat = [];
  if (
    matrice1 &&
    matrice2 &&
    matrice1.length === matrice2.length &&
    matrice1[0].length === matrice2[0].length
  ) {
    for (var i = 0; i < matrice1.length; i++) {
      resultat[i] = [];
      for (var j = 0; j < matrice1[0].length; j++) {
        resultat[i][j] = matrice1[i][j] + matrice2[i][j];
      }
    }
    document.getElementById("sumResult").value = resultat
      .map((ligne) => ligne.join(" "))
      .join("\n");
  } else {
    alert("Les matrices doivent avoir les mêmes dimensions.");
  }
}

function multiplierMatrices() {
  var matrice1 = parserMatrice("form1");
  var matrice2 = parserMatrice("form2");
  var resultat = [];
  if (matrice1 && matrice2 && matrice1[0].length === matrice2.length) {
    for (var i = 0; i < matrice1.length; i++) {
      resultat[i] = [];
      for (var j = 0; j < matrice2[0].length; j++) {
        var somme = 0;
        for (var k = 0; k < matrice2.length; k++) {
          somme += matrice1[i][k] * matrice2[k][j];
        }
        resultat[i][j] = somme;
      }
    }
    document.getElementById("multiplyResult").value = resultat
      .map((ligne) => ligne.join(" "))
      .join("\n");
  } else {
    alert(
      "Le nombre de colonnes de la Matrice 1 doit être égal au nombre de lignes de la Matrice 2."
    );
  }
}

function parserMatrice(formId) {
  var formulaire = document.getElementById(formId);
  var textarea = formulaire.nextElementSibling;
  var lignes = textarea.value.trim().split("\n");
  var matrice = [];
  for (var i = 0; i < lignes.length; i++) {
    matrice[i] = lignes[i].trim().split(/\s+/).map(Number);
  }
  return matrice;
}
</script>
</body>
</html>
</x-layout>
