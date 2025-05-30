<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Projeto desenvolvido com Yii 2 Basic Project Template</h1>
    <br>
</p>

Projeto desenvolvido para o processo seletivo do cargo de desenvolvedor full stack do instituto Conecthus


Estrutura de diretórios
-------------------

      assets/              
      commands/           
      config/            
      controllers/        
                AuthController.php      Controla login e autenticacao
                HomeController.php      Controla home 
                SiteController.php      Gerado automaticamento (Nao utilizado)
                UserController.php      Controlar informacoes de usuarios(Listagem, create, update, delete)
      mail/                
      models/             Contem as classes de models 
      runtime/            
      tests/              
      vendor/             
      views/              Contem arquivos de views para a aplicação
      web/                Contem alguns scripts js e css usados na aplicação


Requisitos para rodar o projeto
------------

* PHP 7.4.
* MYSQL
* Composer
* Yii Framework

Composer

Para instalar o composer siga as instrucoes em https://getcomposer.org/download/

Instruções para rodar a aplicação
------------

### Instalando dependencias


Dentro da raiz do projeto execute o seguinte comando para instalar as dependencias

~~~
composer install
~~~

### Banco de dados

Edite o arquivo `config/db.php` com suas informacoes de conexao de banco:

Atualmente ele esta assim (caso sua senha, seu usuario ou banco seja diferente altere para o seu)
 
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=wenlock',
    'username' => 'root',
    'password' => 'qwerty123',
    'charset' => 'utf8',
];
```
### Rodando as migrations


Para criar a tabela que precisaremos utilizar no projeto execute:

~~~
php yii migrate
~~~


### Inicialize o projeto

Isso configura o ambiente e cria arquivos necessários.
~~~
php init
~~~

Você verá algo como 

~~~
Which environment do you want the application to be initialized in?

  [0] Development
  [1] Production

Escolha o [0]:
~~~



Voce pode acessar a aplicacao que esta disponivel em 
~~~
http://localhost:8080
~~~




