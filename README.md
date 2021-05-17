<p align="center">
  <img src="public/images/abrir_chamado.png" width="" alt="Página inicial do sistema">
</p>

<br>

<center>

# ABSX Suporte

</center>

<br>

## Descrição

O sistema consiste na abertura de chamados (ticket de suporte) que serão enviados para o vendedor disponível e com a menor quantidade de chamdados __em aberto__.

<br>

## Demo
Copie e cole o link: http://absxsuporte.herokuapp.com no navegador para um breve teste on-line.

---

## Requisitos

- PHP na versão 7.3 ou superior.
- BCMath PHP Extensão ativa.
- Ctype PHP Extensão ativa.
- Fileinfo PHP Extensão ativa.
- JSON PHP Extensão ativa.
- Mbstring PHP Extensão ativa.
- OpenSSL PHP Extensão ativa.
- PDO PHP Extensão ativa.
- Tokenizer PHP Extensão ativa.
- XML PHP Extensão ativa.
- Composer.
- MySQL.
- GIT.
- Conexão com a internet.

---

## Instalação

- ### Windows

    1 - Faça download do <a href="https://www.apachefriends.org/pt_br/download.html">xampp</a> na versão 7.3 ou superior instale e inicie o servidor apache e o banco MySQL.

    2 - Faça download do executável do <a href="https://getcomposer.org/download/">composer</a> e instale

    3 - Faça download e instale o <a href="https://git-scm.com/download/win">GIT</a>.

    4 - Configure o GIT:

        $ git config --global user.name "NomeDeUsuario"
        $ git config --global user.email "email@exemplo.br"

</br>

---

- ### Linux

    Atualize a lista de pacotes.
        
        $ sudo apt update

    Instalação do Apache.
        
        $ sudo apt install apache2

    Instalação de Ferramentas necessárias posteriormente.
        
        $ sudo apt install curl git unzip

    Instalação das principais bibliotecas PHP utilizadas pelo Laravel.
        
        $ sudo apt install php7.4 libapache2-mod-php7.4 php7.4-mbstring php7.4-xmlrpc  php7.4-soap php7.4-gd php7.4-xml php7.4-cli php7.4-zip

    Instalação do MySql e do driver de acesso PHP.
        
        $ sudo apt install mysql-server-8.0 php-mysql php7.4-mysql mysql-client-core-8.0

    Configuração de senha do mysql.
        
        $ sudo mysql_secure_installation

    Execute o mysql-cli para criar um novo usuário (execute na ordem).
        
        $ sudo mysql
        $ CREATE USER user@'localhost' IDENTIFIED BY senha_com_no_minimo_8_digitos';
        $ GRANT ALL PRIVILEGES ON *. * TO user@'localhost';
        $ FLUSH PRIVILEGES;

    Instale o composer.

        $ sudo apt install composer

    Instalar pacote global de criação de projetos Laravel.

        $ composer global require laravel/installer

    Instale o GIT.

        $ sudo apt install git

    Configure o GIT.

        $ git config --global user.name "NomeDeUsuario"
        $ git config --global user.email "email@exemplo.br"

<br>

## Configurações

<br>

- ### Tendo em vista que já tenha-se os recursos necessários para rodar o projeto use o powershel no windows ou o terminal no linux:

    <br>

    1 - Clone o projeto.

       git clone https://github.com/DanQueyroz/absx_suporte.git

    2 - Acesse o projeto.

        cd absx_suporte

    3 - Instale as dependências e o framework.

        composer update

    4 - Renomei o arquivo __.env.example__ na raiz do projeto para __.env__ 
    __(caso não consiga visualizar o arquivo, marque a opção exibir arquivos ocultos em seu sistema)__.

    5 - Gere uma nova chave para aplicação.

        php artisan key:generate

    6 - Crie uma base de dados com o nome que desejar, formato __ut8mb4_unicode_ci__.

    7 - Acesse o arquivo __.env__ e configure as variáveis de conexão com o banco de dados de acordo com o criado.

    Exemplo:

    <p align="center">
    <img src="public/images/bd_env.png" alt="Página inicial do sistema">
    </p>

    8 - Execute o comando

        php artisan migrate --seed

    ### __Obs:__ Esse comando irá criar todas as tabelas necessárias pelo sistema no banco de dados e ainda popular a tabela __users__  com 3 vendedores previamente.

    <br>

    9 - Inicie o servidor 

        php artisan serve

    10 - Acesse a URL na máquina configurada

        localhost:8000
        ou
        localhost:8000/chamados

    <b> 

    Essa deverá página deverá ser exibida

    <p align="center">
    <img src="public//images/home.png" width="800" alt="Página inicial do sistema">
    </p>

    ### __Dica:__ É possível executar o comando __php artisan migrate:fresh --seed__ sempre que desejar apagar todos os dados armazenados no banco de dados e repopular a tabela __users__ com os 3 vendedores iniciais. Se preferir pode rodar apenas o comando __php artisan migrate:fresh__, dessa forma não seráo criados dados iniciais.
    <br>


    <center>

    ## Linguagens e Tecnologias Utilizadas

    <center>

    <br>

    <p align="center">
    <img src="public/images/php.png" width="170" height="70" title="PHP" alt="PHP">

    <img src="public/images/laravel.png" width="170" height="70" title="Laravel" alt="Laravel">

    <img src="public/images/mysql.png" width="170" height="70" title="MySQL" alt="MySQL">

    <img src="public/images/bootstrap.png" width="170" height="70" title="Bootstrap" alt="Bootstrap">
    </p>

    ---


