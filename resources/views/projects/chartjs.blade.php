<x-layout>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagramme des Notes Moyennes des Étudiants</title>
    <style>
        #chartContainer {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div id="chartContainer" class="mt-6">
        <canvas id="studentChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Récupérer les données des étudiants depuis le backend
            const students = @json($contenu);

            // Calculer les moyennes des notes
            const studentNames = students.map(student => student.nom + ' ' + student.prenom);
            const averageNotes = students.map(student => {
                const totalNotes = parseFloat(student.note_module_1) + parseFloat(student.note_module_2) + parseFloat(student.note_module_3);
                return totalNotes / 3;
            });

            // Créer le graphique
            const ctx = document.getElementById('studentChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: studentNames,
                    datasets: [{
                        label: 'Moyenne des Notes',
                        data: averageNotes,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 20 // Assuming the grading system is out of 20
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>

</x-layout>