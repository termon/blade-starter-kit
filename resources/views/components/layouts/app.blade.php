<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Recruit</title>
      <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />      
      @vite(['resources/css/app.css', 'resources/js/app.js'])     
      @livewireStyles
   </head>

   <body class="text-sm">
      <!-- choose the layout style -->
      <x-ui::flash position="bottom-right" />
      <x-layouts.sidebar>  
            {{ $slot }}            
      </x-layouts.sidebar>
    
      @livewireScripts
      
   </body>
</html>
