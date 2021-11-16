drop user if exists Somellier@"localhost";

create user Somellier@"localhost" identified by "1234" with max_queries_per_hour 40;

grant select on atividadeSomativa7e8.Vinho to Somellier@localhost;
grant select( codVinicola, nomeVinicola ) on atividadeSomativa7e8.Vinicola to Somellier@localhost;


