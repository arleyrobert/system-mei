<?php 
// definindo o array com as frases
$frases = array(
  "Fluxo de caixa é uma ferramenta que controla a movimentação financeira (as entradas e saídas de recursos financeiros), em um período determinado.",
  "Conhecer e acompanhar os tributos que devem ser pagos, contribui para evitar que o esquecimento e a falta de pagamento impactem no resultado de sua empresa.",
  "Ao fazer agendamentos de seu caixa, você poderá compreender melhor como estará seu caixa no futuro, permitindo que você tomes as melhores decisões.",
    "Busque sempre informações atualizadas sobre tributos que devem ser pagos junto ao seu contador ou ao Sebrae mais próximo."
  
);

// ordenar o array randomicamente
srand ((float)microtime()*1000000);
shuffle ($frases);

// mostrar o 1o. elemento do array, que será randômico
echo "" .$frases[0];
?>
