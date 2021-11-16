/*Sem inner join*/
select distinct vinho.nomeVinho, vinho.anoVinho, vinicola.nomeVinicola, regiao.nomeRegiao
from 
atividadesomativa7e8.regiao as regiao, 
atividadesomativa7e8.vinho as vinho, 
atividadesomativa7e8.vinicola as vinicola
where vinho.codVinicola = vinicola.codVinicola and vinicola.codRegiao = regiao.codRegiao;

/*Com inner Join*/
select vinho.nomeVinho, vinho.anoVinho, vinicola.nomeVinicola, regiao.nomeRegiao
from atividadesomativa7e8.vinho as vinho
inner join atividadesomativa7e8.vinicola as vinicola on vinho.codVinicola = vinicola.codVinicola
inner join atividadesomativa7e8.regiao as regiao on vinicola.codRegiao = regiao.codRegiao;




