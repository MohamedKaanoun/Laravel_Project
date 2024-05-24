<div aria-label="card 2" tabindex="0" class=" focus:outline-none lg:w-4/12 lg:mr-7 mb-7 bg-white dark:bg-gray-800  p-6 shadow rounded">
    <div class="flex items-center border-b border-gray-200 dark:border-gray-700  pb-6">
        <div class="flex items-start justify-between w-full">
            <a href="{{route($href)}}">
                <div class="pl-3 w-full">
                    <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800 dark:text-white ">{{$name}}</p>
                </div>
            </a>
        </div>
    </div>
    <div class="px-2">
        <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600 dark:text-gray-200 ">{{$description}}</p>
        <div tabindex="0" class="focus:outline-none flex">
            <div class="py-2 px-4 cursor-pointer text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100 hover:bg-white">#JavaScript</div>
            <div class="py-2 px-4 cursor-pointer ml-3 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100 hover:bg-white">#HTML</div>
            <div class="py-2 cursor-pointer px-4 ml-3 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100 hover:bg-white">#CSS</div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var link = document.getElementById("projectLink");
    var text = link.querySelector("p").textContent;
    var encodedText = encodeURIComponent(text);
    });
</script>