<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Credenciais inválida.',
    'password' => 'Senha incorreta.',
    'throttle' => 'Muitas tentativas de login. Por favore tente novamente em:seconds seconds.',

    'form' => [
        'login' => 'Email',
        'password' => 'Senha',
        'remember' => 'Lembrar de mim',
        'login' => 'Login',
        'register' => 'Registrar',
        'placeholder' => [
            'login' => 'Digite seu login',
            'senha' => 'informe sua senha senha',
        ],
        'errors' => [
          'login' => [
            'required' => 'O campo login é obrigatório.',
            'string' => 'O campo login deve ser uma string.',
            'email' => 'O campo login deve ser um email.',
            'exists' => 'Login inexistente.',
            'permission' => 'Você não tem permissão para acessar o sistema.',
          ],
          'senha' => [
            'required' => 'O campo senha é obrigatório',
            'min' => 'O campo senha deve ter no mínimo 6 caracteres',
            'exists' => 'Senha invalida.',
          ],
        ],
    ],
];
