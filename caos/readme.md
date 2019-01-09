# CAOS URL Shortener

CAOS é um encurtador de URL feito em PHP, usando framework Lumen e banco de dados MySQL. 

O encurtador recebe uma URL e retorna uma URL menor. 


##  ARQUITETURA

A lógica do algoritmo para permitir links mais curtos é baseada em conversão de bases [10 para 50] na qual seleciona-se os números  
decimais e o alfabeto maiúsculo e minúsculo, excluindo-se as vogais, para evitar a formação de bad words. Foram tambêm 
retirados caracteres que podem causar confusão de leitura (exemplo: 0 e O, l e i, etc.), resultando em 50 caracteres �teis
(1 dígito igual a 50 combinações, 2 dígitos igual a 50 x 50 [2.500], 3 dígitos igual a 50 x 50 x 50 [125.000], 4 dígitos [6.250.000], 
5 dígitos [312.500.000], e assim por diante. 
   


