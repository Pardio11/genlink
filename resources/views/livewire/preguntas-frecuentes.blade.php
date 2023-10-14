<div>


    <div class="max-w-screen-lg mx-auto">
        
        <h1 class="flex justify-center text-center font-bold text-4xl mb-12">Preguntas Frecuentes</h1>

        <div class="bg-white p-4 rounded-lg my-4">
            <div class="flex items-center justify-between cursor-pointer" id="question1">
                <h2 class="text-xl font-semibold">¿Qué es una pregunta frecuente?</h2>
                <span class="text-xl">&#9660;</span>
            </div>
            <div class="text-gray-600 hidden p-2" id="answer1">
                Una pregunta frecuente es una pregunta que se hace con frecuencia y que a menudo se incluye en una lista de respuestas a preguntas comunes. Se utiliza para proporcionar información útil de manera rápida y eficiente.
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg my-4">
            <div class="flex items-center justify-between cursor-pointer" id="question2">
                <h2 class="text-xl font-semibold">¿Cómo se crea una pregunta frecuente?</h2>
                <span class="text-xl">&#9660;</span>
            </div>
            <div class="text-gray-600 hidden p-2" id="answer2">
                Para crear una pregunta frecuente, primero debes identificar las preguntas que se hacen con mayor frecuencia en relación con un tema o servicio en particular. Luego, proporciona una respuesta clara y concisa a cada pregunta.
            </div>
        </div>
    </div>

    <style>
        .rounded-lg {
            border-bottom: 1px solid #ccc;
        }
    </style>

    <script>
        document.getElementById('question1').addEventListener('click', function () {
            toggleAnswer('answer1');
        });

        document.getElementById('question2').addEventListener('click', function () {
            toggleAnswer('answer2');
        });

        function toggleAnswer(id) {
            const answer = document.getElementById(id);
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        }
    </script>


</div>
