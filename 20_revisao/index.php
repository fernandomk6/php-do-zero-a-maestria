<?php
  /**
   * # Tipos de dados
   * 
   * ## Basicos
   * 
   * - integer
   * - float
   * - string
   * - boolean
   * 
   * ## Compostos
   * 
   * - array
   * - object
   * - null
   * - iterable
   * - callable
   * - resource
   */

   /**
    * 1) - Crie um algoritmo que receba um número digitado pelo usuário e verifique 
    * se esse valor é positivo, negativo ou igual a zero. A saída deve ser: "Valor 
    * Positivo", "Valor Negativo" ou "Igual a Zero".
    */

  function verificaNumero($aNumber) : string {
    if (gettype($aNumber) !== 'integer' && gettype($aNumber) !== 'float') return 'Valor incorreto';

    return $aNumber > 0 ? 'Valor Positivo' : ($aNumber < 0 ? "Valor Negativo" : "Igual a Zero" );
  }

  for ($i = -10; $i < 10 ; ++$i) { 
    echo $i . ", " . verificaNumero($i) . '<br>';
  }
  
