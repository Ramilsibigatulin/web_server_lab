<?php
    return [
        '/(^$)/' =>[\src\Controllers\MainController::class, 'main'],
        '/hello\/([a-z]+)/' => [\src\Controllers\MainController::class,'sayHello'],
        '/bye\/([a-z]+)/' => [\src\Controllers\MainController::class, 'sayBye']
    ];