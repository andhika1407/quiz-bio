<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="h-100">
        <div id="sidebar" class="w-64 transition-all duration-300 bg-gray-900 text-white h-full flex flex-col">
            <div class="flex items-center justify-between px-2 py-3 fixed space-x-4">
                <div class="flex gap-x-4 items-center" id="logo-full">
                    <img src="images/logo-image.svg" class="w-20 h-20">
                    <img src="images/logo-text.svg">
                </div>
                <div class="flex gap-x-4 hidden" id="logo-mini">
                    <img src="images/logo-image.svg" class="w-16 h-16">
                </div>
                <button id="sidebar-toggle" class="bg-yellow-100 text-black rounded-full p-4 text-3xl hover:cursor-pointer">
                    <span>&laquo;</span>
                </button>
            </div>
    
            <nav>
                <div class="fixed flex flex-col px-2 py-4 space-y-2 mt-24">
                    <!-- Dashboard -->
                    <a href="" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('login') ? 'bg-yellow-400 text-black font-bold' : '' }}">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20"><path d="M10 2L2 7v11h6v-6h4v6h6V7z"/></svg>
                        <h1 class="textMenu">Dashboard</h1>
                    </a>
    
                    <!-- Nilai -->
                    <a href="" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('nilai') ? 'bg-yellow-400 text-black font-bold' : '' }}">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20"><path d="M4 3h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/></svg>
                        <h1 class="textMenu">Nilai</h1>
                    </a>
    
                    <!-- Profile -->
                    <a href="" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('profile') ? 'bg-yellow-400 text-black font-bold' : '' }}">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20"><path d="M10 2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 12c-3.33 0-6 2.67-6 6h12c0-3.33-2.67-6-6-6z"/></svg>
                        <h1 class="textMenu">Profile</h1>
                    </a>
                    <a href=""></a>
                </div>
            </nav>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const logoFull = document.getElementById('logo-full');
            const logoMini = document.getElementById('logo-mini');
            const textMenus = document.querySelectorAll('.textMenu');
    
            toggleBtn.addEventListener('click', () => {
                
                toggleBtn.classList.toggle('p-4');
                toggleBtn.classList.toggle('p-3');
    
                sidebar.classList.toggle('w-64');
                sidebar.classList.toggle('w-24');
    
                logoFull.classList.toggle('hidden');
                logoMini.classList.toggle('hidden');
    
                textMenus.forEach(item => item.classList.toggle('hidden'));
            });
        });
    </script>
</body>
</html>