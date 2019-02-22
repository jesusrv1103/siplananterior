
CREATE USER 'siplan2019_USR'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON siplan2019.* TO 'siplan2019_USR'@'localhost';
CREATE USER 'siplan2019_sel'@'localhost' IDENTIFIED BY '';
GRANT SELECT ON siplan2019.* TO 'siplan2019_sel'@'localhost';
GRANT EXECUTE ON PROCEDURE siplan2019.login TO 'siplan2019_sel'@'localhost';
GRANT EXECUTE ON PROCEDURE siplan2019.usuario_habilitado TO 'siplan2019_sel'@'localhost';
GRANT EXECUTE ON PROCEDURE siplan2019.usuario_info TO 'siplan2019_sel'@'localhost';
CREATE USER 'siplan2019_ins'@'localhost' IDENTIFIED BY '';
GRANT SELECT ON siplan2019.* TO 'siplan2019_ins'@'localhost';
GRANT INSERT ON siplan2019.* TO 'siplan2019_ins'@'localhost';
GRANT UPDATE ON siplan2019.* TO 'siplan2019_ins'@'localhost';
GRANT DELETE ON siplan2019.* TO 'siplan2019_ins'@'localhost';
GRANT EXECUTE ON PROCEDURE siplan2019.historial_login TO 'siplan2019_ins'@'localhost';
grant execute on procedure siplan2019.guardar_ppp to 'siplan2019_ins'@'localhost';
grant execute on procedure siplan2019.guardar_ppi to 'siplan2019_ins'@'localhost';
grant execute on procedure siplan2019.contar_indicadores_pp to 'siplan2019_sel'@'localhost';
grant execute on procedure siplan2019.agregar_indicador to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.agregar_actividad to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.delete_actividad to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.editar_actividad to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.delete_indicador to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.editar_indicador to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.delete_responsable to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.editar_responsable to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.agregar_responsable to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.delete_componente to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.agregar_componente to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.editar_componente to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.actualizar_pp to 'siplan2019_ins'@'localhost';
GRANT execute ON PROCEDURE siplan2019.guardar_pp to 'siplan2019_ins'@'localhost';
Flush privileges;


--
