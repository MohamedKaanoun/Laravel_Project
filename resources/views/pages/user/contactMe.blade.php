<x-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Contact ME</title>
      @vite(['resources/css/my_css.css'])
    </head>
    <body>
      <div class="bg-gray-100 min-h-screen">
        <header class="bg-white shadow">
            <div class="container mx-auto py-4 px-8">
                <h1 class="text-xl font-semibold text-gray-800">Contact Me</h1>
            </div>
        </header>
        <main class="container mx-auto py-6 px-8">
            <section class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Get in Touch</h2>
                <form  method="POST">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium">Name</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-medium">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                    <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">Submit</button>
                </form>
            </section>
        </main>
    </div>
    </body>
    </html>
</x-layout>
