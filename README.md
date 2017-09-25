# git_api

## Geral
Esta aplicação foi desenvolvida para o Teste no processo seletivo da Ateliware. Em seguida, por motivos de aprendizagem foi requisitado a "Dockerização" da aplicação.  
É de conhecimento que o app não possui boa usabilidade e nem design. Mas para fins de treinamento foi considerado ok.

## Instruções de uso  
### Create DB  
Por se tratar de um app dockerizado, é de se imaginar que será rodado em um container. Sendo assim, ao iniciar a instancia do MySQL, ela se encontrará vazia, sendo necessária a criação de uma database inicial. Ao clicar neste link ele simplesmente cria a tabela para que as outras funções possam ser executadas.
>ps: também serve de teste para conferir se a conexão com o banco está acontecendo.  
### Create repos table  
Após a inicialização da base de dados é necessário que se crie a tabela de repositórios. Este link simplesmente cria esta tabela, permitindo que as próximas funções respondam corretamente. 
### Get trends  
Função que busca os repositórios destaque na API do GitHub via HTTP GET e salva na tabela de repositórios.  
### List trendings
Lista os repositórios salvos no BD para que o usuário possa visualizar os detalhes de cada um.
### Detalhes do repositório  
Busca, através do id, os dados mais detalhados do repositório via HTTP GET na API do GitHub.  

## Informações Úteis
Aqui, vou mostrar algumas das dificuldades que foram encontradas durante esta tarefa, para ajudar quem precisar.
