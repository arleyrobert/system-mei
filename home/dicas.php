<?php 
// definindo o array com as frases
$frases = array(
  "Cadastre um novo produto clicando no botão verde (Novo Produto/Serviço) para ter mais rapidez ao inserir uma nova entrada no seu fluxo de caixa.",
  
  "Faça agendamentos ao clicar no botão vermelho (Agenda) para obter avisos e saber como estará seu caixa no futuro.",
    "Você pode cadastrar o que entra e o que sai do seu caixa clicando no botão azul (Fluxo de Caixa)."
  
);

// ordenar o array randomicamente
srand ((float)microtime()*1000000);
shuffle ($frases);

// mostrar o 1o. elemento do array, que será randômico
echo "" .$frases[0];
?>