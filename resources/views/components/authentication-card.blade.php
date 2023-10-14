<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-black">
    
    <div class="flex items-center justify-center">
        {{ $logo }}
    </div>
    <div class="w-[30vw]  mt-6 px-6 py-10 bg-[#1b1b1b] shadow-md overflow-hidden sm:rounded-lg h-auto">
       {{ $slot }}
    </div>
</div>
