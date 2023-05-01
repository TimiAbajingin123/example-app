<html>


<head>
    <livewire:styles/>
</head>

<body>
    @livewire('posts', ['post' => $post,'comments' => $comments])
    <livewire:scripts/>
</body>


</html>