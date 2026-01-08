## Pre requisitos
### Software
- PHP 8.3
- Composer
- NodeJS/NPM
### Extensões PHP
- opessl
- fileinfo

## Workflow/fluxo de trabalho

## Comandos para rodar o front/vite
- Instalar libs do vite/npm: `npm install`
- Rodar o vite em modo dev: `npm run dev`

## Comandos para rodar o back/laravel
- Instalar libs do composer/laravel: `composer install`
- Gerar a chave do projeto laravel: `php artisan key:generate`
- Rodar o projeto laravel: `php artisan serve`

## Comandos para preparar o banco de dados
- Iniciar o banco de dados e suas entidades: `php artisan migrate`
- Iniciar registro de módulos: `php artisan module:scan`
- Inicia o resto dos registros: `php artisan db:seed`
- Executa todos os comandos de banco de dados em ordem: `composer migrate:dev`

## Comandos para linguagem
- Instalar pacote de linguagens: `composer require --dev laravel-lang/lang`
- Publicar os arquivos de linguagem em protuguês: `php artisan lang:add pt_BR`
    - Em tese, a linguagem deve ser modificada para "pt_BR" no ".env". Segue exemplo
        - `APP_LOCALE=pt_BR`