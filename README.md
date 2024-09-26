# Desafio Feegow - Backend

> Essa aplicação foi desenvolvida para o desafio técnico da Feegow . O objetivo é criar uma API RESTful que permita o manego
de Funcionários e seus dados de vacina para COVID.

## Índice

- [Sobre](#sobre)
- [Requisitos](#requisitos)
- [Instalação](#instalação)

## Sobre

Esta aplicação tem o objetivo de atender a necessidade de manejar Funcionários e seus dados de Vacina para COVID.
Ela permite criar e editar Funcionários, Lotes de Vacinas e dados das Doses de Vacinas dos Funcionários.

## Requisitos

Para interagir com a aplicação, você precisará de um cliente HTTP, como [Postman](https://www.postman.com/) ou [Insomnia](https://insomnia.rest/).
Com isso, você precisará copiar esse repositório para seu computador, para isso você precisará do [Git](https://git-scm.com/downloads) instalado em seu computador.
Em seu terminal, navege ate o diretório onde deseja clonar o repositório este repositório.
Com o Git instalado, você pode clonar o repositório com o comando `git clone https://github.com/feegow/feegow-challenge-covid.git`.
Com isso feito, agora exis dois caminhos para [rodar a aplicação](#instalação):

## Instalação

1. Usar o [Docker](https://docs.docker.com/get-started/) para rodar a aplicação.
para isso instale o [Docker](https://docs.docker.com/desktop/) em seu computador.
utilize o comando `docker build -t desafio-feegow .` no terminal de sua escolha.
em seguida utilize o comando `docker run -p 8000:8000 desafio-feegow desafio-feegow` para rodar a aplicação.

2. Usar o [PHP](https://www.php.net/docs.php) para rodar a aplicação.
para isso instale o [PHP](https://www.php.net/downloads) em seu computador.
instale também o [Composer](https://getcomposer.org/download/) em seu computador.
utilize o comando `composer install` no terminal de sua escolha a partir do diretório raiz do projeto.
em seguida utilize o comando `php artisan migrate:fresh --seed` para popular o banco de dados com as informações necessárias.
por fim, utilize o comando `php artisan serve` para rodar a aplicação.

em ambos os casos a aplicação estará disponível em `http://localhost:8000/` para interagir com a API através de um cliente HTTP.
no endpoint `http://localhost:8000/api/v1/documentation` você encontrará a documentação da API.