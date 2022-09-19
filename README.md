<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">

<a href="#"><img src="https://github.com/hendrix97s/test-nano-incub/actions/workflows/actions.yml/badge.svg" alt="Tests"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Test Back-end PHP|Laravel

- [Link do test para backend - Nano Incub](https://github.com/nanoincub/teste-recrutamento-backend) 

## Obrigatório para rodar o projeto

- [docker](https://docs.docker.com/get-docker/) 20.10.17


## Para rodar o projeto execute os comandos abaixo

1. Clone o respectivo projeto

``` bash
git clone git@github.com:hendrix97s/test-nano-incub.git
```

...2. execute `cp .env.example .env` para criar o arquivo de configuração do projeto;
3. execute `./docker/bin/sail build` para construir a imagem do projeto;
4. execute `./docker/bin/sail up -d` para subir o container do projeto;
5. execute `./docker/bin/sail composer install` para instalar as dependências do projeto;
6. execute `./docker/bin/sail artisan key:generate` para gerar a chave do projeto;
7. execute `./docker/bin/sail artisan migrate --seed` para criar as tabelas do banco de dados e popular os dados;
8. execute `./docker/bin/sail artisan storage:link` para criar o link simbólico do storage;

## No respectivo projeto foi utilizado o framework TailwindCSS

**Para rodar o projeto será necessário executar o comando abaixo**

``` bash
./docker/bin/sail npm run dev

```
