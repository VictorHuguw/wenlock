<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Projeto desenvolvido com Yii 2 Basic Project Template</h1>
    <br>
</p>

Projeto desenvolvido para o processo seletivo do cargo de desenvolvedor full stack do instituto Conecthus

 ![login](assets/login.png)

Requisitos para rodar o projeto
------------

* PHP 7
* MariaDB ou MYSQL
* Composer
* Yii Framework
* MYSQL Workbench ou outra ferramenta como o Dbeaver por exemplo

Instruções para rodar a aplicação
------------

### Instalando dependencias

Dentro da raiz do projeto execute o seguinte comando para instalar as dependencias

~~~
composer install
~~~

### Criando banco de dados
Necessario criar o banco de dados manualmente, para isso rode o seguinte comando no seu MYSQL workbench ou qualquer outra ferramenta

~~~
CREATE DATABASE wenlock
~~~


### Configurando conexão com o banco de dados

Após criar o banco de dados, edite o arquivo `config/db.php` com suas informações de conexão:

Eu ja deixei configurado ( mas caso sua senha, seu usuario ou banco seja diferente altere para o seu)
 
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

Para criar a tabela user que precisaremos utilizar no projeto execute na raiz do projeto:

~~~
php yii migrate
~~~

### Rodando a aplicação

Para rodar a aplicação basta executar na raiz de seu projeto
~~~
php yii serve
~~~

E por fim você pode acessar a aplicacao que estará disponivel em 
~~~
http://localhost:8080
~~~




