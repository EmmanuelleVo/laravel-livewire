<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body>
<livewire:select-pagination/>
<livewire:search-term-field/>
<livewire:table class="w-full" :contacts="$contacts"/>
{{--<x-table class="w-full" :contacts="$contacts" :qp="$qp" :sort-order="$sortOrder"/>--}}
</body>
@livewireScripts
</html>
