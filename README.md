# git_api

## Geral
Esta aplicação foi desenvolvida para o Teste no processo seletivo da Ateliware. Em seguida, por motivos de aprendizagem foi requisitado a "Dockerização" da aplicação.  
É de conhecimento que o app não possui boa usabilidade e nem design. Mas para fins de treinamento foi considerado ok.  
  
-Existe uma versão construida em ruby da mesma aplicação, que pode ser acessada pelo [Link](https://github.com/andreibalbo/git_api_ruby)

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
  
Foi utilizado a versão Docker Toolbox para Windows 10 Home no desenvolvimento, que acarretou em algumas dificuldades.
  - Esta versão no windows tem um probleminha quanto ao sincronismo de arquivos nos volumes. Pastas fora do diretório C:/Users/your_user/... Não fazem o sync direito. Portanto tive que mudar o diretório do meu projeto pras coisas começarem a andar.
  
Alguns comandos no docker que ajudam muito e podem evitar muitas confusões, principalmente para quem não está acostumado:
 - Ao realizar um docker-compose up, é bom utilizar a flag -d para que a função "up" termine de carregar os arquivos e devolva o console sem ter que parar o serviço com um Ctrl+C. Não é sempre que acontece mas ajuda.
 - Se estiver construindo o projeto com docker-compose build, as vezes a flag --no-cache pode salvar. Pois estava tendo dificuldades em que minhas alterações no código não eram atualizadas devido ao docker estar usando o cache na construção.
 
 Tinha algumas dúvidas quanto ao docker-compose e aos volumes, que foram bem melhores esclarecidas ao fazer o tutorial próprio do docker-compose, disponível neste [Link](https://docs.docker.com/compose/gettingstarted/ "Compose Getting Started").  
 Vou adicionando aqui conforme for lembrando mais...
 
 
