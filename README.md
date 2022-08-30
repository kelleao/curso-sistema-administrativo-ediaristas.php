## Projeto sistema administrativo da plataforma E-Diaristas

Desenvolvido no curso multi-stack da treinaweb

### Instalando o projeto

#### Clonar o repositório

```
git clone https://github.com/kelleao/curso-sistema-administrativo-ediaristas.php.git
```

#### Instalar as depencências

```
composer install
```

Ou em ambiente de desenvolvimento:

```
composer update
```

#### Criar arquivo de configurações de ambiente

Copiar o arquivo de exemplo `.env.example` para `.env` na raiz do projeto
configurar os detalhes da aplicação e conexão com o banco de dados.

#### Criar a estrutura no banco de dados

```
php artisan migrate
```

#### Implementar seed name, email e password guarda  para banco de dados

```
 php artisan db:seed 
```

Usuario criado admin@admin.com
Senha: 123123123

ou 

Usuario: raquel179@gmail.com
Senha: 123123123

#### Iniciar o servidor de desenvolvimento

```
php artisan serve
```

